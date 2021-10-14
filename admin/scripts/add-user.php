<?php
  include('../../app/init/init.php');
  require '../all.php';

    // Get the code
    $lengthCode = 10;
    function getCode($lengthCode) {
      $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $randomString = '';
      for ($i = 0; $i < $lengthCode; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
      }
      return $randomString;
    }
    $recovery = 'R3'.'-'.getCode($lengthCode).'-'.getCode($lengthCode).'-'.getCode($lengthCode).'-'.getCode($lengthCode);
    
    // For the accountid
    $accountlength = 16;
    function getAcc($lengthCode) {
      $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $randomString = '';
      for ($i = 0; $i < $lengthCode; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
      }
      return $randomString;
    }
    $accountid = getAcc($accountlength);

    // Generates a token for each user signed up
    $str = rand();
    $token = hash("sha256", $str);

    // For the username and passwords
    $username = mysqli_real_escape_string($connect, $_POST["email"]); 
    $domain = substr( strrchr( $username, "@" ), 1 );
    $password = mysqli_real_escape_string($connect, $_POST["password"]);
    $preminum = "false";
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Insets everything into the database
    $query = "INSERT INTO passwordlogin(accountid, username, password, recovery, preminum, token) VALUES('$accountid', '$username', '$password', '$recovery','$preminum','$token')";
    if (mysqli_query($connect, $query)) {
      // The code that runs if the registration is successful
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'New user registration - from backend (Email: '.$username.')';
      $logQuery->execute([
        ':account' => $accountid,
        ':content' => $content,
        ':date' => $logdate
      ]);

    }

  header('Location: ../index.php?p=users');