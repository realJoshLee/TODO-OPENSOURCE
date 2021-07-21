<?php
// Gets the init file
include('../init/init.php');
$date = date('Y-m-d h:i:s', strtotime('+0 day'));
$datepretty = date('M-d-Y', strtotime('+0 day'));
$yearpretty = date('Y', strtotime('+0 day'));
$monthpretty = date('M', strtotime('+0 day'));
$logdate = date('M-d-Y h:i:sa', strtotime('+0 day'));
$hour = date("H");

// All of the functions
if(isset($_GET['as'])){
  $action = $_GET['as'];
      
  $logQuery = $db->prepare("
    INSERT INTO tasks_log (account, content, date)
    VALUES (:account, :content, :date)
  ");
  $maincontent = 'API request recieved';
  $logQuery->execute([
    ':account' => 'SYSTEM',
    ':content' => $maincontent,
    ':date' => $logdate
  ]);

  switch ($action) {

    /*
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        ACCOUNT UPDATE SCRIPTS
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    */
    // Completed the setup
    case "setupdone":    
      $addQuery = $db->prepare("
        UPDATE `passwordlogin`
        SET `setupcomplete` = :setupcomplete
        WHERE `username` = :username;
        
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date);
      ");

      $content = 'Finished the setup';
      
      $addQuery->execute([
        ':username' => $accountemail,
        ':setupcomplete' => 'true',
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Update the daily goal
    case "dailygoalupdate":    
      $addQuery = $db->prepare("
        UPDATE `passwordlogin`
        SET `taskcompletegoal` = :taskcompletegoal
        WHERE `username` = :username
      ");
      
      $addQuery->execute([
        ':username' => $accountemail,
        ':taskcompletegoal' => $_POST['goal']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Updated daily goal ('.$_POST['goal'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Updates the timezone
    case "updatetimezone":      
      $addQuery = $db->prepare("
        UPDATE `passwordlogin`
        SET `timezone` = :timezone
        WHERE `username` = :account
      ");
      
      $addQuery->execute([
        ':account' => $accountemail,
        ':timezone' => $_POST['timezone']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Updated timezone ('.$_POST['timezone'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;
    
    // Updates theme
    case "theme":
      $addQuery = $db->prepare("
        UPDATE `passwordlogin`
        SET `theme` = :theme
        WHERE `username` = :account
      ");

      $addQuery->execute([
        ':account' => $accountemail,
        ':theme' => $_POST['theme']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Updated theme ('.$_POST['theme'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;
    
    // Updates the users account name
    case "updateaccname":
      $addQuery = $db->prepare("
        UPDATE `passwordlogin`
        SET `firstname` = :firstname
        WHERE `username` = :account;
        UPDATE `passwordlogin`
        SET `lastname` = :lastname
        WHERE `username` = :account;
        INSERT INTO tasks_log (account, content, date)
        VALUES (:accountid, :content, :date)
      ");
      $content = 'Updated account name ('.$_POST['lastname'].', '.$_POST['firstname'].')';
      
      $addQuery->execute([
        ':account' => $accountemail,
        ':accountid' => $account,
        ':firstname' => $_POST['firstname'],
        ':lastname' => $_POST['lastname'],
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;









    /*
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        ADDING TASKS
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    */
    // Adds a task
    case "addtask":
      $taskencrypted = base64_encode(openssl_encrypt($_POST['task'], $method, $key, OPENSSL_RAW_DATA, $iv));
      
      $addQuery = $db->prepare("
        INSERT INTO tasks_tasks (account, tid, name, scheduledate)
        VALUES (:account, :tid, :name, :scheduledate)
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':name' => $taskencrypted,
        ':tid' => $_GET['id'],
        ':scheduledate' => $_GET['day']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Added a task (TID: '.$_GET['id'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Adds a subtask
    case "addsubtask":
      $taskencrypted = base64_encode(openssl_encrypt($_POST['task'], $method, $key, OPENSSL_RAW_DATA, $iv));
      
      $addQuery = $db->prepare("
        INSERT INTO tasks_tasks (account, tid, parenttid, name)
        VALUES (:account, :tid, :parenttid, :name)
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':name' => $taskencrypted,
        ':tid' => $_GET['id'],
        ':parenttid' => $_GET['ptid']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Added a subtask (TID: '.$_GET['id'].' - PTID: '.$_GET['ptid'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Adds a subtask to a folder
    case "addtasktofolder":
      $taskencrypted = base64_encode(openssl_encrypt($_POST['task'], $method, $key, OPENSSL_RAW_DATA, $iv));
      
      $addQuery = $db->prepare("
        INSERT INTO tasks_tasks (account, tid, folderid, name)
        VALUES (:account, :tid, :folderid, :name);
      ");

      $addQuery->execute([
        ':account' => $account,
        ':name' => $taskencrypted,
        ':tid' => $_GET['tid'],
        ':folderid' => $_GET['fid']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Added a task to folder (TID: '.$_GET['tid'].' - FID: '.$_GET['fid'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;









    /*
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        FOLDER MANAGEMENT
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    */
    // Adds a folder
    case "addfolder":
      $fenc = base64_encode(openssl_encrypt($_POST['folder'], $method, $key, OPENSSL_RAW_DATA, $iv));
      
      $addQuery = $db->prepare("
        INSERT INTO tasks_folders (account, fid, name)
        VALUES (:account, :fid, :name)
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':name' => $fenc,
        ':fid' => $_GET['id']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Added a folder (FID: '.$_GET['id'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Removes a task from a folder
    case "removefromfolder":      
      $addQuery = $db->prepare("
        UPDATE `tasks_tasks`
        SET `folderid` = NULL
        WHERE `account` = :account
        AND `tid` = :tid;
        UPDATE `tasks_tasks`
        SET `scheduledate` = :scheduledate
        WHERE `account` = :account
        AND `tid` = :tid
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':scheduledate' => 'inbox',
        ':tid' => $_GET['tid']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Removed task from folder (TID: '.$_GET['tid'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Deletes a folder
    case "deletefolder":
      $addQuery = $db->prepare("
        DELETE FROM `tasks_folders`
        WHERE `account` = :account
        AND `fid` = :fid;
        UPDATE `tasks_tasks`
        SET `scheduledate` = :scheduledate
        WHERE `account` = :account
        AND `folderid` = :fid;
        UPDATE `tasks_tasks`
        SET `folderid` = NULL
        WHERE `account` = :account
        AND `folderid` = :fid;
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Deleted a folder (FID: '.$_GET['fid'].')';
      
      $addQuery->execute([
        ':account' => $account,
        ':fid' => $_GET['fid'],
        ':scheduledate' => 'inbox',        
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;









    /*
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        TASK UPDATE SCRIPS
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    */
    // Updates a task
    case "updatetask":
      $taskencrypted = base64_encode(openssl_encrypt($_GET['task'], $method, $key, OPENSSL_RAW_DATA, $iv));
      
      $addQuery = $db->prepare("
        UPDATE `tasks_tasks`
        SET `name` = :name
        WHERE `account` = :account
        AND `tid` = :tid
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':name' => $taskencrypted,
        ':tid' => $_GET['tid']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Updated task (TID: '.$_GET['tid'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Updates the date of a primary task
    case "updatedate":      
      $addQuery = $db->prepare("
        UPDATE `tasks_tasks`
        SET `scheduledate` = :scheduledate
        WHERE `account` = :account
        AND `tid` = :tid
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':scheduledate' => $_POST['date'],
        ':tid' => $_GET['tid']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Updated task date (TID: '.$_GET['tid'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Updates the date for drag and drop items
    case "updatedatedrag":      
      $addQuery = $db->prepare("
        UPDATE `tasks_tasks`
        SET `scheduledate` = :scheduledate
        WHERE `account` = :account
        AND `tid` = :tid
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':scheduledate' => $_POST['date'],
        ':tid' => $_GET['tid']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Updated date via drag and drop (TID: '.$_GET['tid'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Updates notes
    case "updatenotes":
      $notesenc = base64_encode(openssl_encrypt($_POST['notes'], $method, $key, OPENSSL_RAW_DATA, $iv));
      
      $addQuery = $db->prepare("
        UPDATE `tasks_tasks`
        SET `notes` = :notes
        WHERE `account` = :account
        AND `tid` = :tid
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':notes' => $notesenc,
        ':tid' => $_GET['tid']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Added task notes (TID: '.$_GET['tid'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Deletes notes
    case "deltask":
      $addQuery = $db->prepare("
        DELETE FROM `tasks_tasks`
        WHERE `account` = :account
        AND `tid` = :tid;
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':tid' => $_GET['tid']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Deleted a task (TID: '.$_GET['tid'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Completes task
    case "completetask":
      $addQuery = $db->prepare("
        UPDATE `tasks_tasks`
        SET `completed` = :completed
        WHERE `account` = :account
        AND `tid` = :tid;
        UPDATE `tasks_tasks`
        SET `datecompleted` = :datecompleted
        WHERE `account` = :account
        AND `tid` = :tid;
        UPDATE `tasks_tasks`
        SET `dateshowcomplete` = :dateshowcomplete
        WHERE `account` = :account
        AND `tid` = :tid;
        UPDATE `tasks_tasks`
        SET `completehour` = :completehour
        WHERE `account` = :account
        AND `tid` = :tid;
        UPDATE `tasks_tasks`
        SET `completeyear` = :completeyear
        WHERE `account` = :account
        AND `tid` = :tid;
        UPDATE `tasks_tasks`
        SET `completemonth` = :completemonth
        WHERE `account` = :account
        AND `tid` = :tid;
        
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Completed a task (TID: '.$_GET['tid'].')';
      
      $addQuery->execute([
        ':account' => $account,
        ':completed' => 'true',
        ':tid' => $_GET['tid'],
        ':datecompleted' => $date,
        ':dateshowcomplete' => $datepretty,
        ':content' => $content,
        ':date' => $logdate,
        ':completehour' => $hour,
        ':completemonth' => $monthpretty,
        ':completeyear' => $yearpretty
      ]);
      break;

    // Updates the content of a subtask
    case "subtaskupdate":   
      $encsubtask = base64_encode(openssl_encrypt($_POST['content'], $method, $key, OPENSSL_RAW_DATA, $iv));

      $addQuery = $db->prepare("
        UPDATE `tasks_tasks`
        SET `name` = :name
        WHERE `account` = :account
        AND `tid` = :tid;
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':name' => $encsubtask,
        ':tid' => $_GET['id'],
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Update the folder name
    case "fnameupdate":   
      $encfolder = base64_encode(openssl_encrypt($_POST['foldername'], $method, $key, OPENSSL_RAW_DATA, $iv));

      $addQuery = $db->prepare("
        UPDATE `tasks_folders`
        SET `name` = :name
        WHERE `account` = :account
        AND `fid` = :fid
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':name' => $encfolder,
        ':fid' => $_GET['fid']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Updated a foldername (FID: '.$_GET['fid'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Enables/disables sharing
    case "share":      
      $addQuery = $db->prepare("
        UPDATE `tasks_tasks`
        SET `shareable` = :shareable
        WHERE `account` = :account
        AND `tid` = :tid
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':shareable' => $_POST['share'],
        ':tid' => $_GET['id']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Set share value to: '.$_POST['share'].' (TID: '.$_GET['id'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;
  }
} else { 
  $logQuery = $db->prepare("
    INSERT INTO tasks_log (account, content, date)
    VALUES (:account, :content, :date)
  ");
  $maincontent = 'Invalid API request recieved';
  $logQuery->execute([
    ':account' => 'SYSTEM',
    ':content' => $maincontent,
    ':date' => $logdate
  ]);
}