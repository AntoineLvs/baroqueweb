<div>
    <x-message-component></x-message-component>

    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200 mt-4">


        <div class="px-4 py-5 sm:px-6">
            <h3 class="card-title">Locations</h3>
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
                                            Locations
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Locations Type
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Product Types
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Address
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Lng / Lat
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            State
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Active on map
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Edit
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                    @foreach ($locations as $location)
                                    <tr>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">



                                                    <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-green" src="{{ $location->image_path }}" alt="">



                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $location->name }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        ID: {{ $location->id }} @if (!auth()->user()->Tenant) {{ $location->tenant->name ?? 'admin' }} @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900"><b>{{ $location->location_type->name}}</b></div>
                                            <div class="text-sm text-gray-900">{{ Str::limit($location->description, 20) }} </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center">
                                                    @php

                                                    $productTypes = $location->getProductTypes();
                                                    $isHvo100 = $productTypes->contains('id', 1);
                                                    $isHvoBlend = $productTypes->contains('id', 2);

                                                    @endphp
                                                    <div>
                                                        <button type="button" class="text-xs cursor-default	rounded-full {{ $isHvo100 ? 'bg-blue-600' : 'bg-gray-600' }} px-2.5 py-1 font-semibold text-white shadow-sm">
                                                            HVO 100
                                                        </button>

                                                    </div>
                                                    <div class="ml-2">
                                                        <button type="button" class="text-xs cursor-default	rounded-full {{ $isHvoBlend ? 'bg-blue-600' : 'bg-gray-600' }} px-2.5 py-1 font-semibold text-white shadow-sm">
                                                            HVO Blend
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>



                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{$location->address}},<br>
                                            {{$location->zipcode}} {{$location->city}}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{$location->lng}}<br>
                                            {{$location->lat}}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">

                                            @if ($location->active && $location->verified == 1)
                                            <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                                                Public / Visible
                                            </span>

                                            @elseif ($location->active == 1 && $location->verified == 0)
                                            <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-yellow-800">
                                                awaiting verification
                                            </span>

                                            @else
                                            <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-red-800">
                                                not visible
                                            </span>
                                            @endif


                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                            @livewire('components.toggle-button', ['model' => $location, 'field' => 'active'], key($location->id))
                                        </td>


                                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">


                                            <a href="{{ route('locations.edit', $location) }}" data-toggle="tooltip" data-placement="bottom" title="Edit Project">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>

                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">

                                            <form action="{{ route('locations.destroy', $location) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" data-toggle="tooltip" data-placement="bottom" title="Delete Product" onclick="confirm('Are you sure you want to remove this location? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                        {{ $locations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>