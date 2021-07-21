<?php
  include 'init/init.php';
?>
<!DOCTYPE html>
<html lang="en" class="theme-ctrl">
  <head>
    <?php include('dynamic/header-content.php'); ?>
  </head>
  <body class="theme-ctrl">
    <div class="container">
      <div class="container-inner">

        <div class="top-nav">
          <div class="top-nav-inner">
            <img src="icons/check.svg" class="logo">
          </div>
        </div>

        <div class="content-main">
          <!--Theme-->  
          <div class="initial-laning theme">
            <h2>Theme:</h2>
            <p>Please select a theme that you would like to use. This can be changed in the settings later if you decide you would like to spruce things up.</p>
            <?php if($themeen=='true'){ ?>
            <div class="row">
              <div class="column" >
                <h2>Light:</h2>
                <img src="images/Light.png" class="theme-icon" onclick="themelight()">
              </div>
              <div class="column">
                <h2>Dark:</h2>
                <img src="images/Dark.png" class="theme-icon" onclick="themedark()">
              </div>
              <div class="column">
                <h2>Black:</h2>
                <img src="images/Black.png" class="theme-icon" onclick="themeblack()">
              </div>
            </div>
            <?php }else{ ?>
            <p>Your admin does not allow chaning of themes.</p>
            <?php } ?>

            <br>

            <div class="float-right">
              <span class="btn" data-id="timezone-continue" onclick="timezone()">Next</span>
            </div>

            <br><br><br>
          </div>

          <!--Timezone-->  
          <div class="initial-laning timezone">
            <h2>Timezone:</h2>
            <p>Please select the timezone that you're located in. This will be used for due dates and new day rollovers. This can be changed later in the settings if you travel.</p>

            <form id="goalcontrol" method="POST">
            <select name="timezone" class="form-control-settings" style="width: 250px;">
            <?php foreach($timezones as $item): ?>
              <option value="<?php echo $item; ?>" <?php if($tz==$item){echo 'selected';} ?>><?php echo $item; ?></option>
            <?php endforeach; ?>
            </select>

            <br><br><br>

              <div class="float-right">
                <input type="submit" class="btn timezone-continue" onclick="goal()" value="Next">
              </div>
            </form>

            <br><br><br>

          </div>

          <!--Daily Goal-->  
          <div class="initial-laning goal">
            <h2>Daily Goal:</h2>
            <p>Set your daily goal. The daily goal will be your goal of how many tasks that you would like to complete each day. This can be changed later in the settings if you start to complete more of less tasks each day.</p>
            
            
            <span>Daily Completion Goal:</span>&nbsp;<input type="text" class="form-control-settings daily-goal" id="daily-goal" style="width: 100px;" value="2">

            <br><br><br>

            <div class="float-right">
              <span class="btn timezone-continue" onclick="finish()">Finish</span>
            </div>

            <br><br><br>
          </div>

        </div>

      </div>
    </div>
  </body>
</html>
<style>
  <?php include 'style/setup.css'; ?>
</style>
<script>
  <?php include 'scripts/setup.js'; ?>
</script>