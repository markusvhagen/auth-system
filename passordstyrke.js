var styrke_output = document.getElementById("styrke");
var styrke_maaler = 0;
var antall_store_bokstaver = 0;
var antall_siffer = 0;
var lengde_sjekk = false;
var store_bokstaver_sjekk = false;
var siffer_sjekk = false;
var styrke_resultat;

function sjekk_styrke() {
    /*
        Algoritmen rangerer hvor bra et passord er utifra visse faktorer.
        For hver faktor som blir oppfylt vil styrke_maaler øke med 1.
        Følgende faktorer bestememr styrke_maaler:
            1. Lengden på passordet; 8 eller mer tegn vil gi 1 poeng.
            2. Store bokstaver; 2 eller mer store bokstaver vil gi 1 poeng.
            3. Siffer; 2 eller mer siffer gir 1 poeng.
    */

    var passord = document.getElementById("passord").value;
    var lengde = passord.length;

    /* Lengden */

    // Hvis lengden ikke har oversteget 8 tegn en eneste gang enda.
    if (lengde >= 8 && lengde_sjekk == false) {
        styrke_maaler += 1;
        lengde_sjekk = true; // Unngår med denne at man kan gå fram og tilbake mellom 8 for å legge til 1 på styrkemåleren. Altså, 1, 2, 3, 4 osv.
    }

    // Hvis lengden er under 8, men har vært over 8. Denne er viktig slik at styrke_maaler ikke holder seg på += 1, etter funksjonen over.
    // Uten denne ville man fått 1 poeng fra lengden uansett hva lengden er, så lenge lengden har vært over 8 én gang.
    else if (lengde < 8 && lengde_sjekk == true) {
        styrke_maaler -= 1;
        lengde_sjekk = false;
    }

    /* Antall store bokstaver */

    antall_store_bokstaver = passord.replace(/[^A-Z]/g, "").length;

    if (store_bokstaver_sjekk == false && antall_store_bokstaver >= 2) {
        styrke_maaler += 1;
        store_bokstaver_sjekk = true;
    }

    else if (store_bokstaver_sjekk == true && antall_store_bokstaver < 2) {
        styrke_maaler -= 1;
        store_bokstaver_sjekk = false;
    }


    /* Antall siffer */

    antall_siffer = passord.replace(/[^0-9]/g, "").length;

    if (siffer_sjekk == false && antall_siffer >= 2) {
        styrke_maaler += 1;
        siffer_sjekk = true;
    }

    else if (siffer_sjekk == true && antall_siffer < 2) {
        styrke_maaler -= 1;
        siffer_sjekk = false;
    }

    /* Bestemmer passordstyrken utifra faktorene */

    switch(styrke_maaler) {
        case 1:
            styrke_resultat = "Svakt";
            styrke_output.style.color = "#FF5468";
            break;
        case 2:
            styrke_resultat = "Middels";
            styrke_output.style.color = "FABE4D";
            break;
        case 3:
            styrke_resultat = "Sterkt";
            styrke_output.style.color = "#4DFA90";
            break;
        default:
            styrke_resultat = "Svært svakt";
            styrke_output.style.color = "#525252";
    }

    /* Output-fase */


    if (lengde >= 1) {
      styrke_output.innerHTML = styrke_resultat;
    }

    else {
      styrke_output.innerHTML = "";
      styrke_maaler = 0;
    }
}
