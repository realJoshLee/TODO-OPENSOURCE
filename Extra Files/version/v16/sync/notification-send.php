<?php
  require '../init/init.php';

  require '../plugins/mailjet/vendor/autoload.php';

  $bodycontent = '
  <div class="item" style="color:#111;padding-left:20px;border-top: 3px solid #4169e1;padding-top:0px;">
    <br><br>
    <img src="https://tasks.hstly.net/app/icons/Landing.png" style="height:40px;width:auto;">
    <br><br>
    <p style="color:#4169e1;font-size:16px;">Just a friendly reminder:</p>
    <p>'.$_POST['name'].'</p>
  </div>
  ';
  
  use \Mailjet\Resources;
  $mj = new \Mailjet\Client(''.$apipublic.'',''.$apiprivate.'',true,['version' => 'v3.1']);
  if($reminderemailen=='true'){
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
          'Subject' => "Task Reminder",
          'TextPart' => "Task Reminder",
          'HTMLPart' => "".$bodycontent."",
          'CustomID' => "Task Reminder"
        ]
      ]
    ];
    $response = $mj->post(Resources::$Email, ['body' => $body]);
    $response->success() && var_dump($response->getData());
        
    $logQuery = $db->prepare("
      INSERT INTO tasks_log (account, content, date)
      VALUES (:account, :content, :date)
    ");
    $maincontent = 'Reminder email sent.';
    $logQuery->execute([
      ':account' => $account,
      ':content' => $maincontent,
      ':date' => $logdate
    ]);
  }
?>
