<?php if($item['completed']=='false'){ ?>
  <?php 
    $subtasksget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `parenttaskid` = :ptid ORDER BY `priority` ASC");
    $subtasksget->execute([
      'account' => $account,
      'ptid' => $item['taskid']
    ]);
    $subtasks = $subtasksget->rowCount() ? $subtasksget : [];
  ?>
  <div class="task-outer task-outer-<?php echo $item['taskid']; ?>" data-id="<?php echo $item['taskid']; ?>">
    <?php $decryptedtask = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);?>

    <!--Completion dot-->
    <a href="#" class="task-complete no-decor" data-id="<?php echo $item['taskid']; ?>">
      <span id="update-<?php echo $item['taskid']; ?>" class="<?php echo $item['priority']; ?>"></span>
    </a>
    <!--Task display-->
    <span class="task taskclick" data-id="<?php echo $item['taskid']; ?>">
      <?php //echo $decryptedtask; ?>
      <span class="task-input" data-id="<?php echo $item['taskid']; ?>" contenteditable id="input-<?php echo $item['taskid']; ?>"><?php echo $decryptedtask; ?></span>

      <!--<textarea data-id="<?php// echo $item['taskid']; ?>" name="update" id="input-<?php //echo $item['taskid']; ?>" class="task-input"><?php //echo $decryptedtask; ?></textarea>-->
    </span>

    <!-- Side hover actions-->
    <span class="hovershow">
      <img src="icons/p1-flag-solid.svg" alt="" class="pf-1 editicon pf-<?php echo $item['taskid']; ?>" data-id="<?php echo $item['taskid']; ?>">
      &nbsp;
      <img src="icons/p2-flag-solid.svg" alt="" class="pf-2 editicon pf-<?php echo $item['taskid']; ?>" data-id="<?php echo $item['taskid']; ?>">
      &nbsp;
      <img src="icons/p3-flag-solid.svg" alt="" class="pf-3 editicon pf-<?php echo $item['taskid']; ?>" data-id="<?php echo $item['taskid']; ?>">
      &nbsp;
      <!--Edit the task-->
      <a class="no-decor edit-button" data-id="<?php echo $item['taskid']; ?>">
        <img class="editicon" src="icons/edit-regular.svg">
      </a>
      &nbsp;
      <!--Delete the task-->
      <a data-id="<?php echo $item['taskid']; ?>" class="deltask-box no-decor">
        <img class="editicon" src="icons/trash-solid.svg">
      </a>
    </span>

    <!--Container that contains everything to edit the task-->
    <div class="ec edit-container edit-container-<?php echo $item['taskid']; ?>" data-id="<?php echo $item['taskid']; ?>">
      <div class="inner-edit">
        <img src="icons/close-exit.v2.svg" alt="" class="edit-exit exit">

        <div id="alert-<?php echo $item['taskid']; ?>" class="alert-<?php echo $item['taskid']; ?>"></div>
        <!--Changing the task priority-->
        <div class="priority">
          <!--<p class="dropdown-header">Priority:</p>-->
          <img src="icons/p1-flag-solid.svg" alt="" class="pf-1 priorityflags pf-<?php echo $item['taskid']; ?>" data-id="<?php echo $item['taskid']; ?>">
          <img src="icons/p2-flag-solid.svg" alt="" class="pf-2 priorityflags pf-<?php echo $item['taskid']; ?>" data-id="<?php echo $item['taskid']; ?>">
          <img src="icons/p3-flag-solid.svg" alt="" class="pf-3 priorityflags pf-<?php echo $item['taskid']; ?>" data-id="<?php echo $item['taskid']; ?>">
        </div>

        <br>

        <form id="updatedate-<?php echo $item['taskid']; ?>" class="date-form" data-id="<?php echo $item['taskid']; ?>">
          <!--<p class="dropdown-header">Date:</p>-->
          <input type="text" class="form-control form-control-edit date-edit de-<?php echo $item['taskid']; ?>" data-id="<?php echo $item['taskid']; ?>" value="<?php echo $item['date']; ?>" name="date" id="date-box-<?php echo $item['taskid']; ?>"><!--<br>
          <input type="submit" class="form-control-submit" value="Update Date" id="updatetask">-->
        </form>

        <br>

        <form id="updatenotes-<?php echo $item['taskid']; ?>" class="edit-box-update-notes" data-id="<?php echo $item['taskid']; ?>">
          <!--<p class="dropdown-header">Notes:</p>-->
          <?php $decryptednote = openssl_decrypt(base64_decode($item['notes']), $method, $key, OPENSSL_RAW_DATA, $iv);?>
          <textarea name="notes" id="notes" cols="30" rows="3" placeholder="Type Notes Here"><?php echo $decryptednote; ?></textarea><br>
          <input type="submit" class="form-control-update-notes" value="Update Notes" id="updatetask">
        </form>

        <br>

        <!--<p class="dropdown-header">Sub Tasks:</p>-->
        
        <div class="subtasks-li stl-<?php echo $item['taskid']; ?>">
          <?php foreach($subtasks as $subitem):?>
            <div class="sub-task" data-id="<?php echo $subitem['taskid']; ?>">
              <a href="#" class="sub-task-complete-button task-complete no-decor" data-id="<?php echo $subitem['taskid']; ?>">
                <span id="update-<?php echo $subitem['taskid']; ?>" class="<?php if($subitem['completed']=='true'){echo 'sub-completed';}else{echo 'p3';} ?>"></span>
              </a>
              <!--Task display-->
              <span class="task taskclick" data-id="<?php echo $subitem['taskid']; ?>">
              
                <?php $decryptedsubtasks = openssl_decrypt(base64_decode($subitem['name']), $method, $key, OPENSSL_RAW_DATA, $iv);?>
                <span class="task-input <?php if($subitem['completed']=='true'){echo 'sub-completed-text';} ?>" data-id="<?php echo $subitem['taskid']; ?>" contenteditable id="input-<?php echo $subitem['taskid']; ?>"><?php echo $decryptedsubtasks; ?></span>
              </span>        
            </div>
          <?php endforeach; ?>
        </div>
        <form id="subtasks-<?php echo $item['taskid']; ?>" class="subtasks-form" data-id="<?php echo $item['taskid']; ?>">
          <input type="text" id="sti-<?php echo $item['taskid']; ?>" class="form-control" placeholder="Add a sub sask..." data-id="<?php echo $item['taskid']; ?>" name="subtask">
        </form>
      </div>
    </div>
  </div>
<?php } ?>