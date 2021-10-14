<div data-draggable="item" class="task task-main task-${taskid}" data-id="${taskid}">
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
      <div class="task-overlay" id="overlay-${taskid}">
        <div class="overlay-padding-top">
          <div class="task-text">
            <!--Close btn-->
            <p class="overlay-close" data-id="${taskid}"><i class="far fa-times-circle"></i></p>

            <p class="label">Task:</p>
            <!--Content-->
            <span class="task-edit" contenteditable id="ol-task-${taskid}">${taskvar}</span>

            <br><br>
            
            <span class="outline-container" id="outline-${taskid}" data-id="${taskid}"><span class="outline" data-id="${taskid}"><i class="far fa-heart"></i></span></span>
            <span class="full-container" id="full-${taskid}" data-id="${taskid}"><span class="full" data-id="${taskid}"><i class="fas fa-heart"></i></span></span>
            
            &nbsp;&nbsp;&nbsp;<span class="task-save-btn" data-id="${taskid}"><i class="far fa-check-circle"></i></span>

            <div class="spacer">.</div>

            <p class="label">Date:</p>

            <input type="text" name="date" value="${date}" id="date-${taskid}" class="form-control form-control-outline" data-id="${taskid}">            

            <br><br><span class="task-save-date" data-id="${taskid}"><i class="far fa-check-circle"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="remove-date" data-id="${taskid}"><i class="far fa-times-circle"></i></span>

            <div class="spacer">.</div>
            <div class="taskol-row">
              <div class="taskol-column pt2 partctrl taskolpg-active" id="pt2-${taskid}" data-id="${taskid}" data-part="pt2">
                <p>Subtasks</p>
              </div>
              <div class="taskol-column pt1 partctrl" id="pt1-${taskid}" data-id="${taskid}" data-part="pt1">
                <p>Notes/Sharing</p>
              </div>
            </div>

            <div class="pt1 pt1-${taskid}" style="display:none;">
              <p class="label">Redminder Date:</p>

              <form method="post" class="task-reminderdate-form" data-id="${taskid}">
                <input type="text" name="reminderdate" value="" id="reminderdate-${taskid}" class="form-control form-control-outline" data-id="${taskid}">
                <br><br>              
                <input type="submit" class="submit save-btn-style" value="Save Reminder Date" data-id="${taskid}">
              </form>
              <br>
              <input type="submit" class="submit remove-reminder-date save-btn-style" value="Remove Reminder Date" data-id="${taskid}">

              <div class="spacer">.</div>

              <p class="label">Notes:</p>
              <form class="ol-notes-form" data-id="${taskid}">
                <textarea name="notes" class="ol-task-notes" id="ol-notes-${taskid}" placeholder="Type notes here..."></textarea>
                <input type="submit" class="submit save-btn-style" value="Save Notes" data-id="${taskid}">
              </form>

              <div class="spacer">.</div>

              <p class="label">Sharing:</p>               
              <input type="submit" class="save-btn-style share-btn enable-share" data-share="true" value="Enable Sharing" data-id="${taskid}">
              <input type="submit" class="save-btn-style share-btn disable-share" data-share="false" value="Disable Sharing" data-id="${taskid}">
              <input type="text" class="form-control" style="color: grey;" value="https://tasks.hstly.net/app/viewer.php?id=${taskid}">

              <div class="spacer">.</div>
            </div>

            <div class="pt2 pt2-${taskid}">
              <p class="label">Subtasks:</p>   
              <div class="subtasks-${taskid}">
              </div>
              <form class="subtasks-form" id="sbf-${taskid}" data-id="${taskid}">
                <input type="text" name="task" placeholder="Add a subtask" class="form-control" id="sti-${taskid}" data-id="${taskid}">
              </form>

              <div class="spacer">.</div>
              
              <span class="remove-from-folder del-btn-style" data-id="${taskid}">Remove from folder</span>&nbsp;&nbsp;&nbsp;&nbsp;
              <span class="task-del-btn del-btn-style" data-id="${taskid}">Delete Task</span>
            </div>
            <br><br>
          </div>
        </div>
      </div>
    </div>
  </div>