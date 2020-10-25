<?php
require_once 'init-login.php';
session_start();

if (isset($_SESSION["suite"])) {
  header('Location: app/index.php?week=1');
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
    header('Location: app/index.php?week=1');
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

    $tokenlength = 100;
    function getNum($tokenlength)
    {
      $characters = '0123456789';
      $randomString = '';
      for ($i = 0; $i < $tokenlength; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
      }
      return $randomString;
    }
    $token = getNum($tokenlength);

    // For the username and passwords
    $username = mysqli_real_escape_string($connect, $_POST["username"]);
    $password = mysqli_real_escape_string($connect, $_POST["password"]);
    $first = mysqli_real_escape_string($connect, $_POST["first"]);
    $last = mysqli_real_escape_string($connect, $_POST["last"]);
    $preminum = "false";
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO passwordlogin(firstname, lastname, username, password, recovery, sessionid, token, preminum) VALUES('$first','$last','$username', '$password', '$recovery', '$session','$token','$preminum')";
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
          header('Location: app/index.php?week=1');
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" type="image/png" href="https://madebyjoshlee.com/assets/images/favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>
    <br><br><br><br><br><br>
    <div class="container" style="width: 450px;">
      <div class="logo">
        <svg class="logo" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 444.27 583.71"><path d="M3975.67,305.13,3642.6,358.6v73.6l263.2-46.4V642.33S3899.4,822.6,3531.4,829c0,0,4.8,56,41.6,59.2,0,0,339.73,25.6,402.67-246.4Z" transform="translate(-3531.4 -305.13)"/><polygon points="111.2 212.57 111.2 273.5 291.73 235.47 291.73 174.53 111.2 212.57"/><path d="M3601.8,367V668.47l221.33-36.27s6.4,54.4-58.66,81.07l-181.87,30.4s-50.13-1.07-51.2-50.14v-312Z" transform="translate(-3531.4 -305.13)"/><polygon points="152.53 204.15 152.53 265.08 333.07 227.05 333.07 166.12 152.53 204.15"/><path id="logo" d="M3817,633.21l48.05-7.68s7.91,64.27-39.2,78.14L3712,722l105-88.83" transform="translate(-3531.4 -305.13)"/></svg>
        <br>
      </div>
      <?php
      if (isset($_GET["action"]) == "register") {
      ?>
        <h3>Register</h3>
        <form method="post">
          <input type="text" name="first" required class="form-control-new" placeholder="First Name:"/>
          <input type="text" name="last" required class="form-control-new" placeholder="Last Name:"/>
          <br><br>
          <input type="email" name="username" required class="form-control-new" placeholder="Username:"/>
          <input type="password" name="password" required class="form-control-new" placeholder="Password:"/>
          <br /><br>
          <p><a href="login.php" class="button">Login</a></p>
          <p><a href="recover-account.php" class="button">Recover Account</a></p>
          <br><br>
          <div class="align-right-container">
            <div class="align-right">
              <input type="submit" name="register" value="Register" class="btn btn-info" />
            </div>
          </div>
          <br><br><br><br>
          <div class="center-container" style="text-align: center;">
            <a href="https://madebyjoshlee.com/privacypolicy.php" class="button">Privacy Policy and Terms of Service</a>
          </div>
        </form>
      <?php
      } else {
      ?>
        <h3>Sign In</h3>
        <form method="post">
          <input type="email" name="username" required class="form-control-new" placeholder="Username:"/>
          <input type="password" name="password" required class="form-control-new" placeholder="Password:"/>
          <br /><br>
          <p><a href="login.php?action=register" class="button">Create an Account</a></p>
          <p><a href="recover-account.php" class="button">Recover Account</a></p>
          <br><br>
          <div class="align-right-container">
            <div class="align-right">
              <input type="submit" name="login" value="Login" class="btn btn-info" />
            </div>
          </div>
          <br><br><br><br>
          <div class="center-container" style="text-align: center;">
            <a href="https://madebyjoshlee.com/privacypolicy.php" class="button">Privacy Policy and Terms of Service</a>
          </div>
        </form>
      <?php
      }
      ?>
    </div>
  </body>

</html>
<?php include('css.css'); ?>