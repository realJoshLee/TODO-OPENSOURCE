<?php
$whitelistacti = 'false';
$email = 'josh@hstly.net';
$domain = substr( strrchr( $email, "@" ), 1 );
$whitelist = array('icloud.com','me.com','hstly.net');
if($whitelistacti=='true'){
  echo 'email whitelist enabled';
  if(in_array( $domain, $whitelist ) ) { 
    echo 'true';
  }else{
    echo 'false';
  }
}else{
  echo 'email whitelist disabled';
}