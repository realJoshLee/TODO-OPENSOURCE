<?php
  require_once '../../init/init.php';
  
  if (isset($_POST["passwordold"], $_POST["passwordnew"])) {
    /*$passwordold = $_POST["passwordold"];
    $passwordnew = $_POST["passwordnew"];
    $username = $_SESSION["username"];

    $queryfetch = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connect, $queryfetch);

    if (password_verify($passwordold, $row["password"])) {
      $passwordHashednew = password_hash($passwordnew, PASSWORD_DEFAULT);
      $query = "UPDATE users SET password = '$passwordHashednew' WHERE username = '$username'";
      if (mysqli_query($connect, $query)) {
        header('Location: password-reset-success.html');
      }
    } else {
      //return false;  
      header('Location: password-reset-fail.html');
    }*/
    $passwordold = mysqli_real_escape_string($connect, $_POST["passwordold"]);
    $passwordnew = mysqli_real_escape_string($connect, $_POST["passwordnew"]);
    $username = $_SESSION["suite"];
    $query = "SELECT * FROM passwordlogin WHERE username = '$username'";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        if (password_verify($passwordold, $row["password"])) {
          $passwordHashednew = password_hash($passwordnew, PASSWORD_DEFAULT);
            $query = "UPDATE passwordlogin SET password = '$passwordHashednew' WHERE username = '$username'";
            if (mysqli_query($connect, $query)) {
              header('Location: password-reset-success.html');
            }
          } else {
            //return false;  
            header('Location: password-reset-fail.html');
          }
        }
      }
    }