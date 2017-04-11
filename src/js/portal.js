/* (de)aktivere meny */
var meny_profil = document.getElementById("meny_profil");
var bruker_knapp = document.getElementById("profil");
var opp = document.getElementById("opp");
var ned = document.getElementById("ned");
var profil = false;

bruker_knapp.onclick = function() {
  if (!profil) {
    meny_profil.className = "fadein";
    opp.className = "fadein";
    ned.className = "fadeout";
    profil = true;
  }
  else if (profil) {
    meny_profil.className = "fadeout";
    opp.className = "fadeout";
    ned.className = "fadein";
    profil = false;
  }
};

/* XMLHttp-forespørsel for logg ut */
var loggut = "true";
var loggut_knapp = document.getElementById("loggut");
var mottatt;

loggut_knapp.onclick = function () {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      mottatt = this.responseText;
    }
    // Rar bug her, ved å printe hele this.responseText kommer hele koden tilbake.
    // Tar derfor første index av motatt streng, som er suksess (...), altså "s"
    if (mottatt[0] == "s") {
      window.location.href = "../index.php";
    }
  }
  xhttp.open("GET", "../php/portal.php?q="+loggut, true);
  xhttp.send();
};
