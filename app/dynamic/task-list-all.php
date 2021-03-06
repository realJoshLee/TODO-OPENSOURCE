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
  <div class="task taskmain task-<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>">
    <div class="task-row" data-id="<?php echo $item['tid']; ?>">
      <!--Complete task btn-->
      <div class="task-column task-left">
        <span class="dot task-complete-btn" data-id="<?php echo $item['tid']; ?>"></span>
      </div>

      <!--Task list column-->
      <div class="task-column task-right" data-id="<?php echo $item['tid']; ?>">
        <span class="task-date"></span><span class="task-edit" id="pv-task-<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>"><?php echo $decryptedtask; ?></span>
      </div>

      <!-- Everything for the overlay-->
      <div class="task-overlay" id="overlay-<?php echo $item['tid']; ?>">
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
              <input type="text" name="date" value="<?php echo $item['scheduledate']; ?>" id="date-<?php echo $item['tid']; ?>" class="form-control" data-id="<?php echo $item['tid']; ?>">
              <br><br>              
              <input type="submit" class="submit save-btn-style" value="Save Date" data-id="<?php echo $item['tid']; ?>">
            </form>

            <div class="spacer">.</div>

            <p class="label">Notes:</p>
            <form class="ol-notes-form" id="ol-notes-form" data-id="<?php echo $item['tid']; ?>">
              <textarea name="notes" class="ol-task-notes" id="ol-notes-<?php echo $item['tid']; ?>"><?php echo $notesdec; ?></textarea>
              <input type="submit" class="submit save-btn-style" value="Save Notes" data-id="<?php echo $item['tid']; ?>">
            </form>

            <br><br>

            <p class="label">Subtasks:</p>   
            <div class="subtasks-<?php echo $item['tid']; ?>">
            <?php foreach($subtasks as $subitem){ ?> 
              <?php include('dynamic/sub-tasks-list.php'); ?>
            <?php } ?>
            </div>
            <form class="subtasks-form" id="sbf-<?php echo $item['tid'];?>" data-id="<?php echo $item['tid']; ?>">
              <input type="text" name="task" placeholder="Add a subtask" class="form-control" id="sti-<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>">
            </form>

            <br><br>
            
            <span class="task-del-btn del-btn-style" data-id="<?php echo $item['tid']; ?>">Delete Task</span>
            
            <br><br>
            <br><br>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>