<?php
require_once 'dbconfig.php';

session_start();


$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die("Errore:" . mysqli_connect_error());

$id = mysqli_real_escape_string($conn,$_GET['id']);

$receiver = mysqli_real_escape_string($conn,$_GET['receiver']);
if(!isset($_SESSION['username'])){
    exit;

}

$giver = $_SESSION['username'];

$verifier = "Select * from Likes where giver = '" . $giver . "' and id='" . $id . "'";

$res = mysqli_query($conn, $verifier) or die("Errore!");



$query = "Insert into Likes(giver,receiver,id_storia) values('".$giver."','" . $receiver . "', '" . $id . "'  )";
echo $query;

mysqli_query($conn, $query) or die("Errore!");
mysqli_close($conn);
exit;
?>