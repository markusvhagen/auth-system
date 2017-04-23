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

      <?php
      require("database/tilkobling.php");

      if (isset($_POST["r_brukernavn"]) && isset($_POST["r_passord"])) {
        $brukernavn = $_POST["r_brukernavn"];
        $brukernavnEksistererQuery = "SELECT * FROM `auth-system-brukere` WHERE brukernavn = ? LIMIT 1";
        $brukernavnEksisterer = $tilkobling->prepare($brukernavnEksistererQuery);
        $brukernavnEksisterer->execute(array($brukernavn));
        $eksistens = $brukernavnEksisterer->fetchAll(PDO::FETCH_ASSOC);

        if (empty($eksistens)) {
          // Lagrer passord som et resultat av bcrypt hashing-algoritme.
          $passord = password_hash($_POST["r_passord"], PASSWORD_BCRYPT);
          $sql = "INSERT INTO `auth-system-brukere`(brukernavn, passord) VALUES (:brukernavn, :passord)";
          $query = $tilkobling->prepare($sql);
          $query->bindParam('brukernavn', $brukernavn, PDO::PARAM_STR);
          $query->bindParam('passord', $passord, PDO::PARAM_STR);
          $query->execute();
          echo "Registrering fullført. Velkommen! <a href='../index.php'>Logg inn</a>";
          $tilkobling = null;
        }

        else if (empty($_POST["r_brukernavn"]) && empty($_POST["r_passord"])) {
          echo("Du må fylle ut alle feltene <a href='../index.php'>Prøv på nytt</a>");
        }
      }


      else {
        echo "Brukernavnet er opptatt. <a href='../index.php'>Prøv på nytt</a>";
      }

      ?>
  </div>

  </body>
</html>
