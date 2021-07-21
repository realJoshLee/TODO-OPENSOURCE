<?php
  // Error reporting off
  error_reporting(0);

  //Datebase
  $db = new PDO('mysql:dbname=webapps;host=10.0.1.98', 'josh', 'password1');
  $connect = mysqli_connect("10.0.1.98", "josh", "password1", "webapps");
  $conn = new mysqli("10.0.1.98", "josh", "password1", "webapps");
  $todaydate = date('M-d-Y', strtotime('+0 day'));

  // Encryption
  $password = 'Z&HMSbe@CU5^Ry4rm3fyzQy&R!G$d&XWX#VvKr5b4DJXG7W$vupnCnYtNh@S';
  $method = 'aes-256-cbc';
  $key = substr(hash('sha256', $password, true), 0, 32);
  $iv = 'uss%6y@wRJsUD8D9';
  //$decryptedtask = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);
  //$name = base64_encode(openssl_encrypt($namepre, $method, $key, OPENSSL_RAW_DATA, $iv));

  // Account initialization
  session_start();  
  if(!isset($_SESSION["suite"]))  {  
    header("location:../login.php");  
  }

  // Account ID
  $accountemail = $_SESSION['suite'];
  
  // Gets all of the information for the user account
  $accountitemsget = $db->prepare("SELECT * FROM `passwordlogin` WHERE `username` = :account");
  $accountitemsget->execute([
    'account' => $accountemail
  ]);
  $accountitems = $accountitemsget->rowCount() ? $accountitemsget : [];
  foreach($accountitems as $item){
    $account = $item['accountid'];
    $firstname = $item['firstname'];
    $lastname = $item['lastname'];
    $preminum = $item['preminum'];
    $admin = $item['admin'];
    $recovery = $item['recovery'];
    $verified = $item['verified'];
    $goal = $item['taskcompletegoal'];
    $theme = $item['theme'];
    $tz = $item['timezone'];
    $goal = $item['taskcompletegoal'];
    $setup = $item['setupcomplete'];
  }

  // Gets the count of completed tasks today/current day
  $dbsel = "SELECT * FROM `tasks_tasks` WHERE `completed` = 'true' AND `account` = '$account' AND `dateshowcomplete` = '$todaydate'";
  $connStatus = $conn->query($dbsel);
  $cttoday = mysqli_num_rows($connStatus);
  
  // Timezone
  date_default_timezone_set($tz);

  // Everything for the avaiable time zones that a user can select from.
  $timezones = array(
    'America/Adak',
    'America/Anchorage',
    'America/Boise',
    'America/Chicago',
    'America/Denver',
    'America/Detroit',
    'America/Indiana/Indianapolis',
    'America/Indiana/Knox',
    'America/Indiana/Marengo',
    'America/Indiana/Petersburg',
    'America/Indiana/Tell_City',
    'America/Indiana/Vevay',
    'America/Indiana/Vincennes',
    'America/Indiana/Winamac',
    'America/Juneau',
    'America/Kentucky/Louisville',
    'America/Kentucky/Monticello',
    'America/Los_Angeles',
    'America/Menominee',
    'America/Metlakatla',
    'America/New_York',
    'America/Nome',
    'America/North_Dakota/Beulah',
    'America/North_Dakota/Center',
    'America/North_Dakota/New_Salem',
    'America/Phoenix',
    'America/Sitka',
    'America/Yakutat',
    'Pacific/Honolulu'
  );

  // Rollout
  /*$currentver = 'v2';
  $rolloutget = $db->prepare("SELECT * FROM `tasks_rollouts`");
  $rolloutget->execute([
  ]);
  $rollout = $rolloutget->rowCount() ? $rolloutget : [];
  foreach($rollout as $item){
    if($item['users']==$account){
      header('Location: '.$item['version'].'/');
    }
  }*/