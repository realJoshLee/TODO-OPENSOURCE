<?php
// Gets the init file
include('init.php');

// Adds everything to the db
if(isset($_POST['task'])){
  $taskencrypted = base64_encode(openssl_encrypt($_POST['task'], $method, $key, OPENSSL_RAW_DATA, $iv));

  $addQuery = $db->prepare("
    INSERT INTO taskable_tasks (account, name, taskid, folderid)
    VALUES (:account, :task, :taskid, :folderid)
  ");

  $addQuery->execute([
    ':account' => $account,
    ':task' => $taskencrypted,
    ':taskid' => $_GET['taskid'],
    ':folderid' => $_GET['folder']
  ]);

  $logquery = $db->prepare("
    INSERT INTO taskable_log (account, item)
    VALUES (:account, :item)
  ");
  $logstatement = 'User: '.$account.' : Added a task to a folder. TaskID: '.$_GET['taskid'].' FolderID: '.$_GET['folder'].'';
  $logquery->execute([
    ':account' => $account,
    ':item' => $logstatement
  ]);
}
?>