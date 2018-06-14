//
//    Auteur:             A. Saebu & . Gijsbrechts
//    Aanmaakdatum:       24 mei 2017
//    Project:            Introductie KW1C ICT-academie
//

var tekstCodewoord = 'Je hebt een mysterie waypoint ontdekt! <br><br> Noteer onderstaand codewoord op het antwoordformulier: <br><br>';
//Uitbreiding van een icon met het customId om de marker te identificeren bij een klik event
var MyIcon = L.Icon.extend({
    options: {
        groep: "",
        id: null
    }
});

var iconPositie = new MyIcon(
    {
        iconUrl: 'images/markers/positie.png',
        iconSize: [36, 36],
        iconAnchor: [18, 18],
        popupAnchor: [18, 18]
    });
// groepsopdracht
var iconGroep = new MyIcon(
    {
        iconUrl: 'images/markers/groep.png',
        iconSize: [25, 30],
        iconAnchor: [12, 30],
        popupAnchor: [-3, -20]
    });
// ict-vraag
var iconICT = new MyIcon(
    {
        iconUrl: 'images/markers/ict.png',
        iconSize: [25, 30],
        iconAnchor: [12, 30],
        popupAnchor: [-3, -20]
    });

// stad-vraag
var iconStad = new MyIcon(
    {
        iconUrl: 'images/markers/stad.png',
        iconSize: [25, 30],
        iconAnchor: [12, 30],
        popupAnchor: [-3, -20]
    });

// mysterie
var iconMysterie = new MyIcon(
    {
        iconUrl: 'images/markers/mysterie.png',
        iconSize: [25, 30],
        iconAnchor: [12, 30],
        popupAnchor: [-3, -20]
    });

var myIcons = {
    positie : iconPositie
    , groep : iconGroep
    , ict : iconICT
    , stad : iconStad
    , mysterie : iconMysterie
};

var dataset1 =  
{
    groep : 
    [
         { latlon : [51.691069, 5.292384], icon : myIcons.groep, naam: 'Waypoint - PG1', opdracht: 'De opdracht wordt op locatie uitgereikt.', hint: 'Beide personen hebben een pet op. Denk aan de tijd!', foto: 'images/spoilers/PG1.jpg', hsb: 'block'}
        ,{ latlon : [51.68214, 5.294669], icon : myIcons.groep, naam: 'Waypoint - PG2',opdracht: 'De opdracht wordt op locatie uitgereikt.', hint: 'Big smile!', foto: 'images/spoilers/PG2.jpg' , hsb: 'block'}
        ,{ latlon : [51.688858, 5.283713], icon : myIcons.groep, naam: 'Waypoint - PG3',opdracht: 'De opdracht wordt op locatie uitgereikt.', hint: 'Rode zijde is de voorkant. 3 gelijke driehoeken.', foto: 'images/spoilers/PG3.jpg' , hsb: 'block'}
        ,{ latlon : [51.683709, 5.284906], icon : myIcons.groep, naam: 'Waypoint - PG4',opdracht: 'De opdracht wordt op locatie uitgereikt.', hint: 'LET OP: Ingang van de school via waypoint PI5!', foto: 'images/spoilers/PG4.jpg' , hsb: 'block'}
    ]
    , ict :
    [
        { latlon : [51.682203, 5.293526], icon : myIcons.ict, naam: 'Waypoint - PI1', opdracht: 'Scan de QR-code en beantwoord de vraag.', hint: 'Zie spoiler.', foto: 'images/spoilers/PI1.jpg', hsb: 'block'}
        ,{ latlon : [51.682694, 5.29379], icon : myIcons.ict, naam: 'Waypoint - PI2', opdracht: 'Scan de QR-code en beantwoord de vraag.', hint: 'Zie spoiler.', foto: 'images/spoilers/PI2.jpg', hsb: 'block'}
        ,{ latlon : [51.684275, 5.293737], icon : myIcons.ict, naam: 'Waypoint - PI3', opdracht: 'Scan de QR-code en beantwoord de vraag.', hint: 'Zie spoiler.', foto: 'images/spoilers/PI3.jpg', hsb: 'block'}
        ,{ latlon : [51.684676, 5.292036], icon : myIcons.ict, naam: 'Waypoint - PI4', opdracht: 'Scan de QR-code en beantwoord de vraag.', hint: 'Zie spoiler.', foto: 'images/spoilers/PI4.jpg', hsb: 'block'}
        ,{ latlon : [51.684444, 5.286917], icon : myIcons.ict, naam: 'Waypoint - PI5', opdracht: 'Scan de QR-code en beantwoord de vraag.', hint: 'Zie spoiler. Op het raam van "de ui"!', foto: 'images/spoilers/PI5.jpg', hsb: 'block'}
        ,{ latlon : [51.686292, 5.288624], icon : myIcons.ict, naam: 'Waypoint - PI6', opdracht: 'Scan de QR-code en beantwoord de vraag.', hint: 'Zie spoiler.', foto: 'images/spoilers/PI6.jpg', hsb: 'block'}
        ,{ latlon : [51.688378, 5.288267], icon : myIcons.ict, naam: 'Waypoint - PI7', opdracht: 'Scan de QR-code en beantwoord de vraag.', hint: 'Zie spoiler.', foto: 'images/spoilers/PI7.jpg', hsb: 'block'}
        ,{ latlon : [51.687346, 5.2854], icon : myIcons.ict, naam: 'Waypoint - PI8', opdracht: 'Scan de QR-code en beantwoord de vraag.', hint: 'Zie spoiler.', foto: 'images/spoilers/PI8.jpg', hsb: 'block'}
        ,{ latlon : [51.689779, 5.283491], icon : myIcons.ict, naam: 'Waypoint - PI9', opdracht: 'Scan de QR-code en beantwoord de vraag.', hint: 'Zie spoiler.', foto: 'images/spoilers/PI9.jpg', hsb: 'block'}
        ,{ latlon : [51.690582, 5.286859], icon : myIcons.ict, naam: 'Waypoint - PI10', opdracht: 'Scan de QR-code en beantwoord de vraag.', hint: 'Zie spoiler.', foto: 'images/spoilers/PI10.jpg', hsb: 'block'}
    ]
    , stad: 
    [
        { latlon : [51.690971,5.292274], icon : myIcons.stad, naam: 'Waypoint - PS1', opdracht: 'Hoeveel vissen zwemmen naar westelijke richting?', hint: 'Geen hint beschikbaar.', foto: 'images/spoilers/PS1.jpg', hsb: 'block'}
        ,{ latlon : [51.685111,5.288799], icon : myIcons.stad, naam: 'Waypoint - PS2', opdracht: 'Vanaf dit punt naar de Markt is het 1,4 kilometer lopen. Hoeveel kilometer per uur loop je gemiddeld als je er exact het aantal minuten op loopt dat staat aangegeven op de wegwijzer?', hint: 'Geen hint beschikbaar.', foto: 'images/spoilers/PS2.jpg', hsb: 'block'}
        ,{ latlon : [51.689302,5.289776], icon : myIcons.stad, naam: 'Waypoint - PS3', opdracht: 'Hoeveel ijzeren traptreden is het naar de top van dit uitzichtpunt (inclusief tussentreden)?', hint: 'Geen hint beschikbaar.', foto: 'images/spoilers/PS3.jpg', hsb: 'block'}
        ,{ latlon : [51.690455,5.291624], icon : myIcons.stad, naam: 'Waypoint - PS4', opdracht: 'Je bent hier op het plein van het Paleis van justitie. Hoeveel bankjes, prullenbakken en bomen vind je hier? Tel de aantallen bij elkaar op, zodat er een getal uitkomt!', hint: 'Geen hint beschikbaar.', foto: 'images/spoilers/PS4.jpg', hsb: 'block'}
        ,{ latlon : [51.690321,5.289122], icon : myIcons.stad, naam: 'Waypoint - PS5', opdracht: 'Deze school wil de onderste ramen van de voorgevel laten wassen (de ramen onder de naam van de school). Per vierkante meter raam kost dit 2,25 euro. Wat gaat dit ongeveer kosten?', hint: 'Geen hint beschikbaar.', foto: 'images/spoilers/PS5.jpg', hsb: 'block'}
        ,{ latlon : [51.690283,5.290449], icon : myIcons.stad, naam: 'Waypoint - PS6', opdracht: 'Welke twee letters zijn hier vervangen door een logo?', hint: 'Eindeloos veel mogelijkheden?', foto: 'images/spoilers/PS6.jpg', hsb: 'block'}
        ,{ latlon : [51.687578,5.290278], icon : myIcons.stad, naam: 'Waypoint - PS7', opdracht: 'Welk geldbedrag moet uit de auto worden gehaald?', hint: 'Witte auto.', foto: 'images/spoilers/PS7.jpg', hsb: 'block'}
        ,{ latlon : [51.686072,5.28589], icon : myIcons.stad, naam: 'Waypoint - PS8', opdracht: 'Je vindt hier drie gekleurde letters, waar staat deze afkorting voor?', hint: 'Geen hint beschikbaar.', foto: 'images/spoilers/PS8.jpg', hsb: 'block'}
        ,{ latlon : [51.684915,5.285177], icon : myIcons.stad, naam: 'Waypoint - PS9', opdracht: 'Welke sport beoefent diegene met rugnummer 14?', hint: 'LET OP: Ingang van de school via waypoint PI5! LAAT HIER 1 PERSOON EVEN BINNEN KIJKEN!', foto: 'images/spoilers/PS9.jpg', hsb: 'block'}
        ,{ latlon : [51.683903,5.286777], icon : myIcons.stad, naam: 'Waypoint - PS10', opdracht: 'Tegen de muur vind je een herdenkingstegel. Welke onderscheiding heeft deze persoon gekregen?', hint: 'LET OP: Ingang van de school via waypoint PI5!', foto: 'images/spoilers/PS10.jpg', hsb: 'block'}
    ]
    // hint = codewoord
    , mysterie: 
    [
         { latlon : [51.689482,5.286584], icon : myIcons.mysterie, naam: 'Waypoint - PM1', opdracht: tekstCodewoord + "<span class='codewoord'> PCI </span>" , hint: 'PCI', foto: 'images/spoilers/voorbeeld.jpg', hsb: 'none'},
         { latlon : [51.688265,5.284213], icon : myIcons.mysterie, naam: 'Waypoint - PM2', opdracht: tekstCodewoord + "<span class='codewoord'> CSS </span>" , hint: 'CSS', foto: 'images/spoilers/voorbeeld.jpg', hsb: 'none'},
         { latlon : [51.691170,5.289397], icon : myIcons.mysterie, naam: 'Waypoint - PM3', opdracht: tekstCodewoord + "<span class='codewoord'> WAN </span>" , hint: 'WAN', foto: 'images/spoilers/voorbeeld.jpg', hsb: 'none'},
         { latlon : [51.687849,5.287185], icon : myIcons.mysterie, naam: 'Waypoint - PM4', opdracht: tekstCodewoord + "<span class='codewoord'> UTP </span>" , hint: 'UTP', foto: 'images/spoilers/voorbeeld.jpg', hsb: 'none'},
         { latlon : [51.683801,5.285988], icon : myIcons.mysterie, naam: 'Waypoint - PM5', opdracht: tekstCodewoord + "<span class='codewoord'> XML </span>" , hint: 'XML', foto: 'images/spoilers/voorbeeld.jpg', hsb: 'none'},
         { latlon : [51.684430,5.284631], icon : myIcons.mysterie, naam: 'Waypoint - PM6', opdracht: tekstCodewoord + "<span class='codewoord'> URL </span>" , hint: 'URL', foto: 'images/spoilers/voorbeeld.jpg', hsb: 'none'},
         { latlon : [51.684888,5.290468], icon : myIcons.mysterie, naam: 'Waypoint - PM7', opdracht: tekstCodewoord + "<span class='codewoord'> SSL </span>" , hint: 'SSL', foto: 'images/spoilers/voorbeeld.jpg', hsb: 'none'},
         { latlon : [51.683304,5.293360], icon : myIcons.mysterie, naam: 'Waypoint - PM8', opdracht: tekstCodewoord + "<span class='codewoord'> SOC </span>" , hint: 'SOC', foto: 'images/spoilers/voorbeeld.jpg', hsb: 'none'},
         { latlon : [51.689110,5.292150], icon : myIcons.mysterie, naam: 'Waypoint - PM9', opdracht: tekstCodewoord + "<span class='codewoord'> W3C </span>" , hint: 'W3C', foto: 'images/spoilers/voorbeeld.jpg', hsb: 'none'},
         { latlon : [51.681982,5.295190], icon : myIcons.mysterie, naam: 'Waypoint - PM10', opdracht: tekstCodewoord + "<span class='codewoord'> SEO </span>" , hint: 'SEO', foto: 'images/spoilers/voorbeeld.jpg', hsb: 'none'}
    ]
};