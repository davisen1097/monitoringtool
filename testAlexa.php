<?php 


$domainName = "lexpress.mu";
require("alexa_data.php");
$ip = gethostbyname($domainName);
$bigdata = json_decode(file_get_contents("https://api.bigdatacloud.net/data/country-by-ip?ip={$ip}&key=bdc_ec8afe1d91ad44619e317cafb23964c9"));
$alexa = json_decode(analyseWebsite($domainName));
$myObj =  new \stdClass();

echo $alexa->countryName;
echo "<br>";
echo $alexa->countryCode;

?>