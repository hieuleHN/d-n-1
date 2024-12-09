<div class="formcontent">
    <form action="index.php?act=banner" method="post" enctype="multipart/form-data">
        <div class="khung_sp">
            <h2>ĐẶT BANNER MỚI</h2>
                <div class="row mb10">
                    Chọn ảnh 1<br>
                    <input type="file" name="anh1">
                    <input type="text" name="link_one" placeholder="chọn link cho banner">
                </div>
                <div class="row mb10">
                    Chọn ảnh 2<br>
                    <input type="file" name="anh2">
                    <input type="text" name="link_two" placeholder="chọn link cho banner">
                </div>
                <div class="row mb10">
                    Chọn ảnh 3<br>
                    <input type="file" name="anh3">
                    <input type="text" name="link_three" placeholder="chọn link cho banner">
                </div>
                <div class="row mb10">
                    Chọn ảnh 4<br>
                    <input type="file" name="anh4">
                    <input type="text" name="link_four" placeholder="chọn link cho banner">
                </div>
        </div>
        <div class="row mb10">
            <button type="submit" name="add_banner">Thêm Mới</button>
            <button type="reset">Nhập lại</button>
        </div>
    </form>
</div>
