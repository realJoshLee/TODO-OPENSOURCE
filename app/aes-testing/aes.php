<?php

$plaintext = 'Test task.';
$password = 'hfAbzDJ3ENUdLkhtFqppPaL6ZNMcLT1PMNQUMmLRwcBfv6vVvEvmY3Qmbg1y';
$method = 'aes-256-cbc';
$key = substr(hash('sha256', $password, true), 0, 32);
$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
$encrypted = base64_encode(openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv));
$decrypted = openssl_decrypt(base64_decode($encrypted), $method, $key, OPENSSL_RAW_DATA, $iv);
?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>
    <p><?php echo 'encrypted to: ' . $encrypted . "\n\n"; ?></p>
    <p><?php echo 'decrypted to: ' . $decrypted . "\n\n"; ?></p>
  </body>
</html>