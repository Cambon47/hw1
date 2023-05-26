<?php

require_once 'dbconfig.php';

session_start();

$conn = $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die("Errore:" . mysqli_connect_error());

if (!isset($_SESSION['username']))
    exit;


$utente = $_SESSION['username'];

$query = "Insert into Segnalazioni(utente, id_storia) values('" . $utente . "','" . $_GET['id'] . "')";

mysqli_query($conn, $query);

$q = "Select n_segnalazioni from Stories where id='" . $_GET['id'] . "'";

$r = mysqli_query($conn, $q);

$res = mysqli_fetch_assoc($r);

if($res['n_segnalazioni']>=5){
    $query = "Delete from Stories where id='" . $_GET['id'] . "'";
    mysqli_query($conn, $query);
    echo $res['n_segnalazioni'];
}
mysqli_close($conn);
exit;
?>