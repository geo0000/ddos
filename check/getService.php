<?php 

	//kj
	$last_update = filemtime("services.json");
	
	$diff = (time() - $last_update)/60;
	if($diff < 15)
	{
		//echo $diff." mins last update";
		//exit();
	}
	//kj


	

    // $targets = file_get_contents('address.php');
	$targets = file_get_contents('targets.php');

    $searchProtocol = ["tcp://"];
    $replaced_Protocol = str_replace($searchProtocol, "", $targets);

    $targets_arr = explode(' ', $replaced_Protocol);




    $resultArr = [];
	$serviceArr = [];
    $ids = [];
    $countriesArr = [];
	
    foreach($targets_arr as $domain) {
        $curl1 = curl_init("https://check-host.net/check-tcp?host=$domain");
        $arHeaderList = ['Accept: application/json'];


        curl_setopt($curl1, CURLOPT_HTTPHEADER, $arHeaderList);
        curl_setopt($curl1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl1, CURLOPT_FOLLOWLOCATION, true);
        
        $result1 = json_decode(curl_exec($curl1), true);
		$ids[] = $result1['request_id'];
		$link = $result1['permanent_link'];

        $serviceArr[] = $result1;
		sleep(3);
    }


foreach($serviceArr as $service) {
	$country = [];
	if (!empty($service['nodes'])) {
		foreach($service['nodes'] as $val) {
			$country[] = $val[1];
		}
	}
	$countriesArr[] = $country;
}

    sleep(10);

    foreach($ids as $id) {
        
		$curl2 = curl_init("https://check-host.net/check-result/$id");
		$arHeaderList = ['Accept: application/json'];
	
		curl_setopt($curl2, CURLOPT_HTTPHEADER, $arHeaderList);
		curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl2, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl2, CURLOPT_TIMEOUT, 1000);
		
		$result2 = json_decode(curl_exec($curl2), true);

        $search = [".", "/", ":"];
        $replaced_domain = str_replace($search, "_", $domain);
        $resultArr[] = $result2;
        
    }

    echo '<pre>';
        var_dump($resultArr);
    echo '</pre>';

	
	$service = 'services.json';
	// $currentService = file_get_contents($service);
	$currentService = json_encode($countriesArr);
	file_put_contents($service, $currentService);
	

	$file = 'ids.json';
	// $current = file_get_contents($file);
	$current = json_encode($resultArr);
	file_put_contents($file, $current);

    $time = 'time.json';
    // $currentTime = file_get_contents($time);
    $currentTime = json_encode(date('H:i'));
    file_put_contents($time, $currentTime);

    $domainsFile = 'domains.json';
    // $currentDomains = file_get_contents($file);
	$currentDomains = json_encode($targets_arr);
	file_put_contents($domainsFile, $currentDomains);

    // echo '<div id="result">' . json_encode($resultArr) . '</div>';

?>