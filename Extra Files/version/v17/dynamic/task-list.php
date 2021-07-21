<?php  if($item['completed']=='false'): ?>
  <?php 
  $decryptedtask = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);
  $notesdec = openssl_decrypt(base64_decode($item['notes']), $method, $key, OPENSSL_RAW_DATA, $iv);

  $subtasksget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `parenttid` = :ptid");
  $subtasksget->execute([
    'account' => $account,
    'ptid' => $item['tid']
  ]);
  $subtasks = $subtasksget->rowCount() ? $subtasksget : [];
  ?>
  <div data-draggable="item" class="task task-main taskmain task-<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>">
    <div class="task-row" data-id="<?php echo $item['tid']; ?>">
      <!--Complete task btn-->
      <div class="task-column task-left">
        <span class="dot task-complete-btn" data-id="<?php echo $item['tid']; ?>"><i class="fas fa-check"></i></span>
      </div>

      <!--Task list column-->
      <div class="task-column task-right" data-id="<?php echo $item['tid']; ?>">
        <span id="td-<?php echo $item['tid']; ?>"><?php if(isset($item['folderid'],$item['scheduledate'])){echo '<span class="task-date">'.$item['scheduledate'].'</span>';}?></span><span id="count-<?php echo $item['tid']; ?>"></span><span id="notesnoti-<?php echo $item['tid']; ?>"></span><span class="task-edit" id="pv-task-<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>"><?php echo $decryptedtask; ?></span>
      </div>

      <!-- Everything for the overlay-->
      <div data-draggable="stop" class="task-overlay" id="overlay-<?php echo $item['tid']; ?>">
        <div class="overlay-padding-top">
          <div id="text">
            <!--Close btn-->
            <p class="overlay-close" data-id="<?php echo $item['tid']; ?>"><i class="far fa-times-circle"></i></p>

            <p class="label">Task:</p>
            <!--Content-->
            <span class="task-edit" contenteditable id="ol-task-<?php echo $item['tid']; ?>"><?php echo $decryptedtask; ?></span>

            <br><br>
            <span class="task-save-btn save-btn-style" data-id="<?php echo $item['tid']; ?>">Save Task</span>

            <div class="spacer">.</div>

            <p class="label">Date:</p>

            <form method="post" class="task-date-form" data-id="<?php echo $item['tid']; ?>">
              <input type="text" name="date" value="<?php echo $item['scheduledate']; ?>" id="date-<?php echo $item['tid']; ?>" class="form-control form-control-outline" data-id="<?php echo $item['tid']; ?>">            

              <br><br><input type="submit" class="submit save-btn-style" value="Save Date" data-id="<?php echo $item['tid']; ?>">
            </form>
            <br>
            <input type="submit" class="submit remove-date save-btn-style" value="Remove Date" data-id="<?php echo $item['tid']; ?>">

            <div class="spacer">.</div>
            <div class="taskol-row">
              <div class="taskol-column pt2 partctrl taskolpg-active" id="pt2-<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>" data-part="pt2">
                <p>Subtasks</p>
              </div>
              <div class="taskol-column pt1 partctrl" id="pt1-<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>" data-part="pt1">
                <p>Notes/Sharing</p>
              </div>
            </div>

            <div class="pt1 pt1-<?php echo $item['tid']; ?>" style="display:none;">
              <p class="label">Redminder Date:</p>

              <form method="post" class="task-reminderdate-form" data-id="<?php echo $item['tid']; ?>">
                <input type="text" name="reminderdate" value="<?php echo $item['reminderdate']; ?>" id="reminderdate-<?php echo $item['tid']; ?>" class="form-control form-control-outline" data-id="<?php echo $item['tid']; ?>">
                <br><br>              
                <input type="submit" class="submit save-btn-style" value="Save Reminder Date" data-id="<?php echo $item['tid']; ?>">
              </form>
              <br>
              <input type="submit" class="submit remove-reminder-date save-btn-style" value="Remove Reminder Date" data-id="<?php echo $item['tid']; ?>">

              <div class="spacer">.</div>

              <p class="label">Notes:</p>
              <form class="ol-notes-form" data-id="<?php echo $item['tid']; ?>">
                <textarea name="notes" class="ol-task-notes" id="ol-notes-<?php echo $item['tid']; ?>"><?php echo $notesdec; ?></textarea>
                <input type="submit" class="submit save-btn-style" value="Save Notes" data-id="<?php echo $item['tid']; ?>">
              </form>

              <div class="spacer">.</div>

              <p class="label">Sharing:</p>               
              <input type="submit" class="save-btn-style share-btn enable-share" data-share="true" value="Enable Sharing" data-id="<?php echo $item['tid']; ?>">
              <input type="submit" class="save-btn-style share-btn disable-share" data-share="false" value="Disable Sharing" data-id="<?php echo $item['tid']; ?>">
              <input type="text" class="form-control" style="color: grey;" value="https://tasks.hstly.net/app/viewer.php?id=<?php echo $item['tid']; ?>">

              <div class="spacer">.</div>
            </div>

            <div class="pt2 pt2-<?php echo $item['tid']; ?>">
              <p class="label">Subtasks:</p>   
              <div class="subtasks-<?php echo $item['tid']; ?>">
              <?php foreach($subtasks as $subitem){ ?> 
                <?php include('dynamic/sub-tasks-list.php'); ?>
              <?php } ?>
              </div>
              <form class="subtasks-form" id="sbf-<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>">
                <input type="text" name="task" placeholder="Add a subtask" class="form-control" id="sti-<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>">
              </form>

              <div class="spacer">.</div>
              
              <?php if(isset($item['folderid'])){ ?><span class="remove-from-folder del-btn-style" data-id="<?php echo $item['tid']; ?>">Remove from folder</span>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
              <span class="task-del-btn del-btn-style" data-id="<?php echo $item['tid']; ?>">Delete Task</span>
            </div>
            <br><br>  

          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>