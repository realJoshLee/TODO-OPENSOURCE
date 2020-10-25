<?php
require_once 'init.php';

  if (isset($_GET['as'], $_GET['item'])) {
    $as = $_GET['as'];
    $id = $_GET['item'];

    switch ($as) {
      // Marks the task as done.
      case 'complete':
        $doneQuery = $db->prepare("
          UPDATE tasks SET completed = 'true'
          WHERE id = :id
          AND account = :account
        ");

        $doneQuery->execute([
          'id' => $id,
          'account' => $account
        ]);
        header('Location: ' . $_SERVER['HTTP_REFERER'].'#top');
        break;

      // Marks the task as undone.
      case 'uncomplete':
        $doneQuery = $db->prepare("
          UPDATE tasks SET completed = 'false'
          WHERE id = :id
          AND account = :account
        ");

        $doneQuery->execute([
          'id' => $id,
          'account' => $account
        ]);
        header('Location: ' . $_SERVER['HTTP_REFERER'].'#top');
        break;

      // Deletes task
      case 'trash':
        $doneQuery = $db->prepare("
          DELETE FROM tasks
          WHERE id = :id
          AND account = :account
        ");

        $doneQuery->execute([
          'id' => $id,
          'account' => $account
        ]);
        header('Location: index.php');
        break;

      // Highlights task
      case 'highlight':
        $doneQuery = $db->prepare("
          UPDATE tasks SET highlight = 'true'
          WHERE id = :id
          AND account = :account
        ");

        $doneQuery->execute([
          'id' => $id,
          'account' => $account
        ]);
        header('Location: ' . $_SERVER['HTTP_REFERER'].'#top');
        break;

      // Unhighlights task
      case 'unhighlight':
        $doneQuery = $db->prepare("
          UPDATE tasks SET highlight = 'false'
          WHERE id = :id
          AND account = :account
        ");

        $doneQuery->execute([
          'id' => $id,
          'account' => $account
        ]);
        header('Location: ' . $_SERVER['HTTP_REFERER'].'#top');
        break;

      // Pins task
      case 'pin':
        $doneQuery = $db->prepare("
          UPDATE tasks SET pin = 'true'
          WHERE id = :id
          AND account = :account
        ");

        $doneQuery->execute([
          'id' => $id,
          'account' => $account
        ]);
        header('Location: ' . $_SERVER['HTTP_REFERER'].'#top');
        break;

      // Unpins task
      case 'unpin':
        $doneQuery = $db->prepare("
          UPDATE tasks SET pin = 'false'
          WHERE id = :id
          AND account = :account
        ");

        $doneQuery->execute([
          'id' => $id,
          'account' => $account
        ]);
        header('Location: ' . $_SERVER['HTTP_REFERER'].'#top');
        break;

      // Dark Theme
      case 'darktheme':
        $doneQuery = $db->prepare("
          UPDATE passwordlogin SET theme = 'dark'
          WHERE username = :account
        ");

        $doneQuery->execute([
          'account' => $account
        ]);
        header('Location: ' . $_SERVER['HTTP_REFERER'].'#top');
        break;

      // Light Theme
      case 'lighttheme':
        $doneQuery = $db->prepare("
          UPDATE passwordlogin SET theme = 'default'
          WHERE username = :account
        ");

        $doneQuery->execute([
          'account' => $account
        ]);
        header('Location: ' . $_SERVER['HTTP_REFERER'].'#top');
        break;











      // Color changes
      case 'default':
        $doneQuery = $db->prepare("
          UPDATE tasks SET color = '#d1d3d5'
          WHERE id = :id
          AND account = :account;
          UPDATE tasks SET bgcolor = 'transparent'
          WHERE id = :id
          AND account = :account
        ");

        $doneQuery->execute([
          'id' => $id,
          'account' => $account
        ]);
        header('Location: ' . $_SERVER['HTTP_REFERER'].'#top');
        break;
        
      case 'red':
        $doneQuery = $db->prepare("
          UPDATE tasks SET color = '#ff006a'
          WHERE id = :id
          AND account = :account;
          UPDATE tasks SET bgcolor = '#fccce1'
          WHERE id = :id
          AND account = :account
        ");

        $doneQuery->execute([
          'id' => $id,
          'account' => $account
        ]);
        header('Location: ' . $_SERVER['HTTP_REFERER'].'#top');
        break;
        
      case 'green':
        $doneQuery = $db->prepare("
          UPDATE tasks SET color = '#00ff26'
          WHERE id = :id
          AND account = :account;
          UPDATE tasks SET bgcolor = '#dbffe1'
          WHERE id = :id
          AND account = :account
        ");

        $doneQuery->execute([
          'id' => $id,
          'account' => $account
        ]);
        header('Location: ' . $_SERVER['HTTP_REFERER'].'#top');
        break;
        
      case 'blue':
        $doneQuery = $db->prepare("
          UPDATE tasks SET color = '#006fff'
          WHERE id = :id
          AND account = :account;
          UPDATE tasks SET bgcolor = '#cfe4ff'
          WHERE id = :id
          AND account = :account
        ");

        $doneQuery->execute([
          'id' => $id,
          'account' => $account
        ]);
        header('Location: ' . $_SERVER['HTTP_REFERER'].'#top');
        break;
        
      case 'orange':
        $doneQuery = $db->prepare("
          UPDATE tasks SET color = '#ff5900'
          WHERE id = :id
          AND account = :account;
          UPDATE tasks SET bgcolor = '#ffe3d4'
          WHERE id = :id
          AND account = :account
        ");

        $doneQuery->execute([
          'id' => $id,
          'account' => $account
        ]);
        header('Location: ' . $_SERVER['HTTP_REFERER'].'#top');
        break;
    }
  }
?>