<div class="mx-auto mt-8 max-w-2xl px-4 pb-16 sm:px-6 sm:pb-24 lg:max-w-7xl lg:px-8">
    <div class="lg:grid lg:auto-rows-min lg:grid-cols-12 lg:gap-x-8">
        <div class="lg:col-span-5 lg:col-start-8">
            <div class="flex justify-between">
                <h1 class="text-xl font-medium text-gray-900">{{ $product->name}}</h1>
                <p class="text-xl font-medium text-gray-900">Preis auf Anfrage</p>
            </div>
        </div>

        <!-- Image gallery -->
        <div class="mt-8 lg:col-span-7 lg:col-start-1 lg:row-span-3 lg:row-start-1 lg:mt-0">
            <h2 class="sr-only">Images</h2>

            <img src="{{ asset('assets/img/xtl-freigaben.jpg') }}" alt="Product Image" class="h-full rounded-lg  object-cover object-center lg:col-span-2 lg:row-span-2">

        </div>

        <div class="mt-8 lg:col-span-5">
            <!-- Size picker -->
            <div class="mt-8">
                <div class="flex items-center justify-between">
                    <h2 class="text-sm font-medium text-gray-900">Product Unit</h2>
                </div>

                <fieldset aria-label="Choose a size" class="mt-2">
                    <div class="grid grid-cols-3 gap-3 sm:grid-cols-6">
                        @foreach($product_units as $product_unit)
                        <label
                            class="flex cursor-pointer items-center justify-center rounded-md border px-3 py-3 text-sm font-medium focus:outline-none sm:flex-1
                {{ $selected_unit == $product_unit->id ? 'bg-indigo-600 text-white' : 'bg-white text-gray-900 hover:bg-gray-50' }}">
                            <input type="radio" name="size-choice" wire:model.live="selected_unit" value="{{ $product_unit->id }}" class="sr-only">
                            <span>{{ $product_unit->name }}</span>
                        </label>
                        @endforeach
                    </div>
                </fieldset>


            </div>
            <div class="mt-8">
                <div class="flex items-center justify-between">
                    <h2 class="text-sm font-medium text-gray-900">Anfragemenge</h2>
                </div>
                <div>
                    <input type="number" wire:model.live="quantity" name="quantity" id="quantity" min="1" max="10" value="1" class="mt-4 max-w-lg block shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                </div>


            </div>

            <a href="{{ route('orders.public-product-request', ['product' => $product->id, 'quantity' => $quantity, 'unit' => $selected_unit]) }}" type="submit" class="mt-8 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
            {{ $quantity > 0 && $selected_unit !== null ? '' : 'cursor-not-allowed opacity-50' }}">
                Anfrage erstellen
            </a>
            <!-- Product details -->
            <div class="mt-10">
                <h2 class="text-sm font-medium text-gray-900">Description</h2>

                <div class="prose prose-sm mt-4 text-gray-500">
                    {{ $product->data ?? 'No Description Available' }}
                </div>
            </div>    
        </div>
    </div>

    <!-- Related products -->
    <section aria-labelledby="related-heading" class="mt-16 sm:mt-24">
        <h2 id="related-heading" class="text-lg font-medium text-gray-900">Other products</h2>

        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @foreach($products as $product)
            <div class="group relative">
                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md lg:aspect-none group-hover:opacity-75 lg:h-80">
                    <img src="{{ asset('assets/img/xtl-freigaben.jpg') }}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-sm text-gray-700">
                            <a href="{{ route('product-finder.product-finder-shop', ['product' => $product ]) }}">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                {{ $product->name }}
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">{{ $product->tenant->name }}</p>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- More products... -->
        </div>
    </section>

</div>