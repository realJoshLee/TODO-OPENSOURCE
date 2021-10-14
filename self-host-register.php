<?php
require_once 'app/init/init-login.php';

if (isset($_POST["register"])) { 
  $logQuery = $db->prepare("
    INSERT INTO `tasks_license_keys` (first, last, emailassociated, domain, license, end)
    VALUES (:first, :last, :emailassociated, :domain, :license, :end)
  ");
  $logQuery->execute([
    ':first' => $_POST['first'],
    ':last' => $_POST['last'],
    ':emailassociated' => $_POST['email'],
    ':domain' => $_POST['domain'],
    ':license' => $_POST['license'],
    ':end' => '2099-12-31'
  ]);

  header('Location: ?page=success');
}

$lengthCode = 10;
function getCode($lengthCode) {
  $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $randomString = '';
  for ($i = 0; $i < $lengthCode; $i++) {
    $index = rand(0, strlen($characters) - 1);
    $randomString .= $characters[$index];
  }
  return $randomString;
}
?>
<!DOCTYPE html>
<html>

  <head>
    <title>Tasks - Self Host</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="app/icons/favicon.png"/>

    <!--Scripts-->
    <link href="app/fa/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/rdi8jbs.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </head>

  <body>
    <div class="container">
      <div class="center">            
        <img src="app/icons/Landing.png" class="logo">
      </div>
      <?php if($_GET['page']=='success'){?>
        <div class="left-force">
          <h4>Self Host Registration Success!</h4>
          <p>We appreciate you filling out this form even though it isn't required.</p>
          <a href="https://github.com/realJoshLee/TODO-OPENSOURCE" class="link"><i class="fab fa-github"></i> GitHub Download</a>
        </div>
      <?php }else{ ?>

      <div class="left-force">
        <h4>Self Host Registration</h4>
        <p>Fill out the form below and get the link to self host the app. This form isn't mandatory but is reccomended to keep track of who has is self hosting.</p>
      </div>
      <form method="post">
        <div class="input-section">
          <label for="first" class="form-label">First Name</label>
          <input type="text" name="first" required class="form-control-new" placeholder="First Name" required/>
        </div>
        
        <div class="input-section">
          <label for="last" class="form-label">Last Name</label>
          <input type="text" name="last" required class="form-control-new" placeholder="Last Name" required/>
        </div>
        
        <div class="input-section">
          <label for="email" class="form-label">Email Address</label>
          <input type="text" name="email" required class="form-control-new" placeholder="email@example.com" required/>
        </div>
        
        <div class="input-section">
          <label for="domain" class="form-label">Domain Hosting</label>
          <input type="text" name="domain" required class="form-control-new" placeholder="tasks.example.com"/>
        </div>
        
        <div class="input-section">
          <label for="license" class="form-label">License Keys</label><br>
          <span class="form-label">Please make sure to copy this license key down and the email address that you used above. Fill this in on the setup.php page when setting up the app.</span>
          <input type="text" name="license" required readonly class="form-control-new" value="<?php echo getCode($lengthCode).'-'.getCode($lengthCode).'-'.getCode($lengthCode).'-'.getCode($lengthCode); ?>"/>
        </div>

        <div class="align-right-container">
          <div class="align-right">
            <input type="submit" name="register" value="Register" class="btn btn-info" />
          </div>
        </div>
      </form>
      
      <?php } ?>
    </div>
  </body>
</html>
<style>
<?php include('landing/login-style.css'); ?>
</style>