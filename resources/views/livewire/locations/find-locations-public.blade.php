<div class="select-menu flex flex-col md:flex-row " style="margin-top:132px; margin-left: 20px;">
    <div style="z-index: 5; min-width: 400px;" class="w-full md:w-1/5 transition-all duration-2000 shadow rounded-t-md border-b border-gray-300 xl:rounded-l-md xl:border-r-0 xl:rounded-r-md xl:border-b-0 xl:border-t-0 bg-white">
        <div class="mx-auto mt-4 mr-4 ml-4">
            <div class="w-full flex flex-col items-center space-y-4">
                <div class="w-full">
                    <div class="animated">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input wire:model.live="filters.search" id="searchbox" name="searchbox" placeholder="Search..." type="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            <button wire:click.prevent="resetFilters" type="button" class="text-white absolute end-2.5 bottom-2.5 bg-indigo-600 hover:bg-indigo-700 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form class="max-w-md mx-auto">

        </form>

        <div class="mx-auto mb-4 mr-4 ml-6">
            <div class="flex items-center justify-between">
                <div class="mt-2">
                    <div class="flex items-center">
                        <div>
                            <button type="button"
                                wire:click.prevent="toggleProduct('HVO100')"
                                class="rounded-full {{ $isHvo100 ? 'bg-indigo-600 text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600' : 'bg-white text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50' }} px-2.5 py-1 text-xs font-semibold shadow-sm">
                                HVO 100
                            </button>
                        </div>
                        <div class="ml-2">
                            <button type="button"
                                wire:click.prevent="toggleProduct('HVOBlend')"
                                class="rounded-full {{ $isHvoBlend ? 'bg-indigo-600 text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600' : 'bg-white text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50' }} px-2.5 py-1 text-xs font-semibold shadow-sm">
                                HVO Blend
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="flex items-center justify-start mr-4 ml-4">
            <label for="filter-is-open" class="mb-1 mr-2 text-gray-900">Show open Locations :</label>
            <input id="filter-is-open" wire:model.live="filters.is_open" type="checkbox" class="h-5 w-5 rounded ring-1 ring-inset ring-gray-300 text-indigo-600 focus:ring-indigo-600">
        </div> -->

        <div x-data="{ showResultClass: @entangle('showResultClass'), openHeight: '0px' }"
            x-init="$watch('showResultClass', value => {
        if (value) {
            // Delayed to ensure element is rendered before changing height
            setTimeout(() => {
                openHeight = '570px';
            }, 10);
        } else {
            openHeight = '0px';
        }
     })">
            <div x-show="showResultClass"
                x-transition:enter="transition-all ease-out duration-500"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-all ease-in duration-500"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="overflow-hidden"
                :style="{ height: openHeight }">

                <div class="mx-auto mt-4 mb-4">
                    <div class="w-full flex flex-col items-center space-y-4 justify-center">
                        <button class="mx-auto bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded" type="button" wire:click.prevent="searchInArea">Search in that area</button>
                    </div>
                </div>
                <div class="bg-gray-100">
                    <div class="text-gray-600 px-4 py-4 border-b-2 border-gray-300 text-left leading-4 tracking-wider cursor-pointer">
                        <span class="ml-4">Current Search Results</span>
                    </div>

                </div>
                <div class="table-container" id="tableContainer" style="overflow-y: scroll; height: 450px;">
                    <table class="min-w-full divide divide-gray-200">

                        @if($locations && count($locations) > 0)
                        <tbody x-data="{ showDetails: null }">
                            @foreach ($locations as $location)
                            <tr x-data="locationMap"
                                x-init="init()"
                                @click="showLocationOnMap({{ $location->id }}, {{ $location->lat }}, {{ $location->lng }})"
                                wire:key="{{ $location->id }}"
                                id="isDesktop"
                                class="isDesktop tile-hover bg-white cursor-pointer"
                                style="@if($location->id === $highlighted) background-color: #e5e7eb; @endif">

                                <td class="pr-2 py-4 whitespace-no-wrap border-b border-gray-300">
                                    <div class="flex items-center justify-between">
                                        <div class="ml-2">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <div class="image-container">
                                                        <a href="{{ route('locations.profile-locations-public', ['id' => $location->id]) }}">
                                                            <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-green" src="{{ $location->image_path }}" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="ml-2">
                                                    <div class="text-sm text-gray-900">
                                                        <a href="{{ route('locations.profile-locations-public', ['id' => $location->id]) }}">{{ $location->name }}</a>
                                                    </div>
                                                    @if($location->tenant)
                                                    <div class="text-xs text-gray-500">
                                                        <a href="{{ route('locations.profile-tenants', ['tenant_id' => $location->tenant->id]) }}">{{ $location->tenant->name }}</a>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="whitespace-no-wrap border-b border-gray-300">
                                    <div class="flex items-start justify-between">
                                        <div class="flex flex-col items-center space-y-2">
                                            @php
                                            $productTypes = $location->getProductTypes();
                                            $isHvo100Badge = $productTypes->contains('id', 1);
                                            $isHvoBlendBadge = $productTypes->contains('id', 2);
                                            @endphp

                                            @if($isHvo100Badge)

                                            <div class="w-full">
                                                <button type="button" class="w-full text-xs cursor-default rounded-full bg-indigo-600 px-2.5 py-1 text-white shadow-sm">
                                                    HVO100
                                                </button>
                                            </div>

                                            @endif

                                            @if($isHvoBlendBadge)
                                            <div class="w-full">
                                                <button type="button" class="w-full text-xs cursor-default rounded-full bg-indigo-600 px-2.5 py-1 text-white shadow-sm">
                                                    HVO Blend
                                                </button>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <td class="whitespace-no-wrap border-b border-gray-300">
                                    <div class="flex ml-auto items-center" style="display:flex; float: center;">
                                        <div class="flex items-center justify-end">
                                            <div class="image-container">
                                                <div class="flex items-center">

                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 ml-2" fill="{{ $location->isOpen() ? 'rgb(0, 160, 0)' : 'red' }}">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5h-3.25V5z" clip-rule="evenodd" />
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <!-- Other columns here -->

                                <td class="py-4 whitespace-no-wrap text-right border-b border-gray-300 leading-5 font-medium">
                                    <button @click="showDetails === {{ $location->id }} ? showDetails = null : showDetails = {{ $location->id }}" type="button">
                                        <div class="image-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                            </svg>
                                            <span class="tooltip text-gray-500" style="z-index: 10; transform: translateX(-70%);">Show Details</span>
                                        </div>
                                    </button>
                                </td>
                                <td class="py-4 whitespace-no-wrap text-right border-b border-gray-300 leading-5 font-medium">
                                    <button type="button" class="centerMapButtonMobile" wire:click.prevent="openOnMap({{ $location->id }})">
                                        <div class="image-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                                            </svg>
                                            <span class="tooltip text-gray-500" style="z-index: 10; transform: translateX(-90%);">Show on Map</span>
                                        </div>
                                    </button>
                                </td>
                            </tr>

                            <tr x-show="showDetails === {{ $location->id }}" id="isDesktop" class="isDesktop tile-hover bg-white cursor-pointer transition-all duration-300 ease-in-out" style="@if($location->id === $highlighted) background-color: #e5e7eb; @endif" wire:click.prevent="showOnMap({{ $location->id }})">
                                <td colspan="5" class="pr-2 py-4 whitespace-no-wrap border-b border-gray-300">
                                    <div class="ml-2 mt-8 mb-8 w-full">
                                        Hello world ! {{ $location->name }}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        @else
                        <tbody>
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                    No locations found
                                </td>
                            </tr>
                        </tbody>
                        @endif
                    </table>
                </div>
            </div>



            <div>
                <div class="w-full flex flex-col items-center justify-center">
                    <button @click="showResultClass = !showResultClass" class="w-full mx-auto bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded flex items-center justify-between" type="button">
                        <span>Show Results</span>
                        @if($showResultClass)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="text-white w-5 h-5" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="text-white w-5 h-5" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                        @endif
                    </button>
                </div>
            </div>
        </div>

    </div>
    <div class="w-full transition-all duration-2000 bg-white">
        <livewire:map.location-map />

    </div>
    <style>
        .tile-hover:hover {
            background-color: #e5e7eb;
        }

        @media screen and (max-width: 768px) {
            .select-menu {
                margin-right: 20px;
            }
        }
    </style>

    <script>
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

        let aw = new animationWorker(input, texts).start();
        input.addEventListener("focus", (e) => aw.stop());
        input.addEventListener("blur", (e) => {
            aw = new animationWorker(input, texts);
            if (e.target.value == '') setTimeout(aw.start, 1000);
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

        document.addEventListener('alpine:init', () => {
            console.log('Alpine initialized');
            Alpine.data('locationMap', () => ({
                init() {
                    // Ecouter les événements showLocationOnMap
                },
                showLocationOnMap(locationId, lat, lng) {
                    console.log('showLocationOnMap', locationId, lat, lng);
                    // Déclencher l'événement personnalisé avec les détails
                    window.dispatchEvent(new CustomEvent('showLocationOnMap', {
                        detail: {
                            latitude: lat,
                            longitude: lng
                        }
                    }));
                }
            }));
        });
    </script>
</div>