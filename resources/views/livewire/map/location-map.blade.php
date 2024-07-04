<div>
  <div id='map' class="" style='height: 90vh'></div>
  <div hidden id='initialData'> {{ $locations }}</div>

  <!-- here there is a div 'map', with a special height, then we say in the script underneath, that we push the map in there. 
 In this script, we initialize everything that is need to work, tokens, informations... 
 We apply a layer above the map, where we take all the locations from the Tileset of Mapbox, and put marker on their locations.
 We also create a tooltip with some informations to show. 
 we are above Hamburg at start. If we select a location,
 it will zoom on it, by retrieving the lat/lng of it, to zoom on it.  -->

  <script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHBiYXozZm0wZ21vMnFwZHE4ZWc5Z2lzIn0.dJGBO1JOfota9KceLDgGJg';

    const map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/elsenmedia/ckvso4s5p189k14pltjqo1rqo',
      center: [9.967627253948834, 53.573922489205195],
      zoom: 10
    });

    const initialData = document.getElementById('initialData').innerHTML;
    const locationIds = initialData;

    console.log(initialData + locationIds);

    map.on('load', function() {
      map.loadImage('https://cdn-icons-png.flaticon.com/512/3448/3448558.png', function(error, image) {
        if (error) throw error;
        map.addImage('custom-marker', image);

        // Initial load with default filter values
        addLayer([4, 5]);

        map.on('click', 'points-layer', (e) => {
          const address = e.features[0].properties.address;
          openGoogleMaps(address);
        });
      });
    });

    function addLayer(locationIds) {
      // Remove existing layer and source if they exist
      if (map.getLayer('points-layer')) {
        map.removeLayer('points-layer');
      }
      if (map.getSource('points-source')) {
        map.removeSource('points-source');
      }

      map.addSource('points-source', {
        'type': 'vector',
        'url': 'mapbox://elsenmedia.ckvsnxal129qg27qrclgdhekc-330dh'
      });

      const filterExpression = ['in', 'id'].concat(locationIds);
      map.addLayer({
        'id': 'points-layer',
        'type': 'symbol',
        'source': 'points-source',
        'source-layer': 'efuelmap_v1',
        'filter': filterExpression,
        'layout': {
          'icon-image': [
            'case',
            filterExpression,
            'custom-marker',
            ''
          ],
          'icon-size': [
            'case',
            filterExpression,
            0.1,
            0
          ],
          'text-field': ['to-string', ['get', 'title']],
          'text-size': 12,
          'text-anchor': 'center',
          'text-allow-overlap': true,
          "text-offset": [0, 3]
        },
        "paint": {
          "text-color": "hsl(0, 0%, 0%)",
          "icon-opacity": ["interpolate", ["linear"],
            ["zoom"], 0, 1, 22, 1
          ]
        }
      });
    }

    function openGoogleMaps(address) {
      const formattedAddress = encodeURIComponent(address);
      window.open(`https://www.google.com/maps/search/?api=1&query=${formattedAddress}`, '_blank');
    }
    const popup = new mapboxgl.Popup({
      closeButton: false,
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
        Click on marker to show route </br>
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

    function openGoogleMaps(address) {
      const formattedAddress = encodeURIComponent(address);
      window.open(`https://www.google.com/maps/search/?api=1&query=${formattedAddress}`, '_blank');
    }


    // Listen for Livewire events to update the layer with new filter values
    document.addEventListener('DOMContentLoaded', function() {
      Livewire.on('recoistp', (locationIds) => {
        console.log(locationIds);

        addLayer(locationIds);
      });
    });
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
    });

    document.addEventListener('DOMContentLoaded', function() {
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
  </script>

</div>