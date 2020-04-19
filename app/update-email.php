<?php
require_once('init.php');
if(isset($_GET['email'])) {
  $email = $_GET['email'];

  $doneQuery = $db->prepare("
    UPDATE todotasks SET user = '$email'
    WHERE user = :user;
    UPDATE users SET username = '$email'
    WHERE username = :user;
    UPDATE todofolders SET user = '$email'
    WHERE user = :user;
  ");

  $doneQuery->execute([
    'user' => $_SESSION['user_id']
  ]);

  header('Location: logout.php');
}