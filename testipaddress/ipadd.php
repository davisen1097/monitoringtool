<?php


$webaddress = "www.facebook.com" ; 
echo "<p> the website should be here: " .gethostbyname($webaddress). "</p>" ;



// $apiKey = "abc4b1ad37c944529a6b0d56380fa7e6";
// $ip = gethostbyname($webaddress);
// $location = get_geolocation($apiKey, $ip, "en", "*", "");
// $decodedLocation = json_decode($location, true);

// echo "<pre>";
// print_r($decodedLocation);
// echo "</pre>";

// function get_geolocation($apiKey, $ip, $lang = "en", $fields = "*", $excludes = "", $include = "") {
//     $url = "https://api.ipgeolocation.io/ipgeo?apiKey=".$apiKey."&ip=".$ip."&lang=".$lang."&fields=".$fields."&excludes=".$excludes."&include=".$include;
//     $cURL = curl_init();
//     curl_setopt($cURL, CURLOPT_URL, $url);
//     curl_setopt($cURL, CURLOPT_HTTPGET, true);
//     curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
//         'Content-Type: application/json',
//         'Accept: application/json'
//     ));
    
//     return curl_exec($cURL);
// }




$ip = gethostbyname($webaddress);
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
echo $details->city; // -> "Mountain View"
echo"<br>";
echo $details->country;

?>

