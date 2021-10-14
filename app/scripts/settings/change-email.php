<?php
  include('../../init/init.php');
  $logdate = date('M-d-Y h:i:sa', strtotime('+0 day'));

  if(isset($_POST['email'])) {
    $email = $_POST['email'];
    $old = $accountemail;

    $doneQuery = $db->prepare("
      UPDATE passwordlogin SET verified = 'false'
      WHERE username = :user;
      UPDATE passwordlogin SET username = :email
      WHERE username = :user;
    ");

    $doneQuery->execute([
      'user' => $old,
      'email' => $email
    ]);

    // Log Statement  
    $logQuery = $db->prepare("
      INSERT INTO tasks_log (account, content, date)
      VALUES (:account, :content, :date)
    ");
    $content = 'Updated accountemail (NEW: '.$email.')';
    $logQuery->execute([
      ':account' => $account,
      ':content' => $content,
      ':date' => $logdate
    ]);

    header('Location: ../../../logout.php');
  }