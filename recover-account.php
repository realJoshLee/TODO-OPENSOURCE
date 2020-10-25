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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" type="image/png" href="https://madebyjoshlee.com/assets/images/favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password</title>
  </head>
  <body>
    <br><br><br><br><br><br>
    <div class="container" style="width: 450px;">
      <div class="logo">
        <svg class="logo" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 444.27 583.71"><path d="M3975.67,305.13,3642.6,358.6v73.6l263.2-46.4V642.33S3899.4,822.6,3531.4,829c0,0,4.8,56,41.6,59.2,0,0,339.73,25.6,402.67-246.4Z" transform="translate(-3531.4 -305.13)"/><polygon points="111.2 212.57 111.2 273.5 291.73 235.47 291.73 174.53 111.2 212.57"/><path d="M3601.8,367V668.47l221.33-36.27s6.4,54.4-58.66,81.07l-181.87,30.4s-50.13-1.07-51.2-50.14v-312Z" transform="translate(-3531.4 -305.13)"/><polygon points="152.53 204.15 152.53 265.08 333.07 227.05 333.07 166.12 152.53 204.15"/><path id="logo" d="M3817,633.21l48.05-7.68s7.91,64.27-39.2,78.14L3712,722l105-88.83" transform="translate(-3531.4 -305.13)"/></svg>
        <br>
      </div>
      
      <h3>Recover Account</h3>
      <form method="post">
        <input type="text" name="email" required class="form-control-new" placeholder="Email:"/>
        <input type="text" name="recovery" required class="form-control-new" placeholder="Recovery Code:"/>
        <input type="password" name="newpassword" required class="form-control-new" placeholder="New Password:"/>
        <br /><br>
        <p><a href="login.php" class="button">Login</a></p>
        <p><a href="login.php?action=register" class="button">Create an Account</a></p>
        <br><br>
        <div class="align-right-container">
          <div class="align-right">
            <input type="submit" name="change" value="Change Password" class="btn btn-info" />
          </div>
        </div>
        <br><br><br><br>
        <div class="center-container" style="text-align: center;">
          <a href="https://madebyjoshlee.com/privacypolicy.php" class="button">Privacy Policy and Terms of Service</a>
        </div>
      </form>
    </div>
  </body>
</html>
<?php include('css.css'); ?>