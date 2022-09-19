<?php

function getdomaininfo($domainName)
{
    $ip = gethostbyname($domainName);
    $bigdata = json_decode(file_get_contents("https://api.bigdatacloud.net/data/country-by-ip?ip={$ip}&key=bdc_ec8afe1d91ad44619e317cafb23964c9"));
    $myObj =  new \stdClass();

    $myObj->ipadd = $ip;
    $myObj->country = $bigdata->country->isoAlpha3;
    $myObj->countryName = $bigdata->country->isoNameFull;

    return json_encode($myObj);
}
?>