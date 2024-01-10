<div>
  <div id='map' style='width: 100vw; height: 50vh;'></div>
  <script>

  mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJja3ZlYW9iZHQwcXJpMm9vMHp6YXl2dHFhIn0.FqjCjUzMT0v_HsVw2bSxbw';
  const accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJja3ZlYW9iZHQwcXJpMm9vMHp6YXl2dHFhIn0.FqjCjUzMT0v_HsVw2bSxbw';

  const map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/elsenmedia/ckvso4s5p189k14pltjqo1rqo',
  center: [9.992591243148613, 53.55074245291469],
  zoom: 12
});


// geocder

const geocoder = new MapboxGeocoder({
  // Initialize the geocoder
  accessToken: mapboxgl.accessToken, // Set the access token
  mapboxgl: mapboxgl, // Set the mapbox-gl instance
  marker: false // Do not use the default marker style
});

// Add the geocoder to the map

  map.addControl(geocoder, 'top-left'); // Add the search box to the top left


  map.on('click', (event) => {
  const features = map.queryRenderedFeatures(event.point, {
  layers: ['efuelmap-v1']
  });
  if (!features.length) {
  return;
  }
  const feature = features[0];

  const popup = new mapboxgl.Popup({ offset: [0, -15] })
  .setLngLat(feature.geometry.coordinates)
  .setHTML(
  `<h3>${feature.properties.title}</h3>
  `
  )
  .addTo(map);
  });




  // After the map style has loaded on the page,
// add a source layer and default styling for a single point
map.on('load', () => {
  map.addSource('single-point', {
    type: 'geojson',
    data: {
      type: 'FeatureCollection',
      features: []
    }
  });

  map.addLayer({
    id: 'point',
    source: 'single-point',
    type: 'circle',
    paint: {
      'circle-radius': 10,
      'circle-color': '#448ee4'
    }
  });

  // Listen for the `result` event from the Geocoder
  // `result` event is triggered when a user makes a selection
  //  Add a marker at the result's coordinates
  geocoder.on('result', (event) => {
    map.getSource('single-point').setData(event.result.geometry);
  });



});



  </script>
</div>
