<div class="content">
  <div class="day-container">
    <h2><span class="day noselect">Inbox</span></h2>
    <div class="task-container" id="inbox">
      <?php foreach($inbox as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="inbox" id="form-inbox">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-inbox">
    </form>
  </div>
</div>