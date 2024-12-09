<?php
function insert_ng_nhan($ten_nh,$dia_chi,$phone,$pttt,$ma_hh,$ma_kh,$ma_don_hang) {
    $ngay_dat=date('Y-m-d');
    $sql="INSERT INTO tt_ng_nhan(ten_nh,dia_chi,phone,ngay_dat,pt_thanhtoan,ma_hh,ma_kh,ma_don_hang) VALUES('$ten_nh','$dia_chi','$phone','$ngay_dat','$pttt','$ma_hh','$ma_kh','$ma_don_hang');";
    pdo_execute($sql);
}
function ng_nhan($id){
    $sql="SELECT * FROM tt_ng_nhan WHERE ma_kh='$id'";
    $sp=pdo_query($sql);
    return $sp;
}
function delete_dathang($id){
    $sql_delete = "DELETE FROM tt_ng_nhan WHERE id = '$id'";
    pdo_execute($sql_delete);
}
function so_luong($id){
    $sql="SELECT d.*, h.hinh, h.don_gia FROM don_hang d LEFT JOIN hang_hoa h ON d.ma_hh=h.ma_hh WHERE ma_kh='$id'";
    $sp=pdo_query($sql);
    return $sp;
}
function insert_soluong($size,$so_luong,$ma_kh,$ma_hh) {
    $conn=pdo_get_connection();
    $trang_thai="Chờ xác nhận";
    $sql="INSERT INTO don_hang(size,so_luong,ma_kh,ma_hh,trang_thai) VALUES('$size','$so_luong','$ma_kh','$ma_hh','$trang_thai');";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $id_sp_moi=$conn->lastInsertId();
    return $id_sp_moi;
}
function delete_donhang($id){
    $sql_delete = "DELETE FROM don_hang WHERE id = '$id'";
    pdo_execute($sql_delete);
}
function loadall_donhang_lk(){
    $sql="SELECT don_hang.id AS id_don_hang, don_hang.so_luong AS soluong, don_hang.trang_thai, hang_hoa.don_gia AS dongia, tt_ng_nhan.id AS idlk, tt_ng_nhan.ma_hh AS mahanghoa,tt_ng_nhan.ten_nh AS nguoinhan, tt_ng_nhan.dia_chi AS diachi,tt_ng_nhan.phone AS sodienthoai,tt_ng_nhan.ngay_dat AS ngaydat FROM tt_ng_nhan LEFT JOIN hang_hoa ON hang_hoa.ma_hh=tt_ng_nhan.ma_hh LEFT JOIN don_hang ON don_hang.id=tt_ng_nhan.ma_don_hang ORDER BY don_hang.id DESC";
    $listk=pdo_query($sql);
    return $listk;
}
function loadall_thongke(){
    $sql="SELECT l.ma_loai AS ma_dm, l.ten_loai AS ten_dm, COUNT(h.ma_hh) AS count_hh, MIN(h.don_gia) AS min_gia, MAX(h.don_gia) AS max_gia, AVG(h.don_gia) AS avg_gia FROM loai_hang l LEFT JOIN hang_hoa h ON l.ma_loai=h.ma_loai GROUP BY l.ma_loai ORDER BY l.ma_loai DESC";
    $listk=pdo_query($sql);
    return $listk;
}
function update_trang_thai($id,$xacnhan){
    $edit="UPDATE don_hang SET trang_thai='$xacnhan' WHERE id=$id";
    pdo_execute($edit);
}
function update_so_luong($id,$soluong){
    $edit="UPDATE don_hang SET so_luong='$soluong' WHERE id=$id";
    pdo_execute($edit);
}
?>