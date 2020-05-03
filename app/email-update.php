<?php
  require_once('init.php');

  if(isset($_POST['email'])){
    $email = $_POST['email'];

    $doneQuery = $db->prepare("
      UPDATE todotasks SET user = :newuser
      WHERE user = :user;
      UPDATE users SET username = :newuser
      WHERE username = :user;
      UPDATE todofolders SET user = :newuser
      WHERE user = :user
    ");
  
    $doneQuery->execute([
      'newuser' => $email,
      'user' => $_SESSION['user_id']
    ]);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }