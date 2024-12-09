<?php
function insert_bien_the($size,$soluong,$id_hh){
    $sql_add="INSERT INTO bien_the(size,soluong,id_hang_hoa) VALUES('$size','$soluong','$id_hh')";
    pdo_execute($sql_add);
}
function select_all_bien_the($id_hh){
    $sql = "SELECT * FROM bien_the WHERE id_hang_hoa='$id_hh'";
    $result = pdo_query($sql);
    return $result;
}
function insert_video($video,$id_hh){
    $sql_add="INSERT INTO video(clip,id_hang_hoa) VALUES('$video','$id_hh')";
    pdo_execute($sql_add);
}
function loadone_video($id_hang_hoa){
    $sql = "SELECT clip FROM video WHERE id_hang_hoa='$id_hang_hoa'";
    $result = pdo_query($sql);
    return $result;
}
function insert_anh($img,$id_hh){
    $sql_add="INSERT INTO them_anh(them_img,id_hang_hoa) VALUES('$img','$id_hh')";
    pdo_execute($sql_add);
}
?>