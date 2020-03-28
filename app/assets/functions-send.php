<?php
require_once 'init.php';

if (isset($_GET['as'], $_POST['name'], $_GET['item'])) {
  $as = $_GET['as'];
  $item = $_GET['item'];

  switch ($as) { // Sending function for the index.
    case 'indexsend':
      if (!empty($name)) {
        $doneQuery = $db->prepare("
          UPDATE tasks SET folder = :folder
          WHERE id = :item;
          UPDATE tasks SET user = :user
          ");

        $doneQuery->execute([
          'item' => $item,
          'folder' => "sent",
          'user' => $_POST['name']
        ]);
      }
      header('Location: index.php');
      break;

      //Sending function for the work page
    case 'worksend':
      if (!empty($name)) {
        $doneQuery = $db->prepare("
          UPDATE tasks SET folder = :folder
          WHERE id = :item;
          UPDATE tasks SET user = :user
          ");

        $doneQuery->execute([
          'item' => $item,
          'folder' => "sent",
          'user' => $_POST['name']
        ]);
      }
      header('Location: work.php');
      break;

      // Sending function for the personal page.
    case 'personalsend':
      if (!empty($name)) {
        $doneQuery = $db->prepare("
            UPDATE tasks SET folder = :folder
            WHERE id = :item;
            UPDATE tasks SET user = :user
            ");

        $doneQuery->execute([
          'item' => $item,
          'folder' => "sent",
          'user' => $_POST['name']
        ]);
      }
      header('Location: personal.php');
      break;
  }
}