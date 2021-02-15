<?php

require "firebase-php-master/src/firebaseLib.php";
$param1 = $_GET["latitude"];
$param2 = $_GET["longitude"];
$param3 = $_GET["bluetooth"];

$url = 'https://helm-iot-test-default-rtdb.firebaseio.com/'; 
$token = 'tn8wkmGaJLQ2oT1iKeCvMeLn58BPz8EyeN1zLlsS'; 

$DEFAULT_PATH = '/helm-iot';

$_devicestatus= array(
'latitude' => $param1,
'longitude' => $param2,
'bluetooth' => $param3,
);

 

$firebase = new \Firebase\FirebaseLib($url, $token);
$firebase->update($DEFAULT_PATH, $_devicestatus);

print("Update Berhasil");
?>