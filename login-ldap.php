<?php
require_once 'app/init/init-login.php';
session_start();

// If the session is set, is redirects the user to the app
if(isset($_SESSION["suite"])) {
  header('Location: app/index.php');
}

// Checks to make sure that LDAP is configured
if($ldap_domain==''){
  header('Location: logout.php?err=ldapnotconfigured');
}


















// This is for the login cookie
if(isset($_COOKIE['token'])){
  // Decrypts the token/cookie
  $decrypttoken = openssl_decrypt(base64_decode($_COOKIE['token']), $method, $key, OPENSSL_RAW_DATA, $iv);

  // Gets everything from the database from the decrypted token
  $useraccget = $db->prepare("SELECT * FROM `passwordlogin` WHERE `token` = :token");
  $useraccget->execute([
    'token' => $decrypttoken
  ]);
  $useracc = $useraccget->rowCount() ? $useraccget : [];

  // Assigns the Session based on the users token then redirects the user to the app
  foreach($useracc as $item){
    $_SESSION['suite'] = $item['username'];
    header('Location: app/index.php#planning');
        
    // Makes log query
    $logQuery = $db->prepare("
      INSERT INTO tasks_log (account, content, loginip, logindevice, loginos, loginbrowser, date)
      VALUES (:account, :content, :loginip, :logindevice, :loginos, :loginbrowser, :date)
    ");
    $content = 'Successful login via LDAP';
    $logQuery->execute([
      ':account' => $item['username'],
      ':content' => $content,
      ':date' => $logdate,
      ':loginip' => $loginip,
      ':logindevice' => $logindevice,
      ':loginos' => $loginos,
      ':loginbrowser' => $loginbrowser,
    ]);
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
    <link href="app/plugins/fa/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/rdi8jbs.css">

    <!--iOS PWA Compatability-->
    <link rel="apple-touch-icon" href="icons/favicon.png">
    <meta name="apple-mobile-web-app-title" content="Tasks">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <meta name="apple-mobile-web-app-capable" content="yes">
  </head>
  <body>
    <div class="main">
      <div class="overlay-color">
        <div class="container">
          
          <div class="row">
            <div class="column left">
              <div class="left-content">
              </div>
            </div>
            
            <div class="column right">
              <div class="login-container">
                <div class="login-form">

                    <?php
                    if (isset($_POST["login"])) {
                      if (empty($_POST["username"]) || empty($_POST["password"])) {
                        // What happens if none or just one of the fields are entered.
                        echo '<script>alert("Both Fields are required")</script>';
                      } else {
                        $username = $_POST["username"];
                        $password = $_POST["password"];
                    
                    
                        //We just need six varaiables here
                        $baseDN = $ldap_baseDN;
                        $adminDN = $ldap_adminDN;//this is the admin distinguishedName
                        $adminPswd = $ldap_adminPass;
                        //$username = 'john.doe';//this is the user samaccountname
                        $userpass = $password;
                        $ldap_conn = ldap_connect("$ldap_serverIP");//I'm using LDAPS here
                    
                        if (! $ldap_conn) {
                          //echo ("<p style='color: red;'>Couldn't connect to LDAP service</p>");
                        }else{    
                          //echo ("<p style='color: green;'>Connection to LDAP service successful!</p>");
                        }
                        //The first step is to bind the administrator so that we can search user info
                        $ldapBindAdmin = ldap_bind($ldap_conn, $adminDN, $adminPswd);
                    
                        if ($ldapBindAdmin){
                            //echo ("<p style='color: green;'>Admin binding and authentication successful!!!</p>");
                    
                            $filter = '(sAMAccountName='.$username.')';
                            $attributes = array("givenName", "sn", "name", "telephonenumber", "mail", "samaccountname");
                            $result = ldap_search($ldap_conn, $baseDN, $filter, $attributes);
                    
                            $entries = ldap_get_entries($ldap_conn, $result);  
                            $userEmail = $entries[0]["mail"][0];  
                            $userDN = $entries[0]["name"][0];  
                            $userFN = $entries[0]["givenName"][0];  
                            $userLN = $entries[0]["sn"][0];  
                            //echo ('<p style="color:green;">I have the user DN: '.$userEmail.'</p>');
                    
                            //Okay, we're in! But now we need bind the user now that we have the user's DN
                            $ldapBindUser = ldap_bind($ldap_conn, $userDN, $userpass);
                    
                            if($ldapBindUser){
                                // What happens if the credentials were correct.
                                //echo ("<p style='color: green;'>User authentication successful.</p>");

                                $dbload = "SELECT * FROM `passwordlogin` WHERE username = '$userEmail'";
                                $conload = $conn->query($dbload);
                                $load = mysqli_num_rows($conload);

                                if($load==1){
                                  $usersget = $db->prepare("SELECT * FROM passwordlogin WHERE username = :account");
                                  $usersget->execute([
                                    'account' => $userEmail
                                  ]);
                                  $usersdb = $usersget->rowCount() ? $usersget : [];

                                  foreach($usersdb as $item){
                                    // Assigned the session as the username/account email
                                    $_SESSION["suite"] = $userEmail;

                                    // Gets the cookie and encrypts it
                                    $token_cookie = base64_encode(openssl_encrypt($item['token'], $method, $key, OPENSSL_RAW_DATA, $iv));
                                    setcookie('token',$token_cookie,time()+2678400); // 86400 = 1 day, 2678400 = 31 days

                                    // Regenerates the session code
                                    session_regenerate_id(true);

                                    // Sends the user to the app
                                    header('Location: app/index.php');
                                  }
                                }
                                
                                if($load==0){
                                  // For the accountid
                                  $accountlength = 16;
                                  function getAcc($lengthCode) {
                                    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                    $randomString = '';
                                    for ($i = 0; $i < $lengthCode; $i++) {
                                      $index = rand(0, strlen($characters) - 1);
                                      $randomString .= $characters[$index];
                                    }
                                    return $randomString;
                                  }
                                  $accountid = getAcc($accountlength);

                                  // Generates a token for each user signed up
                                  /*$nlength=100; 
                                  function getName($nlength) { 
                                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
                                    $randomString = ''; 
                                    for ($i = 0; $i < $nlength; $i++) { 
                                      $index = rand(0, strlen($characters) - 1); 
                                      $randomString .= $characters[$index]; 
                                    } 
                                    return $randomString; 
                                  } 
                                  $token = getName($nlength); */
                                  $str = rand();
                                  $token = hash("sha256", $str);

                                  $strtwo = rand();
                                  $identifier = hash("sha256", $strtwo);

                                  $query = "INSERT INTO passwordlogin(accountid, firstname, lastname, username, password, recovery, preminum, token, identifier, verified, setupcomplete) VALUES('$accountid', '$userFN','$userLN','$userEmail', 'LDAP', 'LDAP','false','$token','$identifier','true','true')";
                                  if (mysqli_query($connect, $query)) {
                                    // The code that runs if the registration is successful
                                    echo ("<p style='color: green;'>Credentials saved. Please login again.</p>");  
                                  }
                                }

                                
                    
                                ldap_unbind($ldap_conn); // Clean up after ourselves.
                    
                            } else {
                                echo ("<p style='color: red;'>Login info incorrect.</p>");   
                            }     
                    
                        } else {
                            echo ("<p style='color: red;'>Login info incorrect.</p>");   
                        } 
                    
                        
                      }
                    }
                    ?>

                    <h2 class="maintxt">Sign in</h2>

                    <br>

                    <form method="post">
                      
                      <div class="input-section">
                        <label for="username" class="form-label">Email</label><br>
                        <input type="text" name="username" required class="form-control-new"/>
                      </div>              
                      
                      <br><br>
                      
                      <div class="input-section">
                        <label for="password" class="form-label">Password</label><br>
                        <input type="password" name="password" required class="form-control-new"/>
                      </div>

                      <br>

                      <div class="align-right-container">
                        <div class="align-right">
                          <input type="submit" name="login" value="Login" class="btn btn-info" />
                        </div>
                      </div>
                    </form>

                    <br><br>

                    <p>Please login with your Active Directory/LDAP account provided to you by your admin.</p>
                    <p>When logging in, please only include your AD username, not your full email address.</p>
                    <p>If you forgot your password, please contact your domain admin.</p>
                    <p>Accounts managed by: <?php echo $ldap_domain; ?></p>

                </div>
              </div>
            </div>
          </div>

          <div class="notice">
            <p><i class="fab fa-unsplash"></i>&nbsp;&nbsp;Backgrounds from Unsplash</p>
          </div>

        </div>
      </div>
    </div>
  </body>
</html>
<style>
<?php include('landing/login-v2.css'); ?>
</style>