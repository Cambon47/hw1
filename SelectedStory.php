


<html>
<head>
    <meta charset="utf-8" />
    <title>TMAY</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="links/SelectedStory.css" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital@1&family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet" />

</head>

<body>
    <article>
        <?php
        require_once 'dbconfig.php';
        
        session_start();

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        $search = $_GET['search'];
       
        $_SESSION['receiver'] = $_GET['receiver'];
        
        $_SESSION['id'] = $search;
        $se = mysqli_real_escape_string($conn, $search);
        $query = "Select title,testo from Stories where id= '" . $se . "' ";
        
        $res = mysqli_query($conn, $query);
        $row = mysqli_fetch_object($res);

        echo "<span>" . $row->title ."<div>".$row->testo."</div> </span>";


        mysqli_free_result($res);


        ?>


        <section>

            <form action="AddComment.php" method="post">
                <label>
                    <input type="text" name="Commento" value="Inserisci qui il tuo commento" />
                </label>
                <label>
                    <input type="submit" value="Invia commento " />
                </label>
            </form>


            <?php

    $queryz = "Select testo, giver from Comments where id_storia= '" . $se . "' limit 8";
        $res = mysqli_query($conn, $queryz);
        if (mysqli_num_rows($res) > 0)

            while($row =mysqli_fetch_object($res) )
        echo "<p>".$row->testo. "<br><strong>".$row->giver."</strong> </p>";



        mysqli_free_result($res);

        mysqli_close($conn);
            ?>
        </section>

    </article>
</body>

</html>