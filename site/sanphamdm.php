<main class="row mb ">
    <div class="box_left">
        <div class="row mb">
        <div class="boxtitle">SẢN PHẨM   | <strong><?=$tendm?></strong></div>
            <div class="khung_sp boxcontent">
            <?php
            $i=0;
            foreach ($dssp as $sp){
                extract($sp);
                $img =  $img_path.$hinh;
                $linksp="index.php?act=sanphamct&idsp=".$ma_hh;
                
                if(($i==2)||($i==5)||($i==8)||($i==11)){
                    $mr="";
                }else{
                    $mr="mr";
                }
                echo '<div class="boxsp '.$mr.'">
                    <div class="row">
                    <a href="'. $linksp .'">
                    <img class="img" width="300" src="'.$img.'" alt=""></a>
                </div>
                <p>$'.$don_gia.'</p>
                <a href="'. $linksp .'">'.$ten_hh.'</a>
                
            </div>';
                    $i+=1;
                }
            ?>
            </div>
        </div>
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

</main>
<!-- BANNER 2 -->