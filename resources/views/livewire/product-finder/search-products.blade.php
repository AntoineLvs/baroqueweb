<div>


    <!-- Display Results -->


    @if($products)

    <div class="pt-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Content goes here -->


        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Produktübersicht

                    </h1>

                </div>

            </div>

            <div x-data="{ isShopView: false }">
                <div class="flex items-center w-full justify-center mt-6">
                    <span class="isolate inline-flex rounded-md shadow-sm">
                        <button
                            @click="isShopView = false"
                            type="button"
                            class="relative inline-flex items-center rounded-l-md px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 focus:z-10"
                            :class="{ 'bg-gray-100 hover:bg-gray-200': !isShopView, 'bg-white hover:bg-gray-100': isShopView }">
                            List View
                        </button>

                        <button
                            @click="isShopView = true"
                            type="button"
                            class="relative -ml-px inline-flex items-center rounded-r-md px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 focus:z-10"
                            :class="{ 'bg-gray-100 hover:bg-gray-200': isShopView, 'bg-white hover:bg-gray-100': !isShopView }">
                            Shop View
                        </button>
                    </span>
                </div>

                <div class="mt-6">


                    <!-- List View -->
                    <div x-show="!isShopView">
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


                                                @foreach($listProducts as $product)

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

                                                        <a href="{{ route('product-finder.product-finder-shop', ['product' => $product ]) }}" class="text-indigo-600 hover:text-indigo-900">Anfragen<span
                                                                class="sr-only"> Anfragen </span></a>
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


                    <!-- Shop View -->
                    <div x-show="isShopView">
                        <div class="mx-auto max-w-2xl px-4 lg:max-w-7xl lg:px-8 ">

                            <div class="pb-24 pt-12 lg:grid lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4 border-t border-gray-200 pb-10 pt-10">
                                <!-- Mobile filter dialog toggle, controls the 'mobileFilterDialogOpen' state. -->
                                <button type="button" class="inline-flex items-center lg:hidden" wire:click="toggleMobileFilterDialog">
                                    <span class="text-sm font-medium text-gray-700">Filters</span>
                                    <svg class="ml-1 h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                    </svg>
                                </button>
                                <div class="fixed inset-0 z-40 flex lg:hidden z-50" x-data="{ open: @entangle('mobileFilterDialogOpen') }" x-show="open" style="display: none; z-index: 999;">
                                    <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>

                                    <div class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl">
                                        <div class="flex items-center justify-between px-4">
                                            <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                                            <button type="button" class="relative -mr-2 flex h-10 w-10 items-center justify-center p-2 text-gray-400 hover:text-gray-500"
                                                wire:click="toggleMobileFilterDialog">
                                                <span class="sr-only">Close menu</span>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- Filters -->
                                        <form class="mt-4 space-y-10 divide-y divide-gray-200 px-4">
                                            <!-- Product Type -->
                                            <fieldset>
                                                <legend class="block text-sm font-medium text-gray-900">Product Type</legend>
                                                <div class="space-y-3 pt-6">
                                                    @foreach($product_types as $product_type)
                                                    <div class="flex items-center">
                                                        <input id="product-{{ $product_type->id }}"
                                                            name="product_type"
                                                            wire:model.live="selectedProductType"
                                                            value="{{ $product_type->id }}"
                                                            type="radio"
                                                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                        <label for="product-{{ $product_type->id }}" class="ml-3 text-sm text-gray-600">
                                                            {{ $product_type->name }}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </fieldset>

                                            <!-- Categories -->
                                            <fieldset class="pt-6">
                                                <legend class="text-sm font-medium text-gray-900">Category</legend>
                                                <div class="space-y-6 pt-4">
                                                    <div class="flex items-center">
                                                        <input id="category-0-mobile" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                        <label for="category-0-mobile" class="ml-3 text-sm text-gray-500">All New Arrivals</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input id="category-1-mobile" name="category[]" value="tees" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                        <label for="category-1-mobile" class="ml-3 text-sm text-gray-500">Tees</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input id="category-2-mobile" name="category[]" value="crewnecks" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                        <label for="category-2-mobile" class="ml-3 text-sm text-gray-500">Crewnecks</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input id="category-3-mobile" name="category[]" value="sweatshirts" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                        <label for="category-3-mobile" class="ml-3 text-sm text-gray-500">Sweatshirts</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input id="category-4-mobile" name="category[]" value="pants-shorts" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                        <label for="category-4-mobile" class="ml-3 text-sm text-gray-500">Pants &amp; Shorts</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <!-- Sizes -->
                                            <fieldset class="pt-6">
                                                <legend class="text-sm font-medium text-gray-900">Sizes</legend>
                                                <div class="space-y-6 pt-4">
                                                    <div class="flex items-center">
                                                        <input id="sizes-0-mobile" name="sizes[]" value="xs" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                        <label for="sizes-0-mobile" class="ml-3 text-sm text-gray-500">XS</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input id="sizes-1-mobile" name="sizes[]" value="s" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                        <label for="sizes-1-mobile" class="ml-3 text-sm text-gray-500">S</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input id="sizes-2-mobile" name="sizes[]" value="m" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                        <label for="sizes-2-mobile" class="ml-3 text-sm text-gray-500">M</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input id="sizes-3-mobile" name="sizes[]" value="l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                        <label for="sizes-3-mobile" class="ml-3 text-sm text-gray-500">L</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input id="sizes-4-mobile" name="sizes[]" value="xl" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                        <label for="sizes-4-mobile" class="ml-3 text-sm text-gray-500">XL</label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input id="sizes-5-mobile" name="sizes[]" value="2xl" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                        <label for="sizes-5-mobile" class="ml-3 text-sm text-gray-500">2XL</label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>

                                <aside>
                                    <h2 class="sr-only">Filters</h2>

                                    <div class="hidden lg:block">
                                        <form class="space-y-10 divide-y divide-gray-200">
                                            <div>
                                                <fieldset>
                                                    <legend class="block text-sm font-medium text-gray-900">Product Type</legend>
                                                    <div class="space-y-3 pt-6">
                                                        @foreach($product_types as $product_type)
                                                        <div class="flex items-center">
                                                            <input id="product-{{ $product_type->id }}"
                                                                name="product_type"
                                                                wire:model.live="selectedProductType"
                                                                value="{{ $product_type->id }}"
                                                                type="radio"
                                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                            <label for="product-{{ $product_type->id }}" class="ml-3 text-sm text-gray-600">
                                                                {{ $product_type->name }}
                                                            </label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="pt-10">
                                                <fieldset>
                                                    <legend class="block text-sm font-medium text-gray-900">Category</legend>
                                                    <div class="space-y-3 pt-6">
                                                        <div class="flex items-center">
                                                            <input id="category-0" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                            <label for="category-0" class="ml-3 text-sm text-gray-600">All New Arrivals</label>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <input id="category-1" name="category[]" value="tees" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                            <label for="category-1" class="ml-3 text-sm text-gray-600">Tees</label>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <input id="category-2" name="category[]" value="crewnecks" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                            <label for="category-2" class="ml-3 text-sm text-gray-600">Crewnecks</label>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <input id="category-3" name="category[]" value="sweatshirts" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                            <label for="category-3" class="ml-3 text-sm text-gray-600">Sweatshirts</label>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <input id="category-4" name="category[]" value="pants-shorts" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                            <label for="category-4" class="ml-3 text-sm text-gray-600">Pants &amp; Shorts</label>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="pt-10">
                                                <fieldset>
                                                    <legend class="block text-sm font-medium text-gray-900">Sizes</legend>
                                                    <div class="space-y-3 pt-6">
                                                        <div class="flex items-center">
                                                            <input id="sizes-0" name="sizes[]" value="xs" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                            <label for="sizes-0" class="ml-3 text-sm text-gray-600">XS</label>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <input id="sizes-1" name="sizes[]" value="s" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                            <label for="sizes-1" class="ml-3 text-sm text-gray-600">S</label>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <input id="sizes-2" name="sizes[]" value="m" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                            <label for="sizes-2" class="ml-3 text-sm text-gray-600">M</label>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <input id="sizes-3" name="sizes[]" value="l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                            <label for="sizes-3" class="ml-3 text-sm text-gray-600">L</label>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <input id="sizes-4" name="sizes[]" value="xl" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                            <label for="sizes-4" class="ml-3 text-sm text-gray-600">XL</label>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <input id="sizes-5" name="sizes[]" value="2xl" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                            <label for="sizes-5" class="ml-3 text-sm text-gray-600">2XL</label>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </form>
                                    </div>
                                </aside>

                                <section aria-labelledby="product-heading" class="mt-6 lg:col-span-2 lg:mt-0 xl:col-span-3">
                                    <h2 id="product-heading" class="sr-only">Products</h2>
                                    @if($products->isEmpty())
                                    <div class="flex items-center w-full justify-center mt-20">
                                        <div class="text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                                            </svg>

                                            <h3 class="mt-2 text-sm font-semibold text-gray-900">No products</h3>
                                            <p class="mt-1 text-sm text-gray-500">There is no products in this category</p>
                                            <div class="mt-6">
                                                <button type="button"
                                                    class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                                    wire:click="resetFilters">
                                                    <svg class="-ml-0.5 mr-1.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                    </svg>
                                                    Reset Filters
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                    @endif
                                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-8">

                                        @foreach($products as $product)
                                        <a href="{{ route('product-finder.product-finder-shop', ['product' => $product ]) }}" class="group">

                                            <div class="group relative flex flex-col overflow-hidden rounded-lg border border-gray-200 bg-white h-full">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ asset('assets/img/xtl-freigaben.jpg') }}" alt="Product Image" class="h-full w-full object-cover object-center">
                                                </div>
                                                <div class="flex flex-1 flex-col justify-between p-4">
                                                    <h3 class="text-base font-medium text-gray-900">{{ $product->name }}</h3>
                                                    <div class="flex flex-col justify-end">
                                                        <p class="text-sm italic text-gray-500">{{ $product->tenant->name }}</p>
                                                        <p class="text-sm italic text-gray-500">{{ $product->product_unit->name }}</p>
                                                        <p class="text-sm font-medium text-gray-900">{{ $product->product_type->name }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    @endif

</div>