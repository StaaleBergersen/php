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
        <button><a href="nyEiere.php">Ny eier</a></button><h1>Oversikt eiere</h1>
        <?php
            // Hent alle kundene fra databasen
          $sql_kunde = "SELECT eiere.Fnr, eiere.tlf, eiere.epost, eiere.fornavn, eiere.etternavn, eiere.adresse, eiere.postnr FROM eiere ORDER BY eiere.etternavn ASC;";

          // Gjør spørringen klar
          $stmt = $conn->prepare($sql_kunde);
      
          // Kjør spørringen
          $stmt->execute();

          $rader = $stmt->fetchAll(); // Hent alle radene fra tabellen

          echo "<table>";
            echo "<tr><th>Etternavn</th><th>Fornavn</th><th>Adresse</th><th>Postnr</th><th>Telefon</th><th>Epost</th></tr>";
            // Hent ut alle radene i tabellen
            
            for($i = 0; $i < count($rader); $i++) {
                echo "<tr>";
                    echo "<td>" . $rader[$i]['etternavn'] . "</td>";
                    echo "<td>" . $rader[$i]['fornavn'] . "</td>";
                    echo "<td>" . $rader[$i]['adresse'] . "</td>";
                    echo "<td>" . $rader[$i]['postnr'] . "</td>";
                    echo "<td>" . $rader[$i]['tlf'] . "</td>";
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