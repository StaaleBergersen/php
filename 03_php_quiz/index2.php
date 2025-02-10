<?php

session_start(); // Starter en ny sesjon eller gjenopptar en eksisterende

// Initialiser spørsmålsindeks og poeng hvis de ikke er satt
if (!isset($_SESSION["index"])) {
    $_SESSION["index"] = 0; // Indeksen holder styr på hvilket spørsmål som skal vises
    $_SESSION["poeng"] = 0; // Poeng holder styr på antall riktige svar
}

// Spørsmål og svar - Dette er faste data i quizen
$sporsmal = [
    "Hva er hovedstaden i Norge?",       // Spørsmål 1
    "Hva er 2 + 2?",                     // Spørsmål 2
    "Hva heter havet mellom Norge og Danmark?", // Spørsmål 3
    "Hva er 5 ganger 6?",                // Spørsmål 4
    "Hva er den største planeten i solsystemet?" // Spørsmål 5
];

$svar = [
    "Oslo",    // Korrekt svar til spørsmål 1
    "4",       // Korrekt svar til spørsmål 2
    "Skagerak",// Korrekt svar til spørsmål 3
    "30",      // Korrekt svar til spørsmål 4
    "Jupiter"  // Korrekt svar til spørsmål 5
];

?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz med PHP</title>
</head>
<body>
    <main>
        <h1>Quiz med PHP</h1>

        <?php
        // Sjekk om brukeren har sendt inn et svar
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["answer"])) {
            $brukerSvar = trim($_GET["answer"]); // Henter og fjerner unødvendige mellomrom fra brukerens svar
            $korrektSvar = $svar[$_SESSION["index"]]; // Finner korrekt svar for gjeldende spørsmål

            // Sjekk om svaret er riktig
            if (strcasecmp($brukerSvar, $korrektSvar) == 0) {
                // Hvis svaret er riktig
                echo "<p>Riktig!</p>";
                $_SESSION["poeng"]++; // Øk antall riktige svar
            } else {
                // Hvis svaret er feil
                echo "<p>Feil! Riktig svar var: $korrektSvar</p>";
            }

            // Gå til neste spørsmål
            $_SESSION["index"]++;

            // Sjekk om vi har nådd slutten av spørsmålene
            if ($_SESSION["index"] >= count($sporsmal)) {
                // Hvis alle spørsmålene er besvart
                echo "<p>Quizen er ferdig! Du fikk {$_SESSION["poeng"]} av " . count($sporsmal) . " riktige.</p>";
                session_destroy(); // Tilbakestill sesjonen
                exit; // Avslutt programmet
            }
        }

        // Vis neste spørsmål
        echo "<p>" . $sporsmal[$_SESSION["index"]] . "</p>"; // Viser spørsmålet basert på indeksen
        ?>

        <!-- Skjema for å sende inn svar -->
        <form method="GET"> <!-- Bruk GET-metoden for å sende inn svar -->
            <label for="answer">Skriv ditt svar:</label> <!-- Et felt der brukeren skriver svaret -->
            <input type="text" name="answer" id="answer" required> <!-- Krever at brukeren fyller ut noe -->
            <button type="submit">Send svar</button> <!-- Knapp for å sende inn svaret -->
        </form>
    </main>
</body>
</html>
