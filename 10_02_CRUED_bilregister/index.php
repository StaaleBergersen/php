<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilregister</title>
    <link rel="stylesheet" href="../1stilark.css">
</head>
<body>
    <header>
        <nav>
            <?php include 'meny.php'; ?>
        </nav>
    </header>
    <main class="main-content">
        <section>
            <form method="post" action="login.php">
                <label for="username">Brukernavn:</label>
                <input type="text" id="brukernavn" name="brukernavn" required>
                <label for="password">Passord:</label>
                <input type="password" id="passord" name="passord" required>
                <button type="submit">Logg inn</button>
            </form>
        </section>
        <?php
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if(isset($_SESSION['innlogging']) && $_SESSION['innlogging'] === true) { 
            echo "Du er nå logget inn.";
            header('Location: bilregister.php');
        } else {
            echo "Du er ikke logget inn."; 
                   
        }
        ?>
   </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
    </body>
</html>