<div class="content">
  
  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+0 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+0 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+0 day')); ?>" data-draggable="target">
      <?php foreach($zeroitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+0 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+0 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+0 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>
  
  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+1 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+1 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+1 day')); ?>" data-draggable="target">
      <?php foreach($oneitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+1 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+1 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+1 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+2 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+2 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+2 day')); ?>" data-draggable="target">
      <?php foreach($twoitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+2 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+2 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+2 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+3 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+3 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+3 day')); ?>" data-draggable="target">
      <?php foreach($threeitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+3 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+3 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+3 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+4 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+4 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+4 day')); ?>" data-draggable="target">
      <?php foreach($fouritems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+4 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+4 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+4 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+5 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+5 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+5 day')); ?>" data-draggable="target">
      <?php foreach($fiveitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+5 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+5 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+5 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+6 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+6 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+6 day')); ?>" data-draggable="target">
      <?php foreach($sixitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+6 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+6 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+6 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+7 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+7 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+7 day')); ?>" data-draggable="target">
      <?php foreach($sevenitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+7 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+7 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+7 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+8 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+8 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+8 day')); ?>" data-draggable="target">
      <?php foreach($eightitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+8 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+8 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+8 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+9 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+9 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+9 day')); ?>" data-draggable="target">
      <?php foreach($nineitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+9 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+9 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+9 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+10 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+10 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+10 day')); ?>" data-draggable="target">
      <?php foreach($tenitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+10 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+10 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+10 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+11 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+11 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+11 day')); ?>" data-draggable="target">
      <?php foreach($elevenitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+11 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+11 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+11 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+12 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+12 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+12 day')); ?>" data-draggable="target">
      <?php foreach($twelveitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+12 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+12 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+12 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+13 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+13 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+13 day')); ?>" data-draggable="target">
      <?php foreach($thirteenitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+13 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+13 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+13 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+14 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+14 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+14 day')); ?>" data-draggable="target">
      <?php foreach($fourteenitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+14 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+14 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+14 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+15 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+15 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+15 day')); ?>" data-draggable="target">
      <?php foreach($fifteenitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+15 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+15 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+15 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+16 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+16 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+16 day')); ?>" data-draggable="target">
      <?php foreach($sixteenitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+16 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+16 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+16 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+17 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+17 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+17 day')); ?>" data-draggable="target">
      <?php foreach($seventeenitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+17 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+17 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+17 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+18 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+18 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+18 day')); ?>" data-draggable="target">
      <?php foreach($eightteenitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+18 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+18 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+18 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+19 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+19 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+19 day')); ?>" data-draggable="target">
      <?php foreach($nineteenitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+19 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+19 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+19 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+20 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+20 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+20 day')); ?>" data-draggable="target">
      <?php foreach($twentyitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+20 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+20 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+20 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+21 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+21 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+21 day')); ?>" data-draggable="target">
      <?php foreach($twentyoneitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+21 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+21 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+21 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+22 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+22 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+22 day')); ?>" data-draggable="target">
      <?php foreach($twentytwoitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+22 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+22 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+22 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+23 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+23 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+23 day')); ?>" data-draggable="target">
      <?php foreach($twentythreeitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+23 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+23 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+23 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+24 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+24 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+24 day')); ?>" data-draggable="target">
      <?php foreach($twentyfouritems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+24 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+24 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+24 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+25 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+25 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+25 day')); ?>" data-draggable="target">
      <?php foreach($twentyfiveitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+25 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+25 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+25 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+26 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+26 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+26 day')); ?>" data-draggable="target">
      <?php foreach($twentysixitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+26 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+26 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+26 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+27 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+27 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+27 day')); ?>" data-draggable="target">
      <?php foreach($twentysevenitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+27 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+27 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+27 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+28 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+28 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+28 day')); ?>" data-draggable="target">
      <?php foreach($twentyeightitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+28 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+28 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+28 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+29 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+29 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+29 day')); ?>" data-draggable="target">
      <?php foreach($twentynineitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+29 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+29 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+29 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+30 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+30 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+30 day')); ?>" data-draggable="target">
      <?php foreach($thirtyitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+30 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+30 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+30 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

  <div class="day-container">
    <h2><span class="day"><?php echo date('D', strtotime('+31 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+31 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+31 day')); ?>" data-draggable="target">
      <?php foreach($thirtyoneitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+31 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+31 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+31 day')); ?>">
    </form>
  </div>

  <div class="spacer">.</div>

</div>