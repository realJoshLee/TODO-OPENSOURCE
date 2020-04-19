<?php
  // For encryption
  $password = 'egTGhxm&rE%6ekPqx$KAKR9mf5VZkugk%k!9TZSZjX&fzh723dgALXBTczfq';
  $method = 'aes-256-cbc';
  $key = substr(hash('sha256', $password, true), 0, 32);
  $iv = '4gLgSnr#QrtP8yNw';
  //$encrypted = base64_encode(openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv));
  //$decrypted = openssl_decrypt(base64_decode($encrypted), $method, $key, OPENSSL_RAW_DATA, $iv);