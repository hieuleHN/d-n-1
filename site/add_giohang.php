<?php
session_start();
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $id_sp=$_POST["id"];
    $name_sp=$_POST["name"];
    $price_sp=$_POST["price"];
    
    $product=[
        "id"=>$id_sp,
        "name"=>$name_sp,
        "price"=>$price_sp,
        "quantity"=>1
    ];
    $_SESSION["cart"][]=$product;

    //kiểm tra sản phẩm đã có trong giỏ hàng chưa
    $index=array_search($id_sp,array_column($_SESSION["cart"],"id"));
    //array_column() trính xuất 1 cột từ mảng giỏ hàng và trả về 1 cột chứa giá trị id
    if($index!==false){
        $_SESSION["cart"][$index]["quantity"]+=1;
    }else{
        //Nếu sản phẩm chưa tồn tại thì thêm mới vào giỏ hàng
        $product=[
            "id"=>$id_sp,
            "name"=>$name_sp,
            "price"=>$price_sp,
            "quantity"=>1
        ];
        $_SESSION["cart"][]=$product;
    }
    //trả về số lượng sản phẩm của giỏ hàng
    echo count($_SESSION["cart"]);
}else{
    echo "Yêu cầu không hợp lệ";
}
?>