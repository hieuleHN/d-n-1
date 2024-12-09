
<main class="row mb ">

    <div class="box_left">
        <div class="row mb">

        <div class="boxtitle">CẬP NHẬT THÀNH VIÊN</div>
        <div class="row boxcontent formtaikhoan">
            <form action="index.php?act=update" method="post">
                <div class="khung2">
                    <?php if((isset($_SESSION["ho_ten"])&&(is_array($_SESSION["ho_ten"])))){
                        extract($_SESSION["ho_ten"]);?>
                <div>
                <div class="row mb10">
                    <p>EMAIL</p>
                    <input type="email" name="email" value="<?=$email?>" placeholder="email">
                </div>
                <div class="row mb10">
                    MÃ KHÁCH HÀNG
                    <input type="text" name="id" value="<?=$ma_kh?>" placeholder="user">
                </div>
                <div class="row mb10">
                    MẬT KHẨU
                    <input type="password" name="pass" value="<?=$mat_khau?>" placeholder="password">
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
                    <input type="text" name="user" value="<?=$ho_ten?>" placeholder="user">
                </div>
                <div class="row mb10">
                    SỐ ĐIỆN THOẠI
                    <input type="number" name="sdt" value="<?=$phone?>" placeholder="số điện thoại">
                </div>
                <div class="row mb10">
                    ĐỊA CHỈ
                    <input type="text" name="diachi" value="<?=$dia_chi?>" placeholder="địa chỉ">
                </div>
                <div class="row mb10">
                    Vai trò
                    <input type="radio" name="vaitro" value="khách hàng" id=""><span>Khách hàng</span>
                    <input type="radio" name="vaitro" value="nhân viên" checked="checked" id=""><span>Nhân viên</span>
                </div>
                </div>
                </div>
                <input type="hidden" name="id" value="<?=$ma_kh?>">
                <input type="submit" value="Cập nhật" name="capnhat">
                <input type="reset" value="Nhập lại">
                <?php }?>
            </form>
        </div></div>

    </div>
    <?php
    include "site/boxright.php";
    ?>

</main>
