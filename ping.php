<?php
  include("polyfill.php");
  include("connection.php");

  error_reporting(E_ERROR | E_PARSE);
  session_start();
  $link = $_GET['urlToPing'];

  session_start();

  if (!str_contains($link, 'http')) { 
    $link = completeUrl($link) ;
  }




  function ping($link, $port, $timeout) { 
  $domain = parse_url($link)['host'];
    $tB = microtime(true); 
    $fP = fSockOpen($domain, $port, $errno, $errstr, $timeout); 
    if (!$fP) { return "down"; } 
    $tA = microtime(true); 
    return round((($tA - $tB) * 1000), 0); 
  }

  function pageloadtime($link){
      $startTime = microtime(true);
      $page_cnt = file_get_contents($link);
      $endTime = microtime(true);
      return round((($endTime - $startTime) * 1000), 0);
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
  if($link)
  {
    $ping = ping($link, 80, 10);
    $loadtime = pageloadtime($link);

    if(isset($_GET['monitor']))
    {
      $monitor = $_GET['monitor'];
      $query = "INSERT INTO monitor_result (monitors_id,monitor_result_ping,monitor_result_loadtime) VALUES ($monitor,$ping,$loadtime)";
      mysqli_query($con, $query);
    }
    echo "[$link] - Server response time [$ping]ms - Page load time [$loadtime]ms";
  }
  else echo "please verify your link and try again";

?> 

