<?php

require "firebase-php-master/src/firebaseLib.php";
require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Factory;

$param1 = $_GET["latitude"];
$param2 = $_GET["longitude"];
$param3 = $_GET["bluetooth"];
$param4 = $_GET["arduinoId"];

$url = 'https://helm-iot-test-default-rtdb.firebaseio.com/'; 
$token = 'tn8wkmGaJLQ2oT1iKeCvMeLn58BPz8EyeN1zLlsS'; 

$DEFAULT_PATH = '/helm-iot/$param4'; /*sesuaiin setelah "/helm-iot/" dengan address bluetooth slave*/

date_default_timezone_set("Asia/Singapore");
$tgl = date("Y-m-d H:i:s");

$_devicestatus= array(
    'last_update' => $tgl,
    'latitude' => $param1,
    'longitude' => $param2,
    'bluetooth' => $param3,
    'helm_name' => $param4,
    'alarm_helm' => "0",
);

$firebase = new \Firebase\FirebaseLib($url, $token);
$firebase->update($DEFAULT_PATH, $_devicestatus);

print("Update Berhasil");
?>