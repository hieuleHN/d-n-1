<div class="TKTab">
        <h1>TÀI KHOẢN</h1>
        <div class="listTK">
        <div class="row mb">
            <?php if(isset($_SESSION['ho_ten'])){
                extract($_SESSION['ho_ten']);
                ?>
                <div class="row mb">
                <p>Hello <?=$ho_ten?></p>
                <button><a href="index.php?act=dangxuat">Đăng xuất</a></button>
                <button><a href="index.php?act=edit">Cập nhật tài khoản</a></button>
                <button><a href="index.php?act=don_hang">Đơn hàng của bạn</a></button>
                <?php if($ma_kh==1){?>
                    <button><a href="admin/index.php">Trang quản trị</a></button>
                </div>
            <?php }} else { ?>
                <div class="boxcontent formtaikhoan">
                    <form action="index.php?act=dangnhap" method="POST">
                    <h4>Tên đăng nhập</h4><br>
                    <input type="text" name="user" id="">
                    <h4>Mật khẩu</h4><br>
                    <input type="password" name="pass" id=""><br>
                    <input type="checkbox" name="" id="">Ghi nhớ tài khoản?
                    <br><input type="submit" value="Đăng nhập" name="dangnhap">
                    <br>
                    </form>
                <li class="form_li"><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                <li class="form_li"><a href="index.php?act=dangky">Đăng kí thành viên</a></li>
                </div>
            <?php } ?>
        </div>
        </div>
        <div class="btn">
            <button class="close_TK">CLOSE</button>
            <button class="checkOut">Check Out</button>
        </div>
    </div>