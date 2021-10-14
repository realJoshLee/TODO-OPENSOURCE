<?php
  require '../../app/init/init.php';
  require '../all.php';

  if($admin=='true'){
    $doneQuery = $db->prepare("
      UPDATE passwordlogin SET verified = :status
      WHERE username = :account
      AND id = :id;
      
      INSERT INTO tasks_log (account, content, date)
      VALUES (:logaccount, :logcontent, :logdate);
    ");
    
    $content = 'Admin ('.$accountemail.') verified the following user: '.$_GET['username'].'';

    $doneQuery->execute([
      'id' => $_GET['id'],
      'account' => $_GET['username'],
      'status' => 'true',
      ':logaccount' => 'SYSTEM (ADMIN)',
      ':logcontent' => $content,
      ':logdate' => $logdate
    ]);
    header('Location: '.$_SERVER['HTTP_REFERER'].'');
  }