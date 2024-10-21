<div>
    <x-message-component></x-message-component>

    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200 mt-4">

        <div class="px-4 py-5 sm:px-6">
            <h3 class="card-title">Clients</h3>
        </div>
        <div class="px-4 py-5 sm:p-6">

            @if($clients->count() == 0 )

            <a href="{{ route('clients.create') }}" class="relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-6 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer">
                <svg class="mx-auto h-12 w-12 text-gray-500" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="block text-sm font-medium text-gray-500">
                    There is not any Client yet. Create a Client now.
                </span>
            </a>


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
                                            Description
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Active
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Client Type
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Edit
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                    @foreach ($clients as $client)
                                    <tr>


                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-indigo-700"> <a href="{{ route('clients.show', $client) }}">
                                                    {{ $client->name}}
                                                </a>
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                ID: {{ $client->id }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                <div class="image-container">
                                                    <div class="flex items-center justify-center">
                                                        {{ Illuminate\Support\Str::limit($client->description, $limit = 35, $end = '...') }}

                                                        <span class="tooltip text-gray-500"
                                                            style="z-index: 10; transform: translateX(-50%);">{{ $client->description}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @php
                                            $statusInfo = $client->getStatus();
                                            @endphp
                                            <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $statusInfo['color'] }}-200 text-{{ $statusInfo['color'] }}-800">
                                                {{ $statusInfo['text'] }}
                                            </span>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @livewire('components.toggle-button', ['model' => $client, 'field' => 'active'], key($client->id))
                                        </td>


                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

                                            <div class="text-sm text-gray-900">{{ $client->client_type->name}}</div>

                                        </td>


                                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">


                                            <a href="{{ route('clients.edit', $client) }}" data-toggle="tooltip" data-placement="bottom" title="Edit Product">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>





                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">


                                            <form action="{{ route('clients.destroy', $client) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" data-toggle="tooltip" data-placement="bottom" title="Delete License" onclick="confirm('Are you sure you want to remove this Client? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
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




        </div>

    </div>
</div>