<div class="boxtitle">DANH SÁCH TÀI KHOẢN</div>
<div class="row formcontent">
<div class="row mb10 dslh">
<table>
    <tr>
        <th>MÃ KHÁCH HÀNG</th>
        <th>TÊN KHÁCH HÀNG</th>
        <th>MẬT KHẨU</th>
        <th>KÍCH HOẠT</th>
        <th>EMAIL</th>
        <th>VAI TRÒ</th>
        <th></th>
    </tr>
    <?php foreach($role as $view):
        $xoa="index.php?act=delete-kh&id=".$view["ma_kh"];
        ?>
        <tr>
            <td><?php echo $view["ma_kh"]?></td>
            <td><?php echo $view["ho_ten"]?></td>
            <td><?php echo $view["mat_khau"]?></td>
            <td><?php echo $view["kich_hoat"]?></td>
            <td><?php echo $view["email"]?></td>
            <td><?php echo $view["vai_tro"]?></td>
            <td><a onclick="return confirm('Bạn có muốn xoá không ?')" href="<?php echo $xoa?>">Xoá</a></td>
        </tr>
    <?php endforeach;?>
</table>
</div>
</div>