<?php
    include 'kontakte_databasen.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dyr_id'])) {
        $dyr_id = intval($_POST['dyr_id']);
    }
    else {
        die('Mangler dyr_id');
    }

// Hent data fra databasen for den aktuelle bilen
$sql = "SELECT * FROM minedyr WHERE id = :dyr_id";
$stmt = $conn->prepare($sql);
$stmt->execute([':dyr_id' => $dyr_id]);
$dyr = $stmt->fetch();

if (!$dyr) {
    die('Bilen finnes ikke.');
}



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
    <main>
        <?php 
        echo $dyr[1];
        ?>
        <h1>Endre dyr</h1>
        <form action="oppdater_dyr.php" method="POST">
            <input type="hidden" name="dyr_id" value="<?= $dyr_id ?>">
            <label for="type">Type</label>
            <input type="text" name="type" id="type"  value="<?= htmlspecialchars($dyr[1]) ?>"  required>
            <label for="rase">Rase</label>
            <input type="text" name="rase" id="rase" value="<?= htmlspecialchars($dyr[2]) ?>" required>
            <label for="navn">Navn</label>
            <input type="text" name="navn" id="navn" value="<?= htmlspecialchars($dyr[3]) ?>" required>
            <button type="submit">Oppdater</button>
        </form>

    </main>
</body>
</html>