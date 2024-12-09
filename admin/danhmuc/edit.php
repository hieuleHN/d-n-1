
    <form action="index.php?act=update" method="post">
        Nhập tên danh mục<br>
        <input type="text" name="name" value="<?php echo isset($view['ten_loai'])&&$view['ten_loai']!=""?$view['ten_loai']:"";?>">
        <span><?php echo isset($error["name"])? $error["name"]:""; ?></span><br>
        <input type="hidden" name="id" value="<?php if(isset($view['ma_loai'])&&$view['ma_loai']>0) echo $view['ma_loai'];?>">
        <button type="submit" name="edit_dm">Sửa mới danh mục</button>
        <button type="reset">Nhập lại danh mục</button>
        <a href="index.php?act=list">Danh mục</a>
    </form>
