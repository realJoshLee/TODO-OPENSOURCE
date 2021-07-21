<?php
  require_once '../../init/init.php';
  require '../all.php';

  $doneQuery = $db->prepare("
    UPDATE passwordlogin SET verified = :status
    WHERE username = :account
    AND id = :id
  ");

  $doneQuery->execute([
    'id' => $_GET['id'],
    'account' => $_GET['username'],
    'status' => 'true'
  ]);
  header('Location: '.$_SERVER['HTTP_REFERER'].'');