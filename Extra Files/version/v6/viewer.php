<?php
  require 'init/init-login.php';

  if($sharepeageen=='false'){
    header('Location: ../error.php?err=sharepage');
  }
  
  if(isset($_GET['id'])){
    $getshareable = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `tid` = :tid");
    $getshareable->execute([
      ':tid' => $_GET['id']
    ]);
    $shareable = $getshareable->rowCount() ? $getshareable : [];
    foreach($shareable as $item){
      $tid = $item['tid'];
      $account = $item['account'];
      $task = $item['name'];
      $notes = $item['notes'];
      $sharestatus = $item['shareable'];
      $scheduledate = $item['scheduledate'];
      $completed = $item['completed'];
      $dateshowcomplete = $item['dateshowcomplete'];
    }

  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tasks</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="shortcut icon" type="image/png" href="icons/favicon.png"/>
    <meta content="text/html; charset=UTF-8; X-Content-Type-Options=nosniff" http-equiv="Content-Type" />

    <!--Scripts-->
    <script src="plugins/jquery.min.js"></script>
    <script src="plugins/pulltorefresh.js/dist/pulltorefresh.js" type="text/javascript"></script>
    <link href="fa/css/all.css" rel="stylesheet">

    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Varela&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <?php if($sharestatus=='true'): ?>
        <?php 
          $taskdec = openssl_decrypt(base64_decode($task), $method, $key, OPENSSL_RAW_DATA, $iv);
          $notesdec = openssl_decrypt(base64_decode($notes), $method, $key, OPENSSL_RAW_DATA, $iv);

          $getsub = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `parenttid` = :tid");
          $getsub->execute([
            ':tid' => $_GET['id']
          ]);
          $subtasks = $getsub->rowCount() ? $getsub : [];
        ?>

        <div class="logo-container">
          <img src="icons/Landing.png" class="logo">
        </div>
        <hr><br><br>

        <?php if($completed=='true'){ ?>
        <div class="taskalert">
          <p>Task has been completed! Task completed on <?php echo $scheduledate; ?></p>
        </div>
        <br><br>
        <?php } ?>
        
        <div class="task-row">
          <!--Complete task btn-->
          <div class="task-column task-left">
            <span class="dot task-complete-btn <?php if($item['completed']=='true'){echo 'dot-completed';} ?>"><i class="fas fa-check"></i></span>
          </div>

          <!--Task list column-->
          <div class="task-column task-right">
            <span class="task-edit"><?php echo $taskdec; ?></span>
          </div>
        </div>

        <br>

        <p class="date"><span class="date-text" style="font-weight: bold;">Due Date:</span> <span class="date"><?php echo $scheduledate; ?></span></p>

        <br>

        <span class="label"><b>Notes</b></span>
        <textarea class="form-control" readonly><?php echo $notesdec; ?></textarea>

        <br><br><hr><br>

        <span class="label"><b>Subtasks:</b></span>
        <div class="subtasks">
          <?php foreach($subtasks as $item): ?>
            <?php
              $subtaskdec = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);
            ?>
            <div class="task-row subtaskrow">
              <!--Complete task btn-->
              <div class="task-column task-left">
                <span class="dot task-complete-btn <?php if($item['completed']=='true'){echo 'dot-completed';} ?>"><i class="fas fa-check"></i></span>
              </div>

              <!--Task list column-->
              <div class="task-column task-right">
                <span class="task-edit"><?php echo $subtaskdec; ?></span>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </body>
</html>
<style>
  @font-face {
    font-family: 'SF UI Text Regular';
    font-style: normal;
    font-weight: normal;
    src: local('SF UI Text Regular'), url('fonts/SFUIText-Regular.woff') format('woff');
  }

  html,body {
    background: #fff;
    color: #111;
    font-family: 'SF UI Text Regular', Arial;
  }

  .form-control {
    width: 100%;
    height: 100px;
    
    border-radius: 5px;
    background: #f3f7f8;
    outline: none;
    border: none;

    resize: none;
    font-size: 16px;
    font-family: 'SF UI Text Regular', Arial;
  }

  .subtaskrow {
    margin-bottom: 5px;
  }

  .subtasks {
    padding: 10px;
  }

  .logo-container {
    text-align: center;
    margin-bottom: 30px;
  }

  .logo {
    height: 50px;
    width: auto;
  }

  div.taskalert {
    background: #f3f7f8;

    text-align: center;

    padding-top: 3px;
    padding-bottom: 3px;

    border-radius: 10px;
  }

  div.container {
    padding-top: 80px;
    padding-left: 35%;
    padding-right: 35%;
  }

  div.task-column {
    float: left;
  }

  div.task-row div.task-left {
    width: 25px;
  }

  div.task-row div.task-right {
    width: 90%;
  }

  div.task-row:after {
    content: "";
    display: table;
    clear: both;
  }

  span.dot {
    padding-top: 3px;
    height: 15px;
    width: 18px;
    border-radius: 40%;
    display: inline-block;
    font-size: 12px;
    text-align: center;

    
    border: 2px solid #dedede;    
    color: #fff;
  }

  span.dot-completed {
    border: 2px solid #0962b9 !important;
    background: #0962b9 !important;
  }

  @media screen and (max-width: 1659px){
    div.container {
      padding-left: 30%;
      padding-right: 30%;
    }
  }

  @media screen and (max-width: 1519px){
    div.container {
      padding-left: 25%;
      padding-right: 25%;
    }
  }

  @media screen and (max-width: 1149px){
    div.container {
      padding-left: 20%;
      padding-right: 20%;
    }
  }

  @media screen and (max-width: 971px){
    div.container {
      padding-left: 15%;
      padding-right: 15%;
    }
  }

  @media screen and (max-width: 743px){
    div.container {
      padding-left: 10%;
      padding-right: 10%;
    }
  }

  @media screen and (max-width: 551px){
    div.container {
      padding-left: 5%;
      padding-right: 5%;
    }
  }

  @media screen and (max-width: 467px){
    div.container {
      padding-left: 2%;
      padding-right: 2%;
    }
  }
</style>