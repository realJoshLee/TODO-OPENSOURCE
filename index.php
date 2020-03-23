<!--Handles the making of the accounts and the login of the accounts. Also handles the encryption of accounts-->
<?php  
 $connect = mysqli_connect("hostaddress", "username", "password", "databasename");  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
      header("location:app/index.php");  
 }  
 if(isset($_POST["register"]))  
 {  
      if(empty($_POST["username"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);
           $password = password_hash($password, PASSWORD_DEFAULT);  
           $query = "INSERT INTO users(username, password) VALUES('$username', '$password')";  
           if(mysqli_query($connect, $query))  
           {  
                echo '<script>alert("Registration Done")</script>';  
           }  
      }  
 }  
 if(isset($_POST["login"]))  
 {  
      if(empty($_POST["username"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $query = "SELECT * FROM users WHERE username = '$username'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                     if(password_verify($password, $row["password"]))  
                     {  
                          //return true;  
                          $_SESSION["username"] = $username;  
                          header("location:app/index.php");  
                     }  
                     else  
                     {  
                          //return false;  
                          echo '<script>alert("Wrong User Details")</script>';  
                     }  
                }  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';  
           }  
      }  
 }  
 ?>  
<!DOCTYPE html>  
<html>  
  <head>  
    <title>Login</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="description" content="The official portfolio of Josh Lee.">
    <meta name="keywords" content="HTML,code,Josh Lee,Josh,Lee,Portfolio,Self-Hosted,realjoshlee,RealJoshLee,joshlee,joshlee.pw,joshleepw">
    <meta name="author" content="Josh Lee - joshlee.pw">
        
    <!--Links to stylesheets-->
		<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png"/>
    <link rel="stylesheet" href="index.css">
        
    <!--Font Links-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <!--font-family: 'Raleway', sans-serif; - font-family: 'Montserrat', sans-serif; - font-family: 'Open Sans', sans-serif;-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>  
  <body> 
    <br><br><br><br><br>
    <div class="body-container">
      <div class="logo">
        <img src="assets/images/favicon.png" class="logo">
      </div>
      <br><br><br><br>
      <div class="container">
      <?php  
        if(isset($_GET["action"]) == "login")  
        {  
        ?>  
        <!--Login section-->
        <h3>Login</h3>  
        <!--Alert for wrong user details-->
        <div class="wronguser" id="wronguser"></div>
        <br>  
        <form method="post">  
          <input type="text" name="username" class="form-control" placeholder="Username"/>  
          <br><br>
          <input type="password" name="password" class="form-control" placeholder="Password"/>  
          <br><br>
          <input type="submit" name="login" value="Login" class="btn btn-info" />  
          <br>
          <a href="index.php" class="footer-link"><p class="footer-link-container">Register</p></a>  
        </form>  
        <?php       
          }  
          else  
          {  
          ?>  
        <!--Make new account section-->
        <h3>Register</h3>  
        <br>  
        <form method="post">  
          <input type="text" name="username" class="form-control" placeholder="Username"/>  
          <br><br>
          <input type="password" name="password" class="form-control" placeholder="Password"/>  
          <br><br>
          <input type="submit" name="register" value="Register" class="btn btn-info" />  
          <br>  
          <a href="index.php?action=login" class="footer-link"><p class="footer-link-container">Login</p></a>
        </form>  
        <?php  
          }            
          ?>  
      </div> 
    </div>
  </body>  
</html>
<style>
  /*Global*/
  html, body {
    font-family: 'Montserrat', Arial, Helvetica, sans-serif;

    color: #080808;
    background-color: #f3f2f3;

    padding: 0;
    margin: 0;
  }








  /*Body*/
  div.body-container {
    margin: auto;
    width: 300px;
    height: auto;

    background-color: #fff;
    color: #080808;

    border-radius: 15px;

    padding: 10px;

    -webkit-box-shadow: 0px 0px 43px -6px rgba(0,0,0,0.1);
    -moz-box-shadow: 0px 0px 43px -6px rgba(0,0,0,0.1);
    box-shadow: 0px 0px 43px -6px rgba(0,0,0,0.1);
  }
  
  input.form-control {
    width: 290px;

    border-top: transparent;
    border-bottom: 1px solid #a9a9a9;
    border-left: transparent;
    border-right: transparent;

    padding-top: 3px;
    padding-bottom: 3px;
    padding-left: 5px;
    padding-right: 5px;

    font-size: 14px;
    color: #080808;
  }

  input.form-control:focus {
    outline: transparent;
    border: 1px solid #a9a9a9;

    transition-duration: 0.3s;
  }

  input.form-control::placeholder {
    color: #a9a9a9;
  }

  input.btn {
    width: 300px;

    background: linear-gradient(225deg, rgba(12,100,231,1) 0%, rgba(82,151,255,1) 100%);
    border: transparent;
    border-radius: 10px;

    padding-top: 10px;
    padding-bottom: 10px;

    color: #fff;
    font-size: 14px;
  }

  input.btn:hover {
    opacity: 0.7;
    cursor: pointer;
    background: linear-gradient(107deg, rgba(12,100,231,1) 0%, rgba(82,151,255,1) 100%);
    transition-duration: 0.3s;
  }

  p.footer-link-container {
    width: 300px;

    background: linear-gradient(225deg, rgba(12,100,231,1) 0%, rgba(82,151,255,1) 100%);
    border: transparent;
    border-radius: 10px;

    padding-top: 10px;
    padding-bottom: 10px;

    color: #fff;
    font-size: 14px;

    text-align: center;
  }

  p.footer-link-container:hover {
    opacity: 0.7;
    cursor: pointer;
    background: linear-gradient(107deg, rgba(12,100,231,1) 0%, rgba(82,151,255,1) 100%);
    transition-duration: 0.3s;
  }

  a.footer-link {
    color: #fff;
    text-decoration: none;
  }

  div.logo {
    text-align: center;
  }

  img.logo {
    height: 110px;
    width: 150px;
  }








  /*Responsive*/
  @media screen and (max-width: 600px) {
    html, body {
      background-color: #fff;
    }

    div.body-container {
      width: 100%;

      -webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);
      -moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);
      box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);
    }

    input.form-control {
      width: 95%;
    }

    p.footer-link-container {
      width: 100%;
    }

    input.btn {
      width: 100%;
    }
  }
</style>