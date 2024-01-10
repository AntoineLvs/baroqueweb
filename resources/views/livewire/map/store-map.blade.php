<div>


    <div id='map' style='width: 100vw; height: 50vh;'></div>
  <style>
  * {
    box-sizing: border-box;
  }

  body {
    color: #404040;
    font: 400 15px/22px 'Source Sans Pro', 'Helvetica Neue', sans-serif;
    margin: 0;
    padding: 0;
    -webkit-font-smoothing: antialiased;
  }

  h1 {
    font-size: 22px;
    margin: 0;
    font-weight: 400;
    line-height: 20px;
    padding: 20px 2px;
  }

  a {
    color: #404040;
    text-decoration: none;
  }

  a:hover {
    color: #101010;
  }

  /* The page is split between map and sidebar - the sidebar gets 1/3, map
  gets 2/3 of the page. You can adjust this to your personal liking. */
  .sidebar {
    position: absolute;
    width: 33.3333%;
    height: 100%;
    top: 0;
    left: 0;
    overflow: hidden;
    border-right: 1px solid rgba(0, 0, 0, 0.25);
  }

  .map {
    position: absolute;
    left: 33.3333%;
    width: 66.6666%;
    top: 0;
    bottom: 0;
  }

  .heading {
    background: #fff;
    border-bottom: 1px solid #eee;
    height: 60px;
    line-height: 60px;
    padding: 0 10px;
  }
</style>

<div class='sidebar'>
  <div class='heading'>
    <h1>Our locations</h1>
  </div>
  <div id='listings' class='listings'>



  </div>


</div>
<div id="map" class="map">

</div>




<!--
  <div id='map' style='width: 100vw; height: 50vh;'></div>
  <script>

  //mapboxgl.accessToken = 'sk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJja3ZubXMzbmgxYXE4MnJvdTRqYXR1YzM2In0.F2OJW7uFgP0WjFwTIXBPCA';

  mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbDZhcWx4bGIxYTh6M2RvOTV3Y2tteWJhIn0.bxsLxGQHW_7Vv9vVTlD8Rw';
  const accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbDZhcWx4bGIxYTh6M2RvOTV3Y2tteWJhIn0.bxsLxGQHW_7Vv9vVTlD8Rw';

  const map = new mapboxgl.Map({
    container: 'map', // The container ID
    style: 'mapbox://styles/mapbox/light-v10', // The map style to use
    center: [-105.0178157, 39.737925], // Starting position [lng, lat]
    zoom: 12 // Starting zoom level
  });

  map.on('load', () => {
    const geocoder = new MapboxGeocoder({
      // Initialize the geocoder
      accessToken: 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbDZhcWx4bGIxYTh6M2RvOTV3Y2tteWJhIn0.bxsLxGQHW_7Vv9vVTlD8Rw', // Set the access token
      mapboxgl: mapboxgl, // Set the mapbox-gl instance
      zoom: 13, // Set the zoom level for geocoding results
      placeholder: 'Adresse oder Namen eingeben', // This placeholder text will display in the search bar
      bbox: [-105.116, 39.679, -104.898, 39.837] // Set a bounding box
    });
    // Add the geocoder to the map
    map.addControl(geocoder, 'top-left'); // Add the search box to the top left



    const marker = new mapboxgl.Marker({ color: '#008000' }); // Create a new green marker

    geocoder.on('result', async (event) => {
      // When the geocoder returns a result
      const point = event.result.center; // Capture the result coordinates

      const tileset = 'elsenmedia.4cmvgjj3'; // replace this with the ID of the tileset you created
      const radius = 1609; // 1609 meters is roughly equal to one mile
      const limit = 50; // The maximum amount of results to return


      marker.setLngLat(point).addTo(map); // Add the marker to the map at the result coordinates


      const query = await fetch(
        `https://api.mapbox.com/v4/${tileset}/tilequery/${point[0]},${point[1]}.json?radius=${radius}&limit=${limit}&access_token=${accessToken}`,
        { method: 'GET' }
      );

      const json = await query.json();

      map.getSource('tilequery').setData(json);


    });

    map.addSource('tilequery', {
      // Add a new source to the map style: https://docs.mapbox.com/mapbox-gl-js/api/#map#addsource
      type: 'geojson',
      data: {
        type: 'FeatureCollection',
        features: []
      }
    });

    map.addLayer({
      // Add a new layer to the map style: https://docs.mapbox.com/mapbox-gl-js/api/#map#addlayer
      id: 'tilequery-points',
      type: 'circle',
      source: 'tilequery', // Set the layer source
      paint: {
        'circle-stroke-color': 'white',
        'circle-stroke-width': {
          // Set the stroke width of each circle: https://docs.mapbox.com/mapbox-gl-js/style-spec/#paint-circle-circle-stroke-width
          stops: [
            [0, 0.1],
            [18, 3]
          ],
          base: 5
        },
        'circle-radius': {
          // Set the radius of each circle, as well as its size at each zoom level: https://docs.mapbox.com/mapbox-gl-js/style-spec/#paint-circle-circle-radius
          stops: [
            [12, 5],
            [22, 180]
          ],
          base: 5
        },
        'circle-color': [
          // Specify the color each circle should be
          'match', // Use the 'match' expression: https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions-match
          ['get', 'STORE_TYPE'], // Use the result 'STORE_TYPE' property
          'Small Grocery Store',
          '#008000',
          'Supercenter',
          '#008000',
          'Superette',
          '#008000',
          'Supermarket',
          '#008000',
          'Warehouse Club Store',
          '#008000',
          'Specialty Food Store',
          '#9ACD32',
          'Convenience Store',
          '#FF8C00',
          'Convenience Store With Gas',
          '#FF8C00',
          'Pharmacy',
          '#FF8C00',
          '#FF0000' // any other store type
        ]
      }
    });

    const popup = new mapboxgl.Popup(); // Initialize a new popup

    map.on('mouseenter', 'tilequery-points', (event) => {
      map.getCanvas().style.cursor = 'pointer'; // When the cursor enters a feature, set it to a pointer
      const properties = event.features[0].properties;
      const obj = JSON.parse(properties.tilequery); // Get the feature's tilequery object (https://docs.mapbox.com/api/maps/#response-retrieve-features-from-vector-tiles)
        const coordinates = new mapboxgl.LngLat(
          properties.longitude,
          properties.latitude
        ); // Create a new LngLat object (https://docs.mapbox.com/mapbox-gl-js/api/#lnglatlike)

          const content = `<h3>${properties.STORE_NAME}</h3><h4>${
            properties.STORE_TYPE
          }</h4><p>${properties.ADDRESS_LINE1}</p><p>${(
            obj.distance / 1609.344
          ).toFixed(2)} mi. from location</p>`;

          popup
          .setLngLat(coordinates) // Set the popup at the given coordinates
          .setHTML(content) // Set the popup contents equal to the HTML elements you created
          .addTo(map); // Add the popup to the map
        });

        map.on('mouseleave', 'tilequery-points', () => {
          map.getCanvas().style.cursor = ''; // Reset the cursor when it leaves the point
          popup.remove(); // Remove the popup when the cursor leaves the point
        });

        // end of map load
      });




      </script>
    </div> -->


    <script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbDZhcWx4bGIxYTh6M2RvOTV3Y2tteWJhIn0.bxsLxGQHW_7Vv9vVTlD8Rw';
    const accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbDZhcWx4bGIxYTh6M2RvOTV3Y2tteWJhIn0.bxsLxGQHW_7Vv9vVTlD8Rw';

  const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/elsenmedia/cl6cqmcph000n14okhsnwgs0l',
    center: [-77.034084, 38.909671],
    zoom: 13,
    scrollZoom: true
    tolerance: 0
});
</script>


  </div>
