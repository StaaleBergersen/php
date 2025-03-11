<?php
    include 'kontakte_databasen.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../1stilark.css">
    <title>kjæledyr</title>
</head>
<body>
    <header>
        <nav>
            <?php include 'meny.php'; ?>
        </nav>
    </header>
    <main class="main-content">
        <h1>Legg til dyr</h1>
        <form action="legg_til_dyr.php" method="POST">
            <label for="type">Type</label>
            <input type="text" name="type" id="type" required>
            <label for="rase">Rase</label>
            <input type="text" name="rase" id="rase" required>
            <label for="navn">Navn</label>
            <input type="text" name="navn" id="navn" required>
            <button type="submit">Legg til</button>
        </form>
        </main>
</body>
</html>
        <?php
  
  // Sjekk om skjemaet har blitt sendt inn
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Hent brukernavn og passord fra skjemaet
    $innsendtType = $_POST['type'];  
    $innsendtRase = $_POST['rase'];  
    $innsendtNavn = $_POST['navn'];  

    // Lag en SQL-spørring
    $sql = "INSERT INTO minedyr (type,rase,navn) VALUES ('$innsendtType', '$innsendtRase', '$innsendtNavn')";
    // Gjør spørringen klar
    $stmt = $conn->prepare($sql);

    // Kjør spørringen
    $stmt->execute();
    header('Location: les_ut_dyr.php');
}

?>
