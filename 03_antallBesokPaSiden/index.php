<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antall besøk</title>
</head>
<body>
    <header>
        <h1>Antall besøk på siden</h1>      
    </header>
    <main>
        <?php
        session_start();
        
        if($_SESSION['antBesok']) {
            
            $_SESSION['antBesok'] += 1;
            echo "<p>Du har besøkt denne siden " . $_SESSION['antBesok'] . " ganger.</p>";

        } else {
            
            echo "<p>Dette er ditt første besøk!</p>";
            $_SESSION['antBesok'] = 1;                 
        }

        ?>
       <h3> Oppgavetittel:</h3>

        Lagre og vis antall besøk med PHP-session

        <h3>Beskrivelse:</h3>
        Lag et PHP-program som bruker sessions for å telle hvor mange ganger en bruker har besøkt nettsiden. Når brukeren åpner siden for første gang, skal det stå:

        <pre><i>"Dette er ditt første besøk!" </i></pre>
        
        <p>
        Hvis brukeren åpner siden på nytt, skal det vises hvor mange ganger brukeren har vært på nettsiden, for eksempel:
        </p>
        <pre><i>"Du har besøkt denne siden 5 ganger."</pre></i>
        <p>
            I tillegg skal det være en knapp som lar brukeren tilbakestille antall besøk til 0.
        </p>
        <h3>Krav:</h3>
        Bruk PHP-session for å lagre antall besøk.
        Oppdater og vis antall besøk hver gang siden lastes.
        Legg til en knapp for å tilbakestille tellingen.
    </main>  
    <footer>
        <p>Antall besøk: <?php echo $_SESSION['antBesok']; ?></p>
    </footer>  
</body>
</html>