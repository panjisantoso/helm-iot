<script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-firestore.js"></script>
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
// use Google\Cloud\Core\Timestamp;

// ....
// $from = new DateTimeZone('GMT');
// $to   = new DateTimeZone('Asia/Singapore');
// $stamp = new Timestamp(new DateTime());
// echo $stamp;
// require_once "remove_old_tanggal.php";

$from = new DateTimeZone('GMT');
$to   = new DateTimeZone('Asia/Singapore');
$currDate = new DateTime('now', $from);
$currDate->setTimezone($to);
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