  <div data-draggable="item" class="task task-main taskmain task-${taskid}" data-id="${taskid}">
    <div class="task-row" data-id="${taskid}">
      <!--Complete task btn-->
      <div class="task-column task-left">
        <span class="dot task-complete-btn" data-id="${taskid}"><i class="fas fa-check"></i></span>
      </div>

      <!--Task list column-->
      <div class="task-column task-right" data-id="${taskid}">
        <span class="heart-${taskid}"></span><span id="td-${taskid}"></span><span id="count-${taskid}"></span><span id="notesnoti-${taskid}"></span><span id="remindernoti-${taskid}"></span><span class="task-edit" id="pv-task-${taskid}" data-id="${taskid}">${taskvar}</span>
      </div>

      <!-- Everything for the overlay-->
      <div data-draggable="stop" class="task-overlay" id="overlay-${taskid}">
        <div class="overlay-padding-top">
          <div class="task-text">
            <!--Close btn-->
            <p class="overlay-close" data-id="${taskid}"><i class="far fa-times-circle"></i></p>

            <p class="label">Task:</p>
            <!--Content-->
            <span class="task-edit" contenteditable id="ol-task-${taskid}">${taskvar}</span>
            
            <span style="float:right;"><span class="outline-container" id="outline-${taskid}" data-id="${taskid}"><span class="outline" data-id="${taskid}"><i class="far fa-heart"></i></span></span>
            <span class="full-container" id="full-${taskid}" data-id="${taskid}"><span class="full" data-id="${taskid}"><i class="fas fa-heart"></i></span></span>
            
            &nbsp;&nbsp;&nbsp;<span class="task-save-btn" data-id="${taskid}"><i class="far fa-check-circle"></i></span></span>

            <br><br>

            <p class="label">Date:</p>

            <input type="text" name="date" value="${date}" style="width:70%!important;" id="date-${taskid}" class="form-control" data-id="${taskid}">            

            <span style="float:right;"><span class="task-save-date enlarge-mobile" data-id="${taskid}"><i class="far fa-check-circle"></i></span></span>

            <div class="cal-ctrl-btn">
              <span class="calendar-show-btn" data-id="${taskid}" id="csb-${taskid}">Open Calendar</span>
            </div>

            <div class="dp-obj-container" id="dp-obj-${taskid}">
              <div class="dp-obj-container-style">
                <div class="dp-obj">
                  <div style="text-align: right;">
                    <span class="calendar-hide-btn enlarge-mobile"><i class="far fa-times-circle"></i></span></span>
                  </div>
                  <h3 class="month"><?php echo date('M', strtotime('+0 day')); ?></h3>
                  <hr>
                  <table>
                    <tr>
                      <td><div class="dp-day dp-today" data-id="${taskid}" data-folder="${folderstatus}" data-date="<?php echo date('M-d-Y', strtotime('+0 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+0 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+0 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="${taskid}" data-id="${taskid}" data-folder="${folderstatus}" data-date="<?php echo date('M-d-Y', strtotime('+1 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+1 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+1 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="${taskid}" data-id="${taskid}" data-folder="${folderstatus}" data-date="<?php echo date('M-d-Y', strtotime('+2 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+2 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+2 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="${taskid}" data-id="${taskid}" data-folder="${folderstatus}" data-date="<?php echo date('M-d-Y', strtotime('+3 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+3 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+3 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="${taskid}" data-id="${taskid}" data-folder="${folderstatus}" data-date="<?php echo date('M-d-Y', strtotime('+4 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+4 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+4 day')); ?></div></div></td>
                    </tr>
                    <tr>
                      <td><div class="dp-day" data-id="${taskid}" data-id="${taskid}" data-folder="${folderstatus}" data-date="<?php echo date('M-d-Y', strtotime('+5 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+5 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+5 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="${taskid}" data-id="${taskid}" data-folder="${folderstatus}" data-date="<?php echo date('M-d-Y', strtotime('+6 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+6 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+6 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="${taskid}" data-id="${taskid}" data-folder="${folderstatus}" data-date="<?php echo date('M-d-Y', strtotime('+7 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+7 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+7 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="${taskid}" data-id="${taskid}" data-folder="${folderstatus}" data-date="<?php echo date('M-d-Y', strtotime('+8 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+8 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+8 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="${taskid}" data-id="${taskid}" data-folder="${folderstatus}" data-date="<?php echo date('M-d-Y', strtotime('+9 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+9 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+9 day')); ?></div></div></td>
                    </tr>
                    <tr>
                      <td><div class="dp-day" data-id="${taskid}" data-id="${taskid}" data-folder="${folderstatus}" data-date="<?php echo date('M-d-Y', strtotime('+10 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+10 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+10 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="${taskid}" data-id="${taskid}" data-folder="${folderstatus}" data-date="<?php echo date('M-d-Y', strtotime('+11 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+11 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+11 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="${taskid}" data-id="${taskid}" data-folder="${folderstatus}" data-date="<?php echo date('M-d-Y', strtotime('+12 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+12 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+12 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="${taskid}" data-id="${taskid}" data-folder="${folderstatus}" data-date="<?php echo date('M-d-Y', strtotime('+13 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+13 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+13 day')); ?></div></div></td>
                      <td><div class="dp-day" data-id="${taskid}" data-id="${taskid}" data-folder="${folderstatus}" data-date="<?php echo date('M-d-Y', strtotime('+14 day')); ?>"><div class="dp-top"><?php echo date('D', strtotime('+14 day')); ?></div><div class="dp-bottom"><?php echo date('d', strtotime('+14 day')); ?></div></div></td>
                    </tr>
                  </table>
                  
                  <div class="dp-day-wide" data-id="${taskid}" data-folder="${folderstatus}" data-date="<?php echo date('M-d-Y', strtotime('+1 day')); ?>"><div class="dp-bottom-wide">Tomorrow</div></div>
                </div>
              </div>
            </div>

            <br>
            
            <div class="taskol-row">
              <div class="taskol-column pt2 partctrl taskolpg-active" id="pt2-${taskid}" data-id="${taskid}" data-part="pt2">
                <p>Subtasks</p>
              </div>
              <div class="taskol-column pt1 partctrl" id="pt1-${taskid}" data-id="${taskid}" data-part="pt1">
                <p>Extras</p>
              </div>
            </div>

            <div class="pt1 pt1-${taskid}" style="display:none;">
              <!--<p class="label">Redminder Date:</p>

              <form method="post" class="task-reminderdate-form" data-id="${taskid}">
                <input type="text" name="reminderdate" value="" id="reminderdate-${taskid}" class="form-control form-control-outline" data-id="${taskid}">
                <br><br>              
                <input type="submit" class="submit save-btn-style" value="Save Reminder Date" data-id="${taskid}">
              </form>
              <br>
              <input type="submit" class="submit remove-reminder-date save-btn-style" value="Remove Reminder Date" data-id="${taskid}">

              <div class="spacer">.</div>-->

              <p class="label">Notes:</p>
              <form class="ol-notes-form" data-id="${taskid}">
                <textarea name="notes" class="ol-task-notes" id="ol-notes-${taskid}"></textarea>
                <input type="submit" class="submit save-btn-style" value="Save Notes" data-id="${taskid}">
              </form>

              <div class="spacer">.</div>

              <p class="label">Sharing:</p>               
              <input type="submit" class="save-btn-style share-btn enable-share" data-share="true" value="Enable Sharing" data-id="${taskid}">
              <input type="submit" class="save-btn-style share-btn disable-share" data-share="false" value="Disable Sharing" data-id="${taskid}">
              <input type="text" class="form-control" style="color: grey;" value="https://<?php echo $rootwebsiteval; ?>/app/viewer.php?id=${taskid}">

              <div class="spacer">.</div>

              <span class="remove-from-folder del-btn-style" data-id="${taskid}">Remove from folder</span>&nbsp;&nbsp;&nbsp;&nbsp;
              <span class="task-del-btn del-btn-style" data-id="${taskid}">Delete Task</span>
            </div>

            <div class="pt2 pt2-${taskid}">
              <p class="label">Subtasks:</p>   
              <div class="subtasks-${taskid}">
              </div>
              <form class="subtasks-form" id="sbf-${taskid}" data-id="${taskid}">
                <input type="text" name="task" placeholder="Add a subtask" class="form-control" id="sti-${taskid}" data-id="${taskid}">
              </form>
            </div>
            <br><br>
          </div>
        </div>
      </div>
    </div>
  </div>