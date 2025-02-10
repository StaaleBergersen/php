<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hvem er eldst</title>
</head>
<body>
    <main>
        <h1>Hvem er eldst?</h1>
        <form method="GET">
            <label for="henrik">Alder til Henrik:</label>
            <input type="number" id="henrik" name="alderHenrik" required><br><br>
            <label for="kari">Alder til Kari:</label>
            <input type="number" id="kari" name="alderKari" required><br><br>
            <button type="submit">Sjekk hvem som er eldst</button>
        </form>
        <?php 
            if (($_SERVER["REQUEST_METHOD"] == "GET") && isset($_GET["alderHenrik"]) && isset($_GET["alderKari"])) {
             
               $alderHenrik = $_GET["alderHenrik"];
                $alderKari = $_GET["alderKari"];
               echo $alderHenrik;
               echo "<br>";
                echo $alderKari;
            }
        
        ?>
    
    
    </main>

</body>
</html>