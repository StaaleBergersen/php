<?php
    include 'kontakte_databasen.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../1stilark.css">
    <title>Kjæledyr</title>
</head>
<body>
    <header>
        <nav>
            <?php include 'meny.php'; ?>
        </nav>
    </header>
    <main>
        <h1>Les alle dine dyr</h1>
<?php
        $sql_dyr = "SELECT * FROM minedyr;";
        
        // Gjør spørringen klar
        $stmt = $conn->prepare($sql_dyr);
        
        // Kjør spørringen
        $stmt->execute();
        
        $rader = $stmt->fetchAll(); // Hent alle radene fra tabellen

        echo "<table>";
        echo "<tr><th>Type</th><th>Rase</th><th>Navn</th><th>Slett</th><th>Oppdater</th></tr>";
        
        // Hent ut alle radene i tabellen
        foreach ($rader as $rad) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($rad['type']) . "</td>";
            echo "<td>" . htmlspecialchars($rad['rase']) . "</td>";
            echo "<td>" . htmlspecialchars($rad['navn']) . "</td>";
            echo "<td>
                    <form action='slett_dyr.php' method='POST' onsubmit='return confirm(\"Er du sikker på at du vil slette " . htmlspecialchars($rad['navn']) . "?\");'>
                        <input type='hidden' name='dyr_id' value='" . $rad['id'] . "'>
                        <button type='submit'>Slett</button>
                    </form>
                  </td>";
                  echo "<td>
                  <form action='endre_dyr.php' method='POST' );'>
                      <input type='hidden' name='dyr_id' value='" . $rad['id'] . "'>
                      <button type='submit'>Oppdater</button>
                  </form>
                </td>";
            echo "</tr>";
        }

        echo "</table>";  
?>
    </main>
</body>
</html>

