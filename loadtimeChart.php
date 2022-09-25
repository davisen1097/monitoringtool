<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Document</title>
</head>
<body>

<?php 

  include("connection.php");
  session_start();
  $monitorid = $_GET['id'];
  $dates = [];
  $pings = [];


  $query = "SELECT monitor_result_loadtime, monitor_result_date FROM `monitor_result` WHERE monitors_id = $monitorid";
  $result = mysqli_query($con, $query);
  if ($result && mysqli_num_rows($result) > 0) {

      while($row = mysqli_fetch_assoc($result)){
        $dates[] = $row['monitor_result_date'];
        $ldt[] = $row['monitor_result_loadtime'];
      }    
  }
?>


  <canvas id="myChart"></canvas>
 
<script>
  
  console.log(<?php echo json_encode($dates) ?>)
  const labels = <?php echo json_encode($dates) ?>;
  var nmbrs = <?php echo json_encode($ldt) ?>;

  const data = {
    labels: labels,
    datasets: [{
      label: 'Page Load Time',
      data: nmbrs,
      fill: false,
    borderColor: 'rgb(75, 192, 192)',
    tension: 0.1
    }]
  };

  const config = {
  type: 'line',
  data: data,
};


  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

</body>
</html>