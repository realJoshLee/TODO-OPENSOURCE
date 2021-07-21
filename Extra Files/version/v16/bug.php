<?php
  include 'init/init.php';

  if($bugreporten=='false'){
    header('Location: ../error.php?err=bugreport');
  }
?>
<!DOCTYPE html>
<html lang="en" class="theme-ctrl">
  <head>
    <?php include('dynamic/header-content.php'); ?>
  </head>
  <body class="theme-ctrl">
    <div class="container">
      <div class="container-inner">

        <div class="top-nav">
          <div class="top-nav-inner">
            <img src="icons/check.svg" class="logo">
          </div>
        </div>

        <div class="content-main">
          <div class="center">
            <h2>Submit a Bug/Issue</h2>
          </div>
          <form action="scripts/bug-submit.php" method="POST">
            <input type="text" name="account" value="<?php echo $accountemail; ?>" readonly class="form-control"><br>
            <textarea name="message" class="form-control" placeholder="Bug/Issue"></textarea><br>
            <input type="submit" class="form-control-submit" value="Submit Bug">
          </form>
        </div>

      </div>
    </div>
  </body>
</html>
<style>
  .form-control {
    outline: none;
    border: 1px solid #ddd;
    border-radius: 5px;
    
    margin: 3px;
    padding: 5px;

    width: 100%;
  }

  textarea.form-control {
    height: 100px;
    font-family: Arial;
  }

  .form-control-submit {
    outline: none;
    border: none;
    border-radius: 5px;
    background: #006fff;
    color: #fff;
    width: 100%;
    height: 30px;
    margin: 3px;
  }

  .form-control-submit:hover {
    cursor: pointer;
    opacity: 0.5;
    transition-duration: 0.1s;
  }

  .center {
    text-align: center;
  }

  <?php include 'style/setup.css'; ?>
</style>
<script>
  <?php include 'scripts/setup.js'; ?>
</script>