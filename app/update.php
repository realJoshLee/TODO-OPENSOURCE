<?php
  require_once 'init.php';
  $today = date('M.d.Y', strtotime('+0 day'));
  $doneQuery = $db->prepare("UPDATE 'tasks' SET 'date' = :date WHERE 'id' = :id");

  $doneQuery->execute([
    'id' => $_GET['as'],
    'date' => $today
  ]);
  header('Location: index.php#top');