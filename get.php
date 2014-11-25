<?php

//begingin of endpoint. change if needed
$gate = 'http://gateway.marvel.com/v1/public/';

//Parameters change as you see fit. I picked charachter and Spidey
$param = "characters?name=Spider-Man";


//replace with your key from developers.marvel
$APIKey ='YOUTKEY123';

//replace with your private key from developers.marvel
$PrivateKey = 'YOURPRIVATEKEY123';

// just used an integer for this example
$timestamp = '1';

//create hash
$hash = md5($timestamp . $PrivateKey . $APIKey);


$ch = curl_init($gate . $param . "&ts=" . $timestamp . "&apikey=" . $APIKey . "&hash=" . $hash);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HEADER, true );


$data = curl_exec($ch);

$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);
	
// echo http code so I know hwat happened if it didn't work	
echo $httpcode . '<br>';
// echo info about the call so I can see if I need to change anything here
echo $gate . $param . "&ts=" . $timestamp . "&apikey=" . $APIKey . $hash;

echo '<br>MD5 hash is: ' . $hash;

echo '<br>';

echo 'Time Stamp: ' . $timestamp;

echo '<br><br>';

//dump the reposnse. should look like the docs at developers.marvel
    var_dump(
 $data,
 json_encode($data)
);

?>