<?php
session_start();

include("connection.php");
include("getDomainInfo.php");
require("polyfill.php");

    $monitorUrl = $_GET['url'];
    $info =  new \stdClass();


		if (!empty($monitorUrl)) {
			$domain = $monitorUrl;
			if(str_contains($domain, 'http')) $domain = preg_replace("(^https?://)", "", $monitorUrl );

			$query = "SELECT * FROM domain_info WHERE domain_name = '$domain' limit 1";
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
            else{
                $info = mysqli_fetch_assoc($result);
            }
		} else {
			echo "Please input a unique Monitor";
		}
    echo json_encode($info);
?>