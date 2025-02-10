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
    <main class="main-content"><h1>Ny eier</h1>
    <form action="" method="post">
    <table style="border: 1px solid black; padding: 140px;">
        <tr>
            <td>
                    <label for="fornavn">Fornavn:</label>
                    <input type="text" name="fornavn" id="fornavn" required>
            </td>
            <td>
                    <label for="etternavn">Etternavn:</label>
                    <input type="text" name="etternavn" id="etternavn" required><br>
            </td>
        </tr>
        <tr>
            <td>
                    <label for="adresse">Adresse:</label>
                    <input type="text" name="adresse" id="adresse" required>
                    
            </td>
            <td>
                    <label for="postnr">Postnr:</label>
                    <input type="text" name="postnr" id="postnr" required><br>
            </td>
        </tr>
        <tr>
            <td>
            
                    <label for="tlf">Telefon:</label>
                    <input type="text" name="tlf" id="tlf" required><br>
            </td>
            <td>
                    <label for="epost">Epost:</label>
                    <input type="email" name="epost" id="epost" required><br>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: right;">
                    <button type="submit" name="leggTil">Legg til</button>
            </td>
        </tr>
    </table>
    </form>

    <?php
  
  // Sjekk om skjemaet har blitt sendt inn
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Hent brukernavn og passord fra skjemaet
    $innsendtFornavn = $_POST['fornavn'];  
    $innsendtEtternavn = $_POST['etternavn'];  
    $innsendtAdresse = $_POST['adresse'];  
    $innsendtPostnr = $_POST['postnr'];  
    $innsendtTlf = $_POST['tlf'];  
    $innsendtEpost = $_POST['epost'];

    // Lag en SQL-spørring
    $sql = "INSERT INTO eiere (fornavn, etternavn, adresse, postnr, tlf, epost) VALUES ('$innsendtFornavn', '$innsendtEtternavn', '$innsendtAdresse', '$innsendtPostnr', '$innsendtTlf', '$innsendtEpost')";
    // Gjør spørringen klar
    $stmt = $conn->prepare($sql);

    // Kjør spørringen
    $stmt->execute();
    header('Location: eiere.php');
}
  
  ?>
    </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
    </body>
</html>