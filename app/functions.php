<?php
require_once 'init.php';

$tz = 'America/Detroit';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz));
$dt->setTimestamp($timestamp);
$today = $dt->format('D');
$day = $dt->format('M.d.Y');
$date = $dt->format('D');

$todaynav = $dt->format('DMdY');

if (isset($_GET['action'], $_GET['item'])) {
  $action = $_GET['action'];
  $id = $_GET['item'];

  switch ($action) {
    // Marks the task as done.
    case 'mark':
      $doneQuery = $db->prepare("
        UPDATE todotasks SET done = 1
        WHERE id = :id
        AND user = :user
      ");

      $doneQuery->execute([
        'id' => $id,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;

    // Removes task from folder
    case 'removefolderitem':
      $doneQuery = $db->prepare("
        UPDATE todotasks SET folder = 'none'
        WHERE user = :user
        AND id = :id;
        UPDATE todotasks SET day = :day
        WHERE user = :user
        AND id = :id
      ");

      $doneQuery->execute([
        'day' => $todaynav,
        'user' => $_SESSION['user_id'],
        'id' => $id
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;

    // Applies theme
    case 'lighttheme':
      $doneQuery = $db->prepare("
        UPDATE users SET theme = 'light'
        WHERE username = :user
      ");

      $doneQuery->execute([
        'user' => $_SESSION['user_id']
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;

    // Applies star
    case 'staradd':
      $doneQuery = $db->prepare("
        UPDATE todotasks SET special = 'star'
        WHERE user = :user
        AND id = :id
      ");

      $doneQuery->execute([
        'user' => $_SESSION['user_id'],
        'id' => $id
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;

    // Removes star
    case 'starremove':
      $doneQuery = $db->prepare("
        UPDATE todotasks SET special = 'none'
        WHERE user = :user
        AND id = :id
      ");

      $doneQuery->execute([
        'user' => $_SESSION['user_id'],
        'id' => $id
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;

    // Applies theme
    case 'darktheme':
      $doneQuery = $db->prepare("
        UPDATE users SET theme = 'dark'
        WHERE username = :user
      ");

      $doneQuery->execute([
        'user' => $_SESSION['user_id']
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;

    // Moves task to sunday
    case 'sunday':
      $doneQuery = $db->prepare("
        UPDATE todotasks SET day = 'sun'
        WHERE id = :id
        AND user = :user
      ");

      $doneQuery->execute([
        'id' => $id,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;

    // Moves task to monday
    case 'monday':
      $doneQuery = $db->prepare("
        UPDATE todotasks SET day = 'mon'
        WHERE id = :id
        AND user = :user
      ");

      $doneQuery->execute([
        'id' => $id,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;

    // Moves task to tuesday
    case 'tuesday':
      $doneQuery = $db->prepare("
        UPDATE todotasks SET day = 'tue'
        WHERE id = :id
        AND user = :user
      ");

      $doneQuery->execute([
        'id' => $id,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;

    // Moves task to wednesday
    case 'wednesday':
      $doneQuery = $db->prepare("
        UPDATE todotasks SET day = 'wed'
        WHERE id = :id
        AND user = :user
      ");

      $doneQuery->execute([
        'id' => $id,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;

    // Moves task to thursday
    case 'thursday':
      $doneQuery = $db->prepare("
        UPDATE todotasks SET day = 'thu'
        WHERE id = :id
        AND user = :user
      ");

      $doneQuery->execute([
        'id' => $id,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;

    // Moves task to friday
    case 'friday':
      $doneQuery = $db->prepare("
        UPDATE todotasks SET day = 'fri'
        WHERE id = :id
        AND user = :user
      ");

      $doneQuery->execute([
        'id' => $id,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;

    // Moves task to saturday
    case 'saturday':
      $doneQuery = $db->prepare("
        UPDATE todotasks SET day = 'sat'
        WHERE id = :id
        AND user = :user
      ");

      $doneQuery->execute([
        'id' => $id,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;

    // Deletes task
    case 'delete':
      $doneQuery = $db->prepare("
        DELETE FROM todotasks
        WHERE id = :id
        AND user = :user
      ");

      $doneQuery->execute([
        'id' => $id,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;

    // Deletes folder
    case 'deletefolder':
      $doneQuery = $db->prepare("
        DELETE FROM todofolders
        WHERE foldername = :id
        AND user = :user
      ");

      $doneQuery->execute([
        'id' => $id,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: index.php?page=all');
      break;

    // Makes priority 1
    case 'priorityone':
      $doneQuery = $db->prepare("
        UPDATE todotasks SET priority = '1'
        WHERE id = :id
        AND user = :user
      ");

      $doneQuery->execute([
        'id' => $id,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;

    // Makes priority 2
    case 'prioritytwo':
      $doneQuery = $db->prepare("
        UPDATE todotasks SET priority = '2'
        WHERE id = :id
        AND user = :user
      ");

      $doneQuery->execute([
        'id' => $id,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;

    // Makes priority 3
    case 'prioritythree':
      $doneQuery = $db->prepare("
        UPDATE todotasks SET priority = '3'
        WHERE id = :id
        AND user = :user
      ");

      $doneQuery->execute([
        'id' => $id,
        'user' => $_SESSION['user_id']
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;
  }
}
?>