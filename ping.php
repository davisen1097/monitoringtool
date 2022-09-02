<?php
session_start();
$link = $_GET['utlToPing'];


function ping($host, $port, $timeout) { 
    $tB = microtime(true); 
    $fP = fSockOpen($host, $port, $errno, $errstr, $timeout); 
    if (!$fP) { return "down"; } 
    $tA = microtime(true); 
    return round((($tA - $tB) * 1000), 0)." ms"; 
  }

function pageloadtime($link){
    $startTime = microtime(true);
    $page_cnt = file_get_contents("http://www.".$link);
    $endTime = microtime(true);
    return round((($endTime - $startTime) * 1000), 0)." ms"; 
}
  
  //Echoing it will display the ping if the host is up, if not it'll say "down".
  echo "[". $link ."] server response time ".ping($link, 80, 10). " & Page load is - ". pageloadtime($link);  
?> 

