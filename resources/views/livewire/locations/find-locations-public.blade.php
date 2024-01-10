<div class="mb-2 max-w-8xl mx-auto px-4 sm:px-6 md:px-8 rounded-md">

    <!-- Search Section -->
    <div class="mx-auto max-w-xl mb-6">
        <div class="w-full flex flex-col items-center  space-y-4">
            <div class="w-full">
                <div class="mb-2">
                    <label for="search-bar" class=" text-gray-900" style="margin-bottom:5px;">Search in Finder...</label>
                </div>
                <div class="animated">
                    <input wire:model.live="filters.search" type="text" id="searchbox" name="searchbox" placeholder="" class="block w-full rounded-md border-0 px-4 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div class="w-full flex flex-col">
                <div class="mb-4 w-full sm:w-auto">
                    <div class="mb-2">
                        <label for="filter-product-type" class="text-gray-900">Select your product</label>
                    </div>
                    <div class="flex items-center justify-start">
                        <select wire:model.live="filters.selected_product" id="filter-product-type" class="block w-full sm:w-auto rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">Product Type (All)</option>
                            @foreach ($product_types as $product_type)
                            <option value="{{ $product_type->id }}">{{ $product_type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-4 w-full sm:w-auto">
                    <div class="w-1/4 mb-2">
                        <label for="filter-product-type">Blend percent: </label>
                    </div>
                    <div class="flex rounded-md shadow-sm w-1/2">
                        <input wire:model.live="filters.blend_min" type="text" id="blend-min" class="block min-w-0 w-16 flex-1 rounded-none rounded-l-md border-0 py-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-grey-600  sm:leading-6" placeholder="min">
                        <span class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 px-3 text-gray-500">%</span>
                    </div>
                </div>
            </div>


            <div class="hidden sm:flex items-center">
                <div class="w-auto flex items-center space-x-4 ">
                    <div class="w-1/2">
                        <button wire:click="toggleShowFilters" type="button" class="min-w-min w-full rounded-md bg-indigo-600 px-4 py-2  font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            @if ($showFilters) Hide @endif Advanced Search...
                        </button>
                    </div>
                    <div class="w-1/2">
                        <button wire:click="resetFilters" class="w-auto rounded-md bg-indigo-600 px-4 py-2 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Reset Filters</button>
                    </div>

                </div>
            </div>

            <div class="sm:hidden flex items-center">
                <div class="w-full flex flex-col sm:flex">
                    <div class="w-full mb-2 sm:w-w-1/2 ">
                        <button wire:click="toggleShowFilters" type="button" class="w-full rounded-md bg-indigo-600 px-4 py-2  font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            @if ($showFilters) Hide @endif Advanced Search...
                        </button>
                    </div>
                    <div class="w-full sm:w-w-1/2">
                        <button wire:click="resetFilters" class="w-full rounded-md bg-indigo-600 px-4 py-2 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Reset Filters</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Advanced Search -->
    <div class="mx-auto max-w-xl">
        <div>
            @if ($showFilters)
            <div class="flex flex-col space-y-4 mb-6 border border-gray-200 bg-white rounded-md p-4">
                <div class="w-full flex flex-col">
                    <div class="mb-4 w-full sm:w-auto">
                        <div class="mb-2">
                            <label for="filter-base-service" class="mb-2 text-gray-900">Select your base service</label>
                        </div>
                        <div class="flex items-center justify-start">
                            <select wire:model.live="filters.selected_service" id="filter-base-service" class="block w-full sm:w-1/2 rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="">Services (all)</option>
                                @foreach ($base_services as $base_service)
                                <option value="{{ $base_service->id }}">{{ $base_service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center justify-start">
                        <label for="filter-is-open" class="mb-1 mr-2 text-gray-900">Show open Locations :</label>
                        <input id="filter-is-open" wire:model.live="filters.is_open" type="checkbox" class="h-5 w-5 rounded ring-1 ring-inset ring-gray-300 text-indigo-600 focus:ring-indigo-600">
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Current user's time in Berlin is : {{ $currentTime }} -->

    <!-- Open Map big screen -->
    <div class="flex items-center space-x-4 {{ $justifyContent }} transition-all duration-500 ease-in-out">
        <div class="flex items-center mb-4 ">
            @if ($toggleTable)

            @else
            <button wire:click.live="toggleMap" type="button" class="image-container transition-transform duration-2000 rounded-full bg-indigo-600 p-1.5 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transform translate-x-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    @if($toggleMap)
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    @else
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                    @endif
                </svg>
                <span class="tooltip text-gray-900">Open the Map</span>
            </button>
            @endif

        </div>

        <!-- Open Table big screen -->
        <div class="flex items-center mb-4 {{ $toggleMap ? 'justify-center' : ($toggleTable ? 'justify-end' : 'justify-center') }}">
            @if ($toggleMap)

            @else
            <button wire:click.live="toggleTable" type="button" class="image-container transition-transform duration-2000 rounded-full bg-indigo-600 p-1.5 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transform translate-x-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    @if($toggleTable)
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                    @else
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    @endif
                </svg>
                <span class="tooltip text-gray-900">Open the Map</span>
            </button>
            @endif

        </div>
    </div>

    <!-- Locations Table -->
    <div class="flex flex-col sm:flex-row border border-gray-200 rounded-md">
        <div style="max-height: 75vh; overflow-y: auto; z-index: 1;" class="{{ $toggleMap ? 'hidden' : 'w-full' }} transition-all duration-2000 shadow rounded-t-md border-b border-gray-200 sm:rounded-l-md sm:border-r-0 sm:rounded-r-md sm:border-b-0 sm:border-b-0 sm:border-t-0">
            <table class="min-w-full divide divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th wire:click.live="sortByColumn('name')" class="text-gray-600 px-6 py-6 border-b-2 border-gray-300 text-left  leading-4 tracking-wider cursor-pointer">
                            <span class="ml-4">Name</span>
                            @if ($sortColumn == 'name')
                            <i class="fa fa-solid fa-sort-up {{ $sortDirection === 'asc' ? '' : 'fa-rotate-180' }} ml-2"></i>
                            @else
                            <i class="fa fa-solid fa-sort ml-2"></i>
                            @endif
                        </th>
                        <th class="text-gray-600 px-6 py-6 border-b-2 border-gray-300 text-left  leading-4 tracking-wider cursor-pointer">
                            @if($toggleTable)
                            <span class="ml-4">Opening Hours</span>
                            @endif
                        </th>
                        <th wire:click.live="sortByColumn('zipcode')" class="text-gray-600 px-6 py-6 border-b-2 border-gray-300 text-left  leading-4 tracking-wider cursor-pointer">
                            Address
                            @if ($sortColumn == 'zipcode')
                            <i class="fa fa-solid fa-sort-up {{ $sortDirection === 'asc' ? '' : 'fa-rotate-180' }} ml-2"></i>
                            @else
                            <i class="fa fa-solid fa-sort ml-2"></i>
                            @endif
                        </th>
                        <th value="service" :sortable="false" :multi-column="true" class="text-gray-600 px-6 py-6 border-b-2 border-gray-300 text-left leading-4 tracking-wider">
                            Services
                        </th>
                        <th value="products" :sortable="false" :multi-column="true" class="text-gray-600 px-6 py-6 border-b-2 border-gray-300 text-left leading-4 tracking-wider">
                            ReFuels
                        </th>

                        <th class="px-6 py-6 border-b-2 border-gray-300 text-left leading-4 tracking-wider">

                        </th>
                    </tr>
                </thead>
                <tbody class="">

                    @foreach ($locations as $location)
                    <tr wire:key="{{$location->id}}" class="bg-white">
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <div class="ml-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="image-container">
                                                <a href="{{ route('locations.profile-locations-public', ['id' => $location->id]) }}">
                                                    <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-green" src="{{ $location->image_path }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class=" font-medium text-gray-900">
                                                <a href="{{ route('locations.profile-locations-public', ['id' => $location->id]) }}">{{ $location->name }}</a>
                                            </div>
                                            <div class="text-gray-500">
                                                <a href="{{ route('locations.profile-tenants', ['tenant_id' => $location->tenant->id]) }}">{{$location->tenant->name}}</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="whitespace-no-wrap border-b border-gray-200">
                            <div class="flex ml-auto items-center" style="display:flex; float: center;">
                                <div class="flex items-center justify-end">
                                    <div class="image-container">
                                        <div class="flex items-center">
                                            @if($toggleTable)
                                            <div class="text-gray-900">{{ substr($location->opening_start, 0, 5) }} / {{ substr($location->opening_end, 0, 5) }}</div>
                                            @endif
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 ml-2" fill="{{ $location->isOpen() ? 'rgb(0, 160, 0)' : 'red' }}">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5h-3.25V5z" clip-rule="evenodd" />
                                            </svg>
                                            @if(!$toggleTable)
                                            <span class="tooltip text-gray-500">{{ substr($location->opening_start, 0, 5) }} / {{ substr($location->opening_end, 0, 5) }}</span>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-gray-900" id="address_{{$location->id}}">{{$location->address}}</div>
                            <div class="text-gray-500">{{$location->zipcode}} / {{$location->city}}</div>

                            <!-- Button to copy to clipboard - Don't forget to uncomment the javascript code too  -->
                            <!-- <button value="copy" onclick="copyToClipboard('copy_{{ $location->address }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m0-3l-3-3m0 0l-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75" />
                                </svg>
                            </button> -->

                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 leading-5 text-gray-500">
                            @if ($location->service_id)
                            <div class="image-container">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                                <ul class="tooltip" style=" padding-left: 20px;">
                                    @foreach($this->getServices($location->id) as $service)
                                    <li>{{ $service->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @else
                            <span>-</span>
                            @endif
                        </td>


                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 leading-5 text-gray-500">
                            <ul style="list-style: none; padding: 0;">
                                @if ($location->product_id)
                                @foreach($this->getProducts($location->id) as $product)
                                @if ($product->product_type_id == 1)
                                <div style="display: flex; flex-direction: column;">
                                    <div style="display: flex;">
                                        <div style="margin-right: 10px;">
                                            <div class="image-container">
                                                <a href="{{ route('locations.show-products', ['id' => $location->id]) }}">
                                                    <img style="background: lightgrey; min-width:34px; min-height:34px;" class="h-8 w-8 rounded-full ring-2 ring-green" src="{{ $product->image_path }}" alt="">
                                                </a>
                                                <span class="tooltip">{{ $product->name }} @if($product->blend_percent) ({{ $product->blend_percent }}%) @endif</span>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                    <div style="display: flex; ">
                                        @foreach($this->getProducts($location->id) as $product)
                                        @if ($product->product_type_id == 2)
                                        <div style="margin-right: 10px; padding-top: 10px;">
                                            <div class="image-container">
                                                <a href="{{ route('locations.show-products', ['id' => $location->id]) }}">
                                                    <img style="background: lightgrey; min-width:34px; min-height:34px;" class="h-8 w-8 rounded-full ring-2 ring-green" src="{{ $product->image_path }}" alt="">
                                                </a>
                                                <span class="tooltip">{{ $product->name }} @if($product->blend_percent) ({{ $product->blend_percent }}%) @endif</span>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                @else
                                <li>-</li>
                                @endif
                            </ul>
                        </td>


                        <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 leading-5 font-medium">
                            <button id="centerMapButton" wire:click="showOnMap({{ $location->id }})">
                                <div class="image-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>
                                    <span class="tooltip ml-6 text-gray-500" style="transform: translateX(-80%);">Show on Map</span>
                                </div>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="max-height: 75vh;" class="{{ $toggleTable ? 'hidden' : 'w-full' }} transition-all duration-2000 bg-white overflow-hidden shadow rounded-b-md border border-gray-200 sm:rounded-r-md sm:border-l-0 sm:border-t-0 sm:border-b sm:rounded-t-md">
            <livewire:map.location-map />
        </div>
    </div>
</div>


<script>
    // script for the auto text on search bar's label 

    var TxtRotate = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtRotate.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

        var that = this;
        var delta = 300 - Math.random() * 100;

        if (this.isDeleting) {
            delta /= 2;
        }

        if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
        }

        setTimeout(function() {
            that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('txt-rotate');
        for (var i = 0; i < elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-rotate');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
                new TxtRotate(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
        document.body.appendChild(css);
    };

    const texts = ['Search for a name...', 'Search for a city...', 'Search for a product...', 'Search for a service...', 'Search for a zipcode...'];
    const input = document.querySelector('#searchbox');
    const animationWorker = function(input, texts) {
        this.input = input;
        this.defaultPlaceholder = this.input.getAttribute('placeholder');
        this.texts = texts;
        this.curTextNum = 0;
        this.curPlaceholder = '';
        this.blinkCounter = 0;
        this.animationFrameId = 0;
        this.animationActive = false;
        this.input.setAttribute('placeholder', this.curPlaceholder);

        this.switch = (timeout) => {
            this.input.classList.add('imitatefocus');
            setTimeout(
                () => {
                    this.input.classList.remove('imitatefocus');
                    if (this.curTextNum == 0)
                        this.input.setAttribute('placeholder', this.defaultPlaceholder);
                    else
                        this.input.setAttribute('placeholder', this.curPlaceholder);

                    setTimeout(
                        () => {
                            this.input.setAttribute('placeholder', this.curPlaceholder);
                            if (this.animationActive)
                                this.animationFrameId = window.requestAnimationFrame(this.animate)
                        },
                        timeout);
                },
                timeout);
        }

        this.animate = () => {
            if (!this.animationActive) return;
            let curPlaceholderFullText = this.texts[this.curTextNum];
            let timeout = 500;
            if (this.curPlaceholder == curPlaceholderFullText + '|' && this.blinkCounter == 3) {
                this.blinkCounter = 0;
                this.curTextNum = (this.curTextNum >= this.texts.length - 1) ? 0 : this.curTextNum + 1;
                this.curPlaceholder = '|';
                this.switch(500);
                return;
            } else if (this.curPlaceholder == curPlaceholderFullText + '|' && this.blinkCounter < 3) {
                this.curPlaceholder = curPlaceholderFullText;
                this.blinkCounter++;
            } else if (this.curPlaceholder == curPlaceholderFullText && this.blinkCounter < 3) {
                this.curPlaceholder = this.curPlaceholder + '|';
            } else {
                this.curPlaceholder = curPlaceholderFullText
                    .split('')
                    .slice(0, this.curPlaceholder.length + 1)
                    .join('') + '|';
                timeout = 150;
            }
            this.input.setAttribute('placeholder', this.curPlaceholder);
            setTimeout(
                () => {
                    if (this.animationActive) this.animationFrameId = window.requestAnimationFrame(this.animate)
                },
                timeout);
        }

        this.stop = () => {
            this.animationActive = false;
            window.cancelAnimationFrame(this.animationFrameId);
        }

        this.start = () => {
            this.animationActive = true;
            this.animationFrameId = window.requestAnimationFrame(this.animate);
            return this;
        }
    }

    document.addEventListener("DOMContentLoaded", () => {
        let aw = new animationWorker(input, texts).start();
        input.addEventListener("focus", (e) => aw.stop());
        input.addEventListener("blur", (e) => {
            aw = new animationWorker(input, texts);
            if (e.target.value == '') setTimeout(aw.start, 1000);
        });
    });

    // Javascript to copy to clipBoard 
    // function copyToClipboard(address) {
    //     document.getElementById(address).select();
    //     document.execCommand('copy');
    // }

    // POST Request for MapBox API
    // document.addEventListener('livewire:load', function() {
    //     Livewire.on('exportLocationData', data => {
    //         // Envoyer les données JSON à votre API
    //         fetch('votre_url_api', {
    //                 method: 'POST',
    //                 headers: {
    //                     'Content-Type': 'application/json',
    //                     // Ajoutez d'autres en-têtes si nécessaire
    //                 },
    //                 body: JSON.stringify(data)
    //             })
    //             .then(response => {
    //                 // Gérer la réponse de l'API
    //                 console.log('Données exportées avec succès :', response);
    //             })
    //             .catch(error => {
    //                 // Gérer les erreurs
    //                 console.error('Erreur lors de l\'exportation des données :', error);
    //             });
    //     });
    // });

    // Download a Json file with every data of a location
    // document.addEventListener('livewire:load', function() {
    //     Livewire.on('exportLocationData', data => {
    //         const jsonContent = JSON.stringify(data, null, 2);
    //         const blob = new Blob([jsonContent], {
    //             type: 'application/json'
    //         });

    //         const url = URL.createObjectURL(blob);
    //         const a = document.createElement('a');
    //         a.href = url;
    //         a.download = 'location_data.json';
    //         a.click();
    //     });
    // });
</script>