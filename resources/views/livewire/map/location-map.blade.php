<div>

  <div id='map' class="w-full" style='height: 75vh;'></div>
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


    map.on('load', function() {
      map.loadImage('https://cdn-icons-png.flaticon.com/512/3448/3448558.png', function(error, image) {
        if (error) throw error;

        map.addImage('custom-marker', image);

        map.on('click', 'points-layer', (e) => {
          const address = e.features[0].properties.address;
          openGoogleMaps(address);
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
            'icon-image': 'custom-marker',
            'icon-size': 0.1,
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
            "icon-opacity": [
              "interpolate",
              [
                "linear"
              ],
              [
                "zoom"
              ],
              0,
              1,
              22,
              1
            ]
          },
        });
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


        const htmlContent = `
        <div style="font-size: 14px; text-align: center;">
          ${title}</br>
          Open from ${opening_start} to ${opening_end}</br>
          Click on marker to show route
       </div>
        `;

        popup.setLngLat(coordinates)
          .setHTML(htmlContent)
          .addTo(map);

        // Changement du curseur
        map.getCanvas().style.cursor = 'pointer';

      });

      map.on('mouseleave', 'points-layer', () => {
        popup.remove();
        map.getCanvas().style.cursor = '';
      });
    });

    function openGoogleMaps(address) {
      const formattedAddress = encodeURIComponent(address);
      window.open(`https://www.google.com/maps/search/?api=1&query=${formattedAddress}`, '_blank');
    }


    const centerMapButton = document.getElementById('centerMapButton');

    if (centerMapButton) {
      centerMapButton.addEventListener('click', () => {
        Livewire.on('showLocationOnMap', locationData => {
          const latitude = locationData.latitude;
          const longitude = locationData.longitude;

          mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHBiYXozZm0wZ21vMnFwZHE4ZWc5Z2lzIn0.dJGBO1JOfota9KceLDgGJg';

          map.flyTo({
            center: [longitude, latitude],
            zoom: 12,
            essential: true
          });
        });
      });
    }

    document.addEventListener('livewire:load', () => {
      Livewire.on('showLocationOnMap', locationData => {
        const latitude = locationData.latitude;
        const longitude = locationData.longitude;

        mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHBiYXozZm0wZ21vMnFwZHE4ZWc5Z2lzIn0.dJGBO1JOfota9KceLDgGJg';

        map.flyTo({
          center: [longitude, latitude],
          zoom: 12,
          essential: true
        });
      });
    });
  </script>
</div>