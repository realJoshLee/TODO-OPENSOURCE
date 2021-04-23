<?php  
 //logout.php  
 session_start();  
 setcookie('token','',time()-604801);
 session_destroy();  
 //header("location: login.php");  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Tasks - Logout Success</title>

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!--iOS PWA Compatability-->
    <link rel="apple-touch-icon" href="icons/favicon.png">
    <meta name="apple-mobile-web-app-title" content="Tasks">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <meta name="apple-mobile-web-app-capable" content="yes">
  </head>

  <body>
    <div class="container">
      <div class="center">            
        <img src="app/icons/Landing.png" class="logo">
      </div>
      <br>
      <div class="left-force center">
        <!--Info shown on logout-->
        <?php if($_GET['err']=='logout'){
          echo '<h4>Logout successful!</h4>';
          echo '<p>You have successfully been logged out of your account.</p>';
        }
        ?>

        <!--Info shown with an invalid token-->
        <?php if($_GET['err']=='invaltoken'){
          echo '<h4>Invalid token</h4>';
          echo '<p>The token you have assigned doesn\'t match your account.</p>';
        }
        ?>

        <!--Info shown with an invalid session-->
        <?php if($_GET['err']=='sessioninval'){
          echo '<h4>Invalid session</h4>';
          echo '<p>Your session has ended or is invalid.</p>';
        }
        ?>

        <a href="login.php" class="link">Login</a>
      </div>
    </div>
  </body>
</html>
<style>
<?php include('landing/login-style.css'); ?>
</style>