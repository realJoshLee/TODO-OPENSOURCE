<?php
  require_once '../init.php';
  $db = new PDO('mysql:dbname=webapps;host=192.168.1.102', 'webapps', '@H6Xh$2F');

  if(isset($_POST['comment'])){
    $comment = trim($_POST['comment']);

    if(!empty($comment)){
      $addedQuery = $db->prepare("
        INSERT INTO feedback (comment, user, created)
        VALUES (:comment, :user, NOW())
        ");
      $addedQuery->execute([
        'comment' => $comment,
        'user' => $_SESSION['user_id']
        ]);
    }
  }

  header('Location: feedback.php');