<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
$link = $_GET['utlToPing'];

$tested = "tested ";
if (!str_contains($link, 'http')) { 
  $link = completeUrl($link) ;
}




  function ping($link, $port, $timeout) { 
  $domain = parse_url($link)['host'];
    $tB = microtime(true); 
    $fP = fSockOpen($domain, $port, $errno, $errstr, $timeout); 
    if (!$fP) { return "down"; } 
    $tA = microtime(true); 
    return round((($tA - $tB) * 1000), 0)." ms"; 
  }

  function pageloadtime($link){
      $startTime = microtime(true);
      $page_cnt = file_get_contents($link);
      $endTime = microtime(true);
      return round((($endTime - $startTime) * 1000), 0)." ms"; 
      return round((($endTime - $startTime) * 1000), 0)." ms"; 
      return round((($endTime - $startTime) * 1000), 0)." ms"; 
  }


  function completeUrl($domainOnly)
  {
    $scheme_list = ['https://www.','https://', 'http://www.', 'http://'];
    $bestUrl = false;
    foreach($scheme_list as $scheme){

        $res = get_headers($scheme.$domainOnly);
        if($res){
             $bestUrl = $scheme.$domainOnly;
             break;
        }
    }

    return $bestUrl;
  }
  if($link) echo "[". $link ."] server response time [".ping($link, 80, 10)."] - Page load [". pageloadtime($link)."]";
  else echo "please verify your link and try again";

?> 

