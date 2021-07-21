<?php
  include('../init/init.php');
  require 'all.php';

  if(!isset($_GET['p'])){
    header('Location: ?p=rollout');
  }
?>
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
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="?p=main">Main</a>
      <a href="?p=settings">App Settings</a>
      <a href="?p=users">Users</a>
    </div>

    <div class="content">
      <!--Nav btn-->
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

      <!--Main-->
      <?php if ($_GET['p']=='main'): ?>
        <br><br>

        <div class="main-content">
          <h2>Main</h2>

          <div class="row">
            <div class="column">

              <!--User token refresh-->
              <div class="section">
                <h2>User Tokens</h2>
                <p>This will log all users out when they close their browser asking them to sign in again. (This will also log you out of the admin portal)</p>
                <a href="scripts/token-refresh.php"><i class="fas fa-sync-alt"></i>&nbsp;Refresh all tokens</a>
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


            </div>





            <div class="column">


              <!--Actions-->
              <div class="section">
                <h2>Actions</h2>
                <a href="?p=users"><i class="fas fa-user"></i>&nbsp;Manage user accounts</a><br><br>
                <a href="?p=settings"><i class="fas fa-cog"></i>&nbsp;Update app settings</a><br><br>
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

      <?php if ($_GET['p']=='users'): ?>

        <?php          
          $itemslist = $db->prepare("SELECT * FROM passwordlogin ORDER BY lastname ASC");
          $itemslist->execute([
          ]);
          $items = $itemslist->rowCount() ? $itemslist : [];
        ?>

        <br><br>
        
        <div class="main-content settings-content">
          <h2>Users</h2>

          <h4>Add user</h4>
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

          <br><br>

          <h4>List users</h4>
          <table id="customers">
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Status</th>
              <th>Verified</th>
              <th>Admin</th>
              <th>Created</th>
            </tr>
            <?php foreach($items as $item):?>
            <tr>
              <td><a href="user-expand.php?user=<?php echo $item['username']; ?>" class="link"><?php echo ''.$item['lastname'].', '.$item['firstname'].'';?></a></td>
              <td><a href="user-expand.php?user=<?php echo $item['username']; ?>" class="link"><?php echo $item['username'];?></a></td>
              <td><a href="user-expand.php?user=<?php echo $item['username']; ?>" class="link"><?php if($item['status']=='active'){echo '<i class="far fa-check-circle"></i>';}else{echo '<i class="far fa-times-circle"></i>';}?></a></td>
              <td><a href="user-expand.php?user=<?php echo $item['username']; ?>" class="link"><?php if($item['verified']=='true'){echo '<i class="far fa-check-circle"></i>';}?></a></td>
              <td><a href="user-expand.php?user=<?php echo $item['username']; ?>" class="link"><?php if($item['admin']=='true'){echo '<i class="fas fa-user-shield"></i>';}?></a></td>
              <td><a href="user-expand.php?user=<?php echo $item['username']; ?>" class="link"><?php echo $item['created'];?></a></td>
            </tr>
            <?php endforeach; ?>
          </table>
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
              </div>
            </div>

            <!--Root website-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">Root Website</span></span></div>
                <div class="column-setting"><input type="text" class="form-control-setting" name="rootwebsite" value="<?php echo $item['rootwebsite']; ?>"></div>
              </div>
            </div>

            <br><br>
            
            <h3>Email sending control: <a href="mailjet.com" class="link">Mailjet setup</a></h3>
            <p>Leave all of these to the default value of you want to not use Mailjet.</p>
            <hr>
            <!--From email for mailjet-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">From Email</span>&nbsp;-&nbsp;<span>MAILJET REQUIRED</span></span></div>
                <div class="column-setting"><input type="text" class="form-control-setting" name="fromemail" value="<?php echo $item['fromemail']; ?>"></div>
              </div>
            </div>

            <!--From name for mailjet-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">From Name</span>&nbsp;-&nbsp;<span>MAILJET REQUIRED</span></span></div>
                <div class="column-setting"><input type="text" class="form-control-setting" name="fromname" value="<?php echo $item['fromname']; ?>"></div>
              </div>
            </div>

            <!--API Public key for mailjet-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">API Public</span>&nbsp;-&nbsp;<span>MAILJET REQUIRED</span></span></div>
                <div class="column-setting"><input type="text" class="form-control-setting" name="apipublic" value="<?php echo $item['apipublic']; ?>"></div>
              </div>
            </div>

            <!--API Private key for mailjet-->
            <div class="section">
              <div class="row-setting">
                <div class="column-setting"><span class="label">API Private</span>&nbsp;-&nbsp;<span>MAILJET REQUIRED</span></span></div>
                <div class="column-setting"><input type="text" class="form-control-setting" name="apiprivate" value="<?php echo $item['apiprivate']; ?>"></div>
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
              </div>
            </div>
            <div class="section">
              <input type="submit" class="form-control-submit" value="Revert to install Defaults">
            <br><br><br>
          </form>

          <br><br><br>

          <form action="scripts/clear-log.php" method="POST">
            <h3>Purge log</h3>
            <p>This will purge/delete all entries in the 'tasks_log' database. This will clear a couple megabytes depending on how many queries are in your log.</p>
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

    </div>
  </body>
</html>
<style>
  /*Side nav*/
  body {
    font-family: "Lato", sans-serif;
    background: #fff;
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
    font-size: 18px;
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