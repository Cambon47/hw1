<?php
session_start();
$token = $_GET['token'];
//echo $token;

$data = http_build_query(
    array("search_text" => $_GET['search_text'], "count" => $_GET['count']));
$curl = curl_init('https://api.gfycat.com/v1/gfycats/search?' . $data);

$headers = array("Authorization: Bearer " .$token);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$res = curl_exec($curl);
curl_close($curl);
echo $res;
exit;
?>