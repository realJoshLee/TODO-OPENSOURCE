<?php
  $connect = mysqli_connect("hostaddress", "username", "password", "databasename");  
  if (empty($_POST["email"]) || empty($_POST["code"]) || empty($_POST["password"])) {
    header('Location: password-reset-fail.html');
  } else {
    $email = $_POST["email"];
    $code = $_POST["code"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username = '$email'";

    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        if ($email == $row["username"] && $code == $row["recovery"]) {
          $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
          $query = "UPDATE users SET password = '$passwordHashed' WHERE username = '$email' AND recovery = '$code'";
          if (mysqli_query($connect, $query)) {
            header('Location: password-reset-success.html');
          }
        } else {
          //return false;  
          header('Location: password-reset-fail.html');
        }
      }
    } else {
      header('Location: password-reset-fail.html');
    }
  }