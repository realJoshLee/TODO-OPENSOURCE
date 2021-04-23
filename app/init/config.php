<?php
/*
  Configure page for the task app.

  Only update things with the comments following the value unless
  you're expierenced and know what you're doing.
  Example of what to only edit:
    $example = 'examplevalue'; // Example instructions
*/

//Datebase
$dbip = ''; // Databse IP address
$dbname = ''; // Database name
$dbusername = ''; // Database username
$dbpassword = ''; // Database password

$db = new PDO('mysql:dbname='.$dbname.';host='.$dbip.'', ''.$dbusername.'', ''.$dbpassword.'');
$connect = mysqli_connect("".$dbip."", "".$dbusername."", "".$dbpassword."", "".$dbname."");
$conn = new mysqli("".$dbip."", "".$dbusername."", "".$dbpassword."", "".$dbname."");

// Encryption
$password = ''; // Generate a random 60 character string (Must be 60 characters.)
$method = 'aes-256-cbc';
$key = substr(hash('sha256', $password, true), 0, 32);
$iv = ''; // Generate a random 16 character string (Must be 16 characters.)





// **************************************************
// **************************************************
// ONLY EDIT THE '$whitelist' VALUES PAST THIS POINT.
// **************************************************
// **************************************************

// Gets the configuration settings from the database
$configget = $db->prepare("SELECT * FROM `tasks_config` WHERE content = :content");
$configget->execute([
  'content' => 'main_settings'
]);
$configdb = $configget->rowCount() ? $configget : [];
foreach($configdb as $item){
  $whitelisten = $item['whitelist'];
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
  $dataloginexporten = $item['dataloginexport'];
  $contactemailval = $item['contactemail'];
  $rootwebsiteval = $item['rootwebsite'];
  $fromemailval = $item['fromemail'];
  $fromnameval = $item['fromname'];
  $apipublicval = $item['apipublic'];
  $apiprivateval = $item['apiprivate'];
}

// Email Verification
$fromemail = $fromemailval; // The email that the verification message will be sent from.
$fromname = $fromnameval; // The name that will be used when the email is sent.
$apipublic = $apipublicval; // API public key from mailjet.com
$apiprivate = $apiprivateval; // API private key from mailjet.com
$rootwebsite = $rootwebsiteval; // Set this to the root url of where tasks is hosted.

// Email Whitelist
$whitelistacti = $whitelisten;
$whitelist = array('example.com','example.net'); // Whitelisted domains

// Error reporting (for devs)
if($errorreportingen=='false'){
  error_reporting(0);
}