<div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
  <div class="py-4">

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">


      <div class="px-4 py-5 sm:px-6">
        <h3 class="card-title">Location Details</h3>
        <!-- We use less vertical padding on card headers on desktop than on body sections -->
      </div>


      <div class="px-4 py-5 sm:p-6">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
          <div>

            <form method="post" action="{{ route('locations.update', $location) }}" autocomplete="off">
              @csrf
              @method('put')


              <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                  Info
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                  General Product Informations
                </p>
              </div>

              <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                  <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Name
                  </label>
                  <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="mt-1 sm:mt-0 sm:col-span-2">

                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <input type="text" name="name" id="name" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $location->name) }}" required autofocus>
                      </div>

                    </div>
                  </div>
                </div>
              </div>

              <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                  <label for="description" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Description x
                  </label>
                  <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="mt-1 sm:mt-0 sm:col-span-2">


                      <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">

                        <input type="text" name="description" id="description" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('description') }}" value="{{ old('description', $location->description) }}">

                      </div>
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
                        <input type="text" name="address" id="address" autocomplete="address-level2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('address', $location->address) }}">
                      </div>

                      <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="zipcode" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>
                        <input type="text" name="zipcode" id="zipcode" autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('address', $location->zipcode) }}">
                      </div>

                      <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                        <input type="text" name="city" id="city" autocomplete="address-level1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('city', $location->city) }}">
                      </div>


                    </div>

                    <div class="grid grid-cols-6 gap-6 pt-5">
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <label for="address" class="block text-sm font-medium text-gray-700">Longitude (optional)</label>
                        <input type="text" name="lng" id="lng" autocomplete="lng" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('lng', $location->lng) }}">
                      </div>

                      <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="zipcode" class="block text-sm font-medium text-gray-700">Latitude (optional)</label>
                        <input type="text" name="lat" id="lat" autocomplete="lat" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('lat', $location->lat) }}">
                      </div>

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
                  <div class="flex_col items-center">
                    <div>
                      <div>
                        <div class="flex items-center">
                          <label for="allday" class="block text-sm font-medium leading-6 text-gray-900 mr-2">Open 24 Hours</label>
                        </div>
                        <div class="mt-2">
                          <!-- Ajoutez wire:click pour appeler la méthode toggleAllDay -->
                          <input id="allday" wire:model="allDay" wire:click="toggleAllDay" aria-describedby="candidates-description" name="allday" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        </div>
                      </div>
                    </div>
                    <div class="flex mt-6">
                      <div class="mr-4">
                        <div class="flex items-center">
                          <label for="opening_start" class="block text-sm font-medium leading-6 text-gray-900 mr-2">Start</label>
                        </div>
                        <div class="mt-2">
                          <input type="time" name="opening_start" id="opening_start" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="HH:MM" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" wire:model="opening_start">
                        </div>
                      </div>

                      <div class="mr-4 mt-6">--</div>

                      <div>
                        <div class="flex items-center">
                          <label for="opening_end" class="block text-sm font-medium leading-6 text-gray-900 mr-2">End</label>
                        </div>
                        <div class="mt-2">
                          <input type="time" name="opening_end" id="opening_end" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="HH:MM" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" wire:model="opening_end">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class=" mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start ">
                  <label for="opening_info" class="block text-sm font-medium text-gray-700 sm:mt-px">
                  </label>
                  <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <div class="mr-4">
                        <label for="opening_info" class="block text-sm font-medium leading-6 text-gray-900 mr-2"> Additionnal informations</label>
                        <div class="mt-2">
                          <input id="opening_info" name="opening_info" type="text" maxlength="120" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md" value="{{ old('opening_info', $location->opening_info) }}">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class=" mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                  <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Product Type
                  </label>
                  <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <select name="location_type_id" id="location_type_id" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>
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
              </div>


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
                                ]" select="label:name|value:id" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" />
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