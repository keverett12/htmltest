<?php
 $con = mysqli_connect('localhost','chart','password','test1') or die("error");
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.j$
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Temperature'],
          <?php

          $query = "SELECT * FROM temp";
           $result = mysqli_query($con, $query);

          while($row = mysqli_fetch_array($result))
          {
            echo "['" . $row['Date'] . "'," . $row['temperature'] . "],";
          }

          ?>
        ]);

        var options = {
          title: 'Temperature',
          hAxis: {title: 'Date/time',  titleTextStyle: {color: '#323'}},
          vAxis: {title: 'Degrees in Celcius', minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById($
        chart.draw(data, options);
      }
    </script>
        <link rel="stylesheet" type="text/css" href="testcode.css">
  </head>
  <body>
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
        <p><b>Time Search</b></p>
    <form action="search.php" method="GET">
        <input type="submit" value= "search" href="#" class="myButton" />
       <input type="text" name="query" />
    </form>
</body>
</html>

<?php
mysqli_close($con);
?>

