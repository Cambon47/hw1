
<?php
require_once 'dbconfig.php';

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die("Errore:" . mysqli_connect_error());

$search = $_GET['search'];
$se = mysqli_real_escape_string($conn, $search);

$query = "Select * from Stories where id= '" . $se . "' ";

$res = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($res);

echo json_encode(array($res));

mysqli_free_result($res);

mysqli_close($conn);
?>