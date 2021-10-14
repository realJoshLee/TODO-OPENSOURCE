<?php
session_start();

include('conf_file.php');
$db = new PDO('mysql:dbname='.$dbname.';host='.$dbip.'', ''.$dbusername.'', ''.$dbpassword.'');
$connect = mysqli_connect("".$dbip."", "".$dbusername."", "".$dbpassword."", "".$dbname."");
$conn = new mysqli("".$dbip."", "".$dbusername."", "".$dbpassword."", "".$dbname."");

// Encryption
$password = $encpassword;
$method = 'aes-256-cbc';
$key = substr(hash('sha256', $password, true), 0, 32);
$iv = $enciv;

// Gets the configuration settings from the database
$configget = $db->prepare("SELECT * FROM `tasks_config` WHERE content = :content");
$configget->execute([
  'content' => 'main_settings'
]);
$configdb = $configget->rowCount() ? $configget : [];
foreach($configdb as $item){
  $whitelisten = $item['whitelist'];
  $whitelistdomainvalues = $item['whitelistvals'];
  $blockipen = $item['blockip'];
  $blockedipvals = $item['blockedipvals'];
  $magiclinken = $item['magic_link'];
  $verificationen = $item['verification'];
  $logpageen = $item['logpage'];
  $sharepeageen = $item['sharepage'];
  $accountmakeen = $item['accountcreate'];
  $bugreporten = $item['bugreport'];
  $themeen = $item['theme'];
  $dataexporten = $item['dataexport'];
  $dataappexporten = $item['dataappexport'];
  $errorreportingen = $item['errorreporting'];
  $reminderemailen = $item['reminderemail'];
  $ipwhitelisten = $item['ipwhitelist'];
  $ipwhitelistval = $item['ipwhitelistval'];
  $dataloginexporten = $item['dataloginexport'];
  $contactemailval = $item['contactemail'];
  $rootwebsiteval = $item['rootwebsite'];
  $fromemailval = $item['fromemail'];
  $fromnameval = $item['fromname'];
  $apipublicval = $item['apipublic'];
  $apiprivateval = $item['apiprivate'];
}
  
if($blockipen=='true'){
  $ipwan = $_SERVER['REMOTE_ADDR'];
 
  if(strpos($blockedipvals, $ipwan) !== false){
    header('Location: ../logout.php?err=blockedip');
  }
}

// Email Verification
$fromemail = $fromemailval; // The email that the verification message will be sent from.
$fromname = $fromnameval; // The name that will be used when the email is sent.
$apipublic = $apipublicval; // API public key from mailjet.com
$apiprivate = $apiprivateval; // API private key from mailjet.com
$rootwebsite = $rootwebsiteval; // Set this to the root url of where tasks is hosted.

// Email Whitelist
//$whitelistacti = 'true';
$whitelistacti = $whitelisten;
//$whitelist = array('hstly.net','madebyjoshlee.com'); // Whitelisted domains

// Error reporting (for devs)
if($errorreportingen=='false'){
  error_reporting(0);
}