<?php 
include("connection.php");

session_start();

    $res = false;
    $myObj =  new \stdClass();
    $userdata = "";

    if (isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $res = true;
        $query = "select user_name from users where id = '$id' limit 1";

        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) {

            $userdata = mysqli_fetch_assoc($result);
        }
    }

    $myObj->islogged = $res;
    $myObj->userdata = $userdata;
    
    $myJSON = json_encode($myObj);
    
    echo $myJSON;

?>