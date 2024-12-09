<div class="boxtitle">DANH SÁCH TÀI KHOẢN</div>
<div class="row formcontent">
<div class="row mb10 dslh">
<table>
    <tr>
        <th>MÃ</th>
        <th>NỘI DUNG</th>
        <th>MÃ HÀNG HOÁ</th>
        <th>MÃ KHÁCH HÀNG</th>
        <th>NGÀY BÌNH LUẬN</th>
        <th></th>
    </tr>
    <?php foreach($role as $view):
        $xoa="index.php?act=delete-bl&id=".$view["ma_bl"];
        ?>
        <tr>
            <td><?php echo $view["ma_bl"]?></td>
            <td><?php echo $view["noi_dung"]?></td>
            <td><?php echo $view["ma_hh"]?></td>
            <td><?php echo $view["ma_kh"]?></td>
            <td><?php echo $view["ngay_bl"]?></td>
            <td><a onclick="return confirm('Bạn có muốn xoá không ?')" href="<?php echo $xoa?>">Xoá</a></td>
        </tr>
    <?php endforeach;?>
</table>
</div>
</div>