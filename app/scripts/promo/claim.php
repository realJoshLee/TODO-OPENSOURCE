<?php 
  require '../init.php';

  if(isset($_POST['submit'])){
    $code = $_POST['code'];
    
    $verifyget = $db->prepare("SELECT * FROM `taskable_promos` WHERE `code` = :code");
    $verifyget->execute([
      'code' => $_POST['code'],
    ]);
    $verify = $verifyget->rowCount() ? $verifyget : [];

    foreach($verify as $item){
      if($item['code']==$code){
        // Code right actions
        //header('Location: success.html');

        $addQuery = $db->prepare("
          UPDATE passwordlogin SET preminum = :status WHERE username = :account;
          UPDATE passwordlogin SET preminumend = :end WHERE username = :account;
        ");

        $addQuery->execute([
          ':account' => $account,
          ':status' => 'true',
          ':end' => $item['time']
        ]);

        header( "Location: ../../index.php" );
      }else{
        // Code wrong actions
        //header( "../../index.php" );
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tasks - Claim Promo Code</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
        
    <!--Links to stylesheets-->
    <link rel="shortcut icon" type="image/png" href="../../icons/check.v3.svg"/>
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!--Scripts-->
    <script src="../../plugins/jquery-3.1.0.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        
    <!--Font Links-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
  </head>
  <body>

    <br><br><br><br><br>

    <div class="container">
      <div class="container-inner">
        <h1 class="title">Please type the promo code<br>you where given.</h1>
        <form method="POST" id="code" class="code">
          <input type="text" class="input" name="code" <?php if(isset($_GET['promo'])){echo 'value="'.$_GET['promo'].'"';} ?>>&nbsp;
          <input type="submit" class="submit" name="submit" Value="&#x2192;">
        </form>
        <br>
      </div>
    </div>
  </body>
</html>

<style>
  html, body {
    background: url('bg2.svg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    height: 100%;

    padding: 0;
    margin: 0;

    font-family: 'Montserrat', Arial;
  }

  div.center {
    text-align: center;
    padding: 10px;
  }

  .alert {
    width: 300px;
    height: auto;

    border-radius: 15px;

    -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
    -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
    box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
  }

  div.container {
    margin: auto;
    width: 50%;

    border-radius: 10px;

    background-color: #fff;

    /*-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
    -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
    box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);*/
  }

  div.container-inner {
    padding: 10px;

    text-align: center;
  }

  div.container h1.title {
    font-size: 25px;
  }

  div.container p.email {
    font-size: 16px;
  }

  .input {
    /*Remove all of the background shadows*/
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    outline: none;

    border: 1px solid #f0f1f6;
    border-radius: 20px;
    background: #f0f1f6;

    font-size: 20px;
    text-align: center;

    width: 300px;

    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
    padding-right: 10px;
  }

  .submit {
    /*Remove all of the background shadows*/
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    outline: none;
    
    border: 1px solid #1a4ffe;
    border-radius: 20px;
    background: #1a4ffe;
    color: #fff;

    font-size: 20px;
    text-align: center;

    /*width: 130px;*/

    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
    padding-right: 10px;
  }

  .submit:hover {
    /*Remove all of the background shadows*/
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    outline: none;
    
    border: 1px solid #1a4ffe;
    background: none;
    color: #1a4ffe;
    
    cursor: pointer;
  }
  
  .link {
    text-decoration: none;
    color: #1A4FFE;
  }

  
  .fade-in {
    animation: fadeIn ease 0.2s;
    -webkit-animation: fadeIn ease 0.2s;
    -moz-animation: fadeIn ease 0.2s;
    -o-animation: fadeIn ease 0.2s;
    -ms-animation: fadeIn ease 0.2s;
  }

  @keyframes fadeIn {
    0% {opacity:0;}
    100% {opacity:1;}
  }

  @-moz-keyframes fadeIn {
    0% {opacity:0;}
    100% {opacity:1;}
  }

  @-webkit-keyframes fadeIn {
    0% {opacity:0;}
    100% {opacity:1;}
  }

  @-o-keyframes fadeIn {
    0% {opacity:0;}
    100% {opacity:1;}
  }

  @-ms-keyframes fadeIn {
    0% {opacity:0;}
    100% {opacity:1;}
  }

  @media screen and (max-width: 1038px){
    div.container {
      margin: auto;
      width: 100%;
    }
  }
</style>