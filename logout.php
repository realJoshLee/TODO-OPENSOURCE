<?php  
  require_once 'app/init/init-login.php';
 //logout.php  
 session_start();  
 setcookie('token','',time()-2678401);
 session_destroy();  
 //header("location: login.php");  
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
                  <img src="app/icons/Landing-Dark.svg" class="panel-logo">

                  <!--Info shown on logout-->
                  <?php if($_GET['err']=='logout'){
                    echo '<h2 class="main-txt">Logout successful!</h2>';
                    echo '<p>You have successfully been logged out of your account.</p>';
                    echo '<a href="login.php" class="link">Login to your account</p>';
                  }
                  ?>

                  <!--Info shown with invalid token-->
                  <?php if($_GET['err']=='invaltoken'){
                    echo '<h2 class="main-txt">Invalid token</h2>';
                    echo '<p>The token you have assigned doesn\'t match your account.</p>';
                    echo '<a href="login.php" class="link">Login to your account</p>';
                  }
                  ?>

                  <!--Info shown with invalid token-->
                  <?php if($_GET['err']=='sessioninval'){
                    echo '<h2 class="main-txt">Invalid session</h2>';
                    echo '<p>Your session isn\'t defined. Please login to your account first.</p>';
                    echo '<a href="login.php" class="link">Login to your account</p>';
                  }
                  ?>

                  <!--Info shown with invalid token-->
                  <?php if($_GET['err']=='ipnotwhitelisted'){
                    echo '<h2 class="main-txt">IP Not Whitelisted</h2>';
                    echo '<p>Your WAN IP address isn\'t whitelisted. Please contact your admin to resolve this issue.</p>';
                    echo '<a href="mailto:'.$contactemailval.'" class="link">Contact your administrator.</p>';
                  }
                  ?>

                  <!--Info shown with invalid token-->
                  <?php if($_GET['err']=='blockedip'){
                    echo '<h2 class="main-txt">IP is Blocked</h2>';
                    echo '<p>Your IP address has been blocked. Please contact your admin to resolve this issue.</p>';
                    echo '<a href="mailto:'.$contactemailval.'" class="link">Contact your administrator.</p>';
                  }
                  ?>

                  <!--Info shown with invalid token-->
                  <?php if($_GET['err']=='ldappassreset'){
                    echo '<h2 class="main-txt">LDAP Account</h2>';
                    echo '<p>You\'re trying to reset a password of an LDAP account which isn\'t allowed. If you\'re an LDAP user please contact your domain admin to have your password reset, or you can do so with password reset utilities set in place.</p>';
                    echo '<a href="mailto:'.$contactemailval.'" class="link">Contact your administrator.</p>';
                  }
                  ?>

                  <!--Info shown with invalid token-->
                  <?php if($_GET['err']=='ldapnotconfigured'){
                    echo '<h2 class="main-txt">LDAP Error</h2>';
                    echo '<p>The admin of this deployment has not configured this app to utilize LDAP authentation. If you think this is an issue, please contact your domain admin.</p>';
                    echo '<a href="mailto:'.$contactemailval.'" class="link">Contact your administrator.</p>';
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