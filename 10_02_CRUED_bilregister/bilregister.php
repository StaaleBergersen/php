
<?php
include 'sjekkOmInnlogget.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilregister</title>
    <link rel="stylesheet" href="../1stilark.css">
</head>
<body>
    <header>
        <nav>
            <?php include 'meny.php'; ?>
        </nav>
    </header>
    <main class="main-content">
        <button><a href="nyBiler.php">Ny Bil</a></button><h1>Bilregister</h1>
        <?php
            // SQL-spørring for å hente ut alle biler

          $sql = "SELECT biler.*, eiere.fornavn, eiere.etternavn, eiere.epost FROM biler LEFT JOIN eiere ON biler.Fnr = eiere.Fnr ORDER BY biler.Type ASC;";

          // Gjør spørringen klar
          $stmt = $conn->prepare($sql);
      
          // Kjør spørringen
          $stmt->execute();

          $rader = $stmt->fetchAll(); // Hent alle radene fra tabellen

          echo "<table>";
            echo "<tr><th>Biltype</th><th>Merke</th><th>Farge</th><th>RegNr</th><th>Fornavn</th><th>Etternavn</th><th>Epost</th></tr>";
            // Hent ut alle radene i tabellen
            
            for($i = 0; $i < count($rader); $i++) {
                echo "<tr>";
                echo "<td>" . $rader[$i]['Type'] . "</td>";
                echo "<td>" . $rader[$i]['Merke'] . "</td>";
                echo "<td>" . $rader[$i]['Farge'] . "</td>";
                echo "<td>" . $rader[$i]['RegNr'] . "</td>";
                echo "<td>" . $rader[$i]['fornavn'] . "</td>";
                echo "<td>" . $rader[$i]['etternavn'] . "</td>";
                echo "<td>" . $rader[$i]['epost'] . "</td>";
                echo "</tr>";
            }  
            echo "</table>";
            
        ?>

    </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
    </body>
</html>