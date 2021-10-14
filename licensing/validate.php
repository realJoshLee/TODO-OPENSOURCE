<?php
require('../app/init/init-login.php');

if(isset($_POST['key'])){
  $email = $_POST['email'];
  $key = $_POST['key'];

  $dbget = "SELECT * FROM `tasks_license_keys` WHERE `emailassociated` = '$email' and `license` = '$key'";
  $conget = $conn->query($dbget);
  $keyval = mysqli_num_rows($conget);

  if($keyval=='1'){
    $getkey = $db->prepare("SELECT created, end FROM `tasks_license_keys` WHERE `emailassociated` = '$email' and `license` = '$key'");
    $getkey->execute([
    ]);
    $key = $getkey->rowCount() ? $getkey : [];

    /*$sql = "SELECT id, emailassociated, status, created, end FROM `tasks_license_keys` WHERE `emailassociated` = '$email' and `key` = '$key'";
    $result = mysqli_query($connect, $sql) or die("Error in Selecting " . mysqli_error($connect));
              
    $emparray = array();
    while($row =mysqli_fetch_assoc($result)){
      $emparray[] = $row;
    }

    $jsondata = json_encode($emparray, true);
    echo json_encode($emparray);*/
    
    foreach($key as $item){
      $now = date("Y-m-d");
      $end = $item['end'];

      if($end < $now) {
        echo '[{"status":"expired","created":"'.$item['created'].'","end":"'.$item['end'].'"}]';
      }else{
        echo '[{"status":"active","created":"'.$item['created'].'","end":"'.$item['end'].'"}]';

        $addQuery = $db->prepare("
          UPDATE `tasks_license_keys`
          SET `lastactive` = :lastactive
          WHERE `emailassociated` = :emailassociated
          AND `license` = :license
        ");
        
        $addQuery->execute([
          ':lastactive' => date("Y-m-d"),
          ':emailassociated' => $_POST['email'],
          ':license' => $_POST['key']
        ]);
      }
    }
  }else{
    echo '[{"status":"nonexistent"}]';
  }
}