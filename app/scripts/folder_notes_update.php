<?php
  // Gets the init file
  include('init.php');
  
  $taskencrypted = base64_encode(openssl_encrypt($_GET['name'], $method, $key, OPENSSL_RAW_DATA, $iv));

  // Adds everything to the db
  $addQuery = $db->prepare("
    UPDATE taskable_folders
    SET notes = :name 
    WHERE folderid = :folderid
    AND account = :account
  ");

  $addQuery->execute([
    ':account' => $account,
    ':folderid' => $_GET['folderid'],
    ':name' => $taskencrypted
  ]);

  $logquery = $db->prepare("
    INSERT INTO taskable_log (account, item)
    VALUES (:account, :item)
  ");
  $logstatement = 'User: '.$account.' : Updated the the notes of a folder. FolderID: '.$_GET['folderid'].'';
  $logquery->execute([
    ':account' => $account,
    ':item' => $logstatement
  ]);

?>
