<?php
  include('../../init/init.php');
  require '../all.php';

  if($_POST['confirmlogclear']=='true'){
    $appquery = $db->prepare("
      DELETE FROM `tasks_log`;
    ");

    $appquery->execute([
    ]);

    header('Location: ../index.php?p=settings');
  }else{
    header('Location: ../index.php?p=settings');
  }