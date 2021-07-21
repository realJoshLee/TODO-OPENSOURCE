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
?>
<!DOCTYPE html>
<html lang="en" class="theme-ctrl theme_<?php echo $theme; ?>">
  <head>
    <?php include('dynamic/header-content.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/index.css" title="Default Styles">
  </head>
  <body onload="count(); notificationSend();" id="body" class="theme-ctrl theme_<?php echo $theme; ?>">
    <div class="loader">
      <div class="loader-content">
        <img src="icons/check.svg" alt="" class="loader-image"><br><br><br><br>
        <div class="loadercircle">Loading...</div>
      </div>
    </div>
    <div class="row all-content" style="display:none;">
      <div class="column left">
        <?php include('dynamic/navigation-content.php'); ?>
      </div>
      <div class="column right">

        <div id="page-nav-content">
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
        <div class="settings-page default-hide" id="settings-page">
          <?php include('dynamic/page/settings.php'); ?>
        </div>

        <!--Insight-->
        <div class="insight-page" id="insight-page">
          <?php include('dynamic/page/insight.php'); ?>
        </div>

        <!--Inbox-->
        <div class="inbox-page default-hide" id="inbox-page">
          <?php include('dynamic/page/inbox.php'); ?>
        </div>

        <!--Stats Page-->
        <div class="stats-page default-hide" id="stats-page">
          <?php include('dynamic/page/stats.php'); ?>
        </div>

        <!--Alerts Page-->
        <div class="alerts-page default-hide" id="alerts-page">
          <?php include('dynamic/page/alerts.php'); ?>
        </div>

        <!--Folders-->
        <div class="folder-container-page">
          <?php foreach($folderpage as $fitem): ?>
            <?php include('dynamic/folder-list.php'); ?>
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
<?php 
include('scripts/index.js'); 
?>
var todaydate = '<?php echo $today; ?>';
var reminderemailen = '<?php echo $reminderemailen; ?>';
var usrreminderen = '<?php echo $userreminderen; ?>';

/*function duealert() {
  var folderal = $('div.folderlist .task-date:contains("<?php // echo $today; ?>")').length;
  if(parseInt(folderal) > 0) {
    document.getElementById('nav-alert').innerHTML = '<button class="nav-al-style">!!!</button>';
  }else{
    document.getElementById('nav-alert').innerHTML = '';
  }
}*/
</script>
<!--<script type="text/javascript" src="scripts/index.js"></script>-->