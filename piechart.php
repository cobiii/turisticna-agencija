<html>
  <head>
      <?php
      include 'database.php';
      include 'session.php';

       $query="SELECT d.title,count(v.user_id) as num FROM vacations v inner join destinations d on d.id=v.destination_id group by title ORDER BY num DESC";
       
       $result= mysqli_query($link, $query);
       
      $count= mysqli_num_rows($result);
      ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

         var data = google.visualization.arrayToDataTable([
      ['Destinacije', 'Število'],
      <?php
      if($count > 0){
          while($row = mysqli_fetch_assoc($result)){
            echo "['".$row['title']."', ".$row['num']."],";
          }
      }
      ?>
    ]);

        var options = {
          title: 'Priljubljene destinacije'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>