<!-- Location List -->
<div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
    <div class="py-4">

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">

            <!-- Locations todo list -->
            <div class="px-4 py-5 sm:px-6">
                <h3 class="card-title">Locations todos </h3>
                <!-- We use less vertical padding on card headers on desktop than on body sections -->
            </div>

            <!-- Locations history list -->
            <div class="px-4 py-5 sm:p-6">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Location
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Location Type
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Location Data
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                State
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Verification
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Edit
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Push Online
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
                                                            {{ $location->tenant->name }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            TID: {{ $location->tenant->id }} | LID: {{ $location->id }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $location->name }}

                                                </div>

                                                <div class="text-sm text-gray-900">

                                                    <b>{{ $location->location_type->name}}</b>
                                                </div>


                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{$location->address}},<br>
                                                {{$location->zipcode}} {{$location->city}}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">

                                                @if ($location->active && $location->verified == 1)
                                                <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                                                    Public verfified
                                                </span>
                                                @elseif ($location->active == 1 && $location->verified == 0)

                                                <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-yellow-800">
                                                    in process
                                                </span>

                                                @else
                                                <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-red-800">
                                                    not visible
                                                </span>
                                                @endif


                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">



                                                @php
                                                $statusInfo = $location->getStatus();
                                                @endphp
                                                <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $statusInfo['color'] }}-200 text-{{ $statusInfo['color'] }}-800">
                                                    {{ $statusInfo['text'] }}
                                                </span>

                                            </td>


                                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">


                                                <a href="{{ route('locations.edit', $location) }}" data-toggle="tooltip" data-placement="bottom" title="Edit Project">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>

                                            </td>

                                            <!-- <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                                <button type="button" wire:click="insertLocation({{ $location }})">

                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                </button>
                                            </td> -->

                                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                                @if($location->active == 0 )
                                                <form method="POST" action="{{ route('admin.disableLocation', ['location' => $location]) }}">
                                                    @csrf
                                                    <button type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </button>
                                                </form>

                                                @else
                                                <form method="POST" action="{{ route('admin.queueLocation', ['location' => $location]) }}">
                                                    @csrf
                                                    <button type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </button>
                                                </form>
                                                @endif
                                            </td>



                                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">

                                                <form class="" action="{{ route('locations.destroy', $location) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" data-toggle="tooltip" data-placement="bottom" title="Delete Location" onclick="confirm('Are you sure you want to remove this location? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mt-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>



                                        </tr>

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
<!-- Location List END -->