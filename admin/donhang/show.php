<div class="row formcontent">
<div class="row mb10 dslh">
<table>
    <tr>
        <th>MÃ ĐƠN HÀNG</th>
        <th>THÔNG TIN ĐƠN HÀNG</th>
        <th>SỐ LƯỢNG</th>
        <th>GIÁ TRỊ ĐƠN HÀNG</th>
        <th>NGÀY ĐẶT HÀNG</th>
        <th>TRẠNG THÁI</th>
        <th></th>
        <th>XOÁ</th>
    </tr>
    <?php foreach($sqlquery as $view){
        extract($view);
        $tong_gia_tri=$soluong*$dongia;
        $xoa="index.php?act=delete_show&id=".$idlk;
        $trangthai="index.php?act=trang_thai&id=".$id_don_hang;
        echo"
            <tr>
                <td>$mahanghoa</td>
                <td>$nguoinhan<br>$diachi<br>$sodienthoai</td>
                <td>$soluong</td>
                <td> $tong_gia_tri</td>
                <td>$ngaydat</td>
                <td><form action='index.php?act=xac_nhan' method='post'>
                    <input type='hidden' name='id' value=".$id_don_hang.">
                    <button type='submit' name='xacnhan' value='Đã xác nhận'>xác nhận</button>
                </form></td>
                <td>$trang_thai</td>
                <td><a href=".$xoa.">xoá</a></td>
            </tr>
        ";}
        ?>
</table>
</div>
</div>
