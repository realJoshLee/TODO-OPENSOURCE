<!--Redirects the user to the login page if they aren't logged in already.-->
<?php  
  session_start();  
  if(!isset($_SESSION["username"]))  {  
    header("location:../../index.php?action=login");  
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Send Feedback</title>
	
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="author" content="Josh Lee - joshlee.pw">
        
    <!--Links to stylesheets-->
    <link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png"/>
    <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon"/>
        
    <!--Font Links-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <!--font-family: 'Raleway', sans-serif; - font-family: 'Montserrat', sans-serif; - font-family: 'Open Sans', sans-serif;-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <br><br>
    <div class="body">
      <!--Header content for the website-->
      <div class="header">
        <img src="../assets/images/favicon.png" class="logo">
        <p>Give your feedback/bug/comment below.<br>If you want us to get back to you, please add a<br>name and a email to the feedback form.</p>
      </div>

      <br><br><br>

      <!--Add a comment container-->
      <div class="commentadd">
        <!--The form where you add a comment-->
        <form class="item-add" action="add.php" method="post">
          Comment: <br>
          <!--<input type="text" name="comment" class="form" autocomplete="off" required autofocus>-->
          <textarea class="form" rows="10" cols="50" name="comment" placeholder="Enter your feedback here." required autofocus autocomplete="off"></textarea>
          <br><br>
          <input type="submit" value="Add" class="submit">
        </form>
      </div>
    </div>
  </body>
</html>

<style>
  /*Global*/
  html,body {
    font-family: 'Montserrat', Arial, Helvetica, sans-serif;
    color: #080808;

    background-color: #f5f5f7;

    text-align: center;

    padding: 0;
    margin: 0;
  }









  /*Body*/
  textarea.form {
    background: transparent;
    outline: transparent;

    font-family: 'Montserrat', Arial, Helvetica, sans-serif;

    width: 400px;
    height: 300px;
  }

  input.submit {
    width: 405px;

    background: linear-gradient(225deg, rgba(12,100,231,1) 0%, rgba(82,151,255,1) 100%);
    border: transparent;
    border-radius: 10px;

    padding-top: 10px;
    padding-bottom: 10px;

    color: #fff;
    font-size: 14px;
  }

  input.submit:hover {
    opacity: 0.7;
    cursor: pointer;
    background: linear-gradient(107deg, rgba(12,100,231,1) 0%, rgba(82,151,255,1) 100%);
    transition-duration: 0.3s;
  }

  img.logo {
    height: 70px;
    width: 100px;
  }











  /*Responsive*/
  @media screen and (max-width: 422px) {
    textarea.form {
      width: 395px;
      height: 300px;
    }

    input.submit {
      width: 400px;
    }
  }
  
  @media screen and (max-width: 400px) {
    textarea.form {
      width: 350px;
      height: 300px;
    }

    input.submit {
      width: 355px;
    }
  }
  
  @media screen and (max-width: 364px) {
    textarea.form {
      width: 300px;
      height: 300px;
    }

    input.submit {
      width: 305px;
    }
  }
</style>