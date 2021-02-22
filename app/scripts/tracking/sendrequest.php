<?php
// Gets the init file
include('../init.php');

// All of the functions
if(isset($_GET['a'])){
  $action = $_GET['a'];

  switch ($action) {
    // Changes the theme
    case "appload":
      $logquery = $db->prepare("
        INSERT INTO taskable_log (item, cfdata)
        VALUES (:item, :cfdata)
      ");

      $logstatement = 'App Loaded';

      $logquery->execute([
        ':item' => $logstatement,
        ':cfdata' => $_GET['cfdata']
      ]);
      break;
  }
} else {
  echo 'Action not set<br>';
}