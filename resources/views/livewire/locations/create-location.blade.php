<!-- 
    We have in this form some wire:model.live stuff going on. First, the three inputs for address/zip/city are under listening. If they are all three filled up, 
    it allows the user to click the "GetCoordinates" function. It will make a call to the api with the informations (address/zip/city), and put in the lat/lng inputs the right data.
    If the lat/lng inputs are filled up, it allows the user to click to Toggle the Map div, which will make a map appears in the "map" div.
 -->

<div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
    <div class="py-4">
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">


            <div class="px-4 py-5 sm:px-6">
                <h3 class="card-title">Location Details</h3>
                <!-- We use less vertical padding on card headers on desktop than on body sections -->
            </div>


            <div class="px-4 py-5 sm:p-6">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div>

                        <form method="post" action="{{ route('locations.store') }}" autocomplete="off">
                            @csrf


                            <div>
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    General Informations
                                </h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                    Provide some general informations about your location.
                                </p>
                            </div>

                            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Name
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <input id="name" name="name" type="text" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="description" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Description (max. 120 chars)
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <input id="description" name="description" type="text" maxlength="120" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"></div>

                            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                <div class="md:grid md:grid-cols-3 md:gap-6">
                                    <div class="md:col-span-1">
                                        <div class="px-4 sm:px-0">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900">Geographic Information</h3>
                                            <p class="mt-1 text-sm text-gray-600">
                                                Provide Geographic Informations for this locations.<br>This can be used for the geotag at our efuel map.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="mt-5 md:mt-0 md:col-span-2">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                <label for="address" class="block text-sm font-medium text-gray-700">Street</label>
                                                <input wire:model.live="address" type="text" name="address" id="address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                @error('address') <span class="text-red-500">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                <label for="zipcode" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>
                                                <input wire:model.live="zipcode" type="text" id="zipcode" name="zipcode" autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                @error('zipcode') <span class="text-red-500">{{ $message }}</span> @enderror
                                            </div>


                                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                                <input wire:model.live="city" type="text" name="city" id="city" autocomplete="address-level2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                @error('city') <span class="text-red-500">{{ $message }}</span> @enderror
                                            </div>


                                        </div>

                                        <div class="grid grid-cols-6 gap-6 pt-5">

                                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                <label for="address" class="block text-sm font-medium text-gray-700 flex items-center">

                                                    Longitude (optional) /

                                                    @if(!$getCoordinatesButton)
                                                    <span class="text-gray-600 disabled:opacity-50 cursor-not-allowed">
                                                        Get Coordinates
                                                    </span>
                                                    @else

                                                    <span class="text-indigo-600 cursor-pointer" wire:click="getCoordinates">
                                                        Get Coordinates
                                                    </span>
                                                    @endif
                                                </label>
                                                <input wire:model.live="lng" type="text" name="lng" id="lng" autocomplete="lng" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                <label for="zipcode" class="block text-sm font-medium text-gray-700">Latitude (optional)</label>
                                                <input wire:model.live="lat" type="text" name="lat" id="lat" autocomplete="lat" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                <label for="coordinates" class="block text-sm font-medium text-gray-700 mb-3">Check your Marker</label>
                                                @if(!$toggleMapButton)
                                                <a wire:click.live="openMap" class="text-gray-700 hover:bg-gray-50 bg-gray-100 disabled:opacity-50 cursor-not-allowed py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Show on Map
                                                </a>
                                                @else
                                                <div>

                                                    <a wire:click="openMap" class="cursor-pointer bg-indigo-600 hover:bg-indigo-700 py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        Show on Map
                                                    </a>
                                                </div>

                                                @endif

                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
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
                                            <div id='map' class="w-full @if($toggleMapValue)  block @else hidden @endif " style='height: 50vh;'></div>

                                            <button disabled type="button" style='height: 20vh;' class=" @if($toggleMapValue) hidden @endif bg-gray-100 relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto h-12 w-12 text-gray-400">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
                                                </svg>

                                                <span class="mt-2 block text-sm font-semibold text-gray-500">The map should be displayed here</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <div class="px-4 sm:px-0">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900">Opening Informations</h3>
                                        <p class="mt-1 text-sm text-gray-600">
                                            Provide Opening Informations for this locations.<br>You can also write further informations<br>(We are close on Christmas Day).
                                        </p>
                                    </div>
                                    <div class="flex-col items-center">
                                        <div>
                                            <div>
                                                <div class="flex items-center">
                                                    <label for="allday" class="block text-sm font-medium leading-6 text-gray-900 mr-2">Open 24 Hours</label>
                                                </div>
                                                <div class="mt-2">
                                                    <!-- Ajoutez wire:click pour appeler la méthode toggleAllDay -->
                                                    <input id="allday" wire:model="allday" wire:click="toggleAllDay" aria-describedby="candidates-description" name="allday" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex mt-6">
                                            <div class="mr-4">
                                                <div class="flex items-center">
                                                    <label for="opening_start" class="block text-sm font-medium leading-6 text-gray-900 mr-2">Start</label>
                                                </div>
                                                <div class="mt-2">
                                                    <input type="time" wire:model="opening_start" name="opening_start" id="opening_start" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="06:00" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]">
                                                </div>
                                            </div>
                                            <div class="mr-4 mt-6">
                                                --
                                            </div>
                                            <div>
                                                <div class="flex items-center">
                                                    <label for="opening_end" class="block text-sm font-medium leading-6 text-gray-900 mr-2">End</label>
                                                </div>
                                                <div class="mt-2">
                                                    <input type="time" wire:model="opening_end" name="opening_end" id="opening_end" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="22:00" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]">
                                                </div>
                                            </div>
                                            <div class="mr-4 mt-6">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start ">
                                    <label for="opening_info" class="block text-sm font-medium text-gray-700 sm:mt-px">
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="mr-4">
                                                <label for="opening_info" class="block text-sm font-medium leading-6 text-gray-900 mr-2"> Additionnal informations</label>
                                                <div class="mt-2">
                                                    <input id="opening_info" name="opening_info" type="text" maxlength="120" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Location Type
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <select name="location_type_id" id="location_type_id" wire:model="location_type_id" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>
                                            <option value="">-- Please choose --</option>
                                            @foreach ($location_types as $location_type)
                                            @if($location_type['id'] == old('document'))
                                            <option value="{{$location_type['id']}}" selected>{{$location_type['name']}}</option>
                                            @else
                                            <option value="{{$location_type['id']}}">{{$location_type['name']}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <!-- Here is the two selects for Services and Products, it's an TallStack UI component, where you just have to 
                            write few lines, that will call a function by route, you can find the function in the livewire component CreateLocation -->
                            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Services available
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <x-select.styled wire:model="service_id" multiple :request="[
                                    'url' => route('get.services'),
                                    'method' => 'get',
                                    'class' => '',
                                    'params' => ['library' => 'TallStackUi'],
                                     ]" select="label:name|value:id" />
                                        <input name="service_id" id="service_id" wire:model.live="service_id" type="hidden" /> <!-- need to add type="hidden" not to see it displayed, may have a problem to retrieve the data if type="hidden" -->
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Products available
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <x-select.styled wire:model="product_id" multiple :request="[
                                    'url' => route('get.products'),
                                    'method' => 'get',
                                    'class' => '',
                                    'params' => ['library' => 'TallStackUi'],
                                     ]" select="label:name|value:id" />
                                        <input name="product_id" id="product_id" wire:model.live="product_id" type="hidden" /> <!-- need to add type="hidden" not to see it displayed, may have a problem to retrieve the data if no 'type="hidden"' -->
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8 border-t border-gray-200 pt-5">
                                <div class="pt-5">
                                    <div class="flex justify-end">
                                        <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Abbrechen
                                        </button>
                                        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Speichern
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Here is the script that retrieves the data of lat/lng that are in their respectiv inputs in the form. It will then load the map with everything, around this precise location.
We also provide a marker that we can drag and drop at any point. It will automatically update lat/lng inputs that are above. 
That map will appears in the div "map" that is above in the form.
we can also call it in a livewire view, with just the div and the script, but it does not want to work for now

-->
<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHBiYXozZm0wZ21vMnFwZHE4ZWc5Z2lzIn0.dJGBO1JOfota9KceLDgGJg';
    document.addEventListener('livewire:init', () => {
        Livewire.on('toggleMap', locationData => {
            setTimeout(() => {


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
            }, 10);
        });
    });
</script>