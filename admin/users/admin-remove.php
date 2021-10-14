<?php
  require_once '../../app/init/init.php';
  require '../all.php';

  if($admin=='true'){
    $doneQuery = $db->prepare("
      UPDATE passwordlogin SET admin = :admin
      WHERE username = :account
      AND id = :id;
      
      INSERT INTO tasks_log (account, content, date)
      VALUES (:logaccount, :logcontent, :logdate);
    ");
    
    $content = 'Admin ('.$accountemail.') revoked admin permissions from the following user: '.$_GET['username'].'';

    $doneQuery->execute([
      'id' => $_GET['id'],
      'account' => $_GET['username'],
      'admin' => 'false',
      ':logaccount' => 'SYSTEM (ADMIN)',
      ':logcontent' => $content,
      ':logdate' => $logdate
    ]);
    header('Location: '.$_SERVER['HTTP_REFERER'].'');
  }