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

$sharedfolderget = $db->prepare("SELECT * FROM `tasks_folders` WHERE `sharedone` = :account");
$sharedfolderget->execute([
  'account' => $accountemail
]);
$sharedfolders = $sharedfolderget->rowCount() ? $sharedfolderget : [];

$sharedfolderpageget = $db->prepare("SELECT * FROM `tasks_folders` WHERE `sharedone` = :account");
$sharedfolderpageget->execute([
  'account' => $accountemail
]);
$sharedfolderpage = $sharedfolderpageget->rowCount() ? $sharedfolderpageget : [];

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
$thirtytwo = date('M-d-Y', strtotime('+32 day'));
$thirtythree = date('M-d-Y', strtotime('+33 day'));
$thirtyfour = date('M-d-Y', strtotime('+34 day'));
$thirtyfive = date('M-d-Y', strtotime('+35 day'));
$thirtysix = date('M-d-Y', strtotime('+36 day'));
$thirtyseven = date('M-d-Y', strtotime('+37 day'));
$thirtyeight = date('M-d-Y', strtotime('+38 day'));
$thirtynine = date('M-d-Y', strtotime('+39 day'));


$forty = date('M-d-Y', strtotime('+40 day'));
$fortyone = date('M-d-Y', strtotime('+41 day'));
$fortytwo = date('M-d-Y', strtotime('+42 day'));
$fortythree = date('M-d-Y', strtotime('+43 day'));
$fortyfour = date('M-d-Y', strtotime('+44 day'));
$fortyfive = date('M-d-Y', strtotime('+45 day'));
$fortysix = date('M-d-Y', strtotime('+46 day'));
$fortyseven = date('M-d-Y', strtotime('+47 day'));
$fortyeight = date('M-d-Y', strtotime('+48 day'));
$fortynine = date('M-d-Y', strtotime('+49 day'));


$fifty = date('M-d-Y', strtotime('+50 day'));
$fiftyone = date('M-d-Y', strtotime('+51 day'));
$fiftytwo = date('M-d-Y', strtotime('+52 day'));
$fiftythree = date('M-d-Y', strtotime('+53 day'));
$fiftyfour = date('M-d-Y', strtotime('+54 day'));
$fiftyfive = date('M-d-Y', strtotime('+55 day'));
$fiftysix = date('M-d-Y', strtotime('+56 day'));
$fiftyseven = date('M-d-Y', strtotime('+57 day'));
$fiftyeight = date('M-d-Y', strtotime('+58 day'));
$fiftynine = date('M-d-Y', strtotime('+59 day'));


$sixty = date('M-d-Y', strtotime('+60 day'));
$sixtyone = date('M-d-Y', strtotime('+61 day'));
$sixtytwo = date('M-d-Y', strtotime('+62 day'));
$sixtythree = date('M-d-Y', strtotime('+63 day'));
$sixtyfour = date('M-d-Y', strtotime('+64 day'));
$sixtyfive = date('M-d-Y', strtotime('+65 day'));
$sixtysix = date('M-d-Y', strtotime('+66 day'));
$sixtyseven = date('M-d-Y', strtotime('+67 day'));
$sixtyeight = date('M-d-Y', strtotime('+68 day'));
$sixtynine = date('M-d-Y', strtotime('+69 day'));


$seventy = date('M-d-Y', strtotime('+70 day'));
$seventyone = date('M-d-Y', strtotime('+71 day'));
$seventytwo = date('M-d-Y', strtotime('+72 day'));
$seventythree = date('M-d-Y', strtotime('+73 day'));
$seventyfour = date('M-d-Y', strtotime('+74 day'));
$seventyfive = date('M-d-Y', strtotime('+75 day'));
$seventysix = date('M-d-Y', strtotime('+76 day'));
$seventyseven = date('M-d-Y', strtotime('+77 day'));
$seventyeight = date('M-d-Y', strtotime('+78 day'));
$seventynine = date('M-d-Y', strtotime('+79 day'));


$eighty = date('M-d-Y', strtotime('+80 day'));
$eightyone = date('M-d-Y', strtotime('+81 day'));
$eightytwo = date('M-d-Y', strtotime('+82 day'));
$eightythree = date('M-d-Y', strtotime('+83 day'));
$eightyfour = date('M-d-Y', strtotime('+84 day'));
$eightyfive = date('M-d-Y', strtotime('+85 day'));
$eightysix = date('M-d-Y', strtotime('+86 day'));
$eightyseven = date('M-d-Y', strtotime('+87 day'));
$eightyeight = date('M-d-Y', strtotime('+88 day'));
$eightynine = date('M-d-Y', strtotime('+89 day'));


$ninety = date('M-d-Y', strtotime('+90 day'));
$ninetyone = date('M-d-Y', strtotime('+91 day'));
$ninetytwo = date('M-d-Y', strtotime('+92 day'));
$ninetythree = date('M-d-Y', strtotime('+93 day'));
$ninetyfour = date('M-d-Y', strtotime('+94 day'));
$ninetyfive = date('M-d-Y', strtotime('+95 day'));
$ninetysix = date('M-d-Y', strtotime('+96 day'));
$ninetyseven = date('M-d-Y', strtotime('+97 day'));
$ninetyeight = date('M-d-Y', strtotime('+98 day'));
$ninetynine = date('M-d-Y', strtotime('+99 day'));


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
$alertsget = $db->prepare("SELECT * FROM tasks_log WHERE content = 'Successful login' AND account = :account ORDER BY id DESC LIMIT 5");
$alertsget->execute([
  'account' => $account
]);
$alerts = $alertsget->rowCount() ? $alertsget : [];

$linksget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$linksget->execute([
  'account' => $account,
  'date' => 'links'
]);
$links = $linksget->rowCount() ? $linksget : [];

$remindersget = $db->prepare("SELECT * FROM tasks_tasks WHERE account = :account AND completed = 'false' AND remindersent = 'false' AND reminderdate IS NOT NULL");
$remindersget->execute([
  'account' => $account
]);
$reminders = $remindersget->rowCount() ? $remindersget : [];

$logget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account ORDER BY `datecompleted` DESC");
$logget->execute([
  'account' => $account
]);
$log = $logget->rowCount() ? $logget : [];

$inboxget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$inboxget->execute([
  'account' => $account,
  'date' => 'inbox'
]);
$inbox = $inboxget->rowCount() ? $inboxget : [];

$todaypageget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$todaypageget->execute([
  'account' => $account,
  'date' => $today
]);
$todaypage = $todaypageget->rowCount() ? $todaypageget : [];









// Singles
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









// 10s
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









// 20s
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









// 30s
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

$thirtytwoitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$thirtytwoitemsget->execute([
  'account' => $account,
  'date' => $thirtytwo
]);
$thirtytwoitems = $thirtytwoitemsget->rowCount() ? $thirtytwoitemsget : [];

$thirtythreeitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$thirtythreeitemsget->execute([
  'account' => $account,
  'date' => $thirtythree
]);
$thirtythreeitems = $thirtythreeitemsget->rowCount() ? $thirtythreeitemsget : [];

$thirtyfouritemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$thirtyfouritemsget->execute([
  'account' => $account,
  'date' => $thirtyfour
]);
$thirtyfouritems = $thirtyfouritemsget->rowCount() ? $thirtyfouritemsget : [];

$thirtyfiveitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$thirtyfiveitemsget->execute([
  'account' => $account,
  'date' => $thirtyfive
]);
$thirtyfiveitems = $thirtyfiveitemsget->rowCount() ? $thirtyfiveitemsget : [];

$thirtysixitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$thirtysixitemsget->execute([
  'account' => $account,
  'date' => $thirtysix
]);
$thirtysixitems = $thirtysixitemsget->rowCount() ? $thirtysixitemsget : [];

$thirtysevenitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$thirtysevenitemsget->execute([
  'account' => $account,
  'date' => $thirtyseven
]);
$thirtysevenitems = $thirtysevenitemsget->rowCount() ? $thirtysevenitemsget : [];

$thirtyeightitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$thirtyeightitemsget->execute([
  'account' => $account,
  'date' => $thirtyeight
]);
$thirtyeightitems = $thirtyeightitemsget->rowCount() ? $thirtyeightitemsget : [];

$thirtynineitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$thirtynineitemsget->execute([
  'account' => $account,
  'date' => $thirtynine
]);
$thirtynineitems = $thirtynineitemsget->rowCount() ? $thirtynineitemsget : [];









// 40s
$fortyitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fortyitemsget->execute([
  'account' => $account,
  'date' => $forty
]);
$fortyitems = $fortyitemsget->rowCount() ? $fortyitemsget : [];

$fortyoneitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fortyoneitemsget->execute([
  'account' => $account,
  'date' => $fortyone
]);
$fortyoneitems = $fortyoneitemsget->rowCount() ? $fortyoneitemsget : [];

$fortytwoitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fortytwoitemsget->execute([
  'account' => $account,
  'date' => $fortytwo
]);
$fortytwoitems = $fortytwoitemsget->rowCount() ? $fortytwoitemsget : [];

$fortythreeitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fortythreeitemsget->execute([
  'account' => $account,
  'date' => $fortythree
]);
$fortythreeitems = $fortythreeitemsget->rowCount() ? $fortythreeitemsget : [];

$fortyfouritemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fortyfouritemsget->execute([
  'account' => $account,
  'date' => $fortyfour
]);
$fortyfouritems = $fortyfouritemsget->rowCount() ? $fortyfouritemsget : [];

$fortyfiveitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fortyfiveitemsget->execute([
  'account' => $account,
  'date' => $fortyfive
]);
$fortyfiveitems = $fortyfiveitemsget->rowCount() ? $fortyfiveitemsget : [];

$fortysixitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fortysixitemsget->execute([
  'account' => $account,
  'date' => $fortysix
]);
$fortysixitems = $fortysixitemsget->rowCount() ? $fortysixitemsget : [];

$fortysevenitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fortysevenitemsget->execute([
  'account' => $account,
  'date' => $fortyseven
]);
$fortysevenitems = $fortysevenitemsget->rowCount() ? $fortysevenitemsget : [];

$fortyeightitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fortyeightitemsget->execute([
  'account' => $account,
  'date' => $fortyeight
]);
$fortyeightitems = $fortyeightitemsget->rowCount() ? $fortyeightitemsget : [];

$fortynineitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fortynineitemsget->execute([
  'account' => $account,
  'date' => $fortynine
]);
$fortynineitems = $fortynineitemsget->rowCount() ? $fortynineitemsget : [];









// 50s
$fiftyitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fiftyitemsget->execute([
  'account' => $account,
  'date' => $fifty
]);
$fiftyitems = $fiftyitemsget->rowCount() ? $fiftyitemsget : [];

$fiftyoneitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fiftyoneitemsget->execute([
  'account' => $account,
  'date' => $fiftyone
]);
$fiftyoneitems = $fiftyoneitemsget->rowCount() ? $fiftyoneitemsget : [];

$fiftytwoitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fiftytwoitemsget->execute([
  'account' => $account,
  'date' => $fiftytwo
]);
$fiftytwoitems = $fiftytwoitemsget->rowCount() ? $fiftytwoitemsget : [];

$fiftythreeitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fiftythreeitemsget->execute([
  'account' => $account,
  'date' => $fiftythree
]);
$fiftythreeitems = $fiftythreeitemsget->rowCount() ? $fiftythreeitemsget : [];

$fiftyfouritemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fiftyfouritemsget->execute([
  'account' => $account,
  'date' => $fiftyfour
]);
$fiftyfouritems = $fiftyfouritemsget->rowCount() ? $fiftyfouritemsget : [];

$fiftyfiveitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fiftyfiveitemsget->execute([
  'account' => $account,
  'date' => $fiftyfive
]);
$fiftyfiveitems = $fiftyfiveitemsget->rowCount() ? $fiftyfiveitemsget : [];

$fiftysixitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fiftysixitemsget->execute([
  'account' => $account,
  'date' => $fiftysix
]);
$fiftysixitems = $fiftysixitemsget->rowCount() ? $fiftysixitemsget : [];

$fiftysevenitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fiftysevenitemsget->execute([
  'account' => $account,
  'date' => $fiftyseven
]);
$fiftysevenitems = $fiftysevenitemsget->rowCount() ? $fiftysevenitemsget : [];

$fiftyeightitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fiftyeightitemsget->execute([
  'account' => $account,
  'date' => $fiftyeight
]);
$fiftyeightitems = $fiftyeightitemsget->rowCount() ? $fiftyeightitemsget : [];

$fiftynineitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$fiftynineitemsget->execute([
  'account' => $account,
  'date' => $fiftynine
]);
$fiftynineitems = $fiftynineitemsget->rowCount() ? $fiftynineitemsget : [];









// 60s
$sixtyitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$sixtyitemsget->execute([
  'account' => $account,
  'date' => $sixty
]);
$sixtyitems = $sixtyitemsget->rowCount() ? $sixtyitemsget : [];

$sixtyoneitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$sixtyoneitemsget->execute([
  'account' => $account,
  'date' => $sixtyone
]);
$sixtyoneitems = $sixtyoneitemsget->rowCount() ? $sixtyoneitemsget : [];

$sixtytwoitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$sixtytwoitemsget->execute([
  'account' => $account,
  'date' => $sixtytwo
]);
$sixtytwoitems = $sixtytwoitemsget->rowCount() ? $sixtytwoitemsget : [];

$sixtythreeitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$sixtythreeitemsget->execute([
  'account' => $account,
  'date' => $sixtythree
]);
$sixtythreeitems = $sixtythreeitemsget->rowCount() ? $sixtythreeitemsget : [];

$sixtyfouritemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$sixtyfouritemsget->execute([
  'account' => $account,
  'date' => $sixtyfour
]);
$sixtyfouritems = $sixtyfouritemsget->rowCount() ? $sixtyfouritemsget : [];

$sixtyfiveitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$sixtyfiveitemsget->execute([
  'account' => $account,
  'date' => $sixtyfive
]);
$sixtyfiveitems = $sixtyfiveitemsget->rowCount() ? $sixtyfiveitemsget : [];

$sixtysixitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$sixtysixitemsget->execute([
  'account' => $account,
  'date' => $sixtysix
]);
$sixtysixitems = $sixtysixitemsget->rowCount() ? $sixtysixitemsget : [];

$sixtysevenitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$sixtysevenitemsget->execute([
  'account' => $account,
  'date' => $sixtyseven
]);
$sixtysevenitems = $sixtysevenitemsget->rowCount() ? $sixtysevenitemsget : [];

$sixtyeightitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$sixtyeightitemsget->execute([
  'account' => $account,
  'date' => $sixtyeight
]);
$sixtyeightitems = $sixtyeightitemsget->rowCount() ? $sixtyeightitemsget : [];

$sixtynineitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$sixtynineitemsget->execute([
  'account' => $account,
  'date' => $sixtynine
]);
$sixtynineitems = $sixtynineitemsget->rowCount() ? $sixtynineitemsget : [];









// 70s
$seventyitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$seventyitemsget->execute([
  'account' => $account,
  'date' => $seventy
]);
$seventyitems = $seventyitemsget->rowCount() ? $seventyitemsget : [];

$seventyoneitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$seventyoneitemsget->execute([
  'account' => $account,
  'date' => $seventyone
]);
$seventyoneitems = $seventyoneitemsget->rowCount() ? $seventyoneitemsget : [];

$seventytwoitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$seventytwoitemsget->execute([
  'account' => $account,
  'date' => $seventytwo
]);
$seventytwoitems = $seventytwoitemsget->rowCount() ? $seventytwoitemsget : [];

$seventythreeitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$seventythreeitemsget->execute([
  'account' => $account,
  'date' => $seventythree
]);
$seventythreeitems = $seventythreeitemsget->rowCount() ? $seventythreeitemsget : [];

$seventyfouritemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$seventyfouritemsget->execute([
  'account' => $account,
  'date' => $seventyfour
]);
$seventyfouritems = $seventyfouritemsget->rowCount() ? $seventyfouritemsget : [];

$seventyfiveitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$seventyfiveitemsget->execute([
  'account' => $account,
  'date' => $seventyfive
]);
$seventyfiveitems = $seventyfiveitemsget->rowCount() ? $seventyfiveitemsget : [];

$seventysixitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$seventysixitemsget->execute([
  'account' => $account,
  'date' => $seventysix
]);
$seventysixitems = $seventysixitemsget->rowCount() ? $seventysixitemsget : [];

$seventysevenitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$seventysevenitemsget->execute([
  'account' => $account,
  'date' => $seventyseven
]);
$seventysevenitems = $seventysevenitemsget->rowCount() ? $seventysevenitemsget : [];

$seventyeightitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$seventyeightitemsget->execute([
  'account' => $account,
  'date' => $seventyeight
]);
$seventyeightitems = $seventyeightitemsget->rowCount() ? $seventyeightitemsget : [];

$seventynineitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$seventynineitemsget->execute([
  'account' => $account,
  'date' => $seventynine
]);
$seventynineitems = $seventynineitemsget->rowCount() ? $seventynineitemsget : [];









// 80s
$eightyitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$eightyitemsget->execute([
  'account' => $account,
  'date' => $eighty
]);
$eightyitems = $eightyitemsget->rowCount() ? $eightyitemsget : [];

$eightyoneitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$eightyoneitemsget->execute([
  'account' => $account,
  'date' => $eightyone
]);
$eightyoneitems = $eightyoneitemsget->rowCount() ? $eightyoneitemsget : [];

$eightytwoitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$eightytwoitemsget->execute([
  'account' => $account,
  'date' => $eightytwo
]);
$eightytwoitems = $eightytwoitemsget->rowCount() ? $eightytwoitemsget : [];

$eightythreeitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$eightythreeitemsget->execute([
  'account' => $account,
  'date' => $eightythree
]);
$eightythreeitems = $eightythreeitemsget->rowCount() ? $eightythreeitemsget : [];

$eightyfouritemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$eightyfouritemsget->execute([
  'account' => $account,
  'date' => $eightyfour
]);
$eightyfouritems = $eightyfouritemsget->rowCount() ? $eightyfouritemsget : [];

$eightyfiveitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$eightyfiveitemsget->execute([
  'account' => $account,
  'date' => $eightyfive
]);
$eightyfiveitems = $eightyfiveitemsget->rowCount() ? $eightyfiveitemsget : [];

$eightysixitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$eightysixitemsget->execute([
  'account' => $account,
  'date' => $eightysix
]);
$eightysixitems = $eightysixitemsget->rowCount() ? $eightysixitemsget : [];

$eightysevenitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$eightysevenitemsget->execute([
  'account' => $account,
  'date' => $eightyseven
]);
$eightysevenitems = $eightysevenitemsget->rowCount() ? $eightysevenitemsget : [];

$eightyeightitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$eightyeightitemsget->execute([
  'account' => $account,
  'date' => $eightyeight
]);
$eightyeightitems = $eightyeightitemsget->rowCount() ? $eightyeightitemsget : [];

$eightynineitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$eightynineitemsget->execute([
  'account' => $account,
  'date' => $eightynine
]);
$eightynineitems = $eightynineitemsget->rowCount() ? $eightynineitemsget : [];









// 90s

$ninetyitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$ninetyitemsget->execute([
  'account' => $account,
  'date' => $ninety
]);
$ninetyitems = $ninetyitemsget->rowCount() ? $ninetyitemsget : [];

$ninetyoneitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$ninetyoneitemsget->execute([
  'account' => $account,
  'date' => $ninetyone
]);
$ninetyoneitems = $ninetyoneitemsget->rowCount() ? $ninetyoneitemsget : [];

$ninetytwoitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$ninetytwoitemsget->execute([
  'account' => $account,
  'date' => $ninetytwo
]);
$ninetytwoitems = $ninetytwoitemsget->rowCount() ? $ninetytwoitemsget : [];

$ninetythreeitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$ninetythreeitemsget->execute([
  'account' => $account,
  'date' => $ninetythree
]);
$ninetythreeitems = $ninetythreeitemsget->rowCount() ? $ninetythreeitemsget : [];

$ninetyfouritemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$ninetyfouritemsget->execute([
  'account' => $account,
  'date' => $ninetyfour
]);
$ninetyfouritems = $ninetyfouritemsget->rowCount() ? $ninetyfouritemsget : [];

$ninetyfiveitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$ninetyfiveitemsget->execute([
  'account' => $account,
  'date' => $ninetyfive
]);
$ninetyfiveitems = $ninetyfiveitemsget->rowCount() ? $ninetyfiveitemsget : [];

$ninetysixitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$ninetysixitemsget->execute([
  'account' => $account,
  'date' => $ninetysix
]);
$ninetysixitems = $ninetysixitemsget->rowCount() ? $ninetysixitemsget : [];

$ninetysevenitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$ninetysevenitemsget->execute([
  'account' => $account,
  'date' => $ninetyseven
]);
$ninetysevenitems = $ninetysevenitemsget->rowCount() ? $ninetysevenitemsget : [];

$ninetyeightitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$ninetyeightitemsget->execute([
  'account' => $account,
  'date' => $ninetyeight
]);
$ninetyeightitems = $ninetyeightitemsget->rowCount() ? $ninetyeightitemsget : [];

$ninetynineitemsget = $db->prepare("SELECT * FROM `tasks_tasks` WHERE `account` = :account AND `scheduledate` = :date AND folderid IS NULL ORDER BY `priority` ASC");
$ninetynineitemsget->execute([
  'account' => $account,
  'date' => $ninetynine
]);
$ninetynineitems = $ninetynineitemsget->rowCount() ? $ninetynineitemsget : [];