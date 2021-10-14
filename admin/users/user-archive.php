<?php
  require_once '../../app/init/init.php';
  require '../all.php';

  if($admin=='true'){
    $logdate = date('M-d-Y h:i:sa', strtotime('+0 day'));
    
    $doneQuery = $db->prepare("
      UPDATE passwordlogin SET status = :status
      WHERE username = :account
      AND id = :id;

      UPDATE passwordlogin SET admin = :admin
      WHERE username = :account
      AND id = :id;

      UPDATE passwordlogin SET archived = :archived
      WHERE username = :account
      AND id = :id;
      
      INSERT INTO tasks_log (account, content, date)
      VALUES (:logaccount, :logcontent, :logdate);
    ");
    
    $content = 'Admin ('.$accountemail.') archived the following user: '.$_GET['username'].'';

    $doneQuery->execute([
      'id' => $_GET['id'],
      'account' => $_GET['username'],
      'status' => 'suspended',
      'admin' => 'false',
      'archived' => 'true',
      ':logaccount' => 'SYSTEM (ADMIN)',
      ':logcontent' => $content,
      ':logdate' => $logdate
    ]);

    header('Location: ../index.php?p=users');
  }