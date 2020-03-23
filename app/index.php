<?php
  error_reporting(0);
  ?>

<?php  
  session_start();
  if(!isset($_SESSION["username"]))  
  {  
    header("location:../index.php?action=login");  
  }
  ?>
  
<?php
  require_once 'init.php';

  $itemsQuery = $db->prepare("SELECT id, name, done FROM tasks WHERE user = :user AND folder = :folder");

  $itemsQuery->execute([
    'user' => $_SESSION['user_id'],
    'folder' => "inbox"
    ]);

  $items = $itemsQuery->rowCount() ? $itemsQuery : [];
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
    <link rel="stylesheet" href="css/tasks.css">
    <script src="js/tasks.js"></script>
	</head>
	<body>

		<!--Body-->
		<div class="body">
      <!--Settings and task view container-->
      <div class="row">
        <!--Settings and nav-->
        <div id="settings" class="column">
          <!--Folder Selection-->
          <div class="folders">
            <a href="all.php" class="folder-link-button left"><img src="assets/images/globe-707070.svg" id="folder-icon" class="inbox-button"></a>
            <a href="index.php" class="folder-link-button left"><img src="assets/images/inbox-active.svg" id="folder-icon" class="inbox-button"></a>
            <a href="personal.php" class="folder-link-button" id="personal-link"><img src="assets/images/user-707070.svg" id="folder-icon" class="personal-button"></a>
            <a href="work.php" class="folder-link-button"><img src="assets/images/work-707070.svg" id="folder-icon" class="work-button"></a>
            <a href="task-history.php" class="folder-link-button"><img src="assets/images/checkmark-707070.svg" id="folder-icon" class="done-button"></a>
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
          </div>
          <hr class="nav-bottom">
        </div>
        
        <!--Tasks-->
        <div id="task-lists" class="column">
          <!--Header Title-->
          <h2 class="header">Inbox:</h2>

          <!--Where the tasks are listed-->
          <?php if(!empty($items)): ?>
          <ul id="myul" class="items">
            <?php foreach($items as $item): ?><?php if (!$item['done']):?><li><a href="functions.php?as=inboxdone&item=<?php echo $item['id'] ?>" class="done-button"><span class="dot"></span></a>&nbsp;<div class="task-dropdown"><!--Button to show more in the task dropdown--><button class="task-dropbtn"><!--More image--><img src="assets/images/more-707070.svg" class="more"></button><div class="task-dropdown-content"><!--Personal move--><a href="functions.php?as=inboxtopersonal&item=<?php echo $item['id'] ?>" class="done-button"><img src="assets/images/user-active.svg" id="bookmark" height="15px" width="15px"></a><!--Work move--><a href="functions.php?as=inboxtowork&item=<?php echo $item['id'] ?>" class="done-button"><img src="assets/images/work-active.svg" id="bookmark" height="15px" width="15px"></a><!--Bookmark--><a href="functions.php?as=inboxbookmark&item=<?php echo $item['id'] ?>" class="done-button"><img src="assets/images/bookmark-active.svg" id="bookmark" height="15px" width="15px"></a><!--Delete task--><a href="functions.php?as=inboxdelete&item=<?php echo $item['id'] ?>" class="done-button"><img src="assets/images/trash-warn.svg" id="bookmark" height="15px" width="15px"></a></div></div>&nbsp;<span class="item<?php echo $item['done'] ? 'done' : '' ?>"><?php echo $item['name']; ?></span></li><?php endif; ?><?php endforeach; ?>
          </ul>
          <?php else: ?>
            <!--What is shown when there aren't any items in the list-->
            <p>There aren't any tasks in your inbox. Add some below to get started.</p>
          <?php endif; ?>

          <!--The form where you add a task-->
          <form class="item-add" action="index-add.php" method="post">
            <input type="text" name="name" placeholder="Type a new item here." class="task" autocomplete="off" required autofocus>
            <input type="submit" value="Add" class="submit">
          </form>
        </div>
      </div>
      
		</div>
	</body>
</html>