<?php
    // Start session hvis den ikke allerede er startet
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>

<nav>
        <ul class="nav-links">
            <a href="bilregister.php"><img src="img/logo.jpg" width="80px" alt="Logo"></a>
            <li><a href="bilregister.php">Bilregister</a></li>
            <li><a href="eiere.php">Eiere</a></li>
            <li><a href="reports.php">Rapporter</a></li>
            <?php
            if (isset($_SESSION['administrator']) && $_SESSION['administrator'] == true) {
               echo "<li><a href='settings.php'>Innstillinger</a></li>";
            } 
            ?>
            <?php
        
        // Sjekk innloggingsstatus og sett riktig ikon
        if (isset($_SESSION['innlogging']) && $_SESSION['innlogging'] === true) {
            // Bruker er logget inn – vis et annet ikon (erstatt path/to/logged-in-icon.png med den faktiske filstien)
            echo '<span><img src="img/loggedIn.png" alt="Logget inn" width="20px"></span>';
        } else {
            // Bruker er ikke logget inn – vis standard-ikon eller en annen variant
            echo '<span><img src="img/loggedOut.png" alt="Ikke logget inn" width="20px"></span>';
        }
        ?>
            <li><form method="post" action="">
                <button type="submit" name="loggut">Logg ut</button>
            </form></li>
        </ul>
</nav>

<?php
// Starter en session for å lagre innloggingstatus
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
        
        if(isset($_POST['loggut'])) {
            $_SESSION['innlogging'] = false;
            session_destroy();
            header('Location: index.php');
            exit;
        }

        ?>