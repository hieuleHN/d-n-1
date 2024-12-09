
<script src="https://www.gstatic.com/charts/loader.js"></script>

<div
id="myChart" style="width:100%; max-width:600px; height:500px;">
</div>

<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

// Set Data
const data = google.visualization.arrayToDataTable([
  ['Contry', 'Mhl'],
  ['VÍ DA', 19],['GIẦY THỂ THAO', 6],['GIẦY LƯỜI', 6],['GIẦY CAO CỔ', 4],['GIẦY TÂY', 6]]);

// Set Options
const options = {
  title:'World Wide Wine Production'
};

// Draw
const chart = new google.visualization.PieChart(document.getElementById('myChart'));
chart.draw(data, options);

}
</script>









<?php
// Khởi tạo mảng sản phẩm và số lượng tương ứng
$products = array(
    array("name" => "Product 1", "price" => 10),
    array("name" => "Product 2", "price" => 20),
    array("name" => "Product 3", "price" => 30)
);

// Lặp qua mảng sản phẩm và hiển thị đơn giá cho mỗi số lượng
foreach ($products as $product) {
    echo "Enter quantity for " . $product["name"] . ": ";
    $quantity = trim(fgets(STDIN));
    $price = $product["price"] * $quantity;
    echo "Price for " . $quantity . " " . $product["name"] . " is $" . $price . "\n";
}
?>





