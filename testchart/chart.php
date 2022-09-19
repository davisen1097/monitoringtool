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
//   $con = new mysqli('localhost','root','','test');

//   include("connection.php");

//   $query = $con->query("
//     SELECT 
//       MONTHNAME(created) as monthname,
//         SUM(amount) as amount
//     FROM transactions
//     GROUP BY monthname
//   ");

//   foreach($query as $data)
//   {
   
//   }
$month[] = ['April'];
$month[] = ['May'];
$month[] = ['June'];
$month[] = ['July'];
$month[] = ['June'];
$amount = [10, 20, 30, 15, 25] ;
// $amount[] = [20] ;
// $amount[] = [30] ;
// $amount[] = [15] ;
// $amount[] = [25] ;
?>


<div style="width: 500px;">
  <canvas id="myChart"></canvas>
</div>
 
<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($month) ?>;
  var nmbrs = <?php echo json_encode($amount) ?>;

  const data = {
    labels: labels,
    datasets: [{
      label: 'My First Dataset',
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