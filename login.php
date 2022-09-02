<?php

session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $user_name = $_POST['user_name'];
    $password = md5($_POST['password']) ;

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        //read from database
        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] === $password) {

                    $_SESSION['user_id'] = $user_data['id'];
                    header("Location: index.html");
                    die;
                }
            }
        }

        echo "wrong username or password!";
    } else {
        echo "wrong username or password!";
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
</head>

<body>

    <style type="text/css">
        #text {

            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
        }

        #button {

            padding: 10px;
            width: 100px;
            color: white;
            background-color: lightblue;
            border: none;
        }

        #box {

            background-color: grey;
            margin: auto;
            width: 300px;
            padding: 20px;
        }
    </style>

    <style type="text/css">
        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }

        .topnav-right {
            float: right;
            padding-top: 0.3cm;
            padding-right: 0.5cm;
        }
    </style>

    <header>
        <div class="topnav">
            <a class="active" href="index.html">Home</a>

            <a href="#Button2">Buttontest</a>
            <div class="topnav-right">

                &nbsp&nbsp&nbsp;

                <button onclick="window.location.href='signup.php'">Signup</button>
            </div>
        </div>
    </header>

    <br /><br /><br /><br />

    <div id="box">

        <form method="post">
            <div style="font-size: 20px;margin: 10px;color: white;">Login</div>

            <input id="username" type="text" name="user_name"><br><br>
            <input id="pword" type="password" name="password"><br><br>

            <input id="button" type="submit" value="Login"><br><br>

            <a href="signup.php">Click to Register</a><br><br>
        </form>
    </div>
</body>

</html>