<?php
  require 'config.php';

  // Account initialization
  session_start();  
  if(!isset($_SESSION["suite"])){
    header("location: ../login.php");  
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
    $userreminderen = $item['reminder'];
    $goal = $item['taskcompletegoal'];
    $theme = $item['theme'];
    $tz = $item['timezone'];
    $goal = $item['taskcompletegoal'];
    $setup = $item['setupcomplete'];
  }
  
  if($ipwhitelisten=='true'){
    $ipwan = $_SERVER['REMOTE_ADDR'];
   
    if(strpos($ipwhitelistval, $ipwan) == false){
      header('Location: ../logout.php?err=ipnotwhitelisted');
    }
  }
  
  // Timezone
  date_default_timezone_set($tz);
  $todaydate = date('M-d-Y', strtotime('+0 day'));

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

  // Gets the count of completed tasks today/current day
  $dbselcompletegoal = "SELECT * FROM `tasks_tasks` WHERE completed = 'true' AND account = '$account' AND dateshowcomplete = '$todaydate'";
  $connStatuscompletegoal = $conn->query($dbselcompletegoal);
  $cttoday = mysqli_num_rows($connStatuscompletegoal);

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

  // Token verify
  if(isset($_COOKIE['token'])){
    // Decrypts the token/cookie
    $decrypttoken = openssl_decrypt(base64_decode($_COOKIE['token']), $method, $key, OPENSSL_RAW_DATA, $iv);
  
    // Gets everything from the database from the decrypted token
    $dbtoken = "SELECT * FROM `passwordlogin` WHERE token = '0ac664832b599ec205afc5e0d729ff71b0bc7324c474ef0b6f5d90461435bc6a'";
    $conntoken = $conn->query($dbtoken);
    $tokenuserct = mysqli_num_rows($conntoken);

    if($tokenuserct==0){
      header('Location: ../logout.php?err=invaltoken');
    }
  }