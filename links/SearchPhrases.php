<?php

if (isset($_GET['query']))
    $query = $_GET['query'];
else
    return;
$url = "https://api.quotable.io/search/quotes?query=" . $query;
$curl = curl_init($url);


curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = (curl_exec($curl));
curl_close($curl);
$_GET['query'] = null;
//echo $result;
$val= ($result);
echo $val;






?>
