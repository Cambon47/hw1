<?php
require_once 'dbconfig.php';
$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die("Errore:" . mysqli_connect_error());
$username = mysqli_real_escape_string($conn, $_POST['Username']);
$password = mysqli_real_escape_string($conn, $_POST['Password']);
session_start();


$s_query = "SELECT * from Users where username='" . $username . "'";
$search = mysqli_query($conn, $s_query) or die("Errore");
if (mysqli_num_rows($search) == 0) {

    $_SESSION['errore'] = 'Credenziali errate';

    header('Location:Accedi.php');

    exit;
}
$entry = mysqli_fetch_assoc($search);
if (password_verify($password, $entry['password'])) {
    $_SESSION['username'] = $username;
    header('Location:Homepage.php');
}

else {
    $_SESSION['errore'] = 'Credenziali errate';

    header('Location:Accedi.php');
}





mysqli_free_result($search);
exit;
?>