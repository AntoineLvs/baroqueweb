<div>
  <form wire:submit.prevent="submit">
    @csrf

    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
        <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Publish offer (visible in Hub)
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">


            <div>
              <style>
              /* CHECKBOX TOGGLE SWITCH */
              /* @apply rules for documentation, these do not work as inline style */
              .toggle-checkbox:checked {
                @apply: right-0 border-green-100;
                right: 0;
                border-color: #68D391;
              }
              .toggle-checkbox:checked + .toggle-label {
                @apply: bg-green-400;
                background-color: #68D391;
              }
              </style>

              <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">

                <input wire:model="isActive" type="checkbox" name="toggle" id="toggle" class="toggle-checkbox absolute block w-6 h-6
                rounded-full bg-white appearance-none cursor-pointer"/>

                <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-200 cursor-pointer"></label>
              </div>

            </div>

          </div>
        </div>
        @error('isActive')
        <div class="text-sm text-red-500 mt-2">{{ $message }}
        </div>
        @enderror

      </div>
    </div>



    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
        <label for="customer_tenant_id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Supplier
        </label>


        <div class="mt-1 sm:mt-0 sm:col-span-2">

          @if($this->isActive != 1)
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-select
            placeholder="Select your supplier (left blank if inquire should be public)"
            wire:model.defer="supplier_tenant_id"
            >
            @foreach ($supplier_tenants as $tenant)
            <x-select.option  class="text-dark:hover" label="{{$tenant->name}}" value="{{$tenant->id}}" wire:key="{{$tenant->id}}" />
              @endforeach
            </x-select>
          </div>

          @else
          <div class="pt-4 mb-2 sm:mt-0 sm:col-span-2 text-sm text-red-500">
            Public inquiries can not have a supplier!
          </div>

          @endif


        </div>
        @error('customer_tenant_id')
        <div class="text-sm text-red-500 mt-2">{{ $message }}
        </div>
        @enderror
      </div>
    </div>




    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t m:pt-5 sm:border-gray-200 pt-4">
        <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          What you are looking for?
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <textarea rows="3" wire:model.defer="request_text" id="request_text" name="request_text" type="textarea" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"></textarea>
          </div>
        </div>
        @error('request_text')
        <div class="text-sm text-red-500 mt-2">{{ $message }}
        </div>
        @enderror
      </div>
    </div>




    <!-- Product Section -->
    <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
      <div>
        <h3 class="text-lg leading-6 font-medium text-gray-900">Product Information</h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">Add the offered product informations.</p>
      </div>



      <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            Product Type
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="mt-1 sm:mt-0 sm:col-span-2">
              <select wire:model.debounce.250m="product_type_id" name="product_type_id" id="product_type_id"
              class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">

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
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
          <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            Offered Product
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="mt-1 sm:mt-0 sm:col-span-2">
              <x-select

              placeholder="Select the inquired product (if left blank, please provide text)"
              wire:model.defer="inquired_product"

              >
              @foreach ($allProducts as $product)
              <x-select.option  class="text-dark:hover" label="{{ $product->name }} - Type: {{ $product->product_type->name }}" value="{{$product->id}}" wire:key="{{$product->id}}" />
                @endforeach
              </x-select>
            </div>
          </div>

        </div>
      </div>



      @if($this->product_type_id == 1)

      <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t m:pt-5 sm:border-gray-200 pt-4">
          <label for="request_quantity" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            Inquired quantity
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="mt-1 sm:mt-0 sm:col-span-2">
              <input wire:model="request_quantity" id="request_quantity" name="request_quantity" type="number" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
              @error('request_quantity')
              <div class="text-sm text-red-500 mt-2">{{ $message }}
              </div>
              @enderror
            </div>
          </div>

        </div>
      </div>



      <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            Product Unit
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="mt-1 sm:mt-0 sm:col-span-2">
              <select wire:model.defer="product_unit_id" name="product_unit_id" id="product_unit_id" class="block max-w-lg focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>
                @foreach ($product_units as $product_unit)
                @if($product_unit['id'] == old('document'))
                <option wire:key="{{ $product_unit['id']}}" value="{{$product_unit->id }}" selected>{{$product_unit['name']}}</option>
                @else
                <option wire:key="{{ $product_unit['id']}}" value="{{$product_unit->id }}">{{$product_unit['name']}}</option>
                @endif
                @endforeach
              </select>
            </div>
          </div>

          @error('product_unit')
          <div class="text-sm text-red-500 mt-2">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>

      @endif


    </div>
    <!-- End Product Section -->





    <div class="mt-8 border-t border-gray-200 pt-5">
      <div class="pt-5">
        <div class="flex justify-end">


          <a href="{{ route('hub.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>

          <button  type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Create Inquiry
          </button>
        </div>
      </div>
    </div>

  </form>
</div>
