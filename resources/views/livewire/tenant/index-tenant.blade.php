<div class="overflow-x-auto border border-gray-200 rounded-lg">
    <table class="min-w-full divide-y divide-gray-300 table-fixed">
        <thead class="bg-gray-50">
            <tr>
                <x-th label="ID" value="id" :canSort="true" :sortField="$sortField" wire:click="sortBy('id')" />
                <x-th label="Name" value="name" :canSort="true" :sortField="$sortField" wire:click="sortBy('name')" />
                <x-th label="Kontakt" value="contact" :canSort="true" :sortField="$sortField" wire:click="sortBy('contact')" />
                <x-th label="Adresse" value="address" :canSort="true" :sortField="$sortField" wire:click="sortBy('address')" />
                <x-th label="Status" value="status" :canSort="true" :sortField="$sortField" wire:click="sortBy('status')" />
                <x-th label="API Calls" value="api_calls_count" :canSort="true" :sortField="$sortField" wire:click="sortBy('api_calls_count')" />
                <x-th label="Locations number" value="locations_count" :canSort="true" :sortField="$sortField" wire:click="sortBy('locations_count')" />
                <x-th label="Products" value="products" :canSort="true" :sortField="$sortField" wire:click="sortBy('products')" />
                <x-th label="Services" value="services" :canSort="true" :sortField="$sortField" wire:click="sortBy('services')" />
                <x-th label="URL Subsite" value="url_subsite" :canSort="true" :sortField="$sortField" wire:click="sortBy('url_subsite')" />
                <x-th label="Beschreibung" value="description" :canSort="true" :sortField="$sortField" wire:click="sortBy('description')" />
                <x-th label="Website" value="website" :canSort="true" :sortField="$sortField" wire:click="sortBy('website')" />
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($tenants as $tenant)
            <tr>
                <td class="whitespace-nowrap py-3 px-3 pl-6 text-sm text-gray-900">
                    {{ $tenant->id }}
                </td>

                <td class="whitespace-nowrap py-3 px-3 pl-6 text-sm text-gray-900">
                    <div>
                        <a href="{{ route('locations.profile-tenants', $tenant->id) }}" class="text-indigo-600">{{ $tenant->name }}</a>
                    </div>
                    <div>
                        <a href="{{ route('locations.profile-tenants', $tenant->id) }}" class="text-indigo-600">{{ $tenant->tenant_type->name }}</a>
                    </div>
                </td>

                <td class="whitespace-nowrap py-3 px-3 pl-6 text-sm text-gray-900">
                    <div>
                        {{ $tenant->phone }}
                    </div>
                    <div>
                        {{ $tenant->email }}
                    </div>
                </td>

                <td class="whitespace-nowrap py-3 px-3 pl-6 text-sm text-gray-900">
                    <div>
                        {{ $tenant->street }}
                    </div>
                    <div>
                        {{ $tenant->zip }} {{ $tenant->city }}
                    </div>
                    <div>
                        {{ $tenant->country }}
                    </div>
                </td>

                <td class="whitespace-nowrap py-3 px-3 pl-6 text-sm text-gray-900">
                    @php
                        $tenant->checkUserToken($tenant);
                    @endphp
                    @if($tenant->userStatus == 0)
                    <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Noch keine Lizenz aktiviert </span>

                    @elseif($tenant->userStatus != 0 && $tenant->userStatus != 100 && $tenant->userStatus != 99 )
                    <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Lizenz wartet auf Freischaltung</span>

                    @elseif($tenant->userStatus == 100)
                    <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Lizenz aktiv</span>
                
                    @elseif($tenant->userStatus == 99)
                    <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10"> Request rejected </span>
                    @endif
                </td>

                <td class="whitespace-nowrap py-3 px-3 pl-6 text-sm text-gray-900">
                    {{ $tenant->api_calls_count }}
                </td>
                <td class="whitespace-nowrap py-3 px-3 pl-6 text-sm text-gray-900">
                    {{ $tenant->locations_count }}
                </td>
                <td class="whitespace-nowrap py-3 px-3 pl-6 text-xs text-gray-900">
                    @foreach ($tenant->products as $product)
                    {{ $product->name }} <br>
                    @endforeach
                </td>
                <td class="whitespace-nowrap py-3 px-3 pl-6 text-xs text-gray-900">
                    @foreach ($tenant->services as $service)
                    <div class="image-container ml-2">
                        @if ($service->base_service_id === 1)
                        <x-svg-icon icon="vacuumer" class="h-6 w-6 text-gray-700" />
                        <span class="tooltip text-gray-500" style="z-index: 10; transform: translateX(-40%);">Vacuum</span>
                        @elseif ($service->base_service_id === 2)
                        <x-svg-icon icon="carwash" class="h-6 w-6 text-gray-700" />
                        <span class="tooltip text-gray-500" style="z-index: 10; transform: translateX(-50%);">Car Wash</span>
                        @elseif ($service->base_service_id === 3)
                        <x-svg-icon icon="bistro" class="h-6 w-6 text-gray-700" />
                        <span class="tooltip text-gray-500" style="z-index: 10; transform: translateX(-50%);">Bistro</span>
                        @endif
                    </div>
                    @endforeach
                </td>

                <td class="whitespace-nowrap py-3 px-3 pl-6 text-sm text-gray-900">
                    {{ $tenant->url_subsite }}
                </td>

                <td class="whitespace-nowrap py-3 px-3 pl-6 text-sm text-gray-900">
                    {{ $tenant->description }}
                </td>

                <td class="whitespace-nowrap py-3 px-3 pl-6 text-sm text-gray-900">
                    <a href="{{ $tenant->website }}" target="_blank" class="text-blue-600 hover:underline">{{ $tenant->website }}</a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>