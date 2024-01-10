<div>
  <form wire:submit.prevent="submit">
    @csrf


    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Product Type
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <select wire:model.live="product_type_id" id="product_type_id" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>
              <option value="">-- Please choose --</option>
              @foreach ($product_types as $product_type)
              @if($product_type)
              <option wire:key="{{ $product_type['id'] }}" value="{{$product_type->id }}" selected>{{ $product_type->name }}</option> 
              @else
              <option wire:key="{{ $product_type['id']}}" value="{{$product_type->id }}">{{$product_type['name']}}</option>
              @endif
              @endforeach


              
            </select>
          </div>
        </div>
      </div>


      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Base Product
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <select wire:model.live="base_product_id"  id="base_product_id" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>
              <option value="">-- Choose Product Type first --</option>
              @if ($product_type_id)
              @foreach ($base_products as $base_product)
              @if($product_type['id'] == old('document'))
              <option wire:key="{{ $base_product['id'] }}" value="{{$base_product->id }}" selected>{{ $base_product->name }}</option>*
              @else
              <option wire:key="{{ $base_product['id']}}" value="{{$base_product->id }}">{{$base_product['name']}}</option>
              @endif
              @endforeach
              @endif
            </select>

          </div>
        </div>
      </div>
      @if ($product_type_id == '1' && $base_product_id == '1')
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 overflow-hidden" style="max-height: 100px; transition: max-height 0.4s ease-in-out;">
        <label for="blend_percent" class="block font-medium text-sm text-gray-700">
          Please indicate your specific blend percent (%)
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <input id="blend_percent" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" type="number" value="{{ old('blend_percent', $product->blend_percent) }}">
          </div>
        </div>
      </div>
      @endif

      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Standard
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <select wire:model.live="standard_id" id="standard_id" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>
              <option value="">-- Choose Product Type first --</option>
              @if ($product_type_id)
              @foreach ($standards as $standard)
              @if($standard['id'] == old('document'))
              <option wire:key="{{ $standard['id'] }}" value="{{$standard->id }}" selected>{{ $standard->name }}</option>*
              @else
              <option wire:key="{{ $standard['id']}}" value="{{$standard->id }}">{{$standard['name']}}</option>
              @endif
              @endforeach
              @endif
            </select>

          </div>
        </div>
      </div>
    </div>


    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Product Name
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">

            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
              <input wire:model="name" type="text" name="name" id="name" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $product->name) }}" required autofocus>
            </div>

          </div>
        </div>
      </div>
    </div>


    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Beschreibung
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">


            <div class="form-group{{ $errors->has('data') ? ' has-danger' : '' }}">

              <input wire:model="data" type="text" name="data" id="data" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('data') }}" value="{{ old('data', $product->data) }}" required autofocus>

            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Einheit
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <select wire:model.live="product_unit_id" name="product_unit_id" id="product_unit_id" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>
              <option value="">-- Please choose --</option>
              @foreach ($product_units as $product_unit)
              @if($product_unit['id'] == old('document'))
              <option wire:key="{{ $product_unit['id'] }}" value="{{$product_unit->id }}" selected>{{ $product_unit->name }}</option>*
              @else
              <option wire:key="{{ $product_unit['id']}}" value="{{$product_unit->id }}">{{$product_unit['name']}}</option>
              @endif
              @endforeach
            </select>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-8 border-t border-gray-200 pt-5">
      <div class="pt-5">
        <div class="flex justify-end">
          <a href="{{ route('products.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>
          <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Speichern
          </button>
        </div>
      </div>
    </div>

  </form>
</div>