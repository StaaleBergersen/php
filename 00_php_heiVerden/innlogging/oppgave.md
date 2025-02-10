Oppgave: Lag en enkel påloggingsside med bruk av PHP-sesjoner.

Oppgavebeskrivelse:

Lag en enkel påloggingsside der brukere kan skrive inn et brukernavn og et passord.
Hvis brukernavn og passord er riktig, skal brukeren videresendes til en velkomstsiden. Hvis ikke, skal en feilmelding vises.

Bruk PHP-sesjoner til å lagre informasjon om påloggede brukere.

Funksjonaliteter:

Lag en enkel brukerdatabase med minst to brukere (brukernavn og passord).
Lag et påloggingsskjema (HTML-form) som tar imot brukernavn og passord.
Bruk PHP til å validere innsendte data og sjekke om de matcher brukerne i databasen.
Hvis påloggingen er vellykket, lagre brukernavnet i en sesjon og videresend brukeren til en velkomstsiden.
Hvis påloggingen mislykkes, vis en feilmelding på samme side.
Utvidelser (valgfritt):

Lag en utloggingsfunksjon som ødelegger sesjonen og sender brukeren tilbake til påloggingssiden.
Legg til ytterligere sikkerhetstiltak, for eksempel beskyttelse mot SQL-injeksjoner (bruk forberedte uttalelser eller parameteriserte spørringer).