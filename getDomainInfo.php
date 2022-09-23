<?php

function getdomaininfo($domainName)
{
    require("alexa_data.php");
    require("getSSLInfo.php");
    require("urlFix.php");
    $ip = gethostbyname($domainName);
    $alexa = json_decode(analyseWebsite($domainName));
    $ssl = json_decode(getSSLInfo(completeUrl($domainName)));
    $myObj =  new \stdClass();

    $myObj->domain_ip = $ip;
    $myObj->domain_countryCode = $alexa->countryCode;
    $myObj->domain_countryName = $alexa->countryName;
    $myObj->domain_localRank = $alexa->localRank;
    $myObj->domain_globalRank = $alexa->globalRank;
    $myObj->domain_certValidFrom = $ssl->validFrom;
    $myObj->domain_certValidTo = $ssl->validTo;
    $myObj->domain_certIssuer = $ssl->issuerName . " [". $ssl->issuerCountry . "]";
    return json_encode($myObj);
}

// echo getdomaininfo("facebook.com");
?>