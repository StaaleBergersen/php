<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stilark.css">
    <title>Tippespill</title>
</head>
<body>
    <main>
        <h1>Tippespill</h1>
        <form action="" method="GET">
            <label for="tall">Tipp et tall mellom 1 og 10:</label>
            <input type="number" name="tall" id="tall" min="1" max="10" required>
            <button type="submit">Tipp</button>
        </form>
        <form action="" method="GET">
            <button type="submit" name="reset" value="1">Spill på nytt</button>
        </form>
        <section id="tilbruker">
        <?php
        session_start();

        // Tilbakestill spillet hvis reset-knappen er trykket
        if (isset($_GET['reset']) && $_GET['reset'] == "1") {
            unset($_SESSION['riktigTall']);
            unset($_SESSION['antall']);
            echo "<p>Spillet er tilbakestilt! Tipp et nytt tall for å starte på nytt.</p>";
        } else {
            // Start antall gjetninger hvis det ikke allerede er satt
            if (!isset($_SESSION['antall'])) {
                $_SESSION['antall'] = 0;
            }

            // Hvis det ikke finnes et lagret riktig tall, generer et nytt
            if (!isset($_SESSION['riktigTall'])) {
                $_SESSION['riktigTall'] = rand(1, 10);
            }

            $riktigTall = $_SESSION['riktigTall'];
            $tall = NULL;

            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['tall'])) {
                // Øk antall gjetninger
                $_SESSION['antall']++;
                $tall = filter_input(INPUT_GET, 'tall', FILTER_VALIDATE_INT, [
                    "options" => ["min_range" => 1, "max_range" => 10]
                ]);

                if ($tall === false) {
                    echo "<p>Ugyldig tall! Vennligst velg et tall mellom 1 og 10.</p>";
                } else {
                    echo "<p>Ditt tall: $tall</p>";
                    echo "<p>Riktig tall: $riktigTall</p>";
                    echo "<p>Antall gjetninger: {$_SESSION['antall']}</p>";

                    if ($tall == $riktigTall) {
                        echo "<p>Gratulerer! Du tippet riktig!</p>";
                        // Generer et nytt tall for neste runde
                        $_SESSION['riktigTall'] = rand(1, 10);
                        // Tilbakestill antall gjetninger
                        $_SESSION['antall'] = 0;
                    } elseif ($tall < $riktigTall) {
                        echo "<p>Du tippet for lavt.</p>";
                    } else {
                        echo "<p>Du tippet for høyt.</p>";
                    }
                }
            } else {
                echo "<p>Velg et tall mellom 1 og 10 og trykk på Tipp-knappen.</p>";
            }
        }
        ?>
        </section>
    </main>
</body>
</html>
