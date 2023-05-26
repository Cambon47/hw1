<?php

session_start();
$client_id = '2_wKQy0g';
$client_secret = 'UuyeVKJlKLSnBLqFhXKdwrpPJCoNx1ty2pKwrgD6FvRTfMYwdJz6jiX_XHJdEvHK';
$curl = curl_init('https://api.gfycat.com/v1/oauth/token');
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$dati = array("grant_type"=>"client_credentials", "client_id"=>$client_id, "client_secret"=>$client_secret);

curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($dati));
$result = curl_exec($curl);
curl_close($curl);
$_SESSION['token'] = $result;
echo $_SESSION['token'];
//exit;





?>