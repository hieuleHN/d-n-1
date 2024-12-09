<?php
session_start();
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $id_sp=$_POST["id"];
    
    //kiểm tra giỏ hàng có tồn tại hay không
    if(!empty($_SESSION["cart"])){
        $index=array_search($id_sp,array_column($_SESSION["cart"],"id"));
        if($index!==false){
            unset($_SESSION["cart"][$index]);
        }else{
            echo"sản phẩm không tồn tại trong giỏ hàng";
        }
    }
}else{
    echo "Yêu cầu không hợp lệ";
}
?>