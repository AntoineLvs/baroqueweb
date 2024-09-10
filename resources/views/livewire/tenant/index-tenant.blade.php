<div class="overflow-x-auto border border-gray-200 rounded-lg">
    <table class="min-w-full divide-y divide-gray-300 table-fixed">
        <thead class="bg-gray-50">
            <tr>
                <x-th label="ID" value="id" :canSort="true" :sortField="$sortField" wire:click="sortBy('id')"/>
                <x-th label="Name" value="name" :canSort="true" :sortField="$sortField" wire:click="sortBy('name')"/>
                <x-th label="Kontakt" value="contact" :canSort="true" :sortField="$sortField" wire:click="sortBy('contact')"/>
                <x-th label="Adresse" value="address" :canSort="true" :sortField="$sortField" wire:click="sortBy('address')"/>
                <x-th label="Status" value="status" :canSort="true" :sortField="$sortField" wire:click="sortBy('status')"/>
                <x-th label="API Calls" value="api_calls_count" :canSort="true" :sortField="$sortField" wire:click="sortBy('api_calls_count')"/>
                <x-th label="URL Subsite" value="url_subsite" :canSort="true" :sortField="$sortField" wire:click="sortBy('url_subsite')"/>
                <x-th label="Beschreibung" value="description" :canSort="true" :sortField="$sortField" wire:click="sortBy('description')"/>
                <x-th label="Website" value="website" :canSort="true" :sortField="$sortField" wire:click="sortBy('website')"/>
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
                        {{ $tenant->name }}
                    </div>
                    <div>
                        {{ $tenant->tenant_type->name }}
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
                    {{ $tenant->status }}
                </td>

                <td class="whitespace-nowrap py-3 px-3 pl-6 text-sm text-gray-900">
                    {{ $tenant->api_calls_count }}
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
