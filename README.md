## Start

1. Clone deze repository
2. Kopieer het .env.example bestand naar .env `cp .env.example .env`
3. Vul de juiste database gegevens in (in het `.env` bestand)
4. Draai de commando's `npm install && npm run build`
5. Migreer de database `php artisan migrate`

### Gebruik van de ToDo applicatie
Het is een simpele ToDo applicatie waarbij je een account kunt aanmaken om vervolgens taken aan te maken. Per taak kun
je een titel en omschrijving instellen, maak ook een deadline. De deadline voor 2 dingen gebruikt, om in de applicatie
aan te geven of je deadline al is verstreken en bij het gebruiken van de ICS-link wordt dit ingesteld als einddatum.

### Ontwikkelingsproces
Het was voor mij weer even Livewire opfrissen omdat ik een paar maanden geleden voor het eerst ermee begonnen ben. Dit
was dan voornamelijk alleen met gebruik van de Livewire-components en nog niet zo zeer AlpineJS. Voor deze taak heb ik
mezelf geprobeerd uit te dagen om ook interactiviteit toe te voegen met een klein stukje AlpineJS code. Het is nog niet
perfect gelukt, maar ben er aardig trots op geworden.

Waar ik tot nu toe tegenaan gelopen ben is het valideren van de input met de normale Laravel Validation, waarbij je
simpelweg  `$request->validate([]);` kunt gebruiken. Maar, bij het proberen te valideren sluitte Livewire steeds mijn
modal. Voor nu heb ik dit opgelost door te checken of de vereiste velden wel gevuld zijn, voordat er een actie gebeurd.
Om te voorkomen dat er Exceptions gethrowed worden door de applicatie.

Wat niet al te veel moeite was, maar wat ik wel belangrijk vond, is om rekening te houden met mobiel en laptop bij het
maken van de layout.

### Demo
Er is ook een demo beschikbaar op https://todo.codeurs.nl
