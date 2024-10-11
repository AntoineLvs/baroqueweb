<div>

  <form wire:submit.prevent="submit">
    @csrf


    <div>
      <h3 class="text-lg leading-6 font-medium text-gray-900">
        Allgemeine Informationen
      </h3>
      <p class="mt-1 max-w-2xl text-sm text-gray-500">
        Provide some general informations about your product.
      </p>
    </div>





    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 mt-4 pb-4">
      <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
        Ausgangsprodukt
      </label>
      <div class="mt-1 sm:mt-0 sm:col-span-2">
        <div class="mt-1 sm:mt-0 sm:col-span-2 w-full md:w-64">

          <select wire:model.live="base_product_id" id="base_product_id" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>
            <option value="">-- Choose Product Type first --</option>

            @foreach ($base_products as $base_product)
            <option value="{{ $base_product->id }}">{{ $base_product->name }}</option>
            @endforeach

          </select>
        </div>
      </div>
    </div>




    @if($base_product_id == 2)
    <div class="pt-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 overflow-hidden" style="max-height: 100px; transition: max-height 0.4s ease-in-out;">
      <label for="blend_percent" class="block font-medium text-sm text-gray-700">
        Bitte die genauen Prozent des HVO-Anteils angeben(%)
      </label>
      <div class="mt-1 sm:mt-0 sm:col-span-2">
        <div class="pt-2 pb-2 pr-8 sm:mt-0 sm:col-span-2 w-full md:w-64"">

              <x-number class=" w-40" wire:model.live="blend_percent" id="blend_percent" min="1" max="99" />

      </div>
    </div>
    @endif





    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Produkt-Name (öffentlich sichtbar)
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <input wire:model="name" id="name" name="name" type="text" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
          </div>
        </div>
      </div>
    </div>

    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Weitere Produkt-Details
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <input wire:model="data" id="data" name="data" type="text" maxlength="120" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
          </div>
        </div>
      </div>
    </div>

    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="unit" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Produkt-Einheit
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <select wire:model.live="product_unit_id" name="product_unit_id" id="product_unit_id" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
              <option value="">-- Please choose --</option>
              @foreach ($product_units as $product_unit)
              @if($product_unit['id'] == old('document'))
              <option value="{{$product_unit['id']}}" selected>{{$product_unit['name']}}</option>
              @else
              <option value="{{$product_unit['id']}}">{{$product_unit['name']}}</option>
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
          Produkt-Einheit
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <x-select.styled wire:model="product_unit_id" multiple :request="[
                                    'url' => route('get.product-units'),
                                    'method' => 'get',
                                    'class' => '',
                                    'params' => ['library' => 'TallStackUi'],
                                     ]" select="label:name|value:id" />
          <input name="product_unit_id" id="product_unit_id" wire:model.live="product_unit_id" type="hidden" /> <!-- need to add type="hidden" not to see it displayed, may have a problem to retrieve the data if type="hidden" -->
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