<?php
// Gets the init file
include('init.php');

// Adds everything to the db
if(isset($_POST['task'])){
  $taskencrypted = base64_encode(openssl_encrypt($_POST['task'], $method, $key, OPENSSL_RAW_DATA, $iv));

  $addQuery = $db->prepare("
    INSERT INTO taskable_tasks (account, name, taskid, date)
    VALUES (:account, :task, :taskid, :date)
  ");

  $addQuery->execute([
    ':account' => $account,
    ':task' => $taskencrypted,
    ':taskid' => $_GET['taskid'],
    ':date' => $_GET['date']
  ]);

  $logquery = $db->prepare("
    INSERT INTO taskable_log (account, item)
    VALUES (:account, :item)
  ");
  $logstatement = 'User: '.$account.' : Added a task. TaskID: '.$_GET['taskid'].'';
  $logquery->execute([
    ':account' => $account,
    ':item' => $logstatement
  ]);
}
?>