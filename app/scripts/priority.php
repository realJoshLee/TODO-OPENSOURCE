<?php
// Gets the init file
include('init.php');

// Adds everything to the db
$addQuery = $db->prepare("
  UPDATE taskable_tasks
  SET priority = :priority 
  WHERE taskid = :taskid
  AND account = :account
");

$addQuery->execute([
  ':account' => $account,
  ':taskid' => $_GET['taskid'],
  ':priority' => $_GET['id']
]);

$logquery = $db->prepare("
  INSERT INTO taskable_log (account, item)
  VALUES (:account, :item)
");
$logstatement = 'User: '.$account.' : Changed the priority of a task. TaskID: '.$_GET['taskid'].'';
$logquery->execute([
  ':account' => $account,
  ':item' => $logstatement
]);

?>
