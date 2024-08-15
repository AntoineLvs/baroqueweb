<div>
  <div id='map' class="" style='height: 90vh'></div>

  <!-- here there is a div 'map', with a special height, then we say in the script underneath, that we push the map in there. 
 In this script, we initialize everything that is need to work, tokens, informations... 
 We apply a layer above the map, where we take all the locations from the Tileset of Mapbox, and put marker on their locations.
 We also create a tooltip with some informations to show. 
 we are above Hamburg at start. If we select a location,
 it will zoom on it, by retrieving the lat/lng of it, to zoom on it.  -->

  <script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHBiYXozZm0wZ21vMnFwZHE4ZWc5Z2lzIn0.dJGBO1JOfota9KceLDgGJg';

    var map = new mapboxgl.Map({
      container: 'map', // container id
      style: 'mapbox://styles/elsenmedia/ckvso4s5p189k14pltjqo1rqo',
      center: [9.95864, 53.57331], // starting position
      zoom: 11 // starting zoom
    });

    document.addEventListener('DOMContentLoaded', function() {
      Livewire.on('initialData', (locations) => {
        console.log("initialData svpppppppp", locations);
        var locationIds = JSON.parse(locations);

        var geojson = {
          "type": "FeatureCollection",
          "features": locationIds.map(location => ({
            "type": "Feature",
            "geometry": {
              "type": "Point",
              "coordinates": [location.lng, location.lat]
            },
            "properties": {
              "title": location.name
            }
          }))
        };

        map.on('load', function() {
          map.loadImage('https://cdn-icons-png.flaticon.com/512/3448/3448558.png', function(error, image) {
            if (error) throw error;
            map.addImage('custom-marker', image);

            map.addLayer({
              "id": "data-update",
              "type": "symbol",
              "source": {
                "type": "geojson",
                "data": geojson // your dynamically created variable
              },
              "layout": {
                "icon-image": 'custom-marker',
                "icon-size": 0.1,
                "icon-allow-overlap": true
              }
            });

            geojson.features.forEach(function(marker) {
              var el = document.createElement('div');
              el.className = 'marker';

              new mapboxgl.Marker(el)
                .setLngLat(marker.geometry.coordinates)
                .setPopup(new mapboxgl.Popup({
                    offset: 25
                  }) // add popups
                  .setText(marker.properties.title))
                .addTo(map);
            });
          });
        });
      });

      Livewire.on('geoJsonLocationOnMap', (newLocations) => {


        console.log("téma mon reuf", newLocations);

        var newLocationIds = JSON.parse(newLocations);
        console.log('newlocationIds', newLocationIds);

        var geojson2 = {
          "type": "FeatureCollection",
          "features": newLocationIds.map(location => ({
            "type": "Feature",
            "geometry": {
              "type": "Point",
              "coordinates": [location.lng, location.lat]
            },
            "properties": {
              "title": location.name // Utiliser le name ici
            }
          }))
        };

        if (map.getLayer('data-update')) {
          map.removeLayer('data-update');
        }
        if (map.getSource('data-update')) {
          map.removeSource('data-update');
        }

        map.addLayer({
          "id": "data-update",
          "type": "symbol",
          "source": {
            "type": "geojson",
            "data": geojson2 // your dynamically created variable
          },
          "layout": {
            "icon-image": 'custom-marker',
            "icon-size": 0.1,
            "icon-allow-overlap": true
          }
        });

        geojson2.features.forEach(function(marker) {
          var el = document.createElement('div');
          el.className = 'marker';

          new mapboxgl.Marker(el)
            .setLngLat(marker.geometry.coordinates)
            .setPopup(new mapboxgl.Popup({
                offset: 25
              }) // add popups
              .setText(marker.properties.title))
            .addTo(map);
        });

        console.log("Markers updated");
      });

      function openGoogleMaps(address) {
        const formattedAddress = encodeURIComponent(address);
        window.open(`https://www.google.com/maps/search/?api=1&query=${formattedAddress}`, '_blank');
      }

      const centerMapButton = document.getElementById('centerMapButton');

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
  </script>

</div>