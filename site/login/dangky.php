
<main class="row mb ">

    <div class="box_left">
        <div class="row mb">

        <div class="boxtitle">ĐĂNG KÝ THÀNH VIÊN</div>
        <div class="row boxcontent formtaikhoan">
            <form action="index.php?act=dangky" method="post">
                <div class="khung2">
                <div>
                <div class="row mb10">
                    <p>EMAIL</p>
                    <input type="email" name="email" placeholder="email">
                </div>
                <div class="row mb10">
                    MÃ KHÁCH HÀNG
                    <input type="text" name="id" placeholder="user">
                </div>
                <div class="row mb10">
                    MẬT KHẨU
                    <input type="password" name="pass" placeholder="password">
                </div> 
                <div class="row mb10">
                    KÍCH HOẠT
                    <input type="radio" name="kichhoat" value="Chưa kích hoạt" id=""><span>Chưa kích hoạt</span>
                    <input type="radio" name="kichhoat" value="Kích hoạt" checked="checked" id=""><span>Kích hoạt</span>
                </div>
                </div>
                <div>
                <div class="row mb10">
                    TÊN ĐĂNG KÝ
                    <input type="text" name="user" placeholder="user">
                </div>
                <div class="row mb10">
                    SỐ ĐIỆN THOẠI
                    <input type="number" name="sdt" placeholder="số điện thoại">
                </div>
                <div class="row mb10">
                    ĐỊA CHỈ
                    <input type="text" name="diachi" placeholder="địa chỉ">
                </div>
                <div class="row mb10">
                    Vai trò
                    <input type="radio" name="vaitro" value="khách hàng" id=""><span>Khách hàng</span>
                    <input type="radio" name="vaitro" value="nhân viên" checked="checked" id=""><span>Nhân viên</span>
                </div>
                </div>
                </div>
                <input type="submit" value="Đăng ký" name="dangky">
                <input type="reset" value="Nhập lại">
                
            </form>
            <?php 
                if(isset($thongbao) && ($thongbao != "")) {
                    echo $thongbao;
                }
            ?>
        </div></div>

    </div>
    <?php
    include "site/boxright.php";
    ?>

</main>
