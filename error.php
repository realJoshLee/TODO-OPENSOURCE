<!DOCTYPE html>
<html>
  <head>
    <title>Tasks - Errors</title>

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
        <?php if($_GET['err']=='whitelist'){
          echo '<h4>Whitelist enabled!</h4>';
          echo '<p>The admin of this deployment has a whitelist for signups configured.</p>';
        }
        ?>

        <?php if($_GET['err']=='magiclink'){
          echo '<h4>Feature disabled!</h4>';
          echo '<p>The admin of this deployment has disabled the Magic Link login feature.</p>';
        }
        ?>

        <?php if($_GET['err']=='sharepage'){
          echo '<h4>Feature disabled!</h4>';
          echo '<p>The admin of this deployment has disabled the share page feature.</p>';
        }
        ?>

        <?php if($_GET['err']=='susdelalert'){
          echo '<h4>Suspended or deleted account!</h4>';
          echo '<p>Your account has either been suspended or deleted.</p>';
        }
        ?>

        <?php if($_GET['err']=='bugreport'){
          echo '<h4>Feature disabled!</h4>';
          echo '<p>The admin of this deployment has disabled the bug reporting feature.</p>';
        }
        ?>

        <?php if($_GET['err']=='wrongcreds'){
          echo '<h4>Wrong Login Details!</h4>';
          echo '<p>The details that you entered don\'t match the details that we have on record.</p>';
        }
        ?>
        <br>
        <a href="mailto:<?php echo $contactemailval; ?>" class="link">If you think this is an issue<br>contact the admin.</a>
      </div>
    </div>
  </body>
</html>
<style>
<?php include('landing/login-style.css'); ?>
</style>