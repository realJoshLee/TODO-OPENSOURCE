<?php 
  include('../../app/init/init.php');
  require '../all.php';
  
  $addQuery = $db->prepare("
    UPDATE tasks_folders SET sharedone = NULL;
    UPDATE tasks_folders SET sharedtwo = NULL;
    UPDATE tasks_folders SET sharedthree = NULL;
    UPDATE tasks_folders SET sharedfour = NULL;
    UPDATE tasks_folders SET sharedfive = NULL;
  ");
        
  $addQuery->execute([
  ]);

  header('location: ../index.php?p=main');