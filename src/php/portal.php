<?php

session_start();
$brukernavn = $_SESSION["brukernavn"];

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
      <a id="profil"><?php echo $brukernavn; ?></a>
      <a id="meny_3">Element 3</a>
      <a id="meny_2">Element 2</a>
      <a id="meny_1">Element 1</a>
   </div>

   <script src="../js/portal.js"></script>
  </body>
</html>
