<?php
 error_reporting(0);

 require_once 'scripts/init.php';

 session_regenerate_id(true);

 // Pulls everything from the database.
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

 $verifyget = $db->prepare("SELECT * FROM passwordlogin WHERE username = :username");

 $verifyget->execute([
   'username' => $account
   ]);

 $verify = $verifyget->rowCount() ? $verifyget : []; 
 foreach($verify as $item){
   $verifystate = $item['verified'];
 }

 // Gets the daily goal
 $dailygoalget = $db->prepare("SELECT * FROM passwordlogin WHERE username = :username");

 $dailygoalget->execute([
   'username' => $account
   ]);

 $dailygoal = $dailygoalget->rowCount() ? $dailygoalget : []; 

 foreach($dailygoal as $item){
   $goal = $item['taskcompletegoal'];
 }

 $spacers = '&nbsp;&nbsp;&nbsp;&nbsp;';
?>
<!DOCTYPE html>
<!--<div class="email">
  <p class="open" data-id="email">Open Email</p>
  <div class="settings-dropdown sd-email" data-id="email">
  <p class="close">X</p>
  <p>dropdown for email</p>
  </div>
</div>-->
<html lang="en">
  <head>
    <?php include('dynamic/header.php'); ?>
  </head>
  <body>
    <!--Today-->
    <div class="main" id="top">
      <a href="index.php" class="folderbacklink" style="font-size: 20px;">Exit</a>
      <br><br>
      <?php if($verifystate == 'false'):?>
        <a class="red" href="scripts/verify/email.php?to=<?php echo $account; ?>&verifyid=<?php echo $account; ?>"><h2 class="red">Please Verify Your Email - Click Here</h3></a>
      <?php endif; ?>
      <br><br>
      <!--Status Page-->
      <div class="email">
        <div class="settings-row">
          <div class="settings-column">
            <h2>Status</h2>
            <p>View the status of your acccount</p>
          </div>
          <div class="settings-column settings-right">
            <button type="submit" class="open form-control-settings-expand" data-id="email">Expand</button>
          </div>
        </div>
        <div class="settings-dropdown sd-email" data-id="email" id="sd-email">
          <div class="settings-dropdown-inner">
            <br>
            <img src="icons/close-exit.v2.svg" alt="" class="edit-exit close">
            <br><br>
            <p><?php foreach($userstwo as $item){if($item['preminum']=='true'){echo 'You are a preminum user!<br>'.$spacers.'Features you get access to as a preminum user:<br><ul><li>Access to making folders and adding tasks into folders.</li><li>Ability to view all of the tasks you you\'ve completed. (Task History).</li></ul><p>Your preminum benefits end on: '.$item['preminumend'].'</p>';}else{echo'You are not a preminum user.';}}?></p>
            <a href="scripts/promo/claim.php" class="folderbacklink">Claim a Promo Code</a>
            <style>
              span.red {
                color: red;
              }
            </style>
          </div>
        </div>
      </div>
      
      <br><br>

      <!--Task Settings Page-->
      <div class="ts">
        <div class="settings-row">
          <div class="settings-column">
            <h2>Task Settings</h2>
            <p>Change the different settings for the task manager</p>
          </div>
          <div class="settings-column settings-right">
            <button type="submit" class="open form-control-settings-expand" data-id="ts">Expand</button>
          </div>
        </div>
        <div class="settings-dropdown sd-ts" data-id="ts" id="sd-ts">
          <div class="settings-dropdown-inner">
            <br>
            <img src="icons/close-exit.v2.svg" alt="" class="edit-exit close">
            <br><br>
            <span>Daily Completion Goal:</span>&nbsp;<input type="text" class="form-control-settings daily-goal" id="daily-goal" style="width: 100px;" value="<?php echo $goal; ?>">
            <script>
              $('.daily-goal').keyup(function(){
                // Gets the content that the user is typing
                var content = document.getElementById(`daily-goal`).value;

                $.ajax({
                  // Send the request to the server
                  url: `scripts/sync.php?a=dailygoal&g=${content}`,
                  method:"POST",
                  data:$(this).serialize(),
                })
              });
            </script>
          </div>
        </div>
      </div>
      
      <br><br>

      <!--Account Page-->
      <div class="ts">
        <div class="settings-row">
          <div class="settings-column">
            <h2>Account Settings</h2>
            <p>Change settings for your account</p>
          </div>
          <div class="settings-column settings-right">
            <button type="submit" class="open form-control-settings-expand" data-id="account">Expand</button>
          </div>
        </div>
        <div class="settings-dropdown sd-account" data-id="account" id="sd-account">
          <div class="settings-dropdown-inner">
            <br>
            <img src="icons/close-exit.v2.svg" alt="" class="edit-exit close">
            <br><br>
            <!--Change Email-->
            <h3>Change Email:</h3>
            <p>Current Email: <?php echo $account; ?></p>
            <form action="scripts/settings/change-email.php" method="POST">
              <input type="text" name="email" required placeholder="Set New Email" class="form-control-settings">
              <input type="submit" required value="Change Email" class="form-control-submit">
            </form>
            <br><br>

            <!--Change Password-->
            <h3>Change Master Password:</h3>
            <form action="scripts/settings/change-password.php" method="POST">
                <input id="form" type="text" placeholder="Type OLD Password Here" name="passwordold" class="form-control-settings"><br><br>
                <input id="form" type="text" placeholder="Type NEW Password Here" name="passwordnew" class="form-control-settings"><br><br>
                <input type="submit" class="form-control-submit" value="Change Password">
            </form>
          </div>
        </div>
      </div>

      <br><br>

      <!--Recovery Page-->
      <div class="recovery">
        <div class="settings-row">
          <div class="settings-column">
            <h2>Recovery</h2>
            <p>View the Recovery code for your acccount</p>
          </div>
          <div class="settings-column settings-right">
            <button type="submit" class="open form-control-settings-expand" data-id="recovery">Expand</button>
          </div>
        </div>
        <div class="settings-dropdown sd-recovery" data-id="recovery" id="sd-recovery">
          <div class="settings-dropdown-inner">
            <br>
            <img src="icons/close-exit.v2.svg" alt="" class="edit-exit close">
            <br><br>
            <p>This is your recovery code. Do <span class="red">NOT</span> share this with anyone or they can gain access to your account.</p>
            <p><b>Recovery Code:</b> <?php foreach($users as $item){echo $item['recovery'];} ?> <a href="scripts/settings/regenerate.php" class="folderbacklink">Regenerate Recovery Code</a></p>
            <style>
              span.red {
                color: red;
              }
            </style>
          </div>
        </div>
      </div>

      <br><br>      
      
      <!--Download Page-->
      <div class="download">
        <div class="settings-row">
          <div class="settings-column">
            <h2>Download</h2>
            <p>Download extensions and apps</p>
          </div>
          <div class="settings-column settings-right">
            <button type="submit" class="open form-control-settings-expand" data-id="download">Expand</button>
          </div>
        </div>
        <div class="settings-dropdown sd-download" data-id="download" id="sd-download">
          <div class="settings-dropdown-inner">
            <br>
            <img src="icons/close-exit.v2.svg" alt="" class="edit-exit close">
            <br><br>
            <a href="https://chrome.google.com/webstore/detail/tasks/lgmlfpjlkmlnnbenpfijaaggkobfbaam?hl=en&authuser=0" class="folderbacklink"><svg class="navsizing" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="chrome" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" class="svg-inline--fa fa-chrome fa-w-16 fa-3x"><path fill="currentColor" d="M131.5 217.5L55.1 100.1c47.6-59.2 119-91.8 192-92.1 42.3-.3 85.5 10.5 124.8 33.2 43.4 25.2 76.4 61.4 97.4 103L264 133.4c-58.1-3.4-113.4 29.3-132.5 84.1zm32.9 38.5c0 46.2 37.4 83.6 83.6 83.6s83.6-37.4 83.6-83.6-37.4-83.6-83.6-83.6-83.6 37.3-83.6 83.6zm314.9-89.2L339.6 174c37.9 44.3 38.5 108.2 6.6 157.2L234.1 503.6c46.5 2.5 94.4-7.7 137.8-32.9 107.4-62 150.9-192 107.4-303.9zM133.7 303.6L40.4 120.1C14.9 159.1 0 205.9 0 256c0 124 90.8 226.7 209.5 244.9l63.7-124.8c-57.6 10.8-113.2-20.8-139.5-72.5z" class=""></path></svg>&nbsp;&nbsp;Get Chrome Extension</a><br>
            <a href="https://chrome.google.com/webstore/detail/tasks/lgmlfpjlkmlnnbenpfijaaggkobfbaam?hl=en&authuser=0" class="folderbacklink"><svg class="navsizing" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="edge" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-edge fa-w-16 fa-3x"><path fill="currentColor" d="M481.92,134.48C440.87,54.18,352.26,8,255.91,8,137.05,8,37.51,91.68,13.47,203.66c26-46.49,86.22-79.14,149.46-79.14,79.27,0,121.09,48.93,122.25,50.18,22,23.8,33,50.39,33,83.1,0,10.4-5.31,25.82-15.11,38.57-1.57,2-6.39,4.84-6.39,11,0,5.06,3.29,9.92,9.14,14,27.86,19.37,80.37,16.81,80.51,16.81A115.39,115.39,0,0,0,444.94,322a118.92,118.92,0,0,0,58.95-102.44C504.39,176.13,488.39,147.26,481.92,134.48ZM212.77,475.67a154.88,154.88,0,0,1-46.64-45c-32.94-47.42-34.24-95.6-20.1-136A155.5,155.5,0,0,1,203,215.75c59-45.2,94.84-5.65,99.06-1a80,80,0,0,0-4.89-10.14c-9.24-15.93-24-36.41-56.56-53.51-33.72-17.69-70.59-18.59-77.64-18.59-38.71,0-77.9,13-107.53,35.69C35.68,183.3,12.77,208.72,8.6,243c-1.08,12.31-2.75,62.8,23,118.27a248,248,0,0,0,248.3,141.61C241.78,496.26,214.05,476.24,212.77,475.67Zm250.72-98.33a7.76,7.76,0,0,0-7.92-.23,181.66,181.66,0,0,1-20.41,9.12,197.54,197.54,0,0,1-69.55,12.52c-91.67,0-171.52-63.06-171.52-144A61.12,61.12,0,0,1,200.61,228,168.72,168.72,0,0,0,161.85,278c-14.92,29.37-33,88.13,13.33,151.66,6.51,8.91,23,30,56,47.67,23.57,12.65,49,19.61,71.7,19.61,35.14,0,115.43-33.44,163-108.87A7.75,7.75,0,0,0,463.49,377.34Z" class=""></path></svg>&nbsp;&nbsp;Get Microsoft Edge Extension Extension</a><br>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<style>
  div.main {
    padding: 10px;
  }

  img.theme-button {
    height: 75px;
    width: auto;
    border: 1px solid #eaeaea;
    border-radius: 15px;
  }

  .folderbacklink {
    color: #006fff;
    text-decoration: none;
  }
</style>
<script>
  $('.settings-dropdown').css('display','none');
  $(document).ready(function(){
    $(document).on('click', '.open', function(event){
      // Gets the task id from the note container
      var dbid = $(this).data('id');

      $(`.settings-dropdown`).css('display','none');
      $(`.sd-${dbid}`).css('display','initial');
    });

    $(document).on('click', '.close', function(event){
      $(`.settings-dropdown`).css('display','none');
    });
  });
</script>
<?php 
  include('style/index.php');  
  include('../include-all-user-pages.php'); 
?>