<div class="content">
  <div class="day-container" data-date="<?php echo date('M.d.Y', strtotime('+0 day')); ?>">
    <h2><span class="day"><?php echo date('D', strtotime('+0 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+0 day')); ?></span></h2>
    <div class="todaypagetaskscontainer">
      <?php foreach($todaypage as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form id="todayform">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="todayinput">
    </form>
  </div>
</div>