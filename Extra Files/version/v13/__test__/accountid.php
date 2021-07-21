<?php
    $accountlength = 16;
    function getAcc($lengthCode)
    {
      $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $randomString = '';
      for ($i = 0; $i < $lengthCode; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
      }
      return $randomString;
    }
    $accountid = getAcc($accountlength);
    echo $accountid;