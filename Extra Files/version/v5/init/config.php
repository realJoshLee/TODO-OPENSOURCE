<?php
/*
  Configure page for the task app.

  Only update things with the comments following the value unless
  you're expierenced and know what you're doing.
  Example of what to only edit:
    $example = 'examplevalue'; // Example instructions
*/

// Error reporting (for devs)
error_reporting(0); // Set blank to enable error reporting and 0 to disable error reporting.

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

// Email Verification
$fromemail = 'no-reply@madebyjoshlee.com'; // The email that the verification message will be sent from.
$fromname = 'no-reply'; // The name that will be used when the email is sent.
$apipublic = '8177233b1b15fe594644aa7297c16d83'; // API public key from mailjet.com
$apiprivate = '1a18c10747725843b92f84f4a69429cb'; // API private key from mailjet.com
$rootwebsite = 'tasks.hstly.net'; // Set this to the root url of where tasks is hosted.

// Email Whitelist
$whitelistacti = 'true'; // Enables and disables whitelist (true for enabled whitelist and false for diabled whitelist).
$whitelist = array('madebyjoshlee.com','hstly.net'); // Whitelisted domains
