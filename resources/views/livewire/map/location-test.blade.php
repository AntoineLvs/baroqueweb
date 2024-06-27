<div>
    <div id='map' class="" style='height: 90vh'></div>


    <!-- here there is a div 'map', with a special height, then we say in the script underneath, that we push the map in there. 
 In this script, we initialize everything that is need to work, tokens, informations... 
 We apply a layer above the map, where we take all the locations from the Tileset of Mapbox, and put marker on their locations.
 We also create a tooltip with some informations to show. 
 we are above Hamburg at start. If we select a location,
 it will zoom on it, by retrieving the lat/lng of it, to zoom on it.  -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Livewire.on('geoJsonLocationOnMap', locationData => {

                const locationsGeoJson = locationData[0];
                console.log(locationsGeoJson);

                mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHBiYXozZm0wZ21vMnFwZHE4ZWc5Z2lzIn0.dJGBO1JOfota9KceLDgGJg';

                const map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/elsenmedia/ckvso4s5p189k14pltjqo1rqo',
                    center: [9.967627253948834, 53.573922489205195],
                    zoom: 10
                });

                map.on('load', function() {
                    map.loadImage('https://cdn-icons-png.flaticon.com/512/3448/3448558.png', function(error, image) {
                        if (error) throw error;
                        map.addImage('custom-marker', image);

                        map.addSource('locations', {
                            'type': 'geojson',
                            'data': {
                                'type': 'FeatureCollection',
                                'features': locationsGeoJson
                            }
                        });

                        console.log(map.getSource('locations')._data);

                        map.addLayer({
                            'id': 'points-layer',
                            'type': 'symbol',
                            'source': 'locations',
                            'layout': {
                                'icon-image': 'custom-marker',
                                'icon-size': 0.1,
                                'text-field': ['to-string', ['get', 'title']],
                                'text-size': 12,
                                'text-anchor': 'center',
                                'text-allow-overlap': true,
                                'text-offset': [0, 3],
                            },
                            'paint': {
                                'text-color': 'hsl(0, 0%, 0%)',
                                'icon-opacity': ['interpolate', ['linear'],
                                    ['zoom'], 0, 1, 22, 1
                                ]
                            }
                        });

                        console.log(map.getLayer('points-layer'));

                        map.on('click', 'points-layer', (e) => {
                            const address = e.features[0].properties.address;
                            openGoogleMaps(address);
                        });

                        map.on('mousemove', 'points-layer', (e) => {
                            const coordinates = e.features[0].geometry.coordinates.slice();
                            const title = e.features[0].properties.title;
                            const description = e.features[0].properties.description;
                            const active = e.features[0].properties.active;

                            const htmlContent = `
                <div style="font-size: 14px; text-align: center;">
                    ${title}<br>
                    ${description}<br>
                    Active: ${active}<br>
                    Click on marker to show route
                </div>
            `;

                            const popup = new mapboxgl.Popup({
                                closeButton: false,
                                closeOnClick: false,
                                offset: [0, -20]
                            });

                            popup.setLngLat(coordinates)
                                .setHTML(htmlContent)
                                .addTo(map);

                            map.getCanvas().style.cursor = 'pointer';
                        });

                        map.on('mouseleave', 'points-layer', () => {
                            popup.remove();
                            map.getCanvas().style.cursor = '';
                        });
                    });
                });

                function openGoogleMaps(address) {
                    const formattedAddress = encodeURIComponent(address);
                    window.open(`https://www.google.com/maps/search/?api=1&query=${formattedAddress}`, '_blank');
                }

                document.addEventListener('DOMContentLoaded', function() {
                    Livewire.on('showLocationOnMap', locationData => {
                        const firstLocation = locationData[0];
                        const latitude = firstLocation.latitude;
                        const longitude = firstLocation.longitude;

                        map.flyTo({
                            center: [longitude, latitude],
                            zoom: 12,
                            essential: true
                        });
                    });

                    Livewire.on('searchResultsUpdated', locationData => {
                        const firstLocation = locationData[0];
                        const latitude = firstLocation.latitude;
                        const longitude = firstLocation.longitude;

                        map.flyTo({
                            center: [longitude, latitude],
                            zoom: 12,
                            essential: true
                        });
                    });
                });
            });
        });
    </script>
</div>
<!-- 

<div class="map-container">
    <div id='map' class="" style='height: 90vh'></div>
    <style>
        .map-container {
            margin: 0;
            padding: 0;
        }

        #map {
            top: 0;
            bottom: 0;
            width: 100%;
        }

        .marker {
            background-image: url('https://cdn-icons-png.flaticon.com/512/3448/3448558.png');
            background-size: cover;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }

        .mapboxgl-popup {
            max-width: 200px;
        }

        .mapboxgl-popup-content {
            text-align: center;
            font-family: 'Open Sans', sans-serif;
        }
    </style>
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHBiYXozZm0wZ21vMnFwZHE4ZWc5Z2lzIn0.dJGBO1JOfota9KceLDgGJg';

            const geojson = {
                'type': 'FeatureCollection',
                'features': []
            };

            let markers = [];

            // Fonction pour ajouter des features au GeoJSON
            function addFeaturesToGeojson(locationsData) {
                locationsData.forEach(location => {
                    geojson.features.push({
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Point',
                            'coordinates': [location.longitude, location.latitude]
                        },
                        'properties': {
                            'title': location.name,
                            'description': location.description
                        }
                    });
                });
            }

            // Initialiser la carte Mapbox
            const map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/elsenmedia/ckvso4s5p189k14pltjqo1rqo',
                center: [9.967627253948834, 53.573922489205195],
                zoom: 10
            });

            // Supprimer tous les marqueurs de la carte
            function removeMarkers() {
                markers.forEach(marker => marker.remove());
                markers = [];
            }

            // Ajouter les marqueurs à la carte
            function addMarkersToMap() {
                geojson.features.forEach(feature => {
                    const el = document.createElement('div');
                    el.className = 'marker';

                    const marker = new mapboxgl.Marker(el)
                        .setLngLat(feature.geometry.coordinates)
                        .setPopup(
                            new mapboxgl.Popup({
                                offset: 25
                            })
                            .setHTML(
                                `<h3>${feature.properties.title}</h3><p>${feature.properties.description}</p>`
                            )
                        )
                        .addTo(map);

                    markers.push(marker);
                });
            }

            // Écouter les changements de filtres
            Livewire.on('filterLocationOnMap', locationsDataJson => {
                const locationsData = JSON.parse(locationsDataJson);
                // Réinitialiser le GeoJSON
                geojson.features = [];
                // Supprimer les marqueurs existants
                removeMarkers();
                // Ajouter les nouvelles locations
                addFeaturesToGeojson(locationsData);
                // Ajouter les nouveaux marqueurs à la carte
                addMarkersToMap();
            });

            // Ajouter les marqueurs initiaux à la carte
            Livewire.on('filterLocationOnMap', locationsDataJson => {
                const locationsData = JSON.parse(locationsDataJson);
                addFeaturesToGeojson(locationsData);
                addMarkersToMap();
            });
        });

        const centerMapButton = document.getElementById('centerMapButton');


        document.addEventListener('DOMContentLoaded', function() {
            Livewire.on('showLocationOnMap', locationData => {
                console.log("alo ????");
                const firstLocation = locationData[0];

                const latitude = firstLocation.latitude;
                const longitude = firstLocation.longitude;

                // console.log('Latitude:', latitude);
                // console.log('Longitude:', longitude);

                mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHBiYXozZm0wZ21vMnFwZHE4ZWc5Z2lzIn0.dJGBO1JOfota9KceLDgGJg';

                map.flyTo({
                    center: [longitude, latitude],
                    zoom: 12,
                    essential: true
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            Livewire.on('searchResultsUpdated', locationData => {
                const firstLocation = locationData[0];

                const latitude = firstLocation.latitude;
                const longitude = firstLocation.longitude;
                // Utilise le SDK de Mapbox pour centrer la carte sur cette location
                mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHBiYXozZm0wZ21vMnFwZHE4ZWc5Z2lzIn0.dJGBO1JOfota9KceLDgGJg'; // Remplace par ton propre token
                // Code pour la mise à jour de la carte avec les nouvelles coordonnées
                map.flyTo({
                    center: [longitude, latitude],
                    zoom: 12, // Le niveau de zoom souhaité
                    essential: true // Assure-toi que cette transition est essentielle pour que la carte se centre correctement
                });
            });
        });
    </script>
    @endpush


</div> -->