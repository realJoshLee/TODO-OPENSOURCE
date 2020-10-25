<?php

//delete_task.php

include('init.php');

$doneQuery = $db->prepare("
  DELETE FROM tasksfolders  
  WHERE folder = :folder
  AND account = :account
");

$doneQuery->execute([
  ':account' => $account,
  ':folder'  => $_GET['folder']
]);

header('Location: folders.php');
?>