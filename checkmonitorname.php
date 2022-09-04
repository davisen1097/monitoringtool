<?php
session_start();

include("connection.php");



    $monitorName = $_GET['monitorName'];
    $myObj =  new \stdClass();
    $message = "";

    if (isset($_SESSION['user_id'])) {
        if (!empty($monitorName)) {
            $userId = $_SESSION['user_id'];
            $query = " SELECT * FROM monitors WHERE users_id  = $userId AND monitors_name = '$monitorName'  ";
            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $message = "Monitor name already taken for this user";
            }
        } else {
            $message = "monitorName is empty";
        }
    }else {
        $message = "user not logged in";
    }

    $myObj->message = $message;


    $myJSON = json_encode($myObj);
    
    echo $myJSON;

