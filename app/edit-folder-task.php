<?php
  session_start();  
  if(!isset($_SESSION["suite"]))  {  
    header("location:../index.php");  
  }
  
  require_once 'init.php';

  $itemid = $_GET['item'];

  $todayitemsget = $db->prepare("SELECT * FROM `tasksfoldertasks` WHERE `account` = :account AND `id` = :id ORDER BY `completed` ASC");

  $todayitemsget->execute([
    'account' => $account,
    'id' => $_GET['item']
  ]);

  $todayitems = $todayitemsget->rowCount() ? $todayitemsget : [];

  $subtaskget = $db->prepare("SELECT * FROM `tasksfoldertasks` WHERE `account` = :account AND `parenttaskid` = :id ORDER BY `completed` ASC");

  $subtaskget->execute([
    'account' => $account,
    'id' => $_GET['item']
  ]);

  $subtasks = $subtaskget->rowCount() ? $subtaskget : [];

  if(isset($_POST['edit'])){
    $task = base64_encode(openssl_encrypt($_POST['name'], $method, $key, OPENSSL_RAW_DATA, $iv));
    $notes = base64_encode(openssl_encrypt($_POST['notes'], $method, $key, OPENSSL_RAW_DATA, $iv));

    $doneQuery = $db->prepare("
      UPDATE tasksfoldertasks SET name = :name
      WHERE id = :id
      AND account = :account;
      UPDATE tasksfoldertasks SET date = :date
      WHERE id = :id
      AND account = :account;
      UPDATE tasksfoldertasks SET notes = :notes
      WHERE id = :id
      AND account = :account
    ");

    $doneQuery->execute([
      'name' => $task,
      'id' => $_GET['item'],
      'date' => $_POST['date'],
      'notes' => $notes,
      'account' => $account
    ]);
    header('Location: ' . $_SERVER['HTTP_REFERER'].'#top');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('dynamic/header.php'); ?>
  </head>
  <body>
    <div class="edit" id="top">
      <div class="edit-inner">

        <?php foreach($todayitems as $item): ?>
          <form method="POST">
            <?php $decryptedtask = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);?>
            <?php $decryptednotes = openssl_decrypt(base64_decode($item['notes']), $method, $key, OPENSSL_RAW_DATA, $iv);?>
            <label>Task:</label>
            <input name="name" type="text" class="form-control" required autocomplete="off" value="<?php echo $decryptedtask; ?>"><br><br>
            <label>Edit the date with the following format. Example: Aug.08.2020</label>
            <input name="date" type="text" class="form-control" autocomplete="off" value="<?php echo $item['date']; ?>"><br><br>
            <label>Notes:</label><br>
            <textarea class="form-control-notes" name="notes" placeholder="Start typing to add notes..."><?php echo $decryptednotes; ?></textarea><br><br>
            <a action="action" href="folders.php" class="submit">Cancel</a>
            <input type="submit" name="edit" class="submit" value="Save Changes">
          </form>
        <?php endforeach; ?>
        <br>
        <label>Sub Tasks:</label>
            <div class="list-group">
            <?php foreach($subtasks as $item): ?>
              <?php if($item['completed'] == 'false'){ ?>
                <div class="getridof-<?php echo $item['id']; ?>">
                <?php $decryptedtask = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);?>

                <span class="rownav" id="hovereffect">
                  <span class="columnnav markbox">
                    <p><a style="text-decoration: none;" href="#" class="marklink list-group-item" id="list-group-item-<?php echo $item["id"]; ?>" data-id="<?php echo $item["id"]; ?>"><span class="checkbox<?php echo $item['id']; ?>"><span class="noopacity">&#10004;</span></span></a></p>

                    <style>
                      span.checkbox<?php echo $item['id']; ?> {
                        border: 2px solid <?php echo $item['color']; ?>;
                        border-radius: 5px;
                        padding-left: 2px;
                        padding-right: 2px;
                        font-size: 10px;
                      }

                      span.checkbox<?php echo $item['id']; ?>:hover {
                        background-color: <?php echo $item['color']; ?>;
                      }
                    </style>
                  </span>
                  <span class="columnnav textbox">
                    <p class="dropbtn" data-id="<?php echo $item['id']; ?>"><?php if($item['pin']=='true'){echo '<span class="pin"><svg class="sizing" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="thumbtack" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-thumbtack fa-w-12 fa-2x"><path fill="#ff006a" d="M298.028 214.267L285.793 96H328c13.255 0 24-10.745 24-24V24c0-13.255-10.745-24-24-24H56C42.745 0 32 10.745 32 24v48c0 13.255 10.745 24 24 24h42.207L85.972 214.267C37.465 236.82 0 277.261 0 328c0 13.255 10.745 24 24 24h136v104.007c0 1.242.289 2.467.845 3.578l24 48c2.941 5.882 11.364 5.893 14.311 0l24-48a8.008 8.008 0 0 0 .845-3.578V352h136c13.255 0 24-10.745 24-24-.001-51.183-37.983-91.42-85.973-113.733z" class=""></path></svg></span>&nbsp;';}?><?php if($item['highlight']=='true'){echo '<span class="highlight">'.$decryptedtask.'</span>';}else{echo $decryptedtask;}?></p>
                    <div class="dropdown dropdown-<?php echo $item['id']; ?>" data-id="<?php echo $item['id']; ?>">
                      <a class="close" style="font-size: 18px;" data-id="<?php echo $item['id']; ?>"><svg class="sizing" aria-hidden="true" focusable="false" data-prefix="far" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-5x"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></a>
                      &nbsp;

                      <!--Delete-->
                      <a href="actions-folder-tasks.php?as=trash&item=<?php echo $item['id']; ?>" class="navlink"><svg class="trash sizing sizingsmall" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-trash fa-w-14 fa-2x"><path fill="currentColor" d="M440 64H336l-33.6-44.8A48 48 0 0 0 264 0h-80a48 48 0 0 0-38.4 19.2L112 64H8a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8h18.9l33.2 372.3a48 48 0 0 0 47.8 43.7h232.2a48 48 0 0 0 47.8-43.7L421.1 96H440a8 8 0 0 0 8-8V72a8 8 0 0 0-8-8zM171.2 38.4A16.1 16.1 0 0 1 184 32h80a16.1 16.1 0 0 1 12.8 6.4L296 64H152zm184.8 427a15.91 15.91 0 0 1-15.9 14.6H107.9A15.91 15.91 0 0 1 92 465.4L59 96h330z" class=""></path></svg></a>

                      &nbsp;

                      <!--Highlight-->
                      <a href="actions-folder-tasks.php?as=<?php if($item['highlight']=='true'){echo 'unhighlight';}else{echo 'highlight';}?>&item=<?php echo $item['id']; ?>" class="navlink"><svg class="sizing sizingsmall" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="highlighter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 544 512" class="svg-inline--fa fa-highlighter fa-w-17 fa-2x"><path fill="currentColor" d="M528.61 75.91l-60.49-60.52C457.91 5.16 444.45 0 430.98 0a52.38 52.38 0 0 0-34.75 13.15L110.59 261.8c-10.29 9.08-14.33 23.35-10.33 36.49l12.49 41.02-36.54 36.56c-6.74 6.75-6.74 17.68 0 24.43l.25.26L0 479.98 99.88 512l43.99-44.01.02.02c6.75 6.75 17.69 6.75 24.44 0l36.46-36.47 40.91 12.53c18.01 5.51 31.41-4.54 36.51-10.32l248.65-285.9c18.35-20.82 17.37-52.32-2.25-71.94zM91.05 475.55l-32.21-10.33 40.26-42.03 22.14 22.15-30.19 30.21zm167.16-62.99c-.63.72-1.4.94-2.32.94-.26 0-.54-.02-.83-.05l-40.91-12.53-18.39-5.63-39.65 39.67-46.85-46.88 39.71-39.72-5.6-18.38-12.49-41.02c-.34-1.13.01-2.36.73-3l44.97-39.15 120.74 120.8-39.11 44.95zm248.51-285.73L318.36 343.4l-117.6-117.66L417.4 37.15c4.5-3.97 17.55-9.68 28.1.88l60.48 60.52c7.65 7.65 8.04 20 .74 28.28z" class=""></path></svg></a>

                      &nbsp;

                      <!--Pin-->
                      <a href="actions-folder-tasks.php?as=<?php if($item['pin']=='true'){echo 'unpin';}else{echo 'pin';}?>&item=<?php echo $item['id']; ?>" class="navlink"><svg class="sizing sizingsmall" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="thumbtack" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-thumbtack fa-w-12 fa-3x"><path fill="currentColor" d="M300.8 203.9L290.7 128H328c13.2 0 24-10.8 24-24V24c0-13.2-10.8-24-24-24H56C42.8 0 32 10.8 32 24v80c0 13.2 10.8 24 24 24h37.3l-10.1 75.9C34.9 231.5 0 278.4 0 335.2c0 8.8 7.2 16 16 16h160V472c0 .7.1 1.3.2 1.9l8 32c2 8 13.5 8.1 15.5 0l8-32c.2-.6.2-1.3.2-1.9V351.2h160c8.8 0 16-7.2 16-16 .1-56.8-34.8-103.7-83.1-131.3zM33.3 319.2c6.8-42.9 39.6-76.4 79.5-94.5L128 96H64V32h256v64h-64l15.3 128.8c40 18.2 72.7 51.8 79.5 94.5H33.3z" class=""></path></svg></a>
        
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
                
              <form method="post" id="to_do_form">
                <input type="text" name="task_name" id="task_name" class="form-control" autocomplete="off" required placeholder="Add Task..." />
              </form>
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
  
                  $(document).on('submit', '#to_do_form', function(event){
                  event.preventDefault();

                  if($('#task_name').val() == '')
                  {
                    $('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                    return false;
                  }
                  else
                  {
                    $('#submit').attr('disabled', 'disabled');
                    $.ajax({
                    url:"add_folder_subtask.php?parent=<?php echo $itemid; ?>",
                    method:"POST",
                    data:$(this).serialize(),
                    success:function(data)
                    {
                      $('#submit').attr('disabled', false);
                      $('#to_do_form')[0].reset();
                      $('.list-group').prepend(data);
                    }
                    })
                  }
                  });

                  $(document).on('click', '.list-group-item', function(){
                    var task_list_id = $(this).data('id');
                    $.ajax({
                      url:"update_folder_subtask.php",
                      method:"POST",
                      data:{task_list_id:task_list_id},
                      success:function(data)
                      {
                      $('.getridof-'+task_list_id).css('display', 'none');
                      }
                    })
                  });

                });
              </script>
            </div>
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


<style>
  body {
    padding: 10px;
  }

  input.form-control {
    font-size: 16px;
  }
  
  .form-control-notes {
    width: 100%;
    height: 200px;

    font-family: 'Montserrat', Arial;

    background-color: transparent;

    border-radius: 5px;
    border: 1px solid rgb(234, 235, 237);
    outline: none;
  }

  a.editlink {
    color: #006fff;
    text-decoration: none;
  }

  .submit {
    color: #006fff;
    font-size: 16px;
    text-decoration: none;

    border: transparent;
    background: transparent;
    outline: none;

    cursor: pointer;
  }

  div.edit {
    padding-top: 50px;
    padding-left: 30%;
    padding-right: 30%;
  }

  div.edit-inner {
    border: 1px solid rgb(234, 235, 237);
    border-radius: 10px;

    padding: 20px;
  }
  
  .bigsizing {
    width: auto;
    height: 25px;
  }

  @media screen and (max-width: 1049px) {
    div.edit {
      padding-left: 10%;
      padding-right: 10%;
    }
  }

  @media screen and (max-width: 621px) {
    div.edit {
      padding-left: 0px;
      padding-right: 0px;
    }
  }
</style>