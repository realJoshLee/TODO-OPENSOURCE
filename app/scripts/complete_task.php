<?php
// Gets the init file
include('init.php');

// Completed items
$day = date('D', strtotime('+0 day'));
$month = date('M', strtotime('+0 day'));
$year = date('Y', strtotime('+0 day'));
$date = date('Y-m-d', strtotime('+0 day'));

// Adds everything to the db
if(isset($_POST['id'])){
  $addQuery = $db->prepare("
    UPDATE taskable_tasks
    SET completed = :completed 
    WHERE taskid = :taskid
    AND account = :account;
    
    UPDATE taskable_tasks
    SET cweekday = :cweekday 
    WHERE taskid = :taskid
    AND account = :account;
    
    UPDATE taskable_tasks
    SET cmonth = :cmonth 
    WHERE taskid = :taskid
    AND account = :account;
    
    UPDATE taskable_tasks
    SET cyear = :cyear 
    WHERE taskid = :taskid
    AND account = :account;
    
    UPDATE taskable_tasks
    SET cdate = :cdate
    WHERE taskid = :taskid
    AND account = :account
  ");

  $addQuery->execute([
    ':account' => $account,
    ':taskid' => $_POST['id'],
    ':completed' => 'true',
    ':cweekday' => $day,
    ':cmonth' => $month,
    ':cyear' => $year,
    ':cdate' => $date
  ]);

  $logquery = $db->prepare("
    INSERT INTO taskable_log (account, item)
    VALUES (:account, :item)
  ");
  $logstatement = 'User: '.$account.' : Completed a task. TaskID: '.$_POST['id'].'';
  $logquery->execute([
    ':account' => $account,
    ':item' => $logstatement
  ]);
}
?>
