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


<?php
// Starter en session for å lagre innloggingstatus
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kobler til databasen
// Dette er informasjon om hvordan man kobler til databasen
$server = "localhost";       // Servernavnet (lokalt i XAMPP)
$database = "bilregister";       // Navnet på databasen
$dbUser = "root";            // Brukernavnet (standard for XAMPP er 'root')
$dbPassword = "";            // Passord (standard for XAMPP er tomt)

try {
    // Opprett en forbindelse til databasen
    $conn = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $dbUser, $dbPassword);
    echo "Du er nå koblet til databasen   $database på $server";

    if (!isset($_SESSION['innlogging']) || $_SESSION['innlogging'] === false){
       // echo $_SESSION['innlogging'];
        echo "<br> Men du er ikke logget inn";
    } else {
       // echo $_SESSION['innlogging'];
        //echo "<br>Du er logget inn";
        header('Location: index.php');
    }
    // Fortell PHP at den skal vise feil om noe går galt
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Hvis forbindelsen mislykkes, vis en feilmelding og stopp koden
    die("Kunne ikke koble til databasen: " . $e->getMessage());
}

// Sjekk om skjemaet har blitt sendt inn
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Hent brukernavn og passord fra skjemaet
    $innsendtNavn = $_POST['brukernavn'];  // Dette er brukernavnet brukeren skrev
    $innsendtPassord = $_POST['passord'];  // Dette er passordet brukeren skrev

    // Sjekk om brukeren finnes i databasen
    // Spør databasen: "Er det en bruker med dette navnet og passordet?"
    $sql = "SELECT * FROM brukere WHERE brukernavn = '$innsendtNavn' AND passord = '$innsendtPassord'";

    // Gjør spørringen klar
    $stmt = $conn->prepare($sql);

    // Kjør spørringen
    $stmt->execute();

    // Hvis det finnes en rad (en bruker som passer), er innlogging vellykket
    if ($stmt->rowCount() > 0) {
        $_SESSION['innlogging'] = true;  // Lagre at brukeren er logget inn
        header('Location: index.php');  // Send brukeren tilbake til startsiden
        exit;  // Stopp koden her
    } else {
        // Hvis brukeren ikke finnes, vis en feilmelding
        echo "<br>Feil brukernavn eller passord!";
    }
}
?>
   </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
    </body>
</html>