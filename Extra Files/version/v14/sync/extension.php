<?php
// Allows access and gets creds.
include '../init/init-login.php';
header("Access-Control-Allow-Origin: *");

//echo $_POST['accountid'];
//echo $_POST['url'];

// Generates task id
function generateRandomString($length = 20) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}
$taskid = generateRandomString();

if(isset($_POST['accountid'])){
  // Gets the info from the db based off of the account id given.
  $accountitemsget = $db->prepare("SELECT accountid FROM `passwordlogin` WHERE `identifier` = :identifier");
  $accountitemsget->execute([
    'identifier' => $_POST['accountid']
  ]);
  $accountitems = $accountitemsget->rowCount() ? $accountitemsget : [];

  foreach($accountitems as $item){
    // Encrypts
    $urlenc = base64_encode(openssl_encrypt($_POST['url'], $method, $key, OPENSSL_RAW_DATA, $iv));

    // Sends data
    $addQuery = $db->prepare("
      INSERT INTO tasks_tasks (account, tid, name, scheduledate)
      VALUES (:account, :tid, :name, :scheduledate)
    ");
    
    $addQuery->execute([
      ':account' => $item['accountid'],
      ':name' => $urlenc,
      ':tid' => $taskid,
      ':scheduledate' => 'links'
    ]);
  }
}