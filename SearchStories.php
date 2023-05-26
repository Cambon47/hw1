<?php
require_once 'dbconfig.php';

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die("Errore:" . mysqli_connect_error());
$search = $_GET['search'];
$tipo = $_GET['tipo'];

$se = mysqli_real_escape_string($conn,$search);


    $query = "Select * from Stories where utente like( '%" . $se . "%') or title like(' %" . $se . "%') or testo like('%" . $se . "%') order by $tipo desc";



$res = mysqli_query($conn, $query);
$data = array();

for ($i = 0; $i < mysqli_num_rows($res); $i++) {
    $rows = mysqli_fetch_assoc($res);
    $data[$i] = $rows;


}
echo json_encode($data);

mysqli_free_result($res);

mysqli_close($conn);
?>