<?php
  include('app/init/init.php');
  $logdate = date('M-d-Y h:i:sa', strtotime('+0 day'));

  if(isset($_GET['aid'])){
    $accountemail = $_GET['ae'];
    $accountid = $_GET['aid'];

    $addQuery = $db->prepare("
      UPDATE `passwordlogin`
      SET verified = 'true'
      WHERE username = :username
      AND accountid = :accountid
    ");
      
    $addQuery->execute([
      ':username' => $accountemail,
      ':accountid' => $accountid
    ]);
      
    $logQuery = $db->prepare("
      INSERT INTO tasks_log (account, content, date)
      VALUES (:account, :content, :date)
    ");
    $content = 'User verified email';
    $logQuery->execute([
      ':account' => $account,
      ':content' => $content,
      ':date' => $logdate
    ]);

    header('Location: app/index.php');
  }