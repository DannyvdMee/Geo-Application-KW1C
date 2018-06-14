

$(document).ready(function () {


            var options = {zoom: 12,
                           markers: [ {name: 'Kw1c college', latlon: '51.690814, 5.286295' , type: 'school'}
                                        ,{name: 'Ds Pierson', latlon: '51.700851, 5.318914' , type: 'school'}
                                        ,{name: 'Maurick college', latlon: '51.651110, 5.281871' , type: 'school'}
                                     ],
                            initMessage: 'Klik op de kaart waar je woont'
                          }; 


            var myGeoApp = $().geoApp(options);
            myGeoApp();

});



(function (L, $) {
    "use strict";
    //geoApp als plugin en closure 

    //Idee ? Markeer en cirkel om de marker met een straal van 1km, 5km of 10km
    //Tel het aantal cafe s, winkels, restaurants, bioscopen  binnen die straal en toon aantal
    //Interactie: Klik ergens op kaart, laat kiezen uit cafes/winkels/restaurants, 1/5/10


    //====> toon cirkel en aantal <=======
    $.fn.geoApp = function (options) {
        var map = null;
        var settings = $.extend({
            // These are the defaults
            map: "map",
            pos: { lat: 51.65467, lon: 5.02725 },
            zoom: 13,
            markers: [],
            thuis: null,
            cirkelGebied: null
        }, options);

        var tekenCirkel = function (e) {

            var afstand = $('#afstand').val();
                   
            var circle = L.circle([settings.pos.lat, settings.pos.lon], afstand, {
            color: 'green',
            fillColor: '#ff03ff',
            fillOpacity: 0.5
            }).addTo(map);
            
        }

        var putMarkers = function() {
            
            for (var i=0; i< settings.markers.length; i++) {
                var marker = L.marker([settings.markers[i].latlon.split(',')[0]
                                      ,settings.markers[i].latlon.split(',')[1]
                                      ]).addTo(map);
            }
 
        }

        var getLocation = function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(currentPosCallback);
            } else {
                console.log("Geolocation is not supported by this browser.");
            }
        }

        var currentPosCallback = function (position) {

            settings.pos.lat = position.coords.latitude;
            settings.pos.lon = position.coords.longitude;

            map = L.map("map").setView([settings.pos.lat, settings.pos.lon], settings.zoom);
            // Marker plaatsen op thuis

            //var marker = L.marker([settings.pos.lat, settings.pos.lon]).addTo(map);
            // Map inladen
            L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png",
		    {
		        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
		    }).addTo(map);

          
            //custom control met inputveld
            L.control.cAfstandsgebied().addTo(map);

            //plaats de markers
            putMarkers();

            //plaats marker op plek waar geklikt wordt
            map.on('click', function(e) {
                if(settings.thuis == null) {
                    settings.thuis = L.marker(e.latlng).addTo(map);    
                } else {
                    $('.app-msg').html('Je hebt je huis al gemarkeerd.');
                    $('.app-msg').append('Verschuif nu de slider..');
                }
            });

        }

        L.Control.CAfstandsgebied = L.Control.extend({
            options: {
                // topright, topleft, bottomleft, bottomright
                position: 'topright'
            },
            initialize: function (options) {
                // constructor
            },
            onAdd: function (map) {
                // happens after added to map
                var container = L.DomUtil.create('div', 'afstanden-container');
                this.form = L.DomUtil.create('form', 'form', container);
               
                var group = L.DomUtil.create('div', 'form-group', this.form);
                var pargraf = L.DomUtil.create('p', 'app-msg', group);
                pargraf.innerText = settings.initMessage;

                this.input = L.DomUtil.create('input', 'form-control input-sm', group);
                this.input.type = 'range';
                this.input.min = 100;
                this.input.max = 20000;
                this.input.value = 100;
                this.input.id = 'afstand';
   
                //L.DomEvent.addListener(this.sl, 'click', L.DomEvent.preventDefault);
                L.DomEvent.addListener(this.input, 'change', function() {
                                    var afstand = this.input.value;

                                    if (settings.cirkelGebied != null) {
                                        map.removeLayer(settings.cirkelGebied);
                                        settings.cirkelGebied = null;
                                    }

                                    settings.cirkelGebied = L.circle(settings.thuis.getLatLng(), afstand, {
                                        color: 'green',
                                        fillColor: '#ff03ff',
                                             fillOpacity: 0.4
                                        }).addTo(map);

                                    $('.app-msg').html('Afstandsgebied vanaf je huis '+afstand+'m');
                }
                , this);

                L.DomEvent.disableClickPropagation(container);
                return container;
            },
            onRemove: function (map) {
                // when removed
            }
        });

        L.control.cAfstandsgebied = function (id, options) {
            return new L.Control.CAfstandsgebied(id, options);
        }




        return function () {
            getLocation();
        }
    };
} (L, $));
