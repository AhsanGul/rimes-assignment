<?php
/**
 * Application Name:     RIMES Assignment 
 * Author:   				     Ahsan Gul <ahsan_ansian@yahoo.com>
 * Description:          User registration and login system where users can publish articles or news.<br>
 * 							         Chart is displayed based on letters 'r', 'i', 'm', 'e', and 's' occurances in articles.
 * 
**/

session_start();
include "db_conn.php";
if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
  // define letters and search in all the articles
  $letters = ['r', 'i', 'm', 'e', 's'];
  $lettersCounts = array_fill_keys($letters, 0);
  $sql = "SELECT article FROM articles";
  $result = mysqli_query($conn, $sql);
  $all_rows = mysqli_fetch_all($result);
  foreach($all_rows as $article){
    foreach($letters as $letter){
      $lettersCounts[$letter] += substr_count($article[0], $letter);
    }
  }
  
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<title>HOME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
	  <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Characters');
        data.addColumn('number', 'Count');
        var json_data = <?php echo json_encode($lettersCounts);?>;
        var response = [];
        for(var i in json_data){
          response.push([i, json_data [i]]);
        }
        data.addRows(response);
        var options = {title:'Count of Letters (r, i, m, e, s) in the articles',
                       width:700,
                       height:400,
                       hAxis: {minValue: 0},
                       curveType: 'function',
                       legend: {position: 'bottom'},
                       colors: ['#5BC0EB'],
                       is3D:true};
        // Instantiate and draw our chart, passing in options.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>
<?php

include_once 'menu.php';

if (isset($_SESSION['error'])) {
  echo '<p class="error"> '. $_SESSION['error'] . '</p>';
  unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
  echo '<p class="success"> '. $_SESSION['success'] . '</p>';
  unset($_SESSION['success']);
}

?>
  <div class="container">
    <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
    <div style="width: 100%; height: 400px; margin-top: 20px;" id="chart_div"></div>
    <div class="badge">
      <span class="badge-text">Total Articles</span>
      <span class="badge-number"><?php echo number_format(count($all_rows)); ?></span>
    </div>
  </div>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>