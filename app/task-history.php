<?php
error_reporting(0);
?>

<!--Redirects the user to the login page if they aren't logged in already.-->
<?php
session_start();
if (!isset($_SESSION["username"])) {
  header("location:../index.php?action=login");
}

// Makes sure the user is a donor.
require_once 'init.php';
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username' AND donor = 1";
$result = mysqli_query($connect, $query);
$donorTrue = 1;
$donorFalse = 0;
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_array($result)) {
    if ($donorQuery == $donorFalse) {
    } else {
      header("Location: task-history-premium.html");
      exit();
    }
  }
} else {
  header("Location: task-history-premium.html");
  exit();
}
?>

<?php
// Makes sure the user is a verified.
require_once 'init.php';
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
?>

<!--Gets the tasks in the inbox-->
<?php
require_once 'init.php';

$itemsQuery = $db->prepare("SELECT id, name, done FROM tasks WHERE user = :user AND folder = :folder");

$itemsQuery->execute([
  'user' => $_SESSION['user_id'],
  'folder' => "inbox"
]);

$items = $itemsQuery->rowCount() ? $itemsQuery : [];
?>

<!--Gets the personal tasks-->
<?php
require_once 'init.php';

$personaltasksQuery = $db->prepare("SELECT id, name, done FROM tasks WHERE user = :user AND folder = :folder");

$personaltasksQuery->execute([
  'user' => $_SESSION['user_id'],
  'folder' => "personal"
]);

$personaltasks = $personaltasksQuery->rowCount() ? $personaltasksQuery : [];
?>

<!--Gets the work tasks-->
<?php
require_once 'init.php';

$worktasksQuery = $db->prepare("SELECT id, name, done FROM tasks WHERE user = :user AND folder = :folder");

$worktasksQuery->execute([
  'user' => $_SESSION['user_id'],
  'folder' => "work"
]);

$worktasks = $worktasksQuery->rowCount() ? $worktasksQuery : [];
?>

<!--Gets the bookmarked tasks-->
<?php
require_once 'init.php';

$favoritetasksQuery = $db->prepare("SELECT id, name, done FROM tasks WHERE user = :user AND folder = :folder");

$favoritetasksQuery->execute([
  'user' => $_SESSION['user_id'],
  'folder' => "favorite"
]);

$favoritetasks = $favoritetasksQuery->rowCount() ? $favoritetasksQuery : [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>TODO</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <meta name="author" content="Josh Lee - joshlee.pw">

  <!--Links to stylesheets-->
  <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png" />
  <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="css/tasks.css">
  <link rel="stylesheet" href="css/task-history-column.css">
</head>

<body>
  <div class="body">
    <!--Settings and task view container-->
    <div class="row-top">
      <!--Settings and nav-->
      <div id="settings" class="column-top">
        <!--Folder Selection-->
        <div class="folders">
          <a href="all.php" class="folder-link-button left"><img src="assets/images/globe-707070.svg" id="folder-icon" class="inbox-button"></a>
          <a href="index.php" class="folder-link-button left"><img src="assets/images/inbox-707070.svg" id="folder-icon" class="inbox-button"></a>
          <a href="personal.php" class="folder-link-button" id="personal-link"><img src="assets/images/user-707070.svg" id="folder-icon" class="personal-button"></a>
          <a href="work.php" class="folder-link-button"><img src="assets/images/work-707070.svg" id="folder-icon" class="work-button"></a>
          <a href="task-history.php" class="folder-link-button"><img src="assets/images/checkmark-active.svg" id="folder-icon" class="done-button"></a>
          <a href="favorite.php" class="folder-link-button"><img src="assets/images/bookmark-707070.svg" id="folder-icon" class="bookmark-button"></a>
          <!--Dropdown Icon-->
          <div class="dropdown" style="float:right;">
            <!--Icon-->
            <a href="#" class="dropbtn right"><img src="assets/images/settings-707070.svg" id="folder-icon" class="work-button"></a>
            <!--Content that is in the dropdown-->
            <div class="dropdown-content">
              <a href="#" class="nav-link"><i><?php echo $_SESSION["username"]; ?></i></a>
              <br>
              <a class="nav-link" href="logout.php">Log Out</a>
              <a class="nav-link" href="account.php">Account</a>
              <a class="nav-link" href="task-history.php">Task History</a>
              <a class="nav-link" href="../../changelog.html">Change Log</a>
              <a class="nav-link" href="feedback/feedback.php" target="_blank">Give Feedback</a>
            </div>
          </div>
          <hr class="nav-bottom">
        </div>

        <!--Body-->
        <div class="body-inner">
          <h2>Compleated Tasks:</h2>
          <p>Click on the '&nbsp;<span class="dot"></span>&nbsp;' to undo the compleation. Once you mark a task as done, it will show up here.</p>
          <!--Compleated Tasks are listed here-->
          <div class="row">
            <div class="column">
              <!--Displays all compleated tasks in the inbox-->
              <h3>Inbox Tasks:</h3>
              <ul><?php foreach ($items as $item) : ?><?php if ($item['done']) : ?><li><a href="functions.php?as=taskhistoryinboxunmark&item=<?php echo $item['id'] ?>" class="done-button"><span class="dot"></span></a>&nbsp;<?php echo $item['name']; ?></li><?php endif; ?><?php endforeach; ?></ul>
            </div>
            <div class="column middle a">
              <h3>Personal Tasks:</h3>
              <ul><?php foreach ($personaltasks as $item) : ?><?php if ($item['done']) : ?><li><a href="functions.php?as=taskhistorypersonalunmark&item=<?php echo $item['id'] ?>" class="done-button"><span class="dot"></span></a>&nbsp;<?php echo $item['name']; ?></li><?php endif; ?><?php endforeach; ?></ul>
            </div>
            <div class="column middle b">
              <h3>Work Tasks:</h3>
              <ul><?php foreach ($worktasks as $item) : ?><?php if ($item['done']) : ?><li><a href="functions.php?as=taskhistoryworkunmark&item=<?php echo $item['id'] ?>" class="done-button"><span class="dot"></span></a>&nbsp;<?php echo $item['name']; ?></li><?php endif; ?><?php endforeach; ?></ul>
            </div>
            <div class="column">
              <h3>Bookmarked:</h3>
              <ul><?php foreach ($favoritetasks as $item) : ?><?php if ($item['done']) : ?><li><a href="functions.php?as=taskhistoryfavoriteunmark&item=<?php echo $item['id'] ?>" class="done-button"><span class="dot"></span></a>&nbsp;<?php echo $item['name']; ?></li><?php endif; ?><?php endforeach; ?></ul>
            </div>
          </div>
        </div>
      </div>
</body>

</html>
<style>
  @media screen and (max-width: 400px) {
    #folder-icon {
      height: 25px;
      width: 25px;
    }
  }


  @media screen and (max-width: 358px) {
    #folder-icon {
      height: 20px;
      width: 20px;
    }
  }


  @media screen and (max-width: 318px) {
    #folder-icon {
      height: 15px;
      width: 15px;
    }
  }
</style>
<style>
  @media screen and (max-width: 1750px) {
    .column {
      width: 40%;
    }

    .middle {
      height: auto;
    }

    .middle {
      border-left: transparent;
    }

    .b {
      border-right: transparent;
    }
  }

  @media screen and (max-width: 810px) {
    .column {
      width: 100%;
    }
  }
</style>