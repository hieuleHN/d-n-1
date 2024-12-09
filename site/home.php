<main>
        <div class="banner mb">
            <!-- Slideshow container -->
            <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <?php 
            $img_1=$img_path.$banner["img"];
            $img_2=$img_path.$banner["img_one"];
            $img_3=$img_path.$banner["img_two"];
            $img_4=$img_path.$banner["img_three"];
            ?>
            <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <a href="<?php echo $banner["link_img"]?>"><img src="<?php echo $img_1?>" style="width:100%"></a>
            <div class="text">Caption Text</div>
            </div>

            <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <a href="<?php echo $banner["link_one"]?>"><img src="<?php echo $img_2?>" style="width:100%"></a>
            <div class="text">Caption Two</div>
            </div>

            <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <a href="<?php echo $banner["link_two"]?>"><img src="<?php echo $img_3?>" style="width:100%"></a>
            <div class="text">Caption Three</div>
            </div>

            <div class="mySlides fade">
            <a href="<?php echo $banner["link_three"]?>"><img src="<?php echo $img_4?>" style="width:100%"></a>
            <div class="text">Caption Four</div>
            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>

            <!-- The dots/circles -->
            <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            </div>

        </div>
                <style>
                    input[type=range] {
                        -webkit-appearance: none;
                        width: 50%;
                        height: 10px;
                        background: #ddd;
                        border-radius: 5px;
                        outline: none;
                    }

                    input[type=range]::-webkit-slider-thumb {
                        -webkit-appearance: none;
                        width: 20px;
                        height: 20px;
                        background: #4CAF50;
                        border-radius: 50%;
                        cursor: pointer;
                    }

                    input[type=range]::-webkit-slider-runnable-track {
                        width: 100%;
                        height: 10px;
                        background: #ddd;
                        border-radius: 5px;
                        cursor: pointer;
                    }
                </style>
            <form action="" method="post" style="width: 500px; position: absolute; top:640px; right:240px;">
                <input type="range" id="price" name="price" min="1000" max="1000000" step="1">
                <input type="text" id="max-price" name="timkiem">
                <input type="submit" name="go" value="Tìm kiếm">
            </form>
        <div class="khung_sp">
            <?php
            foreach($spnew as $sp){
                extract($sp);
                $img=$img_path.$hinh;
                $linksp="index.php?act=sanphamct&idsp=".$ma_hh;
                echo '<div class="boxsp ">
                    <div class="row img"><a href="'.$linksp.'"><img src="'.$img.'" alt=""></a></div>
                    <p>'.$don_gia.'</p>
                    <a href="'.$linksp.'">'.$ten_hh.'</a>
                </div>';
               
            }
            ?>
        </div>
    <div>
    <?php
        include "site/tai_khoan.php";
        include "site/danhmuc.php";
        include "site/gio_hang.php";
    ?>
        <script>
            // Price
            var price = document.getElementById("price");
            var maxPrice = document.getElementById("max-price");

            price.addEventListener("input", function() {
            maxPrice.value = price.value;
            });


            // CARD
            let iconCart = document.querySelector('.icon-cart');
            let iconDm = document.querySelector('.icon-dm');
            let iconTK = document.querySelector('.icon-TK');
            // let iconCartSpan = document.querySelector('.icon-cart span');
            let body = document.querySelector('body');
            let closeCart = document.querySelector('.close');
            let closedm = document.querySelector('.close_dm');
            let closeTK = document.querySelector('.close_TK');

            iconCart.addEventListener('click', () => {
            body.classList.toggle('showCart');
            })
            closeCart.addEventListener('click', () => {
            body.classList.toggle('showCart');
            })
            iconDm.addEventListener('click', () => {
            body.classList.toggle('showdm');
            })
            closedm.addEventListener('click', () => {
            body.classList.toggle('showdm');
            })
            iconTK.addEventListener('click', () => {
            body.classList.toggle('showTK');
            })
            closeTK.addEventListener('click', () => {
            body.classList.toggle('showTK');
            })
        </script>
    </div>

</main>
<!-- BANNER 2 -->