<?php

function completeUrl($link)
{
  require("polyfill.php");

  $bestUrl = $link;
  if (!str_contains($bestUrl, 'http')) 
  { 
    $scheme_list = ['https://www.','https://', 'http://www.', 'http://'];
    $bestUrl = false;
    foreach($scheme_list as $scheme){
      $res = get_headers($scheme.$link);
      if($res)
      {
        $bestUrl = $scheme.$link;
        break;
      }
    }
  }

  return $bestUrl;
}
?>