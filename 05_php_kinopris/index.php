<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stilark.css">
    <title>Kinopris</title>
</head>
<body>
    <main>
        <section id="tilbruker">
            <h1>Kinopris</h1>
            <p>Her kan du sjekke prisen på kinobilletter basert på alderen til personen som skal bruke billetten.Skriv inn antall biletter du ønsker å kjøpe.</p>
            <form action="" method="GET" >
                <label for="alder">Alder 0-1 år :</label>
                <input type="number" value="0" min="0" name="alder1" id="alder1">
                <label for="alder">Alder 2-12 år :</label>
                <input type="number" value="0" min="0" name="alder2" id="alder2">
                <label for="alder">Alder 3-17 år :</label>
                <input type="number" value="0" min="0" name="alder17" id="alder17">
                <label for="alder">Alder over 18 år :</label>
                <input type="number" value="0" min="0" name="alder18" id="alder18">
                <button type="submit">Sjekk pris</button>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["alder1"], $_GET["alder2"], $_GET["alder17"], $_GET["alder18"])) {
                $alder1 = $_GET["alder1"];
                $alder2 = $_GET["alder2"];
                $alder17 = $_GET["alder17"];
                $alder18 = $_GET["alder18"];
                $fullpris = 150;
                $pris1 = $fullpris * 0;
                $pris2 = $fullpris * 0.5;
                $pris17 = $fullpris * 0.75;
                $pris18 = $fullpris * 1;
                $sum1 = $alder1 * $pris1;
                $sum2 = $alder2 * $pris2;
                $sum17 = $alder17 * $pris17;
                $sum18 = $alder18 * $pris18;
                $totalpris = $sum1 + $sum2 + $sum17 + $sum18;

                echo "<table border='1'>";
                echo "<tr><th>Aldersgruppe</th><th>Antall billetter</th><th>Pris per billett</th><th>Sum</th></tr>";
                echo "<tr><td>0-1 år</td><td>$alder1</td><td>" . number_format($pris1, 2) . " kr</td><td>" . number_format($sum1, 2) . " kr</td></tr>";
                echo "<tr><td>2-12 år</td><td>$alder2</td><td>" . number_format($pris2, 2) . " kr</td><td>" . number_format($sum2, 2) . " kr</td></tr>";
                echo "<tr><td>13-17 år</td><td>$alder17</td><td>" . number_format($pris17, 2) . " kr</td><td>" . number_format($sum17, 2) . " kr</td></tr>";
                echo "<tr><td>18 år og over</td><td>$alder18</td><td>" . number_format($pris18, 2) . " kr</td><td>" . number_format($sum18, 2) . " kr</td></tr>";
                echo "<tr><th colspan='3'>Totalpris</th><th>" . number_format($totalpris, 2) . " kr</th></tr>";
                echo "</table>";
            }
            else {
                echo "Fyll inn antall biletter";
            }
            ?>

        <p>
    </section>
    <h1># Oppgave: Kinobillettpriser</h1>
    <p>
        Du skal lage et PHP-program som beregner prisen for kinobilletter basert på alderen til flere personer. Programmet skal:
    </p>
<lo>
    <li>Be brukeren om å legge inn antall billetter de ønsker å kjøpe.</li>
    <li>For hver billett, spørre om alderen til personen som skal bruke billetten.</li>
    <li>Bruke følgende regler for prisberegning:
        <ul>
            <li>Full pris: 150 kr.</li>
            <li>Aldersgruppe 2–12 år: 50 % rabatt.</li>
            <li>Aldersgruppe 13–17 år: 25 % rabatt.</li>
            <li>Aldersgruppe 0–1 år: Gratis.</li>
        </ul>
    </li>
    <li>Beregn og vis den totale prisen for alle billetter.</li>
</lo>
    <p>
        Eksempel:
        <ul>
            <li>Hvis du kjøper 3 billetter, og personene er 10, 15 og 20 år gamle:</li>
            <ul>
                <li>- 10 år: 75 kr (50 % rabatt).</li>
                <li>- 15 år: 112,50 kr (25 % rabatt).</li>
                <li>- 20 år: 150 kr (full pris).</li>
                <li>- **Totalpris: 337,50 kr.**</li>
            </ul>
        </ul>
    </p>

    <h1>### Krav til funksjonalitet</h1>    
    <p>
        <lo>
            <li>- Bruk HTML-skjema for å ta inn antall billetter og alder for hver billett.</li>
            <li>- PHP-scriptet skal behandle skjemaet og beregne totalprisen.</li>
            <li>- Vis resultatet pent formatert tilbake til brukeren.</li>
        </lo>
    </p>
    </main>
</body>
</html>