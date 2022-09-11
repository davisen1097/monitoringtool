<?php
session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	if (!empty($user_name) && !empty($password) && !is_numeric($user_name) && !empty($email)) {

		//save to database
		$passwordmd5 = md5($password); // password encryption
		$query = "insert into users (user_name,password,user_email) values ('$user_name','$passwordmd5','$email')";

		mysqli_query($con, $query);

		header("Location: login.php");
		die;
	} else {
		echo "Please enter some valid information!";
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

				<button onclick="window.location.href='login.php'">Login</button>
			</div>
		</div>
	</header>

	<br /><br /><br /><br /><br /><br />

	<div id="box">

		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="username" type="text" name="user_name" placeholder="Enter Username" onfocusout="myFunction()" ><br><br>
			<input id="text" type="password" name="password" placeholder="Enter Password"><br><br>
			<input id="email" type="text" name="email" placeholder="Enter Email" onfocusout="myFunctionemail()" ><br><br> 

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
	<script>
		function myFunction() {
			var x = document.getElementById("username");
			checkDuplicate(x)
		}


		function checkDuplicate(username) {
			var xmlhttp = new XMLHttpRequest();

			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == XMLHttpRequest.DONE) { // XMLHttpRequest.DONE == 4
					if (xmlhttp.status == 200) {
						console.log(xmlhttp.responseText)
						res = JSON.parse(`${xmlhttp.responseText}`)
						if(res.message != "")
						{
							username.value = "";
							alert(res.message);
						}
					} else if (xmlhttp.status == 400) {
						alert('There was an error 400');
					} else {
						alert('something else other than 200 was returned');
					}
				}
			};

			xmlhttp.open("GET", `checkusername.php?username=${username.value}`, true);
			xmlhttp.send();
		}
	</script>




	<script>


		function myFunctionemail() {
			var regex = /[A-Z0-9._%+-]+@(?:[A-Z0-9-]+\.)+[A-Z]{2,}/i
			var x = document.getElementById("email");
			if(regex.test(x.value))  {
				checkmailvalidation(x);
				return;
			}
			if(x.value != "") {
				x.value ="";
				alert("Email format not valid");
			}
		}


			function checkmailvalidation(email) {
				var xmlhttp = new XMLHttpRequest();

				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == XMLHttpRequest.DONE) { // XMLHttpRequest.DONE == 4
						if (xmlhttp.status == 200) {
							console.log(xmlhttp.responseText)
							res = JSON.parse(`${xmlhttp.responseText}`)
							if(res.message != "")
							{
								email.value = "";
								alert(res.message);
							}
						} else if (xmlhttp.status == 400) {
							alert('There was an error 400');
						} else {
							alert('something else other than 200 was returned');
						}
					}
				};

				xmlhttp.open("GET", `emailvalidation.php?email=${email.value}`, true);
				xmlhttp.send();
			}




	</script>




</body>

</html>