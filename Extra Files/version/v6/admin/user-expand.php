<?php

// Main stuff
require_once '../init/init.php';
require 'all.php';

$preminumget = $db->prepare("SELECT * FROM `passwordlogin` WHERE `username` = :account");

  $preminumget->execute([
    'account' => $account
    ]);
$preminum = $preminumget->rowCount() ? $preminumget : [];
foreach($preminum as $item){
  if($item['admin']=='true'){

  }else{
    header('Location: ../index.php');
  }
}


$infoget = $db->prepare("SELECT * FROM `passwordlogin` WHERE `username` = :account");

  $infoget->execute([
    'account' => $_GET['user']
    ]);
$usrinfo = $infoget->rowCount() ? $infoget : [];
?>
<?php include('dynamic/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tasks - Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="shortcut icon" type="image/png" href="icons/favicon.png"/>
    <meta content="text/html; charset=UTF-8; X-Content-Type-Options=nosniff" http-equiv="Content-Type" />


    <!--Scripts-->
    <script src="../plugins/jquery.min.js"></script>
    <link href="../fa/css/all.css" rel="stylesheet">

    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Varela&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php echo $nav; ?>
    <div class="main">
      <p><a href="index.php?p=users" class="link"><i class="fas fa-arrow-circle-left"></i></a></p>

      <br><br>


      <?php foreach($usrinfo as $item): ?>

        <div class="container">
          <div class="container-inner">
            <p><strong>Name:</strong> <?php echo $item['firstname']; ?> <?php echo $item['lastname']; ?></p>
            <p><strong>Email:</strong> <?php echo $item['username']; ?></p>
            <p><strong>Created:</strong> <?php echo $item['created']; ?></p>
            <p><strong>Account ID:</strong> <?php echo $item['accountid']; ?></p>
            <p><strong>Timezone:</strong> <?php echo $item['timezone']; ?></p>
            <p><strong>Theme:</strong> <?php echo $item['theme']; ?></p>
            <?php if($dataexporten=='true'):?>
            <a href="export.php?aid=<?php echo $item['accountid']; ?>" target="_blank" class="link">Export All Data</a><br><br>
            <?php endif; ?>
            <?php if($dataloginexporten=='true'):?>
            <a href="login-export.php?aid=<?php echo $item['accountid']; ?>" target="_blank" class="link">Export Login Data</a><br><br>
            <?php endif; ?>
            <?php if($dataappexporten=='true'):?>
            <a href="app-loadexport.php?aid=<?php echo $item['accountid']; ?>" target="_blank" class="link">App Load Export List</a><br><br>
            <?php endif; ?>
          </div>
        </div>

        <br><br>
        
        <div class="container">
          <div class="container-inner">
            <h3>Status:</h3>
            <p>Preminum: <?php echo $item['preminum']; ?><br><a href="users/preminum-add.php?id=<?php echo $item['id'];?>&username=<?php echo $item['username']; ?>" class="editlink"><i class="green far fa-credit-card"></i></a>&nbsp;<a href="users/preminum-remove.php?id=<?php echo $item['id'];?>&username=<?php echo $item['username']; ?>" class="editlink"><i class="red far fa-credit-card"></i></a></p>
            </p>Admin: <?php echo $item['admin']; ?><br><a href="users/admin-add.php?id=<?php echo $item['id'];?>&username=<?php echo $item['username']; ?>" class="editlink"><i class="green fas fa-user-shield"></i></a>&nbsp;<a href="users/admin-remove.php?id=<?php echo $item['id'];?>&username=<?php echo $item['username']; ?>" class="editlink"><i class="red fas fa-user-shield"></i></a></p>
            </p>Status: <?php echo $item['status']; ?><br><a href="users/user-active.php?id=<?php echo $item['id'];?>&username=<?php echo $item['username']; ?>" class="editlink"><i class="green fas fa-user-times"></i></a>&nbsp;<a href="users/user-suspend.php?id=<?php echo $item['id'];?>&username=<?php echo $item['username']; ?>" class="editlink"><i class="red fas fa-user-times"></i></a></p>
            </p>Verified: <?php echo $item['verified']; ?><br><a href="users/user-verify.php?id=<?php echo $item['id'];?>&username=<?php echo $item['username']; ?>" class="editlink"><i class="green fas fa-user-check"></i></a>&nbsp;<a href="users/user-unverify.php?id=<?php echo $item['id'];?>&username=<?php echo $item['username']; ?>" class="editlink"><i class="red fas fa-user-check"></i></a></p>
          </div>
        </div>

        <br><br><br><br>

      <?php endforeach; ?>

    </div>
  </body>
</html>
<?php include('dynamic/style.css'); ?>