<?php

//beginning of endpoint. change if needed
$gate = 'http://gateway.marvel.com/v1/public/';

//Parameters change as you see fit. I picked characters and Spidey
$param = "characters?name=Spider-Man";

//replace with your key from developers.marvel
$APIKey ='YOURKEY123';

//replace with your private key from developers.marvel
$PrivateKey = 'YOURPRIVATEKEY123';

// just used an integer for this example
$timestamp = '1';

//create hash
$hash = md5($timestamp . $PrivateKey . $APIKey);

//build endpoint
$ch = curl_init($gate . $param . "&ts=" . $timestamp . "&apikey=" . $APIKey . "&hash=" . $hash);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HEADER, true );


$data = curl_exec($ch);

$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

//dump the reposnse. This should look like the interactive docs at developers.marvel
    var_dump(
 $data,
 json_encode($data)
);

?>
