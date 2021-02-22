<?php
  // Gets the init file
  include('init.php');
  
  $titleenc = base64_encode(openssl_encrypt($_POST['notetitle'], $method, $key, OPENSSL_RAW_DATA, $iv));
  $contentend = base64_encode(openssl_encrypt($_POST['notecontent'], $method, $key, OPENSSL_RAW_DATA, $iv));

  // Adds everything to the db
  $addQuery = $db->prepare("
    UPDATE taskable_notes
    SET title = :title
    WHERE noteid = :noteid
    AND account = :account;
    UPDATE taskable_notes
    SET content = :content
    WHERE noteid = :noteid
    AND account = :account
  ");

  $addQuery->execute([
    ':account' => $account,
    ':noteid' => $_GET['noteid'],
    ':title' => $titleenc,
    ':content' => $contentend
  ]);

?>
