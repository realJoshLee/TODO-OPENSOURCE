<?php
  $lengthCode = 10;
  function getCode($lengthCode) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $lengthCode; $i++) {
      $index = rand(0, strlen($characters) - 1);
      $randomString .= $characters[$index];
    }
    return $randomString;
  }
  echo getCode($lengthCode).'-'.getCode($lengthCode).'-'.getCode($lengthCode).'-'.getCode($lengthCode);

  echo '<br>';

  $lengthCodeA = 10;
  function getCodeA($lengthCodeA) {
    $characters = 'A';
    $randomString = '';
    for ($i = 0; $i < $lengthCodeA; $i++) {
      $index = rand(0, strlen($characters) - 1);
      $randomString .= $characters[$index];
    }
    return $randomString;
  }
  echo getCodeA($lengthCodeA).'-'.getCodeA($lengthCodeA).'-'.getCodeA($lengthCodeA).'-'.getCodeA($lengthCodeA);