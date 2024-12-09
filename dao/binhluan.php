<?php 
    function loadall_binhluan($id){
        $sql = "SELECT * FROM binh_luan WHERE ma_hh='$id'";
        $result =  pdo_query($sql);
        return $result;
    }
    function insert_binhluan($noidung,$id_sp,$id_user){
        $date = date('Y-m-d');
        $sql = "INSERT INTO binh_luan(noi_dung,ma_hh,ma_kh,ngay_bl) VALUES ('$noidung','$id_sp','$id_user','$date');";
        pdo_execute($sql);
    }
    function delete_bl($id){
        $sql="DELETE FROM binh_luan WHERE ma_bl = '$id'";
        pdo_execute($sql);
    }
    function delete_bl_hh($id){
        $sql="DELETE FROM binh_luan WHERE ma_hh = '$id'";
        pdo_execute($sql);
    }

?>