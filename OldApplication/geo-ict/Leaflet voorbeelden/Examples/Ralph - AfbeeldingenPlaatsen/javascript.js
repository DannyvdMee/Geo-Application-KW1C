(function (L, $) {
    //geoApp als plugin en closure 
    $.fn.geoApp = function (options) 
    {   
       var map = null;
       var settings = $.extend(
       {
			// These are the defaults
            map: "map",
            pos: {lat: 51.65467 , lon: 5.02725},
            zoom: 13
		}, options );

        var getLocation = function () 
        {
            if (navigator.geolocation) 
            {
                navigator.geolocation.getCurrentPosition(currentPosCallback);
            } 
            else 
            {
                console.log("Geolocation is not supported by this browser.");
            }
        }

        var currentPosCallback = function (position) 
        {
            settings.pos.lat = position.coords.latitude;
            settings.pos.lon = position.coords.longitude;

            map = L.map("map").setView([settings.pos.lat, settings.pos.lon], settings.zoom);
            
            // Marker plaatsen op thuis
            var marker = L.marker([settings.pos.lat, settings.pos.lon]).addTo(map);
            
            // Map inladen
            L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png",
            {
		        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
		    }).addTo(map);

            //extra markers die via een control layer getoond kunnen worden
            var afb1 = L.layerGroup([L.marker([51.4341762, 5.87041]).bindPopup('<IMG src="Afbeelding/kw1c.jpg" height="250" width="200">')]);
            var afb2 = L.layerGroup([L.marker([51.684103, 5.900850]).bindPopup('<IMG src="Afbeelding/kw1c.jpg" height="250" width="200">')]);
            
            // controls toevoegen
            L.control.layers( 
            {
                'Afbeelding 1': afb1, 'Afbeelding 2:':afb2
            }).addTo(map);
            L.control.scale().addTo(map);
        }
        return function () 
        {
            getLocation();
        }
    };
} (L, $));
