<?php

$email = $_GET['email'];
$myObj =  new \stdClass();
$message = "";

// if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    
//     $message = "invalid format";
    
// }

$api_key = "86139ef78d6f409d91b6200b640872ac";  //api key

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => "https://emailvalidation.abstractapi.com/v1?api_key=$api_key&email=$email",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true
]);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);

if ($data['deliverability'] === "UNDELIVERABLE") {
    
    $message = "Email Invalid";
    
}

if ($data["is_disposable_email"]["value"] === true) {
    
    $message = "Disposable";
    
}

$myObj->message = $message;


$myJSON = json_encode($myObj);

echo $myJSON;
