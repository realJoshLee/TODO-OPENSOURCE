<?php
// Dates
$year = date('Y', strtotime('+0 day'));
$month = date('M', strtotime('+0 day'));
$today = date('M-d-Y', strtotime('-0 day'));
$onedate = date('M-d-Y', strtotime('-1 day'));
$twodate = date('M-d-Y', strtotime('-2 day'));
$threedate = date('M-d-Y', strtotime('-3 day'));
$fourdate = date('M-d-Y', strtotime('-4 day'));
$fivedate = date('M-d-Y', strtotime('-5 day'));
$sixdate = date('M-d-Y', strtotime('-6 day'));
$sevendate = date('M-d-Y', strtotime('-7 day'));

// Total tasks
$dbtotal = "SELECT * FROM `tasks_tasks` WHERE completed = 'true' AND account = '$account'";
$connStatustotal = $conn->query($dbtotal);
$totalcount = mysqli_num_rows($connStatustotal);

// Goal complete counts
$todaycount = "SELECT * FROM `tasks_tasks` WHERE dateshowcomplete = '$today' AND account = '$account'";
$todaystats = $conn->query($todaycount);
$totday = mysqli_num_rows($todaystats);

$yesterdayct = "SELECT * FROM `tasks_tasks` WHERE dateshowcomplete = '$onedate' AND account = '$account'";
$yesterdayst = $conn->query($yesterdayct);
$yesterday = mysqli_num_rows($yesterdayst);

$thismonthget = "SELECT * FROM `tasks_tasks` WHERE completemonth = '$month' AND completeyear = '$year' AND account = '$account'";
$thismonthstat = $conn->query($thismonthget);
$thismonth = mysqli_num_rows($thismonthstat);

/*$db1 = "SELECT * FROM `tasks_tasks` WHERE dateshowcomplete = '$onedate' AND account = '$account'";
$connStatus1 = $conn->query($db1);
$onecount = mysqli_num_rows($connStatus1);

$db2 = "SELECT * FROM `tasks_tasks` WHERE dateshowcomplete = '$twodate' AND account = '$account'";
$connStatus2 = $conn->query($db2);
$twocount = mysqli_num_rows($connStatus2);

$db3 = "SELECT * FROM `tasks_tasks` WHERE dateshowcomplete = '$threedate' AND account = '$account'";
$connStatus3 = $conn->query($db3);
$threecount = mysqli_num_rows($connStatus3);

$db4 = "SELECT * FROM `tasks_tasks` WHERE dateshowcomplete = '$fourdate' AND account = '$account'";
$connStatus4 = $conn->query($db4);
$fourcount = mysqli_num_rows($connStatus4);

$db5 = "SELECT * FROM `tasks_tasks` WHERE dateshowcomplete = '$fivedate' AND account = '$account'";
$connStatus5 = $conn->query($db5);
$fivecount = mysqli_num_rows($connStatus5);

$db6 = "SELECT * FROM `tasks_tasks` WHERE dateshowcomplete = '$sixdate' AND account = '$account'";
$connStatus6 = $conn->query($db6);
$sixcount = mysqli_num_rows($connStatus6);

$db7 = "SELECT * FROM `tasks_tasks` WHERE dateshowcomplete = '$sevendate' AND account = '$account'";
$connStatus7 = $conn->query($db7);
$sevencount = mysqli_num_rows($connStatus7);*/

// Processing
if($onecount>=$goal){
  $onefinal = '<span data-id="'.$onedate.'" class="goal-alert goal-complete"></span>';
} else {
  $onefinal = '<span data-id="'.$onedate.'" class="goal-alert goal-fail"></span>';
}

if($twocount>=$goal){
  $twofinal = '<span data-id="'.$twodate.'" class="goal-alert goal-complete"></span>';
} else {
  $twofinal = '<span data-id="'.$twodate.'" class="goal-alert goal-fail"></span>';
}

if($threecount>=$goal){
  $threefinal = '<span data-id="'.$threedate.'" class="goal-alert goal-complete"></span>';
} else {
  $threefinal = '<span data-id="'.$threedate.'" class="goal-alert goal-fail"></span>';
}

if($fourcount>=$goal){
  $fourfinal = '<span data-id="'.$fourdate.'" class="goal-alert goal-complete"></span>';
} else {
  $fourfinal = '<span data-id="'.$fourdate.'" class="goal-alert goal-fail"></span>';
}

if($fivecount>=$goal){
  $fivefinal = '<span data-id="'.$fivedate.'" class="goal-alert goal-complete"></span>';
} else {
  $fivefinal = '<span data-id="'.$fivedate.'" class="goal-alert goal-fail"></span>';
}

if($sixcount>=$goal){
  $sixfinal = '<span data-id="'.$sixdate.'" class="goal-alert goal-complete"></span>';
} else {
  $sixfinal = '<span data-id="'.$sixdate.'" class="goal-alert goal-fail"></span>';
}

if($sevencount>=$goal){
  $sevenfinal = '<span data-id="'.$sevendate.'" class="goal-alert goal-complete"></span>';
} else {
  $sevenfinal = '<span data-id="'.$sevendate.'" class="goal-alert goal-fail"></span>';
}

// Time get
/*$db1am = "SELECT * FROM `tasks_tasks` WHERE completehour = '1' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus1am = $conn->query($db1am);
$oneam = mysqli_num_rows($connStatus1am);

$db2am = "SELECT * FROM `tasks_tasks` WHERE completehour = '2' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus2am = $conn->query($db2am);
$twoam = mysqli_num_rows($connStatus2am);

$db3am = "SELECT * FROM `tasks_tasks` WHERE completehour = '3' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus3am = $conn->query($db3am);
$threeam = mysqli_num_rows($connStatus3am);

$db4am = "SELECT * FROM `tasks_tasks` WHERE completehour = '4' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus4am = $conn->query($db4am);
$fouram = mysqli_num_rows($connStatus4am);

$db5am = "SELECT * FROM `tasks_tasks` WHERE completehour = '5' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus5am = $conn->query($db5am);
$fiveam = mysqli_num_rows($connStatus5am);

$db6am = "SELECT * FROM `tasks_tasks` WHERE completehour = '6' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus6am = $conn->query($db6am);
$sixam = mysqli_num_rows($connStatus6am);

$db7am = "SELECT * FROM `tasks_tasks` WHERE completehour = '7' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus7am = $conn->query($db7am);
$sevenam = mysqli_num_rows($connStatus7am);

$db8am = "SELECT * FROM `tasks_tasks` WHERE completehour = '8' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus8am = $conn->query($db8am);
$eightam = mysqli_num_rows($connStatus8am);

$db9am = "SELECT * FROM `tasks_tasks` WHERE completehour = '9' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus9am = $conn->query($db9am);
$nineam = mysqli_num_rows($connStatus9am);

$db10am = "SELECT * FROM `tasks_tasks` WHERE completehour = '10' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus10am = $conn->query($db10am);
$tenam = mysqli_num_rows($connStatus10am);

$db11am = "SELECT * FROM `tasks_tasks` WHERE completehour = '11' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus11am = $conn->query($db11am);
$elevenam = mysqli_num_rows($connStatus11am);

$db12pm = "SELECT * FROM `tasks_tasks` WHERE completehour = '12' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus12pm = $conn->query($db12pm);
$twelvepm = mysqli_num_rows($connStatus12pm);

$db1pm = "SELECT * FROM `tasks_tasks` WHERE completehour = '13' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus1pm = $conn->query($db1pm);
$onepm = mysqli_num_rows($connStatus1pm);

$db2pm = "SELECT * FROM `tasks_tasks` WHERE completehour = '14' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus2pm = $conn->query($db2pm);
$twopm = mysqli_num_rows($connStatus2pm);

$db3pm = "SELECT * FROM `tasks_tasks` WHERE completehour = '15' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus3pm = $conn->query($db3pm);
$threepm = mysqli_num_rows($connStatus3pm);

$db4pm = "SELECT * FROM `tasks_tasks` WHERE completehour = '16' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus4pm = $conn->query($db4pm);
$fourpm = mysqli_num_rows($connStatus4pm);

$db5pm = "SELECT * FROM `tasks_tasks` WHERE completehour = '17' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus5pm = $conn->query($db5pm);
$fivepm = mysqli_num_rows($connStatus5pm);

$db6pm = "SELECT * FROM `tasks_tasks` WHERE completehour = '18' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus6pm = $conn->query($db6pm);
$sixpm = mysqli_num_rows($connStatus6pm);

$db7pm = "SELECT * FROM `tasks_tasks` WHERE completehour = '19' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus7pm = $conn->query($db7pm);
$sevenpm = mysqli_num_rows($connStatus7pm);

$db8pm = "SELECT * FROM `tasks_tasks` WHERE completehour = '20' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus8pm = $conn->query($db8pm);
$eightpm = mysqli_num_rows($connStatus8pm);

$db9pm = "SELECT * FROM `tasks_tasks` WHERE completehour = '21' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus9pm = $conn->query($db9pm);
$ninepm = mysqli_num_rows($connStatus9pm);

$db10pm = "SELECT * FROM `tasks_tasks` WHERE completehour = '22' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus10pm = $conn->query($db10pm);
$tenpm = mysqli_num_rows($connStatus10pm);

$db11pm = "SELECT * FROM `tasks_tasks` WHERE completehour = '23' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus11pm = $conn->query($db11pm);
$elevenpm = mysqli_num_rows($connStatus11pm);

$db12am = "SELECT * FROM `tasks_tasks` WHERE completehour = '24' AND account = '$account' AND dateshowcomplete = '$today'";
$connStatus12am = $conn->query($db12am);
$twelveam = mysqli_num_rows($connStatus12am);*/

// Month
$dbJan = "SELECT * FROM `tasks_tasks` WHERE completemonth = 'Jan' AND account = '$account' AND completeyear = '$year'";
$connStatusJan = $conn->query($dbJan);
$Jan = mysqli_num_rows($connStatusJan);

$dbFeb = "SELECT * FROM `tasks_tasks` WHERE completemonth = 'Feb' AND account = '$account' AND completeyear = '$year'";
$connStatusFeb = $conn->query($dbFeb);
$Feb = mysqli_num_rows($connStatusFeb);

$dbMar = "SELECT * FROM `tasks_tasks` WHERE completemonth = 'Mar' AND account = '$account' AND completeyear = '$year'";
$connStatusMar = $conn->query($dbMar);
$Mar = mysqli_num_rows($connStatusMar);

$dbApr = "SELECT * FROM `tasks_tasks` WHERE completemonth = 'Apr' AND account = '$account' AND completeyear = '$year'";
$connStatusApr = $conn->query($dbApr);
$Apr = mysqli_num_rows($connStatusApr);

$dbMay = "SELECT * FROM `tasks_tasks` WHERE completemonth = 'May' AND account = '$account' AND completeyear = '$year'";
$connStatusMay = $conn->query($dbMay);
$May = mysqli_num_rows($connStatusMay);

$dbJune = "SELECT * FROM `tasks_tasks` WHERE completemonth = 'Jun' AND account = '$account' AND completeyear = '$year'";
$connStatusJune = $conn->query($dbJune);
$June = mysqli_num_rows($connStatusJune);

$dbJuly = "SELECT * FROM `tasks_tasks` WHERE completemonth = 'Jul' AND account = '$account' AND completeyear = '$year'";
$connStatusJuly = $conn->query($dbJuly);
$July = mysqli_num_rows($connStatusJuly);

$dbAug = "SELECT * FROM `tasks_tasks` WHERE completemonth = 'Aug' AND account = '$account' AND completeyear = '$year'";
$connStatusAug = $conn->query($dbAug);
$Aug = mysqli_num_rows($connStatusAug);

$dbSept = "SELECT * FROM `tasks_tasks` WHERE completemonth = 'Sept' AND account = '$account' AND completeyear = '$year'";
$connStatusSept = $conn->query($dbSept);
$Sept = mysqli_num_rows($connStatusSept);

$dbOct = "SELECT * FROM `tasks_tasks` WHERE completemonth = 'Oct' AND account = '$account' AND completeyear = '$year'";
$connStatusOct = $conn->query($dbOct);
$Oct = mysqli_num_rows($connStatusOct);

$dbNov = "SELECT * FROM `tasks_tasks` WHERE completemonth = 'Nov' AND account = '$account' AND completeyear = '$year'";
$connStatusNov = $conn->query($dbNov);
$Nov = mysqli_num_rows($connStatusNov);

$dbDec = "SELECT * FROM `tasks_tasks` WHERE completemonth = 'Dec' AND account = '$account' AND completeyear = '$year'";
$connStatusDec = $conn->query($dbDec);
$Dec = mysqli_num_rows($connStatusDec);