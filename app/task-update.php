<?php
  require_once 'init.php';

  if (isset($_POST['tasktext'], $_POST['taskid'])) {
    $tasktext = $_POST['tasktext'];
    $taskid = $_POST['taskid'];

    $doneQuery = $db->prepare("
      UPDATE tasks SET name = :task
      WHERE id = :id
      AND user = :user
    ");

    $doneQuery->execute([
      'task' => $tasktext,
      'id' => $taskid,
      'user' => $_SESSION['user_id']
    ]);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }