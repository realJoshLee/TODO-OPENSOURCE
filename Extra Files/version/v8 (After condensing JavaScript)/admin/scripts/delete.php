<?php 
  include('../../init/init.php');
  require '../all.php';
  
  $addQuery = $db->prepare("
    DELETE FROM `tasks_rollout`
    WHERE `id` = :id
  ");
        
  $addQuery->execute([
    ':id' => $_GET['id']
  ]);

  header('location: ../index.php?p=rollout');