<html>
  <head>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
   <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']}); 
    google.charts.setOnLoadCallback(drawChart); 

    function drawChart() { 
      var jsonData = $.ajax({ 
          url: "<?php echo base_url('Admin/coba')?>", 
          dataType: "json", 
          async: false 
          }).responseText; 

      // Create our data table out of JSON data loaded from server. 
      var data = new google.visualization.DataTable(jsonData); 

      // Instantiate and draw our chart, passing in some options. 
      var chart = new google.visualization.PieChart(document.getElementById('chart_div')); 
      chart.draw(data, {width: 700, height: 500}); 
    } 
  </script>
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>