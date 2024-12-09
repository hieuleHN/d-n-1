<!-- <script src="https://www.gstatic.com/charts/loader.js"></script>

<body>
<div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>

<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

// Set Data
const data = google.visualization.arrayToDataTable([
  ['Contry', 'Mhl'],
  <?php 
//   $ma_loai_hang=count($list_tk);
//   $i=1;
//   foreach($list_tk as $bieu_do){
//   extract($bieu_do);
//     if($i==$ma_loai_hang)$dauphay=""; else $dauphay=",";
//     echo "['".$bieu_do['ten_dm']."', '".$bieu_do['count_hh']."']";
//     $i+=1;}
    ?>
]);

// Set Options
const options = {
  title:'World Wide Wine Production'
};

// Draw
const chart = new google.visualization.BarChart(document.getElementById('myChart'));
chart.draw(data, options);

}
</script> -->


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
    <?php $ma_loai_hang=count($list_tk);
  $i=1;
  foreach($list_tk as $bieu_do){
  extract($bieu_do);
    if($i==$ma_loai_hang)$dauphay=""; else $dauphay=",";
    echo "['".$bieu_do['ten_dm']."', ".$bieu_do['count_hh']."]".$dauphay;
    $i+=1;}?>
]);

// Set Options
const options = {
  title:'World Wide Wine Production'
};

// Draw
const chart = new google.visualization.PieChart(document.getElementById('myChart'));
chart.draw(data, options);

}
</script>
