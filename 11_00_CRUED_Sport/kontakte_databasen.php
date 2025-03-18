<?php

// Kobler til databasen
// Dette er informasjon om hvordan man kobler til databasen
$server = "localhost";       // Servernavnet (lokalt i XAMPP)
$database = "sport";       // Navnet på databasen
$dbUser = "root";            // Brukernavnet (standard for XAMPP er 'root')
$dbPassword = "";            // Passord (standard for XAMPP er tomt)

try {
    // Opprett en forbindelse til databasen
    $conn = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $dbUser, $dbPassword);
    echo "Du er nå koblet til databasen   $database på $server";

    // Fortell PHP at den skal vise feil om noe går galt
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Hvis forbindelsen mislykkes, vis en feilmelding og stopp koden
    die("Kunne ikke koble til databasen: " . $e->getMessage());
}

?>