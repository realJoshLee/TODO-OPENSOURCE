<?php
require_once 'init.php';

$query = $db->prepare("SELECT id, name, done FROM tasks WHERE user = :user AND folder = :folder");

$query->execute([
  'user' => $_SESSION['user_id'],
  'folder' => "inbox"
]);


// $plaintext = 'Test task.';
$password = 'hfAbzDJ3ENUdLkhtFqppPaL6ZNMcLT1PMNQUMmLRwcBfv6vVvEvmY3Qmbg1y';
$method = 'aes-256-cbc';
$key = substr(hash('sha256', $password, true), 0, 32);
$iv = 'PkcCczwaj4Kkeq31';
//$encrypted = base64_encode(openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv));
$queryt = openssl_decrypt(base64_decode('$query'), $method, $key, OPENSSL_RAW_DATA, $iv);

//$items = $query->rowCount() ? $query : [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php if (!empty($queryt)) : ?>
    <ul id="myul" class="items">
      <?php foreach ($queryt as $item) : ?><?php if (!$item['done']) : ?><li><a href="functions.php?as=inboxdone&item=<?php echo $item['id'] ?>" class="done-button"><span class="dot"></span></a>&nbsp;<span class="item<?php echo $item['done'] ? 'done' : '' ?>"><?php echo $item['name']; ?></span></li><?php endif; ?><?php endforeach; ?>
    </ul>
  <?php else : ?>
    <!--What is shown when there aren't any items in the list-->
    <p>There aren't any tasks in your inbox. Add some below to get started.</p>
  <?php endif; ?>
</body>

</html>