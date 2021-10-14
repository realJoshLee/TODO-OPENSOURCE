<?php

// Main stuff
require_once '../app/init/init.php';
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
    <link rel="shortcut icon" type="image/png" href="../icons/favicon.png"/>
    <meta content="text/html; charset=UTF-8; X-Content-Type-Options=nosniff" http-equiv="Content-Type" />


    <!--Scripts-->
    <script src="../app/plugins/jquery.min.js"></script>
    <script src="../app/plugins/bootstrap/bootstrap.bundle.min.js"></script>
    <link href="../app/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../app/fa/css/all.css" rel="stylesheet">

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
            <h4>
              Identy&nbsp;&nbsp;&nbsp;

              <span style="font-size: 16px">
                <?php if($item['admin']=='true'):?>
                <span class="badge bg-info text-dark">ADMIN</span>
                <?php endif; ?>

                <?php if($item['preminum']=='true'):?>
                <span class="badge bg-primary text-light">PREMINUM</span>
                <?php endif; ?>
              </span>
            </h4>
            <div class="float-end">
              <?php echo $item['lastname']; ?>, <?php echo $item['firstname']; ?> - <?php echo $item['accountid']; ?>
            </div><br>

            <div class="float-end">
              <?php echo $item['created']; ?>
            </div><br>
            
            <?php if($item['verified']=='false'):?>
              <div class="alert alert-warning" role="alert">
                <b><?php echo $item['username']; ?></b>
                <br>
                <span>Email is waiting verification</span>
              </div>
            <?php endif; ?>
            <?php if($item['verified']=='true'):?>
              <div class="alert alert-success" role="alert">
                <b><?php echo $item['username']; ?></b>
                <br>
                <span>Email is verified</span>
              </div>
            <?php endif; ?>

            <?php if($item['status']=='suspended'):?>
              <div class="alert alert-danger" role="alert">
                <span>Account is inactive</span>
              </div>
            <?php endif; ?>
            <?php if($item['status']=='active'):?>
              <div class="alert alert-success" role="alert">
                <span>Account is active</span>
              </div>
            <?php endif; ?>

            <style>
              .alert {
                font-size:13px;
              }

              .alert b {
                font-size: 14px;
              }

              .alert span {
                color: #888c8b;
              }
            </style>
          </div>
        </div>

        <br><br>
        
        <div class="container">
          <div class="container-inner">
            <h4>Status:</h4>
            Preminum:
            <?php if($item['preminum']=='true'): ?>
            <span class="badge bg-success">TRUE</span>
            <?php endif; ?>
            <?php if($item['preminum']=='false'): ?>
            <span class="badge bg-warning text-dark">FALSE</span>
            <?php endif; ?>
            <br>
            <button type="button" class="btn btn-success btn-small" onclick="window.location.href='users/preminum-add.php?id=<?php echo $item['id'];?>&username=<?php echo $item['username']; ?>'">Apply Preminum</button>
            <button type="button" class="btn btn-danger btn-small" onclick="window.location.href='users/preminum-remove.php?id=<?php echo $item['id'];?>&username=<?php echo $item['username']; ?>'">Remove Preminum</button>
            
            <br><br>

            Admin:
            <?php if($item['admin']=='true'): ?>
            <span class="badge bg-success">TRUE</span>
            <?php endif; ?>
            <?php if($item['admin']=='false'): ?>
            <span class="badge bg-warning text-dark">FALSE</span>
            <?php endif; ?>
            <br>
            <button type="button" class="btn btn-success btn-small" onclick="window.location.href='users/admin-add.php?id=<?php echo $item['id'];?>&username=<?php echo $item['username']; ?>'">Apply Admin</button>
            <button type="button" class="btn btn-danger btn-small" onclick="window.location.href='users/admin-remove.php?id=<?php echo $item['id'];?>&username=<?php echo $item['username']; ?>'">Remove Admin</button>

            <br><br>

            Status:
            <?php if($item['status']=='active'): ?>
            <span class="badge bg-success">ACTIVE</span>
            <?php endif; ?>
            <?php if($item['status']=='suspended'): ?>
            <span class="badge bg-warning text-dark">SUSPENDED</span>
            <?php endif; ?>
            <br>
            <button type="button" class="btn btn-success btn-small" onclick="window.location.href='users/user-active.php?id=<?php echo $item['id'];?>&username=<?php echo $item['username']; ?>'">Apply Active</button>
            <button type="button" class="btn btn-danger btn-small" onclick="window.location.href='users/user-suspend.php?id=<?php echo $item['id'];?>&username=<?php echo $item['username']; ?>'">Suspend</button>

            <br><br>

            Verified: 
            <?php if($item['verified']=='true'): ?>
            <span class="badge bg-success">TRUE</span>
            <?php endif; ?>
            <?php if($item['verified']=='false'): ?>
            <span class="badge bg-warning text-dark">FALSE</span>
            <?php endif; ?>
            <br>
            <button type="button" class="btn btn-success btn-small" onclick="window.location.href='users/user-verify.php?id=<?php echo $item['id'];?>&username=<?php echo $item['username']; ?>'">Verify</button>
            <button type="button" class="btn btn-danger btn-small" onclick="window.location.href='users/user-unverify.php?id=<?php echo $item['id'];?>&username=<?php echo $item['username']; ?>'">Unverify</button>
          </div>
        </div>

        <br><br>

        <div class="container">
          <div class="container-inner">
            <?php if($dataexporten=='true'):?>
            <button type="button" class="btn btn-primary" onclick="window.open('export.php?aid=<?php echo $item['accountid']; ?>','_blank')">Export All Data</button>
            <?php endif; ?>
            <?php if($dataloginexporten=='true'):?>
            <button type="button" class="btn btn-outline-secondary" onclick="window.open('login-export.php?aid=<?php echo $item['accountid']; ?>','_blank')">Login Export</button>
            <?php endif; ?>
            <?php if($dataappexporten=='true'):?>
            <button type="button" class="btn btn-outline-secondary" onclick="window.open('app-load-export.php?aid=<?php echo $item['accountid']; ?>','_blank')">App Load Export</button>
            <?php endif; ?>
          </div>
        </div>

        <br><br>

        <div class="container">
          <div class="container-inner">
            <h4>User Archival</h4>
            <p>When you archive a user, it suspends their account, removes their admin permissions, and removes them from the active users list. This will not delete any of their account data. If you could like to unarchive a user, you can do so from the Archival page.</p>
            <button type="button" class="btn btn-danger btn-small" onclick="window.location.href='users/user-archive.php?id=<?php echo $item['id'];?>&username=<?php echo $item['username']; ?>'">Archive User</button>
          </div>
        </div>

        <br><br><br><br>

      <?php endforeach; ?>

    </div>
  </body>
</html>
<style>
  .btn-small {
    font-size: 12px !important;
    width: 150px;
  }
</style>
<?php include('dynamic/style.css'); ?>