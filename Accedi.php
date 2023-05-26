

<html>
<head>
    <meta charset="utf-8" />
<title>TMAY</title>
<meta name="viewport"
    content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="links/Registrazione.css" /></head>


<body>
    <h2>Login</h2>
    <form method="post" name="Login" action="VerifyLogin.php">

        <label>
            <span>Username</span><input type='text' name="Username" class='login' />
        </label>
        <label>
            <span>Password</span><input type='password' name="Password" class='login' />
        </label>

        <input type="submit" value="Accedi">
    </form>
    <?php session_start();
    if (isset($_SESSION['errore'])) echo "<span class='error'>" . $_SESSION['errore'] . "</span>";   ?>
   </body>
</html>