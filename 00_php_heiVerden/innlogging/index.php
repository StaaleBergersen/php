<!--
 * Oppgave p05- sesjoner
 * Porsgrunn vgs - 2023
 * Utvikling vg2
 * 
 * Laget av Staale Andre Bergersen
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h2>Login Page</h2>

    <?php
    session_start();

    // Simulert brukerdatabase (normalt ville dette være lagret i en database)
    $users = array(
        'user1' => 'password1',
        'user2' => 'password2'
    );

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Sjekk om brukeren eksisterer og passordet er riktig
        if (array_key_exists($username, $users) && $users[$username] == $password) {
            $_SESSION['username'] = $username;
            header("Location: velkommen.php");
            exit();
        } else {
            echo "Feil brukernavn eller passord.";
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Brukernavn:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Passord:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Logg inn</button>
    </form>
</body>
</html>