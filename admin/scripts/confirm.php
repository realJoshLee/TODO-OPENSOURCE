<?php
if(isset($_POST['submit'])){
  if($_GET['confirm']=='purge-setup'){
    header('Location: purge-setup-files.php');
  }

  if($_GET['confirm']=='reset-folder-shares'){
    header('Location: folder-share-reset.php');
  }

  if($_GET['confirm']=='token-refresh'){
    header('Location: token-refresh.php');
  }
}
if(isset($_POST['dontdel'])){
  header('Location: ../index.php?p=main');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container" style="text-align:center;">
      <br><br>
      <?php
        if($_GET['confirm']=='purge-setup'){
          echo '<h2>Purge Setup Files</h2>';
          echo '<p>Are you sure that you want to purge all setup files? This can\'t be undone.';
        }

        if($_GET['confirm']=='reset-folder-shares'){
          echo '<h2>Reset Folder Shares</h2>';
          echo '<p>Are you sure that you want to reset all folder shares? This can\'t be undone.';
        }

        if($_GET['confirm']=='token-refresh'){
          echo '<h2>Refresh Login Tokens</h2>';
          echo '<p>Are you sure that you want to refresh all of the login tokens? This can\'t be undone.';
        }
      ?>
      <form method="POST">
        <input type="submit" class="btn btn-danger" value="Continue" name="submit">
        <input type="submit" class="btn btn-secondary" value="DON'T Continue" name="dontdel">
      </form>
    </div>
  </body>
</html>