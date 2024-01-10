<div>
  <div id='map' style='width: 100vw; height: 80vh;'></div>

  <style>
  .mapboxgl-popup {
    max-width: 400px;
  }

  .mapboxgl-popup-close-button {
    padding-right: 6px;
    padding-left: 6px;
    background: lightgrey;
  }

  .mapboxgl-popup-content {

  }

  #map {  top: 0; bottom: 0; width: 100%; }

  </style>



  <script>

  mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJja3ZlYW9iZHQwcXJpMm9vMHp6YXl2dHFhIn0.FqjCjUzMT0v_HsVw2bSxbw';
  const accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJja3ZlYW9iZHQwcXJpMm9vMHp6YXl2dHFhIn0.FqjCjUzMT0v_HsVw2bSxbw';

  const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/elsenmedia/ckvso4s5p189k14pltjqo1rqo',
    center: [9.992591243148613, 53.55074245291469],
    zoom: 12,
    tolerance: 0
  });



  // geocoder

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
      `<h3><b>${feature.properties.title}</b></h3>
        <p>${feature.properties.street}, ${feature.properties.zip}, ${feature.properties.city} </p>
      <p><b>Type</b>: ${feature.properties.type}</p>
      <p><b>Company</b>: ${feature.properties.tenant}</p>
      <p><b>Info</b>: ${feature.properties.description}</p>


      <button
      onclick="window.open('https://www.google.com/maps/dir/?api=1&destination=  ${feature.properties.street} + ${feature.properties.zip} + ${feature.properties.city} + &travelmode=driving', '_blank')"
      type="button" class="mt-2 inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Route
      </button>

      `
    )
    .addTo(map);

  });



  </script>
</div>
