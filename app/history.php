<?php
  session_start();  
  if(!isset($_SESSION["suite"]))  {  
    header("location:../index.php");  
  }
  // Main stuff
  require_once 'init.php';

  $preminumget = $db->prepare("SELECT * FROM `passwordlogin` WHERE `username` = :account");

  $preminumget->execute([
    'account' => $account
    ]);

  $preminum = $preminumget->rowCount() ? $preminumget : [];
  foreach($preminum as $item){
    if($item['preminum']=='true'){

    }else{
      header('Location: preminum-false.html');
    }
  }

  // Gettings things from the database
    // Today
    $todayitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `completed` = :completed ORDER BY `datebackend` DESC");

    $todayitemsget->execute([
      'account' => $account,
      'completed' => 'true'
      ]);

    $todayitems = $todayitemsget->rowCount() ? $todayitemsget : [];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('dynamic/header.php'); ?>
  </head>
  <body>
    <?php include('dynamic/nav.php'); ?>
    <!--Column Chart-->
    <div class="main" id="top">
      <h2>Completed Tasks</h2>
      <br>
      <?php foreach($todayitems as $item): ?>
        <?php $decryptedtask = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);?>
        <span><span style="color:#006fff;"><?php echo $item['date']; ?></span> - <?php echo $decryptedtask;?></span>
        <br><br>
      <?php endforeach; ?>
    </div>
  </body>
</html>


<?php 
  if($theme=='dark'){
    include('../app/style/index-dark.html');
  }else{
    include('../app/style/index.html');
  }
?>