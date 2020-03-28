<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="description" content="The official portfolio of Josh Lee.">
    <meta name="keywords" content="HTML,code,Josh Lee,Josh,Lee,Portfolio,Self-Hosted,realjoshlee,RealJoshLee,joshlee,joshlee.pw,joshleepw">
    <meta name="author" content="Josh Lee - joshlee.pw">

    <!--Links to stylesheets-->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png" />

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
        <h3>Forgot Password</h3>
        <form action="reset-password-function.php" method="post">
          <input type="email" class="form-control" name="email" required placeholder="Email on Account"><br><br>
          <input type="text" class="form-control" name="code" required placeholder="Recovery Code">
          <p class="red">We can't reset your password without a recovery code.</p><br>
          <input type="password" class="form-control" name="password" required placeholder="New Password"><br><br>
          <input type="submit" class="btn" value="Reset Password">
        </form>
      </div>
    </div>
  </body>
</html>

<style>
  /*Global*/
  html,
  body {
    font-family: 'Montserrat', Arial, Helvetica, sans-serif;

    color: #080808;
    background-color: #f3f2f3;

    padding: 0;
    margin: 0;
  }

  .red {
    color: red;
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

    -webkit-box-shadow: 0px 0px 43px -6px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0px 0px 43px -6px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 0px 43px -6px rgba(0, 0, 0, 0.1);
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

    background: linear-gradient(225deg, rgba(12, 100, 231, 1) 0%, rgba(82, 151, 255, 1) 100%);
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
    background: linear-gradient(107deg, rgba(12, 100, 231, 1) 0%, rgba(82, 151, 255, 1) 100%);
    transition-duration: 0.3s;
  }

  p.footer-link-container {
    width: 300px;

    background: linear-gradient(225deg, rgba(12, 100, 231, 1) 0%, rgba(82, 151, 255, 1) 100%);
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
    background: linear-gradient(107deg, rgba(12, 100, 231, 1) 0%, rgba(82, 151, 255, 1) 100%);
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
    height: 150px;
    width: 150px;
  }








  /*Responsive*/
  @media screen and (max-width: 600px) {

    html,
    body {
      background-color: #fff;
    }

    div.body-container {
      width: 100%;

      -webkit-box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0);
      -moz-box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0);
      box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0);
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