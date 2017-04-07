<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auth-system";

$brukernavn = $_POST["l_brukernavn"];
$passord = $_POST["l_passord"];

mysql_connect($servername, $username, $password);
mysql_select_db($dbname);

if (mysql_connect($servername, $username, $password) === false) {
    echo "Tilkobling mislyktes: " . $conn->connect_error;
}

mysql_close();

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Autentikasjonssystem</title>
  </head>
  <body>

  </body>
</html>
