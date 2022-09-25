<?php
session_start();

include("connection.php");
include("getDomainInfo.php");
include("polyfill.php");



if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$monitorName = $_POST['name'];
	$monitorUrl = $_POST['url'];


	if (isset($_SESSION['user_id'])) {
		if (!empty($monitorName) && !empty($monitorUrl)) {
			$userId = $_SESSION['user_id'];
			$domain = $monitorUrl;
			if(str_contains($domain, 'http')) $domain = preg_replace("(^https?://)", "", $monitorUrl );


			$query = "INSERT INTO monitors (users_id,monitors_name,monitors_url) VALUES ('$userId','$monitorName','$monitorUrl') ";
			mysqli_query($con, $query);

			$query = "SELECT domain_name FROM domain_info WHERE domain_name = '$domain' limit 1";
			$result = mysqli_query($con, $query);

			if ($result && mysqli_num_rows($result) < 1){
				$info = json_decode(getdomaininfo($domain));
				$ip = $info->domain_ip;
				$country = $info->domain_countryCode;
				$name = $info->domain_countryName;
                $localrank = $info->domain_localRank;
                $globalrank = $info->domain_globalRank;
                $certValidFrom = $info->domain_certValidFrom;
                $certValidTo = $info->domain_certValidTo;
                $certIssuer = $info->domain_certIssuer;
				$query = "INSERT INTO domain_info (domain_name, domain_ip, domain_countryCode, domain_countryName, domain_localRank, domain_globalRank, domain_certValidFrom, domain_certValidTo, domain_certIssuer) 
                VALUES ('$domain','$ip','$country', '$name', '$localrank', '$globalrank', '$certValidFrom', '$certValidTo', '$certIssuer' )";
				mysqli_query($con, $query);
			}

			header("Refresh:0");
			die;
		} else {
			// echo "Please input a unique Monitor";
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

			<input id="button" type="submit" value="Add monitor"><br><br>
		</form>
	</div>
	
	<section class="center" id="monitorsList" style="width: 90%;height: 500px">
	</section>



	<script src="./jquery/\jquery.min.js"></script>
	<script src="./jquery/jquery-migrate.min.js"></script>
	<script>
		$(document).ready(function() {
			getMonitors();
		});

		function getMonitors() {
			document.getElementById("monitorsList").innerHTML += '<object type="text/html" style="width: 85%; height:100%" data="monitorslistview.html" ></object>';
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