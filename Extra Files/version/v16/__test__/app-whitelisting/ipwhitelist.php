<?php
$ip = $_SERVER['REMOTE_ADDR'];
$whitelist = "1.1.1.1";
 
if(strpos($whitelist, $ip) !== false){
  echo 'true<br>';
}