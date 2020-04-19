<?php 
  // Turns off error reporting.
  error_reporting(0);

  // Document for accessing the database.
  require_once('init.php');

  // Makes sure that the user is logged in. If not it redirects.
  session_start();
  if(!isset($_SESSION["username"]))  
  {  
    // Where the page will redirect to.
    // Currently set to redirect to the login page.
    header("location:../index.php?action=login");  
  }

  // Gets the current user.
  $currentuser = $_SESSION["username"];

  // Checks to make sure the user if verified.
  $username = $_SESSION['username'];
  $query = "SELECT * FROM users WHERE username = '$username' AND verified = 1";
  $result = mysqli_query($connect, $query);
  $verifyTrue = 1;
  $verifyFalse = 0;
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      if ($verifyQuery == $verifyFalse) {
      } else {
        header("Location: ../verification/");
        exit();
      }
    }
  } else {
    header("Location: ../verification/");
    exit();
  }

  // Checks to make sure the user if verified.
  $username = $_SESSION['username'];
  $query = "SELECT * FROM users WHERE username = '$username' AND donor = 1";
  $result = mysqli_query($connect, $query);
  $donorTrue = 1;
  $donorFalse = 0;
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      if ($verifyQuery == $donorFalse) {
      } else {
        header("Location: task-history-premium.html");
        exit();
      }
    }
  } else {
    header("Location: task-history-premium.html");
    exit();
  }

  // Pulls everything from the database.
  $themeitems = $db->prepare("SELECT id, username, theme FROM users WHERE username = :user");

  $themeitems->execute([
    'user' => $_SESSION['user_id']
    ]);

  $theme = $themeitems->rowCount() ? $themeitems : [];

  foreach($theme as $item){
    $usertheme = $item['theme'];
    if($usertheme == "light") {
      // Things to do for the user theme if it is set to light.
      include('css/theme-light.php');
    }
    if($usertheme == "dark") {
      // Things to do for the user theme if it is set to dark.
      include('css/theme-dark.php');
    }
  }

  // Gets the completed tasks
  $doneitems = $db->prepare("SELECT id, name, folder, day, special, done, priority FROM todotasks WHERE user = :user");

  $doneitems->execute([
    'user' => $_SESSION['user_id']
    ]);

  $donetasks = $doneitems->rowCount() ? $doneitems : [];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>TODO</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="author" content="Josh Lee - joshlee.pw">
        
    <!--Links to stylesheets-->
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png"/>
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="https://joshlee.pw/fontawesome/css/all.css">
    <link rel="stylesheet" href="https://joshlee.pw/fontawesome/js/all.css">
    <script src="https://kit.fontawesome.com/8f49cccb89.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>
    <script>
      var mq = window.matchMedia( "(max-width: 1096px)" );
      if (mq.matches) {
        window.onload = function () {
          // nothing
        }
      }
      else {
        window.onload = function () {
          nav();
        }
      }
    </script>
    <!--For the sidenav-->
    <div class="left" id="left">
      <div id="mySidenav" class="sidenav">
        <?php include('dynamic/nav.php'); ?>
      </div>
    </div>

    <!--Right section of the listing-->
    <div class="right" id="right">
      <!--Slide out nav button-->  
      <span class="navbutton switch-one" style="font-size:30px;cursor:pointer" onclick="nav()"><i class="fas fa-bars black"></i></span>
      <span class="navbutton switch-two" style="font-size:30px;cursor:pointer" onclick="smallnav()"><i class="fas fa-bars black"></i></span>
      <br>
      <h2>Tasks Completed</h2>
      <?php foreach($donetasks as $item): ?>
        <li>
          <?php $priority = $item['priority']; ?>
          <?php include('dynamic/priority.php'); ?>
          <span class="dot dot-<?php echo $item['id']; ?>"></span>
          <span class="day"><?php echo $item['day']; ?></span> - <?php echo $item['name']; ?>
        </li>
      <?php endforeach; ?>
    </div>
  </body>
</html>
<style>
  li {
    list-style: none;
  }
</style>
<?php
  // Style & Script sheets
  include('css/fonts.php');
  include('css/responsive.php');
  include('js/script.php');
?>