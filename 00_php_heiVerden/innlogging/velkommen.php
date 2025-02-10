<?php
session_start();

// Sjekk om brukeren er logget inn
if (!isset($_SESSION['username'])) {
    // Hvis ikke, omdiriger tilbake til login-siden
    header("Location: index.php");
    exit();
}

// Velkomstmelding
echo "Velkommen " . $_SESSION['username'] . "!";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velkommen</title>
</head>
<body>
    <!-- Resten av innholdet på velkommen-siden kan legges til her -->
    <p>Du er nå logget inn.</p>
</body>
</html>