<div>
  <div id='map' style='width: 100vw; height: 50vh;'></div>
  <script>

  mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJja3ZlYW9iZHQwcXJpMm9vMHp6YXl2dHFhIn0.FqjCjUzMT0v_HsVw2bSxbw';
  const accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJja3ZlYW9iZHQwcXJpMm9vMHp6YXl2dHFhIn0.FqjCjUzMT0v_HsVw2bSxbw';

  const map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/elsenmedia/ckvp682mt38x114mm79uu2nkn',
  center: [-87.661557, 41.893748],
  zoom: 10.7
});

  map.on('click', (event) => {
  const features = map.queryRenderedFeatures(event.point, {
  layers: ['chicago-parks']
  });
  if (!features.length) {
  return;
  }
  const feature = features[0];

  const popup = new mapboxgl.Popup({ offset: [0, -15] })
  .setLngLat(feature.geometry.coordinates)
  .setHTML(
  `<h3>${feature.properties.title}</h3>
   <p>${feature.properties.description}</p>`
  )
  .addTo(map);
  });
  </script>
</div>
