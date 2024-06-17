<div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Token ID
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    User
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tenant
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Created At
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Expire On
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Edit
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                </th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($api_tokens as $api_token)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"> {{$api_token->id}} </div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-indigo-500 mb-4">
                                        @if($api_token->user->tenant)
                                        <select wire:model.live="selectedUserId" class="form-select mt-2 block w-1/2 rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option>Bitte auswählen</option>

                                            @foreach ($api_token->user->tenant->users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->id }}</option>
                                            @endforeach
                                        </select>
                                        @else
                                        <div class="text-sm text-gray-500">Admin</div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"> {{ $api_token->tenant->name ?? 'Null' }} </div>
                                    <div class="text-sm text-gray-500">{{$api_token->tenant->id ?? 'Null' }}</div>

                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"> {{ $api_token->created_at->format('d-m-Y') }} </div>

                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ date('d-m-Y', strtotime($api_token->expires_at)) }}</div>

                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">

                                    <a href="{{ route('api-token.edit', $api_token) }}" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>


                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">

                                    <form action="{{ route('api-dashboard.destroy', $api_token) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="button" data-toggle="tooltip" data-placement="bottom" title="Delete project" onclick="confirm('Are you sure you want to remove this Token? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>


                            </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>
                <div>
                    @if($selectedUserId)
                    <a class="mt-4 mr-4 inline-flex items-center px-4 py-2 border border-transparent
                        text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ $url }}">{{$userName}} Profile</a>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
