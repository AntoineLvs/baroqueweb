<div>


    <!-- Display Results -->


    @if($products)

    <div class="pt-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Content goes here -->


        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Produktübersicht
                        @if($tenant_id == null)
                        <span class="ml-6 inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">You must be connected to access this fonctionnality </span>
                        @endif
                    </h1>

                </div>

            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                            PID
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Produkt
                                        </th>

                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Typ
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Händler
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Info
                                        </th>

                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Anfragen</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">


                                    @foreach($products as $product)

                                    <tr>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                            {{ $product->id }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $product->name }}
                                        </td>

                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $product->base_product->product_type->name }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">

                                            ({{ $product->tenant->id }}) {{ $product->tenant->name }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $product->infos }}
                                        </td>

                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            @if($tenant_id == null)
                                            <button class="text-gray-800 cursor-not-allowed" data-tooltip-target="tooltip-login-first" data-tooltip-trigger="hover" data-tooltip-content="Please log in first">Anfragen</button>
                                            @else
                                            <a href="{{ route('product-finder.product-finder-shop', ['product' => $product ]) }}" class="text-indigo-600 hover:text-indigo-900">Anfragen<span
                                                    class="sr-only"> Anfragen </span></a>
                                            @endif

                                        </td>
                                    </tr>


                                    @endforeach








                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



            </div>
        </div>


    </div>

    <div>
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <!-- Filters -->
            <section aria-labelledby="filter-heading" class="pt-6">
                <h2 id="filter-heading" class="sr-only">Product filters</h2>

                <div class="flex items-center justify-between">
                    <div x-data="{ showFilters: false }" class="relative inline-block text-left" @click.away="showFilters = false">
                        <div>
                            <button @click="showFilters = !showFilters" type="button" class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900">
                                Product Type
                                <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div x-show="showFilters" x-collapse class="absolute left-0 z-10 mt-2 w-40 origin-top-left rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5">
                            <div class="py-1">
                                @foreach($product_types as $product_type)
                                <a href="#" @click="showFilters = false" wire:click.prevent="$set('selectedProductType', {{ $product_type->id }})" class="block px-4 py-2 text-sm font-medium text-gray-900">
                                    {{ $product_type->name }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Product grid -->
            <section aria-labelledby="products-heading" class="mt-8">
                <h2 id="products-heading" class="sr-only">Products</h2>

                <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                    @foreach($products as $product)
                    <a href="{{ route('product-finder.product-finder-shop', ['product' => $product ]) }}" class="group">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg sm:aspect-h-3 sm:aspect-w-2">
                            <img src="https://tailwindui.com/plus/img/ecommerce-images/category-page-01-image-card-01.jpg" alt="Product Image" class="h-full w-full object-cover object-center group-hover:opacity-75">
                        </div>
                        <div class="mt-4 flex items-center justify-between text-base font-medium text-gray-900">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ $product->price ?? '--.--' }} €</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="mt-1 text-sm italic text-gray-500">{{ $product->tenant->name }}</p>
                            <p class="mt-1 text-sm italic text-gray-500">50 liters available ??</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </section>
        </div>
    </div>

    @endif

</div>