<?php
include 'sjekkOmInnlogget.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Ugyldig forespørsel');
}


// Sjekk at nødvendige data er mottatt
if (!isset($_POST['RegNr'], $_POST['Type'], $_POST['Merke'], $_POST['Farge'])) {
    die('Alle felt må fylles ut!');
}

// Hent data fra skjemaet
$regNr = $_POST['RegNr'];
$type = $_POST['Type'];
$merke = $_POST['Merke'];
$farge = $_POST['Farge'];

// Oppdater data i databasen
$sql = "UPDATE biler SET Type = :Type, Merke = :Merke, Farge = :Farge WHERE RegNr = :RegNr";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':Type', $type);
$stmt->bindParam(':Merke', $merke);
$stmt->bindParam(':Farge', $farge);
$stmt->bindParam(':RegNr', $regNr);

if ($stmt->execute()) {
    // Hvis oppdateringen er vellykket, send tilbake til oversikten
    header("Location: bilRegister.php");
    exit;
} else {
    echo "Feil ved oppdatering av bilinformasjon.";
}

?>
