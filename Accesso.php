<?php
session_start();

if (isset($_SESSION['username']))
    header('Location:Homepage.php');
?>
<html>
<head>
    <meta charset="utf-8" />
    <title>TMAY</title>
     <meta name="viewport"
    content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="links/Registrazione.css" />
    </head>
<body>
    <h1>T.M.A.Y</h1>
    <div>
        <a href="Registrazione.php">Registrati </a>
        <a  href="Accedi.php">Accedi</a>
        <a href="Homepage.php">Continua senza login</a>
    </div>
    


</body>










</html>
