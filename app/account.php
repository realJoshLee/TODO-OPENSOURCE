<?php
  error_reporting(0);
  ?>

<!--Redirects the user to the login page if they aren't logged in already.-->
<?php  
  session_start();  
  if(!isset($_SESSION["username"]))  {  
    header("location:../index.php?action=login");  
  }
  ?>

<?php
  require_once 'init.php';

  $itemsQuery = $db->prepare("SELECT id, username, password FROM users WHERE user = :user");

  $itemsQuery->execute([
    'user' => $_SESSION['user_id']
    ]);
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>TODO - Account</title>
 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="author" content="Josh Lee - joshlee.pw">
        
    <!--Links to stylesheets-->
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png"/>
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon"/>
        
    <!--Font Links-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <!--font-family: 'Raleway', sans-serif; - font-family: 'Montserrat', sans-serif; - font-family: 'Open Sans', sans-serif;-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <!--Header-->
    <div class="header">
      <!--Nav-->
      <div class="nav">
        <a href="index.php" class="exitlink">X</a>
      </div>
    </div>

    <br><br>

    <!--Body-->
    <div class="body">
      <!--Section where everything is split from nav to settings-->
      <div class="row">
        <!--Side nav-->
        <div class="column" id="one">
          <ul class="setting-quick">
            <li class="setting-button-container"><a href="#account" class="setting-button">Account</a></li>
            <br>
            <li class="setting-button-container"><a href="#theme" class="setting-button">&nbsp;Theme&nbsp;</a></li>
          </ul>
        </div>

        <!--Main settings-->
        <div class="column" id="two">
          <!--Account Settings-->
          <div class="account" id="account">
            <h2>Account:</h2>
            <ul class="account-settings-container">
              <!--Current User-->
              <li class="account-setting">
                <p class="current-user">Current User:&nbsp;<i><?php echo $_SESSION["username"]; ?></i></p>
              </li>

              <br><br>

              <!--Change Email-->
              <li class="account-setting">
                <p class="change-email-title">Change email:</p>
                <form action="#" method="post">
                  <input id="form" type="text" placeholder="Type New Email Here" name="name" class="change-email-container">&nbsp;&nbsp;&nbsp;<input id="form-button" type="submit" value="Change Email" class="change-email-submit">
                </form>
              </li>

              <br><br>

              <!--Change Password-->
              <li class="account-setting">
                <p class="change-password-title">Change password:</p>
                <form action="#" method="post">
                  <input id="form" type="text" placeholder="Type New Password Here" class="change-password-container">&nbsp;&nbsp;&nbsp;<input id="form-button" type="submit" value="Change Email" class="change-password-submit">
                </form>
              </li>
            </ul>
          </div>

          <br><br>

          <!--Theme Settings-->
          <div class="theme" id="theme">
            <h2>Theme:</h2>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<style>
  /*Global*/
  html, body {
    font-family: 'Montserrat', Arial, Helvetica, sans-serif;
    color: #080808;
    
    padding: 0;
    margin: 0;

    background-color: #fff;
  }










  /*Header*/
  div.nav {
    background-color: #ededed;
    color: #080808;

    padding: 10px;

    -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
    box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);

    position: fixed;

    width: 100%;
  }

  a.exitlink {
    color: #fff;
    text-decoration: none;
    font-size: 16px;

    background-color: #0343d4;

    border-radius: 5px;
    
    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 10px;
    padding-right: 10px;
  }

  a.exitlink:hover {
    opacity: 0.6;
    transition-duration: 0.3s;
  }

  a.setting-button {
    border: 1px solid #a9a9a9;
    color: #080808;

    text-decoration: none;

    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 10px;
    padding-right: 10px;
  }

  a.setting-button:hover {
    opacity: 0.6;
    transition-duration: 0.3s;
  }









  /*Body*/
  * {
    box-sizing: border-box;
  }

  .column {
    float: left;
    padding: 10px;
    height: 100vh;
  }

  .row:after {
    content: "";
    display: table;
    clear: both;
  }

  div#one {
    width: 20%;
    padding-top: 100px;
  }

  div#two {
    width: 80%;
  }

  ul.setting-quick {
    list-style-type: none;
  }

  ul.account-settings-container {
    list-style-type: none;
  }










  /*Account*/
  input#form {
    height: 30px;
    width: 250px;

    padding-left: 5px;
  }

  input#form-button {
    height: 31px;
    width: 100px;

    border: 1px solid #a9a9a9;
    background-color: transparent;
  }

  input#form-button:hover {
    opacity: 0.7;
    cursor: pointer;

    transition-duration: 0.3s;
  }










  /*Responsive*/
  @media screen and (max-width: 802px) {
    div#one {
      width: 100%;
      padding-top: 0px;
    }

    div#two {
      width: 100%;
    }

    .column {
      float: left;
      padding: 10px;
      height: auto;
    }
  }
</style>