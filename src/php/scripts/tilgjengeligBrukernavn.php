<?php

require("../database/tilkobling.php");

$brukernavn = $_REQUEST['q'];
$brukernavnEksistererQuery = "SELECT brukernavn FROM `auth-system-brukere` WHERE brukernavn = ?";
$brukernavnEksisterer = $tilkobling->prepare($brukernavnEksistererQuery);
$brukernavnEksisterer->execute(array($brukernavn));
$eksistens = $brukernavnEksisterer->fetchAll(PDO::FETCH_ASSOC);

if (empty($eksistens)) {
  echo "tilgjengelig";
}

else {
  echo "opptatt";
}

$tilkobling = null;

?>
