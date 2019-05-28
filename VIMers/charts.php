  <html>
  <head>
      <title>Results</title>
      <?php
        $middle = 0;    
        $phrase = file_get_contents("charts.txt");    
        $names = array();
        $ranks = array();
        $dates = array();
        



        $first_pos = strpos($phrase, '|', 0) + 1;
        
        $second_pos = strpos($phrase, "|", $first_pos + 1);
        
        $third_pos = strpos($phrase, "|", $second_pos + 1);
        
        $fourth_pos = strpos($phrase, "|", $third_pos + 1);
        
        $first_pos = strpos($phrase, "|", $fourth_pos + 1);        
        

        $i = 0;
        $name = substr($phrase, $first_pos, $second_pos - $first_pos);
        $rank = substr($phrase, $second_pos + 1, $third_pos - $second_pos - 1);
        $date = substr($phrase, $third_pos + 1, $fourth_pos - $third_pos - 1);


        $dates[0] = $date;
        $names[0] = $name;
        $ranks[0] = $rank;



        while (strpos($phrase, "|", $fourth_pos + 1) != FALSE) {
            $first_pos = strpos($phrase, "|", $fourth_pos + 1)+1;        
            $second_pos = strpos($phrase, "|", $first_pos + 1);
            $third_pos = strpos($phrase, "|", $second_pos + 1);
            $fourth_pos = strpos($phrase, "|", $third_pos + 1);
            

            $name = substr($phrase, $first_pos, $second_pos - $first_pos);
            $rank = substr($phrase, $second_pos + 1, $third_pos - $second_pos - 1);
            $date = substr($phrase, $third_pos + 1, $fourth_pos - $third_pos - 1);

            


            $i += 1;

            $dates[$i] = $date;
            $names[$i] = $name;
            $ranks[$i] = $rank;

        }
        
      ?>
      <meta charset = "utf-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['День месяца', 'Грамотность(%)'],
          [<?php
            echo $dates[0];
            echo ',';
            for($i = 0; $i < count($dates);$i++){
                $middle+= $ranks[$i];
                
            }
            echo $middle/count($dates);
            ?>]
            
            
        ]);

        var options = {
          title: 'Company Performance',          
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>
