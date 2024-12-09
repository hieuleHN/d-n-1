<?php

if(!empty($_SESSION["cart"])){
    $cart=$_SESSION["cart"];

    $id_sp=array_column($cart,"id");
    $idsp=implode(",",$id_sp);

    $gio_hang= gio_hang($idsp);
}
?>
    <div id="order">
        <div class="cartTab">
            <h1>Shopping Cart</h1>
            <form action="" method="post">
            <div class="listCart">
                <?php if(!empty($gio_hang)){?>
                <table>
                        <?php $sum=0;
                        foreach($gio_hang as $key => $gh):
                            $quantity=1;
                            foreach($_SESSION["cart"] as $session){
                            if($gh["ma_hh"]==$session){$quantity=$session["quantity"];break;}}?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><img src="<?=$img_path.$gh["hinh"]?>" alt="" width="50"></td>
                            <td><?=$gh["ten_hh"]?></td>
                            <td>
                            <select name="size" style=" width: 50px; height: 50px;">
                                <?php $loadall_bt=select_all_bien_the($gh["ma_hh"]);
                                foreach($loadall_bt as $size){?>
                                    <option value="<?php echo $size['size'];?>"><?php echo $size["size"];?></option>
                                <?php }?>
                            </select>   
                            </td>
                            <td>
                                <input style=" width: 50px; height: 50px;" type="number" name="quantity" id="quantity_<?=$gh['ma_hh']?>" min="1" max="100" value="<?=$quantity?>" oninput="updatePrice(<?=$gh['ma_hh']?>,<?=$key?>)">
                            </td>
                            <td>
                                    <input type="hidden" value="<?=$gh["don_gia"]?>" id="price" name="price">
                                    <!-- <input style="width: 50px;" type="text" id="total-price" name="total-price" readonly> -->
                                    <?= number_format((int)$gh["don_gia"]*(int)$quantity,0,",",".")?><u>đ</u>
                            </td>
                            <td><button onclick="remove(<?=$gh['ma_hh']?>)" style="width: 50px;" type="button">Xoá</button></td>
                        </tr>
                        <?php 
                            $sum+=((int)$gh["don_gia"]*(int)$quantity);
                            $_SESSION["tinhtong"]=$sum;
                        endforeach;?>
                        <tr>
                            <td colspan="4" align="center"><h2>tổng tiền hàng hoá</h2></td>
                            <td colspan="2" align="center"><?= number_format((int)$sum,0,",",".")?><u>đ</u></td>
                        </tr>
                </table>
                <?php }else{echo "<h1>Giỏ hàng trống</h1>";}?>
            </div>
            <div class="btn">
                <button class="close">CLOSE</button>
                <button class="checkOut">ĐẶT HÀNG</button>
            </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>

        function updatePrice(id,$index){
            var newQuantity= $('#quantity_'+id).val();
            if(newQuantity<=0){
                newQuantity=1
            }
            $.ajax({
                type:"POST",
                url:"./site/updateSoluong.php",
                data:{
                    id:id,
                    newQuantity:newQuantity
                },
                success: function(response){
                    $.post("site/chuahieu_soluong.php", function(data) {
                        $("#order").html(data);
                    })
                },
                error: function(error){
                    console.log(error);
                }
            })


            // var amount=document.getElementById("quantity").value;
            // var price=document.getElementById("price").value;
            // var totalPrice=amount*price;
            // document.getElementById("total-price").value=totalPrice;
        }
        function remove(id){
            if(confirm("bạn có muốn xoá không ?")){
                $.ajax({
                type:"POST",
                url:"./site/delete_Cart.php",
                data:{
                    id:id
                },
                success:function(response){
                    $.post("site/chuahieu_soluong.php", function(data) {
                        $("#order").html(data);
                    })
                },
                error: function(error){
                    console.log(error);
                }
            })
            }
        }
    </script>