<div>
  <div id='map' style='position: absolute; z-index: 1; top: 0; left: 0; width: 100%; height: 100%;'></div>


  @script
  <script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHBiYXozZm0wZ21vMnFwZHE4ZWc5Z2lzIn0.dJGBO1JOfota9KceLDgGJg';
    const map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/elsenmedia/ckvso4s5p189k14pltjqo1rqo',
      center: [9.967627253948834, 53.573922489205195],
      zoom: 10
    });

    let activePopup = null; // Pour gérer le popup actif
    let lastCenter = map.getCenter(); // Stocke le centre initial de la carte
    const updateThreshold = 50; // Distance minimale pour considérer que la carte a "bougé"
    let currentCenter = map.getCenter(); // Stocke le centre courant de la carte

    map.on('load', function() {
      map.addSource('your-tileset-source', {
        'type': 'vector',
        'url': 'mapbox://elsenmedia.ckvsnxal129qg27qrclgdhekc-330dh'
      });

      map.loadImage('https://cdn-icons-png.flaticon.com/512/3448/3448558.png', function(error, image) {
        if (error) throw error;
        map.addImage('custom-marker', image);

        // Initialement, ajoutez toutes les features du tileset
        map.addLayer({
          'id': 'initial-locations-layer',
          'type': 'symbol',
          'source': 'your-tileset-source',
          'source-layer': 'efuelmap_v1',
          'layout': {
            'icon-image': 'custom-marker',
            'text-field': ['get', 'name'],
            'text-size': 0,
            'icon-size': 0,
          }
        });
        setTimeout(updateMarkersAndTable, 500);

        document.getElementById('searchAreaButton').addEventListener('click', function() {
          console.log("clicked");
          updateMarkersAndTable();

        });


        map.on('moveend', function() {
          currentCenter = map.getCenter(); // Obtenez le centre actuel de la carte

          // Calculer la distance entre l'ancien centre et le nouveau centre
          const distanceMoved = calculateDistance(lastCenter, [currentCenter.lng, currentCenter.lat]);

          // Si la distance est significative, mettez à jour les marqueurs
          if (distanceMoved > updateThreshold) {
            updateMarkersAndTable();
          }

        });

        function updateMarkersAndTable() {
          currentCenter = map.getCenter(); // Obtenez le centre actuel de la carte


          lastCenter = currentCenter; // Met à jour le dernier centre de la carte

          // Récupérer les features de la source vectorielle
          const features = map.querySourceFeatures('your-tileset-source', {
            sourceLayer: 'efuelmap_v1'
          });

          // Calculer la distance de chaque feature par rapport au nouveau centre de la carte
          features.forEach(feature => {
            const coordinates = feature.geometry.coordinates;
            feature.properties.distance = calculateDistance(currentCenter, coordinates);
          });

          // Trier les features par distance croissante
          features.sort((a, b) => a.properties.distance - b.properties.distance);

          // Ne prendre que les 20 premières features les plus proches
          const closestFeatures = features.slice(0, 20);

          // Mettre à jour les marqueurs sur la carte
          updateMarkers(closestFeatures);

          // Mettre à jour le tableau HTML
          updateTable(closestFeatures);

        };


        function updateTable(closestFeatures) {
          const tableBody = document.querySelector("#locationsTable tbody");
          tableBody.innerHTML = ''; // Réinitialiser le tableau
          const template = document.getElementById('locationRowTemplate');

          closestFeatures.forEach(feature => {
            const clone = document.importNode(template.content, true);

            // Récupérer les données spécifiques
            const name = feature.properties.name || "N/A";
            const address = feature.properties.address || "N/A";
            const tenant = feature.properties.tenant || "N/A";
            const opening_start = feature.properties.opening_start || "00:00";
            const opening_end = feature.properties.opening_end || "23:59";

            // Injecter le nom
            clone.querySelector('.location-name').textContent = name;
            clone.querySelector('.location-tenant').textContent = tenant;

            // Vérifier si le lieu est ouvert
            const isOpen = isLocationOpen(opening_start, opening_end);

            // Injecter le statut d'ouverture
            const statusSvg = clone.querySelector('.location-status');
            statusSvg.setAttribute('fill', isOpen ? 'rgb(0, 160, 0)' : 'red');

            // Ajouter un événement pour zoomer et afficher un popup lors du clic sur la ligne
            clone.querySelector('tr').addEventListener('click', function() {
              const coordinates = feature.geometry.coordinates;
              flyToLocation(coordinates, name, opening_start, opening_end);
            });

            // Ajouter la ligne clonée au tableau
            tableBody.appendChild(clone);
          });
        }

        // Fonction pour mettre à jour les marqueurs sur la carte
        function updateMarkers(closestFeatures) {
          // Supprimer la couche existante si elle existe déjà
          if (map.getLayer('locations-layer')) {
            map.removeLayer('locations-layer');
            map.removeSource('closest-features');
          }

          // Créer une nouvelle source avec les 20 features les plus proches
          map.addSource('closest-features', {
            'type': 'geojson',
            'data': {
              'type': 'FeatureCollection',
              'features': closestFeatures
            }
          });

          // Ajouter une nouvelle couche pour ces features
          map.addLayer({
            'id': 'locations-layer',
            'type': 'symbol',
            'source': 'closest-features',
            'layout': {
              'icon-image': 'custom-marker',
              'text-field': ['get', 'name'],
              'text-size': 0.4,
              'icon-size': [
                'interpolate', ['linear'],
                ['zoom'],
                0, 0.1,
                22, 0.1
              ],
            }
          });
        }

        // Ajouter un popup lorsqu'on passe la souris sur un marqueur
        map.on('mouseenter', 'locations-layer', function(e) {
          if (activePopup) activePopup.remove(); // Supprimer le popup actif

          const coordinates = e.features[0].geometry.coordinates.slice();
          const name = e.features[0].properties.name;
          const opening_start = e.features[0].properties.opening_start || "00:00";
          const opening_end = e.features[0].properties.opening_end || "23:59";

          // Créer le contenu HTML du popup
          const popupContent = `
              <div style="text-align: center;">
                  <div style="font-size: 14px; font-weight: bold;">${name}</div>
                  <div style="margin-top: 5px;">Open from ${opening_start} to ${opening_end}</div>
              </div>
          `;

          // Afficher un popup au survol avec le contenu personnalisé
          activePopup = new mapboxgl.Popup({
              closeButton: false,
              closeOnClick: false
            })
            .setLngLat(coordinates)
            .setHTML(popupContent) // Utiliser setHTML au lieu de setText pour permettre le HTML
            .addTo(map);

          map.getCanvas().style.cursor = 'pointer';
        });
        // Supprimer le popup lorsque la souris quitte le marqueur
        map.on('mouseleave', 'locations-layer', function() {
          if (activePopup) {
            activePopup.remove();
            activePopup = null;
            map.getCanvas().style.cursor = '';
          }
        });

        // Afficher un popup et zoomer sur une location spécifique
        function flyToLocation(coordinates, name, opening_start, opening_end) {

          map.flyTo({
            center: coordinates,
            zoom: 14
          });

          if (activePopup) activePopup.remove();

          // Créer le contenu du popup
          const popupContent = `
           <div style="text-align: center;">
                  <div style="font-size: 14px; font-weight: bold;">${name}</div>
                  <div style="margin-top: 5px;">Open from ${opening_start} to ${opening_end}</div>
              </div>
            `;

          activePopup = new mapboxgl.Popup({
              closeButton: true,
              closeOnClick: false
            })
            .setLngLat(coordinates)
            .setHTML(popupContent) // Utiliser setHTML au lieu de setText pour permettre le HTML
            .addTo(map);
        }
        // Masquer le popup si on clique ailleurs sur la carte
        map.on('click', function(e) {
          if (activePopup) {
            const features = map.queryRenderedFeatures(e.point, {
              layers: ['locations-layer']
            });

            if (!features.length) {
              activePopup.remove();
              activePopup = null;
            }
          }
        });
        map.on('click', 'locations-layer', function(e) {
          const clickedFeature = e.features[0]; // Récupérer la feature cliquée
          const coordinates = clickedFeature.geometry.coordinates;
          const name = clickedFeature.properties.name;
          const opening_start = e.features[0].properties.opening_start || "00:00";
          const opening_end = e.features[0].properties.opening_end || "23:59";


          // Zoomer sur l'emplacement et afficher un popup
          flyToLocation(coordinates, name, opening_start, opening_end);

          // Faire remonter la ligne correspondante en haut du tableau
          moveRowToTop(clickedFeature.properties.name);
        });

      });

    });

    // Fonction pour calculer la distance entre deux points
    function calculateDistance(center, coordinates) {
      return turf.distance(
        turf.point([center.lng, center.lat]),
        turf.point(coordinates)
      );
    }

    // Recherche dans le tileset
    function searchInTileset(query) {
      map.setFilter('initial-locations-layer', null); // Réinitialiser le filtre pour afficher tous les marqueurs

      const features = map.queryRenderedFeatures({
        layers: ['initial-locations-layer']
      });

      const matchingFeatures = features.filter(feature => feature.properties.name === query);

      if (matchingFeatures.length > 0) {
        const coordinates = matchingFeatures[0].geometry.coordinates;
        flyToLocation(coordinates, feature.properties.name, feature.properties.opening_start, feature.properties.opening_end); // Utiliser flyToLocation pour afficher un popup
      } else {
        alert("Location not found");
      }
    }

    function isLocationOpen(opening_start, opening_end) {
      const currentTime = new Date(); // Obtenir l'heure actuelle
      const currentHours = currentTime.getHours().toString().padStart(2, '0'); // Heures actuelles avec zéro-padding
      const currentMinutes = currentTime.getMinutes().toString().padStart(2, '0'); // Minutes actuelles avec zéro-padding

      const currentTimeString = `${currentHours}:${currentMinutes}`;

      return currentTimeString >= opening_start && currentTimeString <= opening_end;
    }

    document.getElementById('searchBar').addEventListener('keypress', function(e) {
      if (e.key === 'Enter') {
        searchInTileset(e.target.value);
      }
    });

    function moveRowToTop(locationName) {
      const tableBody = document.querySelector("#locationsTable tbody");
      const rows = Array.from(tableBody.querySelectorAll('tr'));

      // Trouver la ligne qui correspond au nom de la location cliquée
      const targetRow = rows.find(row => row.querySelector('.location-name').textContent === locationName);

      if (targetRow) {
        // Enlever la classe 'highlight' de toutes les autres lignes
        rows.forEach(row => row.classList.remove('highlight'));

        // Ajouter la classe 'highlight' pour mettre en surbrillance la ligne
        targetRow.classList.add('highlight');

        // Déplacer la ligne correspondante en haut du tableau
        tableBody.insertBefore(targetRow, tableBody.firstChild);


      }
    }
  </script>
  @endscript

</div>