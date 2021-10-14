<?php
  $decfolder = openssl_decrypt(base64_decode($fitem['name']), $method, $key, OPENSSL_RAW_DATA, $iv); 

  $fitemget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `folderid` = :fid ORDER BY `priority` ASC");
  $fitemget->execute([
    'fid' => $fitem['fid']
  ]);
  $fitems = $fitemget->rowCount() ? $fitemget : [];
?>
<div class="folderlist app-page" id="fdiv-<?php echo $fitem['fid']; ?>" data-id="<?php echo $fitem['fid']; ?>">
  <div class="content">
    <h2><span class="day" id="fn-<?php echo $fitem['fid']; ?>"><?php echo $decfolder; ?></span></h2>

    <div id="ftl-<?php echo $fitem['fid']; ?>">
      <?php foreach($fitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
  </div>
</div>