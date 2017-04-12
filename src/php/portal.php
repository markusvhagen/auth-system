<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auth-system";
$tilkobling = new PDO("mysql:host=$servername;dbname=$dbname", "$username", "$password");

error_reporting(E_ALL & ~E_NOTICE);

/* FOR SESSION */
session_start();
$brukernavn = $_SESSION["brukernavn"];

// Dette gjør det ikke mulig å komme hit utenom innlogging.
if (!isset($brukernavn)) {
  header("location: ../index.php");
}

/* Logg ut via AJAX */
$loggut = $_REQUEST['q'];

if ($loggut == "true") {
  echo "suksess";
  session_destroy();
}

/* Hente poster */
$hentePosterQuery = "SELECT `auth-system-brukere`.`brukernavn`, `auth-system-post`.`post`, `auth-system-post`.`tid`
FROM `auth-system-brukere`
RIGHT JOIN `auth-system-post` ON `auth-system-brukere`.`brukerid` = `auth-system-post`.`brukerid`";
$resultat = $tilkobling->query($hentePosterQuery);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Portalen</title>
    <link href="../style/portal.css" type="text/css" rel="stylesheet">
  </head>
  <body>

    <div id="meny">
      <a id="profil"><?php echo $brukernavn; ?> <span id="ned">&#9662;</span><span id="opp">&#9652;</span></a>
      <a id="meny_1">Element 1</a>
      <a id="meny_2">Element 2</a>
      <a id="meny_3">Element 3</a>
   </div>

   <div id="meny_profil">
     <a id="loggut">Logg ut</a>
     <a>Innstillinger</a>
     <a>Endre profil</a>
   </div>

   <div id="legg_ut_post">
    <h3>Legg ut post (maks 200 tegn)</h3>
    <form>
    <textarea rows=5 cols=50>
    </textarea>
    <br><br>
    <input type="submit" value="Legg ut"></input>
    </form>
    <br>
    <h4>Siste commits til koden på GitHub</h4>
    <iframe src="http://tylerlh.github.com/github-latest-commits-widget/?username=markusvhagen&repo=auth-system&limit=10"
  allowtransparency="true" frameborder="0" scrolling="no" width="502px" height="252px"></iframe>
   </div>

   <div id="post_oversikt">
     <h3>Oversikt over poster</h3>
     <?php

        while($rad = $resultat->fetch(PDO::FETCH_ASSOC)) {
          $tid = strtotime($rad["tid"]);
          $formatert_tid = date('d. F h:i', $tid);
          print_r("<br><div class='enkel_post'");
          print_r("<p>" . utf8_encode($rad["post"]) . "<br><br>");
          print_r("<b>" . utf8_encode($rad["brukernavn"]) . " | " . $formatert_tid . "</b></p>");
          print_r("</div>");
        }

      ?>
   </div>

   <script src="../js/portal.js"></script>
  </body>
</html>
