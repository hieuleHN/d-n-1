
<div class="formcontent">
    <form action="index.php?act=sp" method="post" enctype="multipart/form-data">
        <div class="khung_sp">
            <div>
                <div class="row mb10">
                    MÃ HÀNG HOÁ<br>
                    <input type="text" name="id" disabled placeholder="auto number">
                </div>
                <div class="row mb10">
                    GIẢM GIÁ<br>
                    <input type="number" name="giamgia" >
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
                    <input type="text" name="name">
                    <span><?php echo isset($error["name"])? $error["name"]:""; ?></span><br>
                </div>
                <div class="row mb10">
                    HÌNH ẢNH<br>
                    <input type="file" name="anh" accept="image/*"><br>
                </div>
            </div>
            <div>
                <div class="row mb10">
                    ĐƠN GIÁ<br>
                    <input type="number" name="price" id="">
                    <span><?php echo isset($error["price"])? $error["price"]:""; ?></span><br>
                </div>
                <div class="row mb10">
                    LOẠI HÀNG<br>
                    <select name="iddm">
                        <?php foreach($view as $nhin):?>
                            <option value="<?php echo $nhin['ma_loai'];?>"><?php echo $nhin["ten_loai"];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div>
        <div class="khung3o">
                <!-- THÊM VIDEO -->
            <div class="khung_sp">
                <div class="formcontent">
                            <div class="grip row mb10">
                                THÊM VIDEO<br>
                                <input type="file" name="video" accept="video/*" id="taivideo" onchange="tai_video()">
                                <button type="button" onclick="start()">start</button>
                            </div>
                            <video width="321" height="231" controls="controls" id="video">
                                <source id="src">
                            </video>
                            <script>
                                function tai_video(){
                                    var input=document.getElementById("taivideo");
                                    var freader=new FileReader();
                                    freader.readAsDataURL(input.files[0]);
                                    freader.onload=function(){
                                        document.getElementById("video").src=freader.result;
                                    }
                                }
                                function start(){
                                    document.getElementById("video").play();
                                }
                            </script>
                </div>
            </div>
                <!-- THÊM ẢNH -->
            <div class="khung_sp">
                <!-- <style type="text/css">
                    .wrap {
                        margin: 10% auto;
                        width: 60%;
                    }
                    
                    .dandev-reviews {
                        position: relative;
                        margin: 20px 0;
                    }
                    
                    .dandev-reviews .form_upload {
                        width: 320px;
                        position: relative;
                        padding: 5px;
                        bottom: 0px;
                        height: 40px;
                        left: 0;
                        z-index: 5;
                        box-sizing: border-box;
                        background: #f7f7f7;
                        border-top: 1px solid #ddd;
                    }
                    
                    .dandev-reviews .form_upload>label {
                        height: 35px;
                        width: 160px;
                        display: block;
                        cursor: pointer;
                    }
                    
                    .dandev-reviews .form_upload label span {
                        padding-left: 26px;
                        display: inline-block;
                        background: url(images/camera.png) no-repeat;
                        background-size: 23px 20px;
                        margin: 5px 0 0 10px;
                    }
                    
                    .list_attach {
                        display: block;
                        margin-top: 30px;
                    }
                    
                    ul.dandev_attach_view {
                        list-style: none;
                        margin: 0;
                        padding: 0;
                    }
                    
                    ul.dandev_attach_view li {
                        float: left;
                        width: 80px;
                        margin: 0 20px 20px 0 !important;
                        padding: 0!important;
                        border: 0!important;
                        overflow: inherit;
                        clear: none;
                    }
                    
                    ul.dandev_attach_view .img-wrap {
                        position: relative;
                    }
                    
                    ul.dandev_attach_view .img-wrap .close {
                        position: absolute;
                        right: -10px;
                        top: -10px;
                        background: #000;
                        color: #fff!important;
                        border-radius: 50%;
                        z-index: 2;
                        display: block;
                        width: 20px;
                        height: 20px;
                        font-size: 16px;
                        text-align: center;
                        line-height: 18px;
                        cursor: pointer!important;
                        opacity: 1!important;
                        text-shadow: none;
                    }
                    
                    ul.dandev_attach_view li.li_file_hide {
                        opacity: 0;
                        visibility: visible;
                        width: 0!important;
                        height: 0!important;
                        overflow: hidden;
                        margin: 0!important;
                    }
                    
                    ul.dandev_attach_view .img-wrap-box {
                        position: relative;
                        overflow: hidden;
                        padding-top: 100%;
                        height: auto;
                        background-position: 50% 50%;
                        background-size: cover;
                    }
                    
                    .img-wrap-box img {
                        right: 0;
                        width: 100%!important;
                        height: 100%!important;
                        bottom: 0;
                        left: 0;
                        top: 0;
                        position: absolute;
                        object-position: 50% 50%;
                        object-fit: cover;
                        transition: all .5s linear;
                        -moz-transition: all .5s linear;
                        -webkit-transition: all .5s linear;
                        -ms-transition: all .5s linear;
                    }
                    
                    ul li,
                    ol li {
                        list-style-position: inside;
                    }
                    
                    .list_attach span.dandev_insert_attach {
                        width: 80px;
                        height: 80px;
                        text-align: center;
                        display: inline-block;
                        border: 2px dashed #ccc;
                        line-height: 76px;
                        font-size: 25px;
                        color: #ccc;
                        display: none;
                        cursor: pointer;
                        float: left;
                    }
                    
                    ul.dandev_attach_view {
                        list-style: none;
                        margin: 0;
                        padding: 0;
                    }
                    
                    ul.dandev_attach_view .img-wrap {
                        position: relative;
                    }
                    
                    .list_attach.show-btn span.dandev_insert_attach {
                        display: block;
                        margin: 0 0 20px!important;
                    }
                    
                    i.dandev-plus {
                        font-style: normal;
                        font-weight: 900;
                        font-size: 35px;
                        line-height: 1;
                    }
                    
                    ul.dandev_attach_view li input {
                        display: none;
                    }
                </style>
                <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
                <div class="wrap">
                    <h1>Hiển thị nhiều ảnh trước khi upload</h1>
                    <div class="dandev-reviews">
                        <div class="form_upload">
                            <label class="dandev_insert_attach"><span>Đính kèm ảnh</span></label>
                        </div>
                        <div class="list_attach">
                            <ul class="dandev_attach_view">

                            </ul>
                            <span class="dandev_insert_attach"><i class="dandev-plus">+</i></span>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $('.dandev_insert_attach').click(function() {
                        if ($('.list_attach').hasClass('show-btn') === false) {
                            $('.list_attach').addClass('show-btn');
                        }
                        var _lastimg = jQuery('.dandev_attach_view li').last().find('input[type="file"]').val();

                        if (_lastimg != '') {
                            var d = new Date();
                            var _time = d.getTime();
                            var _html = '<li id="li_files_' + _time + '" class="li_file_hide">';
                            _html += '<div class="img-wrap">';
                            _html += '<span class="close" onclick="DelImg(this)">×</span>';
                            _html += ' <div class="img-wrap-box"></div>';
                            _html += '</div>';
                            _html += '<div class="' + _time + '">';
                            _html += '<input type="file" class="hidden" multiple name="them_anh" onchange="uploadImg(this)" id="files_' + _time + '"   />';
                            _html += '</div>';
                            _html += '</li>';
                            jQuery('.dandev_attach_view').append(_html);
                            jQuery('.dandev_attach_view li').last().find('input[type="file"]').click();
                        } else {
                            if (_lastimg == '') {
                                jQuery('.dandev_attach_view li').last().find('input[type="file"]').click();
                            } else {
                                if ($('.list_attach').hasClass('show-btn') === true) {
                                    $('.list_attach').removeClass('show-btn');
                                }
                            }
                        }
                    });

                    function uploadImg(el) {
                        var file_data = $(el).prop('files')[0];
                        var type = file_data.type;
                        var fileToLoad = file_data;

                        var fileReader = new FileReader();

                        fileReader.onload = function(fileLoadedEvent) {
                            var srcData = fileLoadedEvent.target.result;

                            var newImage = document.createElement('img');
                            newImage.src = srcData;
                            var _li = $(el).closest('li');
                            if (_li.hasClass('li_file_hide')) {
                                _li.removeClass('li_file_hide');
                            }
                            _li.find('.img-wrap-box').append(newImage.outerHTML);


                        }
                        fileReader.readAsDataURL(fileToLoad);

                    }

                    function DelImg(el) {
                        jQuery(el).closest('li').remove();

                    }
                </script> -->

                <style type="text/css">
                    .wrapper {
                        margin: 20% auto;
                        width: 60%;
                    }
                    
                    #displayImg {
                        margin-top: 30px;
                    }
                    
                    #displayImg img {
                        height: 50px;
                        margin-right: 15px;
                        display: inline-block;
                    }
                </style>
                <div class="wrapper">
                    <h1>Chọn và hiển thị nhiều ảnh trước khi upload</h1>
                    <input type="file" name="them_anh[]" id="upload" onchange="ImagesFileAsURL()" multiple />
                    <div id="displayImg">

                    </div>
                    <script type="text/javascript">
                        function ImagesFileAsURL() {
                            var fileSelected = document.getElementById('upload').files;
                            if (fileSelected.length > 0) {
                                for (var i = 0; i < fileSelected.length; i++) {
                                    var fileToLoad = fileSelected[i];
                                    var fileReader = new FileReader();
                                    fileReader.onload = function(fileLoaderEvent) {
                                        var srcData = fileLoaderEvent.target.result;
                                        var newImage = document.createElement('img');
                                        newImage.src = srcData;
                                        document.getElementById('displayImg').innerHTML += newImage.outerHTML;
                                    }
                                    fileReader.readAsDataURL(fileToLoad);
                                }

                            }
                        }
                    </script>
                </div>
                
            </div>
        </div>
        <div class="row mb10">
            <textarea name="mota" id="" cols="30" rows="10">Mô tả</textarea>
            <span><?php echo isset($error["mota"])? $error["mota"]:""; ?></span><br>
        </div>
        <div class="row mb10">
            <button type="submit" name="add_sp">Thêm Mới</button>
            <button type="reset">Nhập lại</button>
            <a href="index.php?act=list">Danh sách</a>
        </div>
    </form>
</div>
