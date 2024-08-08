<div class="select-menu flex flex-col md:flex-row border border-gray-300 rounded-md" style="margin-top:132px; margin-left: 20px;">
    <div style="z-index: 5; min-width: 350px;  @if($showResultClasse) height:750px; @endif" class="w-1/5 md:w-1/5 transition-all duration-2000 shadow rounded-t-md border-b border-gray-300 xl:rounded-l-md xl:border-r-0 xl:rounded-r-md xl:border-b-0 xl:border-t-0 bg-white">
        <div class="mx-auto mb-6 mt-4 mr-4 ml-4">
            <div class="flex items-center justify-start">
                <select wire:model.live="filters.selected_product" id="filter-product-type" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <option value="">Product Type (All)</option>
                    @foreach ($product_types as $product_type)
                    <option value="{{ $product_type->id }}">{{ $product_type->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- <div class="flex items-center justify-start mr-4 ml-4">
            <label for="filter-is-open" class="mb-1 mr-2 text-gray-900">Show open Locations :</label>
            <input id="filter-is-open" wire:model.live="filters.is_open" type="checkbox" class="h-5 w-5 rounded ring-1 ring-inset ring-gray-300 text-indigo-600 focus:ring-indigo-600">
        </div> -->
        <div class="mx-auto mb-6 mt-4 mr-4 ml-4">
            <div class="w-full flex flex-col items-center space-y-4">
                <div class="w-full">
                    <div class="animated">
                        <input wire:model.live="filters.search" wire:click="toggleResults" type="text" id="searchbox" name="searchbox" placeholder="Search..." class="block w-full rounded-md border-0 px-4 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-auto">
            <div class="w-full flex flex-col items-center space-y-4 justify-center">
                <button class="mx-auto bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded" type="button" wire:click="searchInArea">Search in that area</button>
            </div>
        </div>
        <div class="w-full flex flex-col items-end space-y-4 pr-4">
            <button type="button" wire:click="toggleResults" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white">
                @if($showResultClasse)
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="text-gray-900 w-5 h-5" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="text-gray-900 w-5 h-5" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                </svg>

                @endif
            </button>
        </div>
        @if($showResultClasse)
        <div class="table-container" id="tableContainer" style="overflow-y: scroll; height: 69%;">
            <table class="min-w-full divide divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-gray-600 px-4 py-4 border-b-2 border-gray-300 text-left leading-4 tracking-wider cursor-pointer">
                            <span class="ml-4">Current Search Results</span>
                        </th>
                        <th class="px-4 py-4 border-b-2 border-gray-300 text-left leading-4 tracking-wider"></th>
                        <th class="px-4 py-4 border-b-2 border-gray-300 text-left leading-4 tracking-wider"></th>
                    </tr>
                </thead>

                @if($locations && count($locations) > 0)
                <tbody>
                    @foreach ($locations as $location)

                    <tr wire:key="{{ $location->id }}" id="isDesktop" class="isDesktop tile-hover bg-white cursor-pointer" style="@if($location->id === $highlighted) background-color: #e5e7eb; @endif" wire:click="showOnMap({{ $location->id }})">
                        <td class="pr-2 py-4 whitespace-no-wrap border-b border-gray-300">
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
                                            <div class="font-medium text-gray-900">
                                                <a href="{{ route('locations.profile-locations-public', ['id' => $location->id]) }}">{{ $location->name }}</a>
                                            </div>
                                            @if($location->tenant)
                                            <div class="text-gray-500">
                                                <a href="{{ route('locations.profile-tenants', ['tenant_id' => $location->tenant->id]) }}">{{ $location->tenant->name }}</a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
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
                        <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-300 leading-5 font-medium">
                            <button type="button" class="centerMapButtonMobile" wire:click="openOnMap({{ $location->id }})">
                                <div class="image-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                                    </svg>
                                    <span class="tooltip text-gray-500" style="transform: translateX(-70%);">Show on Map</span>
                                </div>
                            </button>
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

        @else

        @endif
    </div>
    <div class="w-full transition-all duration-2000 bg-white shadow rounded-b-md border border-gray-300 xl:rounded-r-md xl:border-l-0 xl:border-t-0 xl:border-b xl:rounded-t-md">
        <livewire:map.location-test />

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
    </script>
</div>