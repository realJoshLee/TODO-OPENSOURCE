<?php
  include('../app/init/init.php');
  require 'all.php';

  if(!isset($_GET['p'])){
    header('Location: ?p=main');
  }

  $updatecheck = "SELECT * FROM `tasks_control` WHERE updatestatus = 'update-available'";
  $conup = $conn->query($updatecheck);
  $updatestat = mysqli_num_rows($conup);
?>
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
    <link href="../app/plugins/fa/css/all.css" rel="stylesheet">

    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Varela&display=swap" rel="stylesheet">
  </head>
  <body>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

      <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dashboards</b></p>
      <a href="?p=main"><span style="padding-right:5px;"><i class="fas fa-home"></i></span>Home</a>

      <br>

      <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reports</b></p>
      <a href="?p=bugs"><span style="padding-right:9px;"><i class="fas fa-bug"></i></span>Reported Bugs</a>
      <a href="?p=log"><span style="padding-right:13px;"><i class="fas fa-clipboard"></i></span>Log Viewer</a>
      <a href="?p=log-filtered"><span style="padding-right:13px;"><i class="fas fa-clipboard"></i></span>Log (Filtered)</a>

      <br>

      <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;App Settings</b></p>
      <a href="?p=settings"><span style="padding-right:9px;"><i class="fas fa-cog"></i></span>App Settings</a>
      <a href="?p=rollout"><span style="padding-right:6px;"><i class="fas fa-hammer"></i></span>Rollout</a>
      <a href="?p=users"><span style="padding-right:5px;"><i class="fas fa-users"></i></span>Users</a>
      <a href="?p=archival"><span style="padding-right:5px;"><i class="fas fa-users"></i></span>Archival</a>
      <a href="?p=updates"><span style="padding-right: 8px;"><i class="fas fa-wrench"></i></span>Updates</a>

      <br>

      <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Licensing</b></p>
      <a href="?p=licensingoverview"><span style="padding-right:9px;"><i class="fas fa-key"></i></span>Licensing Overview</a>
      <a href="?p=appinfo"><span style="padding-right:9px;"><i class="fas fa-key"></i></span>App Info</a>

      <br>

      <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Resources</b></p>
      <a href="?p=resources"><span style="padding-right:12px;"><i class="fas fa-file"></i></span>Resources</a>

      <br>

      <a href="../logout.php?err=logout" style="color:red;">Logout</a>
    </div>

    <div class="content">
      <!--Nav btn-->
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

      <!--App info-->
      <?php if ($_GET['p']=='appinfo'): ?>

        <br><br>
        
        <script src="../app/plugins/bootstrap/bootstrap.bundle.min.js"></script>
        <link href="../app/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">

        <div class="main-content settings-content">
          <h2>App Info</h2>
          <p style="color:red;">Please make sure that you write down this information, expecially your encryption information and licensing information.</p>
          <p>If your conf_file.php file gets currupted, paste this into that file. When pasting, just remove the space between the '<' and '?' as it will then format as the correct code.</p>
          <pre><code>
          < ?php
          $dbip = <?php echo $dbip; ?> <br>
          $dbname = <?php echo $dbname; ?> <br>
          $dbusername = <?php echo $dbusername; ?> <br>
          $dbpassword = <?php echo $dbpassword; ?> <br>
          $encpassword = <?php echo $encpassword; ?> <br>
          $enciv = <?php echo $enciv; ?> <br>
          $licenseemail = <?php echo $licenseemail; ?> <br>
          $licensekey = <?php echo $licensekey; ?> <br>
          $ldap_baseDN = <?php echo $ldap_baseDN; ?> <br>
          $ldap_adminDN = <?php echo $ldap_adminDN; ?> <br>
          $ldap_adminPass = <?php echo $ldap_adminPass; ?> <br>
          $ldap_serverIP = <?php echo $ldap_serverIP; ?> <br>
          $ldap_domain = <?php echo $ldap_domain; ?> <br>
          $restrict_login = <?php echo $restrict_login; ?>
          </code></pre>
        </div>
      <?php endif; ?>

      <!--Updates-->
      <?php if ($_GET['p']=='updates'): ?>

        <br><br>
        
        <script src="../app/plugins/bootstrap/bootstrap.bundle.min.js"></script>
        <link href="../app/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">

        <div class="main-content settings-content">
          <h2>Updates</h2>
          <?php if($updatestat=='1'): ?>
          <div class="alert alert-success" role="alert">
            There is an update available!
          </div>
          <?php endif; ?>
          <p>To update the server, please download all of the files from the github and then go through the setup.php file again. Or if you would like to avoid going through the setup.php file and re-entering in all of your information, you can copy the conf_file.php file in the following directory: app/init/conf_file.php and then replace it when you finish copying all of the files.</p>
          <p>The conf_file.php is what contains all of your credentials for the database server, encryption keys, and license keys.</p>
          <p style="color:red;">Before you update plaese make sure that you have your encryption keys and setup information written down as without the encryption keys, nothing can be recovered. You can view that information on the <a href="?p=appinfo">App Info</a> page.</p>
          
        </div>
      <?php endif; ?>

      <!--Main-->
      <?php if ($_GET['p']=='main'): ?>
        <br><br>

        <div class="main-content">

          <h2>Main</h2>

          <?php if($updatestat=='1'): ?>
            <!--Actions-->
            <div class="section" style="background:#d1e7dd;border:1px solid #c5e1d4;">
              <h2>Update!</h2>
              <p>There is an update available. Please go to the update page to learn more.</p>
              <a href="?p=updates"><i class="fas fa-wrench"></i>&nbsp;Updating</a><br><br>
            </div>

            <br><br>
          <?php endif; ?>

          <div class="row">
            <div class="column">

              <!--User token refresh-->
              <div class="section">
                <h2>User Tokens</h2>
                <p>This will log all users out when they close their browser asking them to sign in again. (This will also log you out of the admin portal)</p>
                <a href="scripts/confirm.php?confirm=token-refresh"><i class="fas fa-sync-alt"></i>&nbsp;Refresh all tokens</a>
              </div>

              <br><br>

              <!--Log stats-->
              <div class="section">
                <?php 
                  $dblog = "SELECT * FROM `tasks_log`";
                  $conlog = $conn->query($dblog);
                  $log = mysqli_num_rows($conlog);
                  
                  $dbload = "SELECT * FROM `tasks_log` WHERE content = 'App load'";
                  $conload = $conn->query($dbload);
                  $load = mysqli_num_rows($conload);
                  
                  $dblogins = "SELECT * FROM `tasks_log` WHERE content = 'Successful login'";
                  $conlogins = $conn->query($dblogins);
                  $logins = mysqli_num_rows($conlogins);
                  
                  $dbfails = "SELECT * FROM `tasks_log` WHERE content = 'Invalid API request recieved'";
                  $confails = $conn->query($dbfails);
                  $fails = mysqli_num_rows($confails);
                ?>
                <h2>Log Stats</h2>
                <p class="stats">
                  <span class="label">Log Entries:</span>&nbsp;<span class="data"><?php echo $log; ?></span><br>
                  <span class="label">Logins:</span>&nbsp;<span class="data"><?php echo $logins; ?></span><br>
                  <span class="label">App Loads:</span>&nbsp;<span class="data"><?php echo $load; ?></span><br>
                  <span class="label">Failed API Requests:</span>&nbsp;<span class="data"><?php echo $fails; ?></span><br>
                </p>
              </div>

              <br><br>
            
              <!--Danger-->
              <div class="section">
                <h2>Danger</h2>
                <a href="scripts/confirm.php?confirm=reset-folder-shares"><i class="fas fa-cog"></i>&nbsp;Reset folder shares</a><br><br>
                <a href="scripts/confirm.php?confirm=purge-setup"><i class="fas fa-exclamation-triangle"></i>&nbsp;Purge setup files</a><br><br>
              </div>


            </div>





            <div class="column">

              <!--User and stats tasks-->
              <div class="section">
                <?php 
                  $dbusers = "SELECT * FROM `passwordlogin`";
                  $conusers = $conn->query($dbusers);
                  $users = mysqli_num_rows($conusers);

                  $dbtasks = "SELECT * FROM `tasks_tasks`";
                  $contasks = $conn->query($dbtasks);
                  $tasks = mysqli_num_rows($contasks);
                  
                  $dbcompleted = "SELECT * FROM `tasks_tasks` WHERE completed = 'true'";
                  $concompleted = $conn->query($dbcompleted);
                  $completed = mysqli_num_rows($concompleted);
                  
                  $dbfolders = "SELECT * FROM `tasks_folders`";
                  $confolders = $conn->query($dbfolders);
                  $folders = mysqli_num_rows($confolders);
                ?>
                <h2>Basic Stats</h2>
                <p class="stats"><span class="label">Users:</span>&nbsp;<span class="data"><?php echo $users; ?></span><br>
                   <span class="label">Tasks:</span>&nbsp;<span class="data"><?php echo $tasks; ?></span><br>
                   <span class="label">Completed Tasks:</span>&nbsp;<span class="data"><?php echo $completed; ?></span><br>
                   <span class="label">Folders:</span>&nbsp;<span class="data"><?php echo $folders; ?></span></p>
              </div>

              <br><br>

              <!--Bug reporting-->
              <div class="section">
                <?php 
                  $dbbug = "SELECT * FROM `tasks_bug`";
                  $conbug = $conn->query($dbbug);
                  $bug = mysqli_num_rows($conbug);
                ?>
                <h2>Bug Stats</h2>
                <p class="stats">
                  <span class="label">Submitted Bugs:</span>&nbsp;<span class="data"><?php echo $bug; ?></span><br>
                </p>
              </div>

              <br><br>

              <!--Actions-->
              <div class="section">
                <h2>Guides</h2>
                <a href="../app/extras/docs/index.html#admins" target="_blank" class="folderbacklink links-border"><i class="fas fa-book"></i>&nbsp;&nbsp;&nbsp;Admin guide</a><br><br>
                <a href="../app/extras/docs/index.html#initialsetupAdmin" target="_blank" class="folderbacklink links-border"><i class="fas fa-book"></i>&nbsp;&nbsp;&nbsp;Initial Setup</a><br><br>
              </div>


            </div>





            <div class="column">

              <!--Actions-->
              <div class="section">
                <h2>Actions</h2>
                <a href="?p=users"><i class="fas fa-user"></i>&nbsp;Manage user accounts</a><br><br>
                <a href="?p=settings"><i class="fas fa-cog"></i>&nbsp;Update app settings</a><br><br>
                <a href="../index.php#planning"><i class="fas fa-cog"></i>&nbsp;Main app</a><br><br>
              </div>

              <br><br>

              <!--User stats-->
              <div class="section">
                <?php 
                  $dbadmin = "SELECT * FROM `passwordlogin` WHERE admin = 'true'";
                  $conadmin = $conn->query($dbadmin);
                  $admin = mysqli_num_rows($conadmin);

                  $dbverified = "SELECT * FROM `passwordlogin` WHERE verified = 'true'";
                  $converified = $conn->query($dbverified);
                  $verified = mysqli_num_rows($converified);

                  $dbverifiedfal = "SELECT * FROM `passwordlogin` WHERE verified = 'false'";
                  $converifiedfal = $conn->query($dbverifiedfal);
                  $verifiedfal = mysqli_num_rows($converifiedfal);

                  $dbactive = "SELECT * FROM `passwordlogin` WHERE status = 'active'";
                  $conactive = $conn->query($dbactive);
                  $active = mysqli_num_rows($conactive);

                  $dbsuspended = "SELECT * FROM `passwordlogin` WHERE status = 'suspended'";
                  $consuspended = $conn->query($dbsuspended);
                  $suspended = mysqli_num_rows($consuspended);
                ?>
                <h2>User Stats</h2>
                <p class="stats">
                  <span class="label">Admins:</span>&nbsp;<span class="data"><?php echo $admin; ?></span><br>
                  <span class="label">Verified Users:</span>&nbsp;<span class="data"><?php echo $verified; ?></span><br>
                  <span class="label">Unverified Users:</span>&nbsp;<span class="data"><?php echo $verifiedfal; ?></span><br>
                  <span class="label">Active Users:</span>&nbsp;<span class="data"><?php echo $active; ?></span><br>
                  <span class="label">Suspended Users:</span>&nbsp;<span class="data"><?php echo $suspended; ?></span><br>
                </p>
              </div>


            </div>
          </div>
          
          <style>
          * {
            box-sizing: border-box;
          }

          .column {
            float: left;
            width: 33.33%;
            padding: 10px;
          }

          .row:after {
            content: "";
            display: table;
            clear: both;
          }

          .section {
            padding: 10px;
            border-radius: 10px;
            background: #ededf2;
          }

          a {
            color: #0962b9;
            text-decoration: none;
          }

          .label {
            color: #0962b9;
            font-weight: bold;
          }

          p.stats {
            line-height: 20px;
          }

          @media screen and (max-width: 1000px) {
            .column {
              width: 100%;
            }
          }
          </style>
        </div>
      <?php endif; ?>

      <!--Rollout-->
      <?php if ($_GET['p']=='rollout'): ?>
        <?php
          $rolloutitems = $db->prepare("SELECT * FROM `tasks_rollout` ORDER BY tag ASC");
          $rolloutitems->execute([
          ]);
          $rollout = $rolloutitems->rowCount() ? $rolloutitems : [];
        ?>

        <br><br>

        <div class="main-content settings-content">
          <h2>Rollout <a href="scripts/add.php" class="link"><i class="far fa-plus-square"></i></a></h2>

          <table>
            <tr>
              <th>Tag</th>
              <th>User</th>
              <th>Action</th>
            </tr>
            <?php foreach($rollout as $item): ?>
              <tr>
                <td><?php echo $item['tag']; ?></td>
                <td><?php echo $item['users']; ?></td>
                <td>
                  <a href="scripts/delete.php?id=<?php echo $item['id']; ?>" class="link"><i class="far fa-trash-alt"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      <?php endif; ?>

      <!--Log viewer-->
      <?php if ($_GET['p']=='log'): ?>

        <br><br>

        <div class="main-content settings-content">
          <h2>Log</h2>
          <p>Showing 150 results</p>

          <?php
            $logitems = $db->prepare("SELECT * FROM tasks_log ORDER BY id desc LIMIT 150;");
            $logitems->execute([
            ]);
            $log = $logitems->rowCount() ? $logitems : [];
          ?>
          <table>
            <tr>
              <th>ID</th>
              <th>AccountID</th>
              <th>Content</th>
              <th>IP</th>
              <th>Device</th>
              <th>Date</th>
            </tr>
            <?php foreach($log as $item): ?>
              <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['account']; ?></td>
                <td><?php echo $item['content']; ?></td>
                <td><?php echo $item['loginip']; ?></td>
                <td><?php echo $item['logindevice']; ?></td>
                <td><?php echo $item['date']; ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
          
        </div>
      <?php endif; ?>

      <!--Log viewer-->
      <?php if ($_GET['p']=='log-filtered'): ?>

        <br><br>

        <div class="main-content settings-content">
          <h2>Log</h2>

          <p>Filter by Account ID</p>
          <form method="POST">
            <input type="text" name="accountid" class="form-control-setting" style="width:412px;" placeholder="Account ID"><br>
            <input type="submit" name="filteredid" class="form-control-submit" value="Submit">
          </form>

          <p>Filter by Content</p>
          <form method="POST">
            <input type="text" name="content" class="form-control-setting" style="width:412px;" placeholder="Content"><br>
            <input type="submit" name="filteredcontent" class="form-control-submit" value="Submit">
          </form>

          <br><br>

          <?php if(isset($_POST['filteredid'])):?>
          <?php
            $accountidform = $_POST['accountid'];
            $logitems = $db->prepare("SELECT * FROM tasks_log WHERE `account` = :account ORDER BY id desc LIMIT 150;");
            $logitems->execute([
              'account' => $accountidform,
            ]);
            $log = $logitems->rowCount() ? $logitems : [];
          ?>

          <table>
            <tr>
              <th>ID</th>
              <th>AccountID</th>
              <th>Content</th>
              <th>IP</th>
              <th>Device</th>
              <th>Date</th>
            </tr>
            <?php foreach($log as $item): ?>
              <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['account']; ?></td>
                <td><?php echo $item['content']; ?></td>
                <td><?php echo $item['loginip']; ?></td>
                <td><?php echo $item['logindevice']; ?></td>
                <td><?php echo $item['date']; ?></td>
              </tr>
            <?php endforeach; ?>
          </table>

          <?php endif; ?>

          <?php if(isset($_POST['filteredcontent'])):?>
          <?php
            $accountidform = $_POST['content'];
            $logitems = $db->prepare("SELECT * FROM tasks_log WHERE `content` = :content ORDER BY id desc LIMIT 150;");
            $logitems->execute([
              'content' => $accountidform,
            ]);
            $log = $logitems->rowCount() ? $logitems : [];
          ?>

          <table>
            <tr>
              <th>ID</th>
              <th>AccountID</th>
              <th>Content</th>
              <th>IP</th>
              <th>Device</th>
              <th>Date</th>
            </tr>
            <?php foreach($log as $item): ?>
              <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['account']; ?></td>
                <td><?php echo $item['content']; ?></td>
                <td><?php echo $item['loginip']; ?></td>
                <td><?php echo $item['logindevice']; ?></td>
                <td><?php echo $item['date']; ?></td>
              </tr>
            <?php endforeach; ?>
          </table>

          <?php endif; ?>
        </div>
      <?php endif; ?>

      <?php if ($_GET['p']=='archival'): ?>

        <?php          
          $itemslist = $db->prepare("SELECT * FROM passwordlogin WHERE archived = 'true' ORDER BY lastname ASC");
          $itemslist->execute([
          ]);
          $items = $itemslist->rowCount() ? $itemslist : [];
        ?>
          <br><br>
        
        <div class="main-content settings-content">
          <h2>Archived Users</h2>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($items as $item):?>
              <tr scope="row">
                <td><?php echo ''.$item['lastname'].', '.$item['firstname'].'';?></td>
                <td><?php echo $item['username'];?></td>
                <td><a href="users/user-unarchive.php?id=<?php echo $item['id'];?>&username=<?php echo $item['username']; ?>" class="link" style="color:#0096ff;">Unarchive User</a></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <br><br><br>
        </div>
      <?php endif; ?>

      <?php if ($_GET['p']=='users'): ?>

        <?php          
          $itemslist = $db->prepare("SELECT * FROM passwordlogin WHERE archived = 'false' ORDER BY lastname ASC");
          $itemslist->execute([
          ]);
          $items = $itemslist->rowCount() ? $itemslist : [];
        ?>
        
        <script src="../app/plugins/bootstrap/bootstrap.bundle.min.js"></script>
        <link href="../app/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">

        <br><br>
        
        <div class="main-content settings-content">
          <h2>Users</h2>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Add User
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>You can bypass the domain whitelist with this form.</p>
                  <form action="scripts/add-user.php" method="POST">
                    <div class="section">
                      <div class="row-setting">
                        <div class="column-setting"><span class="label">Email</span></div>
                        <div class="column-setting"><input type="text" class="form-control-setting" name="email" required placeholder="john.doe@example.com"></div>
                      </div>
                    </div>

                    <div class="section">
                      <div class="row-setting">
                        <div class="column-setting"><span class="label">Password</span> (Default password filled)</div>
                        <div class="column-setting"><input type="text" class="form-control-setting" name="password" required placeholder="Password" value="Tasks1234!"></div>
                      </div>
                    </div>
                    
                    <div class="section">
                      <input type="submit" class="form-control-submit" value="Add user account">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <br><br>

          <h4>List users</h4>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Verified</th>
                <th scope="col">Admin</th>
                <th scope="col">Created</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($items as $item):?>
              <tr scope="row">
                <td><a href="user-expand.php?user=<?php echo $item['username']; ?>" class="link" style="color:#333;"><?php echo ''.$item['lastname'].', '.$item['firstname'].'';?></a></td>
                <td><a href="user-expand.php?user=<?php echo $item['username']; ?>" class="link" style="color:#333;"><?php echo $item['username'];?></a></td>
                <td><a href="user-expand.php?user=<?php echo $item['username']; ?>" class="link" style="color:#333;"><?php if($item['status']=='active'){echo '<span class="badge bg-success">*</span>';}else{echo '<span class="badge bg-danger">*</span>';}?></a></td>
                <td><a href="user-expand.php?user=<?php echo $item['username']; ?>" class="link" style="color:#333;"><?php if($item['verified']=='true'){echo '<span class="badge bg-success">*</span>';}else{echo '<span class="badge bg-danger">*</span>';}?></a></td>
                <td><a href="user-expand.php?user=<?php echo $item['username']; ?>" class="link" style="color:#333;"><?php if($item['admin']=='true'){echo '<span class="badge bg-success">*</span>';}else{echo '<span class="badge bg-danger">*</span>';}?></a></td>
                <td><a href="user-expand.php?user=<?php echo $item['username']; ?>" class="link" style="color:#333;"><?php echo $item['created'];?></a></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <br><br><br>
        </div>
      <?php endif; ?>

      <!--Settings-->
      <?php if ($_GET['p']=='settings'): ?>

        <?php          
          $configgetupdate = $db->prepare("SELECT * FROM `tasks_config` WHERE content = 'main_settings'");
          $configgetupdate->execute([
          ]);
          $configupdate = $configgetupdate->rowCount() ? $configgetupdate : [];
        ?>

        <br><br>

        <div class="main-content settings-content">
          <h2>Controls</h2>
          
          <?php foreach($configupdate as $item): ?>

          <div class="banner">
            <span style="font-size: 22px; cursor: pointer;" class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>&nbsp;&nbsp;&nbsp;&nbsp;If you're setting up for the first time, once you configure these settings, please create a new user on the users page (With a new secure password), promote that new user to an admin, then suspend the default admin account and logout.
          </div>

          <style>
            .banner {
              background-color: #fff3cd;

              border: 1px solid #fff5da;
              border-radius: 10px;
                  
              color: #835a03;
              padding: 10px;
            }
          </style>

          <form action="scripts/update-app.php" method="POST">

            <h3>Feature control:</h3>
            <hr>
            <!--Whitelist-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">Signup Whitelist</span></div>
                <div class="column-setting">
                  <select class="form-control-setting" name="whitelist">
                    <option value="true" <?php if($item['whitelist']=='true'){echo'selected ';}?>>Enabled</option>
                    <option value="false" <?php if($item['whitelist']=='false'){echo'selected ';}?>>Disabled</option>
                  </select>
                </div>

                <div class="extrainfo">
                  <br>
                  <p>Enables or disables the whitelist on the signup page to only allow the emails listed below to be allowed.</p>
                </div>
              </div>
            </div>

            <!--Domain Whitelist Val-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">Whitelisted Domains</span></div>
                <div class="column-setting">
                  <textarea class="form-control-setting" name="whitelistvals"><?php echo $item['whitelistvals']; ?></textarea>
                </div>

                <div class="extrainfo">
                  <br>
                  <p>Please make sure that all domains are seperated by commas or else this will not work. Signup Whitelist must be enabled for these domains to be enforced.</p>
                </div>
              </div>
            </div>

            <!--IP Whitelist-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">Block IP Addresses</span></div>
                <div class="column-setting">
                  <select class="form-control-setting" name="blockip">
                    <option value="true" <?php if($item['blockip']=='true'){echo'selected ';}?>>Enabled</option>
                    <option value="false" <?php if($item['blockip']=='false'){echo'selected ';}?>>Disabled</option>
                  </select>
                </div>

                <div class="extrainfo">
                  <br>
                  <p>Enables or disables the the option to block certain ip addresses.</p>
                </div>
              </div>
            </div>

            <!--Domain Whitelist Val-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">Blocked IP Addresses</span></div>
                <div class="column-setting">
                  <textarea class="form-control-setting" name="blockedipvals"><?php echo $item['blockedipvals']; ?></textarea>
                </div>

                <div class="extrainfo">
                  <br>
                  <p>Please make sure that all ip addresses are seperated by commas or else this will not work. Block IP Addresses must be enabled for these addresses to be enforced.</p>
                </div>
              </div>
            </div>
            
            <!--Magic link page-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">Magic Link Login</span></div>
                <div class="column-setting">
                  <select class="form-control-setting" name="magiclink">
                    <option value="true" <?php if($item['magic_link']=='true'){echo'selected ';}?>>Enabled</option>
                    <option value="false" <?php if($item['magic_link']=='false'){echo'selected ';}?>>Disabled</option>
                  </select>
                </div>

                <div class="extrainfo">
                  <br>
                  <p>Enables or disables the feature to sign in with a magic link that is sent to the users email address.</p>
                </div>
              </div>
            </div>

            <!--Verification-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">Email Verification</span></div>
                <div class="column-setting">
                  <select class="form-control-setting" name="verification">
                    <option value="true" <?php if($item['verification']=='true'){echo'selected ';}?>>Enabled</option>
                    <option value="false" <?php if($item['verification']=='false'){echo'selected ';}?>>Disabled</option>
                  </select>
                </div>

                <div class="extrainfo">
                  <br>
                  <p>Enables or disables forcing users to verify their email address. (Mailjet settings must be configured for this to work)</p>
                </div>
              </div>
            </div>

            <!--Log page-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">Log Page</span></div>
                <div class="column-setting">
                  <select class="form-control-setting" name="logpage">
                    <option value="true" <?php if($item['logpage']=='true'){echo'selected ';}?>>Enabled</option>
                    <option value="false" <?php if($item['logpage']=='false'){echo'selected ';}?>>Disabled</option>
                  </select>
                </div>

                <div class="extrainfo">
                  <br>
                  <p>Enables or disables the listing of the log page on the nav bar in the app.</p>
                </div>
              </div>
            </div>

            <!--Share page-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">Share Page</span></div>
                <div class="column-setting">
                  <select class="form-control-setting" name="sharepage">
                    <option value="true" <?php if($item['sharepage']=='true'){echo'selected ';}?>>Enabled</option>
                    <option value="false" <?php if($item['sharepage']=='false'){echo'selected ';}?>>Disabled</option>
                  </select>
                </div>

                <div class="extrainfo">
                  <br>
                  <p>Enables or disables the share page for guests to view a task and it's info from the shared link.</p>
                </div>
              </div>
            </div>

            <!--Acccount creations-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">Account Creations</span></div>
                <div class="column-setting">
                  <select class="form-control-setting" name="accountcreate">
                    <option value="true" <?php if($item['accountcreate']=='true'){echo'selected ';}?>>Enabled</option>
                    <option value="false" <?php if($item['accountcreate']=='false'){echo'selected ';}?>>Disabled</option>
                  </select>
                </div>

                <div class="extrainfo">
                  <br>
                  <p>Enables or disables the option to signup and create new accounts from the login page.</p>
                </div>
              </div>
            </div>

            <!--Bug report page-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">Bug reporting</span></div>
                <div class="column-setting">
                  <select class="form-control-setting" name="bugreport">
                    <option value="true" <?php if($item['bugreport']=='true'){echo'selected ';}?>>Enabled</option>
                    <option value="false" <?php if($item['bugreport']=='false'){echo'selected ';}?>>Disabled</option>
                  </select>
                </div>

                <div class="extrainfo">
                  <br>
                  <p>Enables or disables the ability for users to submit/report bugs in the app.</p>
                </div>
              </div>
            </div>

            <!--Bug report page-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">Allow theme change</span></div>
                <div class="column-setting">
                  <select class="form-control-setting" name="theme">
                    <option value="true" <?php if($item['theme']=='true'){echo'selected ';}?>>Enabled</option>
                    <option value="false" <?php if($item['theme']=='false'){echo'selected ';}?>>Disabled</option>
                  </select>
                </div>

                <div class="extrainfo">
                  <br>
                  <p>Enables or disables the option in the settings panel for users to change the theme. (Default is the light theme)</p>
                </div>
              </div>
            </div>

            <!--Data export-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">All data exporting</span></div>
                <div class="column-setting">
                  <select class="form-control-setting" name="dataexport">
                    <option value="true" <?php if($item['dataexport']=='true'){echo'selected ';}?>>Enabled</option>
                    <option value="false" <?php if($item['dataexport']=='false'){echo'selected ';}?>>Disabled</option>
                  </select>
                </div>

                <div class="extrainfo">
                  <br>
                  <p>Enables or disables the option for admins to export all data.</p>
                </div>
              </div>
            </div>

            <!--Login data export-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">Login data exporting</span></div>
                <div class="column-setting">
                  <select class="form-control-setting" name="dataloginexport">
                    <option value="true" <?php if($item['dataloginexport']=='true'){echo'selected ';}?>>Enabled</option>
                    <option value="false" <?php if($item['dataloginexport']=='false'){echo'selected ';}?>>Disabled</option>
                  </select>
                </div>

                <div class="extrainfo">
                  <br>
                  <p>Enables or disables the option for admins to export login data.</p>
                </div>
              </div>
            </div>

            <!--Login data export-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">App load data exporting</span></div>
                <div class="column-setting">
                  <select class="form-control-setting" name="dataappexport">
                    <option value="true" <?php if($item['dataappexport']=='true'){echo'selected ';}?>>Enabled</option>
                    <option value="false" <?php if($item['dataappexport']=='false'){echo'selected ';}?>>Disabled</option>
                  </select>
                </div>

                <div class="extrainfo">
                  <br>
                  <p>Enables or disables the option for admins to export app load data.</p>
                </div>
              </div>
            </div>

            <!--Login data export-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">Error reporting</span></div>
                <div class="column-setting">
                  <select class="form-control-setting" name="errorreporting">
                    <option value="true" <?php if($item['errorreporting']=='true'){echo'selected ';}?>>Enabled</option>
                    <option value="false" <?php if($item['errorreporting']=='false'){echo'selected ';}?>>Disabled</option>
                  </select>
                </div>

                <div class="extrainfo">
                  <br>
                  <p>Enables or disables error repoting in the app.</p>
                </div>
              </div>
            </div>

            <!--Reminder email-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">Reminder Email</span></div>
                <div class="column-setting">
                  <select class="form-control-setting" name="reminderemail">
                    <option value="true" <?php if($item['reminderemail']=='true'){echo'selected ';}?>>Enabled</option>
                    <option value="false" <?php if($item['reminderemail']=='false'){echo'selected ';}?>>Disabled</option>
                  </select>
                </div>

                <div class="extrainfo">
                  <br>
                  <p>Enables or disables reminder emails.</p>
                </div>
              </div>
            </div>

            <!--IP Whitelist-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">IP Whitelist</span></div>
                <div class="column-setting">
                  <select class="form-control-setting" name="ipwhitelist">
                    <option value="true" <?php if($item['ipwhitelist']=='true'){echo'selected ';}?>>Enabled</option>
                    <option value="false" <?php if($item['ipwhitelist']=='false'){echo'selected ';}?>>Disabled</option>
                  </select>
                </div>

                <div class="extrainfo">
                  <br>
                  <p>Enables or disables to only allow access into the app from certain IP addresses. (Please fill in IPs seperated by commas in the IP Whitelist Values option)</p>
                </div>
              </div>
            </div>

            <!--IP Whitelist Val-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">IP Whitelist Values</span></div>
                <div class="column-setting">
                  <textarea class="form-control-setting" name="ipwhitelistval"><?php echo $item['ipwhitelistval']; ?></textarea>
                </div>

                <div class="extrainfo">
                  <br>
                  <p>Please make sure that all IP addresses are seperated by commas or else this will not work. IP Whitelist must be enabled for these addresses to be enforced.</p>
                </div>
              </div>
            </div>

            <br><br>
            
            <h3>Content control:</h3>
            <hr>
            <!--Contact email-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">Contact email</span></span></div>
                <div class="column-setting"><input type="text" class="form-control-setting" name="contactemail" value="<?php echo $item['contactemail']; ?>"></div>

                <div class="extrainfo">
                  <br>
                  <p>The email address that will be listed everywhere as a contact email. (Support emails, contact emails, etc)</p>
                </div>
              </div>
            </div>

            <!--Root website-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">Root Website</span></span></div>
                <div class="column-setting"><input type="text" class="form-control-setting" name="rootwebsite" value="<?php echo $item['rootwebsite']; ?>"></div>
            
                <div class="extrainfo">
                  <br>
                  <p>The root website that this is hosted on. (Example: if this is hosted under tasks.example.com/apps/tasks/ then the root url will be tasks.example.com)</p>
                  <p style="color:red;">This must be filled in for a lot of the features to work properly.</p>
                </div>
              </div>
            </div>

            <br><br>
            
            <h3>Email sending control: <a href="mailjet.com" class="link">Mailjet setup</a></h3>
            <p>Leave all of these to the default value of you want to not use Mailjet.</p>
            <hr>
            <!--From email for mailjet-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">From Email</span></div>
                <div class="column-setting"><input type="text" class="form-control-setting" name="fromemail" value="<?php echo $item['fromemail']; ?>"></div>

                <div class="extrainfo">
                  <br>
                  <p>Please fill in this value with the from email that you configured in mailjet.</p>
                </div>
              </div>
            </div>

            <!--From name for mailjet-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">From Name</span></div>
                <div class="column-setting"><input type="text" class="form-control-setting" name="fromname" value="<?php echo $item['fromname']; ?>"></div>

                <div class="extrainfo">
                  <br>
                  <p>Please fill in this value with the from name that you would like to be listed in emails sent to users.</p>
                </div>
              </div>
            </div>

            <!--API Public key for mailjet-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">API Public</span></div>
                <div class="column-setting"><input type="text" class="form-control-setting" name="apipublic" value="<?php echo $item['apipublic']; ?>"></div>

                <div class="extrainfo">
                  <br>
                  <p>Please fill in this value with the API public that was provided in the Mailjet configuration.</p>
                </div>
              </div>
            </div>

            <!--API Private key for mailjet-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">API Private</span></div>
                <div class="column-setting"><input type="text" class="form-control-setting" name="apiprivate" value="<?php echo $item['apiprivate']; ?>"></div>

                <div class="extrainfo">
                  <br>
                  <p>Please fill in this value with the API Private key that was provided in the Mailjet configuration.</p>
                </div>
              </div>
            </div>

            <div class="section">
              <input type="submit" class="form-control-submit" value="Update Content">
            </div>
            <br>
          </form>

          <br><br><br>

          <form action="scripts/update-app-defaults.php" method="POST">
            <h3>Revert to defulats</h3>
            <hr>
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">Revert to defaults</span></div>
                <div class="column-setting">
                  <select class="form-control-setting" name="confirmdefaults">
                    <option value="true">Clear defaults</option>
                    <option value="false" selected>Don't clear defaults</option>
                  </select>
                </div>

                <div class="extrainfo">
                  <br>
                  <p>Reverting the setting to the default will change ALL settings above this option to their default values. This can't be undone.</p>
                </div>
              </div>
            </div>
            <div class="section">
              <input type="submit" class="form-control-submit" value="Revert to install Defaults">
            <br><br><br>
          </form>

          <br><br><br>

          <form action="scripts/clear-log.php" method="POST">
            <h3>Purge log</h3>
            <p>This will purge/delete all entries in the 'tasks_log' database. This will clear a couple kilobytes to terabytes depending on how many queries are in your log.</p>
            <hr>
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">Purge app log</span></div>
                <div class="column-setting">
                  <select class="form-control-setting" name="confirmlogclear">
                    <option value="true">Clear log</option>
                    <option value="false" selected>Don't clear log</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="section">
              <input type="submit" class="form-control-submit" value="Clear log">
            </div>
            <br><br><br>
          </form>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <!--Resources-->
      <?php if ($_GET['p']=='resources'): ?>
        <br><br>

        <div class="main-content settings-content">
          <h2>Resources</h2>

          <a download href="../app/icons/check.svg" class="resource-link"><img src="../app/icons/check.svg" alt="" class="resource-logo"> check.svg</a><br>
          <a download href="../app/icons/check.png" class="resource-link"><img src="../app/icons/check.png" alt="" class="resource-logo"> check.png</a><br>
          <a download href="../app/icons/favicon.png" class="resource-link"><img src="../app/icons/favicon.png" alt="" class="resource-logo"> favicon.png</a><br>
          <a download href="../app/icons/landing.png" class="resource-link"><img src="../app/icons/landing.png" alt="" class="resource-logo"> landing.png</a><br>
          <a download href="../app/icons/Landing-Dark.svg" class="resource-link"><img src="../app/icons/Landing-Dark.svg" alt="" class="resource-logo"> Landing-Dark.svg</a><br>
          <a download href="../app/icons/favicon.ico" class="resource-link"><img src="../app/icons/favicon.ico" alt="" class="resource-logo"> favicon.ico</a><br>

          <br><br>

          <a download href="../app/icons/shadow-icons/favicon-shadow.png" class="resource-link"><img src="../app/icons/shadow-icons/favicon-shadow.png" alt="" class="resource-logo"> favicon-shadow.png</a><br>
          <a download href="../app/icons/shadow-icons/favicon-shadow.svg" class="resource-link"><img src="../app/icons/shadow-icons/favicon-shadow.svg" alt="" class="resource-logo"> favicon-shadow.svg</a><br>
          <a download href="../app/icons/shadow-icons/favicon-shadow-192.png" class="resource-link"><img src="../app/icons/shadow-icons/favicon-shadow-192.png" alt="" class="resource-logo"> favicon-shadow-192.png</a><br>
          <a download href="../app/icons/shadow-icons/favicon-shadow-192.svg" class="resource-link"><img src="../app/icons/shadow-icons/favicon-shadow-192.svg" alt="" class="resource-logo"> favicon-shadow-192.svg</a><br>
          <a download href="../app/icons/shadow-icons/favicon-shadow-256.png" class="resource-link"><img src="../app/icons/shadow-icons/favicon-shadow-256.png" alt="" class="resource-logo"> favicon-shadow-256.png</a><br>
          <a download href="../app/icons/shadow-icons/favicon-shadow-256.svg" class="resource-link"><img src="../app/icons/shadow-icons/favicon-shadow-256.svg" alt="" class="resource-logo"> favicon-shadow-256.svg</a><br>
          <a download href="../app/icons/shadow-icons/favicon-shadow-384.png" class="resource-link"><img src="../app/icons/shadow-icons/favicon-shadow-384.png" alt="" class="resource-logo"> favicon-shadow-384.png</a><br>
          <a download href="../app/icons/shadow-icons/favicon-shadow-384.svg" class="resource-link"><img src="../app/icons/shadow-icons/favicon-shadow-384.svg" alt="" class="resource-logo"> favicon-shadow-384.svg</a><br>
          <a download href="../app/icons/shadow-icons/favicon-shadow-512.png" class="resource-link"><img src="../app/icons/shadow-icons/favicon-shadow-512.png" alt="" class="resource-logo"> favicon-shadow-512.png</a><br>
          <a download href="../app/icons/shadow-icons/favicon-shadow-512.svg" class="resource-link"><img src="../app/icons/shadow-icons/favicon-shadow-512.svg" alt="" class="resource-logo"> favicon-shadow-512.svg</a><br>

          <br><br>

          <a download href="../app/icons/archived_files/spinner.gif" class="resource-link"><img src="../app/icons/archived_files/spinner.gif" alt="" class="resource-logo"> spinner.gif</a><br>
          <a download href="../app/icons/archived_files/times-circle-regular.svg" class="resource-link"><img src="../app/icons/archived_files/times-circle-regular.svg" alt="" class="resource-logo"> times-circle-regular.svg</a><br>
          <a download href="../app/icons/archived_files/trash.svg" class="resource-link"><img src="../app/icons/archived_files/trash.svg" alt="" class="resource-logo"> trash.svg</a><br>

          <br><br>

          <a download href="../app/icons/quick-icons/Calendar.png" class="resource-link"><img src="../app/icons/quick-icons/Calendar.png" alt="" class="resource-logo"> calendar.png</a><br>
          <a download href="../app/icons/quick-icons/Inbox.png" class="resource-link"><img src="../app/icons/quick-icons/Inbox.png" alt="" class="resource-logo"> inbox.png</a><br>
          <a download href="../app/icons/quick-icons/Links.png" class="resource-link"><img src="../app/icons/quick-icons/Links.png" alt="" class="resource-logo"> links.png</a><br>
          <a download href="../app/icons/quick-icons/Today.png" class="resource-link"><img src="../app/icons/quick-icons/Today.png" alt="" class="resource-logo"> today.png</a><br>
          <a download href="../app/icons/nav-icons/Alerts-NoGradient.svg" class="resource-link"><img src="../app/icons/nav-icons/Alerts-NoGradient.svg" alt="" class="resource-logo"> alerts-nogradient.svg</a><br>
          <a download href="../app/icons/nav-icons/log.svg" class="resource-link"><img src="../app/icons/nav-icons/log.svg" alt="" class="resource-logo"> log.svg</a><br>
          <a download href="../app/icons/nav-icons/stats.svg" class="resource-link"><img src="../app/icons/nav-icons/stats.svg" alt="" class="resource-logo"> stats.svg</a><br>

          <br><br>

          <a download href="../app/icons/colored-folder-icons/folder-green.svg" class="resource-link"><img src="../app/icons/colored-folder-icons/folder-green.svg" alt="" class="resource-logo"> folder-02b96e.svg</a><br>
          <a download href="../app/icons/colored-folder-icons/folder-teel.svg" class="resource-link"><img src="../app/icons/colored-folder-icons/folder-teel.svg" alt="" class="resource-logo"> folder-2ed9ba.svg</a><br>
          <a download href="../app/icons/colored-folder-icons/folder-purple.svg" class="resource-link"><img src="../app/icons/colored-folder-icons/folder-purple.svg" alt="" class="resource-logo"> folder-7c3ffd.svg</a><br>
          <a download href="../app/icons/colored-folder-icons/folder-grey.svg" class="resource-link"><img src="../app/icons/colored-folder-icons/folder-grey.svg" alt="" class="resource-logo"> folder-575b68.svg</a><br>
          <a download href="../app/icons/colored-folder-icons/folder-blue.svg" class="resource-link"><img src="../app/icons/colored-folder-icons/folder-blue.svg" alt="" class="resource-logo"> folder-4169e1.svg</a><br>
          <a download href="../app/icons/colored-folder-icons/folder-maroon.svg" class="resource-link"><img src="../app/icons/colored-folder-icons/folder-maroon.svg" alt="" class="resource-logo"> folder-aa100c.svg</a><br>
          <a download href="../app/icons/colored-folder-icons/folder-lightpink.svg" class="resource-link"><img src="../app/icons/colored-folder-icons/folder-lightpink.svg" alt="" class="resource-logo"> folder-f76ee4.svg</a><br>
          <a download href="../app/icons/colored-folder-icons/folder-orange.svg" class="resource-link"><img src="../app/icons/colored-folder-icons/folder-orange.svg" alt="" class="resource-logo"> folder-fe6b55.svg</a><br>
          <a download href="../app/icons/colored-folder-icons/folder-pink.svg" class="resource-link"><img src="../app/icons/colored-folder-icons/folder-pink.svg" alt="" class="resource-logo"> folder-ff3970.svg</a><br>
          <a download href="../app/icons/colored-folder-icons/folder-yellowish.svg" class="resource-link"><img src="../app/icons/colored-folder-icons/folder-yellowish.svg" alt="" class="resource-logo"> folder-ffa311.svg</a><br>

          <br><br><br><br>
        </div>
      <?php endif; ?>

      <!--Bugs-->
      <?php if ($_GET['p']=='bugs'): ?>
        <br><br>

        <div class="main-content settings-content">
          <h2>Reported Bugs/Issues</h2>
          <p>All bugs and issues must be deleted from the database server. All entries are in the 'tasks_bug' tabel.</p>

          <?php 
            $bugitemslist = $db->prepare("SELECT * FROM tasks_bug ORDER BY time DESC");
            $bugitemslist->execute([
            ]);
            $bugitems = $bugitemslist->rowCount() ? $bugitemslist : [];
          ?>

          <table id="customers">
            <tr>
              <th>#</th>
              <th>Account Email</th>
              <th>Message</th>
              <th>Time</th>
            </tr>
            <?php foreach($bugitems as $item):?>
            <tr>
              <td><?php echo $item['id'];?></td>
              <td><?php echo $item['account'];?></td>
              <td><?php echo $item['message'];?></td>
              <td><?php echo $item['time'];?></td>
            </tr>
            <?php endforeach; ?>
          </table>

          <br><br><br><br>
        </div>
      <?php endif; ?>

      <!--Licensing Overview-->
      <?php if ($_GET['p']=='licensingoverview'): ?>
        <br><br>

        <div class="main-content settings-content">
          <h2>Licensing Overview</h2>
          <p>You can view an overview of your licensing details below. These details are the detils provided on the setup.php page. These details are coded into the app. If you have any issues with active status please submit a support ticket by emailing from the main site and provide the details below.</p>
          
          <br>

          <p><b>Licensing Email:</b>&nbsp;<?php echo $licenseemail; ?></p>
          <p><b>Licensing Key:</b>&nbsp;<?php echo $licensekey; ?></p>

          <br><br><br><br>
        </div>
      <?php endif; ?>

    </div>
  </body>
</html>
<style>
  /*Side nav*/
  body {
    font-family: "Lato", sans-serif;
    background: #fff;
  }

  .resource-logo {
    height: 16px;
    width: auto;
  }

  .resource-link {
    color: #0069ff;
    text-decoration: none;
    font-size: 18px;
  }

  * {
    box-sizing: border-box;
  }

  .mailjet {
    color: #0096ff;
  }

  .column-setting {
    float: left;
    width: 50%;
    padding: 10px;
  }

  .column-setting .label {
    font-weight: bold;
  }

  .row-setting {
    background-color: #f2f2fa;
    border-radius: 5px;
  }

  .row-setting:after {
    content: "";
    display: table;
    clear: both;
  }

  .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #f3f7f8;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
  }

  .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 16px;
    color: #111;
    display: block;
    transition: 0.3s;
  }

  .sidenav a:hover {
    color: grey;
  }

  .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }

  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }

  /*Table*/
  table {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  table td, table th {
    padding: 8px;
  }

  table tr{
    border-bottom: 1px solid #e7ebee;
  }

  table tr:hover {
    background-color: #ddd;
  }

  table th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #fff;
    color: #111;
  }

  /*Links*/
  a.link {
    color: #006fff;
    text-decoration: none;
  }

  div.section {
    margin-bottom: 10px;
  }

  .form-control-setting {
    width: 100%;
    background: none;
    border: 1px solid #cecedb;
    border-radius: 5px;
    padding: 5px;
    outline: none;
    font-size: 14px;
  }

  .form-control-setting:focus {
    border: 1px solid grey;
  }

  .form-control-submit {
    width: 412px;
    background: #ededf2;
    border: 1px solid #ededf2;
    font-weight: bold;
    border-radius: 5px;
    padding: 5px;
    outline: none;
    font-size: 14px;
  }

  .form-control-submit:hover {
    opacity: 0.5;
    cursor: pointer;
  }

  .settings-content {
    padding-left: 15%;
    padding-right: 15%;
  }

  .extrainfo {
    padding: 10px;
    font-size: 12px;
  }

  @media screen and (max-width: 923px){
    .settings-content {
      padding-left: 10px;
      padding-right: 10px;
    }
  }
</style>
<script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
</script>