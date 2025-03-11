<?php
include 'sjekkOmInnlogget.php';

// Koble til databasen (antar $pdo er tilgjengelig fra inkluderte filer)

// Sjekk om RegNr er satt i URL
if (!isset($_GET['RegNr'])) {
    die('RegNr mangler!');
}

$regNr = $_GET['RegNr'];

// Hent data fra databasen for den aktuelle bilen
$sql = "SELECT * FROM biler WHERE RegNr = :RegNr";
$stmt = $conn->prepare($sql);
$stmt->execute([':RegNr' => $regNr]);
$bil = $stmt->fetch();

if (!$bil) {
    die('Bilen finnes ikke.');
}
?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Endre Bil</title>
    <link rel="stylesheet" href="../1stilark.css">
</head>
<body>
    <header>
        <nav>
            <?php include 'meny.php'; ?>
        </nav>
    </header>

    <main class="main-content">
        <h1>Endre Bil - <?= htmlspecialchars($bil[0]) ?></h1>
        
        <form method="post" action="oppdaterBil.php">
            <input type="hidden" name="RegNr" value="<?= htmlspecialchars($bil[0]) ?>">
            
            <label for="Type">Biltype:</label>
            <input type="text" id="Type" name="Type" value="<?= htmlspecialchars($bil[1]) ?>" required>

            <label for="Merke">Merke:</label>
            <input type="text" name="Merke" id="Merke" value="<?= htmlspecialchars($bil[2]) ?>" required>

            <label for="Farge">Farge:</label>
            <input type="text" name="Farge" id="Farge" value="<?= htmlspecialchars($bil[3]) ?>" required>

            <button type="submit">Lagre endringer</button>
        </form>
    </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>
