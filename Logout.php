<?php
session_start();
if (isset($_SESSION['Username']))
$_SESSION['Username']='';
session_destroy();
header("Location:Accesso.php");
?>