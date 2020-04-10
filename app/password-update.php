<?php
  require_once 'current-user-pull.php';
  $connect = mysqli_connect("192.168.1.102", "webapps", "@H6Xh$2F", "webapps");
  if (empty($_POST["passwordold"]) || empty($_POST["passwordnew"])) {
    header('Location: password-reset-fail.html');
  } else {
    $passwordold = $_POST["passwordold"];
    $passwordnew = $_POST["passwordnew"];
    $username = $_SESSION["username"];

    $passwordoldHashed = password_hash($passwordold, PASSWORD_DEFAULT);
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$passwordoldHashed'";

    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        if ($passwordoldHashed == $row["password"]) {
          $passwordHashed = password_hash($passwordnew, PASSWORD_DEFAULT);
          $query = "UPDATE users SET password = '$passwordHashed' WHERE username = '$username'";
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