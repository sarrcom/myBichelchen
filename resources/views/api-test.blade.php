<?php

$curl = curl_init();

$opts = [
    CURLOPT_URL => 'https://www.parents.fr/feeds/rss/etre-parent',
    CURLOPT_RETURNTRANSFER => true,
];

curl_setopt_array($curl, $opts);

$response = curl_exec($curl);

curl_close($curl);

var_dump($response);

?>
