<?php

require "firebase-php-master/src/firebaseLib.php";

$url = 'https://helm-iot-test-default-rtdb.firebaseio.com/'; 
$token = 'tn8wkmGaJLQ2oT1iKeCvMeLn58BPz8EyeN1zLlsS'; 
$DEFAULT_PATH = '/helm-iot';

$from = new DateTimeZone('GMT');
$to   = new DateTimeZone('Asia/Singapore');
$currDate     = new DateTime('now', $from);
$currDate->setTimezone($to);
$currDate->format('Y-m-d H:i:s');


if($param4 == "1" || $param4 == '1'){
    $_devicestatus= array(
        'latitude' => $param1,
        'longitude' => $param2,
        'bluetooth' => $param3,
        'tgl_helm_aktif' => $currDate->format('Y-m-d H:i:s'),
    );
}else{
    $_devicestatus= array(
        'latitude' => $param1,
        'longitude' => $param2,
        'bluetooth' => $param3,
    );
}


 

$firebase = new \Firebase\FirebaseLib($url, $token);
$firebase->update($DEFAULT_PATH, $_devicestatus);

print("Update Berhasil");
?>