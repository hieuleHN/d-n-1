<div class="box_left">
<h1>CÁC ĐƠN HÀNG CỦA BẠN</h1>
<div class="boxtitle">THÔNG TIN ĐƠN HÀNG</div>
<div class="row formcontent">
<div class="row mb10 dslh">
    <table>
        <tr>
            <th>MÃ ĐƠN HÀNG</th>
            <th>Ảnh</th>
            <th>SỐ LƯỢNG</th>
            <th>TỔNG GIÁ TRỊ ĐƠN HÀNG</th>
            <th></th>
            <th>TRẠNG THÁI</th>
        </tr>
        <?php foreach($don_hang as $nhin):
            $xoa="index.php?act=delete_donhang&id=".$nhin["id"];
            $img=$img_path.$nhin["hinh"]?>
        <tr>
            <td><?php echo $nhin["ma_hh"]?></td>
            <td><img src="<?php echo $img?>" width="100" height="100" alt=""></td>
            <td><?php echo $nhin["so_luong"]?></td>
            <td><?php echo $nhin["so_luong"]*$nhin["don_gia"]?></td>
            <td><a onclick="return confirm('Bạn có muốn xoá không ?')" href="<?php echo $xoa;?>">Xoá</a></td>
            <td><?php echo $nhin["trang_thai"]?></td>
        </tr>
        <?php endforeach;?>
    </table>
    </div></div>

    <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
<div class="row formcontent">
<div class="row mb10 dslh">
    <table>
        <tr>
            <th>NGƯỜI ĐẶT HÀNG</th>
            <th>ĐỊA CHỈ</th>
            <th>SỐ ĐIỆN THOẠI</th>
            <th>NGÀY ĐẶT</th>
            <th>PHƯƠNG THỨC THANH TOÁN</th>
            <th>MÃ ĐƠN HÀNG</th>
            <th></th>
        </tr>
        <?php foreach($dat_hang as $view):
            $xoa="index.php?act=delete_dathang&id=".$view["id"];?>
        <tr>
            <td><?php echo $view["ten_nh"]?></td>
            <td><?php echo $view["dia_chi"]?></td>
            <td><?php echo $view["phone"]?></td>
            <td><?php echo $view["ngay_dat"]?></td>
            <td><?php echo $view["pt_thanhtoan"]?></td>
            <td><?php echo $view["ma_hh"]?></td>
            <td><a onclick="return confirm('Bạn có muốn xoá không ?')" href="<?php echo $xoa;?>">Xoá</a></td>
        </tr>
        <?php endforeach;?>
    </table>
    </div></div></div>
    <div>
    <?php
        include "site/tai_khoan.php";
        include "site/danhmuc.php";
        include "site/gio_hang.php";
    ?>
        <script>
            let iconCart = document.querySelector('.icon-cart');
            let iconDm = document.querySelector('.icon-dm');
            let iconTK = document.querySelector('.icon-TK');
            // let iconCartSpan = document.querySelector('.icon-cart span');
            let body = document.querySelector('body');
            let closeCart = document.querySelector('.close');

            iconCart.addEventListener('click', () => {
            body.classList.toggle('showCart');
            })
            closeCart.addEventListener('click', () => {
            body.classList.toggle('showCart');
            })
            iconDm.addEventListener('click', () => {
            body.classList.toggle('showdm');
            })
            closeCart.addEventListener('click', () => {
            body.classList.toggle('showdm');
            })
            iconTK.addEventListener('click', () => {
            body.classList.toggle('showTK');
            })
            closeCart.addEventListener('click', () => {
            body.classList.toggle('showTK');
            })
        </script>
    </div>