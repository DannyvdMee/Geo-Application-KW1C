//Aanmaken van de variabelen
var lat1, lat2, lon1, lon2,currentLat,CurrentLon;

//Opstart van de site
$(document).ready(function () {

    //Aanmaken van de map
    var map = L.map('map').setView([51.684001, 5.286969], 18);
            L.marker([51.684001, 5.286969]).addTo(map);
    $('#map')
    {

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png',
        {
            attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>[…]',
            maxZoom: 18
        }).addTo(map);
    }
    });