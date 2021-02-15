<?php


require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Factory;
// $url = 'https://helm-iot-test-default-rtdb.firebaseio.com/'; 
// $token = 'tn8wkmGaJLQ2oT1iKeCvMeLn58BPz8EyeN1zLlsS'; 

$factory = (new Factory)
        ->withServiceAccount('helm-iot-test-firebase-adminsdk-l7ipo-f4ef421923.json')
        ->withDatabaseUri('https://helm-iot-test-default-rtdb.firebaseio.com');


$database = $factory->createDatabase();
$reference = $database->getReference('helm-iot/');

$snapshot = $reference->getSnapshot();
$value = $snapshot->getValue();
echo $value['alarm_motor'];
?>