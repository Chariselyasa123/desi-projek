<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8/>
    <title>Plain Leaflet API</title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no'/>
    <script src='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.js'></script>
    <link href='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.css' rel='stylesheet'/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://mutsuyuki.github.io/Leaflet.SmoothWheelZoom/SmoothWheelZoom.js"></script>

    <script src="https://unpkg.com/pouchdb@^5.2.0/dist/pouchdb.js"></script>
    <script src="https://unpkg.com/leaflet.tilelayer.pouchdbcached@latest/L.TileLayer.PouchDBCached.js"></script>

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<style>
    body,
    html {
        padding: 0;
        margin: 0 auto;
    }


    .leaflet-top.leaflet-left {
        bottom: 100px !important;
        right: 20px !important;
        left: unset;
        top: unset;
    }

    .leaflet-top.leaflet-right {
        right: unset;
        left: 10px;
    }
</style>

<section id="wilayah">
    <div id='map'></div>
</section>


<script>
    var geojson;
    var map;

    // Set Mapbox and Style
    L.mapbox.accessToken = 'pk.eyJ1IjoibGFzaWRhIiwiYSI6ImNqcHV0dm5uNTBrcWszeGxnd2Z6enpyMm4ifQ.syGeQYzbXKZXw1KOi_iYTA';
    var mapboxTiles = L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/{z}/{x}/{y}?access_token=' + L.mapbox.accessToken, {
        attribution: '© <a href="https://www.mapbox.com/feedback/">Mapbox</a> © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        tileSize: 512,
        zoomOffset: -1,
        useCache: true,
        maxZoom: 18,
        crossOrigin: true
    });

    // Set Map
    map = L.map('map', {
        scrollWheelZoom: false, // disable original zoom function
        smoothWheelZoom: true,  // enable smooth zoom
        smoothSensitivity: 1,   // zoom speed. default is 1
    })
        .addLayer(L.mapbox.styleLayer('mapbox://styles/lasida/ckakz6pe43ceu1ipo87z85tm1'))
        .setView([-6.404013, 105.958238], 8); // Set View

    // Shape File format GeoJSON
    jQuery.getJSON("https://wilayah-banten.free.beeceptor.com/wilayah/banten", function (data) {
        // Add GeoJSON layer to the map once the file is loaded
        // console.log( data );
        geojson = L.geoJson(data, {
            style: style,
            onEachFeature: onEachFeature
        }).addTo(map);

        render_mapala_marker(); // Call the Marker
    });


    async function render_mapala_marker() {
        const response = await fetch('https://wilayah-banten.free.beeceptor.com/wilayah/marker');

        const data = await response.json();


        jQuery.each(data, function (i, item) { // Loop Location
            jQuery.each(item, function (i, org) { // Loop Item
                if (org.coordinate) {
                    console.log(org.coordinate);
                    L.marker(org.coordinate, {
                        icon: L.icon({
                            iconUrl: 'https://unpkg.com/leaflet@1.6.0/dist/images/marker-icon.png',
                            popupAnchor: [15, 18],
                            className: 'redIcon'
                        })
                    }).bindPopup('<a href="' + org.link + '">' + org.name + '</a>').addTo(map);
                }
            });
        });

        setIconSize();
    }

    // control that shows state info on hover
    var info = L.control({
        position: 'topright'
    });

    // Information di pojok
    info.onAdd = function (map) {
        this._div = L.DomUtil.create('div', 'info');
        this.update();
        return this._div;
    };

    info.update = function (props) {
        if (props) {
            this._div.innerHTML = '<b>' + props.wilayah + '</b><br/>'
                + props.count_mapala + ' MAPALA' + '</b><br/>'
                + props.count_alam + ' Bentuk Alam';
        } else {
            this._div.innerHTML = 'Pilih Wilayah';
        }
    };

    info.addTo(map);
    map.on('zoomend', setIconSize);

    // Dynamic Width relative based on Zoom
    function setIconSize(e) {
        var i;
        var zoomLevel = map.getZoom();
        var x = zoomLevel * 4;
        var y = zoomLevel * 4;
        var iconElements = document.getElementsByClassName('redIcon');
        for (i = 0; i < iconElements.length; i++) {
            iconElements[i].style.width = Math.round(x) - 15 + 'px';
            iconElements[i].style.height = Math.round(y) - 15 + 'px';
        }
    };

    function style(feature) {
        return {
            weight: 2,
            opacity: 1,
            color: '#FD8D3C',
            dashArray: '3',
            fillOpacity: 0.5
        };
    }

    function highlightFeature(e) {
        var layer = e.target;

        layer.setStyle({
            weight: 1,
            color: 'red',
            // dashArray: '3',
            fillOpacity: 0.5
        });

        if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
            layer.bringToFront();
        }

        info.update(layer.feature.properties);
    }

    function resetHighlight(e) {
        geojson.resetStyle(e.target);
        info.update();
    }

    function zoomToFeature(e) {
        map.fitBounds(e.target.getBounds());
    }

    function onEachFeature(feature, layer) {
        layer.on({
            mouseover: highlightFeature,
            mouseout: resetHighlight,
            click: zoomToFeature
        });
    }

    // function getColor(d) {
    //     return d > 30 ? '#800026' :
    //         d > 25  ? '#BD0026' :
    //         d > 20  ? '#E31A1C' :
    //         d > 15  ? '#FC4E2A' :
    //         d > 10   ? '#FD8D3C' :
    //         d > 5   ? '#FEB24C' :
    //         d > 1   ? '#FED976' :
    //                     '#FFEDA0';
    // }
    // var legend = L.control({position: 'bottomright'});

    // legend.onAdd = function (map) {

    //     var div = L.DomUtil.create('div', 'info legend'),
    //         grades = [0, 10, 20, 50, 100, 200, 500, 1000],
    //         labels = [];

    //     // loop through our density intervals and generate a label with a colored square for each interval
    //     for (var i = 0; i < grades.length; i++) {
    //         div.innerHTML +=
    //             '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
    //             grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' : '+');
    //     }

    //     return div;
    // };

    // legend.addTo(map);
</script>

<style>
    .info {
        padding: 6px 8px;
        font: 14px/16px Arial, Helvetica, sans-serif;
        background: white;
        background: rgba(255, 255, 255, 0.8);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
    }

    .info h4 {
        margin: 0 0 5px;
        color: #777;
    }

    .legend {
        line-height: 18px;
        color: #555;
    }

    .legend i {
        width: 18px;
        height: 18px;
        float: left;
        margin-right: 8px;
        opacity: 0.7;
    }

    .redIcon {
        object-fit: cover;
        height: auto !important;
    }
</style>

</body>
</html>
