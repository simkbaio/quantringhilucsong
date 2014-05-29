!function ($) {

    $(function() {

        // basic
        new GMaps({
            div: '#gmap-basic',
            lat: -12.043333,
            lng: -77.028333
        });

        // markers
        var map = new GMaps({
            div: '#gmap-marker',
            lat: -12.043333,
            lng: -77.028333
        });
        map.addMarker({
            lat: -12.043333,
            lng: -77.028333,
            title: 'Lima',
            click: function(e) {
                alert('You clicked in this marker');
            }
        });

        // geolocation
        var mapGeo = new GMaps({
            div: '#gmap-geo',
            lat: -12.043333,
            lng: -77.028333
        });

        GMaps.geolocate({
            success: function(position){
                mapGeo.setCenter(position.coords.latitude, position.coords.longitude);
            },
            error: function(error){
                alert('Geolocation failed: '+error.message);
            },
            not_supported: function(){
                alert("Your browser does not support geolocation");
            },
            always: function(){
                alert("Geolocation done!");
            }
        });

        // geocoding
        var mapGeocode = new GMaps({
            div: '#gmap-geocode',
            lat: -12.043333,
            lng: -77.028333
        });
        $('#geocoding_form').submit(function(e){
            e.preventDefault();
            GMaps.geocode({
                address: $('#address').val().trim(),
                callback: function(results, status){
                    if(status=='OK'){
                        var latlng = results[0].geometry.location;
                        mapGeocode.setCenter(latlng.lat(), latlng.lng());
                        mapGeocode.addMarker({
                            lat: latlng.lat(),
                            lng: latlng.lng()
                        });
                    }
                }
            });
        });

        // polylines
        var mapPoly = new GMaps({
            div: '#gmap-polyline',
            lat: -12.043333,
            lng: -77.028333,
            click: function(e){
                //console.log(e);
            }
        });

        path = [[-12.044012922866312, -77.02470665341184], [-12.05449279282314, -77.03024273281858], [-12.055122327623378, -77.03039293652341], [-12.075917129727586, -77.02764635449216], [-12.07635776902266, -77.02792530422971], [-12.076819390363665, -77.02893381481931], [-12.088527520066453, -77.0241058385925], [-12.090814532191756, -77.02271108990476]];

        mapPoly.drawPolyline({
            path: path,
            strokeColor: '#131540',
            strokeOpacity: 0.6,
            strokeWeight: 6
        });
        mapPoly.setZoom(12);

        // polygon
        var mapPolygon = new GMaps({
            div: '#gmap-polygon',
            lat: -12.043333,
            lng: -77.028333
        });

        var path = [[-12.040397656836609,-77.03373871559225],
            [-12.040248585302038,-77.03993927003302],
            [-12.050047116528843,-77.02448169303511],
            [-12.044804866577001,-77.02154422636042]];

        polygon = mapPolygon.drawPolygon({
            paths: path,
            strokeColor: '#BBD8E9',
            strokeOpacity: 1,
            strokeWeight: 3,
            fillColor: '#BBD8E9',
            fillOpacity: 0.6
        });

        // Open Street map
        map = new GMaps({
            div: '#gmap-osm',
            lat: -12.043333,
            lng: -77.028333,
            mapTypeControlOptions: {
                mapTypeIds : ["hybrid", "roadmap", "satellite", "terrain", "osm", "cloudmade"]
            }
        });
        map.addMapType("osm", {
            getTileUrl: function(coord, zoom) {
                return "http://tile.openstreetmap.org/" + zoom + "/" + coord.x + "/" + coord.y + ".png";
            },
            tileSize: new google.maps.Size(256, 256),
            name: "OpenStreetMap",
            maxZoom: 18
        });
        map.addMapType("cloudmade", {
            getTileUrl: function(coord, zoom) {
                return "http://b.tile.cloudmade.com/8ee2a50541944fb9bcedded5165f09d9/1/256/" + zoom + "/" + coord.x + "/" + coord.y + ".png";
            },
            tileSize: new google.maps.Size(256, 256),
            name: "CloudMade",
            maxZoom: 18
        });
        map.setMapTypeId("osm");

        // Fusion tables layers
        infoWindow = new google.maps.InfoWindow({});
        map = new GMaps({
            div: '#gmap-ftl',
            zoom: 11,
            lat: 41.850033,
            lng: -87.6500523
        });
        map.loadFromFusionTables({
            query: {
                select: '\'Geocodable address\'',
                from: '1mZ53Z70NsChnBMm-qEYmSDOvLXgrreLTkQUvvg'
            },
            suppressInfoWindows: true,
            events: {
                click: function(point){
                    infoWindow.setContent('You clicked here!');
                    infoWindow.setPosition(point.latLng);
                    infoWindow.open(map.map);
                }
            }
        });

        // Overlay map types
        var getTile = function(coord, zoom, ownerDocument) {
            var div = ownerDocument.createElement('div');
            div.innerHTML = coord;
            div.style.width = this.tileSize.width + 'px';
            div.style.height = this.tileSize.height + 'px';
            div.style.background = 'rgba(250, 250, 250, 0.55)';
            div.style.fontFamily = 'Monaco, Andale Mono, Courier New, monospace';
            div.style.fontSize = '10';
            div.style.fontWeight = 'bolder';
            div.style.border = 'dotted 1px #aaa';
            div.style.textAlign = 'center';
            div.style.lineHeight = this.tileSize.height + 'px';
            return div;
        };

        map = new GMaps({
            el: '#gmap-omt',
            lat: -12.043333,
            lng: -77.028333
        });
        map.addOverlayMapType({
            index: 0,
            tileSize: new google.maps.Size(256, 256),
            getTile: getTile
        });

        // Snazzy Pale Dawn
        new GMaps({
            div: '#gmap-snazzy1',
            lat: -12.043333,
            lng: -77.028333,
            zoom: 15,
            center: new google.maps.LatLng(53.385873, -1.471471),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [
                {
                    "featureType": "water",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#acbcc9"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "stylers": [
                        {
                            "color": "#f2e5d4"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#c5c6c6"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e4d7c6"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#fbfaf7"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#c5dac6"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "lightness": 33
                        }
                    ]
                },
                {
                    "featureType": "road"
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {},
                {
                    "featureType": "road",
                    "stylers": [
                        {
                            "lightness": 20
                        }
                    ]
                }
            ]
        });

        // Snazzy Midnight Commander
        new GMaps({
            div: '#gmap-snazzy2',
            lat: -12.043333,
            lng: -77.028333,
            zoom: 15,
            center: new google.maps.LatLng(53.385873, -1.471471),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [
                {
                    "featureType": "water",
                    "stylers": [
                        {
                            "color": "#021019"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "stylers": [
                        {
                            "color": "#08304b"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#0c4152"
                        },
                        {
                            "lightness": 5
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#000000"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#0b434f"
                        },
                        {
                            "lightness": 25
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#000000"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#0b3d51"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        }
                    ]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 13
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "stylers": [
                        {
                            "color": "#146474"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#000000"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#144b53"
                        },
                        {
                            "lightness": 14
                        },
                        {
                            "weight": 1.4
                        }
                    ]
                }
            ]
        });

        // Snazzy Apple Maps-esque
        new GMaps({
            div: '#gmap-snazzy3',
            lat: -12.043333,
            lng: -77.028333,
            zoom: 15,
            center: new google.maps.LatLng(53.385873, -1.471471),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#a2daf2"
                        }
                    ]
                },
                {
                    "featureType": "landscape.man_made",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f7f1df"
                        }
                    ]
                },
                {
                    "featureType": "landscape.natural",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#d0e3b4"
                        }
                    ]
                },
                {
                    "featureType": "landscape.natural.terrain",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#bde6ab"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.medical",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#fbd3da"
                        }
                    ]
                },
                {
                    "featureType": "poi.business",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ffe15f"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#efd151"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "black"
                        }
                    ]
                },
                {
                    "featureType": "transit.station.airport",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#cfb2db"
                        }
                    ]
                }
            ]
        });

    });
}(window.jQuery);