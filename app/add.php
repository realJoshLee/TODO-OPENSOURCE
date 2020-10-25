<?php
  require_once 'init.php';

  $date = $_GET['date'];
  $taskpre = $_POST['task'];
  $task = base64_encode(openssl_encrypt($taskpre, $method, $key, OPENSSL_RAW_DATA, $iv));

  switch ($date) {
    case 'othertasks':
      $newdate = 'othertasks';
      break;
      
    case 'today':
      $newdate = date('M.d.Y', strtotime('+0 day'));
      break;
      
    case 'tomorrow':
      $newdate = date('M.d.Y', strtotime('+1 day'));
      break;
      
    case 'twodays':
      $newdate = date('M.d.Y', strtotime('+2 day'));
      break;
      
    case 'threedays':
      $newdate = date('M.d.Y', strtotime('+3 day'));
      break;
  }

  $doneQuery = $db->prepare("
    INSERT INTO tasks (name, account, date)
    VALUES (:name, :account, :date)
  ");

  $doneQuery->execute([
    'name' => $task,
    'account' => $account,
    'date' => $newdate
  ]);
  header('Location: ' . $_SERVER['HTTP_REFERER']);