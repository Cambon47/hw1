<?php

require_once 'dbconfig.php';

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die("Errore:" . mysqli_connect_error());

$user = mysqli_real_escape_string($conn, $_GET['Username']);
$pass = mysqli_real_escape_string($conn,$_GET['Password'] );

$query = "SELECT * from Users where username='" . $user . "' and password='" . $pass . "'";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_object( $res);

if (mysqli_num_rows($res) == 0)
    echo 'Credenziali non valide!';
else
    echo "Benvenuto '" . $user . "'";
mysqli_free_result($res);
mysqli_close($conn)
?>