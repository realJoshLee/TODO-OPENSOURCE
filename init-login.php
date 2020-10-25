<?php
$dbname = '';
$ip = '';
$usernae = '';
$password = '';
$db = new PDO('mysql:dbname=$dbname;host=$ip', '$username', '$password');
$connect = mysqli_connect("$ip", "$username", "$password", "$database");
$conn = new mysqli("$ip", "$username", "$password", "$database");

// Set the password to a 60 character string
$password = 'import here';
$method = 'aes-256-cbc';
$key = substr(hash('sha256', $password, true), 0, 32);
// Set the IV to a random 16 character string
$iv = '';