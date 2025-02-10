

<?php
include 'sjekkOmInnlogget.php';

if (!isset($_SESSION['administrator']) || $_SESSION['administrator'] == false) {
    header('Location: bilregister.php');
    exit;

}

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            
            // Sjekk om 'id' er sendt via URL
            if (!isset($_GET['brukernavn'])) {
                die("Feil: Ingen bruker valgt.");
            }
            
            $id = $_GET['brukernavn'];
            
            // Hent bruker fra databasen
            $sql = "SELECT * FROM brukere WHERE brukernavn = :brukernavn";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':brukernavn', $id, PDO::PARAM_INT);
            $stmt->execute();
            $bruker = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Hvis brukeren ikke finnes
            if (!$bruker) {
                die("Bruker ikke funnet.");
            }
            ?>

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
   <h2>Endre brukere</h2> <button>Legg til bruker</button>            
                <form method="post" action="lagre_endringer.php">
                
                    <label>Brukernavn:</label>
                    <input type="text" name="brukernavn" value="<?= $bruker['brukernavn']; ?>" required><br>
            
                    <label>Passord:</label>
                    <input type="test" name="passord" value="<?= $bruker['passord']; ?>" required ><br>
            
                    <label>Navn:</label>
                    <input type="text" name="navn" value="<?= $bruker['navn']; ?>" required><br>
            
                    <label>Organisasjon:</label>
                    <input type="text" name="organisasjon" value="<?= $bruker['organiasjon']; ?>" required><br>
            
                    <label>Rettighet:</label>
                    <input type=text name="rettighet" value="<?=$bruker['rettighet']; ?>" ><br>
            
                    <button type="submit">Lagre endringer</button>
                </form>
            </body>
            </html>
            
        </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
    </body>
</html>