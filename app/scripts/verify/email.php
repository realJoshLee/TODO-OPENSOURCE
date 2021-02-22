<?php
  $to = $_GET['to'];
  $verifyid = $_GET['verifyid'];
  require '../init.php';

  // Sets 4 digit code
  $n=4; 
  function getName($n) { 
      $characters = '0123456789'; 
      $randomString = ''; 
    
      for ($i = 0; $i < $n; $i++) { 
          $index = rand(0, strlen($characters) - 1); 
          $randomString .= $characters[$index]; 
      } 
    
      return $randomString; 
  } 
  $verifycode = getName($n); 

  $addQuery = $db->prepare("
    UPDATE passwordlogin
    SET verifycode = :verifycode 
    WHERE username = :account
  ");

  $addQuery->execute([
    ':account' => $account,
    ':verifycode' => $verifycode
  ]);

  require '../../plugins/mailjet/vendor/autoload.php';
  require '../init-verify.php';
  
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
            'Email' => "".$to."",
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

  header('Location: continue.php?to='.$to);
?>
