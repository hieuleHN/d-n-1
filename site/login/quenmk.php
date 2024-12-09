<main class="row mb ">

<div class="box_left">

  <div class="boxtitle">Quên mật khẩu</div>
  <div class="row formtaikhoan">
    <form action="index.php?act=quenmk" method="post">
      <div>
        <p>Email</p>
        <input type="email" name="email" placeholder="email">
      </div>
      <input type="submit" value="Gửi" name="guiemail">
      <input type="reset" value="Nhập lại">
      <br>
      <?php if (isset($thongbao) && $thongbao != '') {
            echo $thongbao;
      } ?>
    </form>
  </div>
</div>
    <?php 
        include "site/boxright.php";
    ?>
</main>
