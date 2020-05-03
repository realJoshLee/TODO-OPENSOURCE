<?php
require_once 'init.php';

if (isset($_GET['action'], $_POST['tasktext'], $_POST['taskid'])) {
  $action = $_GET['action'];
  $namepre = $_POST['tasktext'];
  $id = $_POST['taskid'];

  $name = base64_encode(openssl_encrypt($namepre, $method, $key, OPENSSL_RAW_DATA, $iv));

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