<?php
// Gets the init file
include('init.php');

// Adds everything to the db
if(isset($_POST['subtask'])){
  $taskencrypted = base64_encode(openssl_encrypt($_POST['subtask'], $method, $key, OPENSSL_RAW_DATA, $iv));

  $addQuery = $db->prepare("
    INSERT INTO taskable_tasks (account, name, taskid, parenttaskid)
    VALUES (:account, :task, :taskid, :parenttaskid)
  ");

  $addQuery->execute([
    ':account' => $account,
    ':task' => $taskencrypted,
    ':taskid' => $_GET['taskid'],
    ':parenttaskid' => $_GET['ptid']
  ]);

  $logquery = $db->prepare("
    INSERT INTO taskable_log (account, item)
    VALUES (:account, :item)
  ");
  $logstatement = 'User: '.$account.' : Added a subtask. TaskID: '.$_GET['taskid'].'';
  $logquery->execute([
    ':account' => $account,
    ':item' => $logstatement
  ]);
}
?>