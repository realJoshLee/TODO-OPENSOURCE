<?php
  // Gets the init file
  include('init.php');
  
  // Adds everything to the db
  $addQuery = $db->prepare("
    UPDATE taskable_tasks
    SET date = :date 
    WHERE taskid = :taskid
    AND account = :account
  ");

  $addQuery->execute([
    ':account' => $account,
    ':taskid' => $_GET['id'],
    ':date' => $_GET['date']
  ]);

  $logquery = $db->prepare("
    INSERT INTO taskable_log (account, item)
    VALUES (:account, :item)
  ");
  $logstatement = 'User: '.$account.' : Edited a date of a task. TaskID: '.$_GET['id'].'';
  $logquery->execute([
    ':account' => $account,
    ':item' => $logstatement
  ]);

?>
