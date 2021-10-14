<?php
  $decfolder = openssl_decrypt(base64_decode($fitem['name']), $method, $key, OPENSSL_RAW_DATA, $iv); 

  $fitemget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `folderid` = :fid ORDER BY `priority` ASC");
  $fitemget->execute([
    'account' => $account,
    'fid' => $fitem['fid']
  ]);
  $fitems = $fitemget->rowCount() ? $fitemget : [];
?>
<div class="folderlist app-page" id="fdiv-<?php echo $fitem['fid']; ?>" data-id="<?php echo $fitem['fid']; ?>">
  <div class="content">
    <h2 class="noselect"><span class="day" id="fn-<?php echo $fitem['fid']; ?>"><?php echo $decfolder; ?></span> &nbsp;&nbsp;<span style="float:right;" class="edit-folder-content" data-id="<?php echo $fitem['fid']; ?>"><span class="f-edit"><i class="fas fa-ellipsis-h"></i></span></span></h2>

    <div class="folder-edit-container fec-<?php echo $fitem['fid']; ?>">
      <div class="folder-edit-main fedit-<?php echo $fitem['fid']; ?>">
        <span class="edit-folder-close"><i class="far fa-times-circle"></i></span><br><br>
        <form method="POST" class="folder-settings-edit" data-id="<?php echo $fitem['fid']; ?>">
          <label class="label"><b>Name</b></label><br>
          <input type="text" class="form-control-folder-name" value="<?php echo $decfolder; ?>" name="foldername" id="fnb-<?php echo $fitem['fid']; ?>">
          <input type="submit" class="submit form-control-submit" value="Save Name" data-id="<?php echo $fitem['fid']; ?>">
        </form><br><br>

        <form method="POST" class="folder-color-edit" data-id="<?php echo $fitem['fid']; ?>">
          <label class="label"><b>Color</b></label><br>
          <select name="colors" class="form-control-folder-name" id="fcolor-<?php echo $fitem['fid']; ?>">
            <option value="green" <?php if($fitem['color']=='green'){echo'selected';}?>>Green</option>
            <option value="teel" <?php if($fitem['color']=='teel'){echo'selected';}?>>Teel</option>
            <option value="purple" <?php if($fitem['color']=='purple'){echo'selected';}?>>Purple</option>
            <option value="grey" <?php if($fitem['color']=='grey'){echo'selected';}?>>Grey (Default)</option>
            <option value="blue" <?php if($fitem['color']=='blue'){echo'selected';}?>>Blue</option>
            <option value="maroon" <?php if($fitem['color']=='maroon'){echo'selected';}?>>Maroon</option>
            <option value="lightpink" <?php if($fitem['color']=='lightpink'){echo'selected';}?>>Light Pink</option>
            <option value="pink" <?php if($fitem['color']=='pink'){echo'selected';}?>>Pink</option>
            <option value="orange" <?php if($fitem['color']=='orange'){echo'selected';}?>>Orange</option>
            <option value="yellowish" <?php if($fitem['color']=='yellowish'){echo'selected';}?>>Yellowish</option>
          </select>
        </form>
        <input type="button" class="submit form-control-submit folder-color-savebtn" value="Save Color" data-id="<?php echo $fitem['fid']; ?>"><br><br><br>

        <form method="POST" class="folder-share-container" data-id=<?php echo $fitem['fid']; ?>">
          <label class="label"><b>Sharing</b></label><br>
          <label class="label">Only folder owners can share folders. Folders are shared as view only.</label>
          <input type="text" class="form-control-folder-name" id="fshareone-<?php echo $fitem['fid']; ?>" value="<?php echo $fitem['sharedone']; ?>">
        </form>
        <input type="button" class="submit form-control-submit folder-share-savebtn" value="Share With Users" data-id="<?php echo $fitem['fid']; ?>"><br><br><br>

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