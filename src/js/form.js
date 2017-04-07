var loggInn = document.getElementById("logg_inn");
var registrerDeg = document.getElementById("registrer_deg");
var loggInnKnapp = document.getElementById("logg_inn_knapp");
var registrerDegKnapp = document.getElementById("registrer_deg_knapp");

function registrerAktiv() {
  loggInn.style.display = "none";
  registrerDeg.style.display = "block";
  loggInnKnapp.style.display = "block";
  registrerDegKnapp.style.display = "none";
}

function logginnAktiv() {
  loggInn.style.display = "block";
  registrerDeg.style.display = "none";
  loggInnKnapp.style.display = "none";
  registrerDegKnapp.style.display = "block";
}
