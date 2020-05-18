<?php

#OTP SMS API

$apiKey = "SZzt31LMIIQ-rFQL4YjKiZlehyhBqJMUsvRdGhywOW";

#account details
$apikey = urlencode($apiKey);

#message details
$numbers = +233503549095; #can be an array of numbers
$sender = urlencode('TSMS');
$message = "This is your new password. Use it to LogIn into your dashboard and change it.";

#$numbers = implode(',', $numbers); #for the array of numbers;

#prepare data for POST request
$data = array('apikey' => $apikey, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);

#send the post request with cURL
$ch = curl_init('https://api.txtlocal.com/send/');

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

#process your response here
echo $response;



?>