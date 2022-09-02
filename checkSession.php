<?php 
session_start();

    $res = false;
    $myObj =  new \stdClass();

    if (isset($_SESSION['user_id']))
    {
        $res = true;
    }

    $myObj->islogged = $res;
    
    $myJSON = json_encode($myObj);
    
    echo $myJSON;

?>