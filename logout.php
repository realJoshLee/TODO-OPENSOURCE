<?php  
 //logout.php  
 session_start();  
 setcookie('token','',time()-604801);
 session_destroy();  
 header("location: login.php");  
 ?>  