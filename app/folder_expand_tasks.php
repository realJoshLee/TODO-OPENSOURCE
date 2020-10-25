<?php
session_start();  
if(!isset($_SESSION["suite"]))  {  
  header("location:../index.php");  
}

// Main stuff
require_once 'init.php';

// Get folders
$foldertaskget = $db->prepare("SELECT * FROM `tasksfoldertasks` WHERE `account` = :account AND `parentfolder` = :folder ORDER BY `color` ASC");
$foldertaskget->execute([
  'account' => $account,
  'folder' => $_GET['folder']
]);
$foldertasks = $foldertaskget->rowCount() ? $foldertaskget : [];

$decryptedfoldername = openssl_decrypt(base64_decode($_GET['folder']), $method, $key, OPENSSL_RAW_DATA, $iv);

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

        <!--today-->
        <div class="main today">
          <a class="folderbacklink" href="folders.php">< Back</a><br><br>
          <h2 style="color: #006fff !important;"><span class="day"><?php echo $decryptedfoldername; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="delete_folder.php?folder=<?php echo $_GET['folder']; ?>"><svg style="height: 16px; width: auto;" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-trash fa-w-14 fa-3x"><path fill="red" d="M440 64H336l-33.6-44.8A48 48 0 0 0 264 0h-80a48 48 0 0 0-38.4 19.2L112 64H8a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8h18.9l33.2 372.3a48 48 0 0 0 47.8 43.7h232.2a48 48 0 0 0 47.8-43.7L421.1 96H440a8 8 0 0 0 8-8V72a8 8 0 0 0-8-8zM171.2 38.4A16.1 16.1 0 0 1 184 32h80a16.1 16.1 0 0 1 12.8 6.4L296 64H152zm184.8 427a15.91 15.91 0 0 1-15.9 14.6H107.9A15.91 15.91 0 0 1 92 465.4L59 96h330z" class=""></path></svg></a></h2>
          <br>
          <div class="list-grouptoday">
            <?php foreach($foldertasks as $item): ?>
              <?php if($item['completed'] == 'false'){ ?>
                <div class="getridof-<?php echo $item['id']; ?>">
                <?php $decryptedtask = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);?>
                  <span class="rownav" id="hovereffect">
                    <span class="columnnav markbox">
                      <p><a style="text-decoration: none;" href="#" class="marklink list-group-item" id="list-group-item-<?php echo $item["id"]; ?>" data-id="<?php echo $item["id"]; ?>"><span class="checkbox<?php echo $item['id']; ?>"><span class="noopacity">&#10004;</span></span></a></p>

                      <style>
                        span.checkbox<?php echo $item['id']; ?> {    
                          height: 16px;
                          width: 16px;
                          display: inline-block;
                          
                          border: 2px solid <?php echo $item['color']; ?>;
                          border-radius: 6px;
                          font-size: 10px;
                          background-color: <?php echo $item['bgcolor']; ?>;
                        }

                        span.checkbox<?php echo $item['id']; ?>:hover {
                          background-color: <?php echo $item['bgcolor']; ?>;
                        }
                      </style>
                    </span>
                    <span class="columnnav textbox">
                      <p class="dropbtn" data-id="<?php echo $item['id']; ?>"><?php if($item['pin']=='true'){echo '<span class="pin"><svg class="sizing" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="thumbtack" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-thumbtack fa-w-12 fa-2x"><path fill="#ff006a" d="M298.028 214.267L285.793 96H328c13.255 0 24-10.745 24-24V24c0-13.255-10.745-24-24-24H56C42.745 0 32 10.745 32 24v48c0 13.255 10.745 24 24 24h42.207L85.972 214.267C37.465 236.82 0 277.261 0 328c0 13.255 10.745 24 24 24h136v104.007c0 1.242.289 2.467.845 3.578l24 48c2.941 5.882 11.364 5.893 14.311 0l24-48a8.008 8.008 0 0 0 .845-3.578V352h136c13.255 0 24-10.745 24-24-.001-51.183-37.983-91.42-85.973-113.733z" class=""></path></svg></span>&nbsp;';}?><?php if($item['highlight']=='true'){echo '<span class="highlight">'.$decryptedtask.'</span>';}else{echo $decryptedtask;}?></p>    
                      <div class="dropdown dropdown-<?php echo $item['id']; ?>" data-id="<?php echo $item['id']; ?>">
                        <a class="close" style="font-size: 18px;" data-id="<?php echo $item['id']; ?>"><svg class="sizing" aria-hidden="true" focusable="false" data-prefix="far" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-5x"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></a>
                        &nbsp;

                        <!--Delete-->
                        <a href="actions-folder-tasks.php?as=trash&item=<?php echo $item['id']; ?>" class="navlink"><svg class="trash sizing" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-trash fa-w-14 fa-2x"><path fill="currentColor" d="M440 64H336l-33.6-44.8A48 48 0 0 0 264 0h-80a48 48 0 0 0-38.4 19.2L112 64H8a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8h18.9l33.2 372.3a48 48 0 0 0 47.8 43.7h232.2a48 48 0 0 0 47.8-43.7L421.1 96H440a8 8 0 0 0 8-8V72a8 8 0 0 0-8-8zM171.2 38.4A16.1 16.1 0 0 1 184 32h80a16.1 16.1 0 0 1 12.8 6.4L296 64H152zm184.8 427a15.91 15.91 0 0 1-15.9 14.6H107.9A15.91 15.91 0 0 1 92 465.4L59 96h330z" class=""></path></svg></a>

                        &nbsp;

                        <!--Edit-->
                        <a href="edit-folder-task.php?item=<?php echo $item['id']; ?>" class="navlink"><svg class="sizing" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-edit fa-w-18 fa-2x"><path fill="currentColor" d="M417.8 315.5l20-20c3.8-3.8 10.2-1.1 10.2 4.2V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h292.3c5.3 0 8 6.5 4.2 10.2l-20 20c-1.1 1.1-2.7 1.8-4.2 1.8H48c-8.8 0-16 7.2-16 16v352c0 8.8 7.2 16 16 16h352c8.8 0 16-7.2 16-16V319.7c0-1.6.6-3.1 1.8-4.2zm145.9-191.2L251.2 436.8l-99.9 11.1c-13.4 1.5-24.7-9.8-23.2-23.2l11.1-99.9L451.7 12.3c16.4-16.4 43-16.4 59.4 0l52.6 52.6c16.4 16.4 16.4 43 0 59.4zm-93.6 48.4L403.4 106 169.8 339.5l-8.3 75.1 75.1-8.3 233.5-233.6zm71-85.2l-52.6-52.6c-3.8-3.8-10.2-4-14.1 0L426 83.3l66.7 66.7 48.4-48.4c3.9-3.8 3.9-10.2 0-14.1z" class=""></path></svg></a>

                        &nbsp;

                        <!--Highlight-->
                        <a href="actions-folder-tasks.php?as=<?php if($item['highlight']=='true'){echo 'unhighlight';}else{echo 'highlight';}?>&item=<?php echo $item['id']; ?>" class="navlink"><svg class="sizing" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="highlighter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 544 512" class="svg-inline--fa fa-highlighter fa-w-17 fa-2x"><path fill="currentColor" d="M528.61 75.91l-60.49-60.52C457.91 5.16 444.45 0 430.98 0a52.38 52.38 0 0 0-34.75 13.15L110.59 261.8c-10.29 9.08-14.33 23.35-10.33 36.49l12.49 41.02-36.54 36.56c-6.74 6.75-6.74 17.68 0 24.43l.25.26L0 479.98 99.88 512l43.99-44.01.02.02c6.75 6.75 17.69 6.75 24.44 0l36.46-36.47 40.91 12.53c18.01 5.51 31.41-4.54 36.51-10.32l248.65-285.9c18.35-20.82 17.37-52.32-2.25-71.94zM91.05 475.55l-32.21-10.33 40.26-42.03 22.14 22.15-30.19 30.21zm167.16-62.99c-.63.72-1.4.94-2.32.94-.26 0-.54-.02-.83-.05l-40.91-12.53-18.39-5.63-39.65 39.67-46.85-46.88 39.71-39.72-5.6-18.38-12.49-41.02c-.34-1.13.01-2.36.73-3l44.97-39.15 120.74 120.8-39.11 44.95zm248.51-285.73L318.36 343.4l-117.6-117.66L417.4 37.15c4.5-3.97 17.55-9.68 28.1.88l60.48 60.52c7.65 7.65 8.04 20 .74 28.28z" class=""></path></svg></a>

                        &nbsp;

                        <!--Pin-->
                        <a href="actions-folder-tasks.php?as=<?php if($item['pin']=='true'){echo 'unpin';}else{echo 'pin';}?>&item=<?php echo $item['id']; ?>" class="navlink"><svg class="sizing" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="thumbtack" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-thumbtack fa-w-12 fa-3x"><path fill="currentColor" d="M300.8 203.9L290.7 128H328c13.2 0 24-10.8 24-24V24c0-13.2-10.8-24-24-24H56C42.8 0 32 10.8 32 24v80c0 13.2 10.8 24 24 24h37.3l-10.1 75.9C34.9 231.5 0 278.4 0 335.2c0 8.8 7.2 16 16 16h160V472c0 .7.1 1.3.2 1.9l8 32c2 8 13.5 8.1 15.5 0l8-32c.2-.6.2-1.3.2-1.9V351.2h160c8.8 0 16-7.2 16-16 .1-56.8-34.8-103.7-83.1-131.3zM33.3 319.2c6.8-42.9 39.6-76.4 79.5-94.5L128 96H64V32h256v64h-64l15.3 128.8c40 18.2 72.7 51.8 79.5 94.5H33.3z" class=""></path></svg></a>
                        
                        &nbsp;

                        
                        
                        &nbsp;&nbsp;

                        <!--Grey-->
                        <a href="actions-folder-tasks.php?as=default&item=<?php echo $item['id']; ?>" class="navlink"><span style="height: 16px; width: 16px; display: inline-block; border: 2px solid grey; border-radius: 6px; font-size: 10px; background-color: transparent;" class="checkboxcolor"></span></a>

                        &nbsp;

                        <!--Red-->
                        <a href="actions-folder-tasks.php?as=red&item=<?php echo $item['id']; ?>" class="navlink"><span style="height: 16px; width: 16px; display: inline-block; border: 2px solid #ff006a; border-radius: 6px; font-size: 10px; background-color: #fccce1;" class="checkboxcolor"></span></a>

                        &nbsp;

                        <!--Green-->
                        <a href="actions-folder-tasks.php?as=green&item=<?php echo $item['id']; ?>" class="navlink"><span style="height: 16px; width: 16px; display: inline-block; border: 2px solid #00ff26; border-radius: 6px; font-size: 10px; background-color: #dbffe1;" class="checkboxcolor"></span></a>

                        &nbsp;

                        <!--Blue-->
                        <a href="actions-folder-tasks.php?as=blue&item=<?php echo $item['id']; ?>" class="navlink"><span style="height: 16px; width: 16px; display: inline-block; border: 2px solid #006fff; border-radius: 6px; font-size: 10px; background-color: #cfe4ff;" class="checkboxcolor"></span></a>

                        &nbsp;

                        <!--Orange-->
                        <a href="actions-folder-tasks.php?as=orange&item=<?php echo $item['id']; ?>" class="navlink"><span style="height: 16px; width: 16px; display: inline-block; border: 2px solid #ff5900; border-radius: 6px; font-size: 10px; background-color: #ffe3d4;" class="checkboxcolor"></span></a>

                        
                      </div>        
                    </span>
                  </span>
                </div>
              <?php } ?>
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
                  url:"add_folder_task.php?folder=<?php echo $_GET['folder']; ?>",
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
  </body>
</html>


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
  
  $(document).on('click', '.list-group-item', function(){
    var id = $(this).data('id');
    
    //Removes the item from the list
    $('.getridof-'+id).css('display', 'none');

    // Calls the document that marks task as done
    $.ajax({
      url:"update_folder_task.php",
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