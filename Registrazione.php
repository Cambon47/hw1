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
            <span>Username</span><input type='text' name="username" class='username'  />
        </label>
        <label>
            <span>Password</span><input type='password' name="password" class='password' />
        </label>
        <label>
            <span>Conferma password</span><input type='password' name="confirm_password" class='confirm_password'  />
        </label>
        <label>
            <span>E-mail</span><input type='text' name="email" class='email'  />
        </label>

        <label>
            <span>Conferma e-mail</span><input type='text' name="confirm_email" class='confirm_email'  />

        </label>

        <label> <span>Accetto le condizioni di TMAY</span> <input type="checkbox" > </label>

                                         
        <input type="submit" value="Invia dati" id="Invio">
    </form>
   <span class='error'> 
    <?php echo $err = $_SESSION['errore'];
    session_abort();                    
                        ?>  
   </span>

</body>

</html>