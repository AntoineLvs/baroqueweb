<div>

    <div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true">
            <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Product Request</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">Aute magna irure deserunt veniam aliqua magna enim voluptate.</p>

            <button type="button" wire:click="fillWithSampleData" class="btn btn-primary">
                Mit Musterdaten ausfüllen
            </button>
        </div>


{{--        Alpine Accordeon--}}
        <div>
            <div x-data="{ open: false }" class="mx-auto max-w-2xl text-center">
                <ul role="list" class="mt-10 grid grid-cols-1 gap-x-8 gap-y-6 lg:grid-cols-1 xl:gap-x-8">
                    <li class="overflow-hidden rounded-xl border border-gray-200">
                        <div @click="open = !open" class="flex items-center gap-x-4 cursor-pointer border-b border-gray-900/5 bg-gray-200 p-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                            </svg>

                            {{ $product->name }}

                            <div class="relative font-medium ml-auto">
                                <!-- Akkordeon Icon / Button -->
                                <svg :class="{'rotate-180': open}" class="h-6 w-6 transform transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>

                        <div x-show="open" x-collapse class="-my-3 divide-y divide-gray-100 px-6 py-4 text-sm leading-6">
                            <!-- Dein inhaltlicher Bereich, der ein- und ausgeklappt werden soll -->

                            <dl class="-my-3 divide-y divide-gray-100 px-6 py-4 text-sm leading-6">
                                <div class="flex justify-between gap-x-4 py-3">
                                    <dt class="text-gray-500">Produkt-Bezeichnung</dt>
                                    <dd class="text-gray-700">
                                        <b>{{$product->name}}</b>
                                    </dd>
                                </div>

                                <div class="flex justify-between gap-x-4 py-3">
                                    <dt class="text-gray-500">Produkt-Typ</dt>
                                    <dd class="text-gray-700">
                                        {{ $product->product_type->name }}
                                    </dd>
                                </div>

                                <div class="flex justify-between gap-x-4 py-3">
                                    <dt class="text-gray-500">Produkt-Details</dt>
                                    <dd class="text-gray-700">
                                        {{ $product->data }}
                                    </dd>
                                </div>

                                <div class="flex justify-between gap-x-4 py-3">
                                    <dt class="text-gray-500">Anbieter</dt>
                                    <dd class="text-gray-700">
                                        {{ $product->tenant->name }}
                                    </dd>
                                </div>


                                <div class="flex justify-between gap-x-4 py-3">
                                    <dt class="text-gray-500"></dt>
                                    <dd class="flex items-start gap-x-2">
                                        <div class="font-medium text-gray-900">

                                        </div>
                                    </dd>
                                </div>
                            </dl>
                            <!-- END TOGGLE -->
                        </div>
                    </li>
                </ul>
            </div>
            {{--        Alpine Accordeon End--}}

        </div>


        <form wire:submit="save" class="mx-auto mt-16 max-w-xl sm:mt-20">
            @csrf

            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">

                <!-- Quantity -->
                <div>
                    <label for="quantity" class="block text-sm font-semibold leading-6 text-gray-900">request_quantity</label>
                    <div class="mt-2.5">
                        <input type="number" wire:model="request_quantity" id="quantity" min="1" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('request_quantity') <span class="error">{{ $message }}</span> @enderror
                </div>

                <!-- Unit -->
                <div>
                    <label for="price" class="block text-sm font-semibold leading-6 text-gray-900">product_unit_id</label>
                    <div class="mt-2.5">

                        <select wire:model.live="product_unit_id" id="product_unit_id" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>
                            <option value="">-- Please choose --</option>
                            @foreach ($product_units as $product_unit)
                                @if($product_unit)
                                    <option wire:key="{{ $product_unit['id'] }}" value="{{$product_unit->id }}" selected>{{ $product_unit->name }}</option>
                                @else
                                    <option wire:key="{{ $product_unit['id']}}" value="{{$product_unit->id }}">{{$product_unit['name']}}</option>
                                @endif
                            @endforeach



                        </select>


                    </div>
                    @error('product_unit_id') <span class="error">{{ $message }}</span> @enderror
                </div>




                <!-- Customer Information -->


                <div>
                    <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">Vorname</label>
                    <div class="mt-2.5">
                        <input type="text" wire:model="customer_contact_firstname" id="customer_contact_firstname" autocomplete="given-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('customer_contact_firstname') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">Nachname</label>
                    <div class="mt-2.5">
                        <input type="text" wire:model="customer_contact_lastname" id="customer_contact_lastname" autocomplete="given-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('customer_contact_lastname') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">E-Mail</label>
                    <div class="mt-2.5">
                        <input type="email" wire:model="customer_email" name="customer_email" id="customer_email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('customer_email') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="phone-number" class="block text-sm font-semibold leading-6 text-gray-900">Telefon</label>
                    <div class="relative mt-2.5">
                        <input type="tel" wire:model="customer_phone" name="customer_phone" id="customer_phone" autocomplete="tel" class="block w-full rounded-md border-0 px-3.5 py-2 pl-20 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('customer_phone') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="company" class="block text-sm font-semibold leading-6 text-gray-900">Firma</label>
                    <div class="mt-2.5">
                        <input type="text"  wire:model="customer_company_name" id="customer_company" autocomplete="organization" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('customer_company_name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="company" class="block text-sm font-semibold leading-6 text-gray-900">customer_street</label>
                    <div class="mt-2.5">
                        <input type="text"  wire:model="customer_street" id="customer_street" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('customer_street') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="company" class="block text-sm font-semibold leading-6 text-gray-900">customer_zip</label>
                    <div class="mt-2.5">
                        <input type="text"  wire:model="customer_zip" id="customer_zip" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('customer_zip') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="customer_city" class="block text-sm font-semibold leading-6 text-gray-900">customer_city</label>
                    <div class="mt-2.5">
                        <input type="text"  wire:model="customer_city" id="customer_city" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('customer_city') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="customer_country" class="block text-sm font-semibold leading-6 text-gray-900">customer_country</label>
                    <div class="mt-2.5">
                        <input type="text"  wire:model="customer_country" id="customer_country" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('customer_country') <span class="error">{{ $message }}</span> @enderror
                </div>


                <div class="sm:col-span-2">
                    <label for="message" class="block text-sm font-semibold leading-6 text-gray-900">Ergänzungen zur Anfrage</label>
                    <div class="mt-2.5">
                        <textarea wire:model="customer_order_notice" name="customer_order_notice" id="customer_order_notice" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    </div>
                    @error('customer_order_notice') <span class="error">{{ $message }}</span> @enderror
                </div>







                <div class="flex gap-x-4 sm:col-span-2">
                    <div class="flex h-6 items-center">
                        <x-toggle>
                            <x-slot:label>
                                I agree to the <a href="#">terms and conditions</a>
                            </x-slot:label>
                        </x-toggle>
                    </div>

                </div>
            </div>

            <div class="mt-10">
                <button type="submit" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Anfrage absenden</button>
            </div>

        </form>
    </div>


</div>
