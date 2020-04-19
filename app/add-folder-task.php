<?php
require_once 'init.php';

if (isset($_GET['add'], $_GET['folder'], $_POST['name'])) {
  $add = $_GET['add'];
  $folder = $_GET['folder'];
  $namepre = $_POST['name'];
  $name = base64_encode(openssl_encrypt($namepre, $method, $key, OPENSSL_RAW_DATA, $iv));

  switch ($add) {
    case 'folder':
      $doneQuery = $db->prepare("
        INSERT INTO todotasks (name, user, folder, done, created)
        VALUES (:name, :user, :folder, 0, NOW())
        ");

      $doneQuery->execute([
        'name' => $name,
        'user' => $_SESSION['user_id'],
        'folder' => $folder
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;
    }
  }
?>