
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
            echo "<tr><th>type</th><th>rase</th><th>navn</th></tr>";
            // Hent ut alle radene i tabellen
            
            for($i = 0; $i < count($rader); $i++) {
                echo "<tr>";
                    echo "<td>" . $rader[$i]['type'] . "</td>";
                    echo "<td>" . $rader[$i]['rase'] . "</td>";
                    echo "<td>" . $rader[$i]['navn'] . "</td>";
                    echo "</tr>";
            }  
            echo "</table>";  
    
    ?>
    
    </main>
</body>
</html>