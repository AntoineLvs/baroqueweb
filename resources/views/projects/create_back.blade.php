@extends('layouts.app', ['page' => 'Products', 'pageSlug' => 'products', 'section' => 'main'])
@section('content')


<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
  <form method="post"  action="{{ route('products.store') }}" autocomplete="off">
    @csrf

  <div class="py-10">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
      <h1 class="text-2xl font-bold text-gray-900">Products</h1>
    </div>

    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
      <div class="py-4">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
          <!-- This example requires Tailwind CSS v2.0+ -->
          <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
            <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
              <div class="ml-4 mt-2">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                  Create a new Product or Service
                </h3>
              </div>
              <div class="ml-4 mt-2 flex-shrink-0">
                <a href="{{ route('products.index') }}" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Zurück</a>
              </div>
            </div>
          </div>
          <div class="px-4 py-5 sm:p-6">
            <!-- Content goes here -->
            Füllen Sie die nachfolgenden Informationen aus, um eine efuel-Order zu platzieren.
          </div>
        </div>
      </div>
    </div>



    <!-- CONTENT -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
      <div class="py-4">

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">


          <div class="px-4 py-5 sm:px-6">
            <h3 class="card-title">Product Details</h3>
            <!-- We use less vertical padding on card headers on desktop than on body sections -->
          </div>


          <div class="px-4 py-5 sm:p-6">




              <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div>
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
                          <input id="name" name="name" type="text" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                      <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Product Type
                      </label>
                      <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                          <select name="product_type" id="product_type" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>
                            @foreach ($product_types as $product_type)
                            @if($product_type['id'] == old('document'))
                            <option value="{{$product_type['id']}}" selected>{{$product_type['name']}}</option>
                            @else
                            <option value="{{$product_type['id']}}">{{$product_type['name']}}</option>
                            @endif
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                      <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Data
                      </label>
                      <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                          <input id="data" name="data" type="text" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                      <label for="price" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        price
                      </label>
                      <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                          <input id="price" name="price" type="number" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                      <label for="price_unit" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        price_unit
                      </label>
                      <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                          <input id="price_unit" name="price_unit" type="text" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        </div>
                      </div>
                    </div>
                  </div>



                </div>



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
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</main>

@endsection
