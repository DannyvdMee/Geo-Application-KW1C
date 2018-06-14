jQuery(document).ready(function ()
{
    var options = {};
    jQuery().cmdApp (options);
});

/**
 * Created by Abu on 6/8/2017.
 */
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
        iconSize: [25, 30],
        iconAnchor: [15, 20],
        popupAnchor: [-3, -20]
    });
// groepsopdracht
var iconGroep = new MyIcon(
    {
        iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/images/marker-icon.png',
        iconSize: [25, 30],
        iconAnchor: [15, 20],
        popupAnchor: [-3, -20]
    });
// ict-vraag
var iconICT = new MyIcon(
    {
        iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/images/marker-icon.png',
        iconSize: [25, 30],
        iconAnchor: [15, 20],
        popupAnchor: [-3, -20]
    });

// stad-vraag
var iconStad = new MyIcon(
    {
        iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/images/marker-icon.png',
        iconSize: [25, 30],
        iconAnchor: [15, 20],
        popupAnchor: [-3, -20]
    });

// mysterie
var iconMysterie = new MyIcon(
    {
        iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/images/marker-icon.png',
        iconSize: [25, 30],
        iconAnchor: [15, 20],
        popupAnchor: [-3, -20]
    });

var myIcons = {
    positie : iconPositie
    , groep : iconGroep
    , ict : iconICT
    , stad : iconStad
    , mysterie : iconMysterie
};

var dataset1 =  {
    groep : [
        {latlon : [51.6860299, 5.2931109],  naam: '073 geeft ruimte', adres: 'Koningsweg 73, &apos;s-Hertogenbosch', html:'<li>Vitaliteit met Healing Tao<br>vrijdag 20.30- 21.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#vitaliteitmethealingtao">Ga naar</a></li>'}
        ,{latlon : [51.7038761, 5.3150053],  naam: 'Anker van de Riet ', adres: ' Nieuwstraat 24 &apos;s-Hertogenbosch', html:'<li>The Work of Byron Katie<br>zondag 11.00 - 13.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#byron">Ga naar</a></li><li>De kracht van je geboortegetallen<br>zondag 2 juli 15.00 -17.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#geboortegetallen">Ga naar</a></li><li>Polsreading / pentalogie<br>zaterdag 11.00 - 15.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#polsreading">Ga naar</a></li>'}
        ,{latlon : [51.6869017, 5.2934361],  naam: 'ARTOTS Melkfabriek', adres: ' Guldenvliesstraat 4 H &apos;s-Hertogenbosch', html:'<li>Blisservaring<br>zaterdag 10.30 - 11.30 uur<br>zondag van 10.30 - 11.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#blisservaring">Ga naar</a></li><li>Theater workshop 10+<br>zaterdag 12.00 - 13.30 uur<br>zondag van 10.30 - 11.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#theater">Ga naar</a></li>'}
        ,{latlon : [51.7056441, 5.3075172],  naam: 'Atelier EB - Fort Orthen', adres: ' Ketsheuvel 56 ‘s-Hertogenbosch', html:'<li>Workshop met Kunst<br>zaterdag en zondag<br>14.00 - 16.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#kunst">Ga naar</a></li>'}
        ,{latlon : [51.6987564, 5.3352006],  naam: 'Beukers Ontwikkeling', adres: ' Jasmijnstraat 34 Hintham (Rosmalen)', html:'<lli>Soulcollage<br>zaterdag 14.00 - 15.30 uur<br>zondag van 11.30 - 13.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#soulcollage">Ga naar</a></li>'}
        ,{latlon : [51.6860587, 5.3083903],  naam: 'Bij Katrien', adres: 'Triniteitstraat 19 ‘s-Hertogenbosch', html:'<li>Droomdoelen<br>zaterdag<br>13.30 - 14.30 uur en 15.30 - 16.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#droomdoelen">Ga naar</a></li><li>Geluksslinger<br>zaterdag 12.00 - 17.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#geluksslinger">Ga naar</a></li><li>Zing Nederlands<br>zaterdag 15.00 - 16.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#zingnederlands">Ga naar</a></li>'}
        ,{latlon : [51.693501, 5.3034088],  naam: 'De Bossche Brugwachtershuisjes', adres: 'Orthenbrug Citadellaan/Jan Heinsstraat ‘s-Hertogenbosch', html:'<li>Luisterend oor<br>zaterdag 13.30 - 17.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#luisterendoor">Ga naar</a></li>'}
        ,{latlon : [51.6889783, 5.3013932],  naam: 'Binnenstad', adres: 'Op verschillende locaties', html:'<li>Free hugs<br>tijdens het gehele weekend<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#freehugs">Ga naar</a></li><li>Geluksgedichtjes<br>zaterdag 11.00 - 16.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#geluksgedichtjes">Ga naar</a></li><li>Hoe klinkt geluk?<br>zondag 13.00 - 17.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#hoeklinktgeluk">Ga naar</a></li>'}
        ,{latlon : [51.6868501, 5.2998947],  naam: 'De Kwast', adres: 'Vughterstraat 81 ‘s-Hertogenbosch', html:'<li>Krassen en Kliederen in het Groot<br>zaterdag van 10.30- 13.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#krassenenkliederen">Ga naar</a></li><li>Origami - Japanse vouwkunst<br>zaterdag 14.00 - 16.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#origami">Ga naar</a></li>'}
        ,{latlon : [51.6856485, 5.3097074],  naam: 'Casinotuin', adres: 'Cavaleriestraat/ Nachtegaallaantje', html:'<li>Fotografie geluksmomentjes<br>zaterdag 10.00 - 12.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#fotografiegeluk">Ga naar</a></li><li>Qi qong<br>zaterdag 13.30 - 14.00 uur en 14.15 - 14.45 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#qiqong">Ga naar</a></li><li>Circlesong<br>zaterdag 14.45 - 16.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#circlesong">Ga naar</a></li><li>De geluksproeverij<br>zondag 11.00 - 12.00 uur<br>en 13.00 - 14.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#degeluksproeverij">Ga naar</a></li>'}
        ,{latlon : [51.6898852, 5.3044934],  naam: 'Galerie KLEURRAAK', adres: 'Burgemeester Loeffplein 65-66 &apos;s-Hertogenbosch', html:'<li>Geleide Meditatie<br>zaterdag10.00 - 11.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#geleidemeditatie">Ga naar</a></li>'}
        ,{latlon : [51.6954729, 5.3002308],  naam: 'Hierzo; urban cultural freespace', adres: 'Havendijk 19 ‘s-Hertogenbosch', html:'<li>meditatie lichter leven<br>zaterdag 1 11.30 - 13.00 uur<br>13.30 - 15.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#meditatie">Ga naar</a></li><li>Massage<br>zondag van 10.15 - 16.30<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#massage">Ga naar</a></li>'}
        ,{latlon : [51.6846295, 5.2959425],  naam: 'HSP Centrum', adres: 'Vughterstraat 246 ‘s-Hertogenbosch', html:'<li>Ben ik hooggevoelig?<br>zaterdag 10.00 - 11.00 uur<br>zondag van 10.00 - 11.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#hooggevoelig">Ga naar</a></li><li>Mindfullness<br>zaterdag en zondag<br>11.00 - 12.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#mindfullness">Ga naar</a></li>'}
        ,{latlon : [51.6913761, 5.3006677],  naam: 'Huiskamer 073', adres: 'Pastoor de Kroonstraat 42 ‘s-Hertogenbosch', html:'<li>koffieenthee<br>zaterdag 10.00 - 12.00 uur<br>12.00 - 14.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#koffieenthee">Ga naar</a></li><li>Hartewens<br>zaterdag  inloop 10.00 - 12.00 uur<br>zondag 2 juli, inloop 12.00 - 16.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#hartewens">Ga naar</a></li><li>Mini cyanotype natuurdruk<br>zaterdag 12.00 - 16.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#cyanotype">Ga naar</a></li><li>Vlekkentekenen<br>zaterdag en zondag<br>inloop van 13.00 - 14.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#vlekken">Ga naar</a></li><li>Lieve liedjes voor jou<br>zaterdag + zondag<br>om 14.00 uur, 15.00 uur en 16.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#lieveliedjes">Ga naar</a></li><li>Mandala&apos;s kleuren<br>zondag 13.00 - 16.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#mandala">Ga naar</a></li>'}
        ,{latlon : [51.6912831, 5.2999846],  naam: 'ISMES Huis', adres: 'Brede Haven 26 ‘s-Hertogenbosch', html:'<li>Emotionele Healing met Hypnose<br>zaterdag 14.30 - 15.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#hypnose">Ga naar</a></li>'}
        ,{latlon : [51.6877718, 5.3047754],  naam: 'Kerkplein', adres: 'Kerkplein', html:'<li>Booyaka<br>zaterdag 14.00 - 15.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#booyaka">Ga naar</a></li><li>Merengue/ salsa<br>zondag 2 juli van 12.00 - 13.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#merengue">Ga naar</a></li>'}
        ,{latlon : [51.6897723, 5.3076937],  naam: 'Pand 18', adres: 'Sint Josephstraat 18 &apos;s-Hertogenbosch', html:'<li>5 ritmesles<br>zaterdag 10.30 - 12.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#5ritmesles">Ga naar</a></li>'}
        ,{latlon : [51.6870774, 5.3079345],  naam: 'Parade', adres: 'Parade', html:'<li>gelukswandeling<br>zaterdag 11.00 - 12.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#gelukswandeling">Ga naar</a></li><li>Ploep en Loetje strooien geluk<br>zaterdag 13.00 - 16.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#ploeploetje">Ga naar</a></li>'}
        ,{latlon : [51.6964834, 5.3174656],  naam: 'Prins Hendrikpark', adres: 'Achter het benzinestation', html:'<li>Yoga in het park<br>zondag 10.30 - 11.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#yoga">Ga naar</a></li>'}
        ,{latlon : [51.6956054, 5.3074579],  naam: 'Theater Nar', adres: 'Lange Tuinstraat 44 &apos;s-Hertogenbosch', html:'<li>Theater Nar<br>zaterdag en zondag<br>13.30 - 14.00 uur en 16.00 - 16.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#theaternar">Ga naar</a></li>'}
        ,{latlon : [51.7245615, 5.3142251],  naam: 'Schild-Pad', adres: 'Kloosterlaan 34 &apos;s-Hertogenbosch', html:'<li>Voetreflexmassage<br>zaterdag 10.00 - 13.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#voetreflex">Ga naar</a></li>'}
        ,{latlon : [51.6889171, 5.3079827],  naam: 'Stadsbieb Centrum', adres: 'Hinthamerstraat 72 ‘s-Hertogenbosch', html:'<li>Schrijfboost<br>zaterdag 13.00 - 14.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#schrijfboost">Ga naar</a></li><li>Speelt op vleugel<br>zaterdag 14.00 -15.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#vleugel">Ga naar</a></li><li>Speelt op vleugel<br>zaterdag 15.30 -16.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#vleugel2">Ga naar</a></li>'}
        ,{latlon : [51.6881858, 5.3134375],  naam: 'Sint Anthoniegaarde', adres: 'Zuid Willemsvaart 509 &apos;s-Hertogenbosch', html:'<li>Vitaliteit met Healing Tao<br>vrijdag 30 juni van 20.30- 21.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#vitaliteitmethealingtao">Ga naar</a></li>'}
        ,{latlon : [51.6785518, 5.3156477],  naam: 'Sint Jans lyceum', adres: 'Sweelinckplein 3 &apos;s-Hertogenbosch', html:'<li>Natuurlijk gelukkig<br>zaterdag10.30 - 12.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#natuurlijkgelukkig">Ga naar</a></li>'}
        ,{latlon : [51.6893075, 5.303123],  naam: 'VVV', adres: 'Markt 77 &apos;s-Hertogenbosch', html:'<li>Infopunt</li>'}
        ,{latlon : [51.6955245, 5.2970776],  naam: 'Willem Twee', adres: 'Boschdijkstraat 100 &apos;s-Hertogenbosch', html:'<li>Vrijdag</li><li>Opening met diverse<br>sprekers en artiesten<br>vrijdag 19.00 - 23.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#opening">Ga naar</a></li><li>Tarot kaarten leggen<br>vrijdag 19.00 - 22.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#tarot">Ga naar</a></li><li>Geluksmomentjes en massage<br>vrijdag 19.00 - 22.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#geluksmomentjes">Ga naar</a></li><li>Gelukkig met je tijd<br>vrijdag 21.00 - 21.45 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#gelukkigmetjetijd">Ga naar</a></li><li>Zaterdag</li><li>Chocoladefontein<br>doorlopend<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#chocoladefontein">Ga naar</a></li><li>Familieopstelling<br>zaterdag 10.00 - 12.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#familieopstelling">Ga naar</a></li><li>Lezing Leven van Licht en Liefde<br>zaterdag 11.00 - 12.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#levenvanlichtenliefde">Ga naar</a></li><li>Wereldmuziek voor kinderen<br>zaterdag 11.00 - 11.45 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#wereldkindermuziek">Ga naar</a></li><li>Kinderschmink<br>zaterdag 12.00 - 15.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#kinderschmink">Ga naar</a></li><li>Pastel tekenen<br>zaterdag 12.00 - 12.45 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#pasteltekenen">Ga naar</a></li><li>Geluk in de Liefde<br>zaterdag 12.00 - 14.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#gelukindeliefde">Ga naar</a></li><li>Lezing Gelukkig in een nieuwe tijd<br>zaterdag 12.15 - 13.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#gelukkigineennieuwetijd">Ga naar</a></li><li>Ademsessie<br>zondag 12.15 - 13.45 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#ademsessie">Ga naar</a></li><li>Zentangle tekenen<br>zondag 13.00 - 16.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#zentangle">Ga naar</a></li><li>Chakra dansworkshop<br>zaterdag 13.00 - 14.15 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#chakradansworkshop">Ga naar</a></li><li>Clown Som<br>zaterdag 14.00 - 15.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#clownsom">Ga naar</a></li><li>Aromatouch voor je handen<br>zaterdag 14.00 - 15.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#aromatouch">Ga naar</a></li><li>Workshop &apos;Geluk zaaien&apos;<br>zaterdag 14.00 - 14.30 uur,<br>15.00 - 15.30 uur en 16.00 - 16.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#gelukzaaien">Ga naar</a></li><li>Biodanza<br>zaterdag 14.30 - 15.30 uur<br>en 16.00 - 17.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#biodanza">Ga naar</a></li><li>Healingsessies(vol)<br>zaterdag 15.30 - 17.45 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#healingsessie">Ga naar</a></li><li>Zondag</li><li>Krassen en Kliederen in het Groot<br>zondag van 11.00 - 20.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#krassenenkliederen">Ga naar</a></li><li>Lezing verbinding geluk<br>zondag 11.00 - 12.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#verbinding">Ga naar</a></li><li>Down to earth film en discussie<br>zondag film 11.00 - 12.30 uur<br>discussie 12.30 - 13.15 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#downtoearth">Ga naar</a></li><li>Regenesis healing<br>zondag 2 juli 11.00- 14.50<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#regenesis">Ga naar</a></li><li>Geluk in de Liefde<br>zondag 12.00 - 14.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#gelukindeliefde">Ga naar</a></li><li>Energetische healingsessie<br>zondag 12.15 - 17.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#energetischehealing">Ga naar</a></li><li>Ademsessie<br>zondag 12.15 - 13.45 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#ademsessie">Ga naar</a></li><li>Schrijfworkshop<br>zondag 12.30 - 14.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#schrijfworkshop">Ga naar</a></li><li>Zen tekenen<br>zondag 12.30 - 13.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#zentekenen">Ga naar</a></li><li>Lezing Gelukkig in een nieuwe tijd<br>zondag 13.30 - 14.15 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#gelukkigineennieuwetijd">Ga naar</a></li><li>Geluk-wandelcoaching<br>zondag 13.30 uur - 17.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#gelukwandel">Ga naar</a></li><li>Gezondheidsconsult essentiële oliën<br>zondag 14.00 - 17.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#gezondheidsconsult">Ga naar</a></li><li>Heartcircle<br>zondag 14.00 - 16.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#heartcircle">Ga naar</a></li><li>Workshop &apos;Geluk zaaien&apos;<br>zondag 14.00 - 14.30 uur,<br>15.00 - 15.30 uur en 16.00 - 16.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#gelukzaaien">Ga naar</a></li><li>Terugblik op Geluk<br>zondag 14.00 - 15.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#terugblik">Ga naar</a></li><li>Workshop, zijn wie je bent..<br>zondag 14.00 - 15.30 uur<br>en 15.30 - 17.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#zijnwiejebent">Ga naar</a></li><li>Pastel tekenen<br>zondag 15.00 - 15.45 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#pasteltekenen">Ga naar</a></li><li>Geluksmomentjes<br>zondag 15.30 - 17.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#geluksmomentjes2">Ga naar</a></li><li>With a little luck DJ<br>zondag 18.00-21.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#djluck">Ga naar</a></li><li>Slideshow foto&apos;s Geluksweekend<br>zondag 18.00-21.00 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#diapositieven">Ga naar</a></li>'}
        ,{latlon : [51.6959897, 5.3064928],  naam: 'Yoga bij Maya', adres: 'Van Ysselsteinstraat 11 &apos;s-Hertogenbosch', html:'<li>Familieyoga<br>zaterdag 9.00 - 10.30 uur<br><a target="_new" href="http://www.geluksweekend.nl/index.php/programma/#familieyoga">Ga naar</a></li>'}
    ]
};



//scope beperken komen uit de globale context
(function ( $, L, myIcons, dataset ) {

    //nieuwe jQuery functie/plugin declareren en implementeren
    $.fn.cmdApp = function( options ) {

        var settings = $.extend({
            // These are the defaults key : defaultvalue pairs
            dataset: dataset,
            proximity : { markerType: 'mysterie' , markerDistance: 25 }
        }, options );

        // declareren variabelen huidige positie en nauwkeurigheid
        var map, afstand;
        var user = { positie: null, nauwkeurigheid: null };
        var popup = L.popup();
        var allMarkers = [];
        var infoControlEl; //customm Control voor de Marker Info scherm
        var statusControl; //message Control voor status en berichten
        var locTeller=0;
        //
        var navigatiePoints = {   direct: [ ]
            ,gelopen: [ ] };

        var directeLijn;
        var gelopenLijn;

        //de markers zijn de waypoints waar er iets gedaan/gevonden wordt
        var createMarkers = function (g) {
            for (i=0; i<dataset[g].length; i++) {

                var dataItem = dataset[g][i];
                //dit type wordt alleen getoond als je in de buurt bent (< proximity.markerDistance)
                //console.log(settings.proximity.markerType);
                if (settings.proximity.markerType != g) {
                    var m = L.marker(dataItem.latlon, {icon: iconGroep});
                    m.addTo(map).on('click', openMarkerControl);
                    m.options.groep = g;
                    m.options.id = i;
                    allMarkers.push(m);
                }
            }
        };

        var getMarkerInfoByGroepId = function(g,i) {
            return dataset[g][i];
        }

        if (typeof(Number.prototype.toRadians) === "undefined") {
            Number.prototype.toRadians = function() {
                return this * Math.PI / 180;
            }
        }

        //informatie van een marker wordt links in een venster control getoond
        var openMarkerControl = function(e) {

            //de id van de geklikte marker
            var actDataItem = getMarkerInfoByGroepId(e.target.options.groep,e.target.options.id);
            statusControl.setStatus(actDataItem.latlon.toString());


            /*custom control venster aan linkerzijde voor de marker info*/
            L.Control.Info = L.Control.extend({
                options: {
                    // topright, topleft, bottomleft, bottomright
                    position: 'topleft',
                    placeholder: 'Info...'
                },
                initialize: function (options /*{ data: {...}  }*/) {
                    // constructor
                    L.Util.setOptions(this, options);
                },
                onAdd: function (map) {
                    // happens after added to map
                    var container = L.DomUtil.create('div', 'info-container');
                    this.section = L.DomUtil.create('section', 'sectie', container);
                    this.title = L.DomUtil.create('h2', '', this.section);
                    this.title.innerHTML = "";

                    this.p1 = L.DomUtil.create('p', '', this.section);
                    this.p1.innerHTML = "";


                    this.p2 = L.DomUtil.create('p', '', this.section);
                    this.p2.innerHTML = "";

                    //L.DomEvent.addListener(this.button, 'click', this.startNavigeren, this);
                    L.DomEvent.disableClickPropagation(container);
                    return container;
                },
                onRemove: function (map) {
                    // when removed
                    //L.DomEvent.removeListener(form, 'submit', this.submit, this);
                    //L.DomEvent.removeListener(container, 'click', this.toggleControl, this);

                },
                setInfo : function(t1,t2,t3)
                {
                    this.title.innerHTML = t1;
                    this.p1.innerHTML = t2;
                    this.p2.innerHTML = "<ul>"+t3+"</ul>";
                },

            });

            L.control.info = function(id, options) {
                return new L.Control.Info(id, options);
            }

            if (!infoControlEl) {
                infoControlEl = L.control.info(1, {}).addTo(map);
            }

            //TODO
            var g = e.target.options.groep;
            var id = e.target.options.id;
            var naam = dataset[g][id].naam;
            var adres = dataset[g][id].adres;
            var html = dataset[g][id].html;
            //infoControlEl.setInfo(e.target.options.groep, e.target.options.id);
            infoControlEl.setInfo(naam, adres, html );

            /* einde custom control */
        };


        // coordinaten weergeven bij klikken (TEST FUNCTIONALITEIT)
        var mapKlik = function (e)
        {
            //verwijderd marker infoControl van de kaart
            if (infoControlEl) {
                map.removeControl(infoControlEl);
                infoControlEl = null;
            }
        }

        var iv;
        var putStatusControl = function() {
            L.Control.CmdStatus = L.Control.extend({
                onAdd: function(map) {


                    var container = L.DomUtil.create('div','status-container');
                    this.status = L.DomUtil.create('span', '', container);

                    this.status.innerHTML = 'Geluksweekend Den Bosch';

                    return container;
                },

                onRemove: function(map)
                {
                    // Nothing to do here
                },
                setStatus : function(txt) {
                    this.status.innerHTML = txt;
                },
                clearStatus : function() {
                    this.status.innerHTML = '';
                }
            });

            L.control.cmdStatus = function(opts) {
                return new L.Control.CmdStatus(opts);
            }

            statusControl = L.control.cmdStatus({ position: 'bottomright' }).addTo(map);

        };

        //initialisatie van de cmdApp
        var init = function() {
            map = L.map('map',
                {
                    zoomControl: false,
                    center: dataset.groep[0].latlon,
                    zoom: 14
                });

            // kaart weergeven in map element
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

            // kaart weergeven in map element
            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
                {
                    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

            //event wordt gebruikt om de markerInfoControl te verwijderen indien aanwezig
            map.on('click', mapKlik);

            var groepen = ['groep'];
            for (i in groepen) {
                createMarkers(groepen[i]);
            }

            putStatusControl();
        } // einde init

        init();

        return this;
    } //einde cmdApp
}(jQuery, L, myIcons, dataset1 ));

