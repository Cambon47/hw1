<?php
session_start();
?>

<html>
<head><meta charset="utf-8" />
<title>TMAY</title>
<meta name="viewport"
    content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="links/Mystories.css" />
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital@1&family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet" />
<script src="OtherStories.js" defer="true"></script></head>
<body>
  <section> In questa sezione puoi trovare le ultime storie postate dagli utenti di TMAY. Puoi lasciare un like o un commento. Niente insulti, se volete fare una critica,
    che sia costruttiva. Se ritenete che una storia abbia contenuto volgare, non esitate a segnalare. Sappiate che non è possibile lasciare un like o un commento
    senza essere autenticati. Buon proseguimento!
      <form action="SearchStories.php">
          <label>
              <input type="text" name="search"><input type="submit" value="Cerca" />
              <select name="tipo">
                  <option value="data_ins">Data</option>
                  <option value="n_likes">Likes</option>

              </select>
          </label>
      </form>
    </section>

    <article></article>


</body>

</html>