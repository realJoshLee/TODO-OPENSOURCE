<?php
if($admin=='true'){
}else{
  header('Location: ../index.php');
}

$logdate = date('M-d-Y h:i:sa', strtotime('+0 day'));