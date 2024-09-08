<div>
    <form wire:submit="submit">
        @csrf

        <button type="button" wire:click="fillWithDemoData"
                class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
            Demo-Daten ausfüllen
        </button>

        <!-- Order Type -->
        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">


            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="order_type_id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Shipping Status
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <select wire:model.live="shipping_status_id" id="shipping_status_id"
                            class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                            required>
                        <option value="">-- Please choose --</option>
                        @foreach ($shipping_statuses as $shipping_status)
                            @if($shipping_status)
                                <option wire:key="{{ $shipping_status['id'] }}" value="{{$shipping_status->id }}"
                                        selected>{{ $shipping_status->name }}</option>
                            @else
                                <option wire:key="{{ $shipping_status['id']}}"
                                        value="{{$shipping_status->id }}">{{$shipping_status['name']}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="order_type_id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    From Tenant (Auftraggeber)
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <select wire:model.live="from_tenant_id" id="from_tenant_id"
                            class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                            required>
                        <option value="">-- Please choose --</option>
                        @foreach ($tenants as $from_tenant)
                            @if($from_tenant)
                                <option wire:key="{{ $from_tenant['id'] }}" value="{{$from_tenant->id}}"
                                        selected>{{ $from_tenant->name }}</option>
                            @else
                                <option wire:key="{{ $from_tenant['id']}}"
                                        value="{{$from_tenant->id }}">{{$from_tenant['name']}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('from_tenant_id') <span
                        class="text-sm text-red-500 mt-2">{{ $message }}</span> @enderror
                </div>
            </div>


            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="to_tenant_id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    To Tenant (optional)
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <select wire:model.live="to_tenant_id" id="to_tenant_id"
                            class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                            required>
                        <option value="">-- Please choose --</option>
                        @foreach ($tenants as $to_tenant)
                            @if($to_tenant)
                                <option wire:key="{{ $to_tenant['id'] }}" value="{{$to_tenant->id}}"
                                        selected>{{ $to_tenant->name }}</option>
                            @else
                                <option wire:key="{{ $to_tenant['id']}}"
                                        value="{{$to_tenant->id }}">{{$to_tenant['name']}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('to_tenant_id') <span
                        class="text-sm text-red-500 mt-2">{{ $message }}</span> @enderror
                </div>
            </div>


            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="shipper_tenant_id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Shipper Tenant
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <select wire:model.live="shipper_tenant_id" id="shipper_tenant_id"
                            class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                            required>
                        <option value="">-- Please choose --</option>
                        @foreach ($shipper_tenants as $shipper)
                            @if($shipper)
                                <option wire:key="{{ $shipper['id'] }}" value="{{$shipper->id}}"
                                        selected>{{ $shipper->name }}</option>
                            @else
                                <option wire:key="{{ $shipper['id']}}"
                                        value="{{$shipper->id }}">{{$shipper['name']}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('shipper_tenant_id') <span
                        class="text-sm text-red-500 mt-2">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="date_of_shipping" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Date of Shipping
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">

                    <div class="max-w-lg block  w-full">
                        <x-date wire:model="date_of_shipping"/>
                    </div>
                    </select>
                </div>
            </div>


            <hr class="mt-4 mb-8">
            <!-- Ordered Products -->
            <div class="sm:flex sm:items-center mt-8">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Lieferinformationen</h1>
                    <p class="mt-2 text-sm text-gray-700">

                        Lieferdetails zum Shipping Auftrag.</p>
                </div>
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">


                </div>
            </div>


            <!-- Customer Information -->
            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                <!-- Company Name -->
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="customer_company_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Company Name
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="text" wire:model="customer_company_name" id="customer_company_name"
                               class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                        >

                        @error('customer_company_name') <span
                            class="text-sm text-red-500 mt-2">{{ $message }}</span> @enderror
                    </div>


                </div>

                <!-- First Name -->
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="customer_contact_firstname"
                           class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        First Name
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="text" wire:model="customer_contact_firstname" id="customer_contact_firstname"
                               class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        @error('customer_contact_firstname') <span
                            class="text-sm text-red-500 mt-2">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Last Name -->
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="customer_contact_lastname"
                           class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Last Name
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="text" wire:model="customer_contact_lastname" id="customer_contact_lastname"
                               class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        @error('customer_contact_lastname') <span
                            class="text-sm text-red-500 mt-2">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="customer_email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Email
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="email" wire:model="customer_email" id="customer_email"
                               class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        @error('customer_email') <span class="text-sm text-red-500 mt-2">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Phone -->
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="customer_phone" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Phone
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="tel" wire:model="customer_phone" id="customer_phone"
                               class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        @error('customer_phone') <span class="text-sm text-red-500 mt-2">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Street -->
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="customer_street" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Street
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="text" wire:model="customer_street" id="customer_street"
                               class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        @error('customer_street') <span
                            class="text-sm text-red-500 mt-2">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- ZIP -->
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="customer_zip" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        ZIP Code
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="text" wire:model="customer_zip" id="customer_zip"
                               class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        @error('customer_zip') <span class="text-sm text-red-500 mt-2">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- City -->
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="customer_city" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        City
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="text" wire:model="customer_city" id="customer_city"
                               class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        @error('customer_city') <span class="text-sm text-red-500 mt-2">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Country -->
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="customer_country" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Country
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="text" wire:model="customer_country" id="customer_country"
                               class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        @error('customer_country') <span
                            class="text-sm text-red-500 mt-2">{{ $message }}</span> @enderror
                    </div>
                </div>


                <!-- Intern Order Notice -->
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="customer_order_notice" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Customer Order Notice
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <textarea wire:model="customer_order_notice" id="customer_order_notice" rows="3" disabled
                              class="max-w-lg block w-full shadow-sm focus:ring-gray-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"></textarea>
                        @error('customer_order_notice') <span class="text-sm text-red-500 mt-2">{{ $message }}</span> @enderror
                    </div>
                </div>


                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="shipping_notice" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Shipping Notice
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <textarea wire:model="shipping_notice" id="shipping_order_notice" rows="3"
                              class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"></textarea>
                        @error('shipping_notice') <span class="text-sm text-red-500 mt-2">{{ $message }}</span> @enderror
                    </div>
                </div>

            </div>


            <!-- Submit Button -->
            <div class="mt-8 border-t border-gray-200 pt-5">
                <div class="pt-5">
                    <div class="flex justify-end">
                        <a href="{{ route('shippings.index') }}"
                           class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>
                        <button type="submit"
                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Create Shipping
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
