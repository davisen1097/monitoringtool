<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

  <?php 

    include("connection.php");
    session_start();
    $monitorid = $_GET['id'];
    $dates = [];
    $pings = [];
    $loadtime = [];


    $query = "SELECT * FROM `monitor_result` WHERE monitors_id = $monitorid";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)){
          $dates[] = $row['monitor_result_date'];
          $pings[] = $row['monitor_result_ping'];
          $loadTimes[] = $row['monitor_result_loadtime'];
        }    
    }
  ?>


  <canvas id="myChart"></canvas>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    
    console.log(<?php echo json_encode($dates) ?>)
    const labels = <?php echo json_encode($dates) ?>;
    var lat = <?php echo json_encode($pings) ?>;
    var ldt = <?php echo json_encode($loadTimes) ?>;


    const data = {
      labels: labels,
      datasets: [{
        label: 'Latency',
        data: lat,
        fill: false,
        borderColor: 'rgb(3, 26, 75)',
        backgroundColor: 'rgb(242, 149, 9)',
        pointBackgroundColor: 'rgb(242, 149, 9)',
        tension: 0.1,
        yAxisID: 'y',
      },
      {
        label: 'Loadtime',
        data: ldt,
        fill: false,
        borderColor: 'rgb(247, 94, 52)',
        backgroundColor: 'rgb(3, 26, 75)',
        pointBackgroundColor: 'rgb(3, 26, 75)',
        tension: 0.1,
        yAxisID: 'y1',
      }]
      
    };

    const config = {
      type: 'line',
      data: data,
      options: {
        responsive: true,
        interaction: {
          mode: 'index',
          intersect: false, 
        },
        stacked: false,
        plugins: {
          title: {
            display: true,
            text: 'Latency and Load Time'
          }
        },
        scales: {
          y: {
            type: 'linear',
            display: true,
            position: 'left',
          },
          y1: {
            type: 'linear',
            display: true,
            position: 'right',

            grid: {
              drawOnChartArea: false, // only want the grid lines for one axis to show up
            }
          }
        }
      }
    };


    var myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
  </script>

</body>