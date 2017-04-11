<?php
error_reporting(E_ALL & ~E_NOTICE);

/* FOR SESSION */
session_start();
$brukernavn = $_SESSION["brukernavn"];

// Dette gjør det ikke mulig å komme hit utenom
if (!isset($brukernavn)) {
  header("location: ../index.php");
}

/* Logg ut via AJAX */
$loggut = $_REQUEST['q'];

if ($loggut == "true") {
  echo "suksess";
  session_destroy();
}

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

   <script src="../js/portal.js"></script>
  </body>
</html>
