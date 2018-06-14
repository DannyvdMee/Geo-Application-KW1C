
$(document).ready(function ()
{
    var map = L.map('map').setView([51.505, -0.09], 13);
    $('#map')
    {
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png',
         {
             attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>[…]',
             maxZoom: 18
         }).addTo(map);
    }


    document.getElementById("afbeelding").onchange = function (e)
    {
        EXIF.getData(e.target.files[0], function ()
        {
            var lat = EXIF.getTag(this, "GPSLatitude").toString(),
                 lon = EXIF.getTag(this, "GPSLongitude").toString();

            var latdec = parseFloat(lat.split(",")[0]) + parseFloat(lat.split(",")[1] / 60) + 
            parseFloat(lat.split(",")[2] / 3600);
            var londec = parseFloat(lon.split(",")[0]) + parseFloat(lon.split(",")[1] / 60) + 
            parseFloat(lon.split(",")[2] / 3600);


            var marker = L.marker([latdec, londec]).addTo(map);
            map.setView([latdec, londec], 13);
            window.alert(lat + "\n" + lon);
            $('#coord').html("Deze foto is gemaakt op:" + "\n\nBreedtegraad: " + latdec + "\n" + 
            "Lengtegraad: " + londec);
        });
    }
}); 