<html>
  <?php
   $connect = mysqli_connect("localhost","root","","magang");
   $query   = "SELECT nama_pic,real_pendapatan from t_data_utama";
   $result  = mysqli_query($connect,$query);
   ?>
  <head>
<!--   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
 -->
  </head>
  <body>
    <div id="chart_div"></div>
    <script type="text/javascript">
    var barChartData = {
   labels: [1, 2, 3, 4, 5, 6, 7, 8, 9],
   datasets: [{
     type: 'bar',
     label: "Actual",
     data: [1.1, 0.5, 1.4, 1.1, 0.5, 1.4, 1.1, 0.5, 2],
     fill: false,
     backgroundColor: '#71B37C',
     borderColor: '#71B37C',
     hoverBackgroundColor: '#71B37C',
     hoverBorderColor: '#71B37C',
     yAxisID: 'y-axis-1'
   }]
 };

 var ctxActualVsMax = document.getElementById("chart_div");
 var theChart = new Chart(ctxActualVsMax, {
   type: 'bar',
   data: barChartData,
   options: {
     responsive: true,
     tooltips: {
       mode: 'label'
     },
     elements: {
       line: {
         fill: false
       }
     },
     scales: {
       xAxes: [{
         display: true,
         gridLines: {
           display: false
         },
         labels: {
           show: true,
         }
       }],
       yAxes: [{
         type: "linear",
         display: true,
         position: "left",
         id: "y-axis-1",
         gridLines: {
           display: false
         },
         labels: {
           show: true,

         },
         ticks: {
           beginAtZero: true,
           userCallback: function(label, index, labels) {
             if (Math.floor(label) === label) {
               return label;
             }

           },
         }

       }]
     }
   }
 });

    </script>
  </body>
</html>
