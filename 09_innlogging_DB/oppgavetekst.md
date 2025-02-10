# Oppgave: Lag et innloggingssystem for en webløsning

## **Innledning**
Du skal lage en innloggingsside for en webløsning. Dette for å sikre at innholdet på siden kun blir synlig for den innloggede brukeren. Brukeren må kunne logge inn med et brukernavn og passord som er lagret i en database. Dersom innloggingen er vellykket, skal brukeren få tilgang til en beskyttet side. Dersom innloggingen mislykkes, skal brukeren få en feilmelding.

Brukeren skal også ha muligheten til å logge ut, slik at andre ikke får tilgang til den beskyttede informasjonen.

---

## **Krav til oppgaven**
Du skal lage tre filer:

1. **`index.php`** – Startsiden med et innloggingsskjema og en melding som viser om brukeren er innlogget eller ikke.
2. **`login.php`** – Behandler innloggingsforsøket og kobler til databasen for å sjekke brukerens legitimasjon.
3. **`logout.php`** – Logger brukeren ut og sender dem tilbake til startsiden.

---

## **Del 1: Oppsett av database**
Før du begynner med PHP-koden, må du sette opp en database i MySQL.

1. Opprett en database kalt `innlogging`:
```sql
CREATE DATABASE innlogging;
USE innlogging;
```

Dette gjør du i phpAdmin

2. Opprett en tabell `brukere` med kolonner for `id`, `brukernavn` og `passord`:
```sql

CREATE TABLE brukere (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brukernavn VARCHAR(50) NOT NULL UNIQUE,
    passord VARCHAR(255) NOT NULL
);
```

3. Sett inn noen testbrukere:
```sql
INSERT INTO brukere (brukernavn, passord) VALUES ('admin', '1234');
INSERT INTO brukere (brukernavn, passord) VALUES ('bruker1', 'passord1');
```

*Merk:* I en ekte applikasjon bør passord lagres kryptert med `password_hash()`, men for denne oppgaven holder det med enkle strenger.

---

## **Del 2: Lag startsiden (`index.php`)**
Denne siden skal inneholde:
- Et innloggingsskjema med feltene **brukernavn** og **passord**.
- En melding som viser om brukeren er logget inn eller ikke.
- En utloggingsknapp for å logge ut.

Eksempel på HTML for innlogging:
```html
<form method="post" action="login.php">
    <label for="brukernavn">Brukernavn:</label>
    <input type="text" id="brukernavn" name="brukernavn" required><br>
    
    <label for="passord">Passord:</label>
    <input type="password" id="passord" name="passord" required><br>

    <button type="submit">Logg inn</button>
</form>

<form method="post">
    <button type="submit" name="loggut">Logg ut</button>
</form>
```

I tillegg skal siden sjekke om brukeren er logget inn og vise en melding:

```php
session_start();

if (isset($_SESSION['innlogging']) && $_SESSION['innlogging'] === true) {
    echo "<p>Du er nå logget inn.</p>";
} else {
    echo "<p>Du er ikke logget inn.</p>";        
}
```

---

## **Del 3: Lag innloggingslogikken (`login.php`)**
Denne filen skal:
- Koble til databasen.
- Sjekke om brukernavnet og passordet stemmer overens med en bruker i databasen.
- Hvis riktig, lagre en **session**-variabel som bekrefter innlogging.

Eksempel på PHP-kode:
```php
<?php
session_start();
$server = "localhost";
$database = "innlogging";
$dbUser = "root";
$dbPassword = "";

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $dbUser, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kunne ikke koble til databasen: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $innsendtNavn = $_POST['brukernavn'];
    $innsendtPassord = $_POST['passord'];

    $sql = "SELECT * FROM brukere WHERE brukernavn = ? AND passord = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$innsendtNavn, $innsendtPassord]);

    if ($stmt->rowCount() > 0) {
        $_SESSION['innlogging'] = true;
        header('Location: index.php');
        exit;
    } else {
        echo "<p>Feil brukernavn eller passord!</p>";
    }
}
?>
```

*Merk:* Dette eksempelet bruker ikke krypterte passord. I en ekte applikasjon bør du bruke `password_hash()` og `password_verify()`.

---

## **Del 4: Lag utlogging (`logout.php`)**
Denne filen skal:
- Starte en session.
- Ødelegge session og sende brukeren tilbake til startsiden.

```php
<?php
session_start();
session_destroy();
header('Location: index.php');
exit;
?>
```

---

## **Ekstra utfordringer**
1. **Forbedre sikkerheten** – Bruk `password_hash()` og `password_verify()` for å lagre passord trygt.
2. **Vis brukerens navn** når de er logget inn.
3. **Legg til en registreringsside** for nye brukere.

---

**Levering:** Last opp `.php`-filene og en eksportert `.sql`-fil av databasen.

Lykke til! 🚀

