# Forskjellen mellom POST og GET

Forskjellen mellom **`POST`** og **`GET`** ligger i hvordan dataene sendes fra klienten (nettleseren) til serveren. Begge metodene brukes i HTTP-forespørsler, men de har ulike bruksområder og egenskaper.

---

## **GET**
- **Data i URL-en:** Dataene sendes som en del av URL-en, etter spørsmålstegnet (`?`) i formatet `key=value`. For eksempel:
  ```
  http://example.com/quiz.php?question=1&answer=Oslo
  ```
- **Synlig for brukeren:** Siden dataene er i URL-en, er de synlige for brukeren og kan enkelt deles eller bokmerkes.
- **Begrenset størrelse:** Maksimum lengde for URL-er varierer, men er vanligvis begrenset til rundt 2000 tegn (avhengig av nettleser og server).
- **Cachebar:** GET-forespørsler kan caches av nettlesere og proxy-servere, noe som gjør dem nyttige for å hente data som ikke endres ofte.
- **Brukes for:** Henting av data der forespørselen ikke forårsaker noen endringer på serveren (f.eks. søkefunksjoner eller navigasjon).

---

## **POST**
- **Data i kroppen:** Dataene sendes i forespørselens kropp, og ikke som en del av URL-en. Dette betyr at dataene ikke er synlige i adressefeltet.
- **Usynlig for brukeren:** Brukeren kan ikke se dataene som sendes i forespørselen, noe som gjør det litt mer sikkert enn `GET` (men ikke kryptert med mindre HTTPS brukes).
- **Større datamengder:** POST kan håndtere store datamengder, inkludert filer og komplekse strukturer, uten begrensninger som finnes i URL-lengden.
- **Ikke cachebar:** POST-forespørsler caches vanligvis ikke, noe som er nyttig for handlinger som må utføres hver gang (f.eks. innsending av skjemaer).
- **Brukes for:** Handlinger som modifiserer data på serveren, som innsending av skjemaer, lagring i databaser, eller opplasting av filer.

---

## **Sammenligningstabell**

| Funksjon        | GET                                         | POST                                       |
|------------------|--------------------------------------------|--------------------------------------------|
| **Dataoverføring** | URL (spørringstring)                      | Kroppen av forespørselen                   |
| **Synlighet**    | Synlig i adressefeltet                     | Usynlig for brukeren                       |
| **Datamengde**   | Begrenset av URL-lengde (~2000 tegn)        | Ingen praktisk grense (kan sende store mengder data) |
| **Sikkerhet**    | Mindre sikker (data synlig i URL)           | Mer sikkert, men fortsatt ikke kryptert uten HTTPS |
| **Caching**      | Kan caches                                 | Vanligvis ikke caches                     |
| **Bruksområde**  | Hente data uten sideeffekter               | Handlinger som lagrer, endrer eller påvirker serverdata |

---

## **Eksempler**

### **GET Eksempel:**
```html
<form method="GET" action="quiz.php">
    <label for="answer">Skriv ditt svar:</label>
    <input type="text" id="answer" name="answer">
    <button type="submit">Send</button>
</form>
```
- Når brukeren sender inn skjemaet, vil URL-en inkludere dataene:
  ```
  http://example.com/quiz.php?answer=Oslo
  ```

### **POST Eksempel:**
```html
<form method="POST" action="quiz.php">
    <label for="answer">Skriv ditt svar:</label>
    <input type="text" id="answer" name="answer">
    <button type="submit">Send</button>
</form>
```
- Når brukeren sender inn skjemaet, blir dataene sendt i forespørselens kropp, og URL-en forblir:
  ```
  http://example.com/quiz.php
  ```

---

## **Når bruke hva?**

- **GET:**
  - For søkeskjemaer, lenker, eller når du vil gjøre informasjon tilgjengelig i URL-en.
  - Brukes for å hente informasjon uten sideeffekter.

- **POST:**
  - For skjemaer som sender sensitive data (som passord) eller store datamengder.
  - Brukes når forespørselen har en effekt på serveren (f.eks. oppdatering av database).

---

Ved å velge riktig metode basert på brukstilfellet, kan du lage applikasjoner som er både funksjonelle og sikre. 😊
