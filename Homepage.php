<?php
session_start();
?>

<html>


<head>
    <meta charset="utf-8" />
    <title>TMAY</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="links/mhw3.css" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital@1&family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet" />
    <script src="links/mhw3.js" defer="true"></script>
</head>

<body>
    <nav>
        <span id="logo">TMAY</span>
        <a href="Accesso.php"> Accedi</a>
        <a href="ciao.com"> Lista</a>
        <a href="ciao.com">Contatti</a>
        <a id="Logout" href="Logout.php">Logout</a>


        <?php if(isset($_SESSION['username'])) echo "<span id=username>". $_SESSION['username']."</span>";?>

    </nav>


    <header>

        <div id="overlay">
            <h1>
                TELL ME ABOUT YOU<br /> Frasi, quiz ed altre cose...
            </h1>
        </div>
    </header>

    <article>
        Cerchi frasi per una foto? Cerchi una gif che ti faccia ridere? Cerchi un quiz per scoprire che tipo di persona sei? Vuoi leggere
        le storie di altri? Vuoi raccontare la tua? Bene, sei nel posto giusto. Benvenuti su Tmay, dove puoi sempre scoprire qualcosa di nuovo su
        di te!

    </article>

    <div id='chat'>
        Chat <div id="pallino"></div>
    </div>



    <nav id='main'>
        <a href="links/Frasi.php"> Frasi&Gifs</a>
        <a href="links/Quiz.html"> Quiz</a>
        <a href="OtherStories.php">Storie</a>
        <a href="Mystories.php">Raccontati</a>
    </nav>
</body>
</html>