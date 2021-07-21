<?php
// Main stuff
require_once '../init/init.php';
require 'all.php';

$preminumget = $db->prepare("SELECT * FROM `passwordlogin` WHERE `username` = :account");
$preminumget->execute([
  'account' => $account
]);
$preminum = $preminumget->rowCount() ? $preminumget : [];
foreach($preminum as $item){
  if($item['admin']=='true'){
  }else{
    header('Location: ../index.php');
  }
}

if($dataexporten=='false'){
  header('Location: index.php?p=main');
}

if(isset($_GET['aid'])){
  $aid = $_GET['aid'];
  echo 'Data export for Account ID: '.$aid;
  echo '<br>';
  echo '<br>';

  $accountget = $db->prepare("SELECT * FROM `passwordlogin` WHERE `accountid` = :aid");
  $accountget->execute([
    'aid' => $aid
  ]);
  $account = $accountget->rowCount() ? $accountget : [];

  $logget = $db->prepare("SELECT * FROM `tasks_log` WHERE `account` = :aid");
  $logget->execute([
    'aid' => $aid
  ]);
  $log = $logget->rowCount() ? $logget : [];

  $folderget = $db->prepare("SELECT * FROM `tasks_folders` WHERE `account` = :aid");
  $folderget->execute([
    'aid' => $aid
  ]);
  $folders = $folderget->rowCount() ? $folderget : [];

  $tasksget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :aid");
  $tasksget->execute([
    'aid' => $aid
  ]);
  $tasks = $tasksget->rowCount() ? $tasksget : [];

  // Account
  echo '<h2>Account Data</h2>';
  foreach($account as $item){
    echo '<strong>Name (F L):</strong> '.$item['firstname'].' '.$item['lastname'].'<br>';
    echo '<strong>Username/Email:</strong> '.$item['username'].'<br>';
    echo '<strong>Account ID:</strong> '.$item['accountid'].'<br>';
    echo '<strong>Recovery Code:</strong> '.$item['recovery'].'<br>';
    echo '<strong>Session ID:</strong> '.$item['sessionid'].'<br>';
    echo '<strong>Token:</strong> '.$item['token'].'<br>';
    echo '<strong>Timezone:</strong> '.$item['timezone'].'<br>';
    echo '<strong>Verified:</strong> '.$item['verified'].'<br>';
    echo '<strong>Status:</strong> '.$item['status'].'<br>';
    echo '<strong>Theme:</strong> '.$item['theme'].'<br>';
    echo '<strong>Preminum:</strong> '.$item['preminum'].'<br>';
    echo '<strong>Admin:</strong> '.$item['admin'].'<br>';
    echo '<strong>Created:</strong> '.$item['created'].'<br>';
  }

  echo '<br><hr><br>';

  // Folders
  echo '<h2>Folders Data</h2>';
  foreach($folders as $item){
    echo '<div class="data-obj">';
    echo '<strong>Created:</strong> '.$item['created'].'&nbsp;&nbsp;';
    echo '<strong>Folder ID:</strong> '.$item['fid'].'&nbsp;&nbsp;';
    echo '<strong>Name:</strong> '.$item['name'].'&nbsp;&nbsp;';
    echo '</div>';
  }

  echo '<br><hr><br>';

  // Tasks
  echo '<h2>Tasks Data</h2>';
  foreach($tasks as $item){
    echo '<div class="data-obj">';
    echo '<strong>Task ID:</strong> '.$item['tid'].'&nbsp;&nbsp;';
    echo '<strong>Parent Task ID:</strong> '.$item['parenttid'].'&nbsp;&nbsp;';
    echo '<strong>Folder ID:</strong> '.$item['folderid'].'&nbsp;&nbsp;';
    echo '<strong>Name:</strong> '.$item['name'].'&nbsp;&nbsp;';
    echo '<strong>Notes:</strong> '.$item['Notes'].'&nbsp;&nbsp;';
    echo '<strong>Scheduled:</strong> '.$item['scheduled'].'&nbsp;&nbsp;';
    echo '<strong>Complteed:</strong> '.$item['completed'].'&nbsp;&nbsp;';
    echo '<strong>Date Compleated:</strong> '.$item['dateshowcomplete'].'&nbsp;&nbsp;';
    echo '</div>';
  }

  echo '<br><hr><br>';

  // Log
  echo '<h2>Log Data</h2>';
  foreach($log as $item){
    echo '<div class="data-obj">';
    echo '<strong>Date:</strong> '.$item['date'].'&nbsp;&nbsp;';
    echo '<strong>Content:</strong> '.$item['content'].'&nbsp;&nbsp;';
    echo '<strong>CFdata:</strong> '.$item['cfdata'].'&nbsp;&nbsp;';
    echo '<strong>Login IP:</strong> '.$item['loginip'].'&nbsp;&nbsp;';
    echo '<strong>Login Device:</strong> '.$item['logindevice'].'&nbsp;&nbsp;';
    echo '<strong>Login OS:</strong> '.$item['loginos'].'&nbsp;&nbsp;';
    echo '<strong>Login Browser:</strong> '.$item['loginbrowser'].'&nbsp;&nbsp;';
    echo '</div>';
  }
}
?>
<style>
  html, body {
    font-family: Arial;
    font-size: 12px;
  }

  .data-obj {
    border: 1px solid grey;
    padding: 2px;
    margin-bottom: 5px;
  }
</style>