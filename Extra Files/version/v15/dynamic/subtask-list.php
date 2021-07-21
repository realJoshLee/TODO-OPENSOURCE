    <div class="task task-${subtaskid}" id="task-${subtaskid}" data-id="${subtaskid}">
      <div class="task-row" data-id="${subtaskid}">
        <!--Complete task btn-->
        <div class="task-column task-left">
          <span class="dot task-complete-btn" data-id="${subtaskid}"></span>
        </div>

        <!--Task list column-->
        <div class="task-column task-right" data-id="${subtaskid}">
          <span class="task-edit" id="pv-task-${subtaskid}" data-id="${subtaskid}" contenteditable>${taskvar}</span>
        </div>
      </div>
    </div>