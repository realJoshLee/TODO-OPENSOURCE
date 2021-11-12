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

  // Gets the folders for the tasklist
  $folderstlget = $db->prepare("SELECT * FROM `tasks_folders` WHERE `account` = :account");
  $folderstlget->execute([
    'account' => $account
  ]);
  $folderstl = $folderstlget->rowCount() ? $folderstlget : [];
  ?>
  <div data-draggable="item" class="task task-main taskmain task-<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>">
    <div class="task-row" data-id="<?php echo $item['tid']; ?>">
      <!--Complete task btn-->
      <div class="task-column task-left">
        <span class="dot task-complete-btn" data-id="<?php echo $item['tid']; ?>"><i class="fas fa-check"></i></span>
      </div>

      <!--Task list column-->
      <div class="task-column task-right" data-id="<?php echo $item['tid']; ?>">
        <span class="heart-<?php echo $item['tid']; ?>"><?php if($item['favorite']=='true'){echo'<span class="full"><i class="fas fa-heart"></i>&nbsp;</span>';}?></span><span id="td-<?php echo $item['tid']; ?>"><?php if(isset($item['folderid'],$item['scheduledate'])){echo '<span class="task-date">'.$item['scheduledate'].'</span>';}?></span><span id="count-<?php echo $item['tid']; ?>"></span><span id="notesnoti-<?php echo $item['tid']; ?>"></span><span id="remindernoti-<?php echo $item['tid']; ?>"></span><span class="task-edit" id="pv-task-<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>"><?php echo $decryptedtask; ?></span>
      </div>

      <!-- Everything for the overlay-->
      <div data-draggable="stop" class="task-overlay" id="overlay-<?php echo $item['tid']; ?>">
        <div class="overlay-padding-top">
          <div class="task-text">
            <!--Close btn-->
            <p class="overlay-close" data-id="<?php echo $item['tid']; ?>"><i class="far fa-times-circle"></i></p>

            <p class="label">Task:</p>
            <!--Content-->
            <span class="task-edit fc-task" contenteditable id="ol-task-<?php echo $item['tid']; ?>"><?php echo $decryptedtask; ?></span>

            <!--<br><br>-->
            <?php
              if($item['favorite']=='true'){
                echo '<style>#outline-'.$item['tid'].' {display:none;} #full-'.$item['tid'].'{display:initial;}</style>';
              }
            ?>
            <span style="float:right;"><span class="outline-container" id="outline-<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>"><span class="outline enlarge-mobile" data-id="<?php echo $item['tid'] ; ?>"><i class="far fa-heart"></i></span></span>
            <span class="full-container" id="full-<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>"><span class="full enlarge-mobile" data-id="<?php echo $item['tid']; ?>"><i class="fas fa-heart"></i></span></span>
            
            &nbsp;&nbsp;&nbsp;<span class="task-save-btn enlarge-mobile" data-id="<?php echo $item['tid']; ?>"><i class="far fa-check-circle"></i></span></span>

            <br><br>

            <p class="label">Date:</p>

            <input type="text" name="date" value="<?php echo $item['scheduledate']; ?>" style="width:70%!important;" id="date-<?php echo $item['tid']; ?>" class="form-control fc-date" data-id="<?php echo $item['tid']; ?>">            

            <span style="float:right;"><span class="task-save-date enlarge-mobile" data-id="<?php echo $item['tid']; ?>"><i class="far fa-check-circle"></i></span></span>

          
            <div class="cal-ctrl-btn">
              <span class="calendar-show-btn" data-id="<?php echo $item['tid']; ?>" id="csb-<?php echo $item['tid']; ?>">Open Calendar</span>
            </div>

            <div class="dp-obj-container" id="dp-obj-<?php echo $item['tid']; ?>">
              <div class="dp-obj-container-style">
                <div class="dp-obj">
                  <div style="text-align: right;">
                    <span class="calendar-hide-btn enlarge-mobile"><i class="far fa-times-circle"></i></span></span>
                  </div>
                  <h3 class="month"><?php echo date('M', strtotime('+0 day')); ?></h3>
                  <hr>
                  <table>
                    <tr>
                      <td><div class="dp-day dp-today" data-id="<?php echo $item['tid']; ?>" data-folder="<?php if(isset($item['folderid'])){echo 'true';}else{echo 'false';} ?>" data-date="<?php echo date('M-d-Y', strtotime('+0 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+0 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+0 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>" data-folder="<?php if(isset($item['folderid'])){echo 'true';}else{echo 'false';} ?>" data-date="<?php echo date('M-d-Y', strtotime('+1 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+1 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+1 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>" data-folder="<?php if(isset($item['folderid'])){echo 'true';}else{echo 'false';} ?>" data-date="<?php echo date('M-d-Y', strtotime('+2 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+2 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+2 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>" data-folder="<?php if(isset($item['folderid'])){echo 'true';}else{echo 'false';} ?>" data-date="<?php echo date('M-d-Y', strtotime('+3 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+3 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+3 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>" data-folder="<?php if(isset($item['folderid'])){echo 'true';}else{echo 'false';} ?>" data-date="<?php echo date('M-d-Y', strtotime('+4 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+4 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+4 day')); ?></div></div></td>
                    </tr>
                    <tr>
                      <td><div class="dp-day" data-id="<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>" data-folder="<?php if(isset($item['folderid'])){echo 'true';}else{echo 'false';} ?>" data-date="<?php echo date('M-d-Y', strtotime('+5 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+5 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+5 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>" data-folder="<?php if(isset($item['folderid'])){echo 'true';}else{echo 'false';} ?>" data-date="<?php echo date('M-d-Y', strtotime('+6 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+6 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+6 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>" data-folder="<?php if(isset($item['folderid'])){echo 'true';}else{echo 'false';} ?>" data-date="<?php echo date('M-d-Y', strtotime('+7 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+7 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+7 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>" data-folder="<?php if(isset($item['folderid'])){echo 'true';}else{echo 'false';} ?>" data-date="<?php echo date('M-d-Y', strtotime('+8 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+8 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+8 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>" data-folder="<?php if(isset($item['folderid'])){echo 'true';}else{echo 'false';} ?>" data-date="<?php echo date('M-d-Y', strtotime('+9 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+9 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+9 day')); ?></div></div></td>
                    </tr>
                    <tr>
                      <td><div class="dp-day" data-id="<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>" data-folder="<?php if(isset($item['folderid'])){echo 'true';}else{echo 'false';} ?>" data-date="<?php echo date('M-d-Y', strtotime('+10 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+10 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+10 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>" data-folder="<?php if(isset($item['folderid'])){echo 'true';}else{echo 'false';} ?>" data-date="<?php echo date('M-d-Y', strtotime('+11 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+11 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+11 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>" data-folder="<?php if(isset($item['folderid'])){echo 'true';}else{echo 'false';} ?>" data-date="<?php echo date('M-d-Y', strtotime('+12 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+12 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+12 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>" data-folder="<?php if(isset($item['folderid'])){echo 'true';}else{echo 'false';} ?>" data-date="<?php echo date('M-d-Y', strtotime('+13 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+13 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+13 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>" data-folder="<?php if(isset($item['folderid'])){echo 'true';}else{echo 'false';} ?>" data-date="<?php echo date('M-d-Y', strtotime('+14 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+14 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+14 day')); ?></div></div></td>
                    </tr>
                  </table>
                  
                  <div class="dp-day dp-day-wide" data-id="<?php echo $item['tid']; ?>" data-folder="<?php if(isset($item['folderid'])){echo 'true';}else{echo 'false';} ?>" data-date="<?php echo date('M-d-Y', strtotime('+1 day')); ?>"><div class="dp-bottom-wide">Tomorrow</div></div>

                  
                  <?php if(!isset($item['folderid'])){ ?>
                    <div class="dp-day dp-day-wide" data-id="<?php echo $item['tid']; ?>" data-folder="false" data-date="inbox"><div class="dp-bottom-wide">Move to Inbox</div></div>
                  <?php } ?>
                  <?php if(isset($item['folderid'])){ ?>
                    <div class="dp-day dp-day-wide" data-id="<?php echo $item['tid']; ?>" data-folder="true" data-date=""><div class="dp-bottom-wide">Clear Date</div></div>
                  <?php } ?>
                </div>
              </div>
            </div>

            <br>
            
            <div class="taskol-row">
              <div class="taskol-column pt2 partctrl taskolpg-active" id="pt2-<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>" data-part="pt2">
                <p>Subtasks</p>
              </div>
              <div class="taskol-column pt1 partctrl" id="pt1-<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>" data-part="pt1">
                <p>Extras</p>
              </div>
            </div>

            <div class="pt1 pt1-<?php echo $item['tid']; ?>" style="display:none;">
              <!--<p class="label">Redminder Date:</p>

              <form method="post" class="task-reminderdate-form" data-id="<?php //echo $item['tid']; ?>">
                <input type="text" name="reminderdate" value="<?php //echo $item['reminderdate']; ?>" id="reminderdate-<?php //echo $item['tid']; ?>" class="form-control form-control-outline" data-id="<?php //echo $item['tid']; ?>">
                <br><br>              
                <input type="submit" class="submit save-btn-style" value="Save Reminder Date" data-id="<?php //echo $item['tid']; ?>">
              </form>
              <br>
              <input type="submit" class="submit remove-reminder-date save-btn-style" value="Remove Reminder Date" data-id="<?php //echo $item['tid']; ?>">

              <div class="spacer">.</div>-->

              <p class="label">Notes:</p>
              <form class="ol-notes-form" data-id="<?php echo $item['tid']; ?>">
                <textarea name="notes" class="ol-task-notes" id="ol-notes-<?php echo $item['tid']; ?>"><?php echo $notesdec; ?></textarea>
                <input type="submit" class="submit save-btn-style" value="Save Notes" data-id="<?php echo $item['tid']; ?>">
              </form>

              <div class="spacer">.</div>

              <p class="label">Folder:</p>
              <select id="tf-<?php echo $item['tid']; ?>" class="form-control-dd" data-id="<?php echo $item['tid']; ?>">
                <option value="nofolder" <?php if($item['folderid']==NULL){echo 'selected';}?> >No Folder</option>
                <?php foreach($folderstl as $foldetasklistings){ 
                  $taskfolderlistingdec = openssl_decrypt(base64_decode($foldetasklistings['name']), $method, $key, OPENSSL_RAW_DATA, $iv);
                ?>
                <option value="<?php echo $foldetasklistings['fid']; ?>" <?php if($item['folderid']==$foldetasklistings['fid']){echo 'selected';}?> ><?php echo $taskfolderlistingdec; ?></option>
                <?php } ?>
              </select>

              <span style="float:right;"><span class="task-save-folder enlarge-mobile" data-id="<?php echo $item['tid']; ?>"><i class="far fa-check-circle"></i></span></span>

              <div class="spacer">.</div>

              <p class="label">Sharing:</p>               
              <input type="submit" class="save-btn-style share-btn enable-share" data-share="true" value="Enable Sharing" data-id="<?php echo $item['tid']; ?>">
              <input type="submit" class="save-btn-style share-btn disable-share" data-share="false" value="Disable Sharing" data-id="<?php echo $item['tid']; ?>">
              <input type="text" class="form-control" style="color: grey;" value="https://<?php echo $rootwebsiteval; ?>/app/viewer.php?id=<?php echo $item['tid']; ?>">

              <div class="spacer">.</div>
              
              <?php if(isset($item['folderid'])){ ?><span class="remove-from-folder del-btn-style" data-id="<?php echo $item['tid']; ?>">Remove from folder</span>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
              <span class="task-del-btn del-btn-style" data-id="<?php echo $item['tid']; ?>">Delete Task</span>
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
            </div>
            <br><br>  

          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>