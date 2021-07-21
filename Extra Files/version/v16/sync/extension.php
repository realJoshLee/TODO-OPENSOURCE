<?php
// Allows access and gets creds.
include '../init/init-login.php';
header("Access-Control-Allow-Origin: *");
$logdate = date('M-d-Y h:i:sa', strtotime('+0 day'));

if(isset($_GET['as'])){
  $action = $_GET['as'];
  switch ($action) {

    case "addtask": 
      // Generates task id
      function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
      }
      $taskid = generateRandomString();

      if(isset($_POST['accountid'])){
        // Gets the info from the db based off of the account id given.
        $accountitemsget = $db->prepare("SELECT accountid, extensionadd FROM `passwordlogin` WHERE `identifier` = :identifier");
        $accountitemsget->execute([
          'identifier' => $_POST['accountid']
        ]);
        $accountitems = $accountitemsget->rowCount() ? $accountitemsget : [];

        foreach($accountitems as $item){
          if($item['extensionadd']=='true'){
            // Encrypts
            $urlenc = base64_encode(openssl_encrypt($_POST['url'], $method, $key, OPENSSL_RAW_DATA, $iv));

            // Sends data
            $addQuery = $db->prepare("
              INSERT INTO tasks_tasks (account, tid, name, scheduledate)
              VALUES (:account, :tid, :name, :scheduledate)
            ");
            
            $addQuery->execute([
              ':account' => $item['accountid'],
              ':name' => $urlenc,
              ':tid' => $taskid,
              ':scheduledate' => 'links'
            ]);

            // Sends data
            $logQuery = $db->prepare("
              INSERT INTO tasks_log (account, content, date)
              VALUES (:account, :content, :date)
            ");
            $content = 'Added a task via the extension. (TID: '.$taskid.')';
            $logQuery->execute([
              ':account' => $item['accountid'],
              ':content' => $content,
              ':date' => $logdate
            ]);
          }
        }
      }
      break;

    case "initialsync":
      if(isset($_POST['identifier'])){
        // Gets the info from the db based off of the account id given.
        $accountitemsget = $db->prepare("SELECT accountid,extensionadd FROM `passwordlogin` WHERE `identifier` = :identifier");
        $accountitemsget->execute([
          'identifier' => $_POST['identifier']
        ]);
        $accountitems = $accountitemsget->rowCount() ? $accountitemsget : [];

        foreach($accountitems as $item){
          if($item['extensionadd']=='true'){
            //fetch table rows from mysql db
            $identifier = $_POST['identifier'];
            $sql = "SELECT firstname,lastname,username FROM passwordlogin WHERE identifier = '$identifier'";
            $result = mysqli_query($connect, $sql) or die("Error in Selecting " . mysqli_error($connect));
            
            //create an array
            $emparray = array();
            while($row =mysqli_fetch_assoc($result))
            {
              $emparray[] = $row;
            }
            $jsondata = json_encode($emparray, true);
            echo json_encode($emparray);
              
            //close the db connection
            mysqli_close($connect);
        
            // Makes log quert
            $logQuery = $db->prepare("
              INSERT INTO tasks_log (account, content, logindevice, date)
              VALUES (:account, :content, :logindevice, :date)
            ");
            $content = 'Successful login';
            $logQuery->execute([
              ':account' => $item["accountid"],
              ':content' => $content,
              ':date' => $logdate,
              ':logindevice' => 'Chrome Extension'
            ]);
          }
        }
      }
      break;
  }
}