<?php
  require_once '../../app/init/init.php';
  require '../all.php';

  if($admin=='true'){
    $doneQuery = $db->prepare("
      UPDATE passwordlogin SET status = :status
      WHERE username = :account
      AND id = :id;
      
      INSERT INTO tasks_log (account, content, date)
      VALUES (:logaccount, :logcontent, :logdate);
    ");
    
    $content = 'Admin ('.$accountemail.') suspended the following user account: '.$_GET['username'].'';

    $doneQuery->execute([
      'id' => $_GET['id'],
      'account' => $_GET['username'],
      'status' => 'suspended',
      ':logaccount' => 'SYSTEM (ADMIN)',
      ':logcontent' => $content,
      ':logdate' => $logdate
    ]);
    header('Location: '.$_SERVER['HTTP_REFERER'].'');
  }