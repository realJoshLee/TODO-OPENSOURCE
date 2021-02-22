<?php
// Gets the init file
include('init.php');

// Adds everything to the db
if(isset($_GET['noteid'])){
  $titleenc = base64_encode(openssl_encrypt($_POST['notename'], $method, $key, OPENSSL_RAW_DATA, $iv));

  $addQuery = $db->prepare("
    INSERT INTO taskable_notes (account, noteid, title)
    VALUES (:account, :noteid, :title)
  ");

  $addQuery->execute([
    ':account' => $account,
    ':title' => $titleenc,
    ':noteid' => $_GET['noteid']
  ]);

  $logquery = $db->prepare("
    INSERT INTO taskable_log (account, item)
    VALUES (:account, :item)
  ");
  $logstatement = 'User: '.$account.' : Added a note. NoteID: '.$_GET['noteid'].'';
  $logquery->execute([
    ':account' => $account,
    ':item' => $logstatement
  ]);
}
?>