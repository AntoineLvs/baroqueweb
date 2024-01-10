<div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
  <div class="sm:grid sm:grid-cols-2 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
    <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
      Offered Products
    </label>

    <div class="mt-1 sm:mt-0 sm:col-span-2">
      <div class="flex flex-col">

        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">


            <div class=" overflow-hidden sm:rounded-lg">

              @if(!$this->offerProducts == null)

              <table class="table-auto" id="products_table">
                <thead>
                  <tr>
                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" >Product</th>
                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Offer Price / Unit</th>
                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($offerProducts as $index => $offerProduct)


                  <tr>
                    <td class="w-auto px-1 py-1 whitespace-nowrap text-sm font-medium text-gray-900">
                      <!-- <select
                      name="offerProducts[{{$index}}][product_id]"
                      wire:model="offerProducts.{{$index}}.product_id"
                      class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">


                      <option value="">
                      choose product
                    </option>

                    @foreach ($allProducts as $product)
                    <option value="{{ $product->id }}">
                    {{ $product->name }}, {{ $product->product_type->name }}
                  </option>
                  @endforeach
                </select> -->

                <x-select
                name="offerProducts[{{$index}}][product_id]"
                placeholder="Select a Product"
                wire:model="offerProducts"  >

                @foreach ($allProducts as $product)
                <x-select.option class="text-dark:hover" label="{{ $product->name }}" value="{{$product->id}}"  />
                  @endforeach

                </x-select>
              </td>

              <td class="w-auto px-1 py-1 whitespace-nowrap text-sm font-medium text-gray-900">
                <input type="number"
                name="offerProducts[{{$index}}][quantity]"
                class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                wire:model="offerProducts.{{$index}}.quantity" />
              </td>

              <td class="w-auto px-1 py-1 whitespace-nowrap text-sm font-medium text-gray-900">
                <input type="number" step="any"
                name="offerProducts[{{$index}}][price]"
                class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                wire:model="offerProducts.{{$index}}.price" />
              </td>


              <td class="w-auto px-1 py-1 whitespace-nowrap text-sm font-medium text-gray-900" >


                <select
                name="offerProducts[{{$index}}][product_unit]"
                wire:model="offerProducts.{{$index}}.product_unit"
                class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                <option value="">-- unit --</option>

                <option value="litres">
                  litres
                </option>

                <option value="tray">
                  tray (1000 l)
                </option>

              </select>
            </td>


            <td >

              <a class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700
              hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              href="#" wire:click.prevent="removeProduct({{$index}})">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      @endif


    </div>
    <div class="pt-4">

      @if($this->offerProducts == null)

      <button class="bg-white py-2 px-4 border border-indigo-300 rounded-md shadow-sm text-sm font-medium text-indigo-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
      wire:click.prevent="addProduct"> + Add first Product</button>

      @else

      <button class="bg-white py-2 px-4 border border-indigo-300 rounded-md shadow-sm text-sm font-medium text-indigo-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
      wire:click.prevent="addProduct"> + Add another Product</button>

      @endif



    </div>
  </div>
</div>
</div>



</div>

@error('offerProducts.{{$index}}.product_id')
<div class="text-sm text-red-500 mt-2">{{ $message }}
</div>
@enderror
</div>
</div>
