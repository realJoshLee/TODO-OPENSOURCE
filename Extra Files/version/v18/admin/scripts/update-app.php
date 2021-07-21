<?php
  include('../../init/init.php');
  require '../all.php';

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
    UPDATE `tasks_config` SET `ipwhitelist` = :ipwhitelist WHERE content = 'main_settings';
    UPDATE `tasks_config` SET `ipwhitelistval` = :ipwhitelistval WHERE content = 'main_settings';
    UPDATE `tasks_config` SET `contactemail` = :contactemail WHERE content = 'main_settings';
    UPDATE `tasks_config` SET `rootwebsite` = :rootwebsite WHERE content = 'main_settings';
    UPDATE `tasks_config` SET `fromemail` = :fromemail WHERE content = 'main_settings';
    UPDATE `tasks_config` SET `fromname` = :fromname WHERE content = 'main_settings';
    UPDATE `tasks_config` SET `apipublic` = :apipublic WHERE content = 'main_settings';
    UPDATE `tasks_config` SET `apiprivate` = :apiprivate WHERE content = 'main_settings';
  ");

  $appquery->execute([
    ':whitelist' => $_POST['whitelist'],
    ':magiclink' => $_POST['magiclink'],
    ':verification' => $_POST['verification'],
    ':logpage' => $_POST['logpage'],
    ':sharepage' => $_POST['sharepage'],
    ':accountcreate' => $_POST['accountcreate'],
    ':bugreport' => $_POST['bugreport'],
    ':theme' => $_POST['theme'],
    ':dataexport' => $_POST['dataexport'],
    ':dataappexport' => $_POST['dataappexport'],
    ':dataloginexport' => $_POST['dataloginexport'],
    ':errorreporting' => $_POST['errorreporting'],
    ':reminderemail' => $_POST['reminderemail'],
    ':ipwhitelist' => $_POST['ipwhitelist'],
    ':ipwhitelistval' => $_POST['ipwhitelistval'],
    ':contactemail' => $_POST['contactemail'],
    ':rootwebsite' => $_POST['rootwebsite'],
    ':fromemail' => $_POST['fromemail'],
    ':fromname' => $_POST['fromname'],
    ':apipublic' => $_POST['apipublic'],
    ':apiprivate' => $_POST['apiprivate']
  ]);

  header('Location: ../index.php?p=settings');