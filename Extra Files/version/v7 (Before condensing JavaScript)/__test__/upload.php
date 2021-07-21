<?php
  error_reporting(0);
  if(isset($_FILES['image'])){
    // Creates the folder     
    $account = 'FBCHI8A3EBES96E4';
    if(!is_dir('uploads/'.$account)){
      mkdir('uploads/'.$account, 0755, true);
    }

    $task = 'uZwaAHNNkwH8oFWcgpQa9hBL';

    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
    $extensions= array("jpeg","jpg","png","txt");
    
    if(in_array($file_ext,$extensions)=== false){
      $errors[]='File type is not allowed. Please upload one of the following: jpeg, jpg, png, txt';
    }
      
    if($file_size > 2097152){
      $errors[]='File size must be less than 2 MB';
    }
      
    if(empty($errors)==true){
      move_uploaded_file($file_tmp,'uploads/'.$account.'/'.$account.'-'.$task.'-'.$file_name);
      echo "Success";
    }else{
      print_r($errors);
    }
  }
?>
<html>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
      </form>
      
   </body>
</html>