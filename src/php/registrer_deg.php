<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auth-system";

$brukernavn = $_POST["r_brukernavn"];
$passord = $_POST["r_passord"];
$sql = "INSERT INTO `auth-system-brukere`(brukernavn, passord) VALUES ('$brukernavn', '$passord')";

mysql_connect($servername, $username, $password);
mysql_select_db($dbname);

if (mysql_connect($servername, $username, $password) === false) {
    echo "Tilkobling mislyktes: " . $conn->connect_error;
}

mysql_query($sql);
mysql_close();
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
      <h4>Registrering</h4>
      <hr>
      <p>Regsitrering fullført med brukernavn: <?php echo($brukernavn); ?> og passord <?php echo($passord) ?>. Passord er kun for testing</p>
  </div>

  </body>
</html>
