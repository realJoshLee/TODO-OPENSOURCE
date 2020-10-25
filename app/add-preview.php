<?php
  require_once 'init.php';

  $date = $_GET['date'];
  $taskpre = $_POST['task'];
  $task = base64_encode(openssl_encrypt($taskpre, $method, $key, OPENSSL_RAW_DATA, $iv));

  $doneQuery = $db->prepare("
    INSERT INTO tasks (name, account, date)
    VALUES (:name, :account, :date)
  ");

  $doneQuery->execute([
    'name' => $task,
    'account' => $account,
    'date' => $date
  ]);
  header('Location: ' . $_SERVER['HTTP_REFERER'].'#top');