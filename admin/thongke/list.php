<div class="row formcontent">
<div class="row mb10 dslh">
<table>
    <tr>
        <th>STT</th>
        <th>LOẠI HÀNG</th>
        <th>SỐ LƯỢNG</th>
        <th>GIÁ CAO NHẤT</th>
        <th>GIÁ THẤP NHẤT</th>
        <th>GIÁ TRUNG BÌNH</th>
    </tr>
    <?php foreach($list_tk as $thong_ke){
        extract($thong_ke);
        echo "
            <tr>
                <td>$ma_dm</td>
                <td>$ten_dm</td>
                <td>$count_hh</td>
                <td>$max_gia</td>
                <td>$min_gia</td>
                <td>$avg_gia</td>
            </tr>
        ";    
    }
        ?>
        <a href="index.php?act=bieu_do">Xem biểu đồ</a>
</table>
</div>
</div>