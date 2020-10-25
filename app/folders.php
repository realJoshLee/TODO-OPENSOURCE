<?php
session_start();  
if(!isset($_SESSION["suite"]))  {  
  header("location:../index.php");  
}

// Main stuff
require_once 'init.php';

// Get folders
$foldersget = $db->prepare("SELECT * FROM `tasksfolders` WHERE `account` = :account");
$foldersget->execute([
  'account' => $account
]);
$folders = $foldersget->rowCount() ? $foldersget : [];

$preminumget = $db->prepare("SELECT * FROM `passwordlogin` WHERE `username` = :account");

  $preminumget->execute([
    'account' => $account
    ]);
$preminum = $preminumget->rowCount() ? $preminumget : [];
foreach($preminum as $item){
  if($item['preminum']=='true'){

  }else{
    header('Location: preminum-false.html');
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
    <?php include('dynamic/header.php'); ?>
    <?php //include('dynamic/modal.php'); ?>
  </head>
  <body>
    <div class="rowone">
      <div class="columnone left">
        <?php include('dynamic/nav.php'); ?>
      </div>
    </div>

    <div class="main" id="top">
      <h2><span class="day">Folders</span></h2>
      <br>
      <div class="folderslist">
        <?php foreach($folders as $item): ?>
          <?php $decryptedfolder = openssl_decrypt(base64_decode($item['folder']), $method, $key, OPENSSL_RAW_DATA, $iv);?>
          <p>&nbsp;&nbsp;&nbsp;&nbsp;<a href="folder_expand_tasks.php?folder=<?php echo $item['folder']; ?>" class="folderlink"><?php echo $decryptedfolder; ?></a></p>
        <?php endforeach; ?>
        <br>
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
                  url:"add_folder.php",
                  method:"POST",
                  data:$(this).serialize(),
                  success:function(data)
                  {
                    $('#submit').attr('disabled', false);
                    $('#to_do_formtoday')[0].reset();
                    $('.folderslist').prepend(data);
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


<?php 
  if($theme=='dark'){
    include('../app/style/index-dark.html');
  }else{
    include('../app/style/index.html');
  }
?>