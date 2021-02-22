<?php
  require_once 'init.php';

  $taskpre = $_POST['modaltaskname'];

  // Task id generator
  $n=64; 
  function getName($n) { 
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
      $randomString = ''; 
    
      for ($i = 0; $i < $n; $i++) { 
          $index = rand(0, strlen($characters) - 1); 
          $randomString .= $characters[$index]; 
      } 
    
      return $randomString; 
  } 
  $taskid = getName($n); 

  $text = $_POST['modaltaskname'];
  if(preg_match('#\((.*?)\)#', $text, $match)){
    $modaldate = $match[1];
  }else{
    $modaldate = date('M.d.Y', strtotime('+0 day'));
  }

  $taskescapedate = preg_replace("/\([^)]+\)/","",$text); 

  if (preg_match('/(p1|p2|p3)/', $taskescapedate, $matches)) {
    $priority = $matches[1];
  }else {
    $priority = 'p3';
  }
  
  $taskescape = str_replace($priority, "",$taskescapedate);
  
  $task = base64_encode(openssl_encrypt($taskescape, $method, $key, OPENSSL_RAW_DATA, $iv));

  $doneQuery = $db->prepare("
    INSERT INTO taskable_tasks (taskid, name, account, date, priority)
    VALUES (:taskid, :name, :account, :date, :priority)
  ");

  $doneQuery->execute([
    'taskid' => $taskid,
    'name' => $task,
    'account' => $account,
    'date' => $modaldate,
    'priority' => $priority
  ]);

  $logquery = $db->prepare("
    INSERT INTO taskable_log (account, item)
    VALUES (:account, :item)
  ");
  $logstatement = 'User: '.$account.' : Added a task. TaskID: '.$taskid.'';
  $logquery->execute([
    ':account' => $account,
    ':item' => $logstatement
  ]);

  header('Location: ' . $_SERVER['HTTP_REFERER']);