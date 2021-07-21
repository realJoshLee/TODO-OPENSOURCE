<?php
  require 'init/init.php';

  $fromemail = 'no-reply@madebyjoshlee.com';
  $fromname = 'no-reply';

  $apipublic = '8177233b1b15fe594644aa7297c16d83';
  $apiprivate = '1a18c10747725843b92f84f4a69429cb';

  $body = '
  <div class="content">
  <div class="content-inner">
    <h1>Tasks</h1>
    <p>Please click the link below so that we can<br>confirm your email address. Once that\'s<br>done, you\'ll be able to get started without<br>interruptions.</p>
    <br>
    <a class="link" href="https://tasks.hstly.net/verify.php?ae='.$accountemail.'&aid='.$account.'">Verify My Email!</a>
    <br><br>
    <p>Or paste this link in your browser:<br><span class="highlight">https://tasks.hstly.net/verify.php?ae='.$accountemail.'&aid='.$account.'</span></p>
  </div>
</div>
<style>
div.content {
  width: 100%;
  text-align: center;
  font-family: Arial, Helvetica, sans-serif;
  color: #333;
}

div.content h1 {
  color: #006fff;
}

div.content a.link {
  color: #fff;
  text-decoration: none;
  background: #006fff;
  border-radius: 5px;

  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 30px;
  padding-right: 30px;
}

div.content a.link:hover {
  opacity: 0.5;
}

div.content .highlight {
  color: #006fff;
  font-weight: bold;
}
</style>';

  require 'plugins/mailjet/vendor/autoload.php';
  
  use \Mailjet\Resources;
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
            'Email' => "".$accountemail."",
            'Name' => ""
          ]
        ],
        'Subject' => "Verify Your Email",
        'TextPart' => "VerifyEmail",
        'HTMLPart' => "".$body."",
        'CustomID' => "VerifyEmail"
      ]
    ]
  ];
  $response = $mj->post(Resources::$Email, ['body' => $body]);
  $response->success() && var_dump($response->getData());

  header('Location: index.php');
?>
