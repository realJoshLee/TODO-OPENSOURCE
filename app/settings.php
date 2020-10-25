<?php
  //entry.php  
 session_start();  
 if(!isset($_SESSION["suite"]))  
 {  
      header("location:../login.php");  
 }  

 error_reporting(0);

 require_once 'init.php';

 session_regenerate_id(true);

 // Pulls everything from the database.
 $itemslist = $db->prepare("SELECT * FROM passworditems WHERE account = :username ORDER BY name ASC");

 $itemslist->execute([
   'username' => $account
   ]);

 $items = $itemslist->rowCount() ? $itemslist : []; 

 $usertwolists = $db->prepare("SELECT * FROM passwordlogin WHERE username = :username");

 $usertwolists->execute([
   'username' => $account
   ]);

 $userstwo = $usertwolists->rowCount() ? $usertwolists : []; 

 $userlists = $db->prepare("SELECT * FROM passwordlogin WHERE username = :username");

 $userlists->execute([
   'username' => $account
   ]);

 $users = $userlists->rowCount() ? $userlists : []; 

 //$spacers = '&nbsp;&nbsp;&nbsp;&nbsp;';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('dynamic/header.php'); ?>
  </head>
  <body>
    <?php include('dynamic/nav.php'); ?>
    <!--Today-->
    <div class="main" id="top">
      <!--Account Status-->
      <h3><?php echo $spacers; ?>Account Status</h3>
      <p><?php echo $spacers; ?><?php foreach($userstwo as $item){if($item['preminum']=='true'){echo 'You are a preminum user!<br>Features you get access to as a preminum user:<br><ul><li>Access to making folders and adding tasks into folders.</li><li>Ability to view all of the tasks you you\'ve completed. (Task History).</li></ul>';}else{echo'You are not a preminum user.';}}?></p>
      <style>
        span.red {
          color: red;
        }
      </style>

      <br><br>

      <!--Recovery Code-->
      <h3><?php echo $spacers; ?>Recovery Code</h3>
      <p><?php echo $spacers; ?>This is your recovery code. Do <span class="red">NOT</span> share this with anyone or they can gain access to your account.</p>
      <p><?php echo $spacers; ?><b>Recovery Code:</b> <?php foreach($users as $item){echo $item['recovery'];} ?> <?php echo $spacers; ?><a href="https://madebyjoshlee.com/cdn/auth/account.php" class="folderbacklink">Regenerate Recovery Code</a></p>
      <style>
        span.red {
          color: red;
        }
      </style>

      <br><br>

      <!--Change Email-->
      <h3><?php echo $spacers; ?>Change Email:</h3>
      <p><?php echo $spacers; ?>Current Email: <?php echo $account; ?></p>
      <?php echo $spacers; ?><a href="https://madebyjoshlee.com/cdn/auth/account.php" class="folderbacklink">Change Account Email</a>
      <br><br>

      <!--Change Password-->
      <h3><?php echo $spacers; ?>Change Master Password:</h3>
      <?php echo $spacers; ?><a href="https://madebyjoshlee.com/cdn/auth/account.php" class="folderbacklink">Change Account Password</a>

      <br><br><br>

      <!--Theme Settings-->
      <h2>Theme:</h2>
      <!--Dark mode-->
      <a href="actions.php?as=darktheme&item=0" class="navalign"><svg style="height: 30px; width: auto;" class="<?php if($theme=='dark'){echo 'halfopacitynav';}?>" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="moon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-moon fa-w-16 fa-5x"><path fill="<?php if($theme=='dark'){echo '#fff';}else{echo '#404245';}?>" d="M448.964 365.617C348.188 384.809 255.14 307.765 255.14 205.419c0-58.893 31.561-112.832 82.574-141.862 25.83-14.7 19.333-53.859-10.015-59.28A258.114 258.114 0 0 0 280.947 0c-141.334 0-256 114.546-256 256 0 141.334 114.547 256 256 256 78.931 0 151.079-35.924 198.85-94.783 18.846-23.22-1.706-57.149-30.833-51.6zM280.947 480c-123.712 0-224-100.288-224-224s100.288-224 224-224c13.984 0 27.665 1.294 40.94 3.745-58.972 33.56-98.747 96.969-98.747 169.674 0 122.606 111.613 214.523 231.81 191.632C413.881 447.653 351.196 480 280.947 480z" class=""></path></svg></a>

      <!--Light mode-->
      <a href="actions.php?as=lighttheme&item=0" class="navalign"><svg style="height: 30px; width: auto;" class="<?php if($theme=='light'){echo 'halfopacitynav';}?>" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="sun" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-sun fa-w-16 fa-5x"><path fill="<?php if($theme=='dark'){echo '#fff';}else{echo '#404245';}?>" d="M256 143.7c-61.8 0-112 50.3-112 112.1s50.2 112.1 112 112.1 112-50.3 112-112.1-50.2-112.1-112-112.1zm0 192.2c-44.1 0-80-35.9-80-80.1s35.9-80.1 80-80.1 80 35.9 80 80.1-35.9 80.1-80 80.1zm256-80.1c0-5.3-2.7-10.3-7.1-13.3L422 187l19.4-97.9c1-5.2-.6-10.7-4.4-14.4-3.8-3.8-9.1-5.5-14.4-4.4l-97.8 19.4-55.5-83c-6-8.9-20.6-8.9-26.6 0l-55.5 83-97.8-19.5c-5.3-1.1-10.6.6-14.4 4.4-3.8 3.8-5.4 9.2-4.4 14.4L90 187 7.1 242.5c-4.4 3-7.1 8-7.1 13.3 0 5.3 2.7 10.3 7.1 13.3L90 324.6l-19.4 97.9c-1 5.2.6 10.7 4.4 14.4 3.8 3.8 9.1 5.5 14.4 4.4l97.8-19.4 55.5 83c3 4.5 8 7.1 13.3 7.1s10.3-2.7 13.3-7.1l55.5-83 97.8 19.4c5.4 1.2 10.7-.6 14.4-4.4 3.8-3.8 5.4-9.2 4.4-14.4L422 324.6l82.9-55.5c4.4-3 7.1-8 7.1-13.3zm-116.7 48.1c-5.4 3.6-8 10.1-6.8 16.4l16.8 84.9-84.8-16.8c-6.6-1.4-12.8 1.4-16.4 6.8l-48.1 72-48.1-71.9c-3-4.5-8-7.1-13.3-7.1-1 0-2.1.1-3.1.3l-84.8 16.8 16.8-84.9c1.2-6.3-1.4-12.8-6.8-16.4l-71.9-48.1 71.9-48.2c5.4-3.6 8-10.1 6.8-16.4l-16.8-84.9 84.8 16.8c6.5 1.3 12.8-1.4 16.4-6.8l48.1-72 48.1 72c3.6 5.4 9.9 8.1 16.4 6.8l84.8-16.8-16.8 84.9c-1.2 6.3 1.4 12.8 6.8 16.4l71.9 48.2-71.9 48z" class=""></path></svg></a>

      <br><br><br>

      <!--Download-->
      <h2>Download Extensions:</h2>
      <?php echo $spacers; ?><a href="#" class="folderbacklink"><svg class="navsizing" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="chrome" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" class="svg-inline--fa fa-chrome fa-w-16 fa-3x"><path fill="currentColor" d="M131.5 217.5L55.1 100.1c47.6-59.2 119-91.8 192-92.1 42.3-.3 85.5 10.5 124.8 33.2 43.4 25.2 76.4 61.4 97.4 103L264 133.4c-58.1-3.4-113.4 29.3-132.5 84.1zm32.9 38.5c0 46.2 37.4 83.6 83.6 83.6s83.6-37.4 83.6-83.6-37.4-83.6-83.6-83.6-83.6 37.3-83.6 83.6zm314.9-89.2L339.6 174c37.9 44.3 38.5 108.2 6.6 157.2L234.1 503.6c46.5 2.5 94.4-7.7 137.8-32.9 107.4-62 150.9-192 107.4-303.9zM133.7 303.6L40.4 120.1C14.9 159.1 0 205.9 0 256c0 124 90.8 226.7 209.5 244.9l63.7-124.8c-57.6 10.8-113.2-20.8-139.5-72.5z" class=""></path></svg>&nbsp;&nbsp;Get Chrome Extension</a><br>
      <?php echo $spacers; ?><a href="#" class="folderbacklink"><svg class="navsizing" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="edge" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-edge fa-w-16 fa-3x"><path fill="currentColor" d="M481.92,134.48C440.87,54.18,352.26,8,255.91,8,137.05,8,37.51,91.68,13.47,203.66c26-46.49,86.22-79.14,149.46-79.14,79.27,0,121.09,48.93,122.25,50.18,22,23.8,33,50.39,33,83.1,0,10.4-5.31,25.82-15.11,38.57-1.57,2-6.39,4.84-6.39,11,0,5.06,3.29,9.92,9.14,14,27.86,19.37,80.37,16.81,80.51,16.81A115.39,115.39,0,0,0,444.94,322a118.92,118.92,0,0,0,58.95-102.44C504.39,176.13,488.39,147.26,481.92,134.48ZM212.77,475.67a154.88,154.88,0,0,1-46.64-45c-32.94-47.42-34.24-95.6-20.1-136A155.5,155.5,0,0,1,203,215.75c59-45.2,94.84-5.65,99.06-1a80,80,0,0,0-4.89-10.14c-9.24-15.93-24-36.41-56.56-53.51-33.72-17.69-70.59-18.59-77.64-18.59-38.71,0-77.9,13-107.53,35.69C35.68,183.3,12.77,208.72,8.6,243c-1.08,12.31-2.75,62.8,23,118.27a248,248,0,0,0,248.3,141.61C241.78,496.26,214.05,476.24,212.77,475.67Zm250.72-98.33a7.76,7.76,0,0,0-7.92-.23,181.66,181.66,0,0,1-20.41,9.12,197.54,197.54,0,0,1-69.55,12.52c-91.67,0-171.52-63.06-171.52-144A61.12,61.12,0,0,1,200.61,228,168.72,168.72,0,0,0,161.85,278c-14.92,29.37-33,88.13,13.33,151.66,6.51,8.91,23,30,56,47.67,23.57,12.65,49,19.61,71.7,19.61,35.14,0,115.43-33.44,163-108.87A7.75,7.75,0,0,0,463.49,377.34Z" class=""></path></svg>&nbsp;&nbsp;Get Microsoft Edge Extension Extension</a><br>
    </div>
  </body>
</html>
<style>
  div.main {
    padding: 10px;
  }
</style>


<?php 
  if($theme=='dark'){
    include('../app/style/index-dark.html');
  }else{
    include('../app/style/index.html');
  }
?>