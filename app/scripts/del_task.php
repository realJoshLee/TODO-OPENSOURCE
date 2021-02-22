<?php

//delete_task.php

include('init.php');

if(isset($_GET['task'])){
  $doneQuery = $db->prepare("
    DELETE FROM taskable_tasks  
    WHERE taskid = :taskid
    AND account = :account
  ");

  $doneQuery->execute([
    ':account' => $account,
    ':taskid'  => $_GET['task']
  ]);

  $logquery = $db->prepare("
    INSERT INTO taskable_log (account, item)
    VALUES (:account, :item)
  ");
  $logstatement = 'User: '.$account.' : Deleted a task. TaskID: '.$_GET['task'].'';
  $logquery->execute([
    ':account' => $account,
    ':item' => $logstatement
  ]);
} else {
}
?>