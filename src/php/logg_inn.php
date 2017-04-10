<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auth-system";
$tilkobling = new PDO("mysql:host=$servername;dbname=$dbname", "$username", "$password");

$brukernavn = $_POST["l_brukernavn"];
$faktisk_passord = $_POST["l_passord"];

// Spørringen under henter ut passordet for et gitt brukernavn.
$loggInnQuery = "SELECT passord FROM `auth-system-brukere` WHERE brukernavn = ?";
$loggInn = $tilkobling->prepare($loggInnQuery);
$loggInn->execute(array($brukernavn));
$sql_passord = $loggInn->fetchAll(PDO::FETCH_ASSOC);

// Hvis brukeren eksiterer eller ikke.
if (empty($sql_passord)) {
  echo "Brukeren eksisterer ikke.";
  die();
}

$sql_passord = array_values($sql_passord[0]);
$passordSpoerring = password_verify($faktisk_passord, $sql_passord[0]);

// Sjekker om hash stemmer overrens med passord.
if ($passordSpoerring) {
    session_start();
    $_SESSION['brukernavn'] = $brukernavn;
    header("location: portal.php");
}

// Feil passord
else {
    echo "Feil passord. Du ble ikke logget inn. <a href='../index.php'>Gå tilbake</a> ";
}

// Kutter tilkoblingen til databasen
$tilkobling = null;

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
