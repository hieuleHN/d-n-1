<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP SHOE</title>
    <link rel="shortcut icon" href="./img/icon_title.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/509cc166d7.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body class="">
       <header>
        <div class="header">
            <img src="./img/bannergiay.jpg" alt="">
            <div class="header_left"><img src="./img/logo_chinh.png" alt=""></div>
            <div class="header_con">
                <div class="container">
                    <div class="gio_hang">
                        <div class="icon-TK"><img src="./img/R.png"></a></div>
                        <div class="icon-dm"><img src="./img/iconcon_danh_muc.png"></div>
                        <div class="icon-cart">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1"/>
                            </svg>
                            <span id="id_soluong"><?=!empty($_SESSION["cart"])?count($_SESSION["cart"]):0;?></span>
                        </div>
                    </div>
                </div>
        </div>

        </div>
        <div class="menu">
            <nav>
               <ul>
                  <li><a href="index.php">Trang chủ</a></li>
                  <li><a href="index.php?act=gt">Giới thiệu</a></li>
                  <li><a href="index.php?act=lh">Liên hệ</a></li>
                  <li><a href="index.php?act=gy">Góp ý</a></li>
                  <li><a href="index.php?act=hd">Hỏi đáp</a></li>
               </ul>
            </nav>
        </div>
       </header>
       <div class="boxcenter">