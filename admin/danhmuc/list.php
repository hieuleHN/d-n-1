<div class="row formcontent">
<div class="row mb10 dslh">
<table>
    <tr>
        <th>id</th>
        <th>Tên danh mục</th>
        <th><a href="index.php?act=dm">Thêm</a></th>
        <th></th>
    </tr>
    <?php foreach($role as $view):
        $sua="index.php?act=edit&id=".$view["ma_loai"];
        $xoa="index.php?act=delete&id=".$view["ma_loai"];
        ?>
        <tr>
            <td><?php echo $view["ma_loai"]?></td>
            <td><?php echo $view["ten_loai"]?></td>
            <td><a href="<?php echo $sua?>">Sửa</a> || <a onclick="return confirm('Bạn có muốn xoá không ?')" href="<?php echo $xoa?>">Xoá</a></td>
            <td><form action="index.php?act=list" method="post">
                <input type="checkbox" name="an" id="">
                <input type="checkbox" name="hien" id="">
                <input type="submit" name="luu" value="lưu">
            </form></td>
        </tr>
    <?php endforeach;?>

</table>
</div>
</div>