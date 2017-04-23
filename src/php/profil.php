<?php
require("database/tilkobling.php");
session_start();
$brukernavn = $_SESSION["brukernavn"];
$brukerid = $_SESSION["brukerid"];

// Motta bilde
/*
$sql = "SELECT `bilde` FROM `auth-system-brukere` WHERE brukerid = ?";
$query = $tilkobling->prepare($sql);
$query->execute(array($brukerid));
$bildefil = $query->fetchAll(PDO::FETCH_ASSOC);
$bildefil = array_values($bildefil[0]);
$bildefil = $bildefil[0];
*/
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Portalen</title>
    <link href="../style/portal.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>

    <div id="meny">
      <a id="profil"><?php echo $brukernavn; ?> <span id="ned">&#9662;</span><span id="opp">&#9652;</span></a>
      <a id="meny_1" href="portal.php">Hjem</a>
      <a id="meny_2">Element 2</a>
      <a id="meny_3">Element 3</a>
   </div>

   <div id="meny_profil">
     <a id="loggut">Logg ut</a>
     <a>Innstillinger</a>
     <a href="profil.php">Endre profil</a>
   </div>

<div id="endre_bilde">
    <?php

        if (isset($_SESSION["ferdig"])) {
            if ($_SESSION["ferdig"]) {
                print_r("Lyktes med å laste opp bildet.");
            }

            else {
                print_r("Lyktes ikke med å laste opp bildet.");
            }

            session_unset($_SESSION["ferdig"]);
        }

     ?>
        <br>Denne siden har foreløpig ingen funksjon, annen den å gi muligheten til å laste opp bildet til databasen.
        <form action="scripts/bildeopplastning.php" method="post" enctype="multipart/form-data">
        <h2>Endre profilbilde</h2><br><br>
        <input type="file" name="bilde" id="bilde">
        <input type="submit" value="Last opp" name="submit">
    </form>
</div>

<script src="../js/portal.js"></script>
</body>
</html>
