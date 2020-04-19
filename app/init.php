<?php
  require_once 'current-user-pull.php';

  $_SESSION['user_id'] = $_SESSION["username"];

  $db = new PDO('mysql:dbname=dbname;host=hostipaddress', 'username', 'password');
  $connect = mysqli_connect("hostipaddress", "username", "password", "dbname");
  $conn = new mysqli("hostipaddress", "username", "password", "dbname");

  if(!isset($_SESSION['user_id'])){
    die('You are not logged in.');
  }

  $password = '60CharPassword';
  $method = 'aes-256-cbc';
  $key = substr(hash('sha256', $password, true), 0, 32);
  $iv = '16CharOnly';
  ?>