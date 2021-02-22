<?php
  // Error reporting off
  error_reporting(0);

  //Datebase
  $db = new PDO('mysql:dbname=database;host=IP', 'username', 'password');
  $connect = mysqli_connect("IP", "username", "password", "database");
  $conn = new mysqli("IP", "username", "password", "database");

  $password = '64charpass';
  $method = 'aes-256-cbc';
  $key = substr(hash('sha256', $password, true), 0, 32);
  $iv = '16charIV';
  //$decryptedtask = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);
  //$name = base64_encode(openssl_encrypt($namepre, $method, $key, OPENSSL_RAW_DATA, $iv));

  // Account initialization
  session_start();  
  if(!isset($_SESSION["suite"]))  {  
    header("location:../index.php");  
  }

  // Account
  $account = $_SESSION['suite'];
  
  $accountitemsget = $db->prepare("SELECT * FROM `passwordlogin` WHERE `username` = :account");
  $accountitemsget->execute([
    'account' => $account
  ]);
  $accountitems = $accountitemsget->rowCount() ? $accountitemsget : [];
  foreach($accountitems as $item){
    $firstname = $item['firstname'];
    $lastname = $item['lastname'];
    $preminum = $item['preminum'];
    $admin = $item['admin'];
  }

  // Theme
  $themeget = $db->prepare("SELECT * FROM `passwordlogin` WHERE `username` = :account");
  $themeget->execute([
    'account' => $account
  ]);
  $themetoken = $themeget->rowCount() ? $themeget : [];
  foreach($themetoken as $item){
    $theme = $item['theme'];
  }
  
  // Timezone
  date_default_timezone_set('America/Detroit');

?>