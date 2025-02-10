
<?php
$beskrivelse = "Bruker logget ut"   ;
$loggSql = "INSERT INTO logg (brukernavn, beskrivelse) VALUES (:beskrivelse)";
$loggStmt = $conn->prepare($loggSql);
$innsendtNavn = $_POST['brukernavn'];
//$loggStmt->bindParam(':brukernavn', $innsendtNavn);
$loggStmt->bindParam(':beskrivelse', $beskrivelse);
$loggStmt->execute();
session_destroy();
header('Location: index.php');


exit;
?>