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
         { latlon : [51.689481, 5.298893], icon : myIcons.groep, naam: 'Waypoint - SG1', opdracht: 'De opdracht wordt op locatie uitgereikt.', hint: 'Google is toegestaan.', foto: 'images/spoilers/SG1.jpg', hsb: 'block'}
        ,{ latlon : [51.694231, 5.301602], icon : myIcons.groep, naam: 'Waypoint - SG2',opdracht: 'De opdracht wordt op locatie uitgereikt.', hint: 'Magnetisch.', foto: 'images/spoilers/SG2.jpg' , hsb: 'block'}
        ,{ latlon : [51.689534, 5.305277], icon : myIcons.groep, naam: 'Waypoint - SG3',opdracht: 'De opdracht wordt op locatie uitgereikt.', hint: 'Samenwerking.', foto: 'images/spoilers/SG3.jpg' , hsb: 'block'}
        ,{ latlon : [51.687826, 5.307872], icon : myIcons.groep, naam: 'Waypoint - SG4',opdracht: 'De opdracht wordt op locatie uitgereikt.', hint: 'Waar is het druk?', foto: 'images/spoilers/SG4.jpg' , hsb: 'block'}
    ]
    , ict :
    [
        { latlon : [51.691459, 5.303363], icon : myIcons.ict, naam: 'Waypoint - SI1', opdracht: 'Scan de QR-code en beantwoord de vraag.', hint: 'Zie spoiler.', foto: 'images/spoilers/SI1.jpg', hsb: 'block'}
        ,{ latlon : [51.691226, 5.301305], icon : myIcons.ict, naam: 'Waypoint - SI2', opdracht: 'Scan de QR-code en beantwoord de vraag.', hint: 'Zie spoiler.', foto: 'images/spoilers/SI2.jpg', hsb: 'block'}
        ,{ latlon : [51.692817, 5.301039], icon : myIcons.ict, naam: 'Waypoint - SI3', opdracht: 'Scan de QR-code en beantwoord de vraag.', hint: 'Zie spoiler.', foto: 'images/spoilers/SI3.jpg', hsb: 'block'}
        ,{ latlon : [51.692205, 5.302234], icon : myIcons.ict, naam: 'Waypoint - SI4', opdracht: 'Scan de QR-code en beantwoord de vraag.', hint: 'Zie spoiler.', foto: 'images/spoilers/SI4.jpg', hsb: 'block'}
        ,{ latlon : [51.689912, 5.304329], icon : myIcons.ict, naam: 'Waypoint - SI5', opdracht: 'Scan de QR-code en beantwoord de vraag.', hint: 'Zie spoiler.', foto: 'images/spoilers/SI5.jpg', hsb: 'block'}
        ,{ latlon : [51.686963, 5.306294], icon : myIcons.ict, naam: 'Waypoint - SI6', opdracht: 'Scan de QR-code en beantwoord de vraag.', hint: 'Zie spoiler.', foto: 'images/spoilers/SI6.jpg', hsb: 'block'}
        ,{ latlon : [51.687236, 5.30315], icon : myIcons.ict, naam: 'Waypoint - SI7', opdracht: 'Scan de QR-code en beantwoord de vraag.', hint: 'Zie spoiler.', foto: 'images/spoilers/SI7.jpg', hsb: 'block'}
        ,{ latlon : [51.689293, 5.301625], icon : myIcons.ict, naam: 'Waypoint - SI8', opdracht: 'Scan de QR-code en beantwoord de vraag.', hint: 'Zie spoiler.', foto: 'images/spoilers/SI8.jpg', hsb: 'block'}
        ,{ latlon : [51.690855, 5.300211], icon : myIcons.ict, naam: 'Waypoint - SI9', opdracht: 'Scan de QR-code en beantwoord de vraag.', hint: 'Zie spoiler.', foto: 'images/spoilers/SI9.jpg', hsb: 'block'}
        ,{ latlon : [51.690572, 5.30268], icon : myIcons.ict, naam: 'Waypoint - SI10', opdracht: 'Scan de QR-code en beantwoord de vraag.', hint: 'Zie spoiler.', foto: 'images/spoilers/SI10.jpg', hsb: 'block'}
    ]
    , stad: 
    [
        { latlon : [51.690398, 5.299093], icon : myIcons.stad, naam: 'Waypoint - SS1', opdracht: 'Wie is er op deze plek gesneuveld?', hint: 'Zijkant van de brug.', foto: 'images/spoilers/SS1.jpg', hsb: 'block'}
        ,{ latlon : [51.689741, 5.299843], icon : myIcons.stad, naam: 'Waypoint - SS2', opdracht: 'Wat houdt Gerritje hier vast?', hint: 'Let op: mannelijk of vrouwelijk?', foto: 'images/spoilers/SS2.jpg', hsb: 'block'}
        ,{ latlon : [51.69106, 5.304234], icon : myIcons.stad, naam: 'Waypoint - SS3', opdracht: 'Van welk materiaal is het kunstwerk gemaakt dat voor de ingang van de Arena staat?', hint: 'Wees specifiek!', foto: 'images/spoilers/SS3.jpg', hsb: 'block'}
        ,{ latlon : [51.689511, 5.303218], icon : myIcons.stad, naam: 'Waypoint - SS4', opdracht: 'Welke naam is weggehaald uit de spoiler?', hint: 'Op de grond.', foto: 'images/spoilers/SS4.jpg', hsb: 'block'}
        ,{ latlon : [51.689042, 5.304339], icon : myIcons.stad, naam: 'Waypoint - SS5', opdracht: 'Wat is het laagste jaartal op dit standbeeld?', hint: 'Geen hint beschikbaar.', foto: 'images/spoilers/SS5.jpg', hsb: 'block'}
        ,{ latlon : [51.688468, 5.303114], icon : myIcons.stad, naam: 'Waypoint - SS6', opdracht: 'Welk jaartal wordt bedoelt met de Romeinse cijfers die je hier vindt?', hint: 'Gebruik een converter.', foto: 'images/spoilers/SS6.jpg', hsb: 'block'}
        ,{ latlon : [51.688087, 5.301713], icon : myIcons.stad, naam: 'Waypoint - SS7', opdracht: 'Welk Gallisch stripfiguur vind je hier op de muur?', hint: 'Een van de twee is niet Gallisch!', foto: 'images/spoilers/SS7.jpg', hsb: 'block'}
        ,{ latlon : [51.688313, 5.305181], icon : myIcons.stad, naam: 'Waypoint - SS8', opdracht: 'Kijk naar de spoiler. Zoek het deel van de maquette op die overeenkomt met de afbeelding. Je vindt hier een braille code. Uit hoeveel puntjes bestaat deze code?', hint: 'Geen hint beschikbaar.', foto: 'images/spoilers/SS8.jpg', hsb: 'block'}
        ,{ latlon : [51.687093, 5.308360], icon : myIcons.stad, naam: 'Waypoint - SS9', opdracht: 'Van welk materiaal is de sokkel gemaakt van dit kunstwerk?', hint: 'Geef specifiek aan welk soort steen! Scan de QR-code en kijk goed naar de juiste / kloppende URL!', foto: 'images/spoilers/SS9.jpg', hsb: 'block'}
        ,{ latlon : [51.686506, 5.305000], icon : myIcons.stad, naam: 'Waypoint - SS10', opdracht: 'Wat is de achternaam van de persoon die in het midden van dit kunstwerk staat afgebeeld?', hint: 'Geen hint beschikbaar.', foto: 'images/spoilers/SS10.jpg', hsb: 'block'}
    ]
    // hint = codewoord
    , mysterie: 
    [
         { latlon : [51.692635, 5.299753], icon : myIcons.mysterie, naam: 'Waypoint - SM1', opdracht: tekstCodewoord + "<span class='codewoord'> USB </span>" , hint: 'USB', foto: 'images/spoilers/voorbeeld.jpg', hsb: 'none'},
         { latlon : [51.693797, 5.302621], icon : myIcons.mysterie, naam: 'Waypoint - SM2', opdracht: tekstCodewoord + "<span class='codewoord'> NFC </span>" , hint: 'NFC', foto: 'images/spoilers/voorbeeld.jpg', hsb: 'none'},
         { latlon : [51.691321, 5.302209], icon : myIcons.mysterie, naam: 'Waypoint - SM3', opdracht: tekstCodewoord + "<span class='codewoord'> CMS </span>" , hint: 'CMS', foto: 'images/spoilers/voorbeeld.jpg', hsb: 'none'},
         { latlon : [51.689751, 5.302256], icon : myIcons.mysterie, naam: 'Waypoint - SM4', opdracht: tekstCodewoord + "<span class='codewoord'> VPN </span>" , hint: 'VPN', foto: 'images/spoilers/voorbeeld.jpg', hsb: 'none'},
         { latlon : [51.688240, 5.303669], icon : myIcons.mysterie, naam: 'Waypoint - SM5', opdracht: tekstCodewoord + "<span class='codewoord'> API </span>" , hint: 'API', foto: 'images/spoilers/voorbeeld.jpg', hsb: 'none'},
         { latlon : [51.688668, 5.300364], icon : myIcons.mysterie, naam: 'Waypoint - SM6', opdracht: tekstCodewoord + "<span class='codewoord'> ITIL </span>" , hint: 'ITIL', foto: 'images/spoilers/voorbeeld.jpg', hsb: 'none'},
         { latlon : [51.688937, 5.306427], icon : myIcons.mysterie, naam: 'Waypoint - SM7', opdracht: tekstCodewoord + "<span class='codewoord'> ASP </span>" , hint: 'ASP', foto: 'images/spoilers/voorbeeld.jpg', hsb: 'none'},
         { latlon : [51.685747, 5.307018], icon : myIcons.mysterie, naam: 'Waypoint - SM8', opdracht: tekstCodewoord + "<span class='codewoord'> BIT </span>" , hint: 'BIT', foto: 'images/spoilers/voorbeeld.jpg', hsb: 'none'},
         { latlon : [51.686319, 5.303223], icon : myIcons.mysterie, naam: 'Waypoint - SM9', opdracht: tekstCodewoord + "<span class='codewoord'> CPU </span>" , hint: 'CPU', foto: 'images/spoilers/voorbeeld.jpg', hsb: 'none'},
         { latlon : [51.687566, 5.305953], icon : myIcons.mysterie, naam: 'Waypoint - SM10', opdracht: tekstCodewoord + "<span class='codewoord'> SQL </span>" , hint: 'SQL', foto: 'images/spoilers/voorbeeld.jpg', hsb: 'none'}
    ]
};