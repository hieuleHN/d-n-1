<?php
    session_start();
    include "dao/pdo.php";
    include "dao/sanpham.php";
    include "dao/danhmuc.php";
    include "dao/binhluan.php";
    include "dao/taikhoan.php";
    include "dao/donhang.php";
    include "dao/banner.php";
    include "dao/bienthe.php";

    include "site/header.php";
    include "global.php";
    if(isset($_POST["go"])){
        $timkiem=$_POST["timkiem"];
        $_SESSION["timkiemsp"]=$timkiem;
    }
    $timkiem=$_SESSION["timkiemsp"];
    $spnew = loadall_sanpham_home($timkiem);
    $dsdm = loadall_dm();
    $banner=load_banner();
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            case "gt":
                
                include "site/gioithieu.php";
                break;
            case "lh":
                
                include "site/lienhe.php";
                break;
            case "sanphamdm":
                if(isset($_POST['keyword']) &&  $_POST['keyword'] != 0 ){
                    $key = $_POST['keyword'];
                }else{
                    $key = "";
                }
                if(isset($_GET['iddm']) && ($_GET['iddm']>0)){
                    $iddm=$_GET['iddm'];
                }else{
                    $iddm=0;
                }
                $dssp=loadall_sanpham("",$iddm);
                $tendm=load_ten_dmm($iddm);
                include "site/sanphamdm.php";
                break;
            case "sanphamct":
                if(isset($_POST['guibinhluan'])){
                    $id_user=$_SESSION["ho_ten"]["ma_kh"];
                    insert_binhluan($_POST['noidung'],$_POST['id_sp'],$id_user);
                }
                if(isset($_POST['dathang'])){
                    $soluong_nhap=$_POST["amount"];
                    $size=$_POST["size"];
                    $ma_kh=$_SESSION["ho_ten"]["ma_kh"];
                    $ma_hh=$_SESSION["hang_hoa"]["ma_hh"];
                    $id_so_luong=insert_soluong($size,$soluong_nhap,$ma_kh,$ma_hh);
                    $_SESSION["id_so_luong"]=$id_so_luong;

                    $id=$_POST["id"];
                    // var_dump($id);
                    // die;
                    $soluong_xuat=$_POST["soluong"];
                    $so_luong=$soluong_xuat-$soluong_nhap;
                    update_so_luong($id,$so_luong);
                    header("Location: index.php?act=ng_nhan");
                }
                if(isset($_GET['idsp']) && $_GET['idsp'] > 0){
                    $id=$_GET['idsp'];
                    $loadall_bt=select_all_bien_the($id);
                    $onesp = loadone_sanpham($id);
                    if(is_array($onesp)){
                        $_SESSION['hang_hoa']=$onesp;
                    }
                    //$hienthi_video=loadone_video($id);
                    $sanphamcl = load_sanpham_cungloai($id,$onesp["ma_loai"]);
                    $binhluan = loadall_binhluan($id);
                    include "site/sanphamct.php";
                }else{
                    include "site/home.php";            
                }
                break;
            case "dangky":
                if(isset($_POST['dangky']) && ($_POST['dangky']!="")){
                        $id=$_POST["id"];
                        $email=$_POST['email'];
                        $user=$_POST['user'];
                        $pass=$_POST['pass'];
                        $kichhoat=$_POST["kichhoat"];
                        $vaitro=$_POST["vaitro"];
                        $dia_chi=$_POST["diachi"];
                        $phone=$_POST["sdt"];
                        insert_taikhoan($id,$pass,$user,$kichhoat,$email,$vaitro,$dia_chi,$phone);
                        $thongbao="Đăng ký thành công";
                }
                include "site/login/dangky.php";
                break;
            case "dangnhap": 
                if (isset($_POST['dangnhap'])) {
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    $check = dangnhap($user,$pass);
                    if(is_array($check)){
                        $_SESSION['ho_ten']=$check;
                        header("Location: index.php");
                    }else{
                        $thongbao="Tài khoản không tồn tại vui lòng kiểm tra hoặc đăng ký";
                    }
                    include "site/login/dangky.php";
                }
                break;
            case "dangxuat":
                dangxuat();
                include "site/home.php";
                break;
            case "edit": 
                    include "site/login/edit.php";
                break;
            case "update":
                if(isset($_POST['capnhat']) && ($_POST['capnhat']!="")){
                    $id=$_POST["id"];
                    $email=$_POST['email'];
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    $kichhoat=$_POST["kichhoat"];
                    $vaitro=$_POST["vaitro"];
                    $dia_chi=$_POST["diachi"];
                    $phone=$_POST["sdt"];
                    capnhat_taikhoan($id,$pass,$user,$kichhoat,$email,$vaitro,$dia_chi,$phone);
                    $_SESSION['ho_ten']=dangnhap($user,$pass);
                    header("Location: index.php");
                    }
                include "site/home.php";
                break;
            case "quenmk":
                if (isset($_POST['guiemail'])) {
                    $email = $_POST['email'];
                    $check = checkemail($email);
                    if(is_array($check)){
                        $thongbao="Mật khẩu của bạn là:".$check["mat_khau"];
                    }else{
                        $thongbao="Email của bạn không có trong hệ thống";
                    }
                }
                include "site/login/quenmk.php";
                break;
            case "ng_nhan":
                if(isset($_POST['add_ng_nhan'])){
                    $name=$_POST['name'];
                    $diachi=$_POST['diachi'];
                    $phone=$_POST['phone'];
                    $ma_hh=$_SESSION['hang_hoa']['ma_hh'];
                    $ma_kh=$_SESSION['ho_ten']['ma_kh'];
                    $pttt=$_POST["pttt"];
                    $ma_don_hang=$_SESSION["id_so_luong"];
                    insert_ng_nhan($name,$diachi,$phone,$pttt,$ma_hh,$ma_kh,$ma_don_hang);
                    header("Location: index.php?act=don_hang");
                }
                include "site/donhang/tt_ng_nhan.php";
                break;
            case "don_hang":
                $id=$_SESSION["ho_ten"]["ma_kh"];
                $don_hang=so_luong($id);
                $dat_hang=ng_nhan($id);
                include "site/donhang/your_donhang.php";
                break;
            case"delete_donhang":
                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
                    delete_donhang($id);
                }
                $id=$_SESSION["ho_ten"]["ma_kh"];
                $don_hang=so_luong($id);
                $dat_hang=ng_nhan($id);
                include "site/donhang/your_donhang.php";
                break;
            case"delete_dathang":
                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
                    delete_dathang($id);
                }
                $id=$_SESSION["ho_ten"]["ma_kh"];
                $don_hang=so_luong($id);
                $dat_hang=ng_nhan($id);
                include "site/donhang/your_donhang.php";
                break;
        }
    }else{
        include "site/home.php";
    }
   
    include "site/footer.php";
?>