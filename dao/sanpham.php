<?php
function insert_sanpham($name,$price,$giamgia,$image,$mota,$dacbiet,$id_dm){
    $ngaynhap=date('Y-m-d');
    $conn=pdo_get_connection();
    $sql_add="INSERT INTO hang_hoa(ten_hh,don_gia,giam_gia,hinh,ngay_nhap,mo_ta,dac_biet,ma_loai) VALUES('$name','$price','$giamgia','$image','$ngaynhap','$mota','$dacbiet','$id_dm')";
    $stmt=$conn->prepare($sql_add);
    $stmt->execute();
    $id_sp_moi=$conn->lastInsertId();
    return $id_sp_moi;
}
function update_sp($id,$name,$price,$giamgia,$image,$ngaynhap,$mota,$dacbiet,$id_dm){
    $edit="UPDATE hang_hoa SET ten_hh='$name',don_gia='$price',giam_gia='$giamgia',hinh='$image',ngay_nhap='$ngaynhap',mo_ta='$mota',dac_biet='$dacbiet',ma_loai='$id_dm' WHERE ma_hh=$id";
    pdo_execute($edit);
}
function an_hien($id,$an){
    $edit="UPDATE hang_hoa SET an_hien='$an' WHERE ma_hh=$id";
    pdo_execute($edit);
}
function loadall_sanpham_home($timkiem){
    $sql="SELECT * FROM hang_hoa WHERE an_hien!=0 AND an_hien=1";
    if($timkiem!=""){
        $sql.=" AND ten_hh LIKE '%".$timkiem."%' OR don_gia LIKE '%".$timkiem."%'";
    }else{
        $sql.=" ORDER BY ma_hh DESC LIMIT 0,15";
    }
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}
function loadall_sanpham($key="",$iddm=0){
    $sql="SELECT h.*, d.so_luong, d.size FROM hang_hoa h LEFT JOIN don_hang d ON h.ma_hh=d.ma_hh WHERE 1";
    if($key!=""){
        $sql.=" AND ten_hh LIKE '%".$key."%'";
    }
    if($iddm>0){
        $sql.=" AND ma_loai ='".$iddm."'";
    }
    $sql.=" ORDER BY ma_hh DESC";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}

// 
// function loadone_sanpham($id){
//     $sql = "SELECT h.ten_hh AS ten_hang_hoa, h.don_gia AS gia, h.giam_gia AS giam, h.hinh AS anh_sp, h.mo_ta AS mota_chitiet, b.size AS kich_co, b.soluong AS soo_luong, t.them_img AS img_con, v.clip AS video FROM hang_hoa h 
//     LEFT JOIN bien_the b ON h.ma_hh = b.id_hang_hoa
//     LEFT JOIN them_anh t ON b.id_hang_hoa = t.id_hang_hoa
//     LEFT JOIN video v ON b.id_hang_hoa = v.id_hang_hoa WHERE v.id_hang_hoa = $id";
//     $result = pdo_query_one($sql);
//     return $result;
// }
function loadone_sanpham($id){
    $sql = "SELECT * FROM hang_hoa WHERE ma_hh = $id";
    $result = pdo_query_one($sql);
    return $result;
}
function load_sanpham_cungloai($id,$iddm){
    $sql = "SELECT * FROM hang_hoa WHERE ma_loai = $iddm AND ma_hh <> $id";
    $result = pdo_query($sql);
    return $result;
}
function delete_sp($id){
    $sql_delete = "DELETE FROM hang_hoa WHERE ma_hh = '$id'";
    pdo_execute($sql_delete);
}
function delete_all($id){
    $sql_delete = "DELETE FROM hang_hoa WHERE ma_loai = '$id'";
    pdo_execute($sql_delete);
}
function tim_kiem_sp($timkiem){
    $sql = "SELECT * FROM hang_hoa WHERE ten_hh LIKE '%$timkiem%' AND don_gia LIKE '%$timkiem%' ";
    $result = pdo_query($sql);
    return $result;
}
function gio_hang($id){
    $sql = "SELECT * FROM hang_hoa WHERE ma_hh IN(".$id.") ORDER BY ma_hh DESC";
    $result = pdo_query($sql);
    return $result;
}