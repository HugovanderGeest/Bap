# BAP Code Detective

### Los de fouten op in de code

Importeer eerst het bestand `people.sql` in phpMyAdmin. Je krijgt nu een `bap_detective` database met een table `people`.
Deze code bevat allerlei fouten. En je krijgt dus veel foutmeldingen te zien.
Los alle fouten op door de foutmeldingen goed te lezen, en probeer te achterhalen wat er fout gaat.

Soms is een variabelenaam fout of mist er een haakje, of het pad naar een bestand is niet correct. Misschien moet je bestanden op een andere plek zetten...

### Werkwijze

- Open het bestand index.php in je browser (via localhost)
- Schrijf elke foutmelding op die je tegenkomt
- Los de fout op door na te denken wat de fout betekent, of welke aanpassing er nodig is
- Gebruik code uit je BAP opdrachten om te kijken wat juiste code is

**Als je alles hebt opgelost en de website helemaal werkt, commit en push je alles naar Github**

### Gevonden fouten

Hier schrijf je jouw verslag van fouten en oplossingen

al wat er voor maar begin nu.

$c0nfig naar $config
firstame naar firstname
$sql = 'SELECT * FROM 'people WHERE id = ' . $\_GET[]; naar $sql = 'SELECT * FROM people WHERE id = ' . $\_GET['id'];
