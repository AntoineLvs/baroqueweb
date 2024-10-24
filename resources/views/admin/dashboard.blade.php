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
              <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent
              text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create Location</a>

              <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent
              text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create Product Type</a>

              <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent
              text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create Base Product</a>

              <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent
              text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create Base Service</a>

              <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent
              text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create Standard</a>
            </div>

          </div>
        </div>
      </div>
    </div>
    @livewire('admin.dashboard')

    <!-- Product Types start -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
      <div class="py-4">
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">

          <div class="px-4 py-5 sm:px-6">
            <h3 class="card-title">Product Types</h3>
          </div>
          <div class="px-4 py-5 sm:p-6">

            

            <button type="button" onclick="window.location='#'" class="relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-6 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              <svg class="mx-auto h-12 w-12 text-gray-500" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="block text-sm font-medium text-gray-500">
                You don't have any product types yet. Create a product type now.
              </span>
            </button>

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

            

            <button type="button" onclick="window.location='#'" class="relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-6 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              <svg class="mx-auto h-12 w-12 text-gray-500" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="block text-sm font-medium text-gray-500">
                You don't have any base products yet. Create a base product now.
              </span>
            </button>

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

            

            <button type="button" onclick="window.location='#'" class="relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-6 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              <svg class="mx-auto h-12 w-12 text-gray-500" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="block text-sm font-medium text-gray-500">
                You don't have any services yet. Create a service now.
              </span>
            </button>

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

                        <tr>

                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                 name 
                                </div>
                              </div>
                            </div>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">


                            <div class="text-sm text-gray-900"> description </div>

                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">


                            <div class="text-sm text-gray-900"> https://url.com </div>

                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">


                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Edit Standard">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                              </svg>
                            </a>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                            <form action="#" method="post">
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
                        <!-- More people... -->
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
    <!-- Services end -->






    <!-- End Div Content Container  -->
  </div>
  <!-- Content End -->



  @endsection