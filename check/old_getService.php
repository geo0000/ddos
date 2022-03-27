<?php

$targets = file_get_contents('address1.php');
// $target = ['185.165.123.40:80','185.165.123.40:443'];
$searchProtocol = ["tcp://"];
$replaced_Protocol = str_replace($searchProtocol, "", $targets);

$targets_arr = explode(' ', $replaced_Protocol);

$resultArr = [];
$serviceArr = [];
$ids = [];





foreach($targets_arr as $domain) {
	sleep(3);
	$curl1 = curl_init("https://check-host.net/check-tcp?host=$domain");
	$arHeaderList = ['Accept: application/json'];


	curl_setopt($curl1, CURLOPT_HTTPHEADER, $arHeaderList);
	curl_setopt($curl1, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl1, CURLOPT_FOLLOWLOCATION, true);
	
	$result1 = json_decode(curl_exec($curl1), true);
	$ids[] = $result1['request_id'];
	$link = $result1['permanent_link'];

	$serviceArr[] = $result1;
	
}

$countriesArr = [];

foreach($serviceArr as $service) {
	$country = [];
	if (!empty($service['nodes'])) {
		foreach($service['nodes'] as $val) {
			$country[] = $val[1];
		}
	}
	$countriesArr[] = $country;
}



echo '<pre>';
	var_dump($countriesArr);
echo '</pre>';


$service = 'services_test.json';
// $currentService = file_get_contents($service);
$currentService = json_encode($countriesArr);
file_put_contents($service, $currentService);