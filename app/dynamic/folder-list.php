<?php
  $decfolder = openssl_decrypt(base64_decode($fitem['name']), $method, $key, OPENSSL_RAW_DATA, $iv); 

  $fitemget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `folderid` = :fid ORDER BY `priority` ASC");
  $fitemget->execute([
    'account' => $account,
    'fid' => $fitem['fid']
  ]);
  $fitems = $fitemget->rowCount() ? $fitemget : [];
?>
<div class="folderlist" id="fdiv-<?php echo $fitem['fid']; ?>" data-id="<?php echo $fitem['fid']; ?>">
  <div class="content">
    <h2><span class="day" id="fn-<?php echo $fitem['fid']; ?>"><?php echo $decfolder; ?></span> &nbsp;&nbsp;&nbsp;&nbsp;<span class="edit-folder-content" data-id="<?php echo $fitem['fid']; ?>"><i class="far fa-edit"></i></span></h2>

    <div class="folder-edit-container fec-<?php echo $fitem['fid']; ?>">
      <div class="folder-edit-main fedit-<?php echo $fitem['fid']; ?>">
        <span class="edit-folder-close"><i class="far fa-times-circle"></i></span><br><br>
        <form method="POST" class="folder-settings-edit" data-id="<?php echo $fitem['fid']; ?>">
          <label class="label"><b>Folder Name</b></label>
          <input type="text" class="form-control" value="<?php echo $decfolder; ?>" name="foldername" id="fnb-<?php echo $fitem['fid']; ?>">
          <input type="submit" class="submit form-control-submit" value="Save Folder Name" data-id="<?php echo $fitem['fid']; ?>">
        </form>
        <input type="submit" class="form-control-submit delete-folder" value="Delete Folder" data-id="<?php echo $fitem['fid']; ?>">

        <br><br>
      </div>
      <br><br>
    </div>

    <div id="ftl-<?php echo $fitem['fid']; ?>">
      <?php foreach($fitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="folderform ff-<?php echo $fitem['fid']; ?>" data-id="<?php echo $fitem['fid']; ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="finput-<?php echo $fitem['fid']; ?>" data-id="<?php echo $fitem['fid']; ?>">
    </form>
  </div>
</div>