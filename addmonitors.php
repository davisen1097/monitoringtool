<?php
session_start();

include("connection.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$monitorName = $_POST['name'];
	$monitorUrl = $_POST['url'];


	if (isset($_SESSION['user_id'])) {
		if (!empty($monitorName) && !empty($monitorUrl)) {
			$userId = $_SESSION['user_id'];
			$query = "INSERT INTO monitors (users_id,monitors_name,monitors_url) VALUES ('$userId','$monitorName','$monitorUrl') ";
			mysqli_query($con, $query);
			header("Refresh:0");
			die;
		} else {
			echo "values are empty";
		}
	}
}
?>




<!DOCTYPE html>
<html>


<body>

	<style type="text/css">
		.text {

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
			width: 50%;
			height: auto;
			padding: 20px;
			margin-top: -100px;
		}

		.center {
			margin-top: 2em;
			width: 30em;
			margin: auto;
			padding: 20px;
		}
	</style>

	<br /><br /><br /><br /><br /><br />

	<div id="box">

		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Add Monitor</div>

			<input id="monitorname" type="text" name="name" placeholder="Enter Monitor name" onfocusout="myFunction()"><br><br>
			<input id="text" type="text" name="url" placeholder="Enter Monitor Url"><br><br>

			<input id="button" type="submit" value="add monitor"><br><br>
		</form>
	</div>

	<section class="center" id="monitorsList" style="height: 500px">
		<label>Current Monitors</label>
	</section>



	<script src="./jquery/\jquery.min.js"></script>
	<script src="./jquery/jquery-migrate.min.js"></script>
	<script>
		$(document).ready(function() {
			getMonitors();
		});

		function getMonitors() {
			document.getElementById("monitorsList").innerHTML += '<object type="text/html" style="width: 100%; height:100%" data="monitorslistview.html" ></object>';
		}

		function myFunction() {
			var x = document.getElementById("monitorname");
			checkDuplicate(x)
		}




		function checkDuplicate(monitornameInput) {
			var xmlhttp = new XMLHttpRequest();

			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == XMLHttpRequest.DONE) { // XMLHttpRequest.DONE == 4
					if (xmlhttp.status == 200) {
						res = JSON.parse(`${xmlhttp.responseText}`)
						if(res.message != "")
						{
							monitornameInput.value = "";
							alert(res.message);
						}
					} else if (xmlhttp.status == 400) {
						alert('There was an error 400');
					} else {
						alert('something else other than 200 was returned');
					}
				}
			};

			xmlhttp.open("GET", `checkmonitorname.php?monitorName=${monitornameInput.value}`, true);
			xmlhttp.send();
		}
	</script>


	<div id=list></div>


</body>

</html>