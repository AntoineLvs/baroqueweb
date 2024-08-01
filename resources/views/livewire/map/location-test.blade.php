<div>
    <div id='map' class="" style='position: absolute; z-index: 1;  top: 0; left: 0; width: 100%; height: 100%;'></div>


    <!-- here there is a div 'map', with a special height, then we say in the script underneath, that we push the map in there. 
 In this script, we initialize everything that is need to work, tokens, informations... 
 We apply a layer above the map, where we take all the locations from the Tileset of Mapbox, and put marker on their locations.
 We also create a tooltip with some informations to show. 
 we are above Hamburg at start. If we select a location,
 it will zoom on it, by retrieving the lat/lng of it, to zoom on it.  -->
    @script
    <script>
        //mapboxgl.accessToken = 'sk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJja3ZubXMzbmgxYXE4MnJvdTRqYXR1YzM2In0.F2OJW7uFgP0WjFwTIXBPCA';
        mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHBiYXozZm0wZ21vMnFwZHE4ZWc5Z2lzIn0.dJGBO1JOfota9KceLDgGJg';
        const accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHBiYXozZm0wZ21vMnFwZHE4ZWc5Z2lzIn0.dJGBO1JOfota9KceLDgGJg';

        const map = new mapboxgl.Map({
            container: 'map', // The container ID
            style: 'mapbox://styles/elsenmedia/ckvso4s5p189k14pltjqo1rqo', // The map style to use
            center: [9.967627253948834, 53.573922489205195], // Starting position [lng, lat]
            zoom: 10 // Starting zoom level
        });

        Livewire.on('initialData', (locations) => {
            const locationIds = JSON.parse(locations).map(String);
            map.on('load', function() {
                map.loadImage('https://cdn-icons-png.flaticon.com/512/3448/3448558.png', function(error, image) {
                    if (error) throw error;

                    map.addImage('custom-marker', image);

                    map.on('click', 'points-layer', (e) => {
                        const address = e.features[0].properties.address;
                        const id = e.features[0].properties.id;
                        highlightLocation(id);
                    });

                    map.addLayer({
                        'id': 'points-layer',
                        'type': 'symbol',
                        'source': {
                            'type': 'vector',
                            'url': 'mapbox://elsenmedia.ckvsnxal129qg27qrclgdhekc-330dh'
                        },
                        'source-layer': 'efuelmap_v1',
                        'layout': {
                            'icon-image': [
                                'case',
                                ['in', ['to-string', ['get', 'id']],
                                    ['literal', locationIds]
                                ],
                                'custom-marker',
                                ''
                            ],
                            'icon-size': [
                                'case',
                                ['in', ['to-string', ['get', 'id']],
                                    ['literal', locationIds]
                                ],
                                0.1,
                                0
                            ],
                            'text-field': ['to-string', ['get', 'title']],
                            'text-size': 12,
                            'text-anchor': 'center',
                            'text-allow-overlap': true,
                            "text-offset": [
                                0,
                                3
                            ],
                        },
                        "paint": {
                            "text-color": "hsl(0, 0%, 0%)",
                            "icon-opacity": ["interpolate", ["linear"],
                                ["zoom"], 0, 1, 22, 1
                            ]
                        },
                    });
                });
            });
        });

        Livewire.on('geoJsonLocationOnMap', (newLocations) => {
            const newLocationIds = JSON.parse(newLocations).map(String);


            if (map.getLayer('points-layer')) {
                map.removeLayer('points-layer');
            }
            if (map.getSource('points-layer')) {
                map.removeSource('points-layer');
            }

            map.addLayer({
                'id': 'points-layer',
                'type': 'symbol',
                'source': {
                    'type': 'vector',
                    'url': 'mapbox://elsenmedia.ckvsnxal129qg27qrclgdhekc-330dh'
                },
                'source-layer': 'efuelmap_v1',
                'layout': {
                    'icon-image': [
                        'case',
                        ['in', ['to-string', ['get', 'id']],
                            ['literal', newLocationIds]
                        ],
                        'custom-marker',
                        ''
                    ],
                    'icon-size': [
                        'case',
                        ['in', ['to-string', ['get', 'id']],
                            ['literal', newLocationIds]
                        ],
                        0.1,
                        0
                    ],
                    'text-field': ['to-string', ['get', 'title']],
                    'text-size': 12,
                    'text-anchor': 'center',
                    'text-allow-overlap': true,
                    "text-offset": [
                        0,
                        3
                    ],
                },
                "paint": {
                    "text-color": "hsl(0, 0%, 0%)",
                    "icon-opacity": ["interpolate", ["linear"],
                        ["zoom"], 0, 1, 22, 1
                    ]
                },
            });


            console.log("Markers updated");
        });

        const popup = new mapboxgl.Popup({
            closeButton: false,
            closeOnClick: false,
            offset: [0, -20]

        });

        map.on('mousemove', 'points-layer', (e) => {
            const coordinates = e.features[0].geometry.coordinates.slice();
            const title = e.features[0].properties.name;
            const opening_start = e.features[0].properties.opening_start;
            const opening_end = e.features[0].properties.opening_end;
            const active = e.features[0].properties.active;



            const htmlContent = `
                    <div style="font-size: 14px; text-align: center;">
                    ${title}</br>
                    Open from ${opening_start} to ${opening_end}</br>
                </div>
                    `;

            popup.setLngLat(coordinates)
                .setHTML(htmlContent)
                .addTo(map);

            map.getCanvas().style.cursor = 'pointer';

        });

        map.on('mouseleave', 'points-layer', () => {
            popup.remove();
            map.getCanvas().style.cursor = '';
        });

        Livewire.on('openLocationOnMap', address => {
            const formattedAddress = encodeURIComponent(address);
            window.open(`https://www.google.com/maps/search/?api=1&query=${formattedAddress}`, '_blank');
        });

        function openGoogleMaps(address) {
            const formattedAddress = encodeURIComponent(address);
            window.open(`https://www.google.com/maps/search/?api=1&query=${formattedAddress}`, '_blank');
        }

        function highlightLocation(id) {

            var locationId = id;
            $wire.dispatch('highlightLocation', {
                locationId
            });

        }


        const centerMapButton = document.getElementById('centerMapButton');


        Livewire.on('showLocationOnMap', locationData => {
            const firstLocation = locationData[0];

            const latitude = firstLocation.latitude;
            const longitude = firstLocation.longitude;

            // console.log('Latitude:', latitude);
            // console.log('Longitude:', longitude);

            mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHBiYXozZm0wZ21vMnFwZHE4ZWc5Z2lzIn0.dJGBO1JOfota9KceLDgGJg';


            map.flyTo({
                center: [longitude, latitude],
                zoom: 15,
                essential: true
            });

        });

        Livewire.on('searchResultsUpdated', locationData => {
            const firstLocation = locationData[0];

            const latitude = firstLocation.latitude;
            const longitude = firstLocation.longitude;
            mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHBiYXozZm0wZ21vMnFwZHE4ZWc5Z2lzIn0.dJGBO1JOfota9KceLDgGJg'; // Remplace par ton propre token

            map.flyTo({
                center: [longitude, latitude],
                zoom: 15, 
                essential: true 
            });
        });


        function updateMobileSize() {
            console.log("et voila");
            if (window.innerWidth < 768) {
                $wire.dispatch('MobileMode');
            } else {
                $wire.dispatch('DesktopMode');
            }
        }

        window.addEventListener('resize', updateMobileSize);

        // Initial update on page load
        document.addEventListener('livewire:initialized', () => {
            updateMobileSize();
        })

        Livewire.on('getVisibleLocations', () => {
            // Retrieve the map's bounds
            var bounds = map.getBounds();

            // Get the coordinates of the current view's corners
            var ne = bounds.getNorthEast(); // North-east corner
            var sw = bounds.getSouthWest(); // South-west corner

            // Send the coordinates to Livewire
            $wire.dispatch('retrieveMapDatas', {
                northEastLat: ne.lat,
                northEastLng: ne.lng,
                southWestLat: sw.lat,
                southWestLng: sw.lng
            });
        });
    </script>
    @endscript

</div>