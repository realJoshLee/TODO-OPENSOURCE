<?php
  require_once 'init.php';

  // Chars 0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ
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

  $recovery = 'A' . getNum($lengthNum) . '-' . getCode($lengthCode) . '-' . getCode($lengthCode);

  if (isset($_GET['as'], $_GET['item'])) {
    $as = $_GET['as'];
    $item = $_GET['item'];
  
    switch ($as) {
        // Marks the task in the work section as done
      case 'regen':
        $doneQuery = $db->prepare("
            UPDATE users SET recovery = :recovery
            WHERE id = :item
            AND username = :user
            ");
  
        $doneQuery->execute([
          'item' => $item,
          'user' => $_SESSION['user_id'],
          'recovery' => $recovery
        ]);
        header('Location: account.php');
        break;
    }
  }