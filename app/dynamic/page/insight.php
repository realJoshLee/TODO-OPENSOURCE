<div class="content">
  
  <div class="day-container today-container">
    <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+0 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+0 day')); ?></span></h2>
    <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+0 day')); ?>" data-draggable="target">
      <?php foreach($zeroitems as $item): ?>
        <?php include('dynamic/task-list.php'); ?>
      <?php endforeach; ?>
    </div>
    <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+0 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+0 day')); ?>">
      <input type="text" name="task" placeholder="Add a task" class="form-control today-current-input" id="input-<?php echo date('M-d-Y', strtotime('+0 day')); ?>">
    </form>
  </div>
  
  <div class="spacer">.</div>

  <div class="all-other-days">
    








    <!--Singles-->
    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+1 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+1 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+1 day')); ?>" data-draggable="target">
        <?php foreach($oneitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+1 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+1 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control tomorrow-current-input" id="input-<?php echo date('M-d-Y', strtotime('+1 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+2 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+2 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+3 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+3 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+4 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+4 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+5 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+5 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+6 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+6 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+7 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+7 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+8 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+8 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+9 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+9 day')); ?></span></h2>
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









    <!--10s-->
    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+10 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+10 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+11 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+11 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+12 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+12 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+13 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+13 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+14 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+14 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+15 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+15 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+16 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+16 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+17 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+17 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+18 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+18 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+19 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+19 day')); ?></span></h2>
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









    <!--20s-->
    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+20 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+20 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+21 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+21 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+22 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+22 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+23 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+23 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+24 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+24 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+25 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+25 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+26 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+26 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+27 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+27 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+28 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+28 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+29 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+29 day')); ?></span></h2>
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









    <!--30s-->
    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+30 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+30 day')); ?></span></h2>
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
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+31 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+31 day')); ?></span></h2>
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

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+32 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+32 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+32 day')); ?>" data-draggable="target">
        <?php foreach($thirtytwoitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+32 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+32 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+32 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+33 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+33 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+33 day')); ?>" data-draggable="target">
        <?php foreach($thirtythreeitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+33 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+33 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+33 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+34 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+34 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+34 day')); ?>" data-draggable="target">
        <?php foreach($thirtyfouritems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+34 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+34 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+34 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+35 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+35 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+35 day')); ?>" data-draggable="target">
        <?php foreach($thirtyfiveitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+35 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+35 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+35 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+36 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+36 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+36 day')); ?>" data-draggable="target">
        <?php foreach($thirtysixitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+36 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+36 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+36 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+37 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+37 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+37 day')); ?>" data-draggable="target">
        <?php foreach($thirtysevenitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+37 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+37 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+37 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+38 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+38 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+38 day')); ?>" data-draggable="target">
        <?php foreach($thirtyeightitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+38 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+38 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+38 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+39 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+39 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+39 day')); ?>" data-draggable="target">
        <?php foreach($thirtynineitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+39 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+39 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+39 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>









    <!--40s-->
    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+40 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+40 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+40 day')); ?>" data-draggable="target">
        <?php foreach($fortyitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+40 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+40 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+40 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+41 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+41 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+41 day')); ?>" data-draggable="target">
        <?php foreach($fortyoneitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+41 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+41 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+41 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+42 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+42 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+42 day')); ?>" data-draggable="target">
        <?php foreach($fortytwoitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+42 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+42 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+42 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+43 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+43 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+43 day')); ?>" data-draggable="target">
        <?php foreach($fortythreeitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+43 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+43 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+43 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+44 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+44 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+44 day')); ?>" data-draggable="target">
        <?php foreach($fortyfouritems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+44 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+44 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+44 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+45 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+45 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+45 day')); ?>" data-draggable="target">
        <?php foreach($fortyfiveitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+45 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+45 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+45 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+46 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+46 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+46 day')); ?>" data-draggable="target">
        <?php foreach($fortysixitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+46 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+46 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+46 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+47 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+47 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+47 day')); ?>" data-draggable="target">
        <?php foreach($fortysevenitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+47 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+47 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+47 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+48 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+48 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+48 day')); ?>" data-draggable="target">
        <?php foreach($fortyeightitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+48 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+48 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+48 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+49 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+49 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+49 day')); ?>" data-draggable="target">
        <?php foreach($fortynineitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+49 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+49 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+49 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>









    <!--50s-->
    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+50 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+50 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+50 day')); ?>" data-draggable="target">
        <?php foreach($fiftyitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+50 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+50 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+50 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+51 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+51 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+51 day')); ?>" data-draggable="target">
        <?php foreach($fiftyoneitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+51 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+51 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+51 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+52 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+52 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+52 day')); ?>" data-draggable="target">
        <?php foreach($fiftytwoitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+52 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+52 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+52 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+53 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+53 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+53 day')); ?>" data-draggable="target">
        <?php foreach($fiftythreeitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+53 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+53 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+53 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+54 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+54 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+54 day')); ?>" data-draggable="target">
        <?php foreach($fiftyfouritems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+54 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+54 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+54 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+55 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+55 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+55 day')); ?>" data-draggable="target">
        <?php foreach($fiftyfiveitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+55 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+55 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+55 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+56 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+56 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+56 day')); ?>" data-draggable="target">
        <?php foreach($fiftysixitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+56 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+56 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+56 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+57 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+57 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+57 day')); ?>" data-draggable="target">
        <?php foreach($fiftysevenitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+57 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+57 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+57 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+58 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+58 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+58 day')); ?>" data-draggable="target">
        <?php foreach($fiftyeightitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+58 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+58 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+58 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+59 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+59 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+59 day')); ?>" data-draggable="target">
        <?php foreach($fiftynineitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+59 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+59 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+59 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>









    <!--60s-->
    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+60 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+60 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+60 day')); ?>" data-draggable="target">
        <?php foreach($sixtyitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+60 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+60 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+60 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+61 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+61 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+61 day')); ?>" data-draggable="target">
        <?php foreach($sixtyoneitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+61 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+61 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+61 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+62 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+62 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+62 day')); ?>" data-draggable="target">
        <?php foreach($sixtytwoitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+62 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+62 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+62 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+63 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+63 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+63 day')); ?>" data-draggable="target">
        <?php foreach($sixtythreeitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+63 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+63 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+63 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+64 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+64 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+64 day')); ?>" data-draggable="target">
        <?php foreach($sixtyfouritems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+64 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+64 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+64 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+65 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+65 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+65 day')); ?>" data-draggable="target">
        <?php foreach($sixtyfiveitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+65 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+65 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+65 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+66 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+66 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+66 day')); ?>" data-draggable="target">
        <?php foreach($sixtysixitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+66 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+66 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+66 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+67 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+67 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+67 day')); ?>" data-draggable="target">
        <?php foreach($sixtysevenitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+67 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+67 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+67 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+68 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+68 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+68 day')); ?>" data-draggable="target">
        <?php foreach($sixtyeightitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+68 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+68 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+68 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+69 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+69 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+69 day')); ?>" data-draggable="target">
        <?php foreach($sixtynineitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+69 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+69 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+69 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>









    <!--70s-->
    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+70 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+70 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+70 day')); ?>" data-draggable="target">
        <?php foreach($seventyitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+70 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+70 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+70 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+71 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+71 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+71 day')); ?>" data-draggable="target">
        <?php foreach($seventyoneitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+71 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+71 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+71 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+72 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+72 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+72 day')); ?>" data-draggable="target">
        <?php foreach($seventytwoitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+72 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+72 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+72 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+73 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+73 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+73 day')); ?>" data-draggable="target">
        <?php foreach($seventythreeitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+73 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+73 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+73 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+74 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+74 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+74 day')); ?>" data-draggable="target">
        <?php foreach($seventyfouritems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+74 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+74 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+74 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+75 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+75 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+75 day')); ?>" data-draggable="target">
        <?php foreach($seventyfiveitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+75 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+75 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+75 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+76 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+76 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+76 day')); ?>" data-draggable="target">
        <?php foreach($seventysixitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+76 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+76 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+76 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+77 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+77 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+77 day')); ?>" data-draggable="target">
        <?php foreach($seventysevenitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+77 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+77 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+77 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+78 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+78 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+78 day')); ?>" data-draggable="target">
        <?php foreach($seventyeightitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+78 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+78 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+78 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+79 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+79 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+79 day')); ?>" data-draggable="target">
        <?php foreach($seventynineitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+79 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+79 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+79 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>









    <!--80s-->
    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+80 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+80 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+80 day')); ?>" data-draggable="target">
        <?php foreach($eightyitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+80 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+80 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+80 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+81 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+81 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+81 day')); ?>" data-draggable="target">
        <?php foreach($eightyoneitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+81 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+81 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+81 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+82 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+82 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+82 day')); ?>" data-draggable="target">
        <?php foreach($eightytwoitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+82 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+82 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+82 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+83 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+83 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+83 day')); ?>" data-draggable="target">
        <?php foreach($eightythreeitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+83 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+83 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+83 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+84 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+84 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+84 day')); ?>" data-draggable="target">
        <?php foreach($eightyfouritems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+84 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+84 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+84 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+85 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+85 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+85 day')); ?>" data-draggable="target">
        <?php foreach($eightyfiveitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+85 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+85 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+85 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+86 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+86 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+86 day')); ?>" data-draggable="target">
        <?php foreach($eightysixitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+86 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+86 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+86 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+87 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+87 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+87 day')); ?>" data-draggable="target">
        <?php foreach($eightysevenitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+87 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+87 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+87 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+88 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+88 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+88 day')); ?>" data-draggable="target">
        <?php foreach($eightyeightitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+88 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+88 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+88 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+89 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+89 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+89 day')); ?>" data-draggable="target">
        <?php foreach($eightynineitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+89 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+89 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+89 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>









    <!--90s-->
    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+90 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+90 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+90 day')); ?>" data-draggable="target">
        <?php foreach($ninetyitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+90 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+90 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+90 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+91 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+91 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+91 day')); ?>" data-draggable="target">
        <?php foreach($ninetyoneitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+91 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+91 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+91 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+92 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+92 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+92 day')); ?>" data-draggable="target">
        <?php foreach($ninetytwoitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+92 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+92 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+92 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+93 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+93 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+93 day')); ?>" data-draggable="target">
        <?php foreach($ninetythreeitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+93 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+93 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+93 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+94 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+94 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+94 day')); ?>" data-draggable="target">
        <?php foreach($ninetyfouritems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+94 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+94 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+94 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+95 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+95 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+95 day')); ?>" data-draggable="target">
        <?php foreach($ninetyfiveitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+95 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+95 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+95 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+96 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+96 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+96 day')); ?>" data-draggable="target">
        <?php foreach($ninetysixitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+96 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+96 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+96 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+97 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+97 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+97 day')); ?>" data-draggable="target">
        <?php foreach($ninetysevenitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+97 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+97 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+97 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+98 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+98 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+98 day')); ?>" data-draggable="target">
        <?php foreach($ninetyeightitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+98 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+98 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+98 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>

    <div class="day-container">
      <h2 class="noselect"><span class="day"><?php echo date('D', strtotime('+99 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+99 day')); ?></span></h2>
      <div class="task-container" id="<?php echo date('M-d-Y', strtotime('+99 day')); ?>" data-draggable="target">
        <?php foreach($ninetynineitems as $item): ?>
          <?php include('dynamic/task-list.php'); ?>
        <?php endforeach; ?>
      </div>
      <form class="task-sub-form" data-id="<?php echo date('M-d-Y', strtotime('+99 day')); ?>" id="form-<?php echo date('M-d-Y', strtotime('+99 day')); ?>">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-<?php echo date('M-d-Y', strtotime('+99 day')); ?>">
      </form>
    </div>

    <div class="spacer">.</div>
  </div>

</div>