<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auth-system";
$kontakt = mysql_connect($servername, $username, $password);

// Hvis det ikke er mulig å opprette en databasetilkobling.
if (!$kontakt) {
  echo "Mislyktes med databasetilkoblingen.";
}

else {
  mysql_select_db($dbname, $kontakt);

  $brukernavn = $_POST["l_brukernavn"];
  $faktisk_passord = $_POST["l_passord"];
  // Spørringen under henter ut passordet for et gitt brukernavn.
  $sql = "SELECT passord FROM `auth-system-brukere` WHERE brukernavn='$brukernavn'";

  $forespoersel = mysql_query($sql);

  // Hvis det faktisk eksisterer en forespørsel med spørringen over.
  if ($forespoersel) {
      // Disse to linjene gjør om resultatet fra spørringen til en lesbar streng.
      $resultat = mysql_fetch_assoc($forespoersel);
      $sql_passord = $resultat['passord'];
  }

  // Sjekker om hash stemmer overrens med passord.
  if (password_verify($faktisk_passord, $sql_passord)) {
      echo "Du er nå logget inn!";
  }

  else {
        echo "Her har det skjedd noe feil. Du ble ikke logget inn. <a href='../index.php'>Gå tilbake</a>";
  }

  mysql_close();
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Autentikasjonssystem</title>
    <link href="../style/main.css" rel="stylesheet" type="text/css">
  </head>
  <body>

  </body>
</html>
