
<main class="row mb formcontent">
    <div class="box_left">
        <div class="row mb">
            <div class="title_sp_chitiet">
                <?php echo $onesp['ten_hh']; ?>
            </div>
            <div class="boxcontent">
                <?php 
                    $img = $img_path . $onesp['hinh'];
                    echo "<div class='row mb spct'><img src='$img' width='70%'></div>";?>
                    <!-- VIDEO -->
                    <!-- <?php $video_hienthi=$img_path.$hienthi_video["clip"];?>
                    <video width="340px" height="260px" controls autoplay>
                        <source src="<?php echo $video_hienthi;?>" type="video/mp4">
                    </video> -->
                    <!-- XEM THÊM ẢNH -->
                    <form action="" method="post">
                        <div class="size">
                            <h3>Kích cỡ</h3>
                            <ul>
                                <?php foreach($loadall_bt as $all_bt):?>
                                    <input type="hidden" name="id" value="<?=$all_bt["id_bien_the"]?>">
                                    <input type="hidden" name="soluong" value="<?=$all_bt["soluong"]?>">
                                    <li><p><?=$all_bt["size"]?></p><input type="radio" name="size" value="<?=$all_bt["size"]?>" id="myButton"></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <div id="buy-amount" class="row mb">
                            <h3>Số lượng</h3>
                            <button type="button" class="minus-btn" onclick="handleMinus()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                            </svg>
                            </button>
                            <input type="text" name="amount" id="amount" value="1">
                            <button type="button" class="plus-btn" onclick="handlePlus()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            </button>
                        </div>
                            <button type="button" data-id="<?=$onesp['ma_hh']?>" class="btnCart" onclick="add_giohang(<?=$onesp['ma_hh']?>,'<?=$onesp['ten_hh']?>',<?=$onesp['don_gia']?>)" style="width: 160px; display: flex; justify-items: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>Thêm vào giỏ hàng
                            </button>

                        <input type="submit" value="Đặt hàng" name="dathang">
                    </form>
                    <h1><label>Đơn giá: </label><?=$onesp['don_gia']?></h1>
                    <p>Mô tả: <?=$onesp['mo_ta']?></p>
            </div>
        </div>

        <div class="mb">
            <div class="boxtitle">BÌNH LUẬN</div>
            <div class="row boxcontent2 binhluan ">
                <table>
                    <?php foreach($binhluan as $value): ?>
                    <tr>
                        <td><?php echo $value['noi_dung']?></td>
                        <td><?php echo $_SESSION['ho_ten']['ho_ten']?></td>
                        <td><?php echo date("d/m/Y", strtotime($value['ngay_bl'])) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="box_search">
                <form action="index.php?act=sanphamct&idsp=<?=$id?>" method="POST">
                    <input type="hidden" name="id_sp" value="<?=$id?>">
                    <input type="text" name="noidung">
                    <input type="submit" name="guibinhluan" value="Gửi bình luận">
                </form>
            </div>

        </div>

        <div class="row mb">
            <div class="boxtitle">SẢN PHẨM CÙNG LOẠI</div>
            <div class="row boxcontent">
                <?php foreach($sanphamcl as $cungloai): ?>
                <li>
                    <a style="text-decoration: none; font-size: 18px;" href="index.php?act=sanphamct&idsp=<?=$cungloai['ma_hh']?>">
                        <?=$cungloai['ten_hh']?>
                    </a>
                </li>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        let=id_soluong=document.getElementById("id_soluong");
        function add_giohang(id_sp,name_sp,price_sp){
            $.ajax({
                type:"POST",
                url:"./site/add_giohang.php",
                data:{
                    id:id_sp,
                    name:name_sp,
                    price:price_sp
                },
                success:function(response){
                    id_soluong.innerText=response;
                    alert('Bạn đã thêm sản phẩm vào giỏ hàng thành công!')
                },
                error: function(error){
                    console.log(error);
                }
            })
        }


        let amountElement=document.getElementById('amount');
        let amount=amountElement.value
        //console.log(amount);
        let render=(amount)=>{
            amountElement.value=amount
        }
        //Handle plus
        let handlePlus=()=>{
            amount++
            render(amount);
        }
        let handleMinus=()=>{
            if(amount>1){
            amount--}
            render(amount);
        }
        amountElement.addEventListener('input',()=>{
            amount=amountElement.value;
            amount=parseInt(amount);
            amount=(isNaN(amount)||amount==0)?1:amount;
            render(amount);

        });
    </script>
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