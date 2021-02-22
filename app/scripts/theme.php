<?php
  // Gets the init file
  include('init.php');
  
  // Adds everything to the db
  $addQuery = $db->prepare("
    UPDATE passwordlogin
    SET theme = :theme
    WHERE username = :account
  ");

  $addQuery->execute([
    ':account' => $account,
    ':theme' => $_GET['as']
  ]);

  header('Location: ../index.php');

?>
