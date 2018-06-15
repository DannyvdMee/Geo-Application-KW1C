//Aanmaken van de variabelen
var lat1, lat2, lon1, lon2,currentLat,CurrentLon;
var markerArray = new Array();
var map;
var polygon = null;
//Opstart van de site
$(document).ready(function () {

    //Aanmaken van de map
    map = L.map('map').setView([51.505, -0.09], 13);
    $('#map')
    {
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png',
        {
            attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>[…]',
            maxZoom: 18
        }).addTo(map);
    }

    //event listener voor map click die er voor zorgt dat de coordinaten worden uitgelezen
    map.addEventListener('click', function (e) {
        if (polygon != null) {
            map.removeLayer(polygon);
            polygon = null;
        }
        var latlon = window.confirm("weet u zeker dat u " + e.latlng + "wilt gebruiken?");
        if (latlon) {
            if (lat1 == null) {
                lat1 = e.latlng.lat;
                lon1 = e.latlng.lng;
                document.getElementById("txtLatLon1").value = e.latlng.lng + ", " + e.latlng.lat;
            }
            else {
                lat2 = e.latlng.lat;
                lon2 = e.latlng.lng;
                document.getElementById("txtLatLon2").value = e.latlng.lng + ", " + e.latlng.lat;
            }
            var marker = L.marker(e.latlng);
            markerArray.push(marker);
            map.addLayer(marker);
        }
    });

    //opvragen huidige coordinaten
    if (navigator.geolocation) {
        // Call getCurrentPosition with success and failure callbacks
        navigator.geolocation.getCurrentPosition(
            function success(position) {
                CurrentLon = position.coords.longitude;
                currentLat = position.coords.latitude;
                document.getElementById("txtLatLonCurrent").value = position.coords.longitude + ", " + position.coords.latitude;
            });
    }
    else {
        alert("Sorry, de browser ondersteunt niet locatie bepaling.");
    }
});


//coordinaat velden legen
function clickReset()
{
    lat1 = null;lat2 = null;lon1 = null;lon2 = null;
    document.getElementById("txtLatLon1").value = "";
    document.getElementById("txtLatLon2").value = "";
    for (var i = 0; i < markerArray.length; i++)
    {
        map.removeLayer(markerArray[i]);
    }
}

//Als er op de bereken knop word geklikt wordt er berkent hoeveel afstand er tussen zit
function clickCalculate()
{
    //als er niks ingevoerd is stoppen.
    if (lat1 == "" || lat1 == null)
        return;
    //Vragen of dat de eigen locatie moet worden gebruikt, als de tweede LAT LON onbekent zijn. anders stoppen
    if (lat2 == "" || lat2 == null)
        if (window.confirm("2de locatie niet gevonden, huidige locatie gebruiken?"))
        {
            lat2 = currentLat;
            lon2 = CurrentLon;
        }
        else
            return;
    
    polygon = L.polygon([
    [lat1,lon1 ],
    [lat2,lon2 ],]);    
    map.addLayer(polygon);
    //Welk unit er moet worden gebruikt
    var unit = prompt("Welke eenheid wilt u gebruiken, K voor kilometers, M voor mijlen, N voor nautische mijlen" );
    //Teruggeven van de haversine formule.
    alert(distance(lat1,lon1,lat2,lon2,unit));
    //legen van de velden
    clickReset();
}

//uitrekenen van de coordinaten
function distance(lat1, lon1, lat2, lon2, unit) 
{
    var radlat1 = Math.PI * lat1/180
    var radlat2 = Math.PI * lat2/180
    var radlon1 = Math.PI * lon1/180
    var radlon2 = Math.PI * lon2/180
    var theta = lon1-lon2
    var radtheta = Math.PI * theta/180
    var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
    dist = Math.acos(dist)
    dist = dist * 180/Math.PI
    dist = dist * 60 * 1.1515
    if (unit == "K") { dist = dist * 1.609344; dist = dist + " Kilometers"; }
    else if (unit == "N") { dist = dist * 0.8684; dist = dist + " Nautische Mijl"; }
    else dist = dist + " Mijl";
    return dist
}
