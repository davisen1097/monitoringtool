<?php
session_start();

include("connection.php");



    $username = $_GET['username'];
    $myObj =  new \stdClass();
    $message = "";

  
        if (!empty($username)) {
            $query = " SELECT * FROM users WHERE user_name  = '$username' ";
            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $message = "User name already taken";
            }
        } 
    $myObj->message = $message;


    $myJSON = json_encode($myObj);
    
    echo $myJSON;

