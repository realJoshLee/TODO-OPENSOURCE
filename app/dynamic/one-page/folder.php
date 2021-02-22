    <?php foreach($folderdiv as $item): ?>
      <?php
        $dfn = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);

        //Gets everything from the db for the folder
        $ftg = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `folderid` = :folderid ORDER BY `priority` ASC");
        $ftg->execute([
          'account' => $account,
          'folderid' => $item['folderid']
          ]);
        $ft = $ftg->rowCount() ? $ftg : [];
      ?>
      <div class="folderview div-<?php echo $item['folderid']; ?>" data-id="<?php echo $item['folderid']; ?>" id="div-<?php echo $item['folderid']; ?>">
        <div class="main" id="main">
        
        <br><br>
          
        <div class="alert-style alert-fa-none fa-<?php echo $item['folderid']; ?> fa-del-box" id="fa-<?php echo $item['folderid']; ?>">
            <p>Are you sure you want to delete this folder? You can't undo it?</p>
            <button class="form-control-settings-expand fa-close" data-id="<?php echo $item['folderid']; ?>">Cancel</button>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button class="form-control-settings-expand trash-del" data-id="<?php echo $item['folderid']; ?>">Delete</button>
          </div>

          <h2 class="insight-header"><span contenteditable role="textbox" class="foldername-edit" id="fn-<?php echo $item['folderid']; ?>" data-id="<?php echo $item['folderid']; ?>"><?php echo $dfn; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<img src="icons/trash-solid.svg" alt="" class="navsizing fa-del-box-open" data-id="<?php echo $item['folderid']; ?>"></h2>
          
          <?php
            $decryptedfoldernotes = openssl_decrypt(base64_decode($item['notes']), $method, $key, OPENSSL_RAW_DATA, $iv);
          ?>
          <span contenteditable id="folder-notes-<?php echo $item['folderid']; ?>" data-id="<?php echo $item['folderid']; ?>" class="folder-notes form-control-notes" placeholder="Add notes to this folder">&nbsp;&nbsp;&nbsp; <?php echo $decryptedfoldernotes; ?></span>
          &nbsp;&nbsp;
          <span class="folder-notes-save" data-id="<?php echo $item['folderid']; ?>"><img src="icons/save-icon<?php if($theme=='dark'){echo '-light';} ?>.svg" alt="" class="navsizing"></span>

          <br><br>

          <div class="folderitems f-<?php echo $item['folderid']; ?>">
            <?php foreach($ft as $item){
              include('dynamic/task-list.php');
            }?>
          </div>
          <form id="folderform" class="ff-<?php echo $item['folderid']; ?>" method="POST" data-id="<?php echo $item['folderid']; ?>">
            <input class="form-control fi-<?php echo $item['folderid']; ?>" type="text" name="task" id="fi-<?php echo $item['folderid']; ?>" placeholder="Add a task..." required>
          </form>
        </div>
      </div>
    <?php endforeach; ?>