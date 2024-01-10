<div>
  <form wire:submit.prevent="submit">
    @csrf




    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t m:pt-5 sm:border-gray-200 pt-4">
        <label for="details" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Offer Details
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">



            <!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">

          <tbody class="bg-white divide-y divide-gray-200">
            <tr>
              <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">Supplier</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $offer->tenant->name }}</td>
            </tr>

            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Valid until</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $offer->date_valid }}</td>
            </tr>


            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Offered Product</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  @foreach ($offer->products as $offered_product)
                  {{ $offered_product->product->name }}<br>
                  {{ $offered_product->product->product_type->name }}<br>


                  @endforeach

              </td>
            </tr>

            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Quantity / Unit</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  @foreach ($offer->products as $offered_product)
                  {{ $offered_product->product_quantity }} units<br>
                  {{ $offered_product->product_unit->name }}<br>

                @endforeach

              </td>
            </tr>

            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Price / Unit</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  @foreach ($offer->products as $offered_product)
                  {{ $offered_product->product_price }} €<br>
                              @endforeach

              </td>
            </tr>



          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


          </div>
        </div>
      </div>
    </div>



  <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t m:pt-5 sm:border-gray-200 pt-4">
      <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
        Request Text
      </label>
      <div class="mt-1 sm:mt-0 sm:col-span-2">
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <textarea rows="3" wire:model="request_text" id="request_text" name="request_text" type="textarea" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"></textarea>
        </div>
      </div>
      @error('request_text')
      <div class="text-sm text-red-500 mt-2">{{ $message }}
      </div>
      @enderror
    </div>
  </div>

  <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t m:pt-5 sm:border-gray-200 pt-4">
      <label for="request_quantity" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
        Request quantity
      </label>
      <div class="mt-1 sm:mt-0 sm:col-span-2">
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <input wire:model="request_quantity" id="request_quantity" name="request_quantity" type="number" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
          @error('request_quantity')
          <div class="text-sm text-red-500 mt-2">{{ $message }}
          </div>
          @enderror
        </div>
      </div>

    </div>
  </div>




  <!-- Product Section -->





<!-- End Product Section -->




<div class="mt-8 border-t border-gray-200 pt-5">
  <div class="pt-5">
    <div class="flex justify-end">


      <a href="{{ route('hub.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>

      <button  type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Save
      </button>
    </div>
  </div>
</div>

</form>
</div>
