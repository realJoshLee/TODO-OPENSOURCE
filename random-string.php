<?php 
// Chars 0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ
$lengthNum=1; 
function getNum($lengthNum) { 
	$characters = '0123456789'; 
	$randomString = ''; 
	for ($i = 0; $i < $lengthNum; $i++) { 
		$index = rand(0, strlen($characters) - 1); 
		$randomString .= $characters[$index]; 
	} 
	return $randomString; 
} 
$lengthCode=8; 
function getCode($lengthCode) { 
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
	$randomString = ''; 
	for ($i = 0; $i < $lengthCode; $i++) { 
		$index = rand(0, strlen($characters) - 1); 
		$randomString .= $characters[$index]; 
	} 
	return $randomString; 
} 

$recovery = 'A'.getNum($lengthNum).'-'.getCode($lengthCode).'-'.getCode($lengthCode); 
echo $recovery;
?> 