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
  $maincontent = 'API request recieved (Sync Command - '.$action.')';
  $logQuery->execute([
    ':account' => 'SYSTEM',
    ':content' => $maincontent,
    ':date' => $logdate
  ]);

  switch ($action) {
    
    // Updates a task
    case "updatestatus":
      $addQuery = $db->prepare("
        UPDATE `tasks_control`
        SET `updatestatus` = :updatestatus
        WHERE `id` = :id
      ");
      
      $addQuery->execute([
        ':id' => '10',
        ':updatestatus' => $_POST['updatestatus']
      ]);
      break;

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

    // Updates the reminder status
    case "identifierupdate":    
      $strtwo = rand();
      $identifier = hash("sha256", $strtwo);

      $addQuery = $db->prepare("
        UPDATE `passwordlogin`
        SET `identifier` = :identifier
        WHERE `username` = :username;
        
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date);
      ");

      $content = 'Updated account identifier.';
      
      $addQuery->execute([
        ':username' => $accountemail,
        ':identifier' => $identifier,
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);

      header('Location: ../index.php#settings');
      break;

    // Updates the reminder status
    case "reminderupdate":    
      $addQuery = $db->prepare("
        UPDATE `passwordlogin`
        SET `reminder` = :reminder
        WHERE `username` = :username;
        
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date);
      ");

      $content = 'Updated reminder status.';
      
      $addQuery->execute([
        ':username' => $accountemail,
        ':reminder' => $_POST['reminder'],
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
      
    // Update the background sync val
    case "backgroundsyncupdate":   
      $addQuery = $db->prepare("
        UPDATE `passwordlogin`
        SET `backgroundsync` = :val
        WHERE `accountid` = :account
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':val' => $_POST['backgroundsyncval']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'User updated background sync status. (Updated To: '.$_POST['backgroundsyncval'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;
      
    // Update the background sync val
    case "extensionaddformupdate":   
      $addQuery = $db->prepare("
        UPDATE `passwordlogin`
        SET `extensionadd` = :val
        WHERE `accountid` = :account
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':val' => $_POST['extensionadd']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'User updated extension add status. (Updated To: '.$_POST['extensionadd'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;
      
    // Get the task ct.
    case "gettaskct":   
      $dbget = "SELECT * FROM `tasks_tasks` WHERE `account` = '$account'";
      $conget = $conn->query($dbget);
      $taskct = mysqli_num_rows($conget);
      
      echo $taskct;
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Fethcing report for current task count from server.';
      $logQuery->execute([
        ':account' => $account,
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
        ':tid' => $_POST['id'],
        ':scheduledate' => $_POST['day']
      ]);

      if(isset($_POST['folder'])){
        $folderUpdateQ = $db->prepare("
          UPDATE `tasks_tasks`
          SET `folderid` = :folderid
          WHERE `account` = :account
          AND `tid` = :tid
        ");
        
        $folderUpdateQ->execute([
          ':account' => $account,
          ':tid' => $_POST['id'],
          ':folderid' => $_POST['folder']
        ]);

        if($_POST['day']=='NULL'){
          $scdupdate = $db->prepare("
            UPDATE `tasks_tasks`
            SET `scheduledate` = :scheduledate
            WHERE `account` = :account
            AND `tid` = :tid
          ");
          
          $scdupdate->execute([
            ':account' => $account,
            ':tid' => $_POST['id'],
            ':scheduledate' => NULL
          ]);
        }
      }
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Added a task (TID: '.$_POST['id'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Adds a task via share API
    case "shareapiadd":
      $taskencrypted = base64_encode(openssl_encrypt($_POST['task'], $method, $key, OPENSSL_RAW_DATA, $iv));
      
      $addQuery = $db->prepare("
        INSERT INTO tasks_tasks (account, tid, name, scheduledate)
        VALUES (:account, :tid, :name, :scheduledate)
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':name' => $taskencrypted,
        ':tid' => $_POST['tid'],
        ':scheduledate' => 'links'
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Added a task via share API (TID: '.$_POSt['tid'].')';
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
        ':tid' => $_POST['id'],
        ':parenttid' => $_POST['ptid']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Added a subtask (TID: '.$_POST['id'].' - PTID: '.$_POST['ptid'].')';
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
        ':tid' => $_POST['tid'],
        ':folderid' => $_POST['fid']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Added a task to folder (TID: '.$_POST['tid'].' - FID: '.$_POST['fid'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Adds a subtask to a folder
    case "changefoldernormal":      
      $addQuery = $db->prepare("
        UPDATE `tasks_tasks`
        SET `folderid` = :folderid
        WHERE `account` = :account
        AND `tid` = :tid
      ");

      $addQuery->execute([
        ':account' => $account,
        ':tid' => $_POST['id'],
        ':folderid' => $_POST['newfolder']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Change the folder of a task (TID: '.$_POST['id'].' - New FID: '.$_POST['newfolder'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Adds a subtask to a folder
    case "changefoldernormalnoinbox":      
      $addQuery = $db->prepare("
        UPDATE `tasks_tasks`
        SET `folderid` = :folderid
        WHERE `account` = :account
        AND `tid` = :tid;
        UPDATE `tasks_tasks`
        SET `scheduledate` = :scheduledate
        WHERE `account` = :account
        AND `tid` = :tid;
      ");

      $addQuery->execute([
        ':account' => $account,
        ':tid' => $_POST['id'],
        ':folderid' => $_POST['newfolder'],
        ':scheduledate' => NULL
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Change the folder of a task (And removed the current date as:inbox) (TID: '.$_POST['id'].' - New FID: '.$_POST['newfolder'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Adds a subtask to a folder
    case "changefoldernormalsetinbox":      
      $addQuery = $db->prepare("
        UPDATE `tasks_tasks`
        SET `folderid` = :folderid
        WHERE `account` = :account
        AND `tid` = :tid;
        UPDATE `tasks_tasks`
        SET `scheduledate` = :scheduledate
        WHERE `account` = :account
        AND `tid` = :tid;
      ");

      $addQuery->execute([
        ':account' => $account,
        ':tid' => $_POST['id'],
        ':folderid' => NULL,
        ':scheduledate' => 'inbox'
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Change the folder of a task (Set the date as:inbox) (TID: '.$_POST['id'].' - New FID: '.$_POST['newfolder'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Adds a subtask to a folder
    case "changefoldernormalpresetdate":      
      $addQuery = $db->prepare("
        UPDATE `tasks_tasks`
        SET `folderid` = :folderid
        WHERE `account` = :account
        AND `tid` = :tid;
      ");

      $addQuery->execute([
        ':account' => $account,
        ':tid' => $_POST['id'],
        ':folderid' => NULL
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Change the folder of a task (Has a preset date) (TID: '.$_POST['id'].' - New FID: '.$_POST['newfolder'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Adds a subtask to a folder
    case "dpremovedate":      
      $addQuery = $db->prepare("
        UPDATE `tasks_tasks`
        SET `scheduledate` = :scheduledate
        WHERE `account` = :account
        AND `tid` = :tid;
      ");

      $addQuery->execute([
        ':account' => $account,
        ':tid' => $_POST['id'],
        ':scheduledate' => NULL
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Removed the scheduled date. (TID: '.$_POST['id'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;









    /*
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        Sync Scripts
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    */
    // Adds a subtask to a folder
    case "gettheme":
      $themeget = $db->prepare("SELECT * FROM `passwordlogin` WHERE accountid = :account");
      $themeget->execute([
        'account' => $account
      ]);
      $themedisplay = $themeget->rowCount() ? $themeget : [];

      foreach($themedisplay as $item){
        $themereturn = 'theme_'.$item['theme'];
        echo $themereturn;
      }
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Fethcing report for current theme from server.';
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
        ':fid' => $_POST['id']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Added a folder (FID: '.$_POST['id'].')';
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
        ':tid' => $_POST['tid']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Removed task from folder (TID: '.$_POST['tid'].')';
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
      $content = 'Deleted a folder (FID: '.$_POST['fid'].')';
      
      $addQuery->execute([
        ':account' => $account,
        ':fid' => $_POST['fid'],
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
      $taskencrypted = base64_encode(openssl_encrypt($_POST['task'], $method, $key, OPENSSL_RAW_DATA, $iv));
      
      $addQuery = $db->prepare("
        UPDATE `tasks_tasks`
        SET `name` = :name
        WHERE `account` = :account
        AND `tid` = :tid
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':name' => $taskencrypted,
        ':tid' => $_POST['tid']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Updated task (TID: '.$_POST['tid'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Removes a date from a task
    case "removedate":
      $addQuery = $db->prepare("
        UPDATE `tasks_tasks`
        SET `scheduledate` = 'inbox'
        WHERE `account` = :account
        AND `tid` = :tid
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':tid' => $_POST['id']
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
        ':tid' => $_POST['tid']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Updated task date (TID: '.$_POST['tid'].')';
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
        ':tid' => $_POST['tid']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Updated date via drag and drop (TID: '.$_POST['tid'].')';
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
        ':tid' => $_POST['tid']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Added task notes (TID: '.$_POST['tid'].')';
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
        ':tid' => $_POST['tid']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Deleted a task (TID: '.$_POST['tid'].')';
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
      $content = 'Completed a task (TID: '.$_POST['tid'].')';
      
      $addQuery->execute([
        ':account' => $account,
        ':completed' => 'true',
        ':tid' => $_POST['tid'],
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
        ':tid' => $_POST['id'],
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Sets the favorite status
    case "favorite":
      $addQuery = $db->prepare("
        UPDATE `tasks_tasks`
        SET `favorite` = :favorite
        WHERE `account` = :account
        AND `tid` = :id
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':favorite' => $_POST['value'],
        ':id' => $_POST['id']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Set the favorite of a task to '.$_POST['value'].' (FID: '.$_POST['id'].')';
      $logQuery->execute([
        ':account' => $account,
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
        ':fid' => $_POST['fid']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Updated a foldername (FID: '.$_POST['fid'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Update the folder name
    case "fcolorupdate":   
      $addQuery = $db->prepare("
        UPDATE `tasks_folders`
        SET `color` = :color
        WHERE `account` = :account
        AND `fid` = :fid
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':color' => $_POST['color'],
        ':fid' => $_POST['id']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Updated a folder color (FID: '.$_POST['id'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Update the people the folder is shared with
    case "fshare":   
      $addQuery = $db->prepare("
        UPDATE `tasks_folders`
        SET `sharedone` = :sharedone
        WHERE `account` = :account
        AND `fid` = :fid
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':sharedone' => $_POST['sharedone'],
        ':fid' => $_POST['id']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Shared folder with user '.$_POST['shareone'].' (FID: '.$_POST['id'].')';
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
        ':tid' => $_POST['id']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Set share value to: '.$_POST['share'].' (TID: '.$_POST['id'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;
      
    // Update the reminder sent val
    case "remindersent":   
      $addQuery = $db->prepare("
        UPDATE `tasks_tasks`
        SET `remindersent` = 'true'
        WHERE `account` = :account
        AND `tid` = :tid
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':tid' => $_POST['id']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Reminder status updated (TID: '.$_POST['id'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Update the reminder sent val
    case "reminderupdatedate":   
      $addQuery = $db->prepare("
        UPDATE `tasks_tasks`
        SET `reminderdate` = :reminderdate
        WHERE `account` = :account
        AND `tid` = :tid;
        UPDATE `tasks_tasks`
        SET `remindersent` = 'false'
        WHERE `account` = :account
        AND `tid` = :tid;
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':tid' => $_POST['tid'],
        ':reminderdate' => $_POST['reminderdate']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Reminder date updated (TID: '.$_POST['tid'].')';
      $logQuery->execute([
        ':account' => $account,
        ':content' => $content,
        ':date' => $logdate
      ]);
      break;

    // Removes the reminder date
    case "reminderremovedate":   
      $addQuery = $db->prepare("
        UPDATE `tasks_tasks`
        SET `reminderdate` = NULL
        WHERE `account` = :account
        AND `tid` = :tid;
        UPDATE `tasks_tasks`
        SET `remindersent` = 'false'
        WHERE `account` = :account
        AND `tid` = :tid;
      ");
      
      $addQuery->execute([
        ':account' => $account,
        ':tid' => $_POST['tid'],
        ':reminderdate' => $_POST['reminderdate']
      ]);
      
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, date)
        VALUES (:account, :content, :date)
      ");
      $content = 'Removed the reminder date (TID: '.$_POST['tid'].')';
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