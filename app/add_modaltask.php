<?php
  require_once 'init.php';

  $taskpre = $_POST['modaltaskname'];

  $text = $_POST['modaltaskname'];
  if(preg_match('#\((.*?)\)#', $text, $match)){
    $modaldate = $match[1];
  }else{
    $modaldate = date('M.d.Y', strtotime('+0 day'));
  }

  $taskescape = preg_replace("/\([^)]+\)/","",$text); 
  
  $task = base64_encode(openssl_encrypt($taskescape, $method, $key, OPENSSL_RAW_DATA, $iv));

  $doneQuery = $db->prepare("
    INSERT INTO tasks (name, account, date)
    VALUES (:name, :account, :date)
  ");

  $doneQuery->execute([
    'name' => $task,
    'account' => $account,
    'date' => $modaldate
  ]);
  header('Location: ' . $_SERVER['HTTP_REFERER']);