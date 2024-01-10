<div>
  <form wire:submit.prevent="submit">
    @csrf

    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
        <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Artikelname / Sorte
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <input wire:model="name" id="name" name="name" type="text" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
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
        <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Short Description
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <input wire:model="data" id="data" name="data" type="text" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
          </div>
        </div>

        @error('data')
        <div class="text-sm text-red-500 mt-2">{{ $message }}
        </div>
        @enderror
      </div>
    </div>


    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Typ
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <select wire:model="product_type_id" name="product_type_id" id="product_type_id" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>
              @foreach ($product_types as $product_type)
              @if($product_type['id'] == old('document'))
              <option wire:key="{{ $product_type['id']}}" value="{{$product_type->id }}" selected>{{$product_type['name']}}</option>
              @else
              <option wire:key="{{ $product_type['id']}}" value="{{$product_type->id }}">{{$product_type['name']}}</option>
              @endif
              @endforeach
            </select>
          </div>
        </div>

        @error('product_type')
        <div class="text-sm text-red-500 mt-2">
          {{ $message }}
        </div>
        @enderror
      </div>
    </div>

    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Einheit
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">


            x

          </div>
        </div>

        @error('product_unit')
        <div class="text-sm text-red-500 mt-2">
          {{ $message }}
        </div>
        @enderror
      </div>
    </div>









<div class="mt-8 border-t border-gray-200 pt-5">
  <div class="pt-5">
    <div class="flex justify-end">
      <a href="{{ route('baseproducts.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>
      <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Speichern
      </button>
    </div>
  </div>
</div>

</form>
</div>
