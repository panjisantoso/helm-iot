<?php

require "firebase-php-master/src/firebaseLib.php";

$param1 = $_GET["latitude"];
$param2 = $_GET["longitude"];
$param3 = $_GET["bluetooth"];

$url = 'https://helm-iot-test-default-rtdb.firebaseio.com/'; 
$token = 'tn8wkmGaJLQ2oT1iKeCvMeLn58BPz8EyeN1zLlsS'; 
$DEFAULT_PATH = '/helm-iot';

    $_devicestatus= array(
        'last_update' => $param4,
        'latitude' => $param1,
        'longitude' => $param2,
        'bluetooth' => $param3,
    );

$firebase = new \Firebase\FirebaseLib($url, $token);
$firebase->update($DEFAULT_PATH, $_devicestatus);

$from = new DateTimeZone('GMT');
$to   = new DateTimeZone('Asia/Singapore');
$currDate = new DateTime('now', $from);
$currDate->setTimezone($to);
// $currDate->format('Y-m-d H:i:s');
$param4 = $currDate->format('Y-m-d H:i:s');

$_devicestatus2= array(
    'last_update' => $param4,
);
$firebase = new \Firebase\FirebaseLib($url, $token);
$firebase->update($DEFAULT_PATH, $_devicestatus2);

print("Update Berhasil");
?>