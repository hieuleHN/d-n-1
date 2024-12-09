<div class="formcontent">
    <form action="index.php?act=dm" method="post">
        <div class="row mb10">
            Mã loại<br>
            <input type="text" name="id" disabled placeholder="auto number">
        </div>
        <div class="row mb10">
            Tên loại<br>
            <input type="text" name="name">
            <span><?php echo isset($error["name"])? $error["name"]:""; ?></span><br>
        </div>
        <div class="row mb10">
        <button type="submit" name="add_dm">Thêm mới danh mục</button>
        <button type="reset">Nhập lại danh mục</button>
        <a href="index.php?act=list">Danh mục</a>
        </div>
    </form>
    </div>