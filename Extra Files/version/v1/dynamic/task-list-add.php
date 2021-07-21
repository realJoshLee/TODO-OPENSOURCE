  <div data-draggable="item" class="task taskmain task-${taskid}" data-id="${taskid}">
    <div class="task-row" data-id="${taskid}">
      <!--Complete task btn-->
      <div class="task-column task-left">
        <span class="dot task-complete-btn" data-id="${taskid}"><i class="fas fa-check"></i></span>
      </div>

      <!--Task list column-->
      <div class="task-column task-right" data-id="${taskid}">
        <span id="td-${taskid}"></span><span class="task-edit" id="pv-task-${taskid}" data-id="${taskid}">${taskvar}</span>
      </div>

      <!-- Everything for the overlay-->
      <div class="task-overlay" id="overlay-${taskid}">
        <div class="overlay-padding-top">
          <div id="text">
            <!--Close btn-->
            <p class="overlay-close" data-id="${taskid}"><i class="far fa-times-circle"></i></p>

            <p class="label">Task:</p>
            <!--Content-->
            <span class="task-edit" contenteditable id="ol-task-${taskid}">${taskvar}</span>

            <br><br>
            <span class="task-save-btn save-btn-style" data-id="${taskid}">Save Task</span>

            <div class="spacer">.</div>

            <p class="label">Date:</p>

            <form method="post" class="task-date-form" data-id="${taskid}">
              <input type="text" name="date" value="${date}" id="date-${taskid}" class="form-control" data-id="${taskid}">
              <br><br>              
              <input type="submit" class="submit save-btn-style" value="Save Date" data-id="${taskid}">
            </form>

            <div class="spacer">.</div>

            <p class="label">Notes:</p>
            <form class="ol-notes-form" id="ol-notes-form" data-id="${taskid}">
              <textarea name="notes" class="ol-task-notes" id="ol-notes-${taskid}" placeholder="Type notes here..."></textarea>
              <input type="submit" class="submit save-btn-style" value="Save Notes" data-id="${taskid}">
            </form>

            <br><br>

            <p class="label">Subtasks:</p>   
            <div class="subtasks-${taskid}">
            </div>
            <form class="subtasks-form" id="sbf-${taskid}" data-id="${taskid}">
              <input type="text" name="task" placeholder="Add a subtask" class="form-control" id="sti-${taskid}" data-id="${taskid}">
            </form>

            <br><br>
            
            <span class="remove-from-folder del-btn-style" data-id="${taskid}">Remove from folder</span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="task-del-btn del-btn-style" data-id="${taskid}">Delete Task</span>
            
            <br><br>
          </div>
        </div>
      </div>
    </div>
  </div>