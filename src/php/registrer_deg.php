<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auth-system";
$tilkobling = new PDO("mysql:host=$servername;dbname=$dbname", "$username", "$password");

if (isset($_POST["r_brukernavn"]) && isset($_POST["r_passord"])) {
  $brukernavn = $_POST["r_brukernavn"];
  $brukernavnEksistererQuery = "SELECT count(*) FROM `auth-system-brukere` WHERE brukernavn = ? LIMIT 1";
  $brukernavnEksisterer = $tilkobling->prepare($brukernavnEksistererQuery);
  $brukernavnEksisterer->execute(array($brukernavn));
  if ($brukernavnEksisterer->fetchColumn() ? 'true' : 'false') {
    // Lagrer passord som et resultat av bcrypt hashing-algoritme.
    $passord = password_hash($_POST["r_passord"], PASSWORD_BCRYPT);
    $sql = "INSERT INTO `auth-system-brukere`(brukernavn, passord) VALUES ('$brukernavn', '$passord')";

    $tilkobling->query($sql);
    echo "Registrering fullført. Velkommen!";
    $tilkobling = null;
  }

  else {
    echo "Brukernavnet er opptatt. Prøv et annet.";
  }
}


else {
  echo("Du må fylle ut alle feltene");
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
