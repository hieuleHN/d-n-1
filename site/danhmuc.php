<div class="dmTab">
        <h1>Danh mục</h1>
        <div class="listdm">
            <div class="boxcontent2 menu_doc">
                <ul>
                    <?php
                        foreach($dsdm as $dm){
                            extract($dm);
                            $linkdm="index.php?act=sanphamdm&iddm=".$ma_loai;
                            echo '<li><a href="'.$linkdm.'">'.$ten_loai.' </a></li>';
                        }
                        ?>
                </ul>
            </div>
        </div>
        <div class="btn">
            <button class="close_dm">CLOSE</button>
            <button class="checkOut">Check Out</button>
        </div>
    </div>