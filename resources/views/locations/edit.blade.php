@extends('layouts.app', ['page' => 'Locations', 'pageSlug' => 'locations', 'section' => 'main'])
@section('content')


<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">


  <div class="py-10">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">

      <h1 class="text-2xl font-bold text-gray-900">Edit Location</h1>


      @if (session()->has('message'))

      <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
          <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
            </svg></div>
          <div>
            <p class="font-bold"> {{ session('message') }}</p>
          </div>
        </div>
      </div>
      @endif

      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)

          <li>{{ $error }}</li>

          <!-- This example requires Tailwind CSS v2.0+ -->
          <div class="rounded-md bg-green-50 p-4">
            <div class="flex">
              <div class="flex-shrink-0">
                <!-- Heroicon name: solid/check-circle -->
                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="ml-3">
                <p class="text-sm font-medium text-green-800">
                  Successfully uploaded
                </p>
              </div>
              <div class="ml-auto pl-3">
                <div class="-mx-1.5 -my-1.5">
                  <button type="button" class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600">
                    <span class="sr-only">Dismiss</span>
                    <!-- Heroicon name: solid/x -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>


          @endforeach
        </ul>
      </div>
      @endif


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
                  Edit your Location
                </h3>
              </div>
              <div class="ml-4 mt-2 flex-shrink-0">
                <a href="{{ route('locations.index') }}" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Zurück</a>
              </div>
            </div>
          </div>
          <div class="px-4 py-5 sm:p-6">
            <!-- Content goes here -->
            Edit
          </div>
        </div>
      </div>
    </div>




    <!-- CONTENT -->
    @livewire('locations.edit-location', ['location' => $location])

  </div>





</main>

@endsection