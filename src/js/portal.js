var meny = document.getElementById("meny");
var profil = false;
var bruker = document.getElementById("profil");
var meny1 = document.getElementById("meny_1");
var meny2 = document.getElementById("meny_2");
var meny3 = document.getElementById("meny_3");

bruker.onclick = function() {
  if (!profil) {
    meny.style.background = "#e74c3c";
    meny3.innerHTML = "Logg ut";
    meny2.innerHTML = "Innstillinger";
    meny1.innerHTML = "Endre profil";
    profil = true;
    console.log("Profil false")
  }
  else if (profil) {
    meny.style.background = "#2980b9";
    meny3.innerHTML = "Element 3";
    meny2.innerHTML = "Element 2";
    meny1.innerHTML = "Element 1";
    profil = false;
    console.log("Profil true")
  }
};
