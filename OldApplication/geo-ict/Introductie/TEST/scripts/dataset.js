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
        popupAnchor: [-3, -20]
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
         { latlon : [51.691548, 5.284976], icon : myIcons.groep, naam: 'GROEPSOPDRACHTEN', opdracht: 'Bij dit soort waypoints doe je een opdracht met je gehele groep. Kijk op het tijdschema hoe laat je waar verwacht wordt! Een docent legt op locatie uit wat de bedoeling is. Je kunt hier 4 of 6 punten mee scoren. Daarnaast krijg je ook een punt extra als je met de gehele groep op tijd aanwezig bent. Laat de docent deze opdracht aftekenen op het antwoordformulier.', hint: 'Hier vind je een extra hint om de opdracht succesvol af te ronden.', foto: 'images/spoilers/kw1c.jpg', hsb: 'block'}
    ]
    , ict :
    [
        { latlon : [51.691515, 5.287326], icon : myIcons.ict, naam: 'VRAGEN OVER ICT', opdracht: 'Bij dit soort waypoints zoek je een QR-code. Scan deze QR-code en beantwoord de vraag. Vul het antwoord in op het antwoordformulier. Je kunt hier 1 punt mee scoren.', hint: 'Op de spoilerfoto zie je de locatie waar de QR-code geplaatst is.', foto: 'images/spoilers/kw1c.jpg', hsb: 'block'}
    ]
    , stad: 
    [
        { latlon : [51.689639, 5.286661], icon : myIcons.stad, naam: 'VRAGEN OVER STAD / PALEISKWARTIER', opdracht: 'Bij dit soort waypoints beantwoord je een vraag over de stad of het Paleiskwartier. Het antwoord op de vraag is op locatie te vinden. Vul het antwoord in op het antwoordformulier. Je kunt hier 1 punt mee scoren.', hint: 'Hier vind je een extra hint om de vraag goed te beantwoorden.', foto: 'images/spoilers/kw1c.jpg', hsb: 'block'}
    ]
    // hint = codewoord
    , mysterie: 
    [
         { latlon : [51.690843, 5.285620], icon : myIcons.mysterie, naam: 'MYSTERIE', opdracht: 'Dit soort waypoints zijn verborgen waypoints. Alleen als je binnen 25 meter van dit soort waypoints vandaan bent verschijnen ze op de kaart. Door veel te lopen maak je meer kans om deze waypoints tegen te komen. Je kunt hier 1 punt mee scoren.' , hint: 'Hier vind je vervolgens een codewoord. Dit codewoord vul je in op het antwoordformulier.', foto: 'images/spoilers/kw1c.jpg', hsb: 'none'},
    ]
};