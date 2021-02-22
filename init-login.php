<?php
$db = new PDO('mysql:dbname=database;host=IP', 'username', 'password');
$connect = mysqli_connect("IP", "username", "password", "database");
$conn = new mysqli("IP", "username", "password", "database");

$password = '64charpass';
$method = 'aes-256-cbc';
$key = substr(hash('sha256', $password, true), 0, 32);
$iv = '16charIV';