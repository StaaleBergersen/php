

<?php
include 'sjekkOmInnlogget.php';

if (!isset($_SESSION['administrator']) || $_SESSION['administrator'] == false) {
    header('Location: bilregister.php');
    exit;
}

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
   <h2>Settings</h2> <button>Legg til bruker</button>
        <?php
            $sql = "SELECT * FROM brukere";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $brukere = $stmt->fetchAll();
            echo "<table width='50%'>
                <tr>
                    <th>Brukernavn</th>
                    <th>Passord</th>
                    <th>Navn</th>
                    <th>Organiasjons</th>
                    <th>Administrator</th>
                    <th></th>
                </tr>";
            foreach ($brukere as $bruker) {
                echo "<tr><td>" . $bruker[0] ."</td>";
                echo "<td>" . $bruker[1] . "</td>";
                echo "<td>" . $bruker[2] . "</td>";
                echo "<td>" . $bruker[3] . "</td>";
                echo "<td>" . $bruker[4] . "</td>";
                echo "<td><a href='endreBruker.php?brukernavn={".$bruker[0]."}'><button>Endre</button></a></td></tr>";
            }
            
            echo "</table>";
        ?>
    
        </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
    </body>
</html>