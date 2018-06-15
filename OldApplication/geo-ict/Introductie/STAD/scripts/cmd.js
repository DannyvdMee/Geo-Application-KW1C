//
//    Auteur:             A. Saebu & R. Gijsbrechts
//    Aanmaakdatum:       24 mei 2017
//    Project:            Introductie KW1C ICT-academie
//
(function ($, L, myIcons, dataset)
{

    //nieuwe jQuery functie/plugin declareren en implementeren
    $.fn.cmdApp = function (options)
    {
        var settings = $.extend(
        {
            // These are the defaults key : defaultvalue pairs
            dataset: dataset,
            proximity: { markerType: 'mysterie', markerDistance: 50 },
            startLoc: [51.690433, 5.286753]
        }, options);

        // declareren variabelen huidige positie en nauwkeurigheid
        var map, afstand;
        var user = { positie: null, nauwkeurigheid: null, prevDistance: 0 };
        var popup = L.popup();
        var allMarkers = [];
        var infoControlEl; //customm Control voor de Marker Info scherm
        var statusControl; //message Control voor status en berichten
        var locControl; //control om watch aan/uit te zetten

        var locTeller = 0;
        var OFF = 0, PASSIVE = 0;
        var ON = 1, ACTIVE = 1;


        var modusApp = PASSIVE;
        var modusWatch = OFF;
        //
        var navigatiepunten = { direct: []
                                , gelopen: []
        };

        var directeLijn;
        var gelopenLijn;

        //de laatst geklikte marker
        var lstClickedMarker;

        //de markers zijn de waypoints waar er iets gedaan/gevonden wordt
        var createMarkers = function (g)
        {
            for (i = 0; i < dataset[g].length; i++)
            {

                var dataItem = dataset[g][i];
                //dit type wordt alleen getoond als je in de buurt bent (< proximity.markerDistance)
                //console.log(settings.proximity.markerType);
                if (settings.proximity.markerType != g)
                {
                    var m = L.marker(dataItem.latlon, { icon: dataItem.icon });
                    m.addTo(map).on('click', openMarkerControl);
                    m.options.groep = g;
                    m.options.id = i;
                    if (!allMarkers[g])
                    {
                        allMarkers[g] = [];
                    }
                    allMarkers[g][i] = m;
                }
            }
        };

        var getMarkerInfoByGroepId = function (g, i)
        {
            return dataset[g][i];
        }

        if (typeof (Number.prototype.toRadians) === "undefined")
        {
            Number.prototype.toRadians = function ()
            {
                return this * Math.PI / 180;
            }
        }
        //set en teken directe lijn tussen de 2 markers
        var setNavigatieLijnenDirect = function (latlon1, latlon2)
        {

            navigatiepunten.direct = [];
            navigatiepunten.direct.push(latlon1);
            navigatiepunten.direct.push(latlon2);
            var afstand = distance(latlon1[0], latlon1[1], latlon2.lat, latlon2.lng);

            if (parseInt(user.prevDistance) != parseInt(afstand))
            {
                if (directeLijn)
                {
                    map.removeLayer(directeLijn);
                    directeLijn = null;
                }
                directeLijn = L.polyline(navigatiepunten.direct, { color: 'red' }).addTo(map);
            }
            else
            {
                //alleen bij eerst gevonden locatie
                //if (locTeller == 0)
                //map.fitBounds(directeLijn.getBounds());
            }

            //user.positie.bindPopup('Afstand tot waypoint '+afstand+'m').openPopup();
            return afstand;
        }

        //informatie van een marker wordt links in een venster control getoond
        var openMarkerControl = function (e)
        {

            modusApp = PASSIVE;
            setWatchOff();

            //de id van de geklikte marker
            lstClickedMarker = getMarkerInfoByGroepId(e.target.options.groep, e.target.options.id);

            /*custom control venster aan linkerzijde voor de marker info*/
            L.Control.Info = L.Control.extend({
                options: {
                    // topright, topleft, bottomleft, bottomright
                    position: 'topleft',
                    placeholder: 'Info...'
                },
                initialize: function (options /*{ data: {...}  }*/)
                {
                    // constructor
                    L.Util.setOptions(this, options);
                },
                onAdd: function (map)
                {

                    // happens after added to map
                    var container = L.DomUtil.create('div', 'info-container');
                    this.section = L.DomUtil.create('section', 'sectie', container);
                    this.title = L.DomUtil.create('h1', '', this.section);
                    this.title.innerHTML = "Waypoint naam";

                    this.sub1 = L.DomUtil.create('h3', '', this.section);
                    this.sub1.innerHTML = "Opdracht";
                    this.p1 = L.DomUtil.create('p', '', this.section);
                    this.p1.innerHTML = "opdrachttekst";

                    this.sectionHSB = L.DomUtil.create('section', '', this.section)

                    this.sub2 = L.DomUtil.create('h3', '', this.sectionHSB);
                    this.sub2.innerHTML = "Hint";
                    this.p2 = L.DomUtil.create('p', '', this.sectionHSB);
                    this.p2.innerHTML = "hinttekst";

                    this.sub3 = L.DomUtil.create('h3', '', this.sectionHSB);
                    this.sub3.innerHTML = "Spoiler";

                    this.fig = L.DomUtil.create('figure', '', this.sectionHSB);
                    this.img = L.DomUtil.create('img', '', this.fig);
                    this.img.title = 'Afbeelding';
                    this.img.style = 'width: 25%';
                    this.img.style = 'height: 25%'

                    this.button = L.DomUtil.create('button', '', this.sectionHSB);
                    this.button.innerHTML = "<h2>Navigeer</h2>";

                    L.DomEvent.addListener(this.button, 'click', this.startNavigeren, this);
                    L.DomEvent.addListener(this.img, 'click', this.toggleImage, this);
                    L.DomEvent.disableClickPropagation(container);

                    return container;

                },
                onRemove: function (map)
                {
                    // when removed
                    //L.DomEvent.removeListener(form, 'submit', this.submit, this);
                    //L.DomEvent.removeListener(container, 'click', this.toggleControl, this);

                },
                setInfo: function (t1, t2, i, t3, hsb)
                {
                    this.p1.innerHTML = t1;
                    this.p2.innerHTML = t2;
                    this.img.src = i;
                    this.title.innerHTML = t3;
                    this.sectionHSB.style.display = hsb;
                },
                startNavigeren: function ()
                {
                    statusControl.setStatus('Navigatie gestart');
                    map.removeControl(infoControlEl);
                    infoControlEl = null;

                    modusApp = ACTIVE;
                    if (modusWatch == OFF)
                    {
                        setWatchOn();
                    }

                    //Dit wordt al gedaan als de watch wordt aangezet en de locatie wordt gevonden
                    //if(user.positie)
                    //    setNavigatieLijnenDirect(lstClickedMarker.latlon, user.positie.getLatLng());

                },
                toggleImage: function (e)
                {
                    var target = event.target;
                    if (target.class == "small")
                    {
                        $('.info-container').css("width", "40vw");
                        $('figure img').css(
                        {
                            "position": "relative",
                            "width": "25%",
                            "height": "auto"
                        });
                        $('.leaflet-right').show();
                        target.class = "big";
                    }
                    else
                    {
                        $('.info-container').css("width", "100vw");
                        $('figure img').css(
                        {
                            "position": "absolute",
                            "width": "100vw",
                            "height": "100vh",
                            "top": "0px",
                            "left": "0px"
                        });
                        $('.leaflet-right').hide();
                        target.class = "small";
                    }
                }
            });

            L.control.info = function (id, options)
            {
                return new L.Control.Info(id, options);
            }

            if (!infoControlEl)
            {
                infoControlEl = L.control.info(1, {}).addTo(map);
            }

            //dataset indices
            var gr = e.target.options.groep;
            var id = e.target.options.id;
            //console.log(dataset[gr][id].foto);

            infoControlEl.setInfo(dataset[gr][id].opdracht, dataset[gr][id].hint, dataset[gr][id].foto, dataset[gr][id].naam, dataset[gr][id].hsb)
            /* einde custom control */
        };


        // coordinaten weergeven bij klikken (TEST FUNCTIONALITEIT)
        var mapKlik = function (e)
        {
            //verwijderd marker infoControl van de kaart
            if (infoControlEl)
            {
                map.removeControl(infoControlEl);
                infoControlEl = null;
            }
        }

        var setWatchOn = function ()
        {
            statusControl.setStatus('GPS ingeschakeld');
            modusWatch = ON;
            locControl.toggleStatus();
            map.locate(
                {
                    setView: true,
                    watch: true,
                    enableHighAccuracy: true,
                    maximumAge: 5000
                });

            map.off('zoomend', zoomendAction);
            map.on('locationfound', locatieGevonden);
        }

        var setWatchOff = function ()
        {
            statusControl.setStatus('GPS uitgeschakeld');
            locTeller = 0;
            modusWatch = OFF;
            locControl.toggleStatus();
            map.stopLocate();
        }

        var locatieGevonden = function (e)
        {

            locTeller++;
            zoekEnToonMysterieMarkers(e.latlng);

            if (modusApp == ACTIVE)
            {
                var afstand = setNavigatieLijnenDirect(lstClickedMarker.latlon, e.latlng);

                //niks doen als de afstand tot marker hetzelfde is gevbleven
                if (user.prevDistance > 0)
                    if (parseInt(user.prevDistance) == parseInt(afstand))
                    {
                        //statusControl.setStatus('Positie ongewijzigd (' + locTeller + ')');
                        if (!user.positie) user.positie = L.marker(e.latlng, { icon: iconPositie }).addTo(map);
                        return;
                    } else
                    {
                        //statusControl.setStatus('Positie gewijzigd (' + locTeller + ')');
                    }
                user.prevDistance = parseInt(afstand);
                if (afstand >= 1000)
                {
                    afstand = (afstand / 1000).toFixed(1);
                    afstand = afstand.toString().replace('.', ',');
                    statusControl.setStatus("Afstand: " + afstand + " kilometer");
                }
                else
                {
                    statusControl.setStatus("Afstand: " + afstand + " meter");
                }
            }
            if (locTeller % 10 == 0)
            {
                zoekEnToonMysterieMarkers(e.latlng);
            }
            // if position defined, then remove the existing position marker and accuracy circle from the map
            var straal = e.accuracy / 2;
            //toch kijken of verwijderen en opnieuw aanmaken beter werkt
            if (user.positie)
            {
                map.removeLayer(user.positie);
                map.removeLayer(user.nauwkeurigheid);
                if (user.positie)
                {
                    user.positie = null;
                    user.nauwkeurigheid = null;
                }
            }

            if (true)
            {
                user.positie = L.marker(e.latlng, { icon: iconPositie }).addTo(map);
                // Straal cirkel bepalen
                //// kleur cirkel bepalen op basis van nauwkeurigheid
                if (straal >= 50)
                {
                    user.nauwkeurigheid = L.circle(e.latlng, straal, {
                        fillColor: '#FF0000',
                        color: '#FF0000'
                    }).addTo(map);
                }
                else if (straal < 50 && straal > 35)
                {
                    user.nauwkeurigheid = L.circle(e.latlng, straal, {
                        fillColor: '#FFA500',
                        color: '#FFA500'
                    }).addTo(map);
                }
                else
                {
                    user.nauwkeurigheid = L.circle(e.latlng, straal, {
                        fillColor: '#008000',
                        color: '#008000'
                    }).addTo(map);
                }
            }

            setTimeout(function(){ map.on('zoomend', zoomendAction); }, 3000);

        }

        var zoomendAction = function() {
            if (modusWatch) {
                setWatchOff();
            }
        }


        var zoekEnToonMysterieMarkers = function (pos)
        {
            for (i = 0; i < settings.dataset.mysterie.length; i++)
            {
                var myPos = settings.dataset.mysterie[i];
                var afstand = parseInt(distance(myPos.latlon[0], myPos.latlon[1], pos.lat, pos.lng));
                console.log(afstand);
                //marker toevoegen als de afstand tot positie kleiner is en niet al op de kaart is gezet dan ...
                if (afstand <= settings.proximity.markerDistance)
                {
                    var reedsOpKaart = false;

                    //alleen toevoegen als ie niet al is geplaatst
                    if (!allMarkers[settings.proximity.markerType]) allMarkers[settings.proximity.markerType] = [];

                    if (!allMarkers[settings.proximity.markerType][i])
                    {
                        console.log(m);
                        console.log('mysterie marker op kaart gezet');
                        dataItem = settings.dataset[settings.proximity.markerType][i];
                        var m = L.marker(dataItem.latlon, { icon: dataItem.icon });
                        m.addTo(map).on('click', openMarkerControl);
                        m.options.groep = settings.proximity.markerType;
                        m.options.id = i;
                        allMarkers[settings.proximity.markerType][i] = m;

                    }
                }
            }
        }

        var putLocatieControl = function (locatieGevonden)
        {
            L.Control.Locatie = L.Control.extend({

                onAdd: function (map)
                {
                    this.img = L.DomUtil.create('img');
                    this.img.src = 'images/locatie.png';
                    this.img.style.width = '50px';
                    this.img.style.borderRadius = '50%';
                    this.img.class = "rood";
                    this.img.onclick = function (e)
                    {
                        // gebruiker volgen
                        if (modusWatch == ON)
                        {
                            setWatchOff();
                        } else
                        {
                            setWatchOn();
                        }
                        e.target.style.borderRadius = '50%';

                    };
                    return this.img;
                },
                onRemove: function (map)
                {
                    // Nothing to do here
                },
                toggleStatus: function ()
                {
                    if (modusWatch == ON)
                    {
                        this.img.style.backgroundColor = '#27a62a';
                    } else
                    {
                        this.img.style.backgroundColor = '#FF2A00';
                    }
                }

            });


            L.control.locatie = function (opts)
            {
                return new L.Control.Locatie(opts);
            }

            locControl = L.control.locatie({ position: 'topright' }).addTo(map);
        }

        var iv;
        var putStatusControl = function ()
        {
            L.Control.CmdStatus = L.Control.extend({
                onAdd: function (map)
                {


                    var container = L.DomUtil.create('div', 'status-container');
                    this.status = L.DomUtil.create('span', '', container);

                    this.status.innerHTML = 'Waypoints ingeladen';

                    return container;
                },

                onRemove: function (map)
                {
                    // Nothing to do here
                },
                setStatus: function (txt)
                {
                    this.status.innerHTML = txt;
                },
                clearStatus: function ()
                {
                    this.status.innerHTML = '';
                }


            });

            L.control.cmdStatus = function (opts)
            {
                return new L.Control.CmdStatus(opts);
            }

            statusControl = L.control.cmdStatus({ position: 'topleft' }).addTo(map);

        };

        //bepaalt afstand tussen 2 pnten in meters
        var distance = function (lat1, lon1, lat2, lon2)
        {
            lat1 = lat1 * 1;
            lon1 = lon1 * 1;
            lat2 = lat2 * 1;
            lon2 = lon2 * 1;
            var R = 6371000; // m
            var phi1 = lat1.toRadians();
            var phi2 = lat2.toRadians();
            var deltaphi = (lat2 - lat1).toRadians();
            var deltalambda = (lon2 - lon1).toRadians();

            var a = Math.sin(deltaphi / 2) * Math.sin(deltaphi / 2) +
                Math.cos(phi1) * Math.cos(phi2) *
                Math.sin(deltalambda / 2) * Math.sin(deltalambda / 2);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            return Math.round(R * c);
        }

        //initialisatie van de cmdApp
        var init = function ()
        {
            map = L.map('map',
                {
                    zoomControl: false,
                    center: settings.startLoc,
                    zoom: 16
                });

            // kaart weergeven in map element
            //L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
            //'http://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}
            // kaart weergeven in map element
            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
                {
                    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

            //event wordt gebruikt om de markerInfoControl te verwijderen indien aanwezig
            map.on('click', mapKlik);

            var groepen = ['groep', 'ict', 'stad', 'mysterie'];
            for (i in groepen)
            {
                createMarkers(groepen[i]);
            }

            //locatieControl aamzetten;
            putLocatieControl(locatieGevonden);
            putStatusControl();
            //meteen aanzetten
            setWatchOn();
        } // einde init

        init();

        return this;
    } //einde cmdApp
} (jQuery, L, myIcons, dataset1));
