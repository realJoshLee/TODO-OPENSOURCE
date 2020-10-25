<?php
  session_start();  
  if(!isset($_SESSION["suite"]))  {  
    header("location:../index.php");  
  }
  
  // Main stuff
  require_once 'init.php';

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

  // Gets tasks due today
  $today = date('M.d.Y', strtotime('+0 day'));
  $todayitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");
  $todayitemsget->execute([
    'account' => $account,
    'date' => $today
  ]);
  $todayitems = $todayitemsget->rowCount() ? $todayitemsget : [];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('dynamic/header.php'); ?>
  </head>
  <body>
    <?php include('dynamic/nav.php'); ?>
    <!--Today-->
    <div class="main" id="top">
      <h2 style="color: #006fff !important;"><span class="day"><?php echo date('D', strtotime('+0 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+0 day')); ?></span></h2>
          <div class="list-grouptodayview">
            <?php foreach($todayitems as $item): ?>
              <?php include('dynamic/task.php'); ?>
            <?php endforeach; ?>
            <div class="list-append">
            </div>
              
            <form method="POST" id="to_do_formtodayview">
              <input name="task_name" type="text" id="task task_nametodayview" class="form-control" required autocomplete="off" placeholder='Add Task...'>
            </form>
            <script>
              $(document).ready(function(){
                $(document).on('submit', '#to_do_formtodayview', function(event){
                event.preventDefault();

                if($('#task_nametodayview').val() == '')
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
                    $('#to_do_formtodayview')[0].reset();
                    $('.list-grouptodayview').prepend(data);
                  }
                  })
                }
                });
              });
            </script>
          </div>
    </div>
  </body>
</html>
<style>
  div.main {
    padding: 10px;
  }
</style>


<?php 
  if($theme=='dark'){
    include('../app/style/index-dark.html');
  }else{
    include('../app/style/index.html');
  }
?>


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

});
</script>
<script>
$(document).ready(function(){
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