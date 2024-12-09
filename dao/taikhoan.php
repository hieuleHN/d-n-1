<?php
    
    //dang ky
    function insert_taikhoan($id,$pass,$user,$kichhoat,$email,$vaitro,$dia_chi,$phone){
        $sql="INSERT INTO khach_hang (ma_kh,mat_khau,ho_ten,kich_hoat,email,vai_tro,dia_chi,phone) VALUES('$id','$pass','$user','$kichhoat','$email','$vaitro','$dia_chi','$phone'); ";
        pdo_execute($sql);
    }

    function dangnhap($user,$pass) {
        $sql="SELECT * FROM khach_hang WHERE ho_ten='$user' AND mat_khau='$pass'";
        $sp = pdo_query_one($sql);
        return $sp;
    }

    function loalltaikhoan(){
        $sql="SELECT * FROM khach_hang ORDER BY ma_kh DESC";
        $sp=pdo_query($sql);
        return $sp;
    }

    function delete_kh($id){
        $sql="DELETE FROM khach_hang WHERE ma_kh = '$id'";
        pdo_execute($sql);
    }

    function dangxuat() {
        if (isset($_SESSION['ho_ten'])) {
            unset($_SESSION['ho_ten']);
        }
    }

    function capnhat_taikhoan($id,$pass,$user,$kichhoat,$email,$vaitro,$dia_chi,$phone){
        $sql="UPDATE khach_hang SET mat_khau='$pass',ho_ten='$user',kich_hoat='$kichhoat',email='$email',vai_tro='$vaitro',dia_chi='$dia_chi',phone='$phone' WHERE ma_kh='$id'";
        pdo_execute($sql);
    }

    function checkemail($email) {
        $sql="SELECT * FROM khach_hang WHERE email='$email'";
        $sp=pdo_query_one($sql);
        return $sp;
    }

?>
