@extends('layouts.app', ['page' => 'AdminDashboard', 'pageSlug' => 'admindashboard', 'section' => 'main'])

@section('content')
<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">

  <div class="py-10">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
      <h1 class="text-2xl font-bold text-gray-900">Admin Dashboard</h1>

    </div>
    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
      <div class="py-4">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
          <div class="px-4 py-5 sm:px-6">
            <h3 class="card-title">Admin Actions</h3>
          </div>
          <div class="px-4 py-5 sm:p-6">
            <!-- Content goes here -->

            <div>
              <a href="{{ route('locations.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent
              text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create Location</a>

              <a href="{{ route('product-types.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent
              text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create Product Type</a>

              <a href="{{ route('base-products.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent
              text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create Base Product</a>

              <a href="{{ route('base-services.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent
              text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create Base Service</a>

              <a href="{{ route('standards.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent
              text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create Standard</a>
            </div>

          </div>
        </div>
      </div>
    </div>
    @livewire('admin.dashboard')

    <!-- Location History START -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
      <div class="py-4">

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">


          <div class="px-4 py-5 sm:px-6">
            <h3 class="card-title">Locations History</h3>
            <!-- We use less vertical padding on card headers on desktop than on body sections -->
          </div>
          <div class="px-4 py-5 sm:p-6">
            <!-- Content goes here -->

            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
              <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">

                        <tr>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Location Records
                          </th>


                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($all_locations as $location)
                        @foreach ($location->histories as $record)
                        <tr>

                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">

                              <div>
                                <div class="text-sm font-medium text-gray-900">

                                  {{ $record->message }} at {{ $record->performed_at }} by User {{ $record->user_id }} - Changed Model-ID: {{ $record->id }} ({{ $record->model_type }})<br>

                                </div>

                              </div>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                        @endforeach
                        <!-- More things... -->

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
    <!-- Location History END -->

    <!-- Product Types start -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
      <div class="py-4">
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">

          <div class="px-4 py-5 sm:px-6">
            <h3 class="card-title">Product Types</h3>
          </div>
          <div class="px-4 py-5 sm:p-6">

            @if($product_types->count() == 0 )

            <button type="button" onclick="window.location='{{ route(product-types.create) }}'" class="relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-6 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              <svg class="mx-auto h-12 w-12 text-gray-500" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="block text-sm font-medium text-gray-500">
                You don't have any product types yet. Create a product type now.
              </span>
            </button>


            @else
            <div class="flex flex-col">
              <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Product
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Product Type
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Totals
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            State
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Active (Hub)
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Edit
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                          </th>

                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($product_types as $product_type)
                        <tr>

                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="flex-shrink-0 h-10 w-10">
                                <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-green" src="{{ $product_type->image_path }}" alt="">
                              </div>

                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                  {{ $product_type->name }}
                                </div>
                                <div class="text-sm text-gray-500">
                                  ID: {{ $product_type->id }}
                                </div>
                              </div>
                            </div>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $product_type->name}}</div>
                            <div class="text-sm text-gray-500">xx </div>
                          </td>



                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

                            -

                          </td>

                          <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                              Available
                            </span>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">


                            @livewire('components.toggle-button',
                            [
                            'model' => $product_type,
                            'field' => 'active',
                            ])

                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">


                            <a href="{{ route('product-types.edit', $product_type) }}" data-toggle="tooltip" data-placement="bottom" title="Edit Product">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                              </svg>
                            </a>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">

                            <form action="{{ route('product-types.destroy', $product_type) }}" method="post">
                              @csrf
                              @method('delete')
                              <button type="button" data-toggle="tooltip" data-placement="bottom" title="Delete Product Type" onclick="confirm('Are you sure you want to remove this product? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mt-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                              </button>
                            </form>


                          </td>

                        </tr>
                        @endforeach
                        <!-- More people... -->
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>



            @endif

            {{ $product_types->links() }}


          </div>

        </div>

      </div>
    </div>
    <!-- Products end -->

    <!-- Base Products start -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
      <div class="py-4">
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">

          <div class="px-4 py-5 sm:px-6">
            <h3 class="card-title">Base Products</h3>
          </div>
          <div class="px-4 py-5 sm:p-6">

            @if($base_products->count() == 0 )

            <button type="button" onclick="window.location='{{ route(base-products.create) }}'" class="relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-6 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              <svg class="mx-auto h-12 w-12 text-gray-500" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="block text-sm font-medium text-gray-500">
                You don't have any base products yet. Create a base product now.
              </span>
            </button>


            @else
            <div class="flex flex-col">
              <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Base Product
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Product Type
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Base Product Data
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Totals
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            State
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Active (Hub)
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Edit
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                          </th>

                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($base_products as $base_product)
                        <tr>

                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="flex-shrink-0 h-10 w-10">
                                <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-green" src="{{ $base_product->image_path }}" alt="">
                              </div>

                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                  {{ $base_product->name }}
                                </div>
                                <div class="text-sm text-gray-500">
                                  PID: {{ $base_product->id }}
                                </div>
                              </div>
                            </div>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $base_product->product_type->name}}</div>
                            <div class="text-sm text-gray-500">PTID: {{ $base_product->product_type_id }}</div>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">


                            <div class="text-sm text-gray-900"> {{ Str::words($base_product->data, 5, ' ...') }} </div>
                            <div class="text-sm text-gray-500"></div>


                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">



                          </td>

                          <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                              Available
                            </span>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">


                            @livewire('components.toggle-button',
                            [
                            'model' => $base_product,
                            'field' => 'active',
                            ])

                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">


                            <a href="{{ route('base-products.edit', $base_product) }}" data-toggle="tooltip" data-placement="bottom" title="Edit Base Product">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                              </svg>
                            </a>





                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">



                            <form action="{{ route('base-products.destroy', $base_product) }}" method="post">
                              @csrf
                              @method('delete')
                              <button type="button" data-toggle="tooltip" data-placement="bottom" title="Delete Base Product" onclick="confirm('Are you sure you want to remove this base product? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mt-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                              </button>
                            </form>


                          </td>

                        </tr>
                        @endforeach
                        <!-- More people... -->
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>



            @endif

            {{ $base_products->links() }}



          </div>

        </div>

      </div>
    </div>
    <!-- Base Products end -->

    <!-- Services start -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
      <div class="py-4">
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">

          <div class="px-4 py-5 sm:px-6">
            <h3 class="card-title">Base Services</h3>
          </div>
          <div class="px-4 py-5 sm:p-6">

            @if($base_services->count() == 0 )

            <button type="button" onclick="window.location='{{ route(base-services.create) }}'" class="relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-6 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              <svg class="mx-auto h-12 w-12 text-gray-500" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="block text-sm font-medium text-gray-500">
                You don't have any services yet. Create a service now.
              </span>
            </button>


            @else
            <div class="flex flex-col">
              <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Base Service Data
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            State
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Active (Hub)
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Edit
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                          </th>

                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($base_services as $base_service)
                        <tr>

                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                  {{ $base_service->name }}
                                </div>
                              </div>
                            </div>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">


                            <div class="text-sm text-gray-900"> {{ $base_service->description }}</div>

                          </td>

                          <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                              Available
                            </span>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">


                            @livewire('components.toggle-button',
                            [
                            'model' => $base_service,
                            'field' => 'active',
                            ])

                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">


                            <a href="{{ route('base-services.edit', $base_service) }}" data-toggle="tooltip" data-placement="bottom" title="Edit Base Service">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                              </svg>
                            </a>





                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">



                            <form action="{{ route('base-services.destroy', $base_service) }}" method="post">
                              @csrf
                              @method('delete')
                              <button type="button" data-toggle="tooltip" data-placement="bottom" title="Delete service" onclick="confirm('Are you sure you want to remove this service? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mt-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                              </button>
                            </form>


                          </td>

                        </tr>
                        @endforeach
                        <!-- More people... -->
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>



            @endif

            {{ $base_services->links() }}


          </div>

        </div>

      </div>
    </div>
    <!-- Services end -->

    <!-- Standard start -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
      <div class="py-4">
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">

          <div class="px-4 py-5 sm:px-6">
            <h3 class="card-title">Standard</h3>
          </div>
          <div class="px-4 py-5 sm:p-6">

            <div class="flex flex-col">
              <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Standard Data
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            URL
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Edit
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                          </th>

                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($standards as $standard)
                        <tr>

                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                  {{ $standard->name }}
                                </div>
                              </div>
                            </div>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">


                            <div class="text-sm text-gray-900"> {{ Str::words($standard->data, 5, ' ...') }} </div>

                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">


                            <div class="text-sm text-gray-900"> {{ Str::limit($standard->url, 20, ' ...') }} </div>

                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">


                            <a href="{{ route('standards.edit', $standard) }}" data-toggle="tooltip" data-placement="bottom" title="Edit Standard">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                              </svg>
                            </a>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                            <form action="{{ route('standards.destroy', $standard) }}" method="post">
                              @csrf
                              @method('delete')
                              <button type="button" data-toggle="tooltip" data-placement="bottom" title="Delete Standard" onclick="confirm('Are you sure you want to remove this standard? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mt-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                              </button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                        <!-- More people... -->
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>

            {{ $base_services->links() }}


          </div>

        </div>

      </div>
    </div>
    <!-- Services end -->






    <!-- End Div Content Container  -->
  </div>
  <!-- Content End -->



  @endsection