<?php

require_once 'dbconfig.php';

session_start();



if (
    !empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) &&
     !empty($_POST["confirm_password"]) && !empty($_POST["confirm_email"]) )
 {
    $error = array();
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));


    # USERNAME
    // Controlla che l'username rispetti il pattern specificato
    if (!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
        $error[] = "Username non valido";
        $_SESSION['errore']= "Username non valido";
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        // Cerco se l'username esiste gi� o se appartiene a una delle 3 parole chiave indicate
        $query = "SELECT username FROM users WHERE username = '$username'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $error[] = "Username gi� utilizzato";
            $_SESSION['errore'] = "Username gi� utilizzato";
        }
    }
    # PASSWORD
    if (strlen($_POST["password"]) < 8 || strlen($_POST["password"])>15) {
        $error[] = "Caratteri password insufficienti";
        $_SESSION['errore'] = "Caratteri password insufficienti";
    }


    # CONFERMA PASSWORD
    if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
        $error[] = "Le password non coincidono";
        $_SESSION['errore'] = "Le password non coincidono";
    }

    # EMAIL
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error[] = "Email non valida";
        $_SESSION['errore'] = "Email non valida";
    } else {
        $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
        $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
        if (mysqli_num_rows($res) > 0) {
            $error[] = "Email gi� utilizzata";
            $_SESSION['errore'] = "Email in uso";
        }
    }
    if (strcmp($_POST["email"], $_POST["confirm_email"]) != 0) {
        $error[] = "Le email non coincidono";
        $_SESSION['errore'] = "Le email non coincidono";
    }
    if (count($error) != 0) {
        header('Location:Registrazione.php');
    }

}




$conn  = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die("Errore:" . mysqli_connect_error());
$username = mysqli_real_escape_string($conn,$_POST['username']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$password = password_hash($password, PASSWORD_BCRYPT);
$email = mysqli_real_escape_string($conn, $_POST['email']);




$query = "INSERT INTO Users(username, password,email) VALUES('".$username."','".$password."', '".$email."')";
$res = mysqli_query($conn, $query);
mysqli_close($conn);
echo '<h1>Benvenuto ' . $username.'!<h1>';
$_SESSION['username'] = $username;
?>

<html>
<head>
    <meta name="viewport"
        content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="links/Registrazione.css" />
</head>
<body>
    <div><a href="Homepage.php">Vai alla homepage</a></div>
    
</body>
</html>