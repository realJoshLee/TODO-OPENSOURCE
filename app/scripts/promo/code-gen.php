<?php
$lengthNum = 1;
function getNum($lengthNum)
{
  $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $randomString = '';
  for ($i = 0; $i < $lengthNum; $i++) {
    $index = rand(0, strlen($characters) - 1);
    $randomString .= $characters[$index];
  }
  return $randomString;
}
echo 'T0-'.getNum(4).'-'.getNum(8).'-'.getNum(4);