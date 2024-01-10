<div>
  <form wire:submit.prevent="update">
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
        <label for="date_valid" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Offer valid until
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-1">
          <div>
            <x-datetime-picker
            placeholder="Date"
            wire:model.defer="date_valid"
            without-time="true"
            />
          </div>
        </div>
      </div>
    </div>


    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t m:pt-5 sm:border-gray-200 pt-4">
        <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Offer Informations
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <textarea rows="3" wire:model="informations" id="informations" name="informations" type="textarea" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"></textarea>
          </div>
        </div>
        @error('informations')
        <div class="text-sm text-red-500 mt-2">{{ $message }}
        </div>
        @enderror
      </div>
    </div>


    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
        <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Responsible Contact Person
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <x-select
            placeholder="Select one Contact Person"
            wire:model.defer="contact_person"
            >
            @foreach ($users as $user)
            <x-select.option  class="text-dark:hover" label="{{$user->name}}" value="{{$user->id}}" wire:key="{{$user->id}}" />
              @endforeach
            </x-select>
          </div>
        </div>
        @error('contact_person')
        <div class="text-sm text-red-500 mt-2">{{ $message }}
        </div>
        @enderror
      </div>
    </div>




    <!-- <div>
      <x-input.document wire:model="document"
      class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md" />
      <div> -->

        <!-- <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
          <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
            <label for="document" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              Uploaded Documents
            </label>
            <div class="mt-1 sm:mt-0 sm:col-span-1">


              @foreach ($product_offer->documents($product_offer->id) as $document )

              {{ $document->filename }}

              <form action="{{ route('documents.destroy', $document) }}" method="post" >
                @csrf
                @method('delete')
                <button type="button" data-toggle="tooltip" data-placement="bottom" title="Delete Product" onclick="confirm('Are you sure you want to remove this document? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mt-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg>
                </button>
              </form>

              @endforeach


            </div>
          </div>
        </div> -->



        <!-- Product Section -->
        <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
          <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">Product Information</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Add the offered product informations.</p>
          </div>

          <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
              <label for="offered_product" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Offered Product
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <x-select

                  placeholder="Select the offered product"
                  wire:model.defer="offered_product_id"
                  >
                  @foreach ($allProducts as $product)
                  <x-select.option  class="text-dark:hover" label="{{ $product->name }} - Type: {{ $product->product_type->name }}" value="{{$product->id}}" wire:key="{{$product->id}}" />
                    @endforeach
                  </x-select>
                </div>
              </div>

          </div>
        </div>



        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Product Price per Unit </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">

            <x-inputs.currency
            icon="currency-euro"
            thousands=","
            decimal="."
            precision="2"
            wire:model="product_price"
            />

          </div>
        </div>

        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
          <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t m:pt-5 sm:border-gray-200 pt-4">
            <label for="product_quantity" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              Product  quantity
            </label>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <input wire:model="product_quantity" id="product_quantity" name="product_quantity" type="number" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                @error('product_quantity')
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
                <select wire:model="product_unit_id" name="product_unit_id" id="product_unit_id" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>
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





        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="product_unit" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Product Tax </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <select wire:model.defer="product_tax" id="product_tax" name="product_tax" autocomplete="product_tax" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">

              <option value="0.19">19% MwSt.</option>
              <option value="0.07">7% MwSt.</option>
              <option value="99">Other</option>

            </select>
            @error('product_tax')
            <div class="text-sm text-negative-600 mt-2">{{ $message }}
            </div>
            @enderror
          </div>

        </div>



      </div>
      <!-- End Product Section -->




















        <div class="mt-8 border-t border-gray-200 pt-5">
          <div class="pt-5">
            <div class="flex justify-end">


              <a href="{{ route('products.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>

              <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
              </button>
            </div>
          </div>
        </div>

      </form>
    </div>
