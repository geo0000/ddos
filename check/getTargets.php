<?php

$test = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=LjdGHZhdzyEAoUo3BmFhjOyIlMzwbN6FdUDFMUU75iudx-NIEyMkmNVe84TNFowa1QkQxza6xu_mMyV7wjtMBwSTrfexLp-1m5_BxDlH2jW0nuo2oDemN9CCS2h10ox_1xSncGQajx_ryfhECjZEnN-bJ4Mpgap_iwc7TLR5GukJHwjAddCnRuEC2PxYXrywuzKyT10vQ3egMF43T5LdINQ912T-lQt4FKkf5SdAVYFsNcQvO-czOg&lib=MiPb0WwDA_kpi0PtGI_67_Sgcj5q6Otzs");

$last_update = json_decode($test, true);
$targets = implode(' ', $last_update['targets']);
$docRoot = $_SERVER['DOCUMENT_ROOT'];

$searchProtocol = ["udp://"];
$replaced_Protocol = str_replace($searchProtocol, "", $targets);

$onlyTcp = [];

foreach($last_update['targets'] as $target) {

    if (strpos($target, 'tcp://') === 0) {
        $onlyTcp[] = $target;
    }
}

// echo '<pre>';
// echo implode(PHP_EOL, $onlyTcp);
// echo '</pre>';

echo '<pre>';
echo "Успішне оновлення!";
echo '</pre>';


$targetsFile = 'targets.php';
$currentTargets = implode(' ', $onlyTcp);
file_put_contents($targetsFile, $currentTargets);

$targetJsonFile = 'targets.json';
$currentJsonTargets = json_encode($last_update['targets']);
file_put_contents($targetJsonFile, $currentJsonTargets);