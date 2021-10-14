<?php
  include('init/init.php');
  include('dynamic/get-content-from-db.php');
  include('dynamic/stats-get.php');

  $logdate = date('M-d-Y h:i:sa', strtotime('+0 day'));
  $cfdata = file_get_contents('https://www.cloudflare.com/cdn-cgi/trace');
  $apploadQuery = $db->prepare("
    INSERT INTO tasks_log (account, content, cfdata, date)
    VALUES (:account, :content, :cfdata, :date)
  ");
  $apploadcontent = 'App load';
  $apploadQuery->execute([
    ':account' => $account,
    ':content' => $apploadcontent,
    ':cfdata' => $cfdata,
    ':date' => $logdate
  ]);

  if($setup=='false'){
    header('Location: setup.php');
  }

  // Gets the task count
  $dbget = "SELECT * FROM `tasks_tasks` WHERE `account` = '$account'";
  $conget = $conn->query($dbget);
  $taskct = mysqli_num_rows($conget);

  // Erasing Cache
  if (isset($_GET['eraseCache'])) {
    echo '<meta http-equiv="Cache-control" content="no-cache">';
    echo '<meta http-equiv="Expires" content="-1">';
    $cache = '?' . time();

    header("Location: index.php#today");
}
?>
<!DOCTYPE html>
<html lang="en" class="theme-ctrl theme_<?php echo $theme; ?>">
  <head>
    <?php include('dynamic/header-content.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/index.css" title="Default Styles">

    <script>
      if('serviceWorker' in navigator){
        navigator.serviceWorker.register("sw.js").then(registration => {
          console.log('%c Service worker has been registered.', 'color: green');
          //console.log(registration);
        }).catch(error => {
          console.log('%c Service worker registration error.', 'color: yellow');
          console.log(error);
        })
      }else{
        console.log('%c Service worker not supported.', 'color: red');
      }
    </script>
  </head>
  <body onload="count(); notificationSend(); fetchKeyStatus();" id="body" class="theme-ctrl theme_<?php echo $theme; ?>">
    <div class="loader">
      <div class="loader-content">
        <img src="icons/check.svg" alt="" class="loader-image"><br><br><br><br>
        <div class="loadercircle">Loading...</div>
      </div>
    </div>

    <div class="offline-display" style="display:none;">
      <div class="center" style="text-align:center;color:grey;padding-top:100px;">
        <p style="font-size: 30px;"><span style="font-size:50px;"><i class="far fa-times-circle"></i></span><br>Go back online to use Tasks.</p>
      </div>
    </div>

    <div class="row all-content" style="display:none;">
      
      <!--Alert for the default account.-->
      <?php if($accountemail=="admin@example.com"):?>
        <?php

          // Redirect the default account to the setup page.
          header("Location: ../admin/index.php?p=settings");

        ?>
        <div class="banner">
          <br><br>
          <span style="font-size: 22px; cursor: pointer;" class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>&nbsp;&nbsp;&nbsp;&nbsp;We see that you're logging in with the default admin account. Please click <a href="../admin/index.php?p=settings">HERE</a> to finish the setup and configure everything.
          <br><br>
        </div>
        <style>
          .banner {
            background-color: #fff3cd;

            border: 1px solid #fff5da;
            border-radius: 10px;
                
            color: #835a03;
            padding: 10px;
          }
        </style>
      <?php endif; ?>

      <div class="column left">
        <?php include('dynamic/navigation-content.php'); ?>
      </div>
      <div class="column right">

        <div id="page-nav-content">
          <div id="status"></div>
          <!--Nav Btn-->
          <div class="nav-small">
            <div class="nav-toggle-btn-container">
              <span class="nav-btn" onclick="opennav()"><i class="fas fa-bars"></i></span>
            </div>
          </div>

          <!--Desktop nav button-->
          <div class="nav-desktop-page">
            <div class="nav-toggle-btn-container">
              <span class="nav-btn" onclick="opennavdesktop()"><i class="fas fa-bars"></i></span>
            </div>
          </div>
        </div>
        
        <!--Alerts-->
        <div class="alerts">
          <?php if($verified=='false'): ?>
          <div style="display: initial; text-align: center;" class="alert-email alert-box">
            <div class="alert">
              <!--<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> -->
              <a style="color: red; text-decoration: none;" href="email-send.php">Click here to send an email to verify your email.</a>
            </div>
          </div>
          <?php endif; ?>

          <div class="alert-taskdel alert-box">
            <div class="alert">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
              <strong><span class="success">Success!</span></strong> The task was deleted.
            </div>
          </div>

          <div class="alert-taskreminder alert-box">
            <div class="alert">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
              <strong><span class="success">Success!</span></strong> The task reminder was updated.
            </div>
          </div>

          <div class="alert-taskcomplete alert-box">
            <div class="alert">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
              <strong><span class="success">Success!</span></strong> Task completed.
            </div>
          </div>

          <div class="alert-taskmove alert-box">
            <div class="alert">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
              <strong><span class="success">Success!</span></strong> Task date changed.
            </div>
          </div>
        </div>

        <!--Settings-->
        <div class="settings-page default-hide app-page" id="settings-page">
          <?php include('dynamic/page/settings.php'); ?>
        </div>

        <!--Insight-->
        <div class="insight-page app-page" id="insight-page">
          <?php include('dynamic/page/insight.php'); ?>
        </div>

        <!--Inbox-->
        <div class="inbox-page default-hide app-page" id="inbox-page">
          <?php include('dynamic/page/inbox.php'); ?>
        </div>

        <!--Stats Page-->
        <div class="stats-page default-hide app-page" id="stats-page">
          <?php include('dynamic/page/stats.php'); ?>
        </div>

        <!--Quick Add-->
        <div class="quickadd-page default-hide app-page" id="quickadd-page">
          <?php include('dynamic/page/quick-add.php'); ?>
        </div>

        <!--Alerts Page-->
        <div class="alerts-page default-hide app-page" id="alerts-page">
          <?php include('dynamic/page/alerts.php'); ?>
        </div>

        <!--Links Page-->
        <div class="links-page default-hide app-page" id="link-page">
          <?php include('dynamic/page/links.php'); ?>
        </div>

        <!--Folders-->
        <div class="folder-container-page">
          <?php foreach($folderpage as $fitem): ?>
            <?php include('dynamic/folder-list.php'); ?>
          <?php endforeach; ?>

          <!--Shared folders-->
          <?php foreach($sharedfolderpage as $fitem): ?>
            <?php include('dynamic/shared-folder-list.php'); ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!--For notifications-->
    <div class="notifications" style="display:none;">
      <?php foreach($reminders as $item): ?>
        <?php $decryptedtask = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv); ?>
        <div class="noti-item" id="<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>" data-date="<?php echo $item['reminderdate']; ?>"><?php echo $decryptedtask; ?></div>
      <?php endforeach; ?>
    </div>
  </body>
</html>
<style>
<?php 
//include('style/index.css'); 
?>
</style>
<script>
var todaydate = '<?php echo $today; ?>';
var reminderemailen = '<?php echo $reminderemailen; ?>';
var usrreminderen = '<?php echo $userreminderen; ?>';
var backgroundsyncen = '<?php echo $backgroundsync; ?>';
var taskct = '<?php echo $taskct; ?>';

var licensecheck = 'false';
// Please leave the keyserver value blank. This may be updated in the future.
var keyserver = 'https://example.com/licensing/validate.php';
var licenseemail = '<?php echo $licenseemail; ?>';
var licensekey = '<?php echo $licensekey; ?>';

<?php 
include('scripts/index.js'); 
include('scripts/licensing.js'); 
?>
</script>
<!--<script type="text/javascript" src="scripts/index.js"></script>-->