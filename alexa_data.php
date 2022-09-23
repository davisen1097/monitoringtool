<?php

    function analyseWebsite($url)
    {
        $myObj =  new \stdClass();
        $ranking = null;
        $country = null;
        $countrycode = null;

        $xml = simplexml_load_file('http://data.alexa.com/data?cli=10&dat=snbamz&url=' . $url);
        $rank = isset($xml->SD[1]->POPULARITY) ? $xml->SD[1]->POPULARITY->attributes()->TEXT : 0;
        $web = (string)$xml->SD[0]->attributes()->HOST;

        if(isset($xml->SD[1]->COUNTRY))
        {    
            $country = (string)$xml->SD[1]->COUNTRY->attributes()->NAME;
            $ranking = (string)$xml->SD[1]->COUNTRY->attributes()->RANK;
            $countrycode = (string)$xml->SD[1]->COUNTRY->attributes()->CODE;
        }

        if(isset($xml->SD[1]->REACH)) $worldrank = (string)$xml->SD[1]->REACH->attributes()->RANK;

        $myObj->domainName = $web;
        $myObj->localRank = $ranking;
        $myObj->globalRank = $worldrank;
        $myObj->countryCode = $countrycode;
        $myObj->countryName = $country;

        return json_encode($myObj);
    }
?>