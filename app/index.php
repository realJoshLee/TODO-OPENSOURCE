<?php
/*$query = "
 SELECT * FROM tasks 
 WHERE account = '".$account."'
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();*/


session_start();  
if(!isset($_SESSION["suite"]))  {  
  header("location:../index.php");  
}

if(!isset($_GET['week'])){
  header('Location: ?week=1');
}
// Main stuff
require_once 'init.php';
  
  // Yesterday
  

  // Today
  //

  // Tomorrow
  //$tomorrow = date('M.d.Y', strtotime('+1 day'));

  // Two Days Out
  //$twodays = date('M.d.Y', strtotime('+2 day'));

  // Three Days Out
  //$threedays = date('M.d.Y', strtotime('+3 day'));

// Moves yesterdays uncompleted tasks to today
$todaya = date('M.d.Y', strtotime('+0 day'));
$yesterday = date('M.d.Y', strtotime('-1 day'));
$yesterdayitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date");

$yesterdayitemsget->execute([
  'account' => $account,
  'date' => $yesterday
  ]);

$yesterdayitems = $yesterdayitemsget->rowCount() ? $yesterdayitemsget : [];
foreach($yesterdayitems as $item){
  if($item['completed']=='false'){
    header("Refresh:0");
    $id = $item['id'];
    $string = "UPDATE tasks SET date='$todaya' WHERE id='$id'"; 
    mysqli_query($conn, $string);
    /*$doneQuery = $db->prepare("UPDATE 'tasks' SET 'date' = :date WHERE 'id' = :id");

    $doneQuery->execute([
      'id' => $item['id'],
      'date' => $today
    ]);*/
  }
}
















$today = date('M.d.Y', strtotime('+0 day'));
$todayitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$todayitemsget->execute([
  'account' => $account,
  'date' => $today
]);
$todayitems = $todayitemsget->rowCount() ? $todayitemsget : [];

// One
$one = date('M.d.Y', strtotime('+1 day'));
$oneitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$oneitemsget->execute([
  'account' => $account,
  'date' => $one
]);
$oneitems = $oneitemsget->rowCount() ? $oneitemsget : [];

// Two
$two = date('M.d.Y', strtotime('+2 day'));
$twoitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$twoitemsget->execute([
  'account' => $account,
  'date' => $two
]);
$twoitems = $twoitemsget->rowCount() ? $twoitemsget : [];

// Three
$three = date('M.d.Y', strtotime('+3 day'));
$threeitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$threeitemsget->execute([
  'account' => $account,
  'date' => $three
]);
$threeitems = $threeitemsget->rowCount() ? $threeitemsget : [];

// Four
$four = date('M.d.Y', strtotime('+4 day'));
$fouritemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$fouritemsget->execute([
  'account' => $account,
  'date' => $four
]);
$fouritems = $fouritemsget->rowCount() ? $fouritemsget : [];

// Five
$five = date('M.d.Y', strtotime('+5 day'));
$fiveitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$fiveitemsget->execute([
  'account' => $account,
  'date' => $five
]);
$fiveitems = $fiveitemsget->rowCount() ? $fiveitemsget : [];

// Six
$six = date('M.d.Y', strtotime('+6 day'));
$sixitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$sixitemsget->execute([
  'account' => $account,
  'date' => $six
]);
$sixitems = $sixitemsget->rowCount() ? $sixitemsget : [];

// Seven
$seven = date('M.d.Y', strtotime('+7 day'));
$sevenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$sevenitemsget->execute([
  'account' => $account,
  'date' => $seven
]);
$sevenitems = $sevenitemsget->rowCount() ? $sevenitemsget : [];

// Eight
$eight = date('M.d.Y', strtotime('+8 day'));
$eightitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$eightitemsget->execute([
  'account' => $account,
  'date' => $eight
]);
$eightitems = $eightitemsget->rowCount() ? $eightitemsget : [];

// Nine
$nine = date('M.d.Y', strtotime('+9 day'));
$nineitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$nineitemsget->execute([
  'account' => $account,
  'date' => $nine
]);
$nineitems = $nineitemsget->rowCount() ? $nineitemsget : [];

// Ten
$ten = date('M.d.Y', strtotime('+10 day'));
$tenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$tenitemsget->execute([
  'account' => $account,
  'date' => $ten
]);
$tenitems = $tenitemsget->rowCount() ? $tenitemsget : [];

// Eleven
$eleven = date('M.d.Y', strtotime('+11 day'));
$elevenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$elevenitemsget->execute([
  'account' => $account,
  'date' => $eleven
]);
$elevenitems = $elevenitemsget->rowCount() ? $elevenitemsget : [];

// Twelve
$twelve = date('M.d.Y', strtotime('+12 day'));
$twelveitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$twelveitemsget->execute([
  'account' => $account,
  'date' => $twelve
]);
$twelveitems = $twelveitemsget->rowCount() ? $twelveitemsget : [];

// Thirteen
$thirteen = date('M.d.Y', strtotime('+13 day'));
$thirteenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$thirteenitemsget->execute([
  'account' => $account,
  'date' => $thirteen
]);
$thirteenitems = $thirteenitemsget->rowCount() ? $thirteenitemsget : [];

// Fourteen
$fourteen = date('M.d.Y', strtotime('+14 day'));
$fourteenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$fourteenitemsget->execute([
  'account' => $account,
  'date' => $fourteen
]);
$fourteenitems = $fourteenitemsget->rowCount() ? $fourteenitemsget : [];

// Fifteen
$fifteen = date('M.d.Y', strtotime('+15 day'));
$fifteenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$fifteenitemsget->execute([
  'account' => $account,
  'date' => $fifteen
]);
$fifteenitems = $fifteenitemsget->rowCount() ? $fifteenitemsget : [];

// Sixteen
$sixteen = date('M.d.Y', strtotime('+16 day'));
$sixteenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$sixteenitemsget->execute([
  'account' => $account,
  'date' => $sixteen
]);
$sixteenitems = $sixteenitemsget->rowCount() ? $sixteenitemsget : [];

// Seventeen
$seventeen = date('M.d.Y', strtotime('+17 day'));
$seventeenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$seventeenitemsget->execute([
  'account' => $account,
  'date' => $seventeen
]);
$seventeenitems = $seventeenitemsget->rowCount() ? $seventeenitemsget : [];

// Eightteen
$eightteen = date('M.d.Y', strtotime('+18 day'));
$eightteenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$eightteenitemsget->execute([
  'account' => $account,
  'date' => $eightteen
]);
$eightteenitems = $eightteenitemsget->rowCount() ? $eightteenitemsget : [];

// Nineteen
$nineteen = date('M.d.Y', strtotime('+19 day'));
$nineteenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$nineteenitemsget->execute([
  'account' => $account,
  'date' => $nineteen
]);
$nineteenitems = $nineteenitemsget->rowCount() ? $nineteenitemsget : [];

// Twenty
$twenty = date('M.d.Y', strtotime('+20 day'));
$twentyitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$twentyitemsget->execute([
  'account' => $account,
  'date' => $twenty
]);
$twentyitems = $twentyitemsget->rowCount() ? $twentyitemsget : [];

// Twentyone
$twentyone = date('M.d.Y', strtotime('+21 day'));
$twentyoneitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$twentyoneitemsget->execute([
  'account' => $account,
  'date' => $twentyone
]);
$twentyoneitems = $twentyoneitemsget->rowCount() ? $twentyoneitemsget : [];

// Twentytwo
$twentytwo = date('M.d.Y', strtotime('+22 day'));
$twentytwoitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$twentytwoitemsget->execute([
  'account' => $account,
  'date' => $twentytwo
]);
$twentytwoitems = $twentytwoitemsget->rowCount() ? $twentytwoitemsget : [];

// Twentythree
$twentythree = date('M.d.Y', strtotime('+23 day'));
$twentythreeitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$twentythreeitemsget->execute([
  'account' => $account,
  'date' => $twentythree
]);
$twentythreeitems = $twentythreeitemsget->rowCount() ? $twentythreeitemsget : [];

// Twentyfour
$twentyfour = date('M.d.Y', strtotime('+24 day'));
$twentyfouritemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$twentyfouritemsget->execute([
  'account' => $account,
  'date' => $twentyfour
]);
$twentyfouritems = $twentyfouritemsget->rowCount() ? $twentyfouritemsget : [];

// Twentyfive
$twentyfive = date('M.d.Y', strtotime('+25 day'));
$twentyfiveitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$twentyfiveitemsget->execute([
  'account' => $account,
  'date' => $twentyfive
]);
$twentyfiveitems = $twentyfiveitemsget->rowCount() ? $twentyfiveitemsget : [];

// Twentysix
$twentysix = date('M.d.Y', strtotime('+26 day'));
$twentysixitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$twentysixitemsget->execute([
  'account' => $account,
  'date' => $twentysix
]);
$twentysixitems = $twentysixitemsget->rowCount() ? $twentysixitemsget : [];

// Twentyseven
$twentyseven = date('M.d.Y', strtotime('+27 day'));
$twentysevenitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$twentysevenitemsget->execute([
  'account' => $account,
  'date' => $twentyseven
]);
$twentysevenitems = $twentysevenitemsget->rowCount() ? $twentysevenitemsget : [];

// Twentyeight
$twentyeight = date('M.d.Y', strtotime('+28 day'));
$twentyeightitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$twentyeightitemsget->execute([
  'account' => $account,
  'date' => $twentyeight
]);
$twentyeightitems = $twentyeightitemsget->rowCount() ? $twentyeightitemsget : [];

// Twentynine
$twentynine = date('M.d.Y', strtotime('+29 day'));
$twentynineitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$twentynineitemsget->execute([
  'account' => $account,
  'date' => $twentynine
]);
$twentynineitems = $twentynineitemsget->rowCount() ? $twentynineitemsget : [];

// Thirty
$thirty = date('M.d.Y', strtotime('+30 day'));
$thirtyitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$thirtyitemsget->execute([
  'account' => $account,
  'date' => $thirty
]);
$thirtyitems = $thirtyitemsget->rowCount() ? $thirtyitemsget : [];

// Thirtyone
$thirtyone = date('M.d.Y', strtotime('+31 day'));
$thirtyoneitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
$thirtyoneitemsget->execute([
  'account' => $account,
  'date' => $thirtyone
]);
$thirtyoneitems = $thirtyoneitemsget->rowCount() ? $thirtyoneitemsget : [];

$color = '#ededed';


?>

<!DOCTYPE html>
<html>
  <head>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
    <?php include('dynamic/header.php'); ?>
    <?php //include('dynamic/modal.php'); ?>
  </head>
  <body>
    <?php if($_GET['week']=='1'): ?>


      <div class="rowone">
        <div class="columnone left">
          <?php include('dynamic/nav.php'); ?>
        </div>
        <div class="columnone right" id="main">
          <span class="previewnav">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?week=1" class="previewlink halfopacity"><img src="svg<?php if($theme=='dark'){echo '/dark';}?>/arrow-left.svg" class="previewimg" style="width:10px;height:auto;"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?week=2" class="previewlink"><img src="svg<?php if($theme=='dark'){echo '/dark';}?>/arrow-right.svg" class="previewimg" style="width:10px;height:auto;"></a></span>
        </div>
      </div>


      <div class="row" id="mainalt">
        <!--today-->
        <div class="column today">
          <h2 style="color: #006fff !important;"><span class="day"><?php echo date('D', strtotime('+0 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+0 day')); ?></span></h2>
          <div class="list-grouptoday">
            <?php foreach($todayitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formtoday">
              <input name="task_name" type="text" id="task task_nametoday" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formtoday', function(event){
                event.preventDefault();

                if($('#task_nametoday').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $today; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formtoday')[0].reset();
                    $('.list-grouptoday').prepend(data);
                  }
                  })
                }
                });
              });
            </script>
          </div>
        </div>

        
        <!--one-->
        <div class="column one">
          <h2><span class="day"><?php echo date('D', strtotime('+1 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+1 day')); ?></span></h2>
          <div class="list-groupone">
            <?php foreach($oneitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formone">
              <input name="task_name" type="text" id="task task_nameone" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formone', function(event){
                event.preventDefault();

                if($('#task_nameone').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $one; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formone')[0].reset();
                    $('.list-groupone').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>

        
        <!--two-->
        <div class="column two">
          <h2><span class="day"><?php echo date('D', strtotime('+2 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+2 day')); ?></span></h2>
          <div class="list-grouptwo">
            <?php foreach($twoitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formtwo">
              <input name="task_name" type="text" id="task task_nametwo" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formtwo', function(event){
                event.preventDefault();

                if($('#task_nametwo').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $two; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formtwo')[0].reset();
                    $('.list-grouptwo').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>

                
        <!--three-->
        <div class="column three">
          <h2><span class="day"><?php echo date('D', strtotime('+3 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+3 day')); ?></span></h2>
          <div class="list-groupthree">
            <?php foreach($threeitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formthree">
              <input name="task_name" type="text" id="task task_namethree" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formthree', function(event){
                event.preventDefault();

                if($('#task_namethree').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $three; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formthree')[0].reset();
                    $('.list-groupthree').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>
      </div>
    <?php endif; ?>















    
    <?php if($_GET['week']=='2'): ?>


      <div class="rowone">
        <div class="columnone left">
          <?php include('dynamic/nav.php'); ?>
        </div>
        <div class="columnone right" id="main">
          <span class="previewnav">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?week=1" class="previewlink"><img src="svg<?php if($theme=='dark'){echo '/dark';}?>/arrow-left.svg" class="previewimg" style="width:10px;height:auto;"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?week=3" class="previewlink"><img src="svg<?php if($theme=='dark'){echo '/dark';}?>/arrow-right.svg" class="previewimg" style="width:10px;height:auto;"></a></span>
        </div>
      </div>


      <div class="row" id="mainalt">
        <!--four-->
        <div class="column four">
          <h2><span class="day"><?php echo date('D', strtotime('+4 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+4 day')); ?></span></h2>
          <div class="list-groupfour">
            <?php foreach($fouritems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formfour">
              <input name="task_name" type="text" id="task task_namefour" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formfour', function(event){
                event.preventDefault();

                if($('#task_namefour').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $four; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formfour')[0].reset();
                    $('.list-groupfour').prepend(data);
                  }
                  })
                }
                });
              });
            </script>
          </div>
        </div>

        
        <!--five-->
        <div class="column five">
          <h2><span class="day"><?php echo date('D', strtotime('+5 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+5 day')); ?></span></h2>
          <div class="list-groupfive">
            <?php foreach($fiveitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formfive">
              <input name="task_name" type="text" id="task task_namefive" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formfive', function(event){
                event.preventDefault();

                if($('#task_namefive').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $five; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formfive')[0].reset();
                    $('.list-groupfive').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>

        
        <!--six-->
        <div class="column six">
          <h2><span class="day"><?php echo date('D', strtotime('+6 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+6 day')); ?></span></h2>
          <div class="list-groupsix">
            <?php foreach($sixitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formsix">
              <input name="task_name" type="text" id="task task_namesix" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formsix', function(event){
                event.preventDefault();

                if($('#task_namesix').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $six; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formsix')[0].reset();
                    $('.list-groupsix').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>

                
        <!--seven-->
        <div class="column seven">
          <h2><span class="day"><?php echo date('D', strtotime('+7 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+7 day')); ?></span></h2>
          <div class="list-groupseven">
            <?php foreach($sevenitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formseven">
              <input name="task_name" type="text" id="task task_nameseven" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formseven', function(event){
                event.preventDefault();

                if($('#task_nameseven').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $seven; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formseven')[0].reset();
                    $('.list-groupseven').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>
      </div>
    <?php endif; ?>















    
    <?php if($_GET['week']=='3'): ?>


      <div class="rowone">
        <div class="columnone left">
          <?php include('dynamic/nav.php'); ?>
        </div>
        <div class="columnone right" id="main">
          <span class="previewnav">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?week=2" class="previewlink"><img src="svg<?php if($theme=='dark'){echo '/dark';}?>/arrow-left.svg" class="previewimg" style="width:10px;height:auto;"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?week=4" class="previewlink"><img src="svg<?php if($theme=='dark'){echo '/dark';}?>/arrow-right.svg" class="previewimg" style="width:10px;height:auto;"></a></span>
        </div>
      </div>


      <div class="row" id="mainalt">
        <!--eight-->
        <div class="column eight">
          <h2><span class="day"><?php echo date('D', strtotime('+8 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+8 day')); ?></span></h2>
          <div class="list-groupeight">
            <?php foreach($eightitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formeight">
              <input name="task_name" type="text" id="task task_nameeight" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formeight', function(event){
                event.preventDefault();

                if($('#task_nameeight').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $eight; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formeight')[0].reset();
                    $('.list-groupeight').prepend(data);
                  }
                  })
                }
                });
              });
            </script>
          </div>
        </div>

        
        <!--nine-->
        <div class="column nine">
          <h2><span class="day"><?php echo date('D', strtotime('+9 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+9 day')); ?></span></h2>
          <div class="list-groupnine">
            <?php foreach($nineitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formnine">
              <input name="task_name" type="text" id="task task_namenine" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formnine', function(event){
                event.preventDefault();

                if($('#task_namenine').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $nine; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formnine')[0].reset();
                    $('.list-groupnine').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>

                
        <!--ten-->
        <div class="column ten">
          <h2><span class="day"><?php echo date('D', strtotime('+10 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+10 day')); ?></span></h2>
          <div class="list-groupten">
            <?php foreach($tenitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formten">
              <input name="task_name" type="text" id="task task_nameten" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formten', function(event){
                event.preventDefault();

                if($('#task_nameten').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $ten; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formten')[0].reset();
                    $('.list-groupten').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>

        
        <!--eleven-->
        <div class="column eleven">
          <h2><span class="day"><?php echo date('D', strtotime('+11 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+11 day')); ?></span></h2>
          <div class="list-groupeleven">
            <?php foreach($elevenitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formeleven">
              <input name="task_name" type="text" id="task task_nameeleven" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formeleven', function(event){
                event.preventDefault();

                if($('#task_nameeleven').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $eleven; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formeleven')[0].reset();
                    $('.list-groupeleven').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>
      </div>
    <?php endif; ?>















    
    <?php if($_GET['week']=='4'): ?>


      <div class="rowone">
        <div class="columnone left">
          <?php include('dynamic/nav.php'); ?>
        </div>
        <div class="columnone right" id="main">
          <span class="previewnav">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?week=3" class="previewlink"><img src="svg<?php if($theme=='dark'){echo '/dark';}?>/arrow-left.svg" class="previewimg" style="width:10px;height:auto;"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?week=5" class="previewlink"><img src="svg<?php if($theme=='dark'){echo '/dark';}?>/arrow-right.svg" class="previewimg" style="width:10px;height:auto;"></a></span>
        </div>
      </div>


      <div class="row" id="mainalt">
        <!--twelve-->
        <div class="column twelve">
          <h2><span class="day"><?php echo date('D', strtotime('+12 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+12 day')); ?></span></h2>
          <div class="list-grouptwelve">
            <?php foreach($twelveitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formtwelve">
              <input name="task_name" type="text" id="task task_nametwelve" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formtwelve', function(event){
                event.preventDefault();

                if($('#task_nametwelve').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $twelve; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formtwelve')[0].reset();
                    $('.list-grouptwelve').prepend(data);
                  }
                  })
                }
                });
              });
            </script>
          </div>
        </div>

        
        <!--thirteen-->
        <div class="column thirteen">
          <h2><span class="day"><?php echo date('D', strtotime('+13 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+13 day')); ?></span></h2>
          <div class="list-groupthirteen">
            <?php foreach($thirteenitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formthirteen">
              <input name="task_name" type="text" id="task task_namethirteen" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formthirteen', function(event){
                event.preventDefault();

                if($('#task_namethirteen').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $thirteen; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formthirteen')[0].reset();
                    $('.list-groupthirteen').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>

                
        <!--fourteen-->
        <div class="column fourteen">
          <h2><span class="day"><?php echo date('D', strtotime('+14 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+14 day')); ?></span></h2>
          <div class="list-groupfourteen">
            <?php foreach($fourteenitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formfourteen">
              <input name="task_name" type="text" id="task task_namefourteen" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formfourteen', function(event){
                event.preventDefault();

                if($('#task_namefourteen').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $fourteen; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formfourteen')[0].reset();
                    $('.list-groupfourteen').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>

        
        <!--fifteen-->
        <div class="column fifteen">
          <h2><span class="day"><?php echo date('D', strtotime('+15 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+15 day')); ?></span></h2>
          <div class="list-groupfifteen">
            <?php foreach($fifteenitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formfifteen">
              <input name="task_name" type="text" id="task task_namefifteen" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formfifteen', function(event){
                event.preventDefault();

                if($('#task_namefifteen').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $fifteen; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formfifteen')[0].reset();
                    $('.list-groupfifteen').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>
      </div>
    <?php endif; ?>















    
    <?php if($_GET['week']=='5'): ?>


      <div class="rowone">
        <div class="columnone left">
          <?php include('dynamic/nav.php'); ?>
        </div>
        <div class="columnone right" id="main">
          <span class="previewnav">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?week=4" class="previewlink"><img src="svg<?php if($theme=='dark'){echo '/dark';}?>/arrow-left.svg" class="previewimg" style="width:10px;height:auto;"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?week=6" class="previewlink"><img src="svg<?php if($theme=='dark'){echo '/dark';}?>/arrow-right.svg" class="previewimg" style="width:10px;height:auto;"></a></span>
        </div>
      </div>

      
      <div class="row" id="mainalt">
        <!--sixteen-->
        <div class="column sixteen">
          <h2><span class="day"><?php echo date('D', strtotime('+16 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+16 day')); ?></span></h2>
          <div class="list-groupsixteen">
            <?php foreach($sixteenitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formsixteen">
              <input name="task_name" type="text" id="task task_namesixteen" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formsixteen', function(event){
                event.preventDefault();

                if($('#task_namesixteen').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $sixteen; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formsixteen')[0].reset();
                    $('.list-groupsixteen').prepend(data);
                  }
                  })
                }
                });
              });
            </script>
          </div>
        </div>

        
        <!--seventeen-->
        <div class="column seventeen">
          <h2><span class="day"><?php echo date('D', strtotime('+17 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+17 day')); ?></span></h2>
          <div class="list-groupseventeen">
            <?php foreach($seventeenitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formseventeen">
              <input name="task_name" type="text" id="task task_nameseventeen" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formseventeen', function(event){
                event.preventDefault();

                if($('#task_nameseventeen').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $seventeen; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formseventeen')[0].reset();
                    $('.list-groupseventeen').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>

                
        <!--eightteen-->
        <div class="column eightteen">
          <h2><span class="day"><?php echo date('D', strtotime('+18 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+18 day')); ?></span></h2>
          <div class="list-groupeightteen">
            <?php foreach($eightteenitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formeightteen">
              <input name="task_name" type="text" id="task task_nameeightteen" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formeightteen', function(event){
                event.preventDefault();

                if($('#task_nameeightteen').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $eightteen; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formeightteen')[0].reset();
                    $('.list-groupeightteen').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>

        
        <!--nineteen-->
        <div class="column nineteen">
          <h2><span class="day"><?php echo date('D', strtotime('+19 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+19 day')); ?></span></h2>
          <div class="list-groupnineteen">
            <?php foreach($nineteenitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formnineteen">
              <input name="task_name" type="text" id="task task_namenineteen" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formnineteen', function(event){
                event.preventDefault();

                if($('#task_namenineteen').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $nineteen; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formnineteen')[0].reset();
                    $('.list-groupnineteen').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>
      </div>
    <?php endif; ?>















    
    <?php if($_GET['week']=='6'): ?>


      <div class="rowone">
        <div class="columnone left">
          <?php include('dynamic/nav.php'); ?>
        </div>
        <div class="columnone right" id="main">
          <span class="previewnav">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?week=5" class="previewlink"><img src="svg<?php if($theme=='dark'){echo '/dark';}?>/arrow-left.svg" class="previewimg" style="width:10px;height:auto;"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?week=7" class="previewlink"><img src="svg<?php if($theme=='dark'){echo '/dark';}?>/arrow-right.svg" class="previewimg" style="width:10px;height:auto;"></a></span>
        </div>
      </div>


      <div class="row" id="mainalt">
        <!--twenty-->
        <div class="column twenty">
          <h2><span class="day"><?php echo date('D', strtotime('+20 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+20 day')); ?></span></h2>
          <div class="list-grouptwenty">
            <?php foreach($twentyitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formtwenty">
              <input name="task_name" type="text" id="task task_nametwenty" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formtwenty', function(event){
                event.preventDefault();

                if($('#task_nametwenty').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $twenty; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formtwenty')[0].reset();
                    $('.list-grouptwenty').prepend(data);
                  }
                  })
                }
                });
              });
            </script>
          </div>
        </div>

        
        <!--twentyone-->
        <div class="column twentyone">
          <h2><span class="day"><?php echo date('D', strtotime('+21 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+21 day')); ?></span></h2>
          <div class="list-grouptwentyone">
            <?php foreach($twentyoneitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formtwentyone">
              <input name="task_name" type="text" id="task task_nametwentyone" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formtwentyone', function(event){
                event.preventDefault();

                if($('#task_nametwentyone').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $twentyone; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formtwentyone')[0].reset();
                    $('.list-grouptwentyone').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>

                
        <!--twentytwo-->
        <div class="column twentytwo">
          <h2><span class="day"><?php echo date('D', strtotime('+22 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+22 day')); ?></span></h2>
          <div class="list-grouptwentytwo">
            <?php foreach($twentytwoitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formtwentytwo">
              <input name="task_name" type="text" id="task task_nametwentytwo" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formtwentytwo', function(event){
                event.preventDefault();

                if($('#task_nametwentytwo').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $twentytwo; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formtwentytwo')[0].reset();
                    $('.list-grouptwentytwo').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>

        
        <!--twentythree-->
        <div class="column twentythree">
          <h2><span class="day"><?php echo date('D', strtotime('+23 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+23 day')); ?></span></h2>
          <div class="list-grouptwentythree">
            <?php foreach($twentythreeitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formtwentythree">
              <input name="task_name" type="text" id="task task_nametwentythree" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formtwentythree', function(event){
                event.preventDefault();

                if($('#task_nametwentythree').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $twentythree; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formtwentythree')[0].reset();
                    $('.list-grouptwentythree').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>
      </div>
    <?php endif; ?>















    
    <?php if($_GET['week']=='7'): ?>


      <div class="rowone">
        <div class="columnone left">
          <?php include('dynamic/nav.php'); ?>
        </div>
        <div class="columnone right" id="main">
          <span class="previewnav">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?week=6" class="previewlink"><img src="svg<?php if($theme=='dark'){echo '/dark';}?>/arrow-left.svg" class="previewimg" style="width:10px;height:auto;"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?week=8" class="previewlink"><img src="svg<?php if($theme=='dark'){echo '/dark';}?>/arrow-right.svg" class="previewimg" style="width:10px;height:auto;"></a></span>
        </div>
      </div>


      <div class="row" id="mainalt">
        <!--twentyfour-->
        <div class="column twentyfour">
          <h2><span class="day"><?php echo date('D', strtotime('+24 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+24 day')); ?></span></h2>
          <div class="list-grouptwentyfour">
            <?php foreach($twentyfouritems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formtwentyfour">
              <input name="task_name" type="text" id="task task_nametwentyfour" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formtwentyfour', function(event){
                event.preventDefault();

                if($('#task_nametwentyfour').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $twentyfour; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formtwentyfour')[0].reset();
                    $('.list-grouptwentyfour').prepend(data);
                  }
                  })
                }
                });
              });
            </script>
          </div>
        </div>

        
        <!--twentyfive-->
        <div class="column twentyfive">
          <h2><span class="day"><?php echo date('D', strtotime('+25 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+25 day')); ?></span></h2>
          <div class="list-grouptwentyfive">
            <?php foreach($twentyfiveitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formtwentyfive">
              <input name="task_name" type="text" id="task task_nametwentyfive" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formtwentyfive', function(event){
                event.preventDefault();

                if($('#task_nametwentyfive').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $twentyfive; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formtwentyfive')[0].reset();
                    $('.list-grouptwentyfive').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>

                
        <!--twentysix-->
        <div class="column twentysix">
          <h2><span class="day"><?php echo date('D', strtotime('+26 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+26 day')); ?></span></h2>
          <div class="list-grouptwentysix">
            <?php foreach($twentysixitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formtwentysix">
              <input name="task_name" type="text" id="task task_nametwentysix" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formtwentysix', function(event){
                event.preventDefault();

                if($('#task_nametwentysix').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $twentysix; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formtwentysix')[0].reset();
                    $('.list-grouptwentysix').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>

        
        <!--twentyseven-->
        <div class="column twentyseven">
          <h2><span class="day"><?php echo date('D', strtotime('+27 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+27 day')); ?></span></h2>
          <div class="list-grouptwentyseven">
            <?php foreach($twentysevenitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formtwentyseven">
              <input name="task_name" type="text" id="task task_nametwentyseven" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formtwentyseven', function(event){
                event.preventDefault();

                if($('#task_nametwentyseven').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $twentyseven; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formtwentyseven')[0].reset();
                    $('.list-grouptwentyseven').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>
      </div>
    <?php endif; ?>















    
    <?php if($_GET['week']=='8'): ?>


      <div class="rowone">
        <div class="columnone left">
          <?php include('dynamic/nav.php'); ?>
        </div>
        <div class="columnone right" id="main">
          <span class="previewnav">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?week=7" class="previewlink"><img src="svg<?php if($theme=='dark'){echo '/dark';}?>/arrow-left.svg" class="previewimg" style="width:10px;height:auto;"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?week=8" class="previewlink halfopacity"><img src="svg<?php if($theme=='dark'){echo '/dark';}?>/arrow-right.svg" class="previewimg" style="width:10px;height:auto;"></a></span>
        </div>
      </div>


      <div class="row" id="mainalt">
        <!--twentyeight-->
        <div class="column twentyeight">
          <h2><span class="day"><?php echo date('D', strtotime('+28 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+28 day')); ?></span></h2>
          <div class="list-grouptwentyeight">
            <?php foreach($twentyeightitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formtwentyeight">
              <input name="task_name" type="text" id="task task_nametwentyeight" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formtwentyeight', function(event){
                event.preventDefault();

                if($('#task_nametwentyeight').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $twentyeight; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formtwentyeight')[0].reset();
                    $('.list-grouptwentyeight').prepend(data);
                  }
                  })
                }
                });
              });
            </script>
          </div>
        </div>

        
        <!--twentynine-->
        <div class="column twentynine">
          <h2><span class="day"><?php echo date('D', strtotime('+29 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+29 day')); ?></span></h2>
          <div class="list-grouptwentynine">
            <?php foreach($twentynineitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formtwentynine">
              <input name="task_name" type="text" id="task task_nametwentynine" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formtwentynine', function(event){
                event.preventDefault();

                if($('#task_nametwentynine').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $twentynine; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formtwentynine')[0].reset();
                    $('.list-grouptwentynine').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>

                
        <!--thirty-->
        <div class="column thirty">
          <h2><span class="day"><?php echo date('D', strtotime('+30 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+30 day')); ?></span></h2>
          <div class="list-groupthirty">
            <?php foreach($thirtyitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formthirty">
              <input name="task_name" type="text" id="task task_namethirty" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formthirty', function(event){
                event.preventDefault();

                if($('#task_namethirty').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $thirty; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formthirty')[0].reset();
                    $('.list-groupthirty').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>

        
        <!--thirtyone-->
        <div class="column thirtyone">
          <h2><span class="day"><?php echo date('D', strtotime('+31 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+31 day')); ?></span></h2>
          <div class="list-groupthirtyone">
            <?php foreach($thirtyoneitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
              
            <form method="POST" id="to_do_formthirtyone">
              <input name="task_name" type="text" id="task task_namethirtyone" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formthirtyone', function(event){
                event.preventDefault();

                if($('#task_namethirtyone').val() == '')
                {
                  //$('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                  //return false;
                }
                else
                {
                  $('#submit').attr('disabled', 'disabled');
                  $.ajax({
                  url:"add_task.php?date=<?php echo $thirtyone; ?>",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formthirtyone')[0].reset();
                    $('.list-groupthirtyone').prepend(data);
                  }
                  })
                }
                });

              });
            </script>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </body>
</html>


<?php 
  if($theme=='dark'){
    include('../app/style/index-dark.html');
  }else{
    include('../app/style/index.html');
  }
?>


<style>
  a.halfopacity {
    opacity: 0.5;
  }
</style>
<script>
$(document).ready(function(){
  $(document).on('click', '.dropbtn', function(){
    var id = $(this).data('id');
    $('.dropdown-'+id).css('display', 'block');
  });

  $(document).on('click', '.close', function(){
    var id = $(this).data('id');
    $('.dropdown-'+id).css('display', 'none');
  });
  
  $(document).on('click', '.list-group-item', function(){
    var id = $(this).data('id');
    
    //Removes the item from the list
    $('.getridof-'+id).css('display', 'none');

    // Calls the document that marks task as done
    $.ajax({
      url:"update_task.php",
      method:"POST",
      data:{id:id},
      success:function(data)
      {
        //$('#list-group-item-'+id).css('display', 'none');
        //$('#list-group-dropdown-'+id).css('display', 'none');
      }
    })
  });

});
</script>