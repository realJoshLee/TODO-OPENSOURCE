<?php
  include('../../init/init.php');
  require '../all.php';

  if($_POST['confirmdefaults']=='true'){
    $appquery = $db->prepare("
      UPDATE `tasks_config` SET `whitelist` = :whitelist WHERE content = 'main_settings';
      UPDATE `tasks_config` SET `magic_link` = :magiclink WHERE content = 'main_settings';
      UPDATE `tasks_config` SET `verification` = :verification WHERE content = 'main_settings';
      UPDATE `tasks_config` SET `logpage` = :logpage WHERE content = 'main_settings';
      UPDATE `tasks_config` SET `sharepage` = :sharepage WHERE content = 'main_settings';
      UPDATE `tasks_config` SET `accountcreate` = :accountcreate WHERE content = 'main_settings';
      UPDATE `tasks_config` SET `bugreport` = :bugreport WHERE content = 'main_settings';
      UPDATE `tasks_config` SET `theme` = :theme WHERE content = 'main_settings';
      UPDATE `tasks_config` SET `dataexport` = :dataexport WHERE content = 'main_settings';
      UPDATE `tasks_config` SET `dataappexport` = :dataappexport WHERE content = 'main_settings';
      UPDATE `tasks_config` SET `dataloginexport` = :dataloginexport WHERE content = 'main_settings';
      UPDATE `tasks_config` SET `errorreporting` = :errorreporting WHERE content = 'main_settings';
      UPDATE `tasks_config` SET `reminderemail` = :reminderemail WHERE content = 'main_settings';
      UPDATE `tasks_config` SET `contactemail` = :contactemail WHERE content = 'main_settings';
      UPDATE `tasks_config` SET `rootwebsite` = :rootwebsite WHERE content = 'main_settings';
      UPDATE `tasks_config` SET `fromemail` = :fromemail WHERE content = 'main_settings';
      UPDATE `tasks_config` SET `fromname` = :fromname WHERE content = 'main_settings';
      UPDATE `tasks_config` SET `apipublic` = :apipublic WHERE content = 'main_settings';
      UPDATE `tasks_config` SET `apiprivate` = :apiprivate WHERE content = 'main_settings';
    ");

    $appquery->execute([
      ':whitelist' => 'false',
      ':magiclink' => 'false',
      ':verification' => 'false',
      ':logpage' => 'true',
      ':sharepage' => 'true',
      ':accountcreate' => 'true',
      ':bugreport' => 'true',
      ':theme' => 'true',
      ':dataexport' => 'true',
      ':dataappexport' => 'true',
      ':dataloginexport' => 'true',
      ':errorreporting' => 'false',
      ':reminderemail' => 'false',
      ':contactemail' => 'contact@example.com',
      ':rootwebsite' => 'tasks.example.com',
      ':fromemail' => 'no-reply@example.com',
      ':fromname' => 'no-reply',
      ':apipublic' => 'na',
      ':apiprivate' => 'na'
    ]);

    header('Location: ../index.php?p=settings');
  }else{
    header('Location: ../index.php?p=settings');
  }