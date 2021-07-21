<?php
// Folder info
$foldersget = $db->prepare("SELECT * FROM `tasks_folders` WHERE `account` = :account");
$foldersget->execute([
  'account' => $account
]);
$folder = $foldersget->rowCount() ? $foldersget : [];

$pagefoldersget = $db->prepare("SELECT * FROM `tasks_folders` WHERE `account` = :account");
$pagefoldersget->execute([
  'account' => $account
]);
$folderpage = $pagefoldersget->rowCount() ? $pagefoldersget : [];

// Dates
$yesterday = date('M-d-Y', strtotime('-1 day'));
$today = date('M-d-Y', strtotime('+0 day'));
$one = date('M-d-Y', strtotime('+1 day'));
$two = date('M-d-Y', strtotime('+2 day'));
$three = date('M-d-Y', strtotime('+3 day'));
$four = date('M-d-Y', strtotime('+4 day'));
$five = date('M-d-Y', strtotime('+5 day'));
$six = date('M-d-Y', strtotime('+6 day'));
$seven = date('M-d-Y', strtotime('+7 day'));
$eight = date('M-d-Y', strtotime('+8 day'));
$nine = date('M-d-Y', strtotime('+9 day'));
$ten = date('M-d-Y', strtotime('+10 day'));
$eleven = date('M-d-Y', strtotime('+11 day'));
$twelve = date('M-d-Y', strtotime('+12 day'));
$thirteen = date('M-d-Y', strtotime('+13 day'));
$fourteen = date('M-d-Y', strtotime('+14 day'));
$fifteen = date('M-d-Y', strtotime('+15 day'));
$sixteen = date('M-d-Y', strtotime('+16 day'));
$seventeen = date('M-d-Y', strtotime('+17 day'));
$eightteen = date('M-d-Y', strtotime('+18 day'));
$nineteen = date('M-d-Y', strtotime('+19 day'));
$twenty = date('M-d-Y', strtotime('+20 day'));
$twentyone = date('M-d-Y', strtotime('+21 day'));
$twentytwo = date('M-d-Y', strtotime('+22 day'));
$twentythree = date('M-d-Y', strtotime('+23 day'));
$twentyfour = date('M-d-Y', strtotime('+24 day'));
$twentyfive = date('M-d-Y', strtotime('+25 day'));
$twentysix = date('M-d-Y', strtotime('+26 day'));
$twentyseven = date('M-d-Y', strtotime('+27 day'));
$twentyeight = date('M-d-Y', strtotime('+28 day'));
$twentynine = date('M-d-Y', strtotime('+29 day'));
$thirty = date('M-d-Y', strtotime('+30 day'));
$thirtyone = date('M-d-Y', strtotime('+31 day'));

// Move yesterday to today
$yesterdayitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL");
$yesterdayitemsget->execute([
  'account' => $account,
  'date' => $yesterday
]);
$yesterdayitems = $yesterdayitemsget->rowCount() ? $yesterdayitemsget : [];
foreach($yesterdayitems as $item){
  if($item['completed']=='false'){
    $idforyes = $item['tid'];

    $dateQuery = $db->prepare("
      UPDATE tasks_tasks
      SET scheduledate = :scheduledate 
      WHERE tid = :tid
      AND account = :account
    ");

    $dateQuery->execute([
      ':account' => $account,
      ':tid' => $idforyes,
      ':scheduledate' => $today
    ]);
  }
}

// Get scripts
$inboxget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$inboxget->execute([
  'account' => $account,
  'date' => "inbox"
]);
$inbox = $inboxget->rowCount() ? $inboxget : [];

$logget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account ORDER BY `datecompleted` DESC");
$logget->execute([
  'account' => $account
]);
$log = $logget->rowCount() ? $logget : [];

$todaypageget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$todaypageget->execute([
  'account' => $account,
  'date' => $today
]);
$todaypage = $todaypageget->rowCount() ? $todaypageget : [];

$zeroitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$zeroitemsget->execute([
  'account' => $account,
  'date' => $today
]);
$zeroitems = $zeroitemsget->rowCount() ? $zeroitemsget : [];

$oneitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$oneitemsget->execute([
  'account' => $account,
  'date' => $one
]);
$oneitems = $oneitemsget->rowCount() ? $oneitemsget : [];

$twoitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$twoitemsget->execute([
  'account' => $account,
  'date' => $two
]);
$twoitems = $twoitemsget->rowCount() ? $twoitemsget : [];

$threeitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$threeitemsget->execute([
  'account' => $account,
  'date' => $three
]);
$threeitems = $threeitemsget->rowCount() ? $threeitemsget : [];

$fouritemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fouritemsget->execute([
  'account' => $account,
  'date' => $four
]);
$fouritems = $fouritemsget->rowCount() ? $fouritemsget : [];

$fiveitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fiveitemsget->execute([
  'account' => $account,
  'date' => $five
]);
$fiveitems = $fiveitemsget->rowCount() ? $fiveitemsget : [];

$sixitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$sixitemsget->execute([
  'account' => $account,
  'date' => $six
]);
$sixitems = $sixitemsget->rowCount() ? $sixitemsget : [];

$sevenitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$sevenitemsget->execute([
  'account' => $account,
  'date' => $seven
]);
$sevenitems = $sevenitemsget->rowCount() ? $sevenitemsget : [];

$eightitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$eightitemsget->execute([
  'account' => $account,
  'date' => $eight
]);
$eightitems = $eightitemsget->rowCount() ? $eightitemsget : [];

$nineitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$nineitemsget->execute([
  'account' => $account,
  'date' => $nine
]);
$nineitems = $nineitemsget->rowCount() ? $nineitemsget : [];

$tenitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$tenitemsget->execute([
  'account' => $account,
  'date' => $ten
]);
$tenitems = $tenitemsget->rowCount() ? $tenitemsget : [];

$elevenitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$elevenitemsget->execute([
  'account' => $account,
  'date' => $eleven
]);
$elevenitems = $elevenitemsget->rowCount() ? $elevenitemsget : [];

$twelveitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$twelveitemsget->execute([
  'account' => $account,
  'date' => $twelve
]);
$twelveitems = $twelveitemsget->rowCount() ? $twelveitemsget : [];

$thirteenitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$thirteenitemsget->execute([
  'account' => $account,
  'date' => $thirteen
]);
$thirteenitems = $thirteenitemsget->rowCount() ? $thirteenitemsget : [];

$fourteenitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fourteenitemsget->execute([
  'account' => $account,
  'date' => $fourteen
]);
$fourteenitems = $fourteenitemsget->rowCount() ? $fourteenitemsget : [];

$fifteenitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fifteenitemsget->execute([
  'account' => $account,
  'date' => $fifteen
]);
$fifteenitems = $fifteenitemsget->rowCount() ? $fifteenitemsget : [];

$sixteenitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$sixteenitemsget->execute([
  'account' => $account,
  'date' => $sixteen
]);
$sixteenitems = $sixteenitemsget->rowCount() ? $sixteenitemsget : [];

$seventeenitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$seventeenitemsget->execute([
  'account' => $account,
  'date' => $seventeen
]);
$seventeenitems = $seventeenitemsget->rowCount() ? $seventeenitemsget : [];

$eightteenitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$eightteenitemsget->execute([
  'account' => $account,
  'date' => $eightteen
]);
$eightteenitems = $eightteenitemsget->rowCount() ? $eightteenitemsget : [];

$nineteenitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$nineteenitemsget->execute([
  'account' => $account,
  'date' => $nineteen
]);
$nineteenitems = $nineteenitemsget->rowCount() ? $nineteenitemsget : [];

$twentyitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$twentyitemsget->execute([
  'account' => $account,
  'date' => $twenty
]);
$twentyitems = $twentyitemsget->rowCount() ? $twentyitemsget : [];

$twentyoneitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$twentyoneitemsget->execute([
  'account' => $account,
  'date' => $twentyone
]);
$twentyoneitems = $twentyoneitemsget->rowCount() ? $twentyoneitemsget : [];

$twentytwoitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$twentytwoitemsget->execute([
  'account' => $account,
  'date' => $twentytwo
]);
$twentytwoitems = $twentytwoitemsget->rowCount() ? $twentytwoitemsget : [];

$twentythreeitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$twentythreeitemsget->execute([
  'account' => $account,
  'date' => $twentythree
]);
$twentythreeitems = $twentythreeitemsget->rowCount() ? $twentythreeitemsget : [];

$twentyfouritemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$twentyfouritemsget->execute([
  'account' => $account,
  'date' => $twentyfour
]);
$twentyfouritems = $twentyfouritemsget->rowCount() ? $twentyfouritemsget : [];

$twentyfiveitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$twentyfiveitemsget->execute([
  'account' => $account,
  'date' => $twentyfive
]);
$twentyfiveitems = $twentyfiveitemsget->rowCount() ? $twentyfiveitemsget : [];

$twentysixitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$twentysixitemsget->execute([
  'account' => $account,
  'date' => $twentysix
]);
$twentysixitems = $twentysixitemsget->rowCount() ? $twentysixitemsget : [];

$twentysevenitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$twentysevenitemsget->execute([
  'account' => $account,
  'date' => $twentyseven
]);
$twentysevenitems = $twentysevenitemsget->rowCount() ? $twentysevenitemsget : [];

$twentyeightitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$twentyeightitemsget->execute([
  'account' => $account,
  'date' => $twentyeight
]);
$twentyeightitems = $twentyeightitemsget->rowCount() ? $twentyeightitemsget : [];

$twentynineitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$twentynineitemsget->execute([
  'account' => $account,
  'date' => $twentynine
]);
$twentynineitems = $twentynineitemsget->rowCount() ? $twentynineitemsget : [];

$thirtyitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$thirtyitemsget->execute([
  'account' => $account,
  'date' => $thirty
]);
$thirtyitems = $thirtyitemsget->rowCount() ? $thirtyitemsget : [];

$thirtyoneitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$thirtyoneitemsget->execute([
  'account' => $account,
  'date' => $thirtyone
]);
$thirtyoneitems = $thirtyoneitemsget->rowCount() ? $thirtyoneitemsget : [];