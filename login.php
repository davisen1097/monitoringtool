<?php
    session_start();

    include("connection.php");
    include("functions.php");
    require("twoFA.php");
    $message = "PHP read Error";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $message = "DB connection error";


        $user_name = $_POST['user_name'];
        $password = md5($_POST['password']);
        $myObj =  new \stdClass();

        if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
            $message = "SQL query error";

            $query = "select * from users where user_name = '$user_name' limit 1";
            $result = mysqli_query($con, $query);

            if($result){
                $message = "Query Result Error";

                if ($result && mysqli_num_rows($result) > 0) {
                    $user_data = mysqli_fetch_assoc($result);
                    if ($user_data['password'] === $password) {

                        generate2FA($user_data['id']);
                        $message="user authenticated";
                        // header("Location: index.html");
                        // die;
                    }

                } else{ $message="wrong username or password!";}
            }

        } else { $message="invalid username or password!"; }
            
        $myObj->authmessage = $message;
        $myJSON = json_encode($myObj);
        echo $myJSON;
    } 


?>