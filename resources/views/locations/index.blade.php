@extends('layouts.app', ['page' => 'Locations', 'pageSlug' => 'locations', 'section' => 'main'])
@section('content')


<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
  <div class="py-10">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
      <h1 class="text-2xl font-bold text-gray-900">Tankstellen</h1>
    </div>



    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
      <div class="py-4">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
          <div class="px-4 py-5 sm:px-6">
            <h3 class="card-title">Übersicht</h3>
          </div>
          <div class="px-4 py-5 sm:p-6">
            <!-- Content goes here -->

            <div>
              <a href="{{ route('locations.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent
              text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Tankstelle Anlegen</a>

              <a href="{{ route('locations.import-view') }}" class="inline-flex items-center px-4 py-2 border border-transparent
              text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Import</a>


              <a href="{{ route('locations.export') }}" class="inline-flex items-center px-4 py-2 border border-transparent
              text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Export</a>
            </div>

          </div>
        </div>
      </div>
    </div>


    <!-- CONTENT -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
      <div class="py-4">
        @livewire('locations.index-locations')

      </div>

      {{--<div class="py-4">

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">


          <div class="px-4 py-5 sm:px-6">
            <h3 class="card-title">Location History</h3>
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
                            History Record
                          </th>

                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($locations as $location)
                        @foreach ($location->histories as $record)
                        <tr>

                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">

                              <div>
                                <div class="text-sm font-medium text-gray-900">


                                  {{ $record->message }} at {{ $record->performed_at }}<br>

                                </div>
                                <div class="text-sm text-gray-500">

                                </div>
                              </div>


                            </div>
                          </td>

                        </tr>

                        @endforeach
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
--}}

    </div>
  </div>
</main>

<script>
  function closeAlert(event) {
    let element = event.target;
    while (element.nodeName !== "BUTTON") {
      element = element.parentNode;
    }
    element.parentNode.parentNode.removeChild(element.parentNode);
  }
</script>

@endsection
