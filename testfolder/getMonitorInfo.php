<?php
session_start();

include("../connection.php");
include("../getDomainInfo.php");
include("../polyfill.php");


// if ($_SERVER['REQUEST_METHOD'] == "POST") {
 
	$monitorUrl = $_GET['url'];
    $info =  new \stdClass();



		if (!empty($monitorUrl)) {
			$domain = $monitorUrl;
			if(str_contains($domain, 'http')) $domain = preg_replace("(^https?://)", "", $monitorUrl );

			$query = "SELECT * FROM domain_info WHERE domain_name = '$domain' limit 1";
			$result = mysqli_query($con, $query);

			if ($result && mysqli_num_rows($result) < 1){
				$info = json_decode(getdomaininfo($domain));
				$ip = $info->ipadd;
				$country = $info->country;
				$name = $info->countryName;
				$query = "INSERT INTO domain_info (domain_name,domain_ip,domain_countryCode, domain_countryName) VALUES ('$domain','$ip','$country', '$name')";
				mysqli_query($con, $query);
			}
            else{
                $info = mysqli_fetch_assoc($result);
            }



		} else {
			echo "Please input a unique Monitor";
		}
?>




<!DOCTYPE html>
<html>


<body>



	<script src="../jquery/jquery.min.js"></script>
	<script src="../jquery/jquery-migrate.min.js"></script>
	<script>
		$(document).ready(function() {

            var info = <?php echo json_encode($info) ?>;
            console.log(info);

        });

	</script>


	<div id=list></div>


</body>

</html>