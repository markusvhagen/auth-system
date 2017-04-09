<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Autentikasjonssystem</title>

  <link href="style/main.css" rel="stylesheet" type="text/css">
  </head>
  <body>

  <div id="header">
    <h1>Autentikasjonssytem</h1>
      <h3>av Markus Valås Hagen</h3>
      <p>For din sikkerhet blir passord lagret som hash-verdier på databasen. Mer funksjoner er planlagt. Følg kodens utvikling på <a target="_blank" href="https://github.com/markusvhagen/auth-system">GitHub</a></p>
      <hr>
  </div>

  <div id="logg_inn">
    <h2>Logg inn</h2>
    <form action="./php/logg_inn.php" method="post">
      <label><strong>Brukernavn: </strong></label><br>
      <input type="text" name="l_brukernavn"></input><br><br>
      <label><strong>Passord: </strong></label><br>
      <input name="l_passord" type="password"></input><br><br>
      <button type="submit" name="login">Logg inn!</button>
    </form>
  </div>

  <div id="logg_inn_knapp">
    <h4 onclick="logginnAktiv()">Har du en bruker? <br> Logg inn!</h4>
  </div>

  <div id="registrer_deg_knapp">
    <h4 onclick="registrerAktiv()">Har du ikke en bruker? <br>Registrer deg!</h4>
  </div>

  <div id="registrer_deg">
    <h2>Registrer deg</h2>
    <form action="./php/registrer_deg.php" method="post" autocomplete="off">
      <label><strong>Brukernavn: </strong></label><br>
      <input oninput="tilgjengeligBrukernavn(this.value)" type="text" id="brukernavn" name="r_brukernavn">
      <br>Brukernavnet er <b><span id="brukernavnTilgjengelighet"></b></span><br><br>
      <label><strong>Passord: </strong></label><br>
      <input type="password" oninput="sjekk_styrke()" id="passord" name="r_passord"><br>
      Passordstyrke: <b><span id="styrke"></span></b><br><br>
      <button type="submit" name="login">Registrer deg!</button>
    </form>
  </div>

  <script type="text/javascript" src="js/passordstyrke.js"></script>
  <script type="text/javascript" src="js/form.js"></script>
  <script type="text/javascript" src="js/tilgjengeligBrukernavn.js"></script>
  </body>
</html>
