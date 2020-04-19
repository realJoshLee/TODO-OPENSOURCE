<?php
  // Turns off error reporting.
  error_reporting(0);

  // Document for accessing the database.
  require_once('init.php');

  // Makes sure that the user is logged in. If not it redirects.
  session_start();
  if(!isset($_SESSION["username"]))  
  {  
    // Where the page will redirect to.
    // Currently set to redirect to the login page.
    header("location:../index.php?action=login");  
  }

  // Gets the current user.
  $currentuser = $_SESSION["username"];

  // Gets the current day to highlight the current day in the task listing.
  // When the screen gets to small, this will also scroll the user down the current day.
  $tz = 'America/Detroit';
  $timestamp = time();
  $dt = new DateTime("now", new DateTimeZone($tz));
  $dt->setTimestamp($timestamp);
  $datetime = $dt->format('M.d.Y g:i:s A');
  $date = $dt->format('M.d.Y');
  $day = $dt->format('D');

  // Checks to make sure the user if verified.
  $username = $_SESSION['username'];
  $query = "SELECT * FROM users WHERE username = '$username' AND verified = 1";
  $result = mysqli_query($connect, $query);
  $verifyTrue = 1;
  $verifyFalse = 0;
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      if ($verifyQuery == $verifyFalse) {
      } else {
        header("Location: ../verification/");
        exit();
      }
    }
  } else {
    header("Location: ../verification/");
    exit();
  }

  // Pulls everything from the database.
  $themeitems = $db->prepare("SELECT id, username, theme FROM users WHERE username = :user");

  $themeitems->execute([
    'user' => $_SESSION['user_id']
    ]);

  $theme = $themeitems->rowCount() ? $themeitems : [];

  foreach($theme as $item){
    $usertheme = $item['theme'];
    if($usertheme == "light") {
      // Things to do for the user theme if it is set to light.
      include('css/theme-light.php');
    }
    if($usertheme == "dark") {
      // Things to do for the user theme if it is set to dark.
      include('css/theme-dark.php');
    }
  }

  $sundayitems = $db->prepare("SELECT id, name, day, priority, done FROM todotasks WHERE user = :user AND day = :day ORDER BY priority ASC");

  $sundayitems->execute([
    'user' => $_SESSION['user_id'],
    'day' => "sunday"
    ]);

  $sunday = $sundayitems->rowCount() ? $sundayitems : [];

  $mondayitems = $db->prepare("SELECT id, name, priority, day, done FROM todotasks WHERE user = :user AND day = :day ORDER BY priority ASC");

  $mondayitems->execute([
    'user' => $_SESSION['user_id'],
    'day' => "monday"
    ]);

  $monday = $mondayitems->rowCount() ? $mondayitems : [];

  $tuesdayitems = $db->prepare("SELECT id, name, priority, day, done FROM todotasks WHERE user = :user AND day = :day ORDER BY priority ASC");

  $tuesdayitems->execute([
    'user' => $_SESSION['user_id'],
    'day' => "tuesday"
    ]);

  $tuesday = $tuesdayitems->rowCount() ? $tuesdayitems : [];

  $wednesdayitems = $db->prepare("SELECT id, name, priority, day, done FROM todotasks WHERE user = :user AND day = :day ORDER BY priority ASC");

  $wednesdayitems->execute([
    'user' => $_SESSION['user_id'],
    'day' => "wednesday"
    ]);

  $wednesday = $wednesdayitems->rowCount() ? $wednesdayitems : [];

  $thursdayitems = $db->prepare("SELECT id, name, priority, day, done FROM todotasks WHERE user = :user AND day = :day ORDER BY priority ASC");

  $thursdayitems->execute([
    'user' => $_SESSION['user_id'],
    'day' => "thursday"
    ]);

  $thursday = $thursdayitems->rowCount() ? $thursdayitems : [];

  $fridayitems = $db->prepare("SELECT id, name, priority, day, done FROM todotasks WHERE user = :user AND day = :day ORDER BY priority ASC");

  $fridayitems->execute([
    'user' => $_SESSION['user_id'],
    'day' => "friday"
    ]);

  $friday = $fridayitems->rowCount() ? $fridayitems : [];

  $saturdayitems = $db->prepare("SELECT id, name, priority, day, done FROM todotasks WHERE user = :user AND day = :day ORDER BY priority ASC");

  $saturdayitems->execute([
    'user' => $_SESSION['user_id'],
    'day' => "saturday"
    ]);

  $saturday = $saturdayitems->rowCount() ? $saturdayitems : [];

  $inboxitems = $db->prepare("SELECT id, name, day, priority, done FROM todotasks WHERE user = :user AND day = :day ORDER BY priority ASC");

  $inboxitems->execute([
    'user' => $_SESSION['user_id'],
    'day' => "inbox"
    ]);

  $inbox = $inboxitems->rowCount() ? $inboxitems : [];

  $allitems = $db->prepare("SELECT id, name, day, priority, done FROM todotasks WHERE user = :user ORDER BY priority ASC");

  $allitems->execute([
    'user' => $_SESSION['user_id']
    ]);

  $all = $allitems->rowCount() ? $allitems : [];

  $staritems = $db->prepare("SELECT id, name, day, priority, done FROM todotasks WHERE user = :user AND special = :special ORDER BY priority ASC");

  $staritems->execute([
    'user' => $_SESSION['user_id'],
    'special' => "star"
    ]);

  $star = $staritems->rowCount() ? $staritems : [];

  if($day == 'Sun') {
    $gettoday = "sunday";
  }

  if($day == 'Mon') {
    $gettoday = "monday";
  }

  if($day == 'Tue') {
    $gettoday = "tuesday";
  }

  if($day == 'Wed') {
    $gettoday = "wednesday";
  }

  if($day == 'Thu') {
    $gettoday = "thursday";
  }

  if($day == 'Fri') {
    $gettoday = "friday ";
  }

  if($day == 'Sat') {
    $gettoday = "saturday";
  }

  $todayitems = $db->prepare("SELECT id, name, day, priority, done FROM todotasks WHERE user = :user AND day = :day ORDER BY priority ASC");

  $todayitems->execute([
    'user' => $_SESSION['user_id'],
    'day' => $gettoday
    ]);

  $today = $todayitems->rowCount() ? $todayitems : [];

  // Highlights the day of the week
  if($day == 'Sun') {
    include('css/tuesday.php');
  }

  if($day == 'Mon') {
    include('css/monday.php');
  }

  if($day == 'Tue') {
    include('css/tuesday.php');
  }

  if($day == 'Wed') {
    include('css/wednesday.php');
  }

  if($day == 'Thu') {
    include('css/thursday.php');
  }

  if($day == 'Fri') {
    include('css/friday.php');
  }

  if($day == 'Sat') {
    include('css/saturday.php');
  }

  $folderslist = $db->prepare("SELECT id, foldername, user FROM todofolders WHERE user = :user");

  $folderslist->execute([
    'user' => $_SESSION['user_id']
  ]);

  $folders = $folderslist->rowCount() ? $folderslist : [];

  $folderslista = $db->prepare("SELECT id, foldername, user FROM todofolders WHERE user = :user");

  $folderslista->execute([
    'user' => $_SESSION['user_id']
  ]);

  $foldersa = $folderslista->rowCount() ? $folderslista : [];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>TODO</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="author" content="Josh Lee - joshlee.pw">
        
    <!--Links to stylesheets-->
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png"/>
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="https://joshlee.pw/fontawesome/css/all.css">
    <link rel="stylesheet" href="https://joshlee.pw/fontawesome/js/all.css">
    <script src="https://kit.fontawesome.com/8f49cccb89.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  </head>
  <body>
    <script>
      var mq = window.matchMedia( "(max-width: 1096px)" );
      if (mq.matches) {
        window.onload = function () {
          // nothing
        }
      }
      else {
        window.onload = function () {
          nav();
        }
      }
    </script>
    <!--For the sidenav-->
    <div class="left" id="left">
      <div id="mySidenav" class="sidenav">
        <?php include('dynamic/nav.php'); ?>
      </div>
    </div>

    <!--Right section of the listing-->
    <div class="right" id="right">
      <!--Slide out nav button-->  
      <span class="navbutton switch-one" style="font-size:30px;cursor:pointer" onclick="nav()"><i class="fas fa-bars black"></i></span>
      <span class="navbutton switch-two" style="font-size:30px;cursor:pointer" onclick="smallnav()"><i class="fas fa-bars black"></i></span>
      <?php 
        if($_GET['page'] == "week") 
        { 
      ?>
        <div class="container week-tasks">
          
          <!--Sunday-->
          <div class="day sunday sun">
            <h2>Sunday</h2>
            <?php if(!empty($sunday)): ?>
              <ul id="myul" class="items">
                <?php foreach($sunday as $item): ?>
                  <?php include('dynamic/days-task-list.php'); ?>
                <?php endforeach; ?>
              </ul>
              <?php else: ?>
                <!--What is shown when there aren't any items in the list-->
            <?php endif; ?>
            
            <!--Form for adding all of the tasks.-->
            <form class="item-add" method="post" action="add.php?day=sunday">
              <input type="submit" name="taskadd" value="Add" class="submit">
              <input type="text" name="name" placeholder="Add task " class="task" autocomplete="off" required>
            </form>
          </div>

          <br><br>

          <!--Monday-->
          <div class="day monday mon">
            <h2>Monday</h2>
            <?php if(!empty($monday)): ?>
              <ul id="myul" class="items">
                <?php foreach($monday as $item): ?>
                  <?php include('dynamic/days-task-list.php'); ?>
                <?php endforeach; ?>
              </ul>
              <?php else: ?>
                <!--What is shown when there aren't any items in the list-->
            <?php endif; ?>
            
            <!--Form for adding all of the tasks.-->
            <form class="item-add" method="post" action="add.php?day=monday">
              <input type="submit" name="taskadd" value="Add" class="submit">
              <input type="text" name="name" placeholder="Add task " class="task" autocomplete="off" required>
            </form>
          </div>

          <br><br>

          <!--Tuesday-->
          <div class="day tuesday tue">
            <h2>Tuesday</h2>
            <?php if(!empty($tuesday)): ?>
              <ul id="myul" class="items">
                <?php foreach($tuesday as $item): ?>
                  <?php include('dynamic/days-task-list.php'); ?>
                <?php endforeach; ?>
              </ul>
              <?php else: ?>
                <!--What is shown when there aren't any items in the list-->
            <?php endif; ?>
            
            <!--Form for adding all of the tasks.-->
            <form class="item-add" method="post" action="add.php?day=tuesday">
              <input type="submit" name="taskadd" value="Add" class="submit">
              <input type="text" name="name" placeholder="Add task " class="task" autocomplete="off" required>
            </form>
          </div>

          <br><br>

          <!--Wednesday-->
          <div class="day wednesday wed">
            <h2>Wednesday</h2>
            <?php if(!empty($wednesday)): ?>
              <ul id="myul" class="items">
                <?php foreach($wednesday as $item): ?>
                  <?php include('dynamic/days-task-list.php'); ?>
                <?php endforeach; ?>
              </ul>
              <?php else: ?>
                <!--What is shown when there aren't any items in the list-->
            <?php endif; ?>
            
            <!--Form for adding all of the tasks.-->
            <form class="item-add" method="post" action="add.php?day=wednesday">
              <input type="submit" name="taskadd" value="Add" class="submit">
              <input type="text" name="name" placeholder="Add task " class="task" autocomplete="off" required>
            </form>
          </div>

          <br><br>

          <!--Thursday-->
          <div class="day thursday thu">
            <h2>Thursday</h2>
            <?php if(!empty($thursday)): ?>
              <ul id="myul" class="items">
                <?php foreach($thursday as $item): ?>
                  <?php include('dynamic/days-task-list.php'); ?>
                <?php endforeach; ?>
              </ul>
              <?php else: ?>
                <!--What is shown when there aren't any items in the list-->
            <?php endif; ?>
            
            <!--Form for adding all of the tasks.-->
            <form class="item-add" method="post" action="add.php?day=thursday">
              <input type="submit" name="taskadd" value="Add" class="submit">
              <input type="text" name="name" placeholder="Add task " class="task" autocomplete="off" required>
            </form>
          </div>

          <br><br>

          <!--Friday-->
          <div class="day friday fri">
            <h2>Friday</h2>
            <?php if(!empty($friday)): ?>
              <ul id="myul" class="items">
                <?php foreach($friday as $item): ?>
                  <?php include('dynamic/days-task-list.php'); ?>
                <?php endforeach; ?>
              </ul>
              <?php else: ?>
                <!--What is shown when there aren't any items in the list-->
            <?php endif; ?>
            
            <!--Form for adding all of the tasks.-->
            <form class="item-add" method="post" action="add.php?day=friday">
              <input type="submit" name="taskadd" value="Add" class="submit">
              <input type="text" name="name" placeholder="Add task " class="task" autocomplete="off" required>
            </form>
          </div>

          <br><br>

          <!--Saturday-->
          <div class="day saturday sat">
            <h2>Saturday</h2>
            <?php if(!empty($saturday)): ?>
              <ul id="myul" class="items">
                <?php foreach($saturday as $item): ?>
                  <?php include('dynamic/days-task-list.php'); ?>
                <?php endforeach; ?>
              </ul>
              <?php else: ?>
                <!--What is shown when there aren't any items in the list-->
            <?php endif; ?>
            
            <!--Form for adding all of the tasks.-->
            <form class="item-add" method="post" action="add.php?day=saturday">
              <input type="submit" name="taskadd" value="Add" class="submit">
              <input type="text" name="name" placeholder="Add task " class="task" autocomplete="off" required>
            </form>
          </div>
          
        </div>
      <?php 
        }
      ?>









      <!--Shows inbox tasks-->
      <?php 
        if($_GET['page'] == "inbox") 
        { 
      ?>
      <div class="container inbox-tasks">
        <h2>Inbox</h2>
        <?php if(!empty($inbox)): ?>
          <ul id="myul" class="items">
            <?php foreach($inbox as $item): ?>
              <?php if (!$item['done']):?>
                <li>
                  <?php $priority = $item['priority']; ?>
                  <?php include('dynamic/priority.php'); ?>
                  <!--For the dropdown-->
                  <?php include('dynamic/dropdown.php'); ?>
                  <a href="functions.php?action=mark&item=<?php echo $item['id'] ?>" class="done-button inline"><span class="dot dot-<?php echo $item['id']; ?>"></span></a>
                
                  <span class="item<?php echo $item['done'] ? 'done' : '' ?>">
                  
                  <?php $decrypted = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);?>
                  <form class="inline" id="task-form" method="post" action="actions.php?action=taskupdate">
                    <input onchange="this.form.submit()" name="tasktext" class="task-box" value="<?php echo $decrypted; ?>">
                    <input class="display-none" type="text" name="taskid"   value="<?php echo $item['id']; ?>">
                  </form>
                  </span>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
          <?php else: ?>
          <!--What is shown when there aren't any items in the list-->
        <?php endif; ?>
            
        <!--Form for adding all of the tasks.-->
        <form class="item-add" method="post" action="add.php?day=inbox">
          <input type="submit" name="taskadd" value="Add" class="submit">
          <input type="text" name="name" placeholder="Add task " class="task" autocomplete="off" required>
        </form>     
      </div>
      <?php
        }
      ?>









      <!--Shows all tasks-->
      <?php 
        if($_GET['page'] == "all") 
        { 
      ?>
      <div class="container all-tasks">
        <h2>All Tasks</h2>
        <?php if(!empty($all)): ?>
          <ul id="myul" class="items">
            <?php foreach($all as $item): ?>
              <?php if (!$item['done']):?>
                <li>
                  <?php $priority = $item['priority']; ?>
                  <?php include('dynamic/priority.php'); ?>
                  <!--For the dropdown-->
                  <?php include('dynamic/dropdown.php'); ?>
                  <a href="functions.php?action=mark&item=<?php echo $item['id'] ?>" class="done-button inline"><span class="dot dot-<?php echo $item['id']; ?>"></span></a>
                
                  <span class="item<?php echo $item['done'] ? 'done' : '' ?>">
                  
                  <?php $decrypted = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);?>
                  <form class="inline" id="task-form" method="post" action="actions.php?action=taskupdate">
                    <input onchange="this.form.submit()" name="tasktext" class="task-box" value="<?php echo $decrypted; ?>">
                    <p class="day"><?php echo $item['day']; ?></p>
                    <input class="display-none" type="text" name="taskid"   value="<?php echo $item['id']; ?>">
                  </form>
                  </span>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
          <?php else: ?>
          <!--What is shown when there aren't any items in the list-->
        <?php endif; ?>
      </div>
      <?php
        }
      ?>









      <!--Shows tasks due today-->
      <?php 
        if($_GET['page'] == "today") 
        { 
      ?>
      <div class="container inbox-tasks">
        <h2>Today</h2>
        <h4><?php echo $date; ?></h4>
        <br>
        <?php if(!empty($today)): ?>
          <ul id="myul" class="items">
            <?php foreach($today as $item): ?>
              <?php if (!$item['done']):?>
                <li>
                  <?php $priority = $item['priority']; ?>
                  <?php include('dynamic/priority.php'); ?>
                  <!--For the dropdown-->
                  <?php include('dynamic/dropdown.php'); ?>
                  <a href="functions.php?action=mark&item=<?php echo $item['id'] ?>" class="done-button inline"><span class="dot dot-<?php echo $item['id']; ?>"></span></a>
                
                  <span class="item<?php echo $item['done'] ? 'done' : '' ?>">
                  
                  <?php $decrypted = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);?>
                  <form class="inline" id="task-form" method="post" action="actions.php?action=taskupdate">
                    <input onchange="this.form.submit()" name="tasktext" class="task-box" value="<?php echo $decrypted; ?>">
                    <input class="display-none" type="text" name="taskid"   value="<?php echo $item['id']; ?>">
                  </form>
                  </span>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
          <?php else: ?>
          <!--What is shown when there aren't any items in the list-->
        <?php endif; ?>
            
        <!--Form for adding all of the tasks.-->
        <form class="item-add" method="post" action="add.php?day=today">
          <input type="submit" name="taskadd" value="Add" class="submit">
          <input type="text" name="name" placeholder="Add task " class="task" autocomplete="off" required>
        </form>     
      </div>
      <?php
        }
      ?>









      <!--Shows tasks due today-->
      <?php 
        if($_GET['page'] == "starred") 
        { 
      ?>
      <div class="container inbox-tasks">
        <h2>Starred Tasks</h2>
        <br>
        <?php if(!empty($star)): ?>
          <ul id="myul" class="items">
            <?php foreach($star as $item): ?>
              <?php if (!$item['done']):?>
                <li>
                  <?php $priority = $item['priority']; ?>
                  <?php include('dynamic/priority.php'); ?>
                  <!--For the dropdown-->
                  <?php include('dynamic/dropdown.php'); ?>
                  <a href="functions.php?action=mark&item=<?php echo $item['id'] ?>" class="done-button inline"><span class="dot dot-<?php echo $item['id']; ?>"></span></a>
                
                  <span class="item<?php echo $item['done'] ? 'done' : '' ?>">
                  
                  <?php $decrypted = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);?>
                  <form class="inline" id="task-form" method="post" action="actions.php?action=taskupdate">
                    <input onchange="this.form.submit()" name="tasktext" class="task-box" value="<?php echo $decrypted; ?>">
                    <p class="day"><?php echo $item['day']; ?></p>
                    <input class="display-none" type="text" name="taskid"   value="<?php echo $item['id']; ?>">
                  </form>
                  </span>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
          <?php else: ?>
          <!--What is shown when there aren't any items in the list-->
        <?php endif; ?>   
      </div>
      <?php
        }
      ?>









      <?php
      // Calls the database connection file
      require_once('init.php');

      // Gets the folder name that is going to be gotten.
      // Gets checked with the database for everything.
      if (isset($_GET['folder'])) {
        $folderbrowser = $_GET['folder'];

        $folderitems = $db->prepare("SELECT id, name, user, folder, day, special, priority, done FROM todotasks WHERE user = :user AND folder = :folderprovided ORDER BY priority ASC");

        $folderitems->execute([
          'user' => $_SESSION['user_id'],
          'folderprovided' => $folderbrowser
        ]);

        $foldertask = $folderitems->rowCount() ? $folderitems : [];

        //echo $folderbrowser;

        /*foreach ($foldertask as $item) {
          echo $item['name'];
        }*/
      ?>
      <br>
      <div class="container">
        <?php $decryptedfoldername = openssl_decrypt(base64_decode($folderbrowser), $method, $key, OPENSSL_RAW_DATA, $iv);?>
        <h2 class="inline"><?php echo $decryptedfoldername; ?></h2>&nbsp;&nbsp;&nbsp;&nbsp;<a href="functions.php?action=deletefolder&item=<?php echo $folderbrowser; ?>" class="folder-del-button inline"><i class="fas fa-minus-circle red"></i></a>

        <style>
          i.fa-minus-circle {
            font-size: 20px;
          }
        </style>

        <?php if (!empty($foldertask)) : ?>
          <ul id="myul" class="items">
            <?php foreach ($foldertask as $item) : ?>
              <?php if (!$item['done']) : ?>
                <li>
                  <?php $priority = $item['priority']; ?>
                  <?php include('dynamic/priority.php'); ?>
                  <!--For the dropdown-->
                  <?php include('dynamic/dropdown.php'); ?>
                  <a href="functions.php?action=mark&item=<?php echo $item['id'] ?>" class="done-button inline"><span class="dot dot-<?php echo $item['id']; ?>"></span></a>

                  <span class="item<?php echo $item['done'] ? 'done' : '' ?>">
                  
                  <?php $decrypted = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);?>
                  <form class="inline" id="task-form" method="post" action="actions.php?action=taskupdate">
                    <input onchange="this.form.submit()" name="tasktext" class="task-box" value="<?php echo $decrypted; ?>">
                      <p class="day"><?php echo $item['day']; ?></p>
                      <input class="display-none" type="text" name="taskid" value="<?php echo $item['id']; ?>">
                    </form>
                  </span>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        <?php else : ?>
          <!--What is shown when there aren't any items in the list-->
        <?php endif; ?>

        <!--Form for adding all of the tasks.-->
        <form class="item-add" method="post" action="add-folder-task.php?add=folder&folder=<?php echo $folderbrowser; ?>">
          <input type="submit" name="taskadd" value="Add" class="submit">
          <input type="text" name="name" placeholder="Add task " class="task" autocomplete="off" required>
        </form>
      </div>
      <?php } ?>
    </div>
  </body>
</html>
<?php
  // Style & Script sheets
  include('css/fonts.php');
  include('css/responsive.php');
  include('js/script.php');
?>