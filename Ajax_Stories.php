<?php
require_once 'dbconfig.php';
session_start();
$username = $_SESSION['username'];
$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die("Errore:" . mysqli_connect_error());
$query = "Select * from Stories where utente='".$username."'";
$res = mysqli_query($conn, $query);

$data = array();

for($i=0; $i < mysqli_num_rows($res); $i++){
$rows = mysqli_fetch_assoc($res);
    $data[$i] = $rows;


}
echo json_encode($data);

mysqli_free_result($res);

mysqli_close($conn);
?>