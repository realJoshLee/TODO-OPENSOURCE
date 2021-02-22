<?php
  // Gets the init file
  require('scripts/init.php');

  // Gets the document that gets everything from the db
  $historyget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account");
  $historyget->execute([
    'account' => $account
  ]);
  $histpry = $historyget->rowCount() ? $historyget : [];

  if($preminum=='false'){
    header('Location: preminum-false.html');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
    // Calls all of the header elements
    include('dynamic/header.php');
    ?>
  </head>
  <body>
    <div class="main" id="main">
      <!--NAV-->
      <div class="nav-container" id="nav-container">
        <a href="index.php" class="navalign"><svg class="navsizing" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" class="svg-inline--fa fa-arrow-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="<?php if($theme=='dark'){echo '#fff';}else{echo '#404245';}?>" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"></path></svg><!--Account--></a>
      </div>

      <br><br>

      <h2 class="blue">History</h2>
      <?php foreach($histpry as $item):?>
        <?php 
          $decryptedtask = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);

          if(isset($item['folderid'])){
            $folderidget = $db->prepare("SELECT * FROM `taskable_folders` WHERE `account` = :account AND `folderid` = :folderid");
            $folderidget->execute([
              'account' => $account,
              'folderid' => $item['folderid']
            ]);
            $folderidfolder = $folderidget->rowCount() ? $folderidget : [];

            foreach($folderidfolder as $itemtwo){
              $decryptedfolder = openssl_decrypt(base64_decode($itemtwo['name']), $method, $key, OPENSSL_RAW_DATA, $iv);
            }
          }
        ?>
        <div class="task-outer task-outer-${taskid}">
          <span class="dot <?php echo $item['priority']; ?>"></span>&nbsp;<span class="task"><?php echo $decryptedtask; ?></span><br>
          <span class="smalltxt-history"><span class="history-date"><?php if(isset($item['date'])){echo 'Scheduled: '.$item['date'];} ?></span>&nbsp;&nbsp;<span class="history-folder"><?php if(isset($item['folderid'])){echo 'Folder: '.$decryptedfolder;} ?></span></span>
        </div>
        <br>
      <?php endforeach; ?>
      <!--today-->
    </div>
  </body>
</html>
<?php
  // Calls the complete script and the style sheet
  include('style/index.php');
  include('../include-all-user-pages.php'); 
?>