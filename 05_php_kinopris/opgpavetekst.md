# Oppgave: Kinobillettpriser

Du skal lage et PHP-program som beregner prisen for kinobilletter basert på alderen til flere personer. Programmet skal:

1. **Be brukeren om å legge inn antall billetter de ønsker å kjøpe.**
2. **For hver billett, spørre om alderen til personen som skal bruke billetten.**
3. **Bruke følgende regler for prisberegning**:
   - Full pris: 150 kr.
   - Aldersgruppe 2–12 år: 50 % rabatt.
   - Aldersgruppe 13–17 år: 25 % rabatt.
   - Aldersgruppe 0–1 år: Gratis.
4. **Beregn og vis den totale prisen for alle billetter.**

### Eksempel
- Hvis du kjøper 3 billetter, og personene er 10, 15 og 20 år gamle:
  - 10 år: 75 kr (50 % rabatt).
  - 15 år: 112,50 kr (25 % rabatt).
  - 20 år: 150 kr (full pris).
  - **Totalpris: 337,50 kr.**

### Krav til funksjonalitet
- Bruk HTML-skjema for å ta inn antall billetter og alder for hver billett.
- PHP-scriptet skal behandle skjemaet og beregne totalprisen.
- Vis resultatet pent formatert tilbake til brukeren.