<?php
// function insert_banner($anh1,$anh2,$anh3,$anh4,$link_one,$link_two,$link_three,$link_four){
//     $add_banner="INSERT INTO slider(img,img_one,img_two,img_three,link_img,link_one,link_two,link_three) VALUES('$anh1','$anh2','$anh3','$anh4','$link_one','$link_two','$link_three','$link_four')";
//     pdo_execute($add_banner);
// }
function insert_banner($anh1,$anh2,$anh3,$anh4,$link_one,$link_two,$link_three,$link_four){
    $edit="UPDATE slider SET img='$anh1',img_one='$anh2',img_two='$anh3',img_three='$anh4',link_img='$link_one',link_one='$link_two',link_two='$link_three',link_three='$link_four'";
    pdo_execute($edit);
}
function load_banner(){
    $sql="SELECT * FROM `slider`";
    $view=pdo_query_one($sql);
    return $view;
}
function delete_banner($id){
    $sql="DELETE FROM slider WHERE id_slider = '$id'";
    pdo_execute($sql);
}
?>