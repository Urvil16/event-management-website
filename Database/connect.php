<?php
mysqli_report(MYSQLI_REPORT_OFF);

$hosts = ['localhost', '127.0.0.1'];
$user = getenv('DB_USER') ? getenv('DB_USER') : 'root';
$db = getenv('DB_NAME') ? getenv('DB_NAME') : 'classic_events';
$passCandidates = [];
if (($envPass = getenv('DB_PASSWORD')) !== false && $envPass !== null && $envPass !== '') {
    $passCandidates[] = $envPass;
}
$passCandidates[] = 'root';
$passCandidates[] = '';

$con = null;
foreach ($hosts as $host) {
    foreach ($passCandidates as $pass) {
        $try = @mysqli_connect($host, $user, $pass, $db);
        if ($try) {
            $con = $try;
            break 2;
        }
    }
}

if (!$con) {
    die("can't connect: " . mysqli_connect_error());
}
?>