<?php
session_start();
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $id_sp=$_POST["id"];
    $quantity=$_POST["newQuantity"];
    
    //kiểm tra giỏ hàng có tồn tại hay không
    if(!empty($_SESSION["cart"])){
        $index=array_search($id_sp,array_column($_SESSION["cart"],"id"));
        if($index!==false){
            $_SESSION["cart"][$index]["quantity"]=$quantity;
        }else{
            echo"sản phẩm không tồn tại trong giỏ hàng";
        }
    }
}else{
    echo "Yêu cầu không hợp lệ";
}
?>