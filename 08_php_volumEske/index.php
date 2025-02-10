<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stilark.css">
    <title>Størst volum på eske</title>
</head>
<body>
    <main>
        <header>
            <h1>Størst volum på eske</h1>
        </header>
        <section id="tilbruker">
        <?php
        $bredde = 210; // A4 bredde i mm
        $lengde = 297; // A4 lengde i mm

        // Funksjon for å beregne volum
        function volum($bredde, $lengde, $hoyde) {
            $vol = $hoyde * ($lengde - 2 * $hoyde) * ($bredde - 2 * $hoyde);
            return $vol;
        }

        $storst = 0;   // Største volum funnet
        $besteHoyde = 0; // Høyde som gir største volum

        // Iterer gjennom mulige høyder
        for ($i = 1; $i <= $bredde / 2; $i++) { // Høyde må være mindre enn bredde/2
            $neste = volum($bredde, $lengde, $i); // Beregn volum for høyde $i
            if ($neste > $storst) {
                $storst = $neste;   // Oppdater største volum
                $besteHoyde = $i;   // Lagre høyden som gir dette volumet
            }
        }

        // Skriv ut resultatet
        echo "<p>Størst volum på eske er: " . number_format($storst, 2) . " mm³</p>";
        echo "<p>Høyden som gir størst volum er: " . $besteHoyde . " mm</p>";
        ?>
        </section>
    </main>
</body>
</html>

