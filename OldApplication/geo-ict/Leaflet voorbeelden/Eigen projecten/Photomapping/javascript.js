$(document).ready(function ()
{
    // Array met photomapping waypoints
    var photoArray = new Array();
    // Waypoint als marker
    var PhotoMapWP = L.marker;

    // Aanmaken van de map
    var map = L.map("map").setView([51.685803, 5.121367], 13);
    L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png",
    {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors &copy photomapping.eu',
        maxZoom: 18
    }).addTo(map);

    // Aanmaken van photo marker
    var PhotoIcon = L.icon(
    {
        iconUrl: 'Images/PhotoIcon.png',
        iconSize: [30, 30], // Grootte van de markers
        iconAnchor: [15, 15], // Middelpunt markers
        popupAnchor: [0, -20] // Popup markers
    });


    function onMapClick(e)
    {
        var newMarker = new L.marker(e.latlng, 
        { 
            icon: PhotoIcon 
        }).bindPopup('Coordinaten:<br>' + e.latlng).addTo(map);
        var newCirkel = new L.circle(e.latlng, 100, 
        { 
            color: 'gray', 
            fillColor: 'gray', 
            fillOpacity: 0.3 
        }).addTo(map);
        photoArray.push(newMarker);
        $('#aantal').text("Aantal gemaakte foto's: " + photoArray.length);
		newCirkel.on('click',function(e)
        {

	    });
    }
    map.on('click', onMapClick);
});