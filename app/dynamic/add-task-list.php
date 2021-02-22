  <div class="task-outer task-outer-${taskid}">
    <!--Completion dot-->
    <a href="#" class="task-complete no-decor" data-id="${taskid}">
      <span id="update-${taskid}" class="p3"></span>
    </a>
    <!--Task display-->
    <span class="task" data-id="${taskid}">
      <span class="task-input" data-id="${taskid}" contenteditable id="input-${taskid}">${taskvar}</span>
    </span>

    <!-- Side hover actions-->
    <span class="hovershow">
      <img src="icons/p1-flag-solid.svg" alt="" class="pf-1 editicon pf-${taskid}" data-id="${taskid}">
      &nbsp;
      <img src="icons/p2-flag-solid.svg" alt="" class="pf-2 editicon pf-${taskid}" data-id="${taskid}">
      &nbsp;
      <img src="icons/p3-flag-solid.svg" alt="" class="pf-3 editicon pf-${taskid}" data-id="${taskid}">
      &nbsp;
      <!--Edit the task-->
      <a class="no-decor edit-button" data-id="${taskid}">
        <img class="editicon" src="icons/edit-regular.svg">
      </a>
      &nbsp;
      <!--Delete the task-->
      <a data-id="${taskid}" class="deltask-box no-decor">
        <img class="editicon" src="icons/trash-solid.svg">
      </a>
    </span>

    <!--Container that contains everything to edit the task-->
    <div class="ec edit-container edit-container-${taskid}" data-id="${taskid}" style="display:none;">
      <div class="inner-edit">
        <img src="icons/close-exit.v2.svg" alt="" class="edit-exit exit">
        <div id="alert-${taskid}" class="alert-${taskid}"></div>
        <!--Changing the task priority-->
        <div class="priority">
          <!--<p class="dropdown-header">Priority:</p>-->
          <img src="icons/p1-flag-solid.svg" alt="" class="pf-1 priorityflags pf-${taskid}" data-id="${taskid}">
          <img src="icons/p2-flag-solid.svg" alt="" class="pf-2 priorityflags pf-${taskid}" data-id="${taskid}">
          <img src="icons/p3-flag-solid.svg" alt="" class="pf-3 priorityflags pf-${taskid}" data-id="${taskid}">
        </div>

        <!--<br>

        <form id="updatedate-${taskid}" class="date-form" data-id="${taskid}">
          <p><b>Date:</b><br>&nbsp;&nbsp;&nbsp;&nbsp;Example: Oct.21.2020 or inbox for the inbox folder.</p>
          <input type="text" class="form-control form-control-edit date-edit de-${taskid}" data-id="${taskid}" value="" name="date" id="date-box-${taskid}"><br>
          <input type="submit" class="form-control-submit" value="Update Date" id="updatetask">
        </form>-->

        <br>

        <form id="updatenotes-${taskid}" class="edit-box-update-notes" data-id="${taskid}">
          <!--<p class="dropdown-header">Notes:</p>-->
          <textarea name="notes" id="notes" cols="30" rows="3" placeholder="Type Notes Here"></textarea><br>
          <input type="submit" class="form-control-update-notes" value="Update Notes" id="updatetask">
        </form>

        <br>

        <!--<p class="dropdown-header">Sub Tasks:</p>-->
        
        <div class="subtasks-li stl-${taskid}">
        </div>
        <form id="subtasks-${taskid}" class="subtasks-form" data-id="${taskid}">
          <input type="text" id="sti-${taskid}" class="form-control" placeholder="Add a sub sask..." data-id="${taskid}" name="subtask">
        </form>
      </div>
    </div>
  </div>