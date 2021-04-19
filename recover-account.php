<?php
  // Calls all of the required things for this to work.
  require_once 'init-login.php';

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
<html lang="en">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="shortcut icon" type="image/png" href="app/icons/favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password</title>

    <!--iOS PWA Compatability-->
    <link rel="apple-touch-icon" href="icons/favicon.png">
    <meta name="apple-mobile-web-app-title" content="Tasks">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <meta name="apple-mobile-web-app-capable" content="yes">
  </head>
  <body>
    <div class="container">
      
      <h3 class="title">Recover Account</h3>
      <form method="post">
        <input type="text" name="email" required class="form-control-new" placeholder="Email:"/>
        <input type="text" name="recovery" required class="form-control-new" placeholder="Recovery Code:"/>
        <input type="password" name="newpassword" required class="form-control-new" placeholder="New Password:"/>

        <br><br>

        <div class="align-right-container">
          <div class="align-right">
            <input type="submit" name="change" value="Change Password" class="btn btn-info" />
          </div>
        </div>

        <br/>

        <p><a href="login.php" class="button">Login</a> - <a href="login.php?action=register" class="button">Create an Account</a></p>
        <div class="center-container" style="text-align: center;">
          <a href="https://madebyjoshlee.com/privacypolicy.php" class="button">Privacy Policy and Terms of Service</a>
        </div>
      </form>
    </div>
  </body>
</html>
<style>
<?php include('landing/login-style.css'); ?>
</style>