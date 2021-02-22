<?php
// Gets the init file
include('init.php');
echo 'Tasks - Systems Sync API v.1.1<br>';

// All of the functions
if(isset($_GET['a'])){
  $action = $_GET['a'];

  switch ($action) {
    // Changes the theme
    case "theme_change":
      if(isset($_GET['theme'])){
        // Adds everything to the db
        $addQuery = $db->prepare("
          UPDATE passwordlogin
          SET theme = :theme
          WHERE username = :account
        ");

        $addQuery->execute([
          ':account' => $account,
          ':theme' => $_GET['theme']
        ]);
      }else{
        echo 'Theme was not set.<br>';
      }
      break;










    // Adds a folder task
    case "add_folder_task":
      if(isset($_POST['task'],$_GET['taskid'],$_GET['folder'])){
        $taskencrypted = base64_encode(openssl_encrypt($_POST['task'], $method, $key, OPENSSL_RAW_DATA, $iv));
      
        $addQuery = $db->prepare("
          INSERT INTO taskable_tasks (account, name, taskid, folderid)
          VALUES (:account, :task, :taskid, :folderid)
        ");
      
        $addQuery->execute([
          ':account' => $account,
          ':task' => $taskencrypted,
          ':taskid' => $_GET['taskid'],
          ':folderid' => $_GET['folder']
        ]);
      
        $logquery = $db->prepare("
          INSERT INTO taskable_log (account, item)
          VALUES (:account, :item)
        ");
        $logstatement = 'User: '.$account.' : Added a task to a folder. TaskID: '.$_GET['taskid'].' FolderID: '.$_GET['folder'].'';
        $logquery->execute([
          ':account' => $account,
          ':item' => $logstatement
        ]);
      }else{
        echo '$_POST[\'task\'], $_GET[\'taskid\'],$_GET[\'foder\'] wasn\'t set.<br>';
      }
      break;

    // Updates the folder name
    case "folder_name_update":
      if(isset($_GET['name'],$_GET['folderid'])){
        $taskencrypted = base64_encode(openssl_encrypt($_GET['name'], $method, $key, OPENSSL_RAW_DATA, $iv));

        // Adds everything to the db
        $addQuery = $db->prepare("
          UPDATE taskable_folders
          SET name = :name 
          WHERE folderid = :folderid
          AND account = :account
        ");

        $addQuery->execute([
          ':account' => $account,
          ':folderid' => $_GET['folderid'],
          ':name' => $taskencrypted
        ]);

        $logquery = $db->prepare("
          INSERT INTO taskable_log (account, item)
          VALUES (:account, :item)
        ");
        $logstatement = 'User: '.$account.' : Updated the name of a folder. FolderID: '.$_GET['folderid'].'';
        $logquery->execute([
          ':account' => $account,
          ':item' => $logstatement
        ]);
      }else{
        echo '$_GET[\'name\'],$_GET[\'folderid\'] was not set.<br>';
      }
      break;

    // Deletes a folder
    case "del_folder":
      if(isset($_GET['folderid'])){
        $doneQuery = $db->prepare("
          DELETE FROM taskable_folders 
          WHERE folderid = :folderid
          AND account = :account
        ");
      
        $doneQuery->execute([
          ':account' => $account,
          ':folderid'  => $_GET['folderid']
        ]);
      
        $logquery = $db->prepare("
          INSERT INTO taskable_log (account, item)
          VALUES (:account, :item)
        ");
        $logstatement = 'User: '.$account.' : Deleted a folder. FolderID: '.$_GET['folderid'].'';
        $logquery->execute([
          ':account' => $account,
          ':item' => $logstatement
        ]);
      
        header('Location: ../folders.php');
      } else {
        header('Location: ../folders.php');
      }
      break;

    // Adds a folder
    case "add_folder":
      if(isset($_POST['folder'])){
        $taskencrypted = base64_encode(openssl_encrypt($_POST['folder'], $method, $key, OPENSSL_RAW_DATA, $iv));
      
        $addQuery = $db->prepare("
          INSERT INTO taskable_folders (account, name, folderid)
          VALUES (:account, :folder, :folderid)
        ");
      
        $addQuery->execute([
          ':account' => $account,
          ':folder' => $taskencrypted,
          ':folderid' => $_GET['folderid']
        ]);
      
        $logquery = $db->prepare("
          INSERT INTO taskable_log (account, item)
          VALUES (:account, :item)
        ");
        $logstatement = 'User: '.$account.' : Added a folder. FolderID: '.$_GET['folderid'].'';
        $logquery->execute([
          ':account' => $account,
          ':item' => $logstatement
        ]);
      }else{
        echo '$_POST[\'folder\'] was not set.<br>';
      }
      break;

    // Note update
    case "note_update":
      if(isset($_GET['noteid'],$_POST['notetitle'],$_POST['notecontent'])){
        $titleenc = base64_encode(openssl_encrypt($_POST['notetitle'], $method, $key, OPENSSL_RAW_DATA, $iv));
        $contentend = base64_encode(openssl_encrypt($_POST['notecontent'], $method, $key, OPENSSL_RAW_DATA, $iv));

        // Adds everything to the db
        $addQuery = $db->prepare("
          UPDATE taskable_notes
          SET title = :title
          WHERE noteid = :noteid
          AND account = :account;
          UPDATE taskable_notes
          SET content = :content
          WHERE noteid = :noteid
          AND account = :account
        ");

        $addQuery->execute([
          ':account' => $account,
          ':noteid' => $_GET['noteid'],
          ':title' => $titleenc,
          ':content' => $contentend
        ]);
      }else{
        echo '$_GET[\'noteid\'],$_POST[\'notetitle\'],$_POST[\'notecontent\'] was not set.<br>';
      }
      break;









    // Adds a notes
    case "add_note":
      if(isset($_GET['noteid'],$_GET['notename'])){
        $titleenc = base64_encode(openssl_encrypt($_POST['notename'], $method, $key, OPENSSL_RAW_DATA, $iv));
      
        $addQuery = $db->prepare("
          INSERT INTO taskable_notes (account, noteid, title)
          VALUES (:account, :noteid, :title)
        ");
      
        $addQuery->execute([
          ':account' => $account,
          ':title' => $titleenc,
          ':noteid' => $_GET['noteid']
        ]);
      
        $logquery = $db->prepare("
          INSERT INTO taskable_log (account, item)
          VALUES (:account, :item)
        ");
        $logstatement = 'User: '.$account.' : Added a note. NoteID: '.$_GET['noteid'].'';
        $logquery->execute([
          ':account' => $account,
          ':item' => $logstatement
        ]);
      }else{
        echo '$_GET[\'noteid\'],$_GET[\'notename\'] was not set.<br>';
      }
      break;

    // Deletes a note
    case "del_note":
      if(isset($_GET['noteid'])){
        $doneQuery = $db->prepare("
          DELETE FROM taskable_notes
          WHERE noteid = :noteid
          AND account = :account
        ");
      
        $doneQuery->execute([
          ':account' => $account,
          ':noteid'  => $_GET['noteid']
        ]);
      
        $logquery = $db->prepare("
          INSERT INTO taskable_log (account, item)
          VALUES (:account, :item)
        ");
        $logstatement = 'User: '.$account.' : Deleted a note. NoteID: '.$_GET['noteid'].'';
        $logquery->execute([
          ':account' => $account,
          ':item' => $logstatement
        ]);
      
        header('Location: ../notes.php');
      } else {
        header('Location: ../notes.php');
        echo '$_GET[\'noteid\'] was not set.<br>';
      }
      break;
      








    // Edits the note
    case "edit_note":
      if(isset($_GET['task'],$_POST['notes'])){
        $taskencrypted = base64_encode(openssl_encrypt($_POST['notes'], $method, $key, OPENSSL_RAW_DATA, $iv));

        // Adds everything to the db
        $addQuery = $db->prepare("
          UPDATE taskable_tasks
          SET notes = :notes 
          WHERE taskid = :taskid
          AND account = :account
        ");

        $addQuery->execute([
          ':account' => $account,
          ':taskid' => $_GET['task'],
          ':notes' => $taskencrypted
        ]);

        $logquery = $db->prepare("
          INSERT INTO taskable_log (account, item)
          VALUES (:account, :item)
        ");
        $logstatement = 'User: '.$account.' : Edited a note of a task. TaskID: '.$_GET['task'].'';
        $logquery->execute([
          ':account' => $account,
          ':item' => $logstatement
        ]);
      }else{
        echo '$_GET[\'task\'],$_POST[\'notes\'] was not set.<br>';
      }
      break;

    // Add tasks
    case "add_task":
      if(isset($_POST['task'],$_GET['taskid'],$_GET['date'])){
        $taskencrypted = base64_encode(openssl_encrypt($_POST['task'], $method, $key, OPENSSL_RAW_DATA, $iv));
      
        $addQuery = $db->prepare("
          INSERT INTO taskable_tasks (account, name, taskid, date)
          VALUES (:account, :task, :taskid, :date)
        ");
      
        $addQuery->execute([
          ':account' => $account,
          ':task' => $taskencrypted,
          ':taskid' => $_GET['taskid'],
          ':date' => $_GET['date']
        ]);
      
        $logquery = $db->prepare("
          INSERT INTO taskable_log (account, item)
          VALUES (:account, :item)
        ");
        $logstatement = 'User: '.$account.' : Added a task. TaskID: '.$_GET['taskid'].'';
        $logquery->execute([
          ':account' => $account,
          ':item' => $logstatement
        ]);
      }else{
        echo '$_POST[\'task\'],$_GET[\'taskid\'],$_GET[\'date\'] was not set.<br>';
      }
      break;

    // Auto update script when you click on a task's date from the edit page
    case "auto_update_date":
      if(isset($_GET['date'],$_GET['id'])){

        // Adds everything to the db
        $addQuery = $db->prepare("
          UPDATE taskable_tasks
          SET date = :date 
          WHERE taskid = :taskid
          AND account = :account
        ");
    
        $addQuery->execute([
          ':account' => $account,
          ':taskid' => $_GET['id'],
          ':date' => $_GET['date']
        ]);
    
        $logquery = $db->prepare("
          INSERT INTO taskable_log (account, item)
          VALUES (:account, :item)
        ");
        $logstatement = 'User: '.$account.' : Edited a task. TaskID: '.$_GET['id'].'';
        $logquery->execute([
          ':account' => $account,
          ':item' => $logstatement
        ]);
      }else{
        echo '$_GET[\'date\'],$_GET[\'id\'] was not set.<br>';
      }
      break;

    // Auto updates the task when you click on it and edit it (From the home page and the edit page)
    case "auto_update_task":
      if(isset($_GET['content'],$_GET['id'])){
        $taskencrypted = base64_encode(openssl_encrypt($_GET['content'], $method, $key, OPENSSL_RAW_DATA, $iv));
    
        // Adds everything to the db
        $addQuery = $db->prepare("
          UPDATE taskable_tasks
          SET name = :name 
          WHERE taskid = :taskid
          AND account = :account
        ");
    
        $addQuery->execute([
          ':account' => $account,
          ':taskid' => $_GET['id'],
          ':name' => $taskencrypted
        ]);
    
        $logquery = $db->prepare("
          INSERT INTO taskable_log (account, item)
          VALUES (:account, :item)
        ");
        $logstatement = 'User: '.$account.' : Edited a task. TaskID: '.$_GET['id'].'';
        $logquery->execute([
          ':account' => $account,
          ':item' => $logstatement
        ]);
      }else{
        echo '$_GET[\'content\'],$_GET[\'id\'] was not set.<br>';
      }
      break;

    // Function that marks the task as complete
    case "complete_task":
      if(isset($_POST['id'])){
        $addQuery = $db->prepare("
          UPDATE taskable_tasks
          SET completed = :completed 
          WHERE taskid = :taskid
          AND account = :account
        ");
      
        $addQuery->execute([
          ':account' => $account,
          ':taskid' => $_POST['id'],
          ':completed' => 'true'
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
      }else{
        echo '$_POST[\'id\'] was not set.<br>';
      }
      break;

    // Deletes a task
    case "del_task":
      if(isset($_GET['task'])){
        $doneQuery = $db->prepare("
          DELETE FROM taskable_tasks  
          WHERE taskid = :taskid
          AND account = :account
        ");
      
        $doneQuery->execute([
          ':account' => $account,
          ':taskid'  => $_GET['task']
        ]);
      
        $logquery = $db->prepare("
          INSERT INTO taskable_log (account, item)
          VALUES (:account, :item)
        ");
        $logstatement = 'User: '.$account.' : Deleted a task. TaskID: '.$_GET['task'].'';
        $logquery->execute([
          ':account' => $account,
          ':item' => $logstatement
        ]);
      }else{
        echo '$_GET[\'task\'] was not set.<br>';
      }
      break;

    // Edits the date of a task
    case "edit_date":
      if(isset($_GET['task'],$_POST['date'])){
        // Adds everything to the db
        $addQuery = $db->prepare("
          UPDATE taskable_tasks
          SET date = :date 
          WHERE taskid = :taskid
          AND account = :account
        ");

        $addQuery->execute([
          ':account' => $account,
          ':taskid' => $_GET['task'],
          ':date' => $_POST['date']
        ]);

        $logquery = $db->prepare("
          INSERT INTO taskable_log (account, item)
          VALUES (:account, :item)
        ");
        $logstatement = 'User: '.$account.' : Edited a date of a task. TaskID: '.$_GET['task'].'';
        $logquery->execute([
          ':account' => $account,
          ':item' => $logstatement
        ]);
      }else{
        echo '$_GET[\'task\'],$_POST[\'date\'] was not set.<br>';
      }
      break;

    case "dit_task":
      if(isset($_POST['task'])){
        $taskencrypted = base64_encode(openssl_encrypt($_POST['task'], $method, $key, OPENSSL_RAW_DATA, $iv));

        // Adds everything to the db
        $addQuery = $db->prepare("
          UPDATE taskable_tasks
          SET name = :name 
          WHERE taskid = :taskid
          AND account = :account
        ");

        $addQuery->execute([
          ':account' => $account,
          ':taskid' => $_GET['task'],
          ':name' => $taskencrypted
        ]);

        $logquery = $db->prepare("
          INSERT INTO taskable_log (account, item)
          VALUES (:account, :item)
        ");
        $logstatement = 'User: '.$account.' : Edited a task. TaskID: '.$_GET['task'].'';
        $logquery->execute([
          ':account' => $account,
          ':item' => $logstatement
        ]);
      }else{
        echo '$_POST[\'task\'] was not set.<br>';
      }
      break;

    // Updates the priority of a task
    case "priority":
      if(isset($_GET['taskid'],$_POST['id'])){
        // Adds everything to the db
        $addQuery = $db->prepare("
          UPDATE taskable_tasks
          SET priority = :priority 
          WHERE taskid = :taskid
          AND account = :account
        ");

        $addQuery->execute([
          ':account' => $account,
          ':taskid' => $_GET['taskid'],
          ':priority' => $_POST['id']
        ]);

        $logquery = $db->prepare("
          INSERT INTO taskable_log (account, item)
          VALUES (:account, :item)
        ");
        $logstatement = 'User: '.$account.' : Changed the priority of a task. TaskID: '.$_GET['taskid'].'';
        $logquery->execute([
          ':account' => $account,
          ':item' => $logstatement
        ]);
      }else{
        echo '$_GET[\'taskid\'],$_POST[\'id\'] was not set.<br>';
      }
      break;









    // Updates the daily goal
    case "dailygoal":
      if(isset($_GET['g'])){
        // Adds everything to the db
        $addQuery = $db->prepare("
          UPDATE passwordlogin
          SET taskcompletegoal = :taskcompletegoal 
          WHERE username = :account
        ");

        $addQuery->execute([
          ':account' => $account,
          ':taskcompletegoal' => $_GET['g']
        ]);

        $logquery = $db->prepare("
          INSERT INTO taskable_log (account, item)
          VALUES (:account, :item)
        ");
        $logstatement = 'User: '.$account.' : Changed the daily goal: '.$_GET['g'].'';
        $logquery->execute([
          ':account' => $account,
          ':item' => $logstatement
        ]);
      }else{
        echo '$_GET[\'taskid\'],$_POST[\'id\'] was not set.<br>';
      }
      break;
  }
} else {
  echo 'Action not set<br>';
}