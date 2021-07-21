<?php
  include '../init/init.php';

  $addQuery = $db->prepare("
    INSERT INTO tasks_bug (account, message)
    VALUES (:account, :message)
  ");
      
  $addQuery->execute([
    ':account' => $accountemail,
    ':message' => $_POST['message']
  ]);

  header('Location: ../index.php');