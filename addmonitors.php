<?php
session_start();

include("connection.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$monitorName = $_POST['name'];
	$monitorUrl = $_POST['url'];

    
    if (isset($_SESSION['user_id']))
    {
        if(!empty($monitorName) && !empty($monitorUrl))
        {
            $userId = $_SESSION['user_id'];
            $query = "INSERT INTO monitors (users_id,monitors_name,monitors_url) VALUES ('$userId','$monitorName','$monitorUrl') ";
            mysqli_query($con,$query);
            header("Refresh:0");
            die;
        }
        else{
            echo "values are empty";
        }
    }
}
?>




<!DOCTYPE html>
<html>

<head>
	<title>Signup</title>
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
			width: auto;
            height:auto;
			padding: 20px;
            margin-top: -100px;
		}
	</style>

	<br /><br /><br /><br /><br /><br />

	<div id="box">

		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Add Monitor</div>

			<input id="text" type="text" name="name" placeholder="Enter Monitor name"><br><br>
			<input id="text" type="text" name="url" placeholder="Enter Monitor Url"><br><br>

			<input id="button" type="submit" value="add monitor"><br><br>
		</form>
	</div>

    <div id=list></div>

    <script src="./jquery/\jquery.min.js"></script>
    <script src="./jquery/jquery-migrate.min.js"></script>
    <script>
        $(document).ready(function() {
            loadXMLDoc();
        });


        function loadXMLDoc() {
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == XMLHttpRequest.DONE) { // XMLHttpRequest.DONE == 4
                if (xmlhttp.status == 200) {
                    console.log(xmlhttp.responseText)
                    //res = JSON.parse(`${xmlhttp.responseText}`)
                    //console.log(res)
                }
                else if (xmlhttp.status == 400) {
                    alert('There was an error 400');
                }
                else {
                    alert('something else other than 200 was returned');
                }
                }
            };

            xmlhttp.open("GET", "getmonitors.php", true);
            xmlhttp.send();
        }

    </script>
</body>

</html>