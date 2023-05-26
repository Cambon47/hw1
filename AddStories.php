<?php
require_once 'dbconfig.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:Mystories.php");
    exit;
}
$username = $_SESSION['username'];
$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die("Errore:" . mysqli_connect_error());
$text = mysqli_real_escape_string($conn,$_GET['testo']);
$title = mysqli_real_escape_string($conn, $_GET['titolo']);
$query = "INSERT into Stories (title, testo,utente,n_likes, n_comments, n_segnalazioni,data_ins) values('".$title."', '" .$text. "','" . $username . "', 0,0,0, now() )";
echo $query;
$add = mysqli_query($conn, $query) or die("Errore");
mysqli_close($conn);
header("Location:Mystories.php");