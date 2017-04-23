<?php

error_reporting(E_ALL & ~E_NOTICE);

try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "auth-system";
    $tilkobling = new PDO("mysql:host=$servername;dbname=$dbname", "$username", "$password");
}

catch(PDOException $error) {
    echo($error->getMessage());
}


?>
