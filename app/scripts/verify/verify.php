<?php
  // Gets the init file
  include('../init.php');

  if(isset($_GET['verifyid'])){
    $verifyid = $_GET['verifyid'];
    
    $addQuery = $db->prepare("
      UPDATE passwordlogin
      SET verified = 'true' 
      WHERE username = :verifyid
    ");

    $addQuery->execute([
      ':verifyid' => $verifyid
    ]);

    $logquery = $db->prepare("
      INSERT INTO taskable_log (account, item)
      VALUES (:account, :item)
    ");
    $logstatement = 'User: '.$account.' : Verified their email address.';
    $logquery->execute([
      ':account' => $account,
      ':item' => $logstatement
    ]);

    header('Location: ../../index.php');
  }

?>
