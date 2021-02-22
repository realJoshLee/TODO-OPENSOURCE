<?php
// Gets the init file
include('init.php');

// Adds everything to the db
if(isset($_POST['folder'])){
  $taskencrypted = base64_encode(openssl_encrypt($_POST['folder'], $method, $key, OPENSSL_RAW_DATA, $iv));

  $addQuery = $db->prepare("
    INSERT INTO taskable_folders (account, name, folderid)
    VALUES (:account, :folder, :folderid)
  ");

  $addQuery->execute([
    ':account' => $account,
    ':folder' => $taskencrypted,
    ':folderid' => $_GET['folderid']
  ]);

  $logquery = $db->prepare("
    INSERT INTO taskable_log (account, item)
    VALUES (:account, :item)
  ");
  $logstatement = 'User: '.$account.' : Added a folder. FolderID: '.$_GET['folderid'].'';
  $logquery->execute([
    ':account' => $account,
    ':item' => $logstatement
  ]);
}
?>