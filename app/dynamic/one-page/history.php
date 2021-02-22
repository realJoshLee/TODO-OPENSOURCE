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
  <div class="task-outer task-outer-<?php echo $item['taskid']; ?>">
    <span class="dot <?php echo $item['priority']; ?>"></span>&nbsp;<span class="task"><?php echo $decryptedtask; ?></span><br>
    <span class="smalltxt-history"><span class="history-date"><?php if(isset($item['date'])){echo 'Scheduled: '.$item['date'];} ?></span>&nbsp;&nbsp;<span class="history-folder"><?php if(isset($item['folderid'])){echo 'Folder: '.$decryptedfolder;} ?></span></span>
  </div>
  <br>
<?php endforeach; ?>