Gemaakt door: Oussama EL-Hajoui
Gemaakt op: 17-07-2017
Contents: Uitleg over het gemaakte webapplicatie.

[Argumentatie]
Zoals werd gevraagd in de opdracht heb ik een ticket systeem gemaakt.
In het ticket systeem zijn de volgende functionaliteiten te vinden;
- ticket aanmaken met bijlage{s}
- ticket bekijken
- op een ticket reageren met bijlage{s}

De technieken die hiervoor zijn gebruikt zijn;
- php
- mysql
- pdo
- javascript
- jquery
- ajax
- rest api
- materializecss

De layout is zelf gecreëerd zonder een template te gebruiken. 
Er zijn componements gebruikt van MaterializeCss maar ik denk dat het opdracht toch voornamelijk gaat om de functionaliteiten.
Omdat het een back-end vacature is.
De webapplicatie is tevens responsive.

in totaliteit heb ik er ongeveer 3 uurtjes aangewerkt.


[INSTALLATIE]

{STAP 1}
Zorg ervoor dat de meegleverde sql bestand ingevoerd wordt in de database 
(deze hoort als het goed is een database schema aan te maken met de naam ticketsysteem. zorgervoor dat er geen conflicten onstaan doordat er al een oude database met die naamgeving bestaat)
Wanneer de database is aangemaakt met alle tables en colomns kunt u beginnen met het 2e stap.

{STAP 2}
zorg ervoor dat de documenten op een apache server draait bijvoorbeeld xampp of wampp, ik heb namelijk een .htaccess gemaakt waarbij ik de urls modify. hierdoor worden namelijk de .php extenties verwijderd.
controleer ook dat de apache server aan staat samen met de mysql server. 

{STAP 3)
Zet alle bestanden in je root folder of een mapje van je root folder om zo toegang te krijgen via localhost of iets dergelijks op het web.

{STAP 4}
Voer uw database gegevens in, dit moet gedaan worden in het config.php bestand. Hier vindt u standaard de reguliere gegevens maar deze kunt u zelf veranderen als u dat wilt.

{STAP 5}
Navigeer naar de webapplicatie en je bent klaar :)

[Korte handleiding]
{tickets bekijken}
Op de homepagina kunt u het aantal tickets zien en de tickets zelf in een lijst.
U kunt op iedere ticket klikken als u wenst om deze te bezoeken. Wanneer u op een ticket heeft geklikt ziet u alle details ervan, wanneer er ook bijlages zijn toegevoegd kunt u die ook vinden op de pagina

{ticket toevoegen}
Om een ticket toe te voegen, kunt u via het menu op het 2e icoontje drukken, nieuwe ticket.
Wanneer u op de pagina bent om een nieuwe ticket toe te voegen, hoor je daar alle gegevens in te vullen behalve een document te uploaden dat is niet vereist.
vervolgens klikt u op verzend, hier volgt als alles goed is gegaan een succes box waarna u weer naar de homepagina gebracht wordt.

{reageren op ticket}
Na de stappen genomen te hebben om een ticket naar eigen wens te bekijken kunt u nee reageren op die zelfde pagina.
Onder het bericht van een ticket bevindt zich een klein formuliertje dat ingevuld moet worden om te reageren. Ook hier kunnen er bijlages toegevoegd worden.
De reacties komen onderaan het bericht te staan wanneer die er zijn.

{menu open klappen}
als het menu u niet bevalt dan kunt u altijd het openklappen dit kan gedaan worden door op het pijltje te klikken dat zich bevindt aan de rechter kant van het menu.
Als u de zelfde stappen herhaalt dan kunt u het menu ook dicht klappen.