<?php
require 'checkuniquemail.php';
$email = $_GET['email'];
$myObj =  new \stdClass();
$message = "";

// if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    
//     $message = "invalid format";
    
// }

if(isunique($email)->message != "" ){

    $message = "Email already exist" ; 

    $myObj->emailresult = $message;


    $myJSON = json_encode($myObj);

    exit( $myJSON);

}

$api_key = "60fe3f2c2d674d1bb0de7684cd82a1ca";  //new api key used - apitestxxx@gmail.com/Davisen1097 and this is the link to API usage - https://app.abstractapi.com/api/email-validation/usage

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

$myObj->emailresult = $message;


$myJSON = json_encode($myObj);

echo $myJSON;
