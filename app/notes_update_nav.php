<?php
  require_once 'init.php';

  if(isset($_POST['notes'])){
    $notes = base64_encode(openssl_encrypt($_POST['notes'], $method, $key, OPENSSL_RAW_DATA, $iv));

    $doneQuery = $db->prepare("
      UPDATE tasks SET notes = :notes
      WHERE id = :id
      AND account = :account
    ");

    $doneQuery->execute([
      'id' => $_GET['item'],
      'notes' => $notes,
      'account' => $account
    ]);
    header('Location: ' . $_SERVER['HTTP_REFERER'].'#top');
  }
?>