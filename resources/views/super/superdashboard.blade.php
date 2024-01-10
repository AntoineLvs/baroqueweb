@extends('layouts.app', ['page' => 'Dashboard', 'pageSlug' => 'dashboard', 'section' => 'main'])
@section('title', 'Super Dashboard')
@section('content')


<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
      <div class="py-10">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
          <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
        </div>

        <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
          <div class="py-4">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
              <div class="px-4 py-5 sm:px-6">
                <h3 class="card-title">Willkommen im refuelos</h3>
              </div>
              <div class="px-4 py-5 sm:p-6">
                <!-- Content goes here -->
                Sie befinden sich im Dashboard. Hier sehen Sie aktuelle Kundenbestellungen sowie Sammelbestellungen bei den E-Fuel Lieferanten.
              </div>
            </div>
          </div>
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
                    <div>
                        <div class=" grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                            <svg class="h-6 w-6 text-white" fill="none" stroke-linecap="round"
                                                 stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                <path
                                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                                                    Lieferanten
                                                </dt>
                                                <dd class="flex items-baseline">
                                                    <div class="text-2xl leading-8 font-semibold text-gray-900">
                                                      sup
                                                    </div>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gray-50 px-4 py-4 sm:px-6">
                                    <div class="text-sm leading-5">
                                        <a href="#"
                                           class="font-medium text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">
                                            View all
                                        </a>
                                    </div>
                                </div>
                            </div>


                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                            </svg>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                                                    Total Users
                                                </dt>
                                                <dd class="flex items-baseline">
                                                    <div class="text-2xl leading-8 font-semibold text-gray-900">
                                                        {{$usersCount}}
                                                    </div>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-4 sm:px-6">
                                    <div class="text-sm leading-5">
                                        <a href="#"
                                           class="font-medium text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">
                                            View all
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                            </svg>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                                                    Total Users
                                                </dt>
                                                <dd class="flex items-baseline">
                                                    <div class="text-2xl leading-8 font-semibold text-gray-900">
                                                        {{$usersCount}}
                                                    </div>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-4 sm:px-6">
                                    <div class="text-sm leading-5">
                                        <a href="#"
                                           class="font-medium text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">
                                            View all
                                        </a>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>


              </div>
            </div>
          </div>
        </div>


        <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
          <div class="py-4">

            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">


              <div class="px-4 py-5 sm:px-6">
                <h3 class="card-title">Bestellungen von Kunden</h3>
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
                                ID
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Produkt
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Menge
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Lieferdatum
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aktion
                              </th>

                            </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                              <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                  <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" style="background: lightgreen;">
                                  </div>
                                  <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                      Elsen Tank GmbH
                                    </div>
                                    <div class="text-sm text-gray-500">
                                      Mineralölweg 12
                                    </div>
                                  </div>
                                </div>
                              </td>

                              <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">HVO DIN 23A</div>
                                <div class="text-sm text-gray-500">Bleifrei</div>
                              </td>

                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                500 L
                              </td>

                              <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-200 text-green-800">
                                  In Bearbeitung
                                </span>
                              </td>

                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                05.07.21
                              </td>


                              <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
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

        <!-- CONTENT -->
        <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
          <div class="py-4">

            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">


              <div class="px-4 py-5 sm:px-6">
                <h3 class="card-title">Aktuelle Bestellungen</h3>
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
                                ID
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Produkt
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Menge
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Lieferdatum
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aktion
                              </th>

                            </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                              <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                  <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" style="background: lightgreen;">
                                  </div>
                                  <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                      HVO-Öl
                                    </div>
                                    <div class="text-sm text-gray-500">
                                      Subinfo
                                    </div>
                                  </div>
                                </div>
                              </td>

                              <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">HVO DIN 23A</div>
                                <div class="text-sm text-gray-500">Bleifrei</div>
                              </td>

                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                10.000 L
                              </td>

                              <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                                  In Abfüllung
                                </span>
                              </td>

                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                30.06.21
                              </td>


                              <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
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
      </div>
    </main>

@endsection
