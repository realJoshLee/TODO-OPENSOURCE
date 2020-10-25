<?php

//delete_task.php

include('init.php');

if($_POST["id"])
{
 $data = array(
  ':id'  => $_POST['id']
 );

 $query = "
 DELETE FROM tasks  
 WHERE id = :id
 ";

 $statement = $connect->prepare($query);

 if($statement->execute($data))
 {
  echo 'done';
 }
}



?>