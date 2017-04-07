<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auth-system";

if (isset($_POST["r_brukernavn"]) && isset($_POST["r_passord"])) {
  $brukernavn = $_POST["r_brukernavn"];
  // Lagrer passord som et resultat av bcrypt hashing-algoritme.
  $passord = password_hash($_POST["r_passord"], PASSWORD_BCRYPT);
  $sql = "INSERT INTO `auth-system-brukere`(brukernavn, passord) VALUES ('$brukernavn', '$passord')";

  mysql_connect($servername, $username, $password);
  mysql_select_db($dbname);

  mysql_query($sql);
  echo "Registrering fullført. Velkommen!";
  mysql_close();
}
else {
  echo("Du må fylle ut begge feltene");
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

  <div id="header">
    <h1>Autentikasjonssytem</h1>
      <h4>Registrering</h4>
      <hr>
  </div>

  </body>
</html>
