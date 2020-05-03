<?php
require_once 'init.php';

if (isset($_GET['day'], $_POST['name'])) {
  $day = $_GET['day'];
  $namepre = $_POST['name'];
  $name = base64_encode(openssl_encrypt($namepre, $method, $key, OPENSSL_RAW_DATA, $iv));

  $doneQuery = $db->prepare("
    INSERT INTO todotasks (name, user, day, done, created)
    VALUES (:name, :user, :day, 0, NOW())
  ");

  $doneQuery->execute([
    'name' => $name,
    'user' => $_SESSION['user_id'],
    'day' => "$day"
  ]);

  header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>