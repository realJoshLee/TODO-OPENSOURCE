<?php
//delete_task.php

include('init.php');

if(isset($_GET['noteid'])){
  $doneQuery = $db->prepare("
    DELETE FROM taskable_notes
    WHERE noteid = :noteid
    AND account = :account
  ");

  $doneQuery->execute([
    ':account' => $account,
    ':noteid'  => $_GET['noteid']
  ]);

  $logquery = $db->prepare("
    INSERT INTO taskable_log (account, item)
    VALUES (:account, :item)
  ");
  $logstatement = 'User: '.$account.' : Deleted a note. NoteID: '.$_GET['noteid'].'';
  $logquery->execute([
    ':account' => $account,
    ':item' => $logstatement
  ]);

  header('Location: ../notes.php');
} else {
  header('Location: ../notes.php');
}
?>