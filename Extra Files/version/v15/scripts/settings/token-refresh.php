<?php
  require '../../init/init.php';

  // Generates a token for each user signed up
  /*$nlength=100; 
  function getName($nlength) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
    for ($i = 0; $i < $nlength; $i++) { 
      $index = rand(0, strlen($characters) - 1); 
      $randomString .= $characters[$index]; 
    } 
    return $randomString; 
  } 
  $token = getName($nlength);*/
  $str = rand();
  $token = hash("sha256", $str);

  // Update the token
  $logQuery = $db->prepare("
    UPDATE passwordlogin SET token = :token WHERE accountid = :account;
  ");
  $logQuery->execute([
    ':account' => $account,
    ':token' => $token
  ]);

  header('Location: ../../../logout.php');