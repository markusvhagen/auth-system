<?php

$mappe = "../filer/bilder/";
$filtype = pathinfo($_FILES["bilde"]["name"], PATHINFO_EXTENSION);
$fil = $mappe . basename('image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . "." . $filtype);
$filid = basename('image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . "." . $filtype);
$opplastningOK = 1;

// Validerer bildet.
if (isset($_POST["submit"])) {
    $sjekk = getimagesize($_FILES["bilde"]["tmp_name"]);
    if ($sjekk !== false) {
        echo "Filen er et ekte bilde! - " . $sjekk["mime"] . ".";
        $opplastningOK = 1;
    }
    else {
        echo "Filen er ikke et bilde";
        $opplastningOK = 0;
    }


    // Sjekker filtypen
    if ($filtype != "jpg" && $filtype != "png" && $filtype != "jpeg" && $filtype != "gif") {
        echo "Kun JPG, JPEG, PNG og GIF er godkjente filtyper";
        $opplastningOK = 0;
    }

    // Sjekker filstørrelsen
    if ($_FILES["bilde"]["size"] > 500000) {
        echo "Filen overgår grensen på filstørrelse.";
        $opplastningOK = 0;
    }

    if ($opplastningOK == 0) {
        echo "Filen ble ikke lastet opp";
        $_SESSION["ferdig"] = false;
    }

    else {
        if (move_uploaded_file($_FILES["bilde"]["tmp_name"], $fil)) {
            echo "Filen " . basename($_FILES["bilde"]["name"]) . " ble lastet opp.";
            require("../database/tilkobling.php");
            session_start();
            $brukerid = $_SESSION["brukerid"];
            $_SESSION["ferdig"] = true;
            $sql = "UPDATE `auth-system-brukere` SET bilde = ? WHERE brukerid = $brukerid";
            $query = $tilkobling->prepare($sql);
            $query->execute(array($filid));
            $tilkobling = null;
        }
        else {
            echo "En feil oppsto, beklager.";
            $_SESSION["ferdig"] = false;
        }
    }
}

header("location: ../profil.php");
?>
