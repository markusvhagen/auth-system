<?php

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
