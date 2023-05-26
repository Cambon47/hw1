<?php
session_start();
if (!isset($_SESSION['errore']))
    $_SESSION['errore'] = '';
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
    <script src="Registrazione.js" defer ="true"></script>  

</head>


<body>
    <h2>Registrazione</h2> 
    <form method="post" name="Registrazione" action="Validazione.php">

        <label>
            <span>Username</span><input type='text' name="Username" class='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?> />
        </label>
        <label>
            <span>Password</span><input type='password' name="Password" class='password' <?php if(isset($_post["password"])){echo "value=".$_POST[" password"];} ?>/>
        </label>
        <label>
            <span>Conferma password</span><input type='password' name="ConfPassword" class='confirm_password' <?php if(isset($_POST["confirm_password"])){echo "value=".$_POST["confirm_password"];} ?> />
        </label>
        <label>
            <span>E-mail</span><input type='text' name="E-mail" class='email' <?php if(isset($_post["email"])){echo "value=".$_POST[" email"];}?> />
        </label>

        <label>
            <span>Conferma e-mail</span><input type='text' name="Conferma E-mail" class='confirm_email' <?php if(isset($_POST["confirm_email"])){echo "value=".$_POST["confirm_email"];} ?> />

        </label>

        <label> <span>Accetto le condizioni di TMAY</span> <input type="checkbox" > </label>

                                         
        <input type="submit" value="Invia dati" id="Invio">
    </form>
   <span class='error'> <?php echo $_SESSION['errore'];
   
                        ?>  </span>

</body>

</html>