<div class="mt-4 bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="card-title">Formular Manager</h3>
        <p class="mt-2 text-sm leading-6 text-grey-700">Hier können Sie das Design für das Freigabe-Suchformular festlegen, das Sie auf Ihrer Website integrieren können.<br>
            Anschließend wird automatisch ein HTML, JavaScript und CSS Code erzeugt. Den CSS Code können Sie (oder Ihr Webdesigner) frei anpassen, um diesen noch aktiver an Ihre CI auszurichten.
            <br>Sie brauchen Unterstützung bei der Integration? Schreiben Sie uns unter <b>mail@refuelos.com</b>!
        </p>

    </div>
    <div class="px-4 py-5 sm:p-6">
        <!-- Content goes here -->
        <div class="container mx-auto mt-8">
            <div class="p-4 rounded">


                <input wire:model.live="buttonColor" hidden id="buttonColorPicker" class="w-full max-w-xs border border-gray-300 px-2 py-1" />
                <input wire:model.live="backgroundColor" hidden id="backgroundColorPicker" class="w-full max-w-xs border border-gray-300 px-2 py-1" />
                <input wire:model.live="fontColor" hidden id="fontColorPicker" class="w-full max-w-xs border border-gray-300 px-2 py-1" />
                <input wire:model.live="buttonFontColor" hidden id="buttonFontColorPicker" class="w-full max-w-xs border border-gray-300 px-2 py-1" />

                <div x-data="{ buttonColor: '', backgroundColor: '', fontColor:'' , buttonFontColor: ''}" x-init="buttonColor = document.getElementById('buttonColorPicker').value, backgroundColor = document.getElementById('backgroundColorPicker').value,  fontColor = document.getElementById('fontColorPicker').value, buttonFontColor = document.getElementById('buttonFontColorPicker').value">
                    <div class="flex flex-col xl:flex-row flex bg-gray-200 p-4 rounded">
                        <div class="w-1/2 xl:w-1/4 pl-4" style="min-width: 500px;">
                            <form wire:submit.prevent="submit">
                                @csrf
                                <dl class="divide-y divide-gray-100">
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-900">Button Color</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 grid grid-cols-2 gap-2">
                                            <div>
                                                <input type="color" wire:model.live="buttonColor" id="buttonColorPicker" x-model="buttonColor">
                                            </div>
                                            <div>
                                                <input style="font-size: 0.775rem; line-height:1.00rem" type="text" wire:model.live="buttonColor" id="buttonColorPicker" x-model="buttonColor" class="w-full max-w-xs border border-gray-300 px-2 py-1">
                                            </div>
                                        </dd>



                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-900">Background Color</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 grid grid-cols-2 gap-2">
                                            <div>
                                                <input type="color" wire:model.live="backgroundColor" id="backgroundColorPicker" x-model="backgroundColor">
                                            </div>
                                            <div>
                                                <input style="font-size: 0.775rem; line-height:1.00rem" type="text" wire:model.live="backgroundColor" id="backgroundColorPicker" x-model="backgroundColor" class="w-full max-w-xs border border-gray-300 px-2 py-1 ">
                                            </div>
                                        </dd>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-900">Font Color</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 grid grid-cols-2 gap-2">
                                            <div>
                                                <input type="color" wire:model.live="fontColor" id="fontColorPicker" x-model="fontColor">
                                            </div>
                                            <div>
                                                <input style="font-size: 0.775rem; line-height:1.00rem" type="text" wire:model.live="fontColor" id="fontColorPicker" x-model="fontColor" class="w-full max-w-xs border border-gray-300 px-2 py-1 ">
                                            </div>
                                        </dd>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-900">Button Font Color</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 grid grid-cols-2 gap-2">
                                            <div>
                                                <input type="color" wire:model.live="buttonFontColor" id="buttonFontColorPicker" x-model="buttonFontColor">
                                            </div>
                                            <div>
                                                <input style="font-size: 0.775rem; line-height:1.00rem" type="text" wire:model.live="buttonFontColor" id="buttonFontColorPicker" x-model="buttonFontColor" class="w-full max-w-xs border border-gray-300 px-2 py-1 ">
                                            </div>
                                        </dd>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-900">Logo URL</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            <input type="text" id="customLogoUrl" wire:model.live="customLogoUrl" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @error('customLogoUrl') <span class="text-red-500">{{ $message }}</span> @enderror
                                        </dd>
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-900">Individual Text</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"> <input type="text" placeholder="{{$personalText }}" id="personalText" wire:model.live="personalText" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </dd>
                                    </div>
                                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Einstellungen speichern
                                    </button>
                                    <button type="button" wire:click="resetCiSettings" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                        Einstellungen zurücksetzen
                                    </button>
                                </dl>
                            </form>
                        </div>

                        <div class="ml-5 border-r border-gray-300"></div>

                        <!-- Colonne de droite -->
                        <div class="w-full xl:w-1/5 pl-4 mx-auto" style="min-width: 400px; align-self: center;">

                            <div id="searchForm" wire.model:live="backgroundColor" x-bind:style="'background-color: ' + backgroundColor">
                                <img src="{{ $customLogoUrl ? $customLogoUrl : asset($defaultLogoPath) }}" alt="Logo" class="xtl-logo" />

                                <form>
                                    <div class="xtl-form-text">
                                        <p wire.model:live="fontColor" x-bind:style="'color: ' + fontColor">{{ $personalText }}</p>
                                    </div>

                                    <div class="xtl-form-group">
                                        <label class="xtl-label" wire.model:live="fontColor" x-bind:style="'color: ' + fontColor" for="selectedManufacturer">Nach Hersteller suchen</label>
                                        <select class="xtl-select" id="selectedManufacturer">
                                            <!-- Options -->
                                        </select>
                                    </div>

                                    <div class="xtl-form-group xtl-hide" id="hideVehicle">
                                        <label class="xtl-label" wire.model:live="fontColor" x-bind:style="'color: ' + fontColor" for="selectedVehicle">Nach Fahrzeugmodell suchen</label>
                                        <select class="xtl-select" id="selectedVehicle">
                                            <!-- Options  -->
                                        </select>
                                    </div>

                                    <div class="xtl-form-group xtl-hide" id="hideEngine">
                                        <label class="xtl-label" wire.model:live="fontColor" x-bind:style="'color: ' + fontColor" for="selectedEngine">Nach Motor suchen</label>
                                        <select class="xtl-select" id="selectedEngine">
                                            <!-- Options  -->
                                        </select>
                                    </div>

                                    <div class="xtl-form-group">
                                        <button type="button" wire.model:live="buttonColor" x-bind:style="'background-color: ' + buttonColor" class="xtl-button" id="releasesButton" style="margin-top:10px;"><span wire.model:live="buttonFontColor" x-bind:style="'color: ' + buttonFontColor">Freigaben suchen</span></button>
                                    </div>
                                </form>
                            </div>
                            <div class="xtl-card-container" id="releaseContainer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script>
        var manufacturerCalled = false;
        var engineCalled = false;
        var vehicleCalled = false;

        document.addEventListener('has-token', function(event) {
            if (Array.isArray(event.detail) && event.detail.length > 0) {
                var apiToken = event.detail[0].apiToken;
                localStorage.setItem('apiToken', apiToken);

            } else {
                console.error("The user doesn't have any token");
            }
        });


        document.getElementById('selectedManufacturer').addEventListener('change', function() {
            fetchVehiclesAndEngines();

            var hideVehicleElement = document.getElementById('hideVehicle');
            if (hideVehicleElement.classList.contains('xtl-hide')) {
                hideVehicleElement.classList.remove('xtl-hide');
            }

            var hideEngineElement = document.getElementById('hideEngine');
            if (hideEngineElement.classList.contains('xtl-hide')) {
                hideEngineElement.classList.remove('xtl-hide');
            }
        });


        function fetchVehiclesAndEngines() {
            var selectedManufacturerId = document.getElementById('selectedManufacturer').value;

            if (selectedManufacturerId) {
                fetchVehicles(selectedManufacturerId);
                fetchEngines(selectedManufacturerId);
            }
        }

        document.getElementById('selectedManufacturer').addEventListener('click', function() {
            fetchManufacturers();
        });

        document.getElementById('releasesButton').addEventListener('click', function() {
            getReleases();
        });


        function fetchManufacturers() {
            var selectedManufacturer = document.getElementById('selectedManufacturer').value;
            var selectedVehicle = document.getElementById('selectedVehicle').value;
            var selectedEngine = document.getElementById('selectedEngine').value;

            var apiToken = localStorage.getItem('apiToken');
            if (manufacturerCalled == false) {
                fetch('/api/manufacturers?selected=' + JSON.stringify([selectedManufacturer]), {
                        method: 'GET',
                        headers: {
                            'Authorization': 'Bearer ' + apiToken,
                            'Content-Type': 'application/json'
                        },
                    })
                    .then(response => {
                        if (!response.ok) {
                            console.error('Network response error:', response);
                            throw new Error('Network response was not ok');
                        }

                        const contentType = response.headers.get('content-type');
                        if (!contentType || !contentType.includes('application/json')) {
                            console.error('Invalid content type:', contentType);
                            throw new TypeError('Expected JSON response');
                        }

                        return response.json();
                    }).then(data => {

                        var manufacturerSelect = document.getElementById('selectedManufacturer');
                        var selectedValue = manufacturerSelect.value;

                        manufacturerSelect.innerHTML = '';

                        var placeholderOption = document.createElement('option');
                        placeholderOption.value = '';
                        placeholderOption.text = 'Please choose';

                        placeholderOption.selected = true;
                        manufacturerSelect.add(placeholderOption);

                        data.forEach(manufacturer => {
                            var option = document.createElement('option');
                            option.value = manufacturer.id;
                            option.text = manufacturer.name;
                            manufacturerSelect.add(option);
                        });

                        manufacturerSelect.value = selectedValue;
                    })
                    .catch(error => console.error('Error while searching', error));
                manufacturerCalled = true;


            } else {}



        }

        document.getElementById('selectedVehicle').addEventListener('change', function() {
            fetchVehicles();
        });

        function fetchVehicles() {
            var selectedManufacturerId = document.getElementById('selectedManufacturer').value;
            var selectedVehicle = document.getElementById('selectedVehicle').value;

            var apiToken = localStorage.getItem('apiToken');

            fetch(`/api/vehicles?manufacturerId=${selectedManufacturerId}`, {
                    method: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + apiToken,
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => {
                    if (!response.ok) {
                        console.error('Network response error:', response);
                        throw new Error('Network response was not ok');
                    }

                    const contentType = response.headers.get('content-type');
                    if (!contentType || !contentType.includes('application/json')) {
                        console.error('Invalid content type:', contentType);
                        throw new TypeError('Expected JSON response');
                    }

                    return response.json();
                })
                .then(data => {
                    var vehicleSelect = document.getElementById('selectedVehicle');
                    var selectedValue = vehicleSelect.value;

                    vehicleSelect.innerHTML = '';

                    var placeholderOption = document.createElement('option');
                    placeholderOption.value = '';
                    placeholderOption.text = 'Please choose';

                    placeholderOption.selected = true;
                    vehicleSelect.add(placeholderOption);
                    data.forEach(vehicle => {
                        var option = document.createElement('option');
                        option.value = vehicle.id;
                        option.text = vehicle.name;
                        vehicleSelect.add(option);
                    });

                    vehicleSelect.value = selectedValue;
                })
                .catch(error => console.error('Error while searching', error));
            vehicleCalled = true;

        }

        function fetchEngines() {
            var selectedManufacturerId = document.getElementById('selectedManufacturer').value;
            var selectedEngine = document.getElementById('selectedEngine').value;

            var apiToken = localStorage.getItem('apiToken');

            fetch(`/api/engines?manufacturerId=${selectedManufacturerId}`, {
                    method: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + apiToken,
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => {
                    if (!response.ok) {
                        console.error('Network response error:', response);
                        throw new Error('Network response was not ok');
                    }

                    const contentType = response.headers.get('content-type');
                    if (!contentType || !contentType.includes('application/json')) {
                        console.error('Invalid content type:', contentType);
                        throw new TypeError('Expected JSON response');
                    }

                    return response.json();
                })
                .then(data => {
                    var engineSelect = document.getElementById('selectedEngine');
                    var selectedValue = engineSelect.value;

                    engineSelect.innerHTML = '';

                    var placeholderOption = document.createElement('option');
                    placeholderOption.value = '';
                    placeholderOption.text = 'Please choose';

                    placeholderOption.selected = true;
                    engineSelect.add(placeholderOption);
                    data.forEach(engine => {
                        var option = document.createElement('option');
                        option.value = engine.id;
                        option.text = engine.name;
                        engineSelect.add(option);
                    });


                    engineSelect.value = selectedValue;
                })
                .catch(error => console.error('Error while searching', error));
            engineCalled = true;

        }

        function getReleases() {
            var selectedManufacturer = document.getElementById('selectedManufacturer').value;
            var selectedVehicle = document.getElementById('selectedVehicle').value;
            var selectedEngine = document.getElementById('selectedEngine').value;

            console.log(selectedManufacturer, selectedVehicle, selectedEngine)

            var apiToken = localStorage.getItem('apiToken');

            var url = '/api/releases?' +
                'selectedManufacturer=' + encodeURIComponent(selectedManufacturer) +
                '&selectedVehicle=' + encodeURIComponent(selectedVehicle) +
                '&selectedEngine=' + encodeURIComponent(selectedEngine);


            var headers = {
                'Authorization': 'Bearer ' + apiToken,
                'Content-Type': 'application/json'
            };

            fetch(url, {
                    method: 'GET',
                    headers: headers
                })
                .then(response => response.json())
                .then(data => {
                    updateTable(data);
                })
                .catch(error => {
                    console.error('Error while fetching releases', error);
                });
        }

        function updateTable(releases) {
            const container = document.getElementById('releaseContainer');

            let content = '';

            releases.forEach((release, index) => {
                content += `
                <button class="xtl-button-accordion" data-index="${index}"> XTL-Freigabe ab: ${release.release_from} für ${release.standard.name}</button>
            <span class="xtl-panel" data-index="${index}">
                <span class="xtl-card-row">
                    <span class="xtl-card-label">Fahrzeughersteller</span>
                    <span class="xtl-card-value">
                        <b>${release.manufacturer.name}</b>
                    </span>
                </span>
                <span class="xtl-card-row">
                    <span class="xtl-card-label">Motor / Motorhersteller</span>
                    <span class="xtl-card-value">
                    ${release.engine.name} (${release.engine.manufacturer.name}) -
                    ${release.engine.power_kw} kW / ${release.engine.power_ps} PS
                    </span>
                </span>
                <span class="xtl-card-row">
                    <span class="xtl-card-label">Offizielle Herstellerfreigabe</span>
                    <span class="xtl-card-value">
                        <a href="${release.release_doc_url}">Link öffnen</a>
                    </span>
                </span>
                <span class="xtl-card-row">
                    <span class="xtl-card-label">Umfasst Fahrzeuge</span>
                    <span class="xtl-card-value">
                        <span class="xtl-vehicle-list">
                            `;

                release.vehicle_names.forEach(vehicleName => {
                    content += `<span class="xtl-vehicle-badge">${vehicleName}</span>`;
                });

                content += `
                        </span>
                    </span>
                </span>
                <span class="xtl-warning-border">
                    <span class="xtl-warning-icon">
                        <svg class="xtl-svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                        </svg>
                    </span>
                    <span class="xtl-warning-text">
                        Es handelt sich um eine Zusammenfassung der Herstellerfreigabe. Keine Gewährleistung für Aktualität der Daten. Prüfen Sie stets die offizielle Herstellerfreigabe oder wenden Sie sich an Ihren Fahrzeughersteller.
                        <a href="#" class="xtl-link">Link Herstellerfreigabe</a>
                    </span>
                </span>
            </span>
        `;
            });

            container.innerHTML = content;

            var accordions = document.querySelectorAll(".xtl-button-accordion");

            accordions.forEach(accordion => {
                accordion.addEventListener("click", function() {
                    var index = this.getAttribute("data-index");
                    var panel = document.querySelector(`.xtl-panel[data-index="${index}"]`);

                    this.classList.toggle("active");

                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                    } else {
                        panel.style.display = "block";
                    }
                });
            });
        }
    </script>
    <style>
        #searchForm {
            margin: auto;
            max-width: 530px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.15), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            border: 1px solid rgb(0 0 0 / 0.1);
            text-align: left;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .xtl-label {
            color: #000000;
            font-family: Inter var, ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            display: block;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
            margin-top: 12px;
        }

        .xtl-select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .xtl-button {
            width: 100%;
            padding: 10px 14px;
            background-color: #5147e5;
            color: #fff;
            font-family: Inter var, ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            margin-bottom: 1rem;
            margin-top: 1rem;

        }



        .xtl-logo {
            display: block;
            margin: auto;
            margin-top: 0.75rem;
            margin-bottom: 0.75rem;
            width: auto;
            height: 75px;
        }

        .xtl-hide {
            display: none;
        }

        .xtl-card-container {
            margin: auto;
            max-width: 670px;

        }

        .xtl-container {
            margin-top: 20px;
            display: flex;
            flex-direction: column;

        }

        .xtl-list {
            list-style: none;

        }

        .xtl-card {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            background-color: rgba(254, 254, 255, 1);
            overflow: hidden;

        }

        .xtl-card-header {
            display: block;
            background-color: rgba(249, 251, 253, 1);
            padding: 20px;
            border-radius: 4px;
            border-bottom: 1px solid #cbd5e0;
            font-style: bold;
            cursor: pointer;

        }

        .xtl-toggle-icon {
            margin-left: auto;
        }

        .xtl-card-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #f5f4f5;

        }

        .xtl-card-label {
            margin-right: 10px;
            color: rgb(107, 114, 128);
            font-size: 100%;

        }

        .xtl-card-value,
        .xtl-vehicle-list {
            flex-grow: 1;
            font-weight: 400;
            text-align: right;
            font-size: 100%;
            color: rgb(107, 114, 128);
        }

        .xtl-card-value a {
            text-decoration: underline;
            font-weight: 400;

        }

        .xtl-vehicle-badge {
            background-color: #dbeaff;
            color: #515dbd;
            padding: 0.25rem 0.5rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            border-radius: 4px;
        }

        .xtl-card-footer {
            border-left: 4px solid #f4cb28;
            background-color: #fefae9;
        }

        .xtl-warning-border {

            border-top: 4px solid #f4cb28;
            background-color: #fefae9;
            padding: 1rem;
            display: flex;
            border-radius: 0 0 10px 10px;

        }

        .xtl-warning-icon {
            margin-right: 0.5rem;
        }

        .xtl-warning-text {
            font-size: 14px;
            color: #ac7629;
        }

        a.xtl-link {
            color: #ac7629;
        }

        .xtl-svg {
            width: 1.5rem;
            height: 1.5rem;
        }


        .xtl-button-accordion {
            background-color: rgb(135, 299, 173);
            color: black;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            text-align: left;
            border: none;
            outline: none;
            transition: 0.4s;
            margin-top: 30px;
            border: 1px solid #9ca3af;
            font-size: 16px;
            font-family: Inter var, ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";

            border-radius: 10px 10px 10px 10px;

        }

        button.accordion {
            color: black;

        }


        é .active {
            border-radius: 10px 10px 0px 0px;
            border-bottom: 0px solid #9ca3af;
        }


        .xtl-panel {

            background-color: white;
            display: none;
            overflow: hidden;
            border-left: 1px solid #9ca3af;
            border-right: 1px solid #9ca3af;
            border-bottom: 1px solid #9ca3af;
            font-family: Inter var, ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            border-radius: 0px 0px 10px 10px;
            font-size: 14px;
        }

        .xtl-panel a {

            color: black;
        }



        .xtl-button-accordion:after {
            content: '\02795';

            font-size: 13px;
            color: #777;
            float: right;
            margin-left: 5px;
        }

        .active:after {
            content: "\2796";

        }

        .xtl-form-text {
            margin-top: 10px;
            margin-bottom: 10px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .xtl-form-text p {
            border: none;
            outline: none;
            width: 95%;
            font-family: Inter var, ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            color: #000000;
            background-color: transparent;
            font-size: 14px;
        }
    </style>
</div>
