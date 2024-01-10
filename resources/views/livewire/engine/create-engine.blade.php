<div>
  <form wire:submit.prevent="submit">
    @csrf

      <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
          <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
              <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                  Hersteller
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <select wire:model="manufacturer_id" name="manufacturer_id" id="manufacturer_id" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>
                          @foreach ($manufacturers as $manufacturer)
                              @if($manufacturer['id'] == old('document'))
                                  <option wire:key="{{ $manufacturer['id']}}" value="{{$manufacturer->id }}" selected>{{$manufacturer['name']}}</option>
                              @else
                                  <option wire:key="{{ $manufacturer['id']}}" value="{{$manufacturer->id }}">{{$manufacturer['name']}}</option>
                              @endif
                          @endforeach
                      </select>
                  </div>
              </div>

              @error('manufacturer')
              <div class="text-sm text-red-500 mt-2">
                  {{ $message }}
              </div>
              @enderror
          </div>
      </div>


    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
        <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Name
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">

          <div class="mt-1 sm:mt-0 sm:col-span-2">
              <input wire:model="name" id="name" name="name" type="text"
                     class="block p-2 font-medium w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1
                   focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
          </div>
        </div>

        @error('name')
        <div class="text-sm text-red-500 mt-2">{{ $message }}
        </div>
        @enderror
      </div>
    </div>

    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
        <label for="contact" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Bezeichnung
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <input wire:model="data" id="data" name="data" type="text"
                   class="block p-2 font-medium w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1
                   focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
          </div>
        </div>

        @error('data')
        <div class="text-sm text-red-500 mt-2">{{ $message }}
        </div>
        @enderror
      </div>
    </div>

<div class="mt-8 border-t border-gray-200 pt-5">
  <div class="pt-5">
    <div class="flex justify-end">
      <a href="{{ route('engines.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>
      <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Speichern
      </button>
    </div>
  </div>
</div>

</form>
</div>
