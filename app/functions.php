<?php
require_once 'init.php';

if (isset($_GET['as'], $_GET['item'])) {
  $as = $_GET['as'];
  $item = $_GET['item'];

  switch ($as) {
      // Marks the task in the work section as done
    case 'workdone':
      $doneQuery = $db->prepare("
          UPDATE tasks SET done = 1
          WHERE id = :item
          AND user = :user
          ");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: work.php');
      break;

      //Deletes the task in the work page
    case 'workdelete':
      $doneQuery = $db->prepare("
          DELETE FROM tasks
          WHERE id = :item
          AND user = :user
          ");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: work.php');
      break;

      // Bookmarks the task in work table
    case 'workbookmark':
      $doneQuery = $db->prepare("
          UPDATE tasks SET folder = :folder
          WHERE id = :item
          AND user = :user
					");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id'],
        'folder' => "favorite"
      ]);
      header('Location: work.php');
      break;

      // Moves task from work to inbox
    case 'worktoinbox':
      $doneQuery = $db->prepare("
        UPDATE tasks SET folder = :folder
        WHERE id = :item
        AND user = :user
				");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id'],
        'folder' => "inbox"
      ]);
      header('Location: work.php');
      break;

      // Moves the task form work to personal
    case 'worktopersonal':
      $doneQuery = $db->prepare("
        UPDATE tasks SET folder = :folder
        WHERE id = :item
        AND user = :user
				");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id'],
        'folder' => "personal"
      ]);
      header('Location: work.php');
      break;











      // Favorite to work
    case 'favtowork':
      $doneQuery = $db->prepare("
        UPDATE tasks SET folder = :folder
        WHERE id = :item
        AND user = :user
				");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id'],
        'folder' => "work"
      ]);
      header('Location: favorite.php');
      break;

      // Favorite to personal
    case 'favtopersonal':
      $doneQuery = $db->prepare("
        UPDATE tasks SET folder = :folder
        WHERE id = :item
        AND user = :user
				");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id'],
        'folder' => "personal"
      ]);
      header('Location: favorite.php');
      break;

      // Favorite to inbox
    case 'favtoinbox':
      $doneQuery = $db->prepare("
        UPDATE tasks SET folder = :folder
        WHERE id = :item
        AND user = :user
				");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id'],
        'folder' => "inbox"
      ]);
      header('Location: favorite.php');
      break;

      // Favorite done
    case 'favdone':
      $doneQuery = $db->prepare("
					UPDATE tasks SET done = 1
					WHERE id = :item
					AND user = :user
					");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: favorite.php');
      break;

      // Favorite delete
    case 'favdelete':
      $doneQuery = $db->prepare("
          DELETE FROM tasks
          WHERE id = :item
          AND user = :user
					");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: favorite.php');
      break;










      // Inbox bookmark
    case 'inboxbookmark':
      $doneQuery = $db->prepare("
        UPDATE tasks SET folder = :folder
        WHERE id = :item
        AND user = :user
				");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id'],
        'folder' => "favorite"
      ]);
      header('Location: index.php');
      break;

      // Inbox delete
    case 'inboxdelete':
      $doneQuery = $db->prepare("
        DELETE FROM tasks
        WHERE id = :item
        AND user = :user
        ");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: index.php');
      break;

      // Inbox to personal
    case 'inboxtopersonal':
      $doneQuery = $db->prepare("
        UPDATE tasks SET folder = :folder
        WHERE id = :item
        AND user = :user
				");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id'],
        'folder' => "personal"
      ]);
      header('Location: index.php');
      break;

      // Inbox to work 
    case 'inboxtowork':
      $doneQuery = $db->prepare("
        UPDATE tasks SET folder = :folder
        WHERE id = :item
        AND user = :user
				");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id'],
        'folder' => "work"
      ]);
      header('Location: index.php');
      break;

      // Inbox done
    case 'inboxdone':
      $doneQuery = $db->prepare("
        UPDATE tasks SET done = 1
        WHERE id = :item
        AND user = :user
        ");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: index.php');
      break;










      // Peronsal bookmark
    case 'personalbookmark':
      $doneQuery = $db->prepare("
        UPDATE tasks SET folder = :folder
        WHERE id = :item
        AND user = :user
				");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id'],
        'folder' => "favorite"
      ]);
      header('Location: personal.php');
      break;

      // Peronsal done
    case 'personaldone':
      $doneQuery = $db->prepare("
      UPDATE tasks SET done = 1
      WHERE id = :item
      AND user = :user
      ");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: personal.php');
      break;

      // Personal delete
    case 'personaldelete':
      $doneQuery = $db->prepare("
        DELETE FROM tasks
        WHERE id = :item
        AND user = :user
        ");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: personal.php');
      break;

      // Personal to inbox
    case 'personaltoinbox':
      $doneQuery = $db->prepare("
        UPDATE tasks SET folder = :folder
        WHERE id = :item
        AND user = :user
				");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id'],
        'folder' => "inbox"
      ]);
      header('Location: personal.php');
      break;

      // Personal to work
    case 'personaltowork':
      $doneQuery = $db->prepare("
        UPDATE tasks SET folder = :folder
        WHERE id = :item
        AND user = :user
				");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id'],
        'folder' => "work"
      ]);
      header('Location: personal.php');
      break;










      // Task history work unmark
    case 'taskhistoryworkunmark':
      $doneQuery = $db->prepare("
					UPDATE tasks SET done = 0
					WHERE id = :item
					AND user = :user
					");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: task-history.php');
      break;

      // Task history personal unmark
    case 'taskhistorypersonalunmark':
      $doneQuery = $db->prepare("
        UPDATE tasks SET done = 0
        WHERE id = :item
        AND user = :user
        ");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: task-history.php');
      break;

      // Task history favorite unmark
    case 'taskhistoryfavoriteunmark':
      $doneQuery = $db->prepare("
					UPDATE tasks SET done = 0
					WHERE id = :item
					AND user = :user
					");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: task-history.php');
      break;

      // Task history inbox unmark
    case 'taskhistoryinboxunmark':
      $doneQuery = $db->prepare("
        UPDATE tasks SET done = 0
        WHERE id = :item
        AND user = :user
        ");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: task-history.php');
      break;









      // All listing done
    case 'alldone':
      $doneQuery = $db->prepare("
      UPDATE tasks SET done = 1
      WHERE id = :item
      AND user = :user
      ");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: all.php');
      break;

      // All listing delete
    case 'alldelete':
      $doneQuery = $db->prepare("
        DELETE FROM tasks
        WHERE id = :item
        AND user = :user
        ");

      $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: all.php');
      break;
  }
}