<?php

require("../database/tilkobling.php");

session_start();
// Array -> Streng
$brukerid = $_SESSION['brukerid'];
$tekst = utf8_encode(utf8_decode($_POST["tekst"]));
$tid_naa = date('Y-m-d G:i:s');
$nyPostQuery = "INSERT INTO `auth-system-post` (`post`, `tid`, `brukerid`) VALUES (:tekst, :tid, :brukerid)";
$nyPostRequest = $tilkobling->prepare($nyPostQuery);
$nyPostRequest->bindParam('tekst', $tekst, PDO::PARAM_STR);
$nyPostRequest->bindParam('tid', $tid_naa, PDO::PARAM_STR);
$nyPostRequest->bindParam('brukerid', $brukerid, PDO::PARAM_STR);
$nyPostRequest->execute();

header("location: ../portal.php")
?>
