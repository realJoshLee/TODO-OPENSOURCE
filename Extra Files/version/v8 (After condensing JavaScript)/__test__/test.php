<?php
include('init/init.php');
$onedate = date('M.d.Y', strtotime('+0 day'));
$todaypageget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date ORDER BY `priority` ASC");
$todaypageget->execute([
  'account' => $account,
  'date' => $onedate
]);
$todaypage = $todaypageget->rowCount() ? $todaypageget : [];
foreach($todaypage as $item){
  echo $item['notes'];
  $notesdec = openssl_decrypt(base64_decode('XlOmZHuDdTjxgrBdyTDjZw'), $method, $key, OPENSSL_RAW_DATA, $iv);
  echo $notesdec;
}