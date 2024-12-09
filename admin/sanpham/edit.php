    <div class="formcontent">
    <form action="index.php?act=update_sp" method="post" enctype="multipart/form-data">
        <div class="khung_sp">
            <div>
                <div class="row mb10">
                    MÃ HÀNG HOÁ<br>
                    <input type="text" name="id" disabled placeholder="auto number">
                </div>
                <div class="row mb10">
                    GIẢM GIÁ<br>
                    <input type="number" name="giamgia" value="<?php echo isset($view['giam_gia'])&&$view['giam_gia']!=""?$view['giam_gia']:"";?>">
                </div>
                <div class="row mb10">
                    HÀNG ĐẶC BIỆT?<br>
                    <input type="radio" name="dacbiet" value="Đặc biệt" checked="checked" id=""><span>Đặc biệt</span>
                    <input type="radio" name="dacbiet" value="Bình thường" id=""><span>Bình thường</span>
                </div>
            </div>
            <div>
                <div class="row mb10">
                    TÊN HÀNG HOÁ<br>
                    <input type="text" name="name" value="<?php echo isset($view['ten_hh'])&&$view['ten_hh']!=""?$view['ten_hh']:"";?>">         
                    <span><?php echo isset($error["name"])? $error["name"]:""; ?></span><br>
                </div>
                <div class="row mb10">
                    HÌNH ẢNH<br>
                    <input type="file" name="anh" accept="image/*"><br>
                </div>
                <div class="row mb10">
                    NGÀY NHẬP<br>
                    <input type="date" name="date" value="<?php echo isset($view['ngay_nhap'])&&$view['ngay_nhap']!=""?$view['ngay_nhap']:"";?>">
                </div>
            </div>
            <div>
                <div class="row mb10">
                    ĐƠN GIÁ<br>
                    <input type="number" name="price" id="" value="<?php echo isset($view['don_gia'])&&$view['don_gia']!=""?$view['don_gia']:"";?>">
                    <span><?php echo isset($error["price"])? $error["price"]:""; ?></span><br>
                </div>
                <div class="row mb10">
                    LOẠI HÀNG<br>
                    <select name="iddm">
                        <?php foreach($nhin as $dm):?>
                            <option value="<?php echo $dm['ma_loai'];?>"><?php echo $dm["ten_loai"];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="row mb10">
                    SỐ LƯỢNG XEM<br>
                    <input type="text" name="luotxem" disabled placeholder="0">
                </div>
            </div>
        </div>
        <div class="row mb10">
            <textarea name="mota" id="" cols="30" rows="10"><?php echo isset($view['mo_ta'])&&$view['mo_ta']!=""?$view['mo_ta']:"";?></textarea>
            <span><?php echo isset($error["mota"])? $error["mota"]:""; ?></span><br>
        </div>
        <div class="row mb10">
        <input type="hidden" name="id" value="<?php if(isset($view['ma_hh'])&&$view['ma_hh']>0) echo $view['ma_hh'];?>">
        <button type="submit" name="edit_sp">Sửa sản phẩm</button>
            <button type="reset">Nhập lại</button>
            <a href="index.php?act=list">Danh sách</a>
        </div>
    </form>
</div>
