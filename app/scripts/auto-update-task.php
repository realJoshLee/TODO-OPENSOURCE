<?php
  // Gets the init file
  include('init.php');

  if(isset($_GET['content'],$_GET['id'])){
    $taskencrypted = base64_encode(openssl_encrypt($_GET['content'], $method, $key, OPENSSL_RAW_DATA, $iv));

    // Adds everything to the db
    $addQuery = $db->prepare("
      UPDATE taskable_tasks
      SET name = :name 
      WHERE taskid = :taskid
      AND account = :account
    ");

    $addQuery->execute([
      ':account' => $account,
      ':taskid' => $_GET['id'],
      ':name' => $taskencrypted
    ]);

    $logquery = $db->prepare("
      INSERT INTO taskable_log (account, item)
      VALUES (:account, :item)
    ");
    $logstatement = 'User: '.$account.' : Edited a task. TaskID: '.$_GET['id'].'';
    $logquery->execute([
      ':account' => $account,
      ':item' => $logstatement
    ]);
  }

?>
