<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bytt Kopper</title>
</head>
<body>
    <h1>Bytt Kopper</h1>
   <p>
    UV oppgave 01 – Bytt innhold i kopper
    </p>
    <p>
        Du skal lage en algoritme som løser utfordringen med å bytte innhold i to kopper. 
        Algoritmen skal først dokumenteres gjennom å skrive løsningen med en pseudokode. 
        Når du har testet logikken i pseudokoden og den er riktig, skal du skrive programmet i Python med bruk av VS code.
    <p>
        Både pseudokoden (txt-fil) og Python-koden (py-fil) skal til slutt lastes opp i Teams under oppgave:
        UV 01 – Bytt innhold i kopper  
    </p>
    <p>
    <?php
        // Definer innholdet i koppene
        $koppA = "Vann";
        $koppB = "Juice";
        
        // Vis opprinnelig innhold
        echo "Før bytte:<br>";
        echo "Kopp A inneholder: $koppA\n <br>";
        echo "Kopp B inneholder: $koppB\n <br>";
        
        // Bytt innhold ved hjelp av en midlertidig variabel
        $temp = $koppA; // Lagre innholdet i Kopp A
        $koppA = $koppB; // Sett innholdet fra Kopp B til Kopp A
        $koppB = $temp; // Sett innholdet fra den midlertidige variabelen til Kopp B
        
        // Vis innholdet etter bytte
        echo "\nEtter bytte: <br>";
        echo "Kopp A inneholder: $koppA <br>";
        echo "Kopp B inneholder: $koppB <br>";
    ?>
    </p>
</body>
</html>