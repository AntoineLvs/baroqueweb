<div class="mx-auto mt-8 max-w-2xl px-4 pb-16 sm:px-6 sm:pb-24 lg:max-w-7xl lg:px-8">
    <div class="lg:grid lg:auto-rows-min lg:grid-cols-12 lg:gap-x-8">
        <div class="lg:col-span-5 lg:col-start-8">
            <div class="flex justify-between">
                <h1 class="text-xl font-medium text-gray-900">{{ $product->name}}</h1>
                <p class="text-xl font-medium text-gray-900">{{ $product->price ?? '--.--'}} €</p>
            </div>
        </div>

        <!-- Image gallery -->
        <div class="mt-8 lg:col-span-7 lg:col-start-1 lg:row-span-3 lg:row-start-1 lg:mt-0">
            <h2 class="sr-only">Images</h2>

            <div class="grid lg:gap-8">
                <img src="https://tailwindui.com/plus/img/ecommerce-images/category-page-01-image-card-01.jpg" alt="Person using a pen to cross a task off a productivity paper card." class="rounded-lg lg:col-span-2 lg:row-span-2">

            </div>
        </div>

        <div class="mt-8 lg:col-span-5">
            <!-- Size picker -->
            <div class="mt-8">
                <div class="flex items-center justify-between">
                    <h2 class="text-sm font-medium text-gray-900">Size</h2>
                </div>

                <fieldset aria-label="Choose a size" class="mt-2">
                    <div class="grid grid-cols-3 gap-3 sm:grid-cols-6">
                        <!--
                  In Stock: "cursor-pointer", Out of Stock: "opacity-25 cursor-not-allowed"
                  Active: "ring-2 ring-indigo-500 ring-offset-2"
                  Checked: "border-transparent bg-indigo-600 text-white hover:bg-indigo-700", Not Checked: "border-gray-200 bg-white text-gray-900 hover:bg-gray-50"
                -->
                        <label class="flex cursor-pointer items-center justify-center rounded-md border px-3 py-3 text-sm font-medium uppercase focus:outline-none sm:flex-1">
                            <input type="radio" name="size-choice" value="XXS" class="sr-only">
                            <span>XXS</span>
                        </label>
                        <!--
                  In Stock: "cursor-pointer", Out of Stock: "opacity-25 cursor-not-allowed"
                  Active: "ring-2 ring-indigo-500 ring-offset-2"
                  Checked: "border-transparent bg-indigo-600 text-white hover:bg-indigo-700", Not Checked: "border-gray-200 bg-white text-gray-900 hover:bg-gray-50"
                -->
                        <label class="flex cursor-pointer items-center justify-center rounded-md border px-3 py-3 text-sm font-medium uppercase focus:outline-none sm:flex-1">
                            <input type="radio" name="size-choice" value="XS" class="sr-only">
                            <span>XS</span>
                        </label>
                        <!--
                  In Stock: "cursor-pointer", Out of Stock: "opacity-25 cursor-not-allowed"
                  Active: "ring-2 ring-indigo-500 ring-offset-2"
                  Checked: "border-transparent bg-indigo-600 text-white hover:bg-indigo-700", Not Checked: "border-gray-200 bg-white text-gray-900 hover:bg-gray-50"
                -->
                        <label class="flex cursor-pointer items-center justify-center rounded-md border px-3 py-3 text-sm font-medium uppercase focus:outline-none sm:flex-1">
                            <input type="radio" name="size-choice" value="S" class="sr-only">
                            <span>S</span>
                        </label>
                        <!--
                  In Stock: "cursor-pointer", Out of Stock: "opacity-25 cursor-not-allowed"
                  Active: "ring-2 ring-indigo-500 ring-offset-2"
                  Checked: "border-transparent bg-indigo-600 text-white hover:bg-indigo-700", Not Checked: "border-gray-200 bg-white text-gray-900 hover:bg-gray-50"
                -->
                        <label class="flex cursor-pointer items-center justify-center rounded-md border px-3 py-3 text-sm font-medium uppercase focus:outline-none sm:flex-1">
                            <input type="radio" name="size-choice" value="M" class="sr-only">
                            <span>M</span>
                        </label>
                        <!--
                  In Stock: "cursor-pointer", Out of Stock: "opacity-25 cursor-not-allowed"
                  Active: "ring-2 ring-indigo-500 ring-offset-2"
                  Checked: "border-transparent bg-indigo-600 text-white hover:bg-indigo-700", Not Checked: "border-gray-200 bg-white text-gray-900 hover:bg-gray-50"
                -->
                        <label class="flex cursor-pointer items-center justify-center rounded-md border px-3 py-3 text-sm font-medium uppercase focus:outline-none sm:flex-1">
                            <input type="radio" name="size-choice" value="L" class="sr-only">
                            <span>L</span>
                        </label>
                        <!--
                  In Stock: "cursor-pointer", Out of Stock: "opacity-25 cursor-not-allowed"
                  Active: "ring-2 ring-indigo-500 ring-offset-2"
                  Checked: "border-transparent bg-indigo-600 text-white hover:bg-indigo-700", Not Checked: "border-gray-200 bg-white text-gray-900 hover:bg-gray-50"
                -->
                        <label class="flex cursor-not-allowed items-center justify-center rounded-md border px-3 py-3 text-sm font-medium uppercase opacity-25 sm:flex-1">
                            <input type="radio" name="size-choice" value="XL" disabled class="sr-only">
                            <span>XL</span>
                        </label>
                    </div>
                </fieldset>
            </div>

            <a href="{{ route('orders.public-product-request', ['product' => $product ]) }}" type="submit" class="mt-8 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add to cart</a>

            <!-- Product details -->
            <div class="mt-10">
                <h2 class="text-sm font-medium text-gray-900">Description</h2>

                <div class="prose prose-sm mt-4 text-gray-500">
                    {{ $product->data ?? 'No Description Available' }}
                </div>
            </div>

            <div class="mt-8 border-t border-gray-200 pt-8">
                <h2 class="text-sm font-medium text-gray-900">Fabric &amp; Care</h2>

                <div class="prose prose-sm mt-4 text-gray-500">
                    <ul role="list">
                        <li>Only the best materials</li>
                        <li>Ethically and locally made</li>
                        <li>Pre-washed and pre-shrunk</li>
                        <li>Machine wash cold with similar colors</li>
                    </ul>
                </div>
            </div>

            <!-- Policies -->
            <section aria-labelledby="policies-heading" class="mt-10">
                <h2 id="policies-heading" class="sr-only">Our Policies</h2>

                <dl class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2">
                    <div class="rounded-lg border border-gray-200 bg-gray-50 p-6 text-center">
                        <dt>
                            <svg class="mx-auto h-6 w-6 flex-shrink-0 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m6.115 5.19.319 1.913A6 6 0 0 0 8.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 0 0 2.288-4.042 1.087 1.087 0 0 0-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 0 1-.98-.314l-.295-.295a1.125 1.125 0 0 1 0-1.591l.13-.132a1.125 1.125 0 0 1 1.3-.21l.603.302a.809.809 0 0 0 1.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 0 0 1.528-1.732l.146-.292M6.115 5.19A9 9 0 1 0 17.18 4.64M6.115 5.19A8.965 8.965 0 0 1 12 3c1.929 0 3.716.607 5.18 1.64" />
                            </svg>
                            <span class="mt-4 text-sm font-medium text-gray-900">International delivery</span>
                        </dt>
                        <dd class="mt-1 text-sm text-gray-500">Get your order in 2 years</dd>
                    </div>
                    <div class="rounded-lg border border-gray-200 bg-gray-50 p-6 text-center">
                        <dt>
                            <svg class="mx-auto h-6 w-6 flex-shrink-0 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span class="mt-4 text-sm font-medium text-gray-900">Loyalty rewards</span>
                        </dt>
                        <dd class="mt-1 text-sm text-gray-500">Don&#039;t look at other tees</dd>
                    </div>
                </dl>
            </section>
        </div>
    </div>

    <!-- Related products -->
    <section aria-labelledby="related-heading" class="mt-16 sm:mt-24">
        <h2 id="related-heading" class="text-lg font-medium text-gray-900">Other products</h2>

        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @foreach($products as $product)
            <div class="group relative">
                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md lg:aspect-none group-hover:opacity-75 lg:h-80">
                    <img src="https://tailwindui.com/plus/img/ecommerce-images/category-page-01-image-card-01.jpg" alt="Front of men&#039;s Basic Tee in white." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
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
                    <p class="text-sm font-medium text-gray-900">{{ $product->price ?? '--.--'  }} €</p>
                </div>
            </div>
            @endforeach

            <!-- More products... -->
        </div>
    </section>

</div>