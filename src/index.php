<?php
  session_start();
  error_reporting(E_ERROR | E_WARNING | E_PARSE); // Ønsker ikke notice om at $_SESSION['logg_inn_sjekk'] ikke er satt.
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Autentikasjonssystem</title>

    <link href="main.css" rel="stylesheet" type="text/css">
  </head>
  <body>

  <div id="header">
    <h1>Autentikasjonssytem</h1>
      <h4>Et forsøk på å lage et enkelt autentikasjonssystem med PHP og SQL</h4>
      <hr>
  </div>

  <div id="logg_inn">
    <h2>Logg inn<span class="l_lukk">(LUKK)</span></h2>

    <?php
    // Hvis brukeren mislyktes med login vil denne kjøre
    if ($_SESSION['logg_inn_sjekk'] == false) {
      echo "<b>Brukernavn og/eller passord er feil.</b> <br><br>";
      // Fjerner variabelene, slik at en ny session vil utnytte seg av nye variabler.
      unset($_SESSION['logg_inn_sjekk']);
      session_destroy();
      }
    ?>

    <form action="logg_inn.php" method="post">
      <label><strong>Brukernavn: </strong></label><br>
      <input type="text" name="l_brukernavn"><br><br>
      <label><strong>Passord: </strong></label><br>
      <input type="l_password" name="l_passord"><br><br>
      <button type="submit" name="login">Logg inn!</button>
    </form>
  </div>

  <div id="registrer_deg">
    <h2>Registrer deg <span class="r_lukk">(ÅPNE)</span></h2>
    <form action="registrer_deg.php" method="post">
      <label><strong>Brukernavn: </strong></label><br>
      <input type="text" name="r_brukernavn"><br><br>
      <label><strong>Passord: </strong></label><br>
      <input type="password" oninput="sjekk_styrke()" id="passord" name="r_passord"><br>
      Passordstyrke: <b><span id="styrke"></span></b><br><br>
      <button type="submit" name="login">Registrer deg!</button>
    </form>
  </div>

  <script type="text/javascript" src="passordstyrke.js"></script>
  </body>
</html>
