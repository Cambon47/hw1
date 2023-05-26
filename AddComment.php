<?php
require_once 'dbconfig.php';
session_start();
$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die("Errore:" . mysqli_connect_error());
$id = $_SESSION['id'];
$receiver = $_SESSION['receiver'];
if (!isset($_SESSION['username'])) {
    header('Location:SelectedStory.php?search=' . $id.'&receiver='.$receiver);
    exit;
}

$giver = $_SESSION['username'];
$testo = mysqli_real_escape_string($conn,$_POST['Commento']);



$query = "Insert into Comments(testo,giver,receiver,id_storia) values('" . $testo . "',' " . $giver . "', '" . $receiver . "', '" . $id . "' )";
$res = mysqli_query($conn, $query) or die("Errore:" );
mysqli_close($conn);
header('Location:SelectedStory.php?search=' . $id . '&receiver=' . $receiver);
?>