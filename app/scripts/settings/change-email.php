<?php
  include('../init.php');

  if(isset($_POST['email'])) {
    $email = $_POST['email'];
    $old = $account;

    $doneQuery = $db->prepare("
      UPDATE passwordlogin SET verified = 'false'
      WHERE username = :user;
      UPDATE passwordlogin SET username = :email
      WHERE username = :user;
      UPDATE taskable_folders SET account = :email
      WHERE account = :user;
      UPDATE taskable_notes SET account = :email
      WHERE account = :user;
      UPDATE taskable_tasks SET account = :email
      WHERE account = :user;
    ");

    $doneQuery->execute([
      'user' => $old,
      'email' => $email
    ]);

    // Log Statement
    $logquery = $db->prepare("
      INSERT INTO taskable_log (item)
      VALUES (:item)
    ");
    $logstatement = 'User: '.$account.' : Changed their account email: '.$_POST['email'].'';
    $logquery->execute([
      ':item' => $logstatement
    ]);

    header('Location: ../../../logout.php');
  }