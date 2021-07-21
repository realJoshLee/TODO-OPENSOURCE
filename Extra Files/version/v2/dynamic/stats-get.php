<?php
// Dates
$onedate = date('M-d-Y', strtotime('-1 day'));
$twodate = date('M-d-Y', strtotime('-2 day'));
$threedate = date('M-d-Y', strtotime('-3 day'));
$fourdate = date('M-d-Y', strtotime('-4 day'));
$fivedate = date('M-d-Y', strtotime('-5 day'));
$sixdate = date('M-d-Y', strtotime('-6 day'));
$sevendate = date('M-d-Y', strtotime('-7 day'));

// Total tasks
$dbtotal = "SELECT * FROM `tasks_tasks` WHERE completed = 'true'";
$connStatustotal = $conn->query($dbtotal);
$totalcount = mysqli_num_rows($connStatustotal);

// Goal complete counts
$db1 = "SELECT * FROM `tasks_tasks` WHERE dateshowcomplete = '$onedate'";
$connStatus1 = $conn->query($db1);
$onecount = mysqli_num_rows($connStatus1);

$db2 = "SELECT * FROM `tasks_tasks` WHERE dateshowcomplete = '$twodate'";
$connStatus2 = $conn->query($db2);
$twocount = mysqli_num_rows($connStatus2);

$db3 = "SELECT * FROM `tasks_tasks` WHERE dateshowcomplete = '$threedate'";
$connStatus3 = $conn->query($db3);
$threecount = mysqli_num_rows($connStatus3);

$db4 = "SELECT * FROM `tasks_tasks` WHERE dateshowcomplete = '$fourdate'";
$connStatus4 = $conn->query($db4);
$fourcount = mysqli_num_rows($connStatus4);

$db5 = "SELECT * FROM `tasks_tasks` WHERE dateshowcomplete = '$fivedate'";
$connStatus5 = $conn->query($db5);
$fivecount = mysqli_num_rows($connStatus5);

$db6 = "SELECT * FROM `tasks_tasks` WHERE dateshowcomplete = '$sixdate'";
$connStatus6 = $conn->query($db6);
$sixcount = mysqli_num_rows($connStatus6);

$db7 = "SELECT * FROM `tasks_tasks` WHERE dateshowcomplete = '$sevendate'";
$connStatus7 = $conn->query($db7);
$sevencount = mysqli_num_rows($connStatus7);

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
