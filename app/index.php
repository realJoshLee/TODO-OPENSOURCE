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
  $today = $dt->format('D');
  $day = $dt->format('M.d.Y');
  $date = $dt->format('D');

  $todaynav = $dt->format('DMdY');
  
  $tomorrowtimenav = new DateTime('tomorrow', new DateTimeZone($tz));
  $tomorrownav = $tomorrowtimenav->format('DMdY');

  $twodaystimenav = new DateTime('+2 day', new DateTimeZone($tz));
  $twodaysnav = $twodaystimenav->format('DMdY');

  $threedaystimenav = new DateTime('+3 day');
  $threedaysnav = $threedaystimenav->format('DMdY');



  $yesterdaytime = new DateTime('yesterday', new DateTimeZone($tz));
  $yesterday = $yesterdaytime->format('D.M.d.Y');

  $tomorrowtime = new DateTime('tomorrow', new DateTimeZone($tz));
  $tomorrow= $tomorrowtime->format('D.M.d.Y');

  $twodaystime = new DateTime('+2 day', new DateTimeZone($tz));
  $twodays = $twodaystime->format('D.M.d.Y');

  $threedaystime = new DateTime('+3 day', new DateTimeZone($tz));
  $threedays = $threedaystime->format('D.M.d.Y');









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

  include('css/theme-light.php');
  foreach($theme as $item){
    $usertheme = $item['theme'];
    /*if($usertheme == "light") {
      // Things to do for the user theme if it is set to light.
      include('css/theme-light.php');
    }*/
    if($usertheme == "dark") {
      // Things to do for the user theme if it is set to dark.
      include('css/theme-dark.php');
    }
  }










  $yesterdayitemsget = $db->prepare("SELECT id, name, day, priority, done FROM todotasks WHERE user = :user AND day = :day ORDER BY priority ASC");

  $yesterdayget = $yesterdaytime->format('DMdY');

  $yesterdayitemsget->execute([
    'user' => $_SESSION['user_id'],
    'day' => "$yesterdayget"
    ]);

  $yesterdayitems = $yesterdayitemsget->rowCount() ? $yesterdayitemsget : [];

  $todayitemsget = $db->prepare("SELECT id, name, day, priority, done FROM todotasks WHERE user = :user AND day = :day ORDER BY priority ASC");

  $todaydayget = $dt->format('DMdY');

  $todayitemsget->execute([
    'user' => $_SESSION['user_id'],
    'day' => "$todaydayget"
    ]);

  $todayitems = $todayitemsget->rowCount() ? $todayitemsget : [];

  $tomorrowitemsget = $db->prepare("SELECT id, name, day, priority, done FROM todotasks WHERE user = :user AND day = :day ORDER BY priority ASC");

  $tomorrowdayget = $tomorrowtime->format('DMdY');

  $tomorrowitemsget->execute([
    'user' => $_SESSION['user_id'],
    'day' => "$tomorrowdayget"
    ]);

  $tomorrowitems = $tomorrowitemsget->rowCount() ? $tomorrowitemsget : [];

  $twodaysitemsget = $db->prepare("SELECT id, name, day, priority, done FROM todotasks WHERE user = :user AND day = :day ORDER BY priority ASC");

  $twodaysdayget = $twodaystime->format('DMdY');

  $twodaysitemsget->execute([
    'user' => $_SESSION['user_id'],
    'day' => "$twodaysdayget"
    ]);

  $twodaysitems = $twodaysitemsget->rowCount() ? $twodaysitemsget : [];

  $threedaysitemsget = $db->prepare("SELECT id, name, day, priority, done FROM todotasks WHERE user = :user AND day = :day ORDER BY priority ASC");

  $threedaysdayget = $threedaystime->format('DMdY');

  $threedaysitemsget->execute([
    'user' => $_SESSION['user_id'],
    'day' => "$threedaysdayget"
    ]);

  $threedaysitems = $threedaysitemsget->rowCount() ? $threedaysitemsget : [];

  $todayitemsgettoday = $db->prepare("SELECT id, name, day, priority, done FROM todotasks WHERE user = :user AND day = :day ORDER BY priority ASC");

  $todaydaygettoday = $dt->format('DMdY');

  $todayitemsgettoday->execute([
    'user' => $_SESSION['user_id'],
    'day' => "$todaydayget"
    ]);

  $todayitemstoday = $todayitemsgettoday->rowCount() ? $todayitemsgettoday : [];










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
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
  </head>
  <body onResize="refresh()">
    <script>
      /*var mq = window.matchMedia( "(max-width: 1096px)" );
      if (mq.matches) {
        window.onload = function () {
          // nothing
        }
      }
      else {
        window.onload = function () {
          nav();
        }
      }*/
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
      <span class="navbutton switch-one" style="font-size:30px;cursor:pointer" onclick="nav()"><i class="fas fa-bars nav-black"></i></span>
      <span class="navbutton switch-two" style="font-size:30px;cursor:pointer" onclick="smallnav()"><i class="fas fa-bars nav-black"></i></span>
      <?php 
        if($_GET['page'] == "week") 
        { 
      ?>
        <div class="container week-tasks">
          <div class="row">
            <!--Yesterday-->
            <div id="yesterday" class="column yesterday">
              <h2><?php echo $yesterdaytime->format('D'); ?> <span class="date"><?php echo $yesterdaytime->format('M d'); ?></span></h2>
              <?php if(!empty($yesterdayitems)): ?>
                <ul id="myul" class="items">
                  <?php foreach($yesterdayitems as $item): ?>
                      <li>
                        <?php $priority = $item['priority']; ?>
                        <?php include('dynamic/priority.php'); ?>
                        <?php if(!$item['done']){
                            include('dynamic/dropdown.php');
                          }
                        ?>
                        <span class="dot dot-<?php echo $item['id']; ?>"></span>

                        <span class="item<?php echo $item['done'] ? 'done' : '' ?>">
                          <?php $decrypted = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);?>
                          
                          
                          <form class="inline form<?php echo $item['id']; ?>" id="task-form" method="post" action="actions.php?action=taskupdate">
                            <p id="input<?php echo $item['id'];?>" class="inline taskarea" onKeyPress="return checkSubmit(event)" onKeyup="updatefunction<?php echo $item['id'];?>()"><?php  if($item['done']){echo '<i class="fas fa-check"></i>&nbsp;';} ?><?php echo $decrypted; ?></p>
                          </form>
                        </span>
                      </li>
                  <?php endforeach; ?>
                </ul>
                <?php else: ?>
                  <!--What is shown when there aren't any items in the list-->
              <?php endif; ?>
            </div>










            <!--Today-->
            <div id="today" class="column today">
              <div class="buttons">
                <!--Prev-->
                <button class="smallernav" >
                  <i style="opacity: 0.3" class="fas fa-angle-double-left"></i>
                </button>

                <!--Forward-->
                <button class="smallernav" onclick="forwardToday()">
                  <i class="fas fa-angle-double-right"></i>
                </button>
              </div>

              <h2 style="color:#5297ff;"><?php echo $dt->format('D'); ?> <span class="date"><?php echo $dt->format('M d'); ?></span></h2>
              <?php if(!empty($todayitems)): ?>
                <ul id="myul" class="items">
                  <?php foreach($todayitems as $item): ?>
                    <?php include('dynamic/days-task-list.php'); ?>
                  <?php endforeach; ?>
                </ul>
                <?php else: ?>
                  <!--What is shown when there aren't any items in the list-->
              <?php endif; ?>
              
              <!--Form for adding all of the tasks.-->
              <form class="item-add" method="post" action="add-task.php?day=<?php echo $dt->format('DMdY'); ?>">
                <!--<input type="submit" name="taskadd" value="Add" class="submit">-->
                <input type="text" name="name" placeholder="Add task " class="task" autocomplete="off" required>
              </form>
            </div>










            <!--Tomorrow-->
            <div id="tomorrow" class="column tomorrow">
              <div class="buttons">
                <!--Prev-->
                <button class="smallernav" onclick="prevTomorrow()">
                  <i class="fas fa-angle-double-left"></i>
                </button>

                <!--Forward-->
                <button class="smallernav" onclick="forwardTomorrow()">
                  <i class="fas fa-angle-double-right"></i>
                </button>
              </div>

              <h2><?php echo $tomorrowtime->format('D'); ?><span class="date"> <?php echo $tomorrowtime->format('M d'); ?></span></h2>
              <?php if(!empty($tomorrowitems)): ?>
                <ul id="myul" class="items">
                  <?php foreach($tomorrowitems as $item): ?>
                    <?php include('dynamic/days-task-list.php'); ?>
                  <?php endforeach; ?>
                </ul>
                <?php else: ?>
                  <!--What is shown when there aren't any items in the list-->
              <?php endif; ?>
              
              <!--Form for adding all of the tasks.-->
              <form class="item-add" method="post" action="add-task.php?day=<?php echo $tomorrowtime->format('DMdY'); ?>">
                <!--<input type="submit" name="taskadd" value="Add" class="submit">-->
                <input type="text" name="name" placeholder="Add task " class="task" autocomplete="off" required>
              </form>
            </div>









            <!--Two days out-->
            <div id="twodays" class="column twodays">
              <div class="buttons">
                <!--Prev-->
                <button class="smallernav" onclick="prevTwodays()">
                  <i class="fas fa-angle-double-left"></i>
                </button>

                <!--Forward-->
                <button class="smallernav" onclick="forwardTwodays()">
                  <i class="fas fa-angle-double-right"></i>
                </button>
              </div>

              <h2><?php echo $twodaystime->format('D'); ?><span class="date"> <?php echo $twodaystime->format('M d'); ?></span></h2>
              <?php if(!empty($twodaysitems)): ?>
                <ul id="myul" class="items">
                  <?php foreach($twodaysitems as $item): ?>
                    <?php include('dynamic/days-task-list.php'); ?>
                  <?php endforeach; ?>
                </ul>
                <?php else: ?>
                  <!--What is shown when there aren't any items in the list-->
              <?php endif; ?>
              
              <!--Form for adding all of the tasks.-->
              <form class="item-add" method="post" action="add-task.php?day=<?php echo $twodaystime->format('DMdY'); ?>">
                <!--<input type="submit" name="taskadd" value="Add" class="submit">-->
                <input type="text" name="name" placeholder="Add task " class="task" autocomplete="off" required>
              </form>
            </div>










            <!--Three days out-->
            <div id="threedays" class="column threedays">
              <div class="buttons">
                <!--Prev-->
                <button class="smallernav" onclick="prevThreedays()">
                  <i class="fas fa-angle-double-left"></i>
                </button>

                <!--Forward-->
                <button class="smallernav" >
                  <i style="opacity: 0.3" class="fas fa-angle-double-right"></i>
                </button>
              </div>

              <h2><?php echo $threedaystime->format('D'); ?><span class="date"> <?php echo $threedaystime->format('M d'); ?></span></h2>
              <?php if(!empty($threedaysitems)): ?>
                <ul id="myul" class="items">
                  <?php foreach($threedaysitems as $item): ?>
                    <?php include('dynamic/days-task-list.php'); ?>
                  <?php endforeach; ?>
                </ul>
                <?php else: ?>
                  <!--What is shown when there aren't any items in the list-->
              <?php endif; ?>
              
              <!--Form for adding all of the tasks.-->
              <form class="item-add" method="post" action="add-task.php?day=<?php echo $threedaystime->format('DMdY'); ?>">
                <!--<input type="submit" name="taskadd" value="Add" class="submit">-->
                <input type="text" name="name" placeholder="Add task " class="task" autocomplete="off" required>
              </form>
            </div>
          </div>
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
      
      
                  <form class="inline form<?php echo $item['id']; ?>" id="task-form" method="post" action="actions.php?action=taskupdate">
                    <p id="input<?php echo $item['id'];?>" class="inline taskarea" contenteditable="true" onKeyPress="return checkSubmit(event)" onKeyup="updatefunction<?php echo $item['id'];?>()"><?php echo $decrypted; ?></p>
                    <input onupdate="this.form.submit()" name="tasktext" class="task-box display-none" type="text" id="output<?php echo $item['id'];?>">
                    <input class="display-none" type="text" name="taskid" value="<?php echo $item['id']; ?>">
                    <button class="submitd" type="submit">
                      <i class="fas fa-check-circle"></i>
                    </button>
                  </form>
                  <script>
                    function updatefunction<?php echo $item['id'];?>() {
                      document.getElementById("output<?php echo $item['id'];?>").value = document.getElementById("input<?php echo $item['id'];?>").innerHTML;
                    }

                    document.getElementById("formsubmit").onclick = function() {
                      document.getElementById("form<?php echo $item['id']; ?>").submit();
                    }
                  </script>
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
        <h2>Tasks Due Today <span class="date"><?php echo $dt->format('M d'); ?></span></h2>
        <?php if(!empty($todayitemstoday)): ?>
          <ul id="myul" class="items">
            <?php foreach($todayitemstoday as $item): ?>
              <?php include('dynamic/days-task-list.php'); ?>
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
      
      
                  <form class="inline form<?php echo $item['id']; ?>" id="task-form" method="post" action="actions.php?action=taskupdate">
                    <p id="input<?php echo $item['id'];?>" class="inline taskarea" contenteditable="true" onKeyPress="return checkSubmit(event)" onKeyup="updatefunction<?php echo $item['id'];?>()"><?php echo $decrypted; ?></p>
                    <input onupdate="this.form.submit()" name="tasktext" class="task-box display-none" type="text" id="output<?php echo $item['id'];?>">
                    <input class="display-none" type="text" name="taskid" value="<?php echo $item['id']; ?>">
                    <button class="submitd" type="submit">
                      <i class="fas fa-check-circle"></i>
                    </button>
                  </form>
                  <script>
                    function updatefunction<?php echo $item['id'];?>() {
                      document.getElementById("output<?php echo $item['id'];?>").value = document.getElementById("input<?php echo $item['id'];?>").innerHTML;
                    }

                    document.getElementById("formsubmit").onclick = function() {
                      document.getElementById("form<?php echo $item['id']; ?>").submit();
                    }
                  </script>
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
          <!--<input type="submit" name="taskadd" value="Add" class="submit">-->
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