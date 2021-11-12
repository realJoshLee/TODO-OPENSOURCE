<?php
error_reporting(0);

if (isset($_POST["submit"])) {
  // Initial Configuration
  $fp=fopen('app/init/conf_file.php','w');
  $code = "<?php 
  \$dbip = '".$_POST['3']."';
  \$dbname = '".$_POST['4']."';
  \$dbusername = '".$_POST['1']."';
  \$dbpassword = '".$_POST['2']."';
  \$encpassword = '".$_POST['5']."';
  \$enciv = '".$_POST['6']."';
  \$licenseemail = '".$_POST['7']."';
  \$licensekey = '".$_POST['8']."';
  \$ldap_baseDN = '".$_POST['10']."';
  \$ldap_adminDN = '".$_POST['11']."';
  \$ldap_adminPass = '".$_POST['12']."';
  \$ldap_serverIP = '".$_POST['13']."';
  \$ldap_domain = '".$_POST['15']."';
  \$restrict_login = '".$_POST['14']."';
  ";
  fwrite($fp, $code);
  fclose($fp);

  // Backup config
  $fp2=fopen('app/init/backup-enc.txt','w');
  $code2 = "dbip = ".$_POST['3']."
dbname = ".$_POST['4']."
dbusername = ".$_POST['1']."
dbpassword = ".$_POST['2']."
encpassword = ".$_POST['5']."
enciv = ".$_POST['6']."
licenseemail = ".$_POST['7']."
licensekey = ".$_POST['8']."
ldap_baseDN = ".$_POST['10']."
ldap_adminDN = ".$_POST['11']."
ldap_adminPass = ".$_POST['12']."
ldap_serverIP = ".$_POST['13']."
ldap_domain = ".$_POST['15']."
restrict_login = ".$_POST['14']."
";

  fwrite($fp2, $code2);
  fclose($fp2);

  // Creates the serial number doc
  // Generates the serial number
  $lengthCode = 15;
  function getCode($lengthCode) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $lengthCode; $i++) {
      $index = rand(0, strlen($characters) - 1);
      $randomString .= $characters[$index];
    }
    return $randomString;
  }
  $serialnum = getCode($lengthCode).'-'.getCode($lengthCode);

  $fp3=fopen('app/init/serial-number.php','w');
  $code3 = "<?php
\$serialnumber = '".$serialnum."';";

  fwrite($fp3, $code3);
  fclose($fp3);

  $createddbip = "".$_POST['3']."";
  $createddbname = $_POST['4'];
  $createddbusername = "".$_POST['1']."";
  $createddbpassword = "".$_POST['2']."";

  try {
    $conn = new PDO("mysql:host=$createddbip", $createddbusername, $createddbpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    // sql to create table
    $sql = "CREATE DATABASE IF NOT EXISTS `$createddbname`;
    USE `$createddbname`;
    CREATE TABLE IF NOT EXISTS `passwordlogin` (
      `id` int(255) NOT NULL AUTO_INCREMENT,
      `accountid` varchar(50) DEFAULT NULL,
      `firstname` varchar(50) DEFAULT NULL,
      `lastname` varchar(50) DEFAULT NULL,
      `username` varchar(500) DEFAULT NULL,
      `password` varchar(256) DEFAULT NULL,
      `recovery` varchar(256) DEFAULT NULL,
      `token` varchar(500) DEFAULT NULL,
      `otk` varchar(500) DEFAULT NULL,
      `identifier` varchar(500) DEFAULT NULL,
      `timezone` varchar(100) NOT NULL DEFAULT 'America/Detroit',
      `verified` varchar(256) DEFAULT 'false',
      `extensionadd` varchar(256) DEFAULT 'false',
      `backgroundsync` varchar(256) DEFAULT 'false',
      `reminder` varchar(256) DEFAULT 'false',
      `setupcomplete` varchar(256) DEFAULT 'false',
      `status` varchar(256) DEFAULT 'active',
      `taskcompletegoal` varchar(10) NOT NULL DEFAULT '2',
      `theme` varchar(50) NOT NULL DEFAULT 'light',
      `preminum` varchar(50) NOT NULL DEFAULT 'false',
      `preminumend` varchar(50) DEFAULT NULL,
      `admin` varchar(50) NOT NULL DEFAULT 'false',
      `archived` varchar(50) NOT NULL DEFAULT 'false',
      `created` datetime NOT NULL DEFAULT current_timestamp(),
      PRIMARY KEY (`id`),
      UNIQUE KEY `recovery` (`recovery`),
      UNIQUE KEY `username` (`username`),
      UNIQUE KEY `token` (`token`),
      UNIQUE KEY `accountid` (`accountid`),
      UNIQUE KEY `otk` (`otk`),
      UNIQUE KEY `identifier` (`identifier`)
    ) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
    
    INSERT INTO `passwordlogin` (`id`, `accountid`, `firstname`, `lastname`, `username`, `password`, `recovery`, `token`, `otk`, `identifier`, `timezone`, `verified`, `extensionadd`, `backgroundsync`, `reminder`, `setupcomplete`, `status`, `taskcompletegoal`, `theme`, `preminum`, `preminumend`, `admin`, `archived`, `created`) VALUES
      (48, '0X9A7O7FFMRWI2U2', 'Admin', 'Admin', 'admin@example.com', '$2y$10$QJO6ggpqgcJ6BmKM1aQBBusbnoWCf/wnM6zD2f2RXOx6yTlGYbyMW', 'R3-9TQZZ6BHXW-YZYCBVX7GL-J1HHUXKDLH-0PLGDVD1JF', 'c22087ed64185cd0d8e1f94224985a7d14111342eba5015817274ca0b84d87e7', NULL, NULL, 'America/Detroit', 'true', 'false', 'false', 'false', 'true', 'active', '2', 'light', 'true', NULL, 'true', 'false', '2021-09-24 00:24:54');
    
    
    
    
    
    
    
    
    
    
    CREATE TABLE IF NOT EXISTS `tasks_config` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `content` varchar(500) DEFAULT NULL,
      `whitelist` varchar(500) DEFAULT NULL,
      `whitelistvals` longtext DEFAULT NULL,
      `blockip` varchar(500) DEFAULT NULL,
      `blockedipvals` longtext DEFAULT NULL,
      `magic_link` varchar(500) DEFAULT NULL,
      `verification` varchar(500) DEFAULT NULL,
      `logpage` varchar(500) DEFAULT NULL,
      `sharepage` varchar(500) DEFAULT NULL,
      `accountcreate` varchar(500) DEFAULT NULL,
      `bugreport` varchar(500) DEFAULT NULL,
      `theme` varchar(500) DEFAULT NULL,
      `dataexport` varchar(500) DEFAULT NULL,
      `dataappexport` varchar(500) DEFAULT NULL,
      `dataloginexport` varchar(500) DEFAULT NULL,
      `errorreporting` varchar(500) DEFAULT NULL,
      `reminderemail` varchar(500) DEFAULT NULL,
      `ipwhitelist` varchar(500) DEFAULT NULL,
      `ipwhitelistval` longtext DEFAULT NULL,
      `contactemail` varchar(500) DEFAULT NULL,
      `rootwebsite` varchar(500) DEFAULT NULL,
      `fromemail` varchar(500) DEFAULT NULL,
      `fromname` varchar(500) DEFAULT NULL,
      `apipublic` varchar(500) DEFAULT NULL,
      `apiprivate` varchar(500) DEFAULT NULL,
      `smtphost` varchar(500) DEFAULT NULL,
      `smtpport` varchar(500) DEFAULT NULL,
      `smtpusername` varchar(500) DEFAULT NULL,
      `smtppassword` varchar(500) DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
    
    INSERT INTO `tasks_config` (`id`, `content`, `whitelist`, `whitelistvals`, `magic_link`, `verification`, `logpage`, `sharepage`, `accountcreate`, `bugreport`, `theme`, `dataexport`, `dataappexport`, `dataloginexport`, `errorreporting`, `reminderemail`, `ipwhitelist`, `ipwhitelistval`, `contactemail`, `rootwebsite`, `fromemail`, `fromname`, `apipublic`, `apiprivate`, `smtphost`, `smtpport`, `smtpusername`, `smtppassword`) VALUES
      (10, 'main_settings', 'false', 'example.com,example.org', 'false', '0.0.0.0,1.1.1.1', 'true', 'true', 'false', 'false', 'true', 'true', 'true', 'true', 'true', 'true', 'false', 'false', 'false', '0.0.0.0, 1.1.1.1', 'contact@example.com', 'tasks.example.net', 'no-reply@example.com', 'no-reply', '', '', 'smtp.gmail.com', 'smtp.gmail.com', '', '');
    
    
    
    
    
    
    
    
    
      CREATE TABLE IF NOT EXISTS `tasks_bug` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `account` varchar(64) DEFAULT NULL,
      `message` longtext DEFAULT NULL,
      `time` datetime DEFAULT current_timestamp(),
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
    
    
    
    
    
    
    
    
    
    CREATE TABLE IF NOT EXISTS `tasks_control` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `updatestatus` varchar(64) DEFAULT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
  INSERT INTO `tasks_control` (`id`, `updatestatus`) VALUES
      (10, 'up-to-date');
    
    
    
    
    
    
    
    
    
    CREATE TABLE IF NOT EXISTS `tasks_folders` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `account` varchar(50) DEFAULT NULL,
      `fid` varchar(50) DEFAULT NULL,
      `name` varchar(100) DEFAULT NULL,
      `color` varchar(100) DEFAULT 'grey',
      `sharedone` varchar(100) DEFAULT NULL,
      `sharedtwo` varchar(100) DEFAULT NULL,
      `sharedthree` varchar(100) DEFAULT NULL,
      `sharedfour` varchar(100) DEFAULT NULL,
      `sharedfive` varchar(100) DEFAULT NULL,
      `created` datetime DEFAULT current_timestamp(),
      PRIMARY KEY (`id`),
      UNIQUE KEY `fid` (`fid`)
    ) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
    
    
    
    
    
    
    
    
    
    CREATE TABLE IF NOT EXISTS `tasks_log` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `account` longtext DEFAULT NULL,
      `content` longtext DEFAULT NULL,
      `cfdata` longtext DEFAULT NULL,
      `loginip` longtext DEFAULT NULL,
      `logindevice` longtext DEFAULT NULL,
      `loginos` longtext DEFAULT NULL,
      `loginbrowser` longtext DEFAULT NULL,
      `date` varchar(500) DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=6704 DEFAULT CHARSET=utf8mb4;
    
    
    
    
    
    
    
    
    
    CREATE TABLE IF NOT EXISTS `tasks_rollout` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `tag` varchar(50) DEFAULT '0',
      `users` longtext DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
    
    
    
    
    
    
    
    
    
    CREATE TABLE IF NOT EXISTS `tasks_selfhost` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `first` varchar(200) DEFAULT NULL,
      `last` varchar(200) DEFAULT NULL,
      `email` varchar(200) DEFAULT NULL,
      `domain` varchar(200) DEFAULT NULL,
      `date` datetime DEFAULT current_timestamp(),
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
    
    
    
    
    
    
    
    
    
    CREATE TABLE IF NOT EXISTS `tasks_tasks` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `account` varchar(500) DEFAULT NULL,
      `tid` varchar(64) NOT NULL,
      `parenttid` varchar(24) DEFAULT NULL,
      `folderid` varchar(100) DEFAULT NULL,
      `name` mediumtext DEFAULT NULL,
      `notes` longtext DEFAULT NULL,
      `priority` varchar(100) NOT NULL DEFAULT 'p3',
      `shareable` varchar(100) NOT NULL DEFAULT 'false',
      `reminderdate` varchar(100) DEFAULT NULL,
      `remindersent` varchar(100) DEFAULT 'false',
      `scheduledate` varchar(100) DEFAULT NULL,
      `completed` varchar(64) NOT NULL DEFAULT 'false',
      `favorite` varchar(64) NOT NULL DEFAULT 'false',
      `dateshowcomplete` varchar(64) DEFAULT NULL,
      `completehour` varchar(64) DEFAULT NULL,
      `completemonth` varchar(64) DEFAULT NULL,
      `completeyear` varchar(64) DEFAULT NULL,
      `datecompleted` datetime DEFAULT NULL,
      `backenddate` datetime NOT NULL DEFAULT current_timestamp(),
      PRIMARY KEY (`id`),
      UNIQUE KEY `taskid` (`tid`) USING BTREE
    ) ENGINE=InnoDB AUTO_INCREMENT=874 DEFAULT CHARSET=latin1;";
  
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Records Created Successfully!";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  
  $conn = null;

  header("Location: ?val=success");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="app/icons/favicon.png"/>
    <title>App Setup</title>

    <script src="app/plugins/bootstrap/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="app/plugins/bootstrap/bootstrap.min.css">

    <script src="app/plugins/jquery.min.js"></script>
  </head>
  <body onload="generateStrings()">
    <div class="container-sm" style="width: 600px;">
      <?php if($_GET["val"]=='success'):?>
        <br><br>
        <div class="alert alert-warning" role="alert">
          Please make sure that you delete this file from the web server when you're done.
        </div>
        <br><br>
        <div class="alert alert-success" role="alert">
          Success! The app is now configured and ready to finished configuration. Pleas follow the steps listed below:
          <br><br>
          <ol class="list-group list-group-numbered">
            <li class="list-group-item">Log in with the default admin account with the following credentials:<br><b>Username:</b> admin@example.com<br><b>Password:</b> iX6qAMXk</li>
            <li class="list-group-item">When you log in with the default account it will direct you to the app settings page.</li>
          </ol>
          <br>
          View the full step by step to setup Tasks and configure everything by clicking <a target="_blank" href="app/extras/docs/index.html#initialsetupAdmin">HERE</a>
        </div>
      <?php endif; ?>

      <br><br>

      <h2>Getting Started</h2>
      <p>Please make sure that you read all of the instructions to make sure that the install goes smoothly.</p>
      <p>Please make sure that you're going through this page on a laptop/desktop for the best experience and to minimize any issues that you may come across.</p>
      <p>This file will create all of the needed databases, import all of the database tables, and inport all of the default setup records for you. All that you have to do is provide the login credentials. You can host your SQL server in the cloud if you want, just make sure that this web server has access to the SQL server through your firewall.</p>

      <br>
      <hr>
      <br><br>

      <h2>Configuration</h2>
      <br>

      <form method="POST">
        <h4>SQL Server Settings</h4>

        <label for="1" class="form-label">Database Username</label>
        <div id="emailHelp" class="form-text">This is the username that you use to log into your SQL server.</div>
        <input type="text" required name="1" class="form-control" placeholder="admin">

        <br>

        <label for="2" class="form-label">Database Password</label>
        <div id="emailHelp" class="form-text">This is the password that you use to log into your SQL server.</div>
        <input type="text" required name="2" class="form-control" placeholder="password">

        <br>

        <label for="3" class="form-label">Database Host (IP Address)</label>
        <div id="emailHelp" class="form-text">This the IP address of your SQL server on the network. Please make sure that the web server has access to the SQL server if their located on seperate VLANs.</div>
        <input type="text" required name="3" class="form-control" placeholder="10.0.1.55">

        <br>

        <label for="4" class="form-label">Create Database Name</label>
        <div id="emailHelp" class="form-text">If you are reinstalling the app and already have the data on an SQL server, update this value to the name of the database that the records are stored under. If you're installing the app for the first time, we reccomend leaving this at it's default value.</div>
        <input type="text" required name="4" class="form-control" value="tasksappdata" placeholder="tasksappdata">

        <br>

        <label for="5" class="form-label">Create Records?</label>
        <div id="emailHelp" class="form-text">If this is your first time setting up this app, please select 'Crete database and tables'. This option will create a database with the name specified above and then insert all of the tables and default data. If you are updating the app or the web server crashed and already have data on an SQL server, select 'DON'T create database and tables (Importing/using old records)'</div>
        <select class="form-control" name="5">
          <option value="true" selected>Create database and tables</option>
          <option value="false">DON'T create database and tables (Importing/using old records)</option>
        </select>

        <br><br><br>
        
        <h4>LDAP Auth (Optional)</h4>
        <p>If you would like to allow users to login to this app with their domain managed account then configure these settings. If you decide to skip these now you can always configure the settings later in 'app/init/conf_file.php'.</p>
        <p>When a user is logged in with their LDAP account they will not be able to change their email, name, pasword, or delete their account. If they want to change their password/name/email they will have to do it with services set in place outside of this app.</p>
        <p>When enabling LDAP login, this will not stop people from creating an account through the normal method.</p>

        <br>

        <label for="10" class="form-label">BaseDN</label>
        <div id="emailHelp" class="form-text">This is the base DN/OU that all of your user accounts are stored.<br>Example: OU=DomainUsers,DC=example,DC=local</div>
        <input type="text" name="10" class="form-control" placeholder="OU=DomainUsers,DC=example,DC=local">

        <br>

        <label for="11" class="form-label">AdminDN</label>
        <div id="emailHelp" class="form-text">This is the FULL DN of a domain admin account used to verify credentials. You can find this in the attribute editor on your domain controller.<br>Example: CN=TasksBind,OU=DomainUsers,DC=example,DC=local</div>
        <input type="text" name="11" class="form-control" placeholder="CN=TasksBind,OU=DomainUsers,DC=example,DC=local">

        <br>

        <label for="12" class="form-label">Admin Password</label>
        <div id="emailHelp" class="form-text">This is the password for your admin account specified above.</div>
        <input type="text" name="12" class="form-control" placeholder="password">

        <br>

        <label for="13" class="form-label">LDAP Server IP</label>
        <div id="emailHelp" class="form-text">This is the IP address or domain of your LDAP server.</div>
        <input type="text" name="13" class="form-control" placeholder="10.0.1.54">

        <br>

        <label for="15" class="form-label">LDAP Domain Name</label>
        <div id="emailHelp" class="form-text">Please specify the domain name of your LDAP forest.</div>
        <input type="text" name="15" class="form-control" placeholder="example.local">

        <br><br><br>

        <h4>Login</h4>
        <p>This section gives you the option to block the normal login page or to allow logins for both normal accounts and LDAP accounts.</p>

        <br>

        <label for="14" class="form-label">Restricted Logins</label>
        <div id="emailHelp" class="form-text">Would you like to restrict logins to just LDAP accounts? Doing this will redirect all users from the login page to the LDAP login page. This can always be changed later in the 'app/init/conf_file.php' file. If you leave this option to 'Don't restrict logins.' then the normal login page will be able to be accessed along with the LDAP login page.</div>
        <select class="form-control" name="14">
          <option value="default" selected>Don't restrict logins.</option>
          <option value="ldap">Restrict logins to just LDAP accounts.</option>
        </select>

        <br><br><br>

        <h4>Encryption Settings</h4>
        <p>A backup text file will be created on the web server with these credentials. The name will be named 'backup-enc.txt'. For safe keeping, please make sure that you document these credentials somewhere else on your computer. If you loose these and update the app, you will not be able to access any data.</p>
        <p>We've prefilled the encrption code fields for you. If you would like you can randomize the values to your liking using the 'Refresh Values' button or clear the fields using the 'Clear Values' button and then generate your own values with your own software and replace them.</p>
        <button type="button" class="btn btn-secondary" onclick="generateStrings()">Refresh Values</button>
        <button type="button" class="btn btn-secondary" onclick="clearStrings()">Clear Values</button>

        <br><br>

        <label for="5" class="form-label">Encryption Password</label>
        <div id="emailHelp" class="form-text">Generate a 60 character string for the encryption string. <span style="color:red;">MUST BE 60 CHARACTERS. NOTHING MORE, NOTHING LESS.</span></div>
        <input type="text" required name="5" class="form-control" id="encpass">

        <br>

        <label for="6" class="form-label">Encryption IV</label>
        <div id="emailHelp" class="form-text">Generate a 16 character string for the encryption string. <span style="color:red;">MUST BE 16 CHARACTERS. NOTHING MORE, NOTHING LESS.</span></div>
        <input type="text" required name="6" class="form-control" id="enciv">

        <br><br><br>

        <h4>Licensing</h4>
        <p>This part is not required but is reccomended. We may decide to push out an update in the future (or it may already be pushed) that will use this license key for validation and updating.</p>
        <p>If you haven't done so already, you can fill that form out here. <a href="https://tasks.hstly.net/self-host-register.php">Self Host Registration Form</a></p>

        <br><br>

        <label for="7" class="form-label">License Email</label>
        <div id="emailHelp" class="form-text">Use the email that you used on the registration page.</span></div>
        <input type="text" name="7" class="form-control" placeholder="john.doe@example.com">

        <br>

        <label for="8" class="form-label">License Key</label>
        <div id="emailHelp" class="form-text">Fill this in with the license key that you recieved on the self host registration page. This is 4 sections of 10 digits/characters seperated by dashes.</span></div>
        <input type="text" name="8" class="form-control" placeholder="AAAAAAAAAA-AAAAAAAAAA-AAAAAAAAAA-AAAAAAAAAA">

        <br><br><br>

        <h4>Notice</h4>
        <p>Absolutely no extra support will be given other than what is found in the support docs. There will be no email support. We are not responsible for any data loss or data corruption. We are not responsible for warranties being voided by installing this software. We're not responsible for any data being leaked from a hack on your deployment. 
        <br>By clicking 'Configure', you are agreeing to this notice.</p>
        <input type="checkbox" value="Bike" required> <span>I agree to the following above.</span>

        <br><br><br>

        <input type="submit" name="submit" class="btn btn-primary" value="Configure">
      </form>

      <br><br>
    </div>
  </body>
</html>
<script>
function generateStrings(){
  function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * 
      charactersLength));
    }
    return result;
  }

  //console.log(makeid(60));
  
  document.getElementById("encpass").value = makeid(60);
  document.getElementById("enciv").value = makeid(16);
}

function clearStrings(){
  document.getElementById("encpass").value = "";
  document.getElementById("enciv").value = "";
}


/*$(document).on('click', '.delete-account-button', function(event){
  $.ajax({
    url: `${keyserver}validate.php`,
    method:"POST",
    data:{
      'as':`setup`,
      'email':``,
      'key':``,
      'serial':``
    },
    success:function(data) {
    }
  });
});*/
</script>