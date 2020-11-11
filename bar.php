reate a new file inside chartjs project folder and name it bargraph.html this file is going to display bar graph.

File: bargraph.html

<!DOCTYPE html>
<html>
  <head>
    <title>ChartJS - BarGraph</title>
    <style type="text/css">
      #chart-container {
        width: 640px;
        height: auto;
      }
    </style>
  </head>
  <body>
    <div id="chart-container">
      <canvas id="mycanvas"></canvas>
    </div>

    <!-- javascript -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="Chart.min.js"></script>
    <script type="text/javascript" src="app.js"></script>
  </body>
</html>
