<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>innlogging</title>
</head>
<body>
    <main>
        <section>
            <h1>Logg inn</h1>
            <form method="post" action="login.php">
                <label for="username">Brukernavn:</label>
                <input type="text" id="username" name="username" required><br>
                <label for="password">Passord:</label>
                <input type="password" id="password" name="password" required><br>
                <button type="submit">Logg inn</button>
            </form>
        </section>
        <?php
        session_start();
        
        if(isset($_SESSION['innlogging']) && $_SESSION['innlogging'] === true) { 
            echo "<p>Du er nå logget inn.</p>";
        } else {
            echo "<p>Du er ikke logget inn.</p>";        
        }
        ?>
    </main>
</body>
</html>