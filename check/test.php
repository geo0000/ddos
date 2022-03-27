<?php
$testTargets = [
    [ 'tcp', '185.165.123.40', '80, 443' ],
    [ 'tcp', '178.248.238.208', '80, 443' ],
    [ 'tcp', '178.248.238.62', '80, 443' ],
    [ 'tcp', '195.189.222.55', '80, 443' ],
    [ 'tcp', '185.165.123.206', '80, 443' ],
    [ 'tcp', '195.189.222.41', '25, 80, 443' ],
    [ 'tcp', '194.49.120.61', '80, 443' ],
    [ 'tcp', '194.49.121.18', '443, 3389' ],
    [ '', '', '' ]];

$targetTcpArr = [];
$targetHttpArr = [];

foreach($testTargets as $target) {
   $portArr = explode(', ', $target[2]);

   foreach($portArr as $port) {
        if ($target[0] === 'tcp') {
            $targetArr[] = "$target[0]://$target[1]:$port";
        }

        elseif (!$target[0] || $target[0] === 'http' || $target[0] === 'https') {
            $targetHttpArr[] = "$target[1]:$port";
        }
    }

}

// echo '<pre>';
//     var_dump($targetArr);
// echo 'HTTP:';
//     var_dump($targetHttpArr);
// echo '</pre>';

