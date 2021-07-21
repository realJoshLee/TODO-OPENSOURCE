<?php
include('../init/init.php');

$rolloutsel = "SELECT * FROM `tasks_rollout` WHERE users = '$account' AND `tag` = 'beta'";
$rolloutanalize = $conn->query($rolloutsel);
$rolloutfinal = mysqli_num_rows($rolloutanalize);

if($rolloutfinal=='1'){
  $rolloutget = $db->prepare("SELECT * FROM `tasks_rollout` WHERE users = :account AND tag = 'beta'");
  $rolloutget->execute([
    ':account' => $account
  ]);
  $rollout = $rolloutget->rowCount() ? $rolloutget : [];

  foreach($rollout as $item){
    echo $item['tag'];
  }
}else {
  $rolloutget = $db->prepare("SELECT * FROM `tasks_rollout` WHERE users = :all AND tag = 'stable'");
  $rolloutget->execute([
    ':all' => 'all'
  ]);
  $rollout = $rolloutget->rowCount() ? $rolloutget : [];

  foreach($rollout as $item){
    echo $item['tag'];
  }
}