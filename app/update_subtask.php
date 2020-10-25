<?php

//update_task.php

include('init.php');

if($_POST["task_list_id"])
{
 $data = array(
  ':completed'  => 'true',
  ':id'  => $_POST["task_list_id"]
 );

 $query = "
 UPDATE tasks
 SET completed = :completed 
 WHERE id = :id
 ";

 $statement = $connect->prepare($query);

 if($statement->execute($data))
 {
  echo 'done';
 }
}

?>
