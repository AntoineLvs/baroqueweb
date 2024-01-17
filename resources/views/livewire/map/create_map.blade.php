<div>
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <div class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            <h3 class="text-lg font-medium leading-6 text-gray-900"> Precise your longitude and latitude </h3>
            <p class="mt-1 text-sm text-gray-600">
                Drag the marker to the precise place that you want it to be.
            </p>
            <div id="coordinates"></div>
        </div>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="mt-1 sm:mt-0 sm:col-span-2">
                <div id='map' class="w-full" style='height: 50vh;'></div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('toggleMap', locationData => {
                mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHBiYXozZm0wZ21vMnFwZHE4ZWc5Z2lzIn0.dJGBO1JOfota9KceLDgGJg';

                const latInputElement = document.getElementById('lat');
                const lat = parseFloat(latInputElement.value); 
                const lngInputElement = document.getElementById('lng');
                const lng = parseFloat(lngInputElement.value);  

                let marker;
                const map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/elsenmedia/ckvso4s5p189k14pltjqo1rqo',
                    zoom: 12
                });

                // Ajout du délai avant le chargement de la carte

                map.on('load', function() {
                    map.setCenter([lng, lat]);

                    marker = new mapboxgl.Marker()
                        .setLngLat([lng, lat])
                        .addTo(map);

                    // Detect start of the drag
                    marker.on('dragstart', () => {});
                    // Detect continuous movement of the drag
                    marker.on('drag', () => {});
                    // Detect end of the drag
                    marker.on('dragend', () => {
                        const newLngLat = marker.getLngLat();

                        lngInput.value = newLngLat.lng.toFixed(6);
                        latInput.value = newLngLat.lat.toFixed(6);
                    });

                    marker.setDraggable(true);

                    const lngInput = document.getElementById('lng');
                    const latInput = document.getElementById('lat');

                    lngInput.value = lng.toFixed(6);
                    latInput.value = lat.toFixed(6);
                });

            });
        });
    </script>

</div>