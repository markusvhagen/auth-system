var output_tilgjengelighet = document.getElementById("brukernavnTilgjengelighet");

function tilgjengeligBrukernavn(str) {

  if (str == 0) {
    output_tilgjengelighet.innerHTML = "";
  }

  else {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      output_tilgjengelighet.innerHTML = this.responseText;

      switch (this.responseText) {

        case "tilgjengelig":
          output_tilgjengelighet.style.color = "green";
          break;
        case "opptatt":
          output_tilgjengelighet.style.color = "red";
          break;
      }

    };
    xmlhttp.open("GET", "../src/php/scripts/tilgjengeligBrukernavn.php?q="+str, true);
    xmlhttp.send();
  }

}
