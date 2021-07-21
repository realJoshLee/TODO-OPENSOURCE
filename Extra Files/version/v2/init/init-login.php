<?php
$db = new PDO('mysql:dbname=webapps;host=10.0.1.98', 'josh', 'password1');
$connect = mysqli_connect("10.0.1.98", "josh", "password1", "webapps");
$conn = new mysqli("10.0.1.98", "josh", "password1", "webapps");

$password = 'Z&HMSbe@CU5^Ry4rm3fyzQy&R!G$d&XWX#VvKr5b4DJXG7W$vupnCnYtNh@S';
$method = 'aes-256-cbc';
$key = substr(hash('sha256', $password, true), 0, 32);
$iv = 'uss%6y@wRJsUD8D9';

$logdate = date('M-d-Y h:i:sa', strtotime('+0 day'));