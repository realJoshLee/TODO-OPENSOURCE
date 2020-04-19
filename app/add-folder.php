<?php
require_once 'init.php';

if (isset($_POST['foldernameadd'])) {
  $namepre = $_POST['foldernameadd'];
  $name = base64_encode(openssl_encrypt($namepre, $method, $key, OPENSSL_RAW_DATA, $iv));

  $doneQuery = $db->prepare("
    INSERT INTO todofolders (foldername, user)
    VALUES (:foldername, :user)
  ");

  $doneQuery->execute([
    'foldername' => $name,
    'user' => $_SESSION['user_id'],
  ]);
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>