<?php
function insert_dm($name){
    $add_dm="INSERT INTO loai_hang VALUES(null,'$name')";
    pdo_execute($add_dm);
}
function update_dm($id,$name){
    $edit="UPDATE loai_hang SET ten_loai='$name' WHERE ma_loai=$id";
    pdo_execute($edit);
}
function delete_dm($id){
    $sql_delete = "DELETE FROM loai_hang WHERE ma_loai = '$id'";
    pdo_execute($sql_delete);
}
function loadall_dm(){
    $sql="SELECT * FROM loai_hang ORDER BY ma_loai DESC";
    $listdanhmuc=pdo_query($sql);
    return  $listdanhmuc;
}
function load_ten_dm($id){
        $sql="SELECT * FROM loai_hang WHERE ma_loai=".$id;
        $view=pdo_query_one($sql);
        return $view;
}
function load_ten_dmm($id){
    $sql="SELECT * FROM loai_hang WHERE ma_loai=".$id;
    $view=pdo_query_one($sql);
    extract($view);
    return $ten_loai;
}