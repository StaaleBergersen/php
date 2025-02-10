# **Grunnleggende SQL**

## **Hva er SQL?**
SQL (Structured Query Language) er et språk for å håndtere og hente data fra relasjonsdatabaser. Det brukes til å lage, lese, oppdatere og slette data i en database.

---

## **Grunnleggende SQL-operasjoner**
De viktigste SQL-kommandoene kan deles inn i fire hovedgrupper:

1. **CRUD (Create, Read, Update, Delete)** – Brukes for å manipulere data:
   - `INSERT` – Legger til nye rader i en tabell.
   - `SELECT` – Henter data fra en tabell.
   - `UPDATE` – Oppdaterer eksisterende rader.
   - `DELETE` – Sletter rader.

2. **DDL (Data Definition Language)** – Brukes for å definere og endre strukturen til databasen:
   - `CREATE TABLE` – Oppretter en ny tabell.
   - `ALTER TABLE` – Endrer en eksisterende tabell.
   - `DROP TABLE` – Sletter en tabell.

3. **DCL (Data Control Language)** – Brukes til å styre tilgang:
   - `GRANT` – Gir rettigheter til en bruker.
   - `REVOKE` – Fjerner rettigheter fra en bruker.

4. **TCL (Transaction Control Language)** – Brukes til å kontrollere transaksjoner:
   - `COMMIT` – Lagre endringer permanent.
   - `ROLLBACK` – Angre endringer.

---

## **Grunnleggende kommandoer**
### **Opprette en tabell (`CREATE TABLE`)**
```sql
CREATE TABLE elever (
    id INT PRIMARY KEY,
    navn VARCHAR(50),
    alder INT,
    klasse VARCHAR(10)
);
```
Dette lager en tabell kalt `elever` med fire kolonner: `id`, `navn`, `alder` og `klasse`.

---

### **Legge til data (`INSERT INTO`)**
```sql
INSERT INTO elever (id, navn, alder, klasse)
VALUES (1, 'Ola Nordmann', 17, 'VG2');
```
Her legger vi til en elev med id 1.

---

### **Hente data (`SELECT`)**
```sql
SELECT * FROM elever;
```
Henter alle rader fra tabellen `elever`.

Hvis vi bare vil hente navn og alder:
```sql
SELECT navn, alder FROM elever;
```

---

### **Filtrere data (`WHERE`)**
```sql
SELECT * FROM elever WHERE alder > 16;
```
Henter alle elever som er eldre enn 16 år.

---

### **Oppdatere data (`UPDATE`)**
```sql
UPDATE elever
SET alder = 18
WHERE id = 1;
```
Her endrer vi alderen til eleven med `id = 1` til 18.

---

### **Slette data (`DELETE`)**
```sql
DELETE FROM elever WHERE id = 1;
```
Sletter eleven med `id = 1`.

---

### **Sortere data (`ORDER BY`)**
```sql
SELECT * FROM elever ORDER BY navn ASC;
```
Henter alle elever og sorterer dem alfabetisk etter navn.

---

### **Gruppering av data (`GROUP BY` & `HAVING`)**
```sql
SELECT klasse, COUNT(*) AS antall
FROM elever
GROUP BY klasse
HAVING COUNT(*) > 5;
```
Dette teller hvor mange elever det er i hver klasse, men viser kun klasser med mer enn 5 elever.
```
### **Hente data fra et bilregister og eiertabell***
```sql
SELECT biler.regnr, biler.merke, biler.modell, eiere.navn 
FROM biler 
JOIN eiere ON biler.eier_id = eiere.id;
```
Denne spørringen henter registreringsnummer, merke og modell for en bil samt navnet på eieren fra to relaterte tabeller `biler` og `eiere`. Tabellen `biler` har en `eier_id` som kobles til `eiere.id`.

