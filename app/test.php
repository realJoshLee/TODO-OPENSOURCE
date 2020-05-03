<?php
// Calls the database connection file
require_once('init.php');
include('css/fonts.php');
include('css/theme-light.php');
include('js/script.php');

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
<h2><?php echo $folderbrowser; ?></h2>

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
            <form class="inline" id="task-form" method="post" action="actions.php?action=taskupdate">
              <input onchange="this.form.submit()" name="tasktext" class="task-box" value="<?php echo $item['name']; ?>">
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
<?php } ?>