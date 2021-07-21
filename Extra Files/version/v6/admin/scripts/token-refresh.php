<?php
  include('../../init/init.php');
  require '../all.php';

  
  $usersget = $db->prepare("SELECT * FROM `passwordlogin`");
  $usersget->execute([
  ]);
  $user = $usersget->rowCount() ? $usersget : [];


  foreach($user as $item){
    // Token
    $str = rand();
    $token = hash("sha256", $str);

    // Update the token
    $tokenquery = $db->prepare("
      UPDATE passwordlogin SET token = :token WHERE accountid = :account;
    ");
    $tokenquery->execute([
      ':account' => $item['accountid'],
      ':token' => $token
    ]);
  }

  header('Location: ../index.php?p=main');