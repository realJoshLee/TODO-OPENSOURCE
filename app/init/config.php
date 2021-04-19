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

// Email Verification
$fromemail = 'no-reply@example.com'; // The email that the verification message will be sent from.
$fromname = 'no-reply'; // The name that will be used when the email is sent.
$apipublic = ''; // API public key from mailjet.com
$apiprivate = ''; // API private key from mailjet.com
$rootwebsite = 'tasks.example.com'; // Set this to the root url of where tasks is hosted.

// Email Whitelist
$whitelistacti = 'false'; // Enables and disables whitelist (true for enabled whitelist and false for diabled whitelist).
$whitelist = array('google.com','example.com'); // Whitelisted domains
