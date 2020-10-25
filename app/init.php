<?php
  // Error reporting off
  error_reporting(0);

  //Datebase
  $dbname = '';
  $ip = '';
  $usernae = '';
  $password = '';

  $db = new PDO('mysql:dbname=$dbname;host=$ip', '$username', '$password');
  $connect = mysqli_connect("$ip", "$username", "$password", "$database");
  $conn = new mysqli("$ip", "$username", "$password", "$database");

  // Encryption
  // Set the password to a 60 character string
  $password = 'import here';
  $method = 'aes-256-cbc';
  $key = substr(hash('sha256', $password, true), 0, 32);
  // Set the IV to a random 16 character string
  $iv = '';
  //$decryptedtask = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);
  //$name = base64_encode(openssl_encrypt($namepre, $method, $key, OPENSSL_RAW_DATA, $iv));

  // Account initialization
  session_start();  
  if(!isset($_SESSION["suite"]))  {  
    header("location:../index.php");  
  }

  // Account
  $account = $_SESSION['suite'];;
  
  $accountitemsget = $db->prepare("SELECT * FROM `passwordlogin` WHERE `username` = :account");
  $accountitemsget->execute([
    'account' => $account
  ]);
  $accountitems = $accountitemsget->rowCount() ? $accountitemsget : [];
  foreach($accountitems as $item){
    $firstname = $item['firstname'];
    $lastname = $item['lastname'];
    $preminum = $item['preminum'];
  }

  // Theme
  $themeget = $db->prepare("SELECT * FROM `passwordlogin` WHERE `username` = :account");
  $themeget->execute([
    'account' => $account
  ]);
  $themetoken = $themeget->rowCount() ? $themeget : [];
  foreach($themetoken as $item){
    if($item['theme']=='dark'){
      $theme=dark;
    }else{
      $theme=light;
    }
  }
  
  // Timezone
  date_default_timezone_set('America/Detroit');

?>