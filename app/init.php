<?php
  require_once 'current-user-pull.php';

  $_SESSION['user_id'] = $_SESSION["username"];

  $db = new PDO('mysql:dbname=dbname;host=hostipaddress', 'username', 'password');

  if(!isset($_SESSION['user_id'])){
    die('You are not logged in.');
  }
  ?>