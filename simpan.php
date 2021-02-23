<?php

require "firebase-php-master/src/firebaseLib.php";
require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Factory;

$param1 = $_GET["latitude"];
$param2 = $_GET["longitude"];
$param3 = $_GET["bluetooth"];

$url = 'https://helm-iot-test-default-rtdb.firebaseio.com/'; 
$token = 'tn8wkmGaJLQ2oT1iKeCvMeLn58BPz8EyeN1zLlsS'; 
$DEFAULT_PATH = '/helm-iot';

$factory = (new Factory)
        ->withServiceAccount('helm-iot-test-firebase-adminsdk-l7ipo-f4ef421923.json')
        ->withDatabaseUri('https://helm-iot-test-default-rtdb.firebaseio.com');
        
$database = $factory->createDatabase();
$reference = $database->getReference('helm-iot/last_update');

$snapshot = $reference->getSnapshot();
$value = $snapshot->getChild('last_update')->getValue();
$reference->remove();

$from = new DateTimeZone('GMT');
$to   = new DateTimeZone('Asia/Singapore');
$currDate = new DateTime('now', $from);
$currDate->setTimezone($to);
$currDate->format('Y-m-d H:i:s');
$tgl = $currDate->format('Y-m-d H:i:s');

    $_devicestatus= array(
        'last_update' => $tgl,
        'latitude' => $param1,
        'longitude' => $param2,
        'bluetooth' => $param3,
    );

$firebase = new \Firebase\FirebaseLib($url, $token);
$firebase->update($DEFAULT_PATH, $_devicestatus);

print("Update Berhasil");
?>