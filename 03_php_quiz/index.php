<?php

session_start();

if (!isset($_SESSION["index"])) {
    $_SESSION["index"] = 0;
}


// Spørsmål og svar
$sporsmal = [
    "Hva er hovedstaden i Norge?",
    "Hva er 2 + 2?",
    "Hva heter havet mellom Norge og Danmark?",
    "Hva er 5 ganger 6?",
    "Hva er den største planeten i solsystemet?"    
];

$svar = [
    "Oslo",
    "4",
    "Skagerak",
    "30",
    "Jupiter"
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
        <section>

            <h1>UV oppgave 03 – Lag en Quiz med 10 spørsmål</h1>
            <p>Oppgave:
                Du skal lage en algoritme der brukeren skal få 10 spørsmål i en quiz. <br>
                Spørsmålene må utformes slik at svarene skal bestå av ett ord. <br>
                Programmet skal etter hvert spørsmål informere brukeren om svaret var rett eller galt. <br>
                I tillegg skal programmet telle opp alle rette svar. Etter siste spørsmål skal programmet informere brukeren om hvor mange rette han/hun fikk. <br>
                Algoritmen skal først dokumenteres gjennom å skrive løsningen med en pseudokode. <br>
                Når du har testet logikken i pseudokoden og den er riktig, skal du skrive programmet i Python/php med bruk av VS code.<br>
            </p>
            <p>    
                Både pseudokoden (txt-fil) og Python-koden/php (py-fil) skal til slutt lastes opp i Teams under oppgave:
            </p>
        </section>
        
    
    
    <?php
        function startFunksjon() {
            global $sporsmal,$svar; 

             // skriv ut spørsmål
            echo $sporsmal[$_SESSION["index"]];    
             // echo $svar[$_SESSION["index"]];
            
            $_SESSION["index"]++; // øker teller med en
           
            if ($_SESSION["index"] >= count($sporsmal)) { // hvis teller er større enn lengden av spørsmålene så start fra starten av igjenn.
                $_SESSION["index"] = 0;
            }
        }
    
        startFunksjon();

        // Sjekk om knappen ble trykket
        if (isset($_GET['startFunksjon'])) {
            startFunksjon();
             } 
    ?>

    <form method="GET">
        <input type="text" name="answer" id="answer">
        <button type="submit" name="startFunksjon" >Send svar</button>
    </form>

    </main>
</body>
</html>