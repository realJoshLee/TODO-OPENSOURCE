<?php
require_once 'app/init/init-login.php';
require_once 'landing/tracking.php';
session_start();

// If the session is set, is redirects the user to the app
if (isset($_SESSION["suite"])) {
  header('Location: app/index.php');
}

// Checks if the magic link feature is enabled.
if($magiclinken=='false'){
  header('Location: error.php?err=magiclink');
}



















if($_GET['pg']=='linkclicked'){
  if(isset($_GET['otk'])){
    $otk = $_GET['otk'];

    $usersget = $db->prepare("SELECT * FROM `passwordlogin` WHERE `otk` = :otk");
    $usersget->execute([
      'otk' => $otk,
    ]);
    $users = $usersget->rowCount() ? $usersget : [];

    foreach($users as $item){

      // Sets to null
      $nullquery = $db->prepare("
        UPDATE passwordlogin SET otk = NULL WHERE username = :username
      ");
      $nullquery->execute([
        ':username' => $item['username'],
      ]);

      // Assigned the session as the username/account email
      $_SESSION["suite"] = $item['username'];

      // Gets the cookie and encrypts it
      $token_cookie = base64_encode(openssl_encrypt($item["token"], $method, $key, OPENSSL_RAW_DATA, $iv));
      setcookie('token',$token_cookie,time()+604800); // 86400 = 1 day 604800

      // Regenerates the session code
      session_regenerate_id(true);

      // Sends the user to the app
      header('Location: app/index.php');
  
      // Makes log quert
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, loginip, logindevice, loginos, loginbrowser, date)
        VALUES (:account, :content, :loginip, :logindevice, :loginos, :loginbrowser, :date)
      ");
      $content = 'Successful login - via magic link';
      $logQuery->execute([
        ':account' => $item["accountid"],
        ':content' => $content,
        ':date' => $logdate,
        ':loginip' => $loginip,
        ':logindevice' => $logindevice,
        ':loginos' => $loginos,
        ':loginbrowser' => $loginbrowser,
      ]);
    }
  }
}




















require 'app/plugins/mailjet/vendor/autoload.php';
use \Mailjet\Resources;
// Handles everything for the user to login
if (isset($_POST["login"])) {
  if (empty($_POST["username"])) {
    // What happens if none or just one of the fields are entered.
    echo '<script>alert("Please type your email")</script>';
  } else {
    $formemail = $_POST['username'];
    $usersget = $db->prepare("SELECT * FROM `passwordlogin` WHERE `username` = :account");
    $usersget->execute([
      'account' => $formemail,
    ]);
    $users = $usersget->rowCount() ? $usersget : [];

    foreach($users as $item){
      // Magic link key
      $str = rand();
      $key = hash("sha256", $str);

      // Set the magic key
      $logQuery = $db->prepare("
        UPDATE passwordlogin SET otk = :otk WHERE username = :username
      ");
      $logQuery->execute([
        ':username' => $formemail,
        ':otk' => $key
      ]);

      // Sends the email
      $mj = new \Mailjet\Client(''.$apipublic.'',''.$apiprivate.'',true,['version' => 'v3.1']);
      $body = [
        'Messages' => [
          [
            'From' => [
              'Email' => "".$fromemail."",
              'Name' => "".$fromname.""
            ],
            'To' => [
              [
                'Email' => "".$formemail."",
                'Name' => ""
              ]
            ],
            'Subject' => "Login - Magic Link",
            'TextPart' => "Login - Magic Link",
            'HTMLPart' => '<p>Wasn\'t you? Maybe change your password but don\'t click the link.</p><br><a href="https://'.$rootwebsite.'/magic-link.php?pg=linkclicked&otk='.$key.'">Log me in!</a>',
            'CustomID' => "Login - Magic Link"
          ]
        ]
      ];
      $response = $mj->post(Resources::$Email, ['body' => $body]);
      $response->success() && var_dump($response->getData());
  
      // Makes log query
      $logQuery = $db->prepare("
        INSERT INTO tasks_log (account, content, loginip, logindevice, loginos, loginbrowser, date)
        VALUES (:account, :content, :loginip, :logindevice, :loginos, :loginbrowser, :date)
      ");
      $content = 'Magic link sent';
      $logQuery->execute([
        ':account' => 'SYSTEM',
        ':content' => $content,
        ':date' => $logdate,
        ':loginip' => $loginip,
        ':logindevice' => $logindevice,
        ':loginos' => $loginos,
        ':loginbrowser' => $loginbrowser,
      ]);

      header('Location: ?pg=sent');
    }
  }
}
?>
<!DOCTYPE html>
<html>

  <head>
    <title>Login</title>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta content="text/html; charset=UTF-8; X-Content-Type-Options=nosniff" http-equiv="Content-Type" />
    <link rel="shortcut icon" type="image/png" href="app/icons/favicon.png"/>

    <!--Scripts-->
    <link href="app/fa/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/rdi8jbs.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!--iOS PWA Compatability-->
    <link rel="apple-touch-icon" href="icons/favicon.png">
    <meta name="apple-mobile-web-app-title" content="Tasks">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <meta name="apple-mobile-web-app-capable" content="yes">
  </head>

  <body>
        <div class="container">
          <div class="center">            
            <img src="app/icons/Landing.png" class="logo">
          </div>        
          <?php if($_GET["pg"] == "send"): ?>
            <div class="left-force">
              <h4>Welcome to Tasks 👋</h4>
              <p>Type your email below and we'll email you a magic link to login with. <a href="login.php" class="link">Login with my password instead.</a></p>
            </div>
            <form method="post">
              
              <div class="input-section">
                <label for="username" class="form-label">Email</label>
                <input type="email" name="username" required class="form-control-new" placeholder="user@example.com"/>
              </div>       

              <div class="align-right-container">
                <div class="align-right">
                  <input type="submit" name="login" value="Send Link" class="btn btn-info" />
                </div>
              </div>

              <br>
              <div class="center">
                <a href="privacy-terms.html" class="link">Privacy Policy and Terms of Service</a>
              </div>
            </form>
          <?php endif; ?>

          <?php if($_GET["pg"] == "sent"): ?>
            <div class="left-force">
              <h4>Welcome to Tasks 👋</h4>
              <p>We sent the email. Go check your inbox.</p>
            </div>
          <?php endif; ?>

          <?php if($_GET["pg"] == "linkclicked"): ?>
            <div class="left-force">
              <h4>Welcome to Tasks 👋</h4>
              <p>We're working to sign you in right now!</p>
            </div>
          <?php endif; ?>
        </div>
  </body>
</html>
<style>
<?php include('landing/login-style.css'); ?>
</style>