<?php
if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

 if (!isset($_SESSION['innlogging']) || $_SESSION['innlogging'] !== true) {
            // Hvis brukeren ikke er logget inn, send til index.php og stopp videre utførelse
 header('Location: index.php');
exit();}


// Hvis brukeren er logget inn, fortsett med å koble til databasen og vise innhold
$server = "localhost";       // Servernavn (lokalt i XAMPP)
$database = "bilregister";   // Navnet på databasen
$dbUser = "root";            // Brukernavnet (standard for XAMPP er 'root')
$dbPassword = "";            // Passord (standard for XAMPP er tomt)

try {
    // Opprett en forbindelse til databasen
    $conn = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $dbUser, $dbPassword);
    // Fortell PHP å vise feil hvis noe går galt
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Du kan eventuelt skrive en bekreftelse på tilkoblingen hvis det er nyttig
    // echo "Du er nå koblet til databasen $database på $server";
} catch (PDOException $e) {
    die("Kunne ikke koble til databasen: " . $e->getMessage());
}
?>
