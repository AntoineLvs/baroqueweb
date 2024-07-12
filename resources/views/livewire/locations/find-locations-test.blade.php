<div class="flex flex-col md:flex-row border border-gray-200 rounded-md overflow-y-hidden">
    <div style="overflow-y: auto; z-index: 1; min-width: 350px" class="w-1/5 md:w-1/5 transition-all duration-2000 shadow rounded-t-md border-b border-gray-200 xl:rounded-l-md xl:border-r-0 xl:rounded-r-md xl:border-b-0 xl:border-t-0">
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
        <div class="flex items-center justify-start">
            <label for="filter-is-open" class="mb-1 mr-2 text-gray-900">Show open Locations :</label>
            <input id="filter-is-open" wire:model.live="filters.is_open" type="checkbox" class="h-5 w-5 rounded ring-1 ring-inset ring-gray-300 text-indigo-600 focus:ring-indigo-600">
        </div>
        <div class="mx-auto mb-6 mt-4 mr-4 ml-4">
            <div class="w-full flex flex-col items-center space-y-4">
                <div class="w-full">
                    <div class="animated">
                        <input wire:model.live="filters.search" wire:click="toggleResults" type="text" id="searchbox" name="searchbox" placeholder="Search..." class="block w-full rounded-md border-0 px-4 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
        </div>

        @if($showResults)
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
            <tbody>
                @foreach ($locations as $location)
                <tr wire:key="{{ $location->id }}" class="bg-white">
                    <td class="pr-2 py-4 whitespace-no-wrap border-b border-gray-200">
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
                    <td class="whitespace-no-wrap border-b border-gray-200">
                        <div class="flex ml-auto items-center" style="display:flex; float: center;">
                            <div class="flex items-center justify-end">
                                <div class="image-container">
                                    <div class="flex items-center">
                                        @if($toggleTableValue)
                                        <div class="text-gray-900">{{ substr($location->opening_start, 0, 5) }} / {{ substr($location->opening_end, 0, 5) }}</div>
                                        @endif
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 ml-2" fill="{{ $location->isOpen() ? 'rgb(0, 160, 0)' : 'red' }}">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5h-3.25V5z" clip-rule="evenodd" />
                                        </svg>
                                        @if(!$toggleTableValue)
                                        <span class="tooltip text-gray-500">{{ substr($location->opening_start, 0, 5) }} / {{ substr($location->opening_end, 0, 5) }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 leading-5 font-medium">
                        <button type="button" id="centerMapButton" wire:click="showOnMap({{ $location->id }})">
                            <div class="image-container">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                <span class="tooltip text-gray-500" style="transform: translateX(-70%);">Show on Map</span>
                            </div>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    <div class="w-full transition-all duration-2000 bg-white overflow-hidden shadow rounded-b-md border border-gray-200 xl:rounded-r-md xl:border-l-0 xl:border-t-0 xl:border-b xl:rounded-t-md">
        <livewire:map.location-map />

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