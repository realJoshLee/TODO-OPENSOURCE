<?php
  session_start();  
  if(!isset($_SESSION["suite"]))  {  
    header("location:../index.php");  
  }

  // Main stuff
  require_once 'init.php';

  // Gettings things from the database
    // Today
    $todayitemsget = $db->prepare("SELECT * FROM `tasks` WHERE `account` = :account AND `date` = :date ORDER BY `color` ASC");

    $todayitemsget->execute([
      'account' => $account,
      'date' => 'othertasks'
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
      <h2>Inbox</h2>
      <div class="list-groupthirtyone">
        <?php foreach($todayitems as $item):?>
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
                url:"add_task.php?date=othertasks",
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