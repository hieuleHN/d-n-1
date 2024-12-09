<div class="row formcontent">
        <form action="index.php?act=list-sp" method="post">
            <input type="text" name="key">
            <select name="iddm" id="">
                <option value="0" selected>Tất cả</option>
                <?php foreach($vieww as $xem):?>
                    <option value="<?php $xem['ma_loai']?>"><?php echo $xem["ten_loai"]?></option>
                <?php endforeach;?>
                <input type="submit" name="listssp" value="GO">
            </select>
        </form>
    <div class="row mb10 dslh">
        <table>
            <tr>
                <th>MÃ HH</th>
                <th>Ảnh</th>
                <th>TÊN HH</th>
                <th>ĐƠN GIÁ</th>
                <th>GIẢM GIÁ</th>
                <th>Mô tả</th>
                <th>Size</th>
                <th>Số lượng</th>
                <th>id danh mục</th>
                <th>Ẩn/Hiện</th>
                <th><a href="index.php?act=sp"> Thêm sản phẩm mới</a></th>
            </tr>
            <?php foreach($role as $view):
                $sua="index.php?act=edit-sp&id=".$view["ma_hh"];
                $xoa="index.php?act=delete-sp&id=".$view["ma_hh"];?>
            <tr>
                <td><?php echo $view["ma_hh"]?></td>
                <td><img width="100px" src="../img/<?php echo $view['hinh']; ?>"></td>
                <td><?php echo $view["ten_hh"]?></td>
                <td><?php echo $view["don_gia"]?></td>
                <td><?php echo $view["giam_gia"]?></td>
                <td><?php echo $view["mo_ta"]?></td>
                <td><?php echo $view["size"]?></td>
                <td><?php echo $view["so_luong"]?></td>
                <td><?php echo $view["ma_loai"]?></td>
                <td><form action="index.php?act=an_hien" method='post'>
                    <input type="hidden" name="id" value="<?=$view["ma_hh"]?>">
                    <input type="radio" name="an" value="0"><label>Ẩn</label>
                    <input type="radio" name="an" value="1"><label>Hiện</label>
                    <input type="submit" value="Lưu" name="luu">
                </form></td>
                <td><a href="<?php echo $sua;?>">Sửa</a> || <a onclick="return confirm('Bạn có muốn xoá không ?')" href="<?php echo $xoa;?>">Xoá</a></td>
            </tr>
            <?php endforeach;?>
        </table>
</div></div>