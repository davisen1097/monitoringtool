<?php

session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $user_name = $_POST['user_name'];
    $password = md5($_POST['password']);
    $myObj =  new \stdClass();
    $message = "";

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        //read from database
        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] === $password) {

                    $_SESSION['user_id'] = $user_data['id'];
                    // header("Location: index.html");
                    // die;
                }
            }
        }
        else{ $message="wrong username or password!";}
    } else {
        $message="invalid username or password!";
    }
    
    $myObj->message = $message;


    $myJSON = json_encode($myObj);
    
    echo $myJSON;
}

?>