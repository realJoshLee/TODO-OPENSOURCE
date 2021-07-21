<?php
require '../init/init.php';
$logdate = date('M-d-Y h:i:sa', strtotime('+0 day'));

$addQuery = $db->prepare("
  UPDATE `passwordlogin`
  SET `status` = 'suspended'
  WHERE `accountid` = :account;
  DELETE FROM `tasks_tasks`
  WHERE `account` = :account;
  DELETE FROM `tasks_folders`
  WHERE `account` = :account;

  INSERT INTO tasks_log (account, content, date)
  VALUES (:account, :content, :date)
");

$content = 'User '.$accountemail.' With ID '.$account.' deleted their account.';
      
$addQuery->execute([
  ':account' => $account,     
  ':content' => $content,
  ':date' => $logdate
]);

header('Location: ../../logout.php');