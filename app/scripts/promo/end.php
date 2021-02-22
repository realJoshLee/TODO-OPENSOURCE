<?php
  include('../init.php');

  $preminumendget = $db->prepare("SELECT * FROM passwordlogin WHERE username = :username");
  $preminumendget->execute([
    'username' => $account
  ]);
  $preminumend = $preminumendget->rowCount() ? $preminumendget : []; 

  foreach($preminumend as $item){
    $date = date('Y-m-d', strtotime('+0 day'));
    
    if($item['preminumend']==$date){
      $addQuery = $db->prepare("
        UPDATE passwordlogin SET preminum = :status WHERE username = :account;
        UPDATE passwordlogin SET preminumend = :end WHERE username = :account;
      ");

      $addQuery->execute([
        ':account' => $account,
        ':status' => 'false',
        ':end' => ''
      ]);
    }
  }