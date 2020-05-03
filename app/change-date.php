<?php
  require_once('init.php');

  if (isset($_GET['date'], $_GET['item'])) {
    $date = $_GET['date'];
    $id = $_GET['item'];

    $updateQuery = $db->prepare("
      UPDATE todotasks SET day = :date
      WHERE id = :id
      AND user = :user
    ");

    $updateQuery->execute([
      'id' => $id,
      'user' => $_SESSION['user_id'],
      'date' => $date
    ]);
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }