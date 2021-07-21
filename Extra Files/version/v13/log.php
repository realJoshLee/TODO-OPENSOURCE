<?php
  include('init/init.php');
  include('dynamic/get-content-from-db.php');
  //include('dynamic/stats-get.php');

  if($setup=='false'){
    header('Location: setup.php');
  }
?>
<!DOCTYPE html>
<html lang="en" class="theme-ctrl <?php if($theme=='dark'){echo'dark';} ?> <?php if($theme=='black'){echo'black';} ?>">
  <head>
    <?php include('dynamic/header-content.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/index.css" title="Default Styles">
  </head>
  <body id="body" class="theme-ctrl <?php if($theme=='dark'){echo'dark';} ?> <?php if($theme=='black'){echo'black';} ?>">
    <div class="loader">
      <div class="loader-content">
        <img src="icons/check.svg" alt="" class="loader-image"><br><br><br><br>
        <div class="loadercircle">Loading...</div>
      </div>
    </div>
    <div class="all-content" style="display:none;">
      <?php include('dynamic/page/log.php'); ?>
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
</script>
<!--<script type="text/javascript" src="scripts/index.js"></script>-->