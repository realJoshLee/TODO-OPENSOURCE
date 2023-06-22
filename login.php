<?php
require_once 'app/init/init-login.php';
require_once 'landing/tracking.php';
session_start();

if($restrict_login=='ldap'){
  header('Location: login-ldap.php');
}

// If the session is set, is redirects the user to the app
if(isset($_SESSION["suite"])) {
  header('Location: app/index.php');
}









// This is for the login cookie
if(isset($_COOKIE['token'])){
  // Decrypts the token/cookie
  $decrypttoken = openssl_decrypt(base64_decode($_COOKIE['token']), $method, $key, OPENSSL_RAW_DATA, $iv);

  // Gets everything from the database from the decrypted token
  $useraccget = $db->prepare("SELECT * FROM `passwordlogin` WHERE `token` = :token");
  $useraccget->execute([
    'token' => $decrypttoken
  ]);
  $useracc = $useraccget->rowCount() ? $useraccget : [];

  // Assigns the Session based on the users token then redirects the user to the app
  foreach($useracc as $item){
    $_SESSION['suite'] = $item['username'];
    header('Location: app/index.php#planning');
  }
}









// Handles everything for the new user accounts
if (isset($_POST["register"])) {
  if (empty($_POST["username"]) || empty($_POST["password"])) {
    // What happens if the fields are empty
    echo '<script>alert("Both Fields are required")</script>';
  } else {





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
    /*$nlength=100; 
    function getName($nlength) { 
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
      $randomString = ''; 
      for ($i = 0; $i < $nlength; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
      } 
      return $randomString; 
    } 
    $token = getName($nlength); */
    $str = rand();
    $token = hash("sha256", $str);

    $strtwo = rand();
    $identifier = hash("sha256", $strtwo);

    // For the username and passwords
    $username = mysqli_real_escape_string($connect, $_POST["username"]); 
    $domain = substr( strrchr( $username, "@" ), 1 );
    $password = mysqli_real_escape_string($connect, $_POST["password"]);
    $first = mysqli_real_escape_string($connect, $_POST["first"]);
    $last = mysqli_real_escape_string($connect, $_POST["last"]);
    $preminum = "false";
    $password = password_hash($password, PASSWORD_DEFAULT);


    if($whitelistacti=='true'){
      //if(in_array( $domain, $whitelist ) ) { 
      if(strpos($whitelistdomainvalues, $domain) !== false){





        // Insets everything into the database
        $query = "INSERT INTO passwordlogin(accountid, firstname, lastname, username, password, recovery, preminum, token, identifier) VALUES('$accountid', '$first','$last','$username', '$password', '$recovery','$preminum','$token','$identifier')";
        if (mysqli_query($connect, $query)) {
          // The code that runs if the registration is successful
          echo '<script>alert("Account created")</script>';
          
          $logQuery = $db->prepare("
            INSERT INTO tasks_log (account, content, date)
            VALUES (:account, :content, :date)
          ");
          $content = 'New user registration (Email: '.$username.')';
          $logQuery->execute([
            ':account' => $accountid,
            ':content' => $content,
            ':date' => $logdate
          ]);
        }





      }else{
        //echo '<script>alert("Domain Blocked")</script>';
        header('Location: error.php?err=whitelist');
      }
    }else{
      // Insets everything into the database
      $query = "INSERT INTO passwordlogin(accountid, firstname, lastname, username, password, recovery, preminum, token, identifier) VALUES('$accountid', '$first','$last','$username', '$password', '$recovery','$preminum','$token','$identifier')";
      if (mysqli_query($connect, $query)) {
        // The code that runs if the registration is successful
        echo '<script>alert("Account created")</script>';
        
        $logQuery = $db->prepare("
          INSERT INTO tasks_log (account, content, date)
          VALUES (:account, :content, :date)
        ");
        $content = 'New user registration (Email: '.$username.')';
        $logQuery->execute([
          ':account' => $accountid,
          ':content' => $content,
          ':date' => $logdate
        ]);
      }
    }
    



  }
}









// Handles everything for the user to login
if (isset($_POST["login"])) {
  if (empty($_POST["username"]) || empty($_POST["password"])) {
    // What happens if none or just one of the fields are entered.
    echo '<script>alert("Both Fields are required")</script>';
  } else {
    $username = mysqli_real_escape_string($connect, $_POST["username"]);
    $password = mysqli_real_escape_string($connect, $_POST["password"]);

    // Gets everything from the database based on the username
    $query = "SELECT * FROM passwordlogin WHERE username = '$username'";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {

        if($row['status']=='active'){   
          if(password_verify($password, $row["password"])) {
            // When the credentials are right




            // Assigned the session as the username/account email
            $_SESSION["suite"] = $username;

            // Gets the cookie and encrypts it
            $token_cookie = base64_encode(openssl_encrypt($row["token"], $method, $key, OPENSSL_RAW_DATA, $iv));
            setcookie('token',$token_cookie,time()+2678400); // 86400 = 1 day, 2678400 = 31 days

            // Regenerates the session code
            session_regenerate_id(true);

            // Sends the user to the app
            header('Location: app/index.php');
        
            // Makes log query
            $logQuery = $db->prepare("
              INSERT INTO tasks_log (account, content, loginip, logindevice, loginos, loginbrowser, date)
              VALUES (:account, :content, :loginip, :logindevice, :loginos, :loginbrowser, :date)
            ");
            $content = 'Successful login';
            $logQuery->execute([
              ':account' => $row["accountid"],
              ':content' => $content,
              ':date' => $logdate,
              ':loginip' => $loginip,
              ':logindevice' => $logindevice,
              ':loginos' => $loginos,
              ':loginbrowser' => $loginbrowser,
            ]);

            if($verificationen=='false'){
              $verifyquery = $db->prepare("
                UPDATE passwordlogin SET verified = 'true' WHERE accountid = :account
              ");
              $verifyquery->execute([
                ':account' => $row["accountid"],
              ]);
            }





          } else {
            // What happenes when the wrong login details are entered
            header('Location: error.php?err=wrongcreds');
          }
        }else{
          //echo '<script>alert("User account suspended or deleted")</script>';
          header('Location: error.php?err=susdelalert');
        }

      }
    } else {
      // What happenes when the wrong login details are entered
            header('Location: error.php?err=wrongcreds');
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta content="text/html; charset=UTF-8; X-Content-Type-Options=nosniff" http-equiv="Content-Type" />
    <link rel="shortcut icon" type="image/png" href="app/icons/favicon.png"/>

    <!--Scripts-->
    <link href="app/plugins/fa/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/rdi8jbs.css">

    <!--iOS PWA Compatability-->
    <link rel="apple-touch-icon" href="icons/favicon.png">
    <meta name="apple-mobile-web-app-title" content="Tasks">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <meta name="apple-mobile-web-app-capable" content="yes">
  </head>
  <body>
    <div class="main">
      <div class="overlay-color">
        <div class="container">
          
          <div class="row">
            <div class="column left">
              <div class="left-content">
                <img src="app/icons/Landing-Light.svg" class="logo">
              </div>
            </div>
            
            <div class="column right">
              <div class="login-container">
                <div class="login-form">
                  <?php
                  if (isset($_GET["action"]) == "register") {
                  ?>
                    <?php if($accountmakeen=='true'){?>  
                    <img src="app/icons/Landing-Dark.svg" class="panel-logo">

                    <h2 class="maintxt">Sign up</h2>
                    <p>Already have an account? <a href="login.php" class="link">Sign in now.</a></p>

                    <br>
                    
                    <form method="post">
                      <div class="input-section">
                        <label for="first" class="form-label">First Name</label>
                        <input type="text" name="first" required class="form-control-new" placeholder="First Name"/>
                      </div>

                      <br>

                      <div class="input-section">
                        <label for="last" class="form-label">Last Name</label>
                        <input type="text" name="last" required class="form-control-new" placeholder="Last Name"/>
                      </div>

                      <br>
                      
                      <div class="input-section">
                        <label for="username" class="form-label">Email Address</label>
                        <input type="email" name="username" required class="form-control-new" placeholder="user@example.com"/>
                      </div>

                      <br>
                      
                      <div class="input-section">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" required class="form-control-new" placeholder="Password"/>
                      </div>

                      <br>

                      <div class="align-right-container">
                        <div class="align-right">
                          <input type="submit" name="register" value="Register" class="btn btn-info" />
                        </div>
                      </div>

                      <br><br>

                      <h3>Or...</h3>

                      <br>

                      <div class="center" >
                        <a href="recover-account.php" class="link">Recover Account</a><br><br>
                        <a href="privacy-terms.html" class="link">Privacy Policy and Terms of Service</a>
                      </div>
                    </form>
                    <?php }else{ ?>
                    <div class="left-force">
                      <h4>Welcome to Tasks 👋</h4>
                      <p>The admin of this server isn't allowing the creation of accounts.</p>
                    </div>
                    <?php } ?>
                  <?php
                  } else {
                  ?>
                    <img src="app/icons/Landing-Dark.svg" class="panel-logo">

                    <h2 class="maintxt">Sign in</h2>
                    <p>New user? <a href="?action=register" class="link">Register for an account.</a></p>

                    <br>

                    <form method="post">
                      
                      <div class="input-section">
                        <label for="username" class="form-label">Email</label><br>
                        <input type="email" name="username" required class="form-control-new"/>
                      </div>              
                      
                      <br><br>
                      
                      <div class="input-section">
                        <label for="password" class="form-label">Password</label><br>
                        <input type="password" name="password" required class="form-control-new"/>
                      </div>

                      <br>

                      <div class="align-right-container">
                        <div class="align-right">
                          <input type="submit" name="login" value="Login" class="btn btn-info" />
                        </div>
                      </div>

                      <br><br>

                      <h3>Or...</h3>

                      <br>

                      <div class="center">
                        <a href="login-ldap.php" class="link">Login With an AD/LDAP Account</a><br><br>
                        <a href="magic-link.php?pg=send" class="link">Login with magic link</a><br><br>
                        <a href="recover-account.php" class="link">Recover Account</a><br><br>
                        <a href="privacy-terms.html" class="link">Privacy Policy and Terms of Service</a>
                      </div>
                    </form>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>

          <div class="notice">
            <p><i class="fab fa-unsplash"></i>&nbsp;&nbsp;Backgrounds from Unsplash</p>
          </div>

        </div>
      </div>
    </div>
  </body>
</html>
<style>
<?php include('landing/login-v2.css'); ?>
</style>
