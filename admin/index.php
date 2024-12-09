 <?php 
 session_start();
    require "../dao/pdo.php";
    require "../dao/danhmuc.php";
    require "../dao/sanpham.php";
    require "../dao/taikhoan.php";
    require "../dao/binhluan.php";
    require "../dao/donhang.php";
    require "../dao/banner.php";
    require "../dao/bienthe.php";
    require "../global.php";
    require "header.php";
    require "home.php";

    $error=[];
    if(isset($_GET["act"])){
        $act=$_GET["act"];
        switch($act){
            case "dm":
                if(isset($_POST["add_dm"])){
                    $name=$_POST["name"];
                    if(empty($name)){
                        $error["name"]="bạn chưa nhập tên danh mục";
                    }
                    if(!$error){
                        insert_dm($name);
                        echo "thêm danh mục thành công";
                    }
                }
                require "danhmuc/add.php";
                break;
            case "list":
                if(isset($_POST["luu"])){
                    $an=$_POST["an"];
                    $hien=$_POST["hien"];
                    
                }
                $role=loadall_dm();
                require "danhmuc/list.php";
                break;
            case "edit":
                if(isset($_GET["id"])){
                    $id=$_GET["id"];
                    $view=load_ten_dm($id);
                }
                require "danhmuc/edit.php";
                break;
            case "update":
                if(isset($_POST["edit_dm"])){
                    $name=$_POST["name"];
                    $id=$_POST["id"];
                    if(empty($name)){
                        $error["name"]="bạn chưa nhập tên danh mục";
                    }
                    if(!$error){
                        update_dm($id,$name);
                        echo "Sửa danh mục thành công";
                    }
                }
                $role=loadall_dm();
                require "danhmuc/list.php";
                break;
            case "delete":
                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
                    delete_dm($id);
                }
                $role=loadall_dm();
                require "danhmuc/list.php";
                break;
            case "sp":
                $view=loadall_dm();
                if(isset($_POST["add_sp"])){
                    $file=$_FILES["anh"];
                    $name=$_POST["name"];
                    $giamgia=$_POST["giamgia"];
                    $dacbiet=$_POST["dacbiet"];
                    $price=$_POST["price"];
                    $mota=$_POST["mota"];
                    $id_dm=$_POST["iddm"];

                    $them_anh=$_FILES["them_anh"];
                    $video_one=$_FILES["video"];
                    if(empty($name)){
                        $error["name"]="bạn chưa nhập tên sản phẩm";
                    }
                    if(empty($price)){
                        $error["price"]="bạn chưa nhập giá";
                    }
                    if(empty($mota)){
                        $error["mota"]="bạn chưa nhập mô tả";
                    }
                    if(isset($file)){
                        $thumuc_anh="../img/";
                        $image=$file["name"];
                        $thumuc_file=$thumuc_anh.$image;
                        move_uploaded_file($_FILES["anh"]["tmp_name"],$thumuc_file);
                    }
                    if(!$error){
                        $sql_id=insert_sanpham($name,$price,$giamgia,$image,$mota,$dacbiet,$id_dm);
                    }
                    $_SESSION['id_hang_hoa']=$sql_id;

                    if(isset($video_one)){
                        $video=$video_one["name"];
                        move_uploaded_file($_FILES["video"]["tmp_name"],"../img/".$video);
                        insert_video($video,$sql_id);
                    }
                    if(isset($them_anh)){
                        $img=$them_anh["name"];
                        foreach ($img as $key => $value) {
                            move_uploaded_file($them_anh["tmp_name"][$key],"../img/".$value);
                            insert_anh($value,$sql_id);
                        }
                        header("Location: index.php?act=bien_the");
                    }
                    
                }
                require "./sanpham/add.php";
                break;
            case "bien_the":
                if(isset($_POST["add_bien_the"])){
                    $id_hang_hoa=$_SESSION['id_hang_hoa'];
                    $size=$_POST["size"];
                    $soluong=$_POST["soluong"];
                    insert_bien_the($size,$soluong,$id_hang_hoa);
                }
                require "./sanpham/bien_the.php";
                break;
            case "list-sp":
                if(isset($_POST["listssp"])&&($_POST["listssp"])){
                    $key=$_POST["key"];
                    $iddm=$_POST["iddm"];
                }else{
                    $key="";
                    $iddm=0;
                }
                $vieww=loadall_dm();
                $role=loadall_sanpham($key,$iddm);
                require "sanpham/list.php";
                break;
            case "edit-sp":
                if(isset($_GET["id"])){
                    $id=$_GET["id"];

                    $view=loadone_sanpham($id);
                    $nhin=loadall_dm();
                    if(!$view){
                        echo "id không tồn tại";
                        exit();
                    }
                }
                require "sanpham/edit.php";
                break;
            case "update_sp":
                $view=loadall_dm();
                if(isset($_POST["edit_sp"])){
                    $id=$_POST["id"];
                    $file=$_FILES["anh"];
                    $name=$_POST["name"];
                    $giamgia=$_POST["giamgia"];
                    $dacbiet=$_POST["dacbiet"];
                    $price=$_POST["price"];
                    $ngaynhap=$_POST["date"];
                    $mota=$_POST["mota"];
                    $id_dm=$_POST["iddm"];
                    if(empty($name)){
                        $error["name"]="bạn chưa nhập tên sản phẩm";
                    }
                    if(empty($price)){
                        $error["price"]="bạn chưa nhập giá";
                    }
                    if(empty($mota)){
                        $error["mota"]="bạn chưa nhập mô tả";
                    }
                    if(isset($file)){
                        $image=$file["name"];
                        move_uploaded_file($_FILES["anh"]["tmp_name"],"../img/".$image);
                    }
                    if(!$error){
                        update_sp($id,$name,$price,$giamgia,$image,$ngaynhap,$mota,$dacbiet,$id_dm);
                        echo "Sửa Sản phẩm thành công";
                    }
                }
                if(isset($_POST["listssp"])&&($_POST["listssp"])){
                    $key=$_POST["key"];
                    $iddm=$_POST["iddm"];
                }else{
                    $key="";
                    $iddm=0;
                }
                $vieww=loadall_dm();
                $role=loadall_sanpham($key,$iddm);
                require "sanpham/list.php";
                break;
            case "delete-sp":
                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
                    delete_bl_hh($id);
                    delete_sp($id);
                }
                if(isset($_POST["listssp"])&&($_POST["listssp"])){
                    $key=$_POST["key"];
                    $iddm=$_POST["iddm"];
                }else{
                    $key="";
                    $iddm=0;
                }
                $view=loadall_dm();
                $role=loadall_sanpham($key,$iddm);
                require "sanpham/list.php";
                break;
            case "kh":
                $role=loalltaikhoan();
                require "khachhang/list.php";
                break;
            case "delete-kh":
                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
                    delete_kh($id);
                }
                $role=loalltaikhoan();
                require "khachhang/list.php";
                break;
            case "bl":
                $sql = "SELECT * FROM binh_luan";
                $role = pdo_query($sql);
                require "binhluan/list.php";
                break;
            case "delete-bl":
                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
                    delete_bl($id);
                }
                $sql = "SELECT * FROM binh_luan";
                $role = pdo_query($sql);
                require "binhluan/list.php";
                break;
            case "donhang":
                $sqlquery=loadall_donhang_lk();
                require "donhang/show.php";
                break;
            case "xac_nhan":
                    $xacnhan=$_POST["xacnhan"];
                    $id=$_POST["id"];
                        update_trang_thai($id,$xacnhan);
                require "donhang/donhang.php";
                break;
            case "an_hien":
                if(isset($_POST["luu"])){
                    $id=$_POST["id"];
                    $an=$_POST["an"];
                    an_hien($id,$an);
                }
                if(isset($_POST["listssp"])&&($_POST["listssp"])){
                    $key=$_POST["key"];
                    $iddm=$_POST["iddm"];
                }else{
                    $key="";
                    $iddm=0;
                }
                $vieww=loadall_dm();
                $role=loadall_sanpham($key,$iddm);
                require "sanpham/list.php";
                break;
            case "delete_show":
                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
                    delete_dathang($id);
                    header("Location: index.php?act=donhang");
                }
                break;
            case "thongke":
                $list_tk=loadall_thongke();
                include "thongke/list.php";
                break;
            case "bieu_do":
                $list_tk=loadall_thongke();
                include "thongke/bieu_do.php";
                break;
            case "banner":
                // if(isset($_GET["id"])) {
                //     $id = $_GET["id"];
                //     delete_banner($id);
                // }
                if(isset($_POST["add_banner"])){
                    $anh_one=$_FILES["anh1"];
                    $anh_two=$_FILES["anh2"];
                    $anh_three=$_FILES["anh3"];
                    $anh_four=$_FILES["anh4"];
                    $link_one=$_POST["link_one"];
                    $link_two=$_POST["link_two"];
                    $link_three=$_POST["link_three"];
                    $link_four=$_POST["link_four"];
                    if(isset($anh_one)){
                        $anh1=$anh_one["name"];
                        move_uploaded_file($_FILES["anh1"]["tmp_name"],"../img/".$anh1);
                    }
                    if(isset($anh_two)){
                        $anh2=$anh_two["name"];
                        move_uploaded_file($_FILES["anh2"]["tmp_name"],"../img/".$anh2);
                    }
                    if(isset($anh_three)){
                        $anh3=$anh_three["name"];
                        move_uploaded_file($_FILES["anh3"]["tmp_name"],"../img/".$anh3);
                    }
                    if(isset($anh_four)){
                        $anh4=$anh_four["name"];
                        move_uploaded_file($_FILES["anh4"]["tmp_name"],"../img/".$anh4);
                    }
                    insert_banner($anh1,$anh2,$anh3,$anh4,$link_one,$link_two,$link_three,$link_four);
                }
                include "slider/add.php";
                break;
            default:
                require "footer.php";
                break;
        }
    }

    ?>
</body>
</html>