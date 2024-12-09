<div class="formtaikhoan">
    <div class="box_left">
    <form action="index.php?act=ng_nhan" method="post">
    <div class="boxtitle">THÔNG TIN NGƯỜI NHẬN</div>
        <div class="row boxcontent">
            <?php
            if(isset($_SESSION['ho_ten'])){
                $name=$_SESSION['ho_ten']['ho_ten'];
                $diachi=$_SESSION['ho_ten']['dia_chi'];
                $phone=$_SESSION['ho_ten']['phone'];
            }else{
                $name="";
                $diachi="";
                $phone="";
            }
            ?>
            <div class="row mb10">
                HỌ TÊN NGƯỜI NHẬN<br>
                <input type="text" name="name" value="<?=$name?>" placeholder="name">
            </div>
            <div class="row mb10">
                ĐỊA CHỈ<br>
                <input type="text" name="diachi" value="<?=$diachi?>">
            </div>
            <div class="row mb10">
                SỐ ĐIỆN THOẠI<br>
                <input type="number" name="phone" value="<?=$phone?>">
            </div>
            <div class="row mb10">
               PHƯƠNG THỨC THANH TOÁN<br>
                <input type="radio" name="pttt" value="thanh toán trực tiếp" checked><label>Trả tiền khi nhận hàng</label>
                <input type="radio" name="pttt" value="chuyển khoản" checked><label>Chuyển khoản ngân hàng</label>
            </div>
            <div class="row mb10">
            <input type="submit" name="add_ng_nhan" value="Đồng ý đặt hàng">
            <button type="reset">Nhập lại danh mục</button>
            </div>
        </div>
    </form>
    </div>
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
    </div>
    