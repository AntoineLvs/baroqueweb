<div class="select-menu flex flex-col md:flex-row " style="margin-top:132px; margin-left: 20px;">

  <div style="z-index: 5; min-width: 400px;" class="w-full md:w-1/5 transition-all duration-2000 shadow rounded-t-md border-b border-gray-300 xl:rounded-l-md xl:border-r-0 xl:rounded-r-md xl:border-b-0 xl:border-t-0 bg-white">
    <div class="mx-auto mt-4 mr-4 ml-4">
      <div class="w-full flex flex-col items-center space-y-4">
        <div class="w-full">
          <div class="animated">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
              </div>
              <input id="searchBar" name="searchbox" placeholder="Search..." type="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
              <button id="resetButton" type="button" class="text-white absolute end-2.5 bottom-2.5 bg-indigo-600 hover:bg-indigo-700 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Reset</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <form class="max-w-md mx-auto">

    </form>

    <div class="mx-auto mb-4 mr-4 ml-6">
      <div class="flex items-center justify-between">
        <div class="mt-2">
          <div x-data="{ isHvo100: true, isHvoBlend: true }" class="flex items-center">
            <div>
              <button type="button"
                :class="isHvo100 ? 'bg-indigo-600 text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600' : 'bg-white text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50'"
                @click="isHvo100 = !isHvo100; updateMarkersAndTable()"
                class="rounded-full px-2.5 py-1 text-xs font-semibold shadow-sm">
                HVO 100
              </button>
            </div>
            <div class="ml-2">
              <button type="button"
                :class="isHvoBlend ? 'bg-indigo-600 text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600' : 'bg-white text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50'"
                @click="isHvoBlend = !isHvoBlend; updateMarkersAndTable()"
                class="rounded-full px-2.5 py-1 text-xs font-semibold shadow-sm">
                HVO Blend
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="flex items-center justify-start mr-4 ml-4">
            <label for="filter-is-open" class="mb-1 mr-2 text-gray-900">Show open Locations :</label>
            <input id="filter-is-open" wire:model.live="filters.is_open" type="checkbox" class="h-5 w-5 rounded ring-1 ring-inset ring-gray-300 text-indigo-600 focus:ring-indigo-600">
        </div> -->

    <div x-data="{ showResultClass: @entangle('showResultClass'), openHeight: '0px' }"
      x-init="$watch('showResultClass', value => {
        if (value) {
            // Delayed to ensure element is rendered before changing height
            setTimeout(() => {
                openHeight = '570px';
            }, 10);
        } else {
            openHeight = '0px';
        }
     })">
      <div x-show="showResultClass"
        x-transition:enter="transition-all ease-out duration-500"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-all ease-in duration-500"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="overflow-hidden"
        :style="{ height: openHeight }">
        <!-- 
                <div class="mx-auto mt-4 mb-4">
                    <div class="w-full flex flex-col items-center space-y-4 justify-center">
                        <button id="searchAreaButton" class="mx-auto bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded" type="button">Search in that area</button>
                    </div>
                </div> -->
        <div class="bg-gray-100">
          <div class="text-gray-600 text-sm  px-4 py-4 border-b-2 border-gray-300 text-left leading-4 tracking-wider cursor-pointer">
            <span class="ml-4">Current Search Results</span>
          </div>

        </div>
        <div class="table-container" id="tableContainer" style="overflow-y: scroll; height: 520px;">
          <table id="locationsTable" class="w-full">
            <tbody>
              <!-- Les lignes seront ajoutées ici dynamiquement -->
            </tbody>
          </table>

          <template id="locationRowTemplate">
            <tr class="tile-hover cursor-pointer">
              <td class="pr-2 py-4 whitespace-no-wrap border-b border-gray-300">
                <div class="flex items-center justify-between">
                  <div class="ml-2">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10">
                        <div class="image-container">
                          <a href="#" class="location-link">
                            <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-green location-img" src="/assets/img/hvo.png" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="ml-2">
                        <div class="text-sm text-gray-900 location-name">
                          <!-- Le nom de la location sera injecté ici -->
                        </div>
                        <div class="text-xs text-gray-500 location-tenant">
                          <!-- Le nom du tenant sera injecté ici -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              <td class="whitespace-no-wrap border-b border-gray-300">
                <div class="flex items-start justify-between">
                  <div class="flex flex-col items-center space-y-2 location-products">
                    <!-- Les badges des produits seront injectés ici -->
                  </div>
                </div>
              </td>
              <td class="whitespace-no-wrap border-b border-gray-300">
                <div class="flex ml-auto items-center">
                  <div class="flex items-center justify-end">
                    <div class="image-container">
                      <div class="flex items-center">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 ml-2 location-status" fill="red">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5h-3.25V5z" clip-rule="evenodd" />
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              <td class="py-4 whitespace-no-wrap text-right border-b border-gray-300 leading-5 font-medium">
                <button type="button" class="details-button">
                  <div class="image-container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    <span class="tooltip text-gray-500" style="z-index: 10; transform: translateX(-70%);">Show Details</span>
                  </div>
                </button>
              </td>
              <td class="py-4 whitespace-no-wrap text-right border-b border-gray-300 leading-5 font-medium">
                <button type="button" class="centerMapButtonMobile">
                  <div class="image-container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                    </svg>
                    <span class="tooltip text-gray-500" style="z-index: 10; transform: translateX(-90%);">Show on Map</span>
                  </div>
                </button>
              </td>
            </tr>
          </template>
        </div>
      </div>



      <div>
        <div class="w-full flex flex-col items-center justify-center">
          <button @click="showResultClass = !showResultClass" class="w-full mx-auto bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded flex items-center justify-between" type="button">
            <span>Show Results</span>
            @if($showResultClass)
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="text-white w-5 h-5" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
            </svg>
            @else
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="text-white w-5 h-5" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
            @endif
          </button>
        </div>
      </div>
    </div>

  </div>
  <div class="w-full transition-all duration-2000 bg-white">
    <div id='map' style='position: absolute; z-index: 1; top: 0; left: 0; width: 100%; height: 100%;'></div>

  </div>
  <style>
    .tile-hover:hover {
      background-color: #e5e7eb;
    }

    @media screen and (max-width: 768px) {
      .select-menu {
        margin-right: 20px;
      }
    }

    .highlight {
      background-color: #e5e7eb;
      /* Couleur de surbrillance */
      transition: background-color 0.5s ease;
    }
  </style>


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

          // Vérifier s'il y a un texte dans la barre de recherche
          const searchBar = document.getElementById('searchBar');
          const query = searchBar.value.trim(); // Obtenir et trim la valeur de la barre de recherche

          // Obtenir l'état des filtres HVO 100 et HVO Blend
          const isHvo100 = document.querySelector('[x-data]').__x.$data.isHvo100;
          const isHvoBlend = document.querySelector('[x-data]').__x.$data.isHvoBlend;

          let filteredFeatures = features;

          if (query.length > 0) {
            // Si une requête de recherche est présente, filtrer les features
            const lowerCaseQuery = query.toLowerCase();
            filteredFeatures = features.filter(feature => {
              const name = feature.properties.name || "";
              const tenantName = feature.properties.tenant || "";
              const address = feature.properties.address || "";

              return (
                name.toLowerCase().includes(lowerCaseQuery) ||
                tenantName.toLowerCase().includes(lowerCaseQuery) ||
                address.toLowerCase().includes(lowerCaseQuery)
              );
            });

            if (filteredFeatures.length === 0) {
              updateMarkers([]);
              updateTable([]);
            }
          }

          // Appliquer les filtres HVO 100 et HVO Blend
          filteredFeatures = filteredFeatures.filter(feature => {
            const productTypes = feature.properties.product_types || [];

            // Conditions pour filtrer selon les valeurs de isHvo100 et isHvoBlend
            if (isHvo100 && isHvoBlend) {
              // Les deux filtres sont activés, donc on recherche [1, 2]
              return productTypes.includes(1) && productTypes.includes(2);
            } else if (isHvo100) {
              // Seulement HVO 100 est activé
              return productTypes.includes(1);
            } else if (isHvoBlend) {
              // Seulement HVO Blend est activé
              return productTypes.includes(2);
            } else {
              // Aucun filtre activé, on accepte tout
              return true;
            }
          });

          if (filteredFeatures.length > 1) {
            // Si plusieurs résultats sont trouvés, centrer la carte pour inclure tous les emplacements
            const bounds = new mapboxgl.LngLatBounds();
            filteredFeatures.forEach(feature => {
              const coordinates = feature.geometry.coordinates;
              bounds.extend(coordinates);
            });
            map.fitBounds(bounds, {
              padding: 50,
              center: currentCenter
            });
          }

          // Mettre à jour les marqueurs sur la carte
          updateMarkers(filteredFeatures);

          // Mettre à jour le tableau HTML
          updateTable(filteredFeatures);
        }

        function updateTable(closestFeatures) {
          if (!closestFeatures || closestFeatures.length === 0) {
            const tableBody = document.querySelector("#locationsTable tbody");
            tableBody.innerHTML = '';
            const tr = document.createElement('tr');
            const td = document.createElement('td');
            td.textContent = 'No locations found';
            td.colSpan = 4;
            td.style.textAlign = 'center';
            td.style.paddingTop = '20px';
            tr.appendChild(td);
            tableBody.appendChild(tr);
            return;
          }

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



              const tableBody = document.querySelector("#locationsTable tbody");
              const rows = Array.from(tableBody.querySelectorAll('tr'));

              // Trouver la ligne qui correspond au nom de la location cliquée
              const targetRow = rows.find(row => row.querySelector('.location-name').textContent === name);
              // Enlever la classe 'highlight' de toutes les autres lignes
              rows.forEach(row => row.classList.remove('highlight'));

              // Ajouter la classe 'highlight' pour mettre en surbrillance la ligne
              targetRow.classList.add('highlight');

              // Déplacer la ligne correspondante en haut du tableau
            });

            // Ajouter la ligne clonée au tableau
            tableBody.appendChild(clone);
          });
        }

        // Fonction pour mettre à jour les marqueurs sur la carte
        function updateMarkers(closestFeatures) {

          if (closestFeatures.length === 0) {
            return;
          }
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
            .setHTML(popupContent)
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
          console.log("clickedFeature", clickedFeature);
        });

        function searchInTileset(query) {
          // Convertir la requête de recherche en minuscules pour la rendre insensible à la casse
          const lowerCaseQuery = query.toLowerCase();

          // Récupérer les features de la source vectorielle
          const features = map.querySourceFeatures('your-tileset-source', {
            sourceLayer: 'efuelmap_v1'
          });

          // Filtrer les features qui correspondent à la recherche dans le name, tenant_name ou address
          const filteredFeatures = features.filter(feature => {
            const name = feature.properties.name || "";
            const tenantName = feature.properties.tenant || "";
            const address = feature.properties.address || "";

            return (
              name.toLowerCase().includes(lowerCaseQuery) ||
              tenantName.toLowerCase().includes(lowerCaseQuery) ||
              address.toLowerCase().includes(lowerCaseQuery)
            );
          });

          if (filteredFeatures.length === 1) {
            // Si un seul résultat est trouvé, zoomer sur cet emplacement
            const coordinates = filteredFeatures[0].geometry.coordinates;
            const name = filteredFeatures[0].properties.name;
            const opening_start = filteredFeatures[0].properties.opening_start || "00:00";
            const opening_end = filteredFeatures[0].properties.opening_end || "23:59";
            flyToLocation(coordinates, name, opening_start, opening_end);
            moveRowToTop(name);
          } else if (filteredFeatures.length > 1) {
            // Si plusieurs résultats sont trouvés, centrer la carte pour inclure tous les emplacements
            const bounds = new mapboxgl.LngLatBounds();
            filteredFeatures.forEach(feature => {
              const coordinates = feature.geometry.coordinates;
              bounds.extend(coordinates);
            });
            map.fitBounds(bounds, {
              padding: 50
            });

            // Mettre en évidence les lignes correspondantes dans le tableau
            filteredFeatures.forEach(feature => {
              const name = feature.properties.name;
              moveRowToTop(name);
            });
          } else {
            updateMarkers([]);
            updateTable([]);
          }

          // Mettre à jour les marqueurs et le tableau avec les résultats filtrés
          updateMarkers(filteredFeatures);
          updateTable(filteredFeatures);
        }

        // Écouter l'événement 'keypress' sur la barre de recherche
        document.getElementById('searchBar').addEventListener('keypress', function(e) {
          if (e.key === 'Enter') {
            updateMarkersAndTable();
          }
        });
        document.getElementById('resetButton').addEventListener('click', function(e) {
          reset();
        });

        function reset() {
          document.getElementById('searchBar').value = '';
          updateMarkersAndTable();
        }
      });

    });

    // Fonction pour calculer la distance entre deux points
    function calculateDistance(center, coordinates) {
      return turf.distance(
        turf.point([center.lng, center.lat]),
        turf.point(coordinates)
      );
    }



    function isLocationOpen(opening_start, opening_end) {
      const currentTime = new Date(); // Obtenir l'heure actuelle
      const currentHours = currentTime.getHours().toString().padStart(2, '0'); // Heures actuelles avec zéro-padding
      const currentMinutes = currentTime.getMinutes().toString().padStart(2, '0'); // Minutes actuelles avec zéro-padding

      const currentTimeString = `${currentHours}:${currentMinutes}`;

      return currentTimeString >= opening_start && currentTimeString <= opening_end;
    }


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




    var TxtRotate = function(el, toRotate, period) {
      this.toRotate = toRotate;
      this.el = el;
      this.loopNum = 0;
      this.period = parseInt(period, 10) || 2000;
      this.txt = '';
      this.tick();
      this.isDeleting = false;
    };

    TxtRotate.prototype.tick = function() {
      var i = this.loopNum % this.toRotate.length;
      var fullTxt = this.toRotate[i];

      if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
      } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
      }

      this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

      var that = this;
      var delta = 300 - Math.random() * 100;

      if (this.isDeleting) {
        delta /= 2;
      }

      if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
      } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
      }

      setTimeout(function() {
        that.tick();
      }, delta);
    };

    window.onload = function() {
      var elements = document.getElementsByClassName('txt-rotate');
      for (var i = 0; i < elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-rotate');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
          new TxtRotate(elements[i], JSON.parse(toRotate), period);
        }
      }
      // INJECT CSS
      var css = document.createElement("style");
      css.type = "text/css";
      css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
      document.body.appendChild(css);
    };

    const texts = ['Search for a name...', 'Search for a city...', 'Search for a product...', 'Search for a service...', 'Search for a zipcode...'];
    const input = document.querySelector('#searchBar');
    const animationWorker = function(input, texts) {
      this.input = input;
      this.defaultPlaceholder = this.input.getAttribute('placeholder');
      this.texts = texts;
      this.curTextNum = 0;
      this.curPlaceholder = '';
      this.blinkCounter = 0;
      this.animationFrameId = 0;
      this.animationActive = false;
      this.input.setAttribute('placeholder', this.curPlaceholder);

      this.switch = (timeout) => {
        this.input.classList.add('imitatefocus');
        setTimeout(
          () => {
            this.input.classList.remove('imitatefocus');
            if (this.curTextNum == 0)
              this.input.setAttribute('placeholder', this.defaultPlaceholder);
            else
              this.input.setAttribute('placeholder', this.curPlaceholder);

            setTimeout(
              () => {
                this.input.setAttribute('placeholder', this.curPlaceholder);
                if (this.animationActive)
                  this.animationFrameId = window.requestAnimationFrame(this.animate)
              },
              timeout);
          },
          timeout);
      }

      this.animate = () => {
        if (!this.animationActive) return;
        let curPlaceholderFullText = this.texts[this.curTextNum];
        let timeout = 500;
        if (this.curPlaceholder == curPlaceholderFullText + '|' && this.blinkCounter == 3) {
          this.blinkCounter = 0;
          this.curTextNum = (this.curTextNum >= this.texts.length - 1) ? 0 : this.curTextNum + 1;
          this.curPlaceholder = '|';
          this.switch(500);
          return;
        } else if (this.curPlaceholder == curPlaceholderFullText + '|' && this.blinkCounter < 3) {
          this.curPlaceholder = curPlaceholderFullText;
          this.blinkCounter++;
        } else if (this.curPlaceholder == curPlaceholderFullText && this.blinkCounter < 3) {
          this.curPlaceholder = this.curPlaceholder + '|';
        } else {
          this.curPlaceholder = curPlaceholderFullText
            .split('')
            .slice(0, this.curPlaceholder.length + 1)
            .join('') + '|';
          timeout = 150;
        }
        this.input.setAttribute('placeholder', this.curPlaceholder);
        setTimeout(
          () => {
            if (this.animationActive) this.animationFrameId = window.requestAnimationFrame(this.animate)
          },
          timeout);
      }

      this.stop = () => {
        this.animationActive = false;
        window.cancelAnimationFrame(this.animationFrameId);
      }

      this.start = () => {
        this.animationActive = true;
        this.animationFrameId = window.requestAnimationFrame(this.animate);
        return this;
      }
    }

    let aw = new animationWorker(input, texts).start();
    input.addEventListener("focus", (e) => aw.stop());
    input.addEventListener("blur", (e) => {
      aw = new animationWorker(input, texts);
      if (e.target.value == '') setTimeout(aw.start, 1000);
    });
  </script>
  @endscript

</div>