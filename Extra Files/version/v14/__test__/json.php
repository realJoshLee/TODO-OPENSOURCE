<?php
//open connection to mysql db
$connection = mysqli_connect("10.0.1.98","josh","password1","webapps") or die("Error " . mysqli_error($connection));

//fetch table rows from mysql db
$sql = "select * from tasks_tasks where account = 'FBCHI8A3EBES96E4' and completed = 'false'";
$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

//create an array
$emparray = array();
while($row =mysqli_fetch_assoc($result))
{
    $emparray[] = $row;
}
$jsondata = json_encode($emparray, true);
//echo json_encode($emparray);

//close the db connection
mysqli_close($connection);

echo $jsondata;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
</body>
</html>