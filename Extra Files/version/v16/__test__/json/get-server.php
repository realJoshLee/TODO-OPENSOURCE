<?php
//open connection to mysql db
$connection = mysqli_connect("10.0.1.98","josh","password1","webapps") or die("Error " . mysqli_error($connection));
$account = $_POST['account'];
//fetch table rows from mysql db
$sql = "select * from tasks_tasks where account = '$account' and completed = 'false'";
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