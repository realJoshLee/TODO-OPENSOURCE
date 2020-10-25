<?php

//add_task.php

include('init.php');

$task = base64_encode(openssl_encrypt(trim($_POST["task_name"]), $method, $key, OPENSSL_RAW_DATA, $iv));

if($_POST["task_name"])
{
  $data = array(
    ':account'  => $account,
    ':folder' => $task
  );

  $query = "
  INSERT INTO tasksfolders 
  (account, folder) 
  VALUES (:account, :folder)
  ";

  $statement = $connect->prepare($query);

  if($statement->execute($data))
  {
    $id = $connect->lastInsertId();

    echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;<a href="folder_expand_tasks.php?folder='.$task.'" class="folderlink">'.$_POST['task_name'].'</a></p>';
  }
}


?>