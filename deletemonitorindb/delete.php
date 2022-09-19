<?php   
 require '../connection.php';  
 if (isset($_GET['id'])) {  
      $id = $_GET['id'];  
      $query = "DELETE FROM `monitors` WHERE id = '$id'";  
      $run = mysqli_query($con,$query);  
      if ($run) {  
           header('location:../index.html');  
      }else{  
           echo "Error: ".mysqli_error($con);  
      }  
 }  
 ?> 