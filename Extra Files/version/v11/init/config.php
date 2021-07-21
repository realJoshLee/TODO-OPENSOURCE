<?php
session_start();  
/*
  Configure page for the task app.

  Only update things with the comments following the value unless
  you're expierenced and know what you're doing.
  Example of what to only edit:
    $example = 'examplevalue'; // Example instructions
*/

//Datebase
$dbip = '10.0.1.98'; // Databse IP address
$dbname = 'webapps'; // Database name
$dbusername = 'josh'; // Database username
$dbpassword = 'password1'; // Database password

$db = new PDO('mysql:dbname='.$dbname.';host='.$dbip.'', ''.$dbusername.'', ''.$dbpassword.'');
$connect = mysqli_connect("".$dbip."", "".$dbusername."", "".$dbpassword."", "".$dbname."");
$conn = new mysqli("".$dbip."", "".$dbusername."", "".$dbpassword."", "".$dbname."");

// Encryption
$password = 'Z&HMSbe@CU5^Ry4rm3fyzQy&R!G$d&XWX#VvKr5b4DJXG7W$vupnCnYtNh@S'; // Generate a random 60 character string (Must be 60 characters.)
$method = 'aes-256-cbc';
$key = substr(hash('sha256', $password, true), 0, 32);
$iv = 'uss%6y@wRJsUD8D9'; // Generate a random 16 character string (Must be 16 characters.)





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
  $reminderemailen = $item['reminderemail'];
  $dataloginexporten = $item['dataloginexport'];
  $contactemailval = $item['contactemail'];
  $rootwebsiteval = $item['rootwebsite'];
  $fromemailval = $item['fromemail'];
  $fromnameval = $item['fromname'];
  $apipublicval = $item['apipublic'];
  $apiprivateval = $item['apiprivate'];
}

// Email Verification
//$fromemail = 'no-reply@madebyjoshlee.com';
//$fromname = 'no-reply';
//$apipublic = '8177233b1b15fe594644aa7297c16d83';
//$apiprivate = '1a18c10747725843b92f84f4a69429cb';
//$rootwebsite = 'tasks.hstly.net';
$fromemail = $fromemailval; // The email that the verification message will be sent from.
$fromname = $fromnameval; // The name that will be used when the email is sent.
$apipublic = $apipublicval; // API public key from mailjet.com
$apiprivate = $apiprivateval; // API private key from mailjet.com
$rootwebsite = $rootwebsiteval; // Set this to the root url of where tasks is hosted.

// Email Whitelist
//$whitelistacti = 'true';
$whitelistacti = $whitelisten;
$whitelist = array('madebyjoshlee.com','hstly.net'); // Whitelisted domains

// Error reporting (for devs)
if($errorreportingen=='false'){
  error_reporting(0);
}