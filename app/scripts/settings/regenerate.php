<?php 
  require_once '../init.php';

  // For the recovery code.
  $lengthNum = 1;
  function getNum($lengthNum)
  {
    $characters = '0123456789';
    $randomString = '';
    for ($i = 0; $i < $lengthNum; $i++) {
      $index = rand(0, strlen($characters) - 1);
      $randomString .= $characters[$index];
    }
    return $randomString;
  }
  $lengthCode = 8;
  function getCode($lengthCode)
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $lengthCode; $i++) {
      $index = rand(0, strlen($characters) - 1);
      $randomString .= $characters[$index];
    }
    return $randomString;
  }
  $recovery = 'R' . getNum($lengthNum) . '-' . getCode($lengthCode) . '-' . getCode($lengthCode) . '-' . getCode($lengthCode) . '-' . getCode($lengthCode);

  $doneQuery = $db->prepare("
    UPDATE passwordlogin SET recovery = '$recovery'
    WHERE username = :user;
  ");

  $doneQuery->execute([
    'user' => $_SESSION['suite']
  ]);

  header('Location: ../../settings.php');