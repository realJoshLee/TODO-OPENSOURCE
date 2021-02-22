<?php
// Moves yesterdays uncompleted tasks to today
$todaya = date('M.d.Y', strtotime('+0 day'));
$yesterday = date('M.d.Y', strtotime('-1 day'));
$yesterdayitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date");

$yesterdayitemsget->execute([
  'account' => $account,
  'date' => $yesterday
]);

$yesterdayitems = $yesterdayitemsget->rowCount() ? $yesterdayitemsget : [];
foreach($yesterdayitems as $item){
  if($item['completed']=='false'){
    $idforyes = $item['taskid'];

    $dateQuery = $db->prepare("
      UPDATE taskable_tasks
      SET date = :date 
      WHERE taskid = :taskid
      AND account = :account
    ");

    $dateQuery->execute([
      ':account' => $account,
      ':taskid' => $idforyes,
      ':date' => $todaya
    ]);
  }
}

// Gets all the tasks 31 days ahead.
$today = date('M.d.Y', strtotime('+0 day'));
$todayitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$todayitemsget->execute([
  'account' => $account,
  'date' => $today
]);
$todayitems = $todayitemsget->rowCount() ? $todayitemsget : [];

// One
$one = date('M.d.Y', strtotime('+1 day'));
$oneitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$oneitemsget->execute([
  'account' => $account,
  'date' => $one
]);
$oneitems = $oneitemsget->rowCount() ? $oneitemsget : [];

$tomorrowget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$tomorrowget->execute([
  'account' => $account,
  'date' => $one
]);
$tomorrowitems = $tomorrowget->rowCount() ? $tomorrowget : [];

// Two
$two = date('M.d.Y', strtotime('+2 day'));
$twoitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$twoitemsget->execute([
  'account' => $account,
  'date' => $two
]);
$twoitems = $twoitemsget->rowCount() ? $twoitemsget : [];

// Three
$three = date('M.d.Y', strtotime('+3 day'));
$threeitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$threeitemsget->execute([
  'account' => $account,
  'date' => $three
]);
$threeitems = $threeitemsget->rowCount() ? $threeitemsget : [];

// Four
$four = date('M.d.Y', strtotime('+4 day'));
$fouritemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$fouritemsget->execute([
  'account' => $account,
  'date' => $four
]);
$fouritems = $fouritemsget->rowCount() ? $fouritemsget : [];

// Five
$five = date('M.d.Y', strtotime('+5 day'));
$fiveitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$fiveitemsget->execute([
  'account' => $account,
  'date' => $five
]);
$fiveitems = $fiveitemsget->rowCount() ? $fiveitemsget : [];

// Six
$six = date('M.d.Y', strtotime('+6 day'));
$sixitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$sixitemsget->execute([
  'account' => $account,
  'date' => $six
]);
$sixitems = $sixitemsget->rowCount() ? $sixitemsget : [];

// Seven
$seven = date('M.d.Y', strtotime('+7 day'));
$sevenitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$sevenitemsget->execute([
  'account' => $account,
  'date' => $seven
]);
$sevenitems = $sevenitemsget->rowCount() ? $sevenitemsget : [];

// Eight
$eight = date('M.d.Y', strtotime('+8 day'));
$eightitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$eightitemsget->execute([
  'account' => $account,
  'date' => $eight
]);
$eightitems = $eightitemsget->rowCount() ? $eightitemsget : [];

// Nine
$nine = date('M.d.Y', strtotime('+9 day'));
$nineitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$nineitemsget->execute([
  'account' => $account,
  'date' => $nine
]);
$nineitems = $nineitemsget->rowCount() ? $nineitemsget : [];

// Ten
$ten = date('M.d.Y', strtotime('+10 day'));
$tenitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$tenitemsget->execute([
  'account' => $account,
  'date' => $ten
]);
$tenitems = $tenitemsget->rowCount() ? $tenitemsget : [];

// Eleven
$eleven = date('M.d.Y', strtotime('+11 day'));
$elevenitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$elevenitemsget->execute([
  'account' => $account,
  'date' => $eleven
]);
$elevenitems = $elevenitemsget->rowCount() ? $elevenitemsget : [];

// Twelve
$twelve = date('M.d.Y', strtotime('+12 day'));
$twelveitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$twelveitemsget->execute([
  'account' => $account,
  'date' => $twelve
]);
$twelveitems = $twelveitemsget->rowCount() ? $twelveitemsget : [];

// Thirteen
$thirteen = date('M.d.Y', strtotime('+13 day'));
$thirteenitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$thirteenitemsget->execute([
  'account' => $account,
  'date' => $thirteen
]);
$thirteenitems = $thirteenitemsget->rowCount() ? $thirteenitemsget : [];

// Fourteen
$fourteen = date('M.d.Y', strtotime('+14 day'));
$fourteenitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$fourteenitemsget->execute([
  'account' => $account,
  'date' => $fourteen
]);
$fourteenitems = $fourteenitemsget->rowCount() ? $fourteenitemsget : [];

// Fifteen
$fifteen = date('M.d.Y', strtotime('+15 day'));
$fifteenitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$fifteenitemsget->execute([
  'account' => $account,
  'date' => $fifteen
]);
$fifteenitems = $fifteenitemsget->rowCount() ? $fifteenitemsget : [];

// Sixteen
$sixteen = date('M.d.Y', strtotime('+16 day'));
$sixteenitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$sixteenitemsget->execute([
  'account' => $account,
  'date' => $sixteen
]);
$sixteenitems = $sixteenitemsget->rowCount() ? $sixteenitemsget : [];

// Seventeen
$seventeen = date('M.d.Y', strtotime('+17 day'));
$seventeenitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$seventeenitemsget->execute([
  'account' => $account,
  'date' => $seventeen
]);
$seventeenitems = $seventeenitemsget->rowCount() ? $seventeenitemsget : [];

// Eightteen
$eightteen = date('M.d.Y', strtotime('+18 day'));
$eightteenitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$eightteenitemsget->execute([
  'account' => $account,
  'date' => $eightteen
]);
$eightteenitems = $eightteenitemsget->rowCount() ? $eightteenitemsget : [];

// Nineteen
$nineteen = date('M.d.Y', strtotime('+19 day'));
$nineteenitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$nineteenitemsget->execute([
  'account' => $account,
  'date' => $nineteen
]);
$nineteenitems = $nineteenitemsget->rowCount() ? $nineteenitemsget : [];

// Twenty
$twenty = date('M.d.Y', strtotime('+20 day'));
$twentyitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$twentyitemsget->execute([
  'account' => $account,
  'date' => $twenty
]);
$twentyitems = $twentyitemsget->rowCount() ? $twentyitemsget : [];

// Twentyone
$twentyone = date('M.d.Y', strtotime('+21 day'));
$twentyoneitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$twentyoneitemsget->execute([
  'account' => $account,
  'date' => $twentyone
]);
$twentyoneitems = $twentyoneitemsget->rowCount() ? $twentyoneitemsget : [];

// Twentytwo
$twentytwo = date('M.d.Y', strtotime('+22 day'));
$twentytwoitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$twentytwoitemsget->execute([
  'account' => $account,
  'date' => $twentytwo
]);
$twentytwoitems = $twentytwoitemsget->rowCount() ? $twentytwoitemsget : [];

// Twentythree
$twentythree = date('M.d.Y', strtotime('+23 day'));
$twentythreeitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$twentythreeitemsget->execute([
  'account' => $account,
  'date' => $twentythree
]);
$twentythreeitems = $twentythreeitemsget->rowCount() ? $twentythreeitemsget : [];

// Twentyfour
$twentyfour = date('M.d.Y', strtotime('+24 day'));
$twentyfouritemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$twentyfouritemsget->execute([
  'account' => $account,
  'date' => $twentyfour
]);
$twentyfouritems = $twentyfouritemsget->rowCount() ? $twentyfouritemsget : [];

// Twentyfive
$twentyfive = date('M.d.Y', strtotime('+25 day'));
$twentyfiveitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$twentyfiveitemsget->execute([
  'account' => $account,
  'date' => $twentyfive
]);
$twentyfiveitems = $twentyfiveitemsget->rowCount() ? $twentyfiveitemsget : [];

// Twentysix
$twentysix = date('M.d.Y', strtotime('+26 day'));
$twentysixitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$twentysixitemsget->execute([
  'account' => $account,
  'date' => $twentysix
]);
$twentysixitems = $twentysixitemsget->rowCount() ? $twentysixitemsget : [];

// Twentyseven
$twentyseven = date('M.d.Y', strtotime('+27 day'));
$twentysevenitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$twentysevenitemsget->execute([
  'account' => $account,
  'date' => $twentyseven
]);
$twentysevenitems = $twentysevenitemsget->rowCount() ? $twentysevenitemsget : [];

// Twentyeight
$twentyeight = date('M.d.Y', strtotime('+28 day'));
$twentyeightitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$twentyeightitemsget->execute([
  'account' => $account,
  'date' => $twentyeight
]);
$twentyeightitems = $twentyeightitemsget->rowCount() ? $twentyeightitemsget : [];

// Twentynine
$twentynine = date('M.d.Y', strtotime('+29 day'));
$twentynineitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$twentynineitemsget->execute([
  'account' => $account,
  'date' => $twentynine
]);
$twentynineitems = $twentynineitemsget->rowCount() ? $twentynineitemsget : [];

// Thirty
$thirty = date('M.d.Y', strtotime('+30 day'));
$thirtyitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$thirtyitemsget->execute([
  'account' => $account,
  'date' => $thirty
]);
$thirtyitems = $thirtyitemsget->rowCount() ? $thirtyitemsget : [];

// Thirtyone
$thirtyone = date('M.d.Y', strtotime('+31 day'));
$thirtyoneitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
$thirtyoneitemsget->execute([
  'account' => $account,
  'date' => $thirtyone
]);
$thirtyoneitems = $thirtyoneitemsget->rowCount() ? $thirtyoneitemsget : [];
?>