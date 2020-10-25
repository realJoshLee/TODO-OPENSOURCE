<?php
  session_start();  
  
  if(!isset($_SESSION["suite"]))  {  
    header("location:../index.php");  
  }

  require_once 'init.php';

  // Today
  $today = date('M.d.Y', strtotime('+0 day'));
  $todayitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $todayitemsget->execute([
    'account' => $account,
    'date' => $today
  ]);
  $todayitems = $todayitemsget->rowCount() ? $todayitemsget : [];

  // One
  $one = date('M.d.Y', strtotime('+1 day'));
  $oneitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $oneitemsget->execute([
    'account' => $account,
    'date' => $one
  ]);
  $oneitems = $oneitemsget->rowCount() ? $oneitemsget : [];

  // Two
  $two = date('M.d.Y', strtotime('+2 day'));
  $twoitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $twoitemsget->execute([
    'account' => $account,
    'date' => $two
  ]);
  $twoitems = $twoitemsget->rowCount() ? $twoitemsget : [];

  // Three
  $three = date('M.d.Y', strtotime('+3 day'));
  $threeitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $threeitemsget->execute([
    'account' => $account,
    'date' => $three
  ]);
  $threeitems = $threeitemsget->rowCount() ? $threeitemsget : [];

  // Four
  $four = date('M.d.Y', strtotime('+4 day'));
  $fouritemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $fouritemsget->execute([
    'account' => $account,
    'date' => $four
  ]);
  $fouritems = $fouritemsget->rowCount() ? $fouritemsget : [];

  // Five
  $five = date('M.d.Y', strtotime('+5 day'));
  $fiveitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $fiveitemsget->execute([
    'account' => $account,
    'date' => $five
  ]);
  $fiveitems = $fiveitemsget->rowCount() ? $fiveitemsget : [];

  // Six
  $six = date('M.d.Y', strtotime('+6 day'));
  $sixitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $sixitemsget->execute([
    'account' => $account,
    'date' => $six
  ]);
  $sixitems = $sixitemsget->rowCount() ? $sixitemsget : [];

  // Seven
  $seven = date('M.d.Y', strtotime('+7 day'));
  $sevenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $sevenitemsget->execute([
    'account' => $account,
    'date' => $seven
  ]);
  $sevenitems = $sevenitemsget->rowCount() ? $sevenitemsget : [];

  // Eight
  $eight = date('M.d.Y', strtotime('+8 day'));
  $eightitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $eightitemsget->execute([
    'account' => $account,
    'date' => $eight
  ]);
  $eightitems = $eightitemsget->rowCount() ? $eightitemsget : [];

  // Nine
  $nine = date('M.d.Y', strtotime('+9 day'));
  $nineitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $nineitemsget->execute([
    'account' => $account,
    'date' => $nine
  ]);
  $nineitems = $nineitemsget->rowCount() ? $nineitemsget : [];

  // Ten
  $ten = date('M.d.Y', strtotime('+10 day'));
  $tenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $tenitemsget->execute([
    'account' => $account,
    'date' => $ten
  ]);
  $tenitems = $tenitemsget->rowCount() ? $tenitemsget : [];

  // Eleven
  $eleven = date('M.d.Y', strtotime('+11 day'));
  $elevenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $elevenitemsget->execute([
    'account' => $account,
    'date' => $eleven
  ]);
  $elevenitems = $elevenitemsget->rowCount() ? $elevenitemsget : [];

  // Twelve
  $twelve = date('M.d.Y', strtotime('+12 day'));
  $twelveitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $twelveitemsget->execute([
    'account' => $account,
    'date' => $twelve
  ]);
  $twelveitems = $twelveitemsget->rowCount() ? $twelveitemsget : [];

  // Thirteen
  $thirteen = date('M.d.Y', strtotime('+13 day'));
  $thirteenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $thirteenitemsget->execute([
    'account' => $account,
    'date' => $thirteen
  ]);
  $thirteenitems = $thirteenitemsget->rowCount() ? $thirteenitemsget : [];

  // Fourteen
  $fourteen = date('M.d.Y', strtotime('+14 day'));
  $fourteenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $fourteenitemsget->execute([
    'account' => $account,
    'date' => $fourteen
  ]);
  $fourteenitems = $fourteenitemsget->rowCount() ? $fourteenitemsget : [];

  // Fifteen
  $fifteen = date('M.d.Y', strtotime('+15 day'));
  $fifteenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $fifteenitemsget->execute([
    'account' => $account,
    'date' => $fifteen
  ]);
  $fifteenitems = $fifteenitemsget->rowCount() ? $fifteenitemsget : [];

  // Sixteen
  $sixteen = date('M.d.Y', strtotime('+16 day'));
  $sixteenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $sixteenitemsget->execute([
    'account' => $account,
    'date' => $sixteen
  ]);
  $sixteenitems = $sixteenitemsget->rowCount() ? $sixteenitemsget : [];

  // Seventeen
  $seventeen = date('M.d.Y', strtotime('+17 day'));
  $seventeenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $seventeenitemsget->execute([
    'account' => $account,
    'date' => $seventeen
  ]);
  $seventeenitems = $seventeenitemsget->rowCount() ? $seventeenitemsget : [];

  // Eightteen
  $eightteen = date('M.d.Y', strtotime('+18 day'));
  $eightteenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $eightteenitemsget->execute([
    'account' => $account,
    'date' => $eightteen
  ]);
  $eightteenitems = $eightteenitemsget->rowCount() ? $eightteenitemsget : [];

  // Nineteen
  $nineteen = date('M.d.Y', strtotime('+19 day'));
  $nineteenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $nineteenitemsget->execute([
    'account' => $account,
    'date' => $nineteen
  ]);
  $nineteenitems = $nineteenitemsget->rowCount() ? $nineteenitemsget : [];

  // Twenty
  $twenty = date('M.d.Y', strtotime('+20 day'));
  $twentyitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $twentyitemsget->execute([
    'account' => $account,
    'date' => $twenty
  ]);
  $twentyitems = $twentyitemsget->rowCount() ? $twentyitemsget : [];

  // Twentyone
  $twentyone = date('M.d.Y', strtotime('+21 day'));
  $twentyoneitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $twentyoneitemsget->execute([
    'account' => $account,
    'date' => $twentyone
  ]);
  $twentyoneitems = $twentyoneitemsget->rowCount() ? $twentyoneitemsget : [];

  // Twentytwo
  $twentytwo = date('M.d.Y', strtotime('+22 day'));
  $twentytwoitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $twentytwoitemsget->execute([
    'account' => $account,
    'date' => $twentytwo
  ]);
  $twentytwoitems = $twentytwoitemsget->rowCount() ? $twentytwoitemsget : [];

  // Twentythree
  $twentythree = date('M.d.Y', strtotime('+23 day'));
  $twentythreeitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $twentythreeitemsget->execute([
    'account' => $account,
    'date' => $twentythree
  ]);
  $twentythreeitems = $twentythreeitemsget->rowCount() ? $twentythreeitemsget : [];

  // Twentyfour
  $twentyfour = date('M.d.Y', strtotime('+24 day'));
  $twentyfouritemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $twentyfouritemsget->execute([
    'account' => $account,
    'date' => $twentyfour
  ]);
  $twentyfouritems = $twentyfouritemsget->rowCount() ? $twentyfouritemsget : [];

  // Twentyfive
  $twentyfive = date('M.d.Y', strtotime('+25 day'));
  $twentyfiveitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $twentyfiveitemsget->execute([
    'account' => $account,
    'date' => $twentyfive
  ]);
  $twentyfiveitems = $twentyfiveitemsget->rowCount() ? $twentyfiveitemsget : [];

  // Twentysix
  $twentysix = date('M.d.Y', strtotime('+26 day'));
  $twentysixitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $twentysixitemsget->execute([
    'account' => $account,
    'date' => $twentysix
  ]);
  $twentysixitems = $twentysixitemsget->rowCount() ? $twentysixitemsget : [];

  // Twentyseven
  $twentyseven = date('M.d.Y', strtotime('+27 day'));
  $twentysevenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $twentysevenitemsget->execute([
    'account' => $account,
    'date' => $twentyseven
  ]);
  $twentysevenitems = $twentysevenitemsget->rowCount() ? $twentysevenitemsget : [];

  // Twentyeight
  $twentyeight = date('M.d.Y', strtotime('+28 day'));
  $twentyeightitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $twentyeightitemsget->execute([
    'account' => $account,
    'date' => $twentyeight
  ]);
  $twentyeightitems = $twentyeightitemsget->rowCount() ? $twentyeightitemsget : [];

  // Twentynine
  $twentynine = date('M.d.Y', strtotime('+29 day'));
  $twentynineitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $twentynineitemsget->execute([
    'account' => $account,
    'date' => $twentynine
  ]);
  $twentynineitems = $twentynineitemsget->rowCount() ? $twentynineitemsget : [];

  // Thirty
  $thirty = date('M.d.Y', strtotime('+30 day'));
  $thirtyitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $thirtyitemsget->execute([
    'account' => $account,
    'date' => $thirty
  ]);
  $thirtyitems = $thirtyitemsget->rowCount() ? $thirtyitemsget : [];

  // Thirtyone
  $thirtyone = date('M.d.Y', strtotime('+31 day'));
  $thirtyoneitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `completed` ASC");
  $thirtyoneitemsget->execute([
    'account' => $account,
    'date' => $thirtyone
  ]);
  $thirtyoneitems = $thirtyoneitemsget->rowCount() ? $thirtyoneitemsget : [];

  $color = '#ededed';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('dynamic/header.php'); ?>
  </head>
  <body>
    <?php include('dynamic/nav.php'); ?>
    <div class="main" id="main" id="top">
      <p>Planning Menu:</p>
      <a href="preview.php#top" class="planninglink active">Simple</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="planning.php#top" class="planninglink">Advanced</a> 
      <style>
        a.planninglink {
          color: #fff;
          background-color: #006fff;
          border-radius: 5px;
          text-decoration: none;
          padding-top: 5px;
          padding-bottom: 5px;
          padding-left: 10px;
          padding-right: 10px;
        }

        a.active {
          opacity: 0.5;
        }
      </style>
      <br><br>
      <!--today-->
      <div class="today item">
        <h2><span class="day"><?php echo date('D', strtotime('+0 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+0 day')); ?></span></h2>
        <?php foreach($todayitems as $item):?>
          <?php include('dynamic/task.php'); ?>
        <?php endforeach; ?>

        <form action="add.php?date=today" method="POST">
          <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...' autofocus>
        </form>
      </div>

      <hr color="<?php echo $color;?>">

      <!--One-->
      <div class="one item">
        <h2><span class="day"><?php echo date('D', strtotime('+1 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+1 day')); ?></span></h2>
        <?php foreach($oneitems as $item):?>
          <?php include('dynamic/task.php'); ?>
        <?php endforeach; ?>
        
        <form action="add.php?date=tomorrow" method="POST">
          <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
        </form>
      </div>

      <hr color="<?php echo $color;?>">

      <!--Two -->
      <div class="item two">
        <h2><span class="day"><?php echo date('D', strtotime('+2 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+2 day')); ?></span></h2>
        <?php foreach($twoitems as $item):?>
          <?php include('dynamic/task.php'); ?>
        <?php endforeach; ?>
        
        <form action="add.php?date=twodays" method="POST">
          <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
        </form>
      </div>

      <hr color="<?php echo $color;?>">

      <!--Three-->
      <div class="item three">
        <h2><span class="day"><?php echo date('D', strtotime('+3 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+3 day')); ?></span></h2>
        <?php foreach($threeitems as $item):?>
          <?php include('dynamic/task.php'); ?>
        <?php endforeach; ?>
        
        <form action="add.php?date=threedays" method="POST">
          <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
        </form>
      </div>

      <hr color="<?php echo $color;?>">

      <!--Four-->
      <div class="item four">
        <h2><span class="day"><?php echo date('D', strtotime('+4 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+4 day')); ?></span></h2>
        <?php foreach($fouritems as $item):?>
          <?php include('dynamic/task.php'); ?>
        <?php endforeach; ?>
        
        <form action="add-preview.php?date=<?php echo $four; ?>" method="POST">
          <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
        </form>
      </div>

      <hr color="<?php echo $color;?>">

      <!--Five-->
      <div class="item five">
        <h2><span class="day"><?php echo date('D', strtotime('+5 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+5 day')); ?></span></h2>
        <?php foreach($fiveitems as $item):?>
          <?php include('dynamic/task.php'); ?>
        <?php endforeach; ?>
        
        <form action="add-preview.php?date=<?php echo $five; ?>" method="POST">
          <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
        </form>
      </div>

      <hr color="<?php echo $color;?>">

      <!--Six-->
      <div class="item six">
        <h2><span class="day"><?php echo date('D', strtotime('+6 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+6 day')); ?></span></h2>
        <?php foreach($sixitems as $item):?>
          <?php include('dynamic/task.php'); ?>
        <?php endforeach; ?>
        
        <form action="add-preview.php?date=<?php echo $six; ?>" method="POST">
          <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
        </form>
      </div>

      <hr color="<?php echo $color;?>">

      <!--Seven-->
      <div class="item seven">
        <h2><span class="day"><?php echo date('D', strtotime('+7 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+7 day')); ?></span></h2>
        <?php foreach($sevenitems as $item):?>
          <?php include('dynamic/task.php'); ?>
        <?php endforeach; ?>
        
        <form action="add-preview.php?date=<?php echo $seven; ?>" method="POST">
          <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
        </form>
      </div>

      <hr color="<?php echo $color;?>">

      <!--Eight-->
      <div class="item five">
        <h2><span class="day"><?php echo date('D', strtotime('+8 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+8 day')); ?></span></h2>
        <?php foreach($eightitems as $item):?>
          <?php include('dynamic/task.php'); ?>
        <?php endforeach; ?>
        
        <form action="add-preview.php?date=<?php echo $eight; ?>" method="POST">
          <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
        </form>
      </div>

      <hr color="<?php echo $color;?>">

      <!--Nine-->
      <div class="item Nine">
        <h2><span class="day"><?php echo date('D', strtotime('+9 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+9 day')); ?></span></h2>
        <?php foreach($nineitems as $item):?>
          <?php include('dynamic/task.php'); ?>
        <?php endforeach; ?>
        
        <form action="add-preview.php?date=<?php echo $nine; ?>" method="POST">
          <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
        </form>
      </div>

      <hr color="<?php echo $color;?>">

      <!--Ten-->
      <div class="item ten">
        <h2><span class="day"><?php echo date('D', strtotime('+10 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+10 day')); ?></span></h2>
        <?php foreach($tenitems as $item):?>
          <?php include('dynamic/task.php'); ?>
        <?php endforeach; ?>
        
        <form action="add-preview.php?date=<?php echo $ten; ?>" method="POST">
          <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
        </form>
      </div>

      <hr color="<?php echo $color;?>">

      <!--Eleven-->
      <div class="item eleven">
        <h2><span class="day"><?php echo date('D', strtotime('+11 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+11 day')); ?></span></h2>
        <?php foreach($elevenitems as $item):?>
          <?php include('dynamic/task.php'); ?>
        <?php endforeach; ?>
        
        <form action="add-preview.php?date=<?php echo $eleven; ?>" method="POST">
          <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
        </form>
      </div>

      <hr color="<?php echo $color;?>">

      <!--Twelve-->
      <div class="item twelve">
        <h2><span class="day"><?php echo date('D', strtotime('+12 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+12 day')); ?></span></h2>
        <?php foreach($twelveitems as $item):?>
          <?php include('dynamic/task.php'); ?>
        <?php endforeach; ?>
        
        <form action="add-preview.php?date=<?php echo $twelve; ?>" method="POST">
          <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
        </form>
      </div>

      <hr color="<?php echo $color;?>">

      <!--Thirteen-->
      <div class="item thirteen">
        <h2><span class="day"><?php echo date('D', strtotime('+13 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+13 day')); ?></span></h2>
        <?php foreach($thirteenitems as $item):?>
          <?php include('dynamic/task.php'); ?>
        <?php endforeach; ?>
        
        <form action="add-preview.php?date=<?php echo $thirteen; ?>" method="POST">
          <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
        </form>
      </div>

      <hr color="<?php echo $color;?>">

      <!--Fourteen-->
      <div class="item fourteen">
        <h2><span class="day"><?php echo date('D', strtotime('+14 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+14 day')); ?></span></h2>
        <?php foreach($fourteenitems as $item):?>
          <?php include('dynamic/task.php'); ?>
        <?php endforeach; ?>
        
        <form action="add-preview.php?date=<?php echo $fourteen; ?>" method="POST">
          <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
        </form>
      </div>

      <hr color="<?php echo $color;?>">

      <!--Fifteen-->
      <div class="item fifteen">
        <h2><span class="day"><?php echo date('D', strtotime('+15 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+15 day')); ?></span></h2>
        <?php foreach($fifteenitems as $item):?>
          <?php include('dynamic/task.php'); ?>
        <?php endforeach; ?>
        
        <form action="add-preview.php?date=<?php echo $fifteen; ?>" method="POST">
          <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
        </form>
      </div>

      <hr color="<?php echo $color;?>">

      <!--sixteen-->
      <div class="item sixteen">
        <h2><span class="day"><?php echo date('D', strtotime('+16 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+16 day')); ?></span></h2>
        <?php foreach($sixteenitems as $item):?>
          <?php include('dynamic/task.php'); ?>
        <?php endforeach; ?>
        
        <form action="add-preview.php?date=<?php echo $sixteen; ?>" method="POST">
          <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
        </form>
      </div>

      <hr color="<?php echo $color;?>">

      <!--seventeen-->
      <div class="item seventeen">
        <h2><span class="day"><?php echo date('D', strtotime('+17 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+17 day')); ?></span></h2>
        <?php foreach($seventeenitems as $item):?>
          <?php include('dynamic/task.php'); ?>
        <?php endforeach; ?>
        
        <form action="add-preview.php?date=<?php echo $seventeen; ?>" method="POST">
          <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
        </form>
      </div>

      <hr color="<?php echo $color;?>">

<!--eightteen-->
<div class="item eightteen">
  <h2><span class="day"><?php echo date('D', strtotime('+18 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+18 day')); ?></span></h2>
  <?php foreach($eightteenitems as $item):?>
    <?php include('dynamic/task.php'); ?>
  <?php endforeach; ?>
  
  <form action="add-preview.php?date=<?php echo $eightteen; ?>" method="POST">
    <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
  </form>
</div>

<hr color="<?php echo $color;?>">

<!--nineteen-->
<div class="item nineteen">
  <h2><span class="day"><?php echo date('D', strtotime('+19 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+19 day')); ?></span></h2>
  <?php foreach($nineteenitems as $item):?>
    <?php include('dynamic/task.php'); ?>
  <?php endforeach; ?>
  
  <form action="add-preview.php?date=<?php echo $nineteen; ?>" method="POST">
    <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
  </form>
</div>

<hr color="<?php echo $color;?>">

<!--twenty-->
<div class="item twenty">
  <h2><span class="day"><?php echo date('D', strtotime('+20 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+20 day')); ?></span></h2>
  <?php foreach($twentyitems as $item):?>
    <?php include('dynamic/task.php'); ?>
  <?php endforeach; ?>
  
  <form action="add-preview.php?date=<?php echo $twenty; ?>" method="POST">
    <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
  </form>
</div>

<hr color="<?php echo $color;?>">

<!--twentyone-->
<div class="item twentyone">
  <h2><span class="day"><?php echo date('D', strtotime('+21 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+21 day')); ?></span></h2>
  <?php foreach($twentyoneitems as $item):?>
    <?php include('dynamic/task.php'); ?>
  <?php endforeach; ?>
  
  <form action="add-preview.php?date=<?php echo $twentyone; ?>" method="POST">
    <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
  </form>
</div>

<hr color="<?php echo $color;?>">

<!--twentytwo-->
<div class="item twentytwo">
  <h2><span class="day"><?php echo date('D', strtotime('+22 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+22 day')); ?></span></h2>
  <?php foreach($twentytwoitems as $item):?>
    <?php include('dynamic/task.php'); ?>
  <?php endforeach; ?>
  
  <form action="add-preview.php?date=<?php echo $twentytwo; ?>" method="POST">
    <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
  </form>
</div>

<hr color="<?php echo $color;?>">

<!--twentythree-->
<div class="item twentythree">
  <h2><span class="day"><?php echo date('D', strtotime('+23 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+23 day')); ?></span></h2>
  <?php foreach($twentythreeitems as $item):?>
    <?php include('dynamic/task.php'); ?>
  <?php endforeach; ?>
  
  <form action="add-preview.php?date=<?php echo $twentythree; ?>" method="POST">
    <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
  </form>
</div>

<hr color="<?php echo $color;?>">

<!--twentyfour-->
<div class="item twentyfour">
  <h2><span class="day"><?php echo date('D', strtotime('+24 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+24 day')); ?></span></h2>
  <?php foreach($twentyfouritems as $item):?>
    <?php include('dynamic/task.php'); ?>
  <?php endforeach; ?>
  
  <form action="add-preview.php?date=<?php echo $twentyfour; ?>" method="POST">
    <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
  </form>
</div>

<hr color="<?php echo $color;?>">

<!--twentyfive-->
<div class="item twentyfive">
  <h2><span class="day"><?php echo date('D', strtotime('+25 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+25 day')); ?></span></h2>
  <?php foreach($twentyfiveitems as $item):?>
    <?php include('dynamic/task.php'); ?>
  <?php endforeach; ?>
  
  <form action="add-preview.php?date=<?php echo $twentyfive; ?>" method="POST">
    <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
  </form>
</div>

<hr color="<?php echo $color;?>">

<!--twentysix-->
<div class="item twentysix">
  <h2><span class="day"><?php echo date('D', strtotime('+26 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+26 day')); ?></span></h2>
  <?php foreach($twentysixitems as $item):?>
    <?php include('dynamic/task.php'); ?>
  <?php endforeach; ?>
  
  <form action="add-preview.php?date=<?php echo $twentysix; ?>" method="POST">
    <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
  </form>
</div>

<hr color="<?php echo $color;?>">

<!--twentyseven-->
<div class="item twentyseven">
  <h2><span class="day"><?php echo date('D', strtotime('+27 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+27 day')); ?></span></h2>
  <?php foreach($twentysevenitems as $item):?>
    <?php include('dynamic/task.php'); ?>
  <?php endforeach; ?>
  
  <form action="add-preview.php?date=<?php echo $twentyseven; ?>" method="POST">
    <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
  </form>
</div>

<hr color="<?php echo $color;?>">

<!--twentyeight-->
<div class="item twentyeight">
  <h2><span class="day"><?php echo date('D', strtotime('+28 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+28 day')); ?></span></h2>
  <?php foreach($twentyeightitems as $item):?>
    <?php include('dynamic/task.php'); ?>
  <?php endforeach; ?>
  
  <form action="add-preview.php?date=<?php echo $twentyeight; ?>" method="POST">
    <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
  </form>
</div>

<hr color="<?php echo $color;?>">

<!--twentynine-->
<div class="item twentynine">
  <h2><span class="day"><?php echo date('D', strtotime('+29 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+29 day')); ?></span></h2>
  <?php foreach($twentynineitems as $item):?>
    <?php include('dynamic/task.php'); ?>
  <?php endforeach; ?>
  
  <form action="add-preview.php?date=<?php echo $twentynine; ?>" method="POST">
    <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
  </form>
</div>

<hr color="<?php echo $color;?>">

<!--thirty-->
<div class="item thirty">
  <h2><span class="day"><?php echo date('D', strtotime('+30 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+30 day')); ?></span></h2>
  <?php foreach($thirtyitems as $item):?>
    <?php include('dynamic/task.php'); ?>
  <?php endforeach; ?>
  
  <form action="add-preview.php?date=<?php echo $thirty; ?>" method="POST">
    <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
  </form>
</div>

<hr color="<?php echo $color;?>">

<!--thirtyone-->
<div class="item thirtyone">
  <h2><span class="day"><?php echo date('D', strtotime('+31 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+31 day')); ?></span></h2>
  <?php foreach($thirtyoneitems as $item):?>
    <?php include('dynamic/task.php'); ?>
  <?php endforeach; ?>
  
  <form action="add-preview.php?date=<?php echo $thirtyone; ?>" method="POST">
    <input name="task" type="text" class="form-control" required autocomplete="off" placeholder='Add Task...'>
  </form>
</div>



    </div>
  </body>
</html>


<?php 
  if($theme=='dark'){
    include('../app/style/index-dark.html');
  }else{
    include('../app/style/index.html');
  }
?>