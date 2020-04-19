<?php
require_once 'init.php';

if (isset($_GET['action'], $_POST['tasktext'], $_POST['taskid'])) {
  $action = $_GET['action'];
  $name = $_POST['tasktext'];
  $id = $_POST['taskid'];

  switch ($action) {
    // Updates the task text.
    case 'taskupdate':
      $doneQuery = $db->prepare("
        UPDATE todotasks SET name = :name
        WHERE id = :id
        AND user = :user
      ");

      $doneQuery->execute([
        'name' => $name,
        'id' => $id,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;
  }
}
?>