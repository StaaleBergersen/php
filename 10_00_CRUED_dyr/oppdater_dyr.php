<?php
    include 'kontakte_databasen.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        die('Ugyldig forespørsel');
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dyr_id'])) {
        $dyr_id = $_POST['dyr_id'];
        $dyr_type = $_POST['type'];
        $dyr_rase = $_POST['rase'];
        $dyr_navn = $_POST['navn'];
        $sql = "UPDATE minedyr SET type = :type, rase = :rase, navn = :navn WHERE id = :dyr_id";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':type', $dyr_type);
        $stmt->bindParam(':rase', $dyr_rase);
        $stmt->bindParam(':navn', $dyr_navn);
        $stmt->bindParam(':dyr_id', $dyr_id);
        $stmt->execute();
        header("Location: les_ut_dyr.php");
        exit;
    
    }
    else {
        die('Mangler dyr_id');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Oppdater dyr
</body>
</html>