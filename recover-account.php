<?php
  // Calls all of the required things for this to work.
  require_once 'app/init/init-login.php';

  // Gets the form
  if (isset($_POST["change"])) {
    // Gets everything entered into the form
    $email = $_POST['email'];
    $recovery = $_POST['recovery'];
    $newpassword = $_POST['newpassword'];

    // Checks to see if the email and the recovery code match
    $itemslist = $db->prepare("SELECT * FROM passwordlogin WHERE username = :username");

    $itemslist->execute([
      'username' => $_POST['email']
      ]);

    $items = $itemslist->rowCount() ? $itemslist : [];

    foreach($items as $item){
      if($item['recovery']==$_POST['recovery']){
        $newpassword = mysqli_real_escape_string($connect, $_POST["newpassword"]);
        $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
        
        $doneQuery = $db->prepare("
          UPDATE passwordlogin SET password = :newpassword
          WHERE username = :account
          AND recovery = :recovery
        ");

        $doneQuery->execute([
          'newpassword' => $newpassword,
          'account' => $_POST['email'],
          'recovery' => $_POST['recovery']
        ]);

        echo '<script>alert("Account Recovered")</script>';
      }else{
        echo '<script>alert("Account Recovery Failed.")</script>';
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
    <link href="app/fa/css/all.css" rel="stylesheet">
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
                  <img src="app/icons/Landing-Dark.svg" class="panel-logo">

                  <h2 class="main-txt">Recover Account</h2>
                  <form method="post">
                    
                    <div class="input-section">
                      <label for="email" class="form-label">Email</label>
                      <input type="text" name="email" required class="form-control-new"/>
                    </div>
                
                    <br>
                
                    <div class="input-section">
                      <label for="recovery" class="form-label">Recovery Code</label>
                      <input type="text" name="recovery" required class="form-control-new"/>
                    </div>
                
                    <br>

                    <div class="input-section">
                      <label for="newpassword" class="form-label">New Password</label>
                      <input type="password" name="newpassword" required class="form-control-new"/>
                    </div>

                    <br><br>

                    <div class="align-right-container">
                      <div class="align-right">
                        <input type="submit" name="change" value="Change Password" class="btn btn-info" />
                      </div>
                    </div>

                    <br>
                    <br>

                    <a href="login.php" class="link">Login</a><br><br>
                    <a href="login.php?action=register" class="link">Create an Account</a><br><br>
                    <a href="https://madebyjoshlee.com/privacypolicy.php" class="link">Privacy Policy and Terms of Service</a>
                  </form>
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
.btn {
  width: 200px !important;
}
<?php include('landing/login-v2.css'); ?>
</style>