<?php
require_once 'init-login.php';
session_start();

if (isset($_SESSION["suite"])) {
  header('Location: app/index.php');
}

if(isset($_COOKIE['token'])){
  // Decrypts the token/cookie
  $decrypttoken = openssl_decrypt(base64_decode($_COOKIE['token']), $method, $key, OPENSSL_RAW_DATA, $iv);

  // Gets everything from the database from the token in the cookie
  $useraccget = $db->prepare("SELECT * FROM `passwordlogin` WHERE `token` = :token");
  $useraccget->execute([
    'token' => $decrypttoken
  ]);
  $useracc = $useraccget->rowCount() ? $useraccget : [];

  // Assigns the Session based on the users token
  foreach($useracc as $item){
    $_SESSION['suite'] = $item['username'];
    header('Location: app/index.php');
  }
}

if (isset($_POST["register"])) {
  if (empty($_POST["username"]) || empty($_POST["password"])) {
    echo '<script>alert("Both Fields are required")</script>';
  } else {
    // For the recovery code.
    $lengthNum = 1;
    function getNum($lengthNum)
    {
      $characters = '0123456789';
      $randomString = '';
      for ($i = 0; $i < $lengthNum; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
      }
      return $randomString;
    }
    $lengthCode = 8;
    function getCode($lengthCode)
    {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $randomString = '';
      for ($i = 0; $i < $lengthCode; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
      }
      return $randomString;
    }
    $recovery = 'R' . getNum($lengthNum) . '-' . getCode($lengthCode) . '-' . getCode($lengthCode) . '-' . getCode($lengthCode) . '-' . getCode($lengthCode);
    $session = 'S' . getNum($lengthNum) . '-' . getCode($lengthCode) . '-' . getCode($lengthCode) . '-' . getCode($lengthCode) . '-' . getCode($lengthCode);
    // Encrypts the recovery key.
    //require_once'app/encryption.php';
    //$recovery = base64_encode(openssl_encrypt($recoveryUnencrypted, $method, $key, OPENSSL_RAW_DATA, $iv));

    $nlength=100; 
    function getName($nlength) { 
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $randomString = ''; 
      
        for ($i = 0; $i < $nlength; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randomString .= $characters[$index]; 
        } 
      
        return $randomString; 
    } 
    $token = getName($nlength); 

    // For the username and passwords
    $username = mysqli_real_escape_string($connect, $_POST["username"]);
    $password = mysqli_real_escape_string($connect, $_POST["password"]);
    $first = mysqli_real_escape_string($connect, $_POST["first"]);
    $last = mysqli_real_escape_string($connect, $_POST["last"]);
    $preminum = "false";
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO passwordlogin(firstname, lastname, username, password, recovery, sessionid, preminum, token) VALUES('$first','$last','$username', '$password', '$recovery', '$session','$preminum','$token')";
    if (mysqli_query($connect, $query)) {
      echo '<script>alert("Registration Done! - When you first log in, please take note of your recovery code. This is the only way to recover your account if you forget your password.")</script>';
    }
  }
}

if (isset($_POST["login"])) {
  if (empty($_POST["username"]) || empty($_POST["password"])) {
    echo '<script>alert("Both Fields are required")</script>';
  } else {
    $username = mysqli_real_escape_string($connect, $_POST["username"]);
    $password = mysqli_real_escape_string($connect, $_POST["password"]);
    $query = "SELECT * FROM passwordlogin WHERE username = '$username'";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        if (password_verify($password, $row["password"])) {
          //return true;  
          $_SESSION["suite"] = $username;
          $token_cookie = base64_encode(openssl_encrypt($row["token"], $method, $key, OPENSSL_RAW_DATA, $iv));
          setcookie('token',$token_cookie,time()+604800); // 86400 = 1 day 604800
          session_regenerate_id(true);
          header('Location: app/index.php');

          $logquery = $db->prepare("
            INSERT INTO taskable_log (item, cfdata)
            VALUES (:item, :cfdata)
          ");
          $logstatement = 'User: '.$username.' : Logged in successfully.';
          $logquery->execute([
            ':item' => 'Login Successful',
            ':cfdata' => $logstatement
          ]);
        } else {
          //return false;  
          echo '<script>alert("Wrong User Details")</script>';
        }
      }
    } else {
      echo '<script>alert("Wrong User Details")</script>';
    }
  }
}
?>
<!DOCTYPE html>
<html>

  <head>
    <title>Login</title>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
    <link rel="shortcut icon" type="image/png" href="app/icons/favicon.v3.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/rdi8jbs.css">
  </head>

  <body>

    <div class="row">
      <div class="column left">
        <div class="left-container">
          <div class="top">
            <img src="app/images/White-Grey.svg" alt="" class="logo">
          </div>
          <div class="left-center">
            <p class="title">Welcome Back!<br><span class="subtxt">You're just one login away<br>from being productive!</span></p>
          </div>
        </div>
      </div>
        <div class="logo-left">
          <img src="app/icons/checkv2.svg" alt="" class="main-logo">
        </div>
      <div class="column right">
        <div class="container">
          <?php
          if (isset($_GET["action"]) == "register") {
          ?>
            <h3 class="title">Register</h3>
            <form method="post">
              <input type="text" name="first" required class="form-control-new" placeholder="First Name"/><br><br>
              <input type="text" name="last" required class="form-control-new" placeholder="Last Name"/><br><br>
              <br><br>
              <input type="email" name="username" required class="form-control-new" placeholder="Username"/><br><br>
              <input type="password" name="password" required class="form-control-new" placeholder="Password"/>
              <br /><br>

              <input type="checkbox" required>&nbsp;<span class="label">I agree to the Terms and Privacy Policy</span>

              <br><br>

              <div class="align-right-container">
                <div class="align-right">
                  <input type="submit" name="register" value="Register" class="btn btn-info" />
                </div>
              </div>

              <br>

              <p><a href="login.php" class="link">Login</a> - <a href="recover-account.php" class="link">Recover Account</a></p>
              <div class="center-container" style="text-align: center;">
                <p>By clicking register, you agree to our Privacy<br>Policy and our Terms of Service. Click the<br>link below to learn more.</p>
                <a href="privacy-terms.html" class="link">Privacy Policy and Terms of Service</a>
              </div>
            </form>
          <?php
          } else {
          ?>
            <h3 class="title">Sign In</h3>
            <form method="post">
              <input type="email" name="username" required class="form-control-new" placeholder="Username"/><br><br>
              <input type="password" name="password" required class="form-control-new" placeholder="Password"/>
              <br />
              
              <p>Don't have a login? <a href="login.php?action=register" class="link">Create an Account</a><br>or you can <a href="recover-account.php" class="link">Recover Account</a></p>

              <div class="align-right-container">
                <div class="align-right">
                  <input type="submit" name="login" value="Login" class="btn btn-info" />
                </div>
              </div>

              <br>
              <div class="center-container" style="text-align: center;">
                <a href="privacy-terms.html" class="link">Privacy Policy and Terms of Service</a>
              </div>
            </form>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
    
  </body>

</html>
<?php 
  include('css-new-new.css');
  include('include-all-user-pages.php'); 
?>