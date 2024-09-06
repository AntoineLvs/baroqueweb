<div>
    <form wire:submit="submit">
        @csrf

        <!-- Order Type -->
        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">

            <button type="button" wire:click="fillWithDemoData"
                    class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                Demo-Daten ausfüllen
            </button>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="order_type_id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Order Type
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <select wire:model.live="order_type_id" id="order_type_id"
                            class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                            required>
                        <option value="">-- Please choose --</option>
                        @foreach ($order_types as $order_type)
                            @if($order_type)
                                <option wire:key="{{ $order_type['id'] }}" value="{{$order_type->id }}"
                                        selected>{{ $order_type->name }}</option>
                            @else
                                <option wire:key="{{ $order_type['id']}}"
                                        value="{{$order_type->id }}">{{$order_type['name']}}</option>
                            @endif
                        @endforeach

                    </select>
                </div>
            </div>
        </div>

        <!-- Order Status -->
        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="order_status_id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Order Status
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">

                    <select wire:model.live="order_status_id" id="order_status_id"
                            class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                    >
                        <option value="">-- Please choose --</option>
                        @foreach ($order_statuses as $order_status)
                            @if($order_type)
                                <option wire:key="{{ $order_status['id'] }}" value="{{$order_status->id }}"
                                        selected>{{ $order_status->name }}</option>
                            @else
                                <option wire:key="{{ $order_status['id']}}"
                                        value="{{$order_status->id }}">{{$order_status['name']}}</option>
                            @endif
                        @endforeach

                    </select>


                </div>
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

                    @error('customer_company_name') <span class="text-sm text-red-500 mt-2">{{ $message }}</span> @enderror
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
                    @error('customer_contact_firstname') <span class="text-sm text-red-500 mt-2">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Last Name -->
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="customer_contact_lastname" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Last Name
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <input type="text" wire:model="customer_contact_lastname" id="customer_contact_lastname"
                           class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                    @error('customer_contact_lastname') <span class="text-sm text-red-500 mt-2">{{ $message }}</span> @enderror
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
                    @error('customer_street') <span class="text-sm text-red-500 mt-2">{{ $message }}</span> @enderror
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
                    @error('customer_country') <span class="text-sm text-red-500 mt-2">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Customer Order Notice -->
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="customer_order_notice" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Order Notice
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <textarea wire:model="customer_order_notice" id="customer_order_notice" disabled rows="3"
                              class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"></textarea>
                    @error('customer_order_notice') <span class="text-sm text-red-500 mt-2">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Intern Order Notice -->
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="customer_order_notice" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Interne Order Notice
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <textarea wire:model="order_notice" id="order_notice" rows="3"
                              class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"></textarea>
                    @error('order_notice') <span class="text-sm text-red-500 mt-2">{{ $message }}</span> @enderror
                </div>
            </div>

        </div>


        <hr class="mt-4 mb-8">
        <!-- Ordered Products -->
        <div class="sm:flex sm:items-center mt-8">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Ordered Products</h1>
                <p class="mt-2 text-sm text-gray-700">

                    Produktübersicht aus der Order.</p>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">


            </div>




        </div>
        <div class="mt-8 flow-root">

            <!-- Product Selection -->
            <div class="grid grid-cols-5 gap-4 mb-8">
                <div>
                    <label for="product" class="block text-sm font-medium text-gray-700">Product</label>
                    <select wire:model="selected_product_id" id="product"
                            class="block w-full mt-1 rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">-- Please select a product --</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" wire:model="product_quantity" id="quantity" min="1"
                           class="block w-full mt-1 rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price / Unit</label>
                    <input type="number" wire:model="product_price" id="product_price" step="0.01"
                           class="block w-full mt-1 rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="tax" class="block text-sm font-medium text-gray-700">Tax</label>
                    <input type="number" wire:model="product_tax" id="product_tax" step="0.01"
                           class="block w-full mt-1 rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="flex items-end">
                    <button type="button" wire:click="addProduct"
                            class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Add Product
                    </button>
                </div>
            </div>
            <!-- Product Selection -->

            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>

                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price / Unit</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tax</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">

                            @foreach($ordered_products as $ordered_product)
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $ordered_product->product->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $ordered_product->product_quantity }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $ordered_product->product_price }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $ordered_product->product_tax }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $ordered_product->total_amount }}</td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button type="button" wire:click="removeProduct({{ $ordered_product->product_id }})"
                                                class="text-red-600 hover:text-red-900">Remove</button>
                                    </td>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>

                    </div>

                    @if (session()->has('message'))

                        <div class="text-sm text-red-500 mt-2">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="text-sm text-red-500 mt-2">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>


        <!-- Submit Button -->
        <div class="mt-8 border-t border-gray-200 pt-5">
            <div class="pt-5">
                <div class="flex justify-end">
                    <a href="{{ route('orders.index') }}"
                       class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>
                    <button type="submit"
                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Aktualisieren
                    </button>
                </div>
            </div>
        </div>


    </form>
</div>
