<?php

//delete_task.php

include('init.php');

if(isset($_GET['folderid'])){
  $doneQuery = $db->prepare("
    DELETE FROM taskable_folders 
    WHERE folderid = :folderid
    AND account = :account
  ");

  $doneQuery->execute([
    ':account' => $account,
    ':folderid'  => $_GET['folderid']
  ]);

  $logquery = $db->prepare("
    INSERT INTO taskable_log (account, item)
    VALUES (:account, :item)
  ");
  $logstatement = 'User: '.$account.' : Deleted a folder. FolderID: '.$_GET['folderid'].'';
  $logquery->execute([
    ':account' => $account,
    ':item' => $logstatement
  ]);

  header('Location: ../folders.php');
} else {
  header('Location: ../folders.php');
}
?>