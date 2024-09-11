<div>
    <div class="py-4">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
            <div class="px-4 py-5 sm:px-6">
                <div class="flex justify-between items-center">
                    <h3 class="card-title">HTML Code</h3>
                    <div class="flex items-center"> <!-- Ajouter la classe items-center ici -->
                        <span style="padding:0.125rem;" class="isolate inline-flex rounded-md shadow-sm bg-gray-200">
                            @if($htmlButton)
                            <button wire:click="toggleHtml" type="button" class="bg-gray-200 relative inline-flex items-center rounded-md px-3 py-1 text-gray-400 focus:z-10">
                                Hide
                            </button>
                            <button type="button" style="margin-left:0.25rem;" class="bg-white relative -ml-px inline-flex items-center rounded-md px-3 py-1 text-indigo-700 focus:z-10">
                                Show
                            </button>
                            @else
                            <button type="button" class="bg-white relative inline-flex items-center rounded-md px-3 py-1 text-indigo-700 focus:z-10">
                                Hide
                            </button>
                            <button wire:click="toggleHtml" type="button" style="margin-left:0.25rem;" class="bg-gray-200 relative -ml-px inline-flex items-center rounded-md px-3 py-1 text-gray-400 focus:z-10">
                                Show
                            </button>
                            @endif
                            <!-- Ajouter un espace -->

                        </span>

                        <button type="button" onclick="copyHtlmClipboard()" style="margin-left:10px;" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 bg-white relative -ml-px inline-flex items-center rounded-md text-gray-400 hover:text-indigo-700 focus:z-10 copy-js-button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                            </svg>
                        </button>


                    </div>
                </div>
            </div>
            @if($htmlButton)

            <div class="px-4 py-5 sm:p-6">
                <!-- Content goes here -->
                <div>

                    <div class="overflow-auto bg-gray-200 p-4 rounded language-html" style="max-height: 300px;">
                        <pre><code  class="language-html">
                            <div id="language-html">
                            &lt;div id="searchForm"&gt;
                                &lt;div class="disclaimer" id="disclaimer"&gt;
                                    &lt;h2 class="disclaimer-title"&gt;Disclaimer&lt;/h2&gt;
                                    &lt;p class="disclaimer-text"&gt;
                                    Sämtliche in den Suchergebnissen von refuelos.com angezeigte Freigaben stammen von externen Quellen und stehen unter dem Vorbehalt der Änderung durch die Urheber. &lt;br&gt;
                        refuelos.com übernimmt keine Garantie für die Richtigkeit der Angaben und haftet auch nicht für mögliche Schäden, die aus unrichtigen oder unvollständigen Angaben oder der Berücksichtigung einer Freigabe bei der Kraftstoffbetankung entstehen. &lt;br&gt;
                        Durch die Nutzung unseres Tools bestätigen Sie, dass Sie die &lt;a href="https://dev.refuelos.com/legal-informations" target="_blank" rel="noopener noreferrer"&gt;Nutzungsbedingungen&lt;/a&gt; gelesen und akzeptiert haben.
                                    &lt;/p&gt;
                                    &lt;button id="acceptButton"&gt;Ich akzeptiere die Nutzungsbedingungen&lt;/button&gt;
                                &lt;/div&gt;
                                &lt;div class="form-container"&gt;
                                    &lt;form id="form"&gt;
                                        &lt;img src="{{ $customLogoUrl ? $customLogoUrl : asset($defaultLogoPath) }}" alt="Logo" class="xtl-logo" /&gt;
                                        &lt;div class="xtl-form-text"&gt;
                                            &lt;p&gt;{{ $personalText }}&lt;/p&gt;
                                        &lt;/div&gt;

                                        &lt;div class="xtl-form-group"&gt;
                                            &lt;label class="xtl-label" for="selectedManufacturer"&gt;Nach Hersteller suchen&lt;/label&gt;
                                            &lt;select class="xtl-select" id="selectedManufacturer" disabled&gt;
                                            &lt;option value="" selected&gt;Wähle einen Hersteller&lt;/option&gt;
                                            &lt;!-- Options --&gt;
                                            &lt;/select&gt;
                                            &lt;span class="loader-div xtl-hide" id="loaderDiv"&gt;&lt;span id="loader" class="loader"
                                            style="display:none;"&gt;&lt;/span&gt;&lt;/span&gt;
                                        &lt;/div&gt;

                                        &lt;div class="xtl-form-group xtl-hide" id="hideSerie"&gt;
                                            &lt;label class="xtl-label" for="selectedSerie"&gt;Nach Baureihe suchen&lt;/label&gt;
                                            &lt;select class="xtl-select" id="selectedSerie" disabled&gt;
                                            &lt;option value="" selected&gt;Baureihe eingeben&lt;/option&gt;
                                            &lt;!-- Options  --&gt;
                                            &lt;/select&gt;
                                        &lt;/div&gt;

                                        &lt;div class="xtl-form-group xtl-hide" id="hideVehicle"&gt;
                                            &lt;label class="xtl-label" for="selectedVehicle"&gt;Nach Fahrzeugmodell suchen&lt;/label&gt;
                                            &lt;select class="xtl-select" id="selectedVehicle" disabled&gt;
                                            &lt;option value="" selected&gt;Bitte zuerst Baureihe auswählen&lt;/option&gt;
                                            &lt;!-- Options  --&gt;
                                            &lt;/select&gt;
                                        &lt;/div&gt;

                                        &lt;div class="xtl-form-group"&gt;
                                            &lt;button type="button" class="xtl-button" id="releasesButton" style="margin-top:10px;" disabled&gt;Freigaben suchen&lt;/button&gt;
                                        &lt;/div&gt;
                                        &lt;div class="xtl-form-group xtl-center"&gt;
                                            &lt;button type="button" id="resetButton" class="reset-button" disabled&gt;Suche zurücksetzen&lt;/button&gt;
                                        &lt;/div&gt;
                                        &lt;div id="errorMessage" class="xtl-error-message xtl-hide"&gt;
                                        &lt;/div&gt;
                                    &lt;/form&gt;
                                    &lt;script&gt;
                                        // Copy your Javascript code here
                                    &lt;/script&gt;
                                    &lt;style&gt;
                                        /*!-- Copy your CSS code here  */
                                    &lt;/style&gt;
                                &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class="xtl-card-container" id="releaseContainer"&gt;
                            &lt;/div&gt;
                        </div>
             </code></pre>
                    </div>
                </div>
                <!-- component -->

            </div>
            @endif
        </div>
    </div>


    <div class="py-4">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
            <div class="px-4 py-5 sm:px-6">
                <div class="flex justify-between items-center">
                    <h3 class="card-title">Javascript Code</h3>
                    <div class="flex items-center">
                        <span style="padding:0.125rem;" class="isolate inline-flex rounded-md shadow-sm bg-gray-200">
                            @if($jsButton)
                            <button wire:click="toggleJs" type="button" class="bg-gray-200 relative inline-flex items-center rounded-md px-3 py-1 text-gray-400 focus:z-10">
                                Hide
                            </button>
                            <button type="button" style="margin-left:0.25rem;" class="bg-white relative -ml-px inline-flex items-center rounded-md px-3 py-1 text-indigo-700 focus:z-10">
                                Show
                            </button>
                            @else
                            <button type="button" class="bg-white relative inline-flex items-center rounded-md px-3 py-1 text-indigo-700 focus:z-10">
                                Hide
                            </button>
                            <button wire:click="toggleJs" type="button" style="margin-left:0.25rem;" class="bg-gray-200 relative -ml-px inline-flex items-center rounded-md px-3 py-1 text-gray-400 focus:z-10">
                                Show
                            </button>
                            @endif
                            <!-- Ajouter un espace -->

                        </span>

                        <button type="button" onclick="copyJavascriptClipboard()" style="margin-left:10px;" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 bg-white relative -ml-px inline-flex items-center rounded-md text-gray-400 hover:text-indigo-700 focus:z-10 copy-js-button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            @if($jsButton)

            <div class="px-4 py-5 sm:p-6">
                <!-- Content goes here -->
                <div>
                    <!-- component -->
                    <div class="overflow-auto bg-gray-200 p-4 rounded" style="max-height: 300px;">

                        <pre><code class="language-javascript">
                                    document.addEventListener('DOMContentLoaded', function () {
                                    var manufacturerCalled = false;
                                    var serieCalled = false;
                                    var vehicleCalled = false;
                                    var apiToken = '{{$apiToken}}';
                                    var userId = '{{$userId}}';
                                    var tenantId = '{{$tenantId}}';
                                    let releasesFetched = false;
                                    let vehiclesAndSeriesFetched = false;
                                    let hasBeenReset = false;

                                    const disclaimer = document.getElementById('disclaimer');
                                    const acceptButton = document.getElementById('acceptButton');

                                    const cookieAccepted = localStorage.getItem('cookie_accepted');

                                    function enableFormElements() {
                                        const formElements = document.querySelectorAll('#form select, #form button');
                                        formElements.forEach(element => {
                                            element.disabled = false;
                                        });
                                    }

                                    if (cookieAccepted) {
                                        enableFormElements();
                                    } else {
                                        disclaimer.style.display = 'block';
                                    }

                                    acceptButton.addEventListener('click', function () {
                                        disclaimer.style.display = 'none';

                                        localStorage.setItem('cookie_accepted', true);

                                        enableFormElements();
                                    });

                                    document.getElementById('resetButton').addEventListener('click', function () {
                                        resetSelects();
                                    });

                                    function resetSelects() {

                                        var selectedOptions = document.querySelectorAll('select option:checked');
                                        for (var i = 0; i < selectedOptions.length; i++) {
                                            selectedOptions[i].selected = false;
                                        }
                                        vehiclesAndSeriesFetched = false;
                                        hasBeenReset = true;
                                        document.getElementById('releaseContainer').innerHTML = '';
                                        document.getElementById('hideSerie').classList.add('xtl-hide');
                                        document.getElementById('hideVehicle').classList.add('xtl-hide');
                                    }
                                    if (apiToken == 0) {
                                        console.error("The user doesn't have any token");
                                    }
                                    document.getElementById('selectedManufacturer').addEventListener('change', function () {
                                        if (releasesFetched) {
                                            fetchVehiclesAndSeries();
                                            vehiclesAndSeriesFetched = false;
                                        }
                                    });

                                    function showHiddenElements() {
                                        var hideVehicleElement = document.getElementById('hideVehicle');
                                        if (hideVehicleElement.classList.contains('xtl-hide')) {
                                            hideVehicleElement.classList.remove('xtl-hide');
                                        }
                                        var hideSerieElement = document.getElementById('hideSerie');
                                        if (hideSerieElement.classList.contains('xtl-hide')) {
                                            hideSerieElement.classList.remove('xtl-hide');
                                        }
                                    }

                                    function fetchVehiclesAndSeries() {
                                        var selectedManufacturerId = document.getElementById('selectedManufacturer').value;
                                        if (selectedManufacturerId) {
                                            fetchVehiclesAndSeries(selectedManufacturerId);
                                        }
                                    }
                                    document.getElementById('selectedManufacturer').addEventListener('click', function () {
                                        fetchManufacturers();
                                    });
                                    document.getElementById('releasesButton').addEventListener('click', function () {
                                        getReleases();
                                    });

                                    function fetchData(endpoint, queryParams, userId, tenantId) {
                                        var url = `{{ $appUrl }}/api/${endpoint}?${new URLSearchParams(queryParams)}&userId=${userId}&tenantId=${tenantId}`;

                                        var headers = {
                                            'Authorization': 'Bearer ' + apiToken,
                                            'Content-Type': 'application/json'
                                        };
                                        return fetch(url, {
                                            method: 'GET',
                                            headers: headers,
                                        }).then(response => {
                                            if (!response.ok) {
                                                console.error('Network response error:', response);

                                                var errorMessage = '';
                                                if (response.status === 400) {
                                                    errorMessage = "Nicht autorisiertes Authentifizierungstoken. Wenden Sie sich an mail@refuelos.com";
                                                } else if (response.status === 401) {
                                                    errorMessage = "Nicht autorisiertes Authentifizierungstoken. Wenden Sie sich an mail@refuelos.com";
                                                } else if (response.status === 403) {
                                                    errorMessage = 'Die Lizenz ist abgelaufen. Wenden Sie sich an mail@refuelos.com';
                                                } else {
                                                    errorMessage = "There is an error occurring, please try again, or contact mail@refuelos.com.";
                                                }


                                                errorMessage += ' (' + response.statusText + ')';
                                                var errorMessageDiv = document.getElementById('errorMessage');
                                                errorMessageDiv.innerHTML = errorMessage;
                                                errorMessageDiv.classList.remove('xtl-hide');
                                                throw new Error(errorMessage);
                                            }

                                            const contentType = response.headers.get('content-type');
                                            if (!contentType || !contentType.includes('application/json')) {
                                                console.error('Invalid content type:', contentType);
                                                throw new TypeError('Expected JSON response');
                                            }

                                            return response.json();
                                        })
                                            .catch(error => {
                                                console.error('Error fetching data:', error);
                                            });
                                    }

                                    var apiCount = 0;
                                    function fetchManufacturers() {
                                        var selectedManufacturer = document.getElementById('selectedManufacturer').value;
                                        const cookieAccepted = localStorage.getItem('cookie_accepted');
                                        if (cookieAccepted) {
                                            if (manufacturerCalled == false) {
                                                apiCount++;


                                                var loader = document.getElementById('loader');
                                                var loaderDiv = document.getElementById('loaderDiv');
                                                loader.style.display = 'inline-block';
                                                loaderDiv.classList.remove('xtl-hide');

                                                fetchData('manufacturers', {
                                                    selected: [selectedManufacturer]
                                                }, userId, tenantId)
                                                    .then(data => {
                                                        var manufacturerSelect = document.getElementById('selectedManufacturer');
                                                        var selectedValue = manufacturerSelect.value;

                                                        manufacturerSelect.innerHTML = '';

                                                        var placeholderOption = document.createElement('option');
                                                        placeholderOption.value = '';
                                                        placeholderOption.text = 'Wähle einen Hersteller';

                                                        placeholderOption.selected = true;
                                                        manufacturerSelect.add(placeholderOption);

                                                        data.forEach(manufacturer => {
                                                            var option = document.createElement('option');
                                                            option.value = manufacturer.id;
                                                            option.text = manufacturer.name;
                                                            manufacturerSelect.add(option);
                                                        });

                                                        manufacturerSelect.value = selectedValue;

                                                        loader.style.display = 'none';
                                                        loaderDiv.classList.add('xtl-hide');
                                                    })
                                                    .catch(error => {
                                                        console.error('Error while searching', error);

                                                        loader.style.display = 'none';
                                                        loaderDiv.classList.add('xtl-hide');

                                                    });
                                                manufacturerCalled = true;

                                            } else { }
                                        }
                                    }

                                    function fetchVehiclesAndSeries() {
                                        var selectedManufacturerId = document.getElementById('selectedManufacturer').value;
                                        const cookieAccepted = localStorage.getItem('cookie_accepted');

                                        if (cookieAccepted) {

                                            if (selectedManufacturerId) {
                                                apiCount++;


                                                fetchData('vehicles-and-series', {
                                                    manufacturerId: selectedManufacturerId
                                                }, userId, tenantId)
                                                    .then(data => {
                                                        var vehicleSelect = document.getElementById('selectedVehicle');
                                                        var serieSelect = document.getElementById('selectedSerie');

                                                        var selectedVehicleValue = vehicleSelect.value;
                                                        var selectedSerieValue = serieSelect.value;

                                                        vehicleSelect.innerHTML = '';
                                                        serieSelect.innerHTML = '';

                                                        var placeholderSerieOption = document.createElement('option');
                                                        placeholderSerieOption.value = '';
                                                        placeholderSerieOption.text = 'Baureihe eingeben';

                                                        placeholderSerieOption.selected = true;
                                                        serieSelect.add(placeholderSerieOption);

                                                        var placeholderVehicleOption = document.createElement('option');
                                                        placeholderVehicleOption.value = '';
                                                        placeholderVehicleOption.text = 'Bitte zuerst Baureihe auswählen';
                                                        placeholderVehicleOption.disabled = true;


                                                        placeholderVehicleOption.selected = true;
                                                        vehicleSelect.add(placeholderVehicleOption);

                                                        data.series.forEach(serie => {
                                                            var option = document.createElement('option');
                                                            option.value = serie.id;
                                                            option.text = serie.name;
                                                            serieSelect.add(option);
                                                        });

                                                        serieSelect.addEventListener('change', function () {
                                                            var selectedSerieId = Number(serieSelect.value);
                                                            if (selectedSerieId !== 0) {
                                                                vehicleSelect.innerHTML = '';
                                                                var placeholderOption = document.createElement('option');
                                                                placeholderOption.value = '';
                                                                placeholderOption.text = 'Fahrzeugmodell eingeben';
                                                                placeholderOption.selected = true;
                                                                vehicleSelect.add(placeholderOption);
                                                                data.vehicles.forEach(vehicle => {
                                                                    if (Number(vehicle.series_id) === selectedSerieId) {
                                                                        var option = document.createElement('option');
                                                                        option.value = vehicle.id;
                                                                        option.text = vehicle.name;
                                                                        vehicleSelect.add(option);
                                                                    }

                                                                });
                                                            } else {
                                                                vehicleSelect.innerHTML = '';
                                                                var placeholderVehicleOption = document.createElement('option');
                                                                placeholderVehicleOption.value = '';
                                                                placeholderVehicleOption.text = 'Bitte zuerst Baureihe auswählen';
                                                                placeholderVehicleOption.selected = true;
                                                                vehicleSelect.add(placeholderVehicleOption);
                                                            }
                                                        });

                                                        vehicleSelect.value = selectedVehicleValue;
                                                        serieSelect.value = selectedSerieValue;
                                                        if (!hasBeenReset) {
                                                            vehiclesAndSeriesFetched = true;
                                                        }
                                                    })
                                                    .catch(error => console.error('Error while searching', error));
                                            }
                                        }
                                    }

                                    function getReleases() {
                                        var selectedManufacturer = document.getElementById('selectedManufacturer').value;
                                        var selectedVehicle = document.getElementById('selectedVehicle').value;
                                        var selectedSerie = document.getElementById('selectedSerie').value;
                                        const cookieAccepted = localStorage.getItem('cookie_accepted');

                                        if (cookieAccepted) {

                                            apiCount++;

                                            fetchData('releases', {
                                                selectedManufacturer: selectedManufacturer,
                                                selectedVehicle: selectedVehicle,
                                                selectedSerie: selectedSerie
                                            }, userId, tenantId)
                                                .then(data => {
                                                    updateTable(data);
                                                    if (!vehiclesAndSeriesFetched) {
                                                        fetchVehiclesAndSeries();
                                                        showHiddenElements();
                                                        hasBeenReset = false;
                                                    }

                                                    releasesFetched = true;
                                                })
                                                .catch(error => {
                                                    console.error('Error while fetching releases', error);
                                                });
                                        }
                                    }




                                    function updateTable(releases) {
                                        const container = document.getElementById('releaseContainer');

                                        let content = '';

                                        let manufacturer;
                                        let vehicleSeries;
                                        let releaseVehicle;

                                        const cookieAccepted = localStorage.getItem('cookie_accepted');

                                        if (cookieAccepted) {
                                            releases.forEach((release, index) => {
                                                let leistung = '';
                                                let b10 = '';
                                                let xtl = '';
                                                let zustzinfo = '';
                                                let b10Badge = '';
                                                let xtlBadge = '';

                                                if (release.releaseVehicle.power_ps) {
                                                    leistung += `${release.releaseVehicle.power_ps} PS`;
                                                }
                                                if (release.releaseVehicle.power_kw) {
                                                    leistung += (leistung ? ' / ' : '') + `${release.releaseVehicle.power_kw} KW`;
                                                }
                                                if (release.releaseVehicle.displacement_ccm) {
                                                    leistung += (leistung ? ' / ' : '') + `${release.releaseVehicle.displacement_ccm} ccm`;
                                                }

                                                if (release.has_b10_release == 1) {
                                                    b10 = `&lt;span style="color:#15803d;" class="xtl-b10-text"&gt;${release.release_b10_from ? release.release_b10_from : ''}&lt;/span&gt; &lt;br&gt; &lt;span style="color:red;"&gt;${release.no_b10_release ? release.no_b10_release : ''}&lt;/span&gt;`;
                                                    b10Badge = `&lt;span style="font-weight: 400;display:inline-flex;align-items:center;border-radius:0.375rem;padding:0.2rem 0.5rem;font-size:0.75rem;line-height:1rem;color:#15803d;background-color:rgba(187, 246, 208, 1);border:0px solid rgb(165, 227, 165);box-shadow:inset 0 0 0 1px rgb(110, 226, 110);"&gt;
                                    B10
                                    &lt;svg style="color:#22c55e; width: 1.5rem; height: 1.5rem;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"&gt;
                                    &lt;path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /&gt;
                                    &lt;/svg&gt;
                                    &lt;/span&gt;`
                                                } else {
                                                    b10 = `&lt;span style="color:#DC2626;" class="xtl-b10-text"&gt;Keine Freigabe&lt;/span&gt;`;
                                                    b10Badge = `&lt;span style="font-weight: 400;display:inline-flex;align-items:center;border-radius:0.375rem;padding:0.2rem 0.5rem;font-size:0.75rem;line-height:1rem;color:rgba(191, 97, 97, 1);background-color:rgba(254, 203, 202, 1);border:0px solid rgba(191, 97, 97, 1);box-shadow:inset 0 0 0 1px rgba(238, 175, 172, 1);"&gt;
                                    B10
                                    &lt;svg style="color:rgba(238, 69, 69, 1); width: 1.5rem; height: 1.5rem;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"&gt;
                                    &lt;path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /&gt;
                                    &lt;/svg&gt;
                                    &lt;/span&gt;`
                                                }

                                                if (release.has_xtl_release == 1) {
                                                    xtl = `&lt;span style="color:#15803d; " class="xtl-b10-text"&gt; ${release.release_xtl_from ? release.release_xtl_from : ''} &lt;/span&gt; &lt;br&gt; &lt;span style="color:red;"&gt;${release.no_xtl_release ? release.no_xtl_release : ''}&lt;/span&gt;`;
                                                    xtlBadge = `&lt;span style="font-weight: 400;display:inline-flex;align-items:center;border-radius:0.375rem;padding:0.2rem 0.5rem;font-size:0.75rem;line-height:1rem;color:#15803d;background-color:rgba(187, 246, 208, 1);border:0px solid rgb(165, 227, 165);box-shadow:inset 0 0 0 1px rgb(110, 226, 110);"&gt;
                                    XTL

                                    &lt;svg style="color:#22c55e; width: 1.5rem; height: 1.5rem; xmlns=" http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"&gt;
                                    &lt;path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /&gt;
                                    &lt;/svg&gt;

                                    &lt;/span&gt;`
                                                } else {
                                                    xtl = `&lt;span style="color:#DC2626; " class="xtl-b10-text"&gt;Keine Freigabe&lt;/span&gt;`;
                                                    xtlBadge = `&lt;span style="font-weight: 400;display:inline-flex;align-items:center;border-radius:0.375rem;padding:0.2rem 0.5rem;font-size:0.75rem;line-height:1rem;color:rgba(191, 97, 97, 1);background-color:rgba(254, 203, 202, 1);border:0px solid rgba(191, 97, 97, 1);box-shadow:inset 0 0 0 1px rgba(238, 175, 172, 1);"&gt;
                                    XTL
                                    &lt;svg style="color:rgba(238, 69, 69, 1); width: 1.5rem; height: 1.5rem;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"&gt;
                                    &lt;path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /&gt;
                                    &lt;/svg&gt;
                                    &lt;/span&gt;`;

                                                }

                                                if (release.release_additional_info) {
                                                    zustzinfo = `
                                    &lt;span class="xtl-card-row"&gt;
                                    &lt;span class="xtl-card-label"&gt;Zusatzinfo Freigabe&lt;/span&gt;
                                    &lt;span class="xtl-card-value"&gt;
                                    ${release.release_additional_info}
                                    &lt;/span&gt;
                                    &lt;/span&gt;
                                    `;
                                                }

                                                content += `
                                    &lt;button class="xtl-button-accordion" data-index="${index}"&gt;
                                    &lt;div class="xtl-content"&gt;
                                    &lt;div class="xtl-column"&gt;
                                    &lt;div class="xtl-first-line"&gt;
                                    ${release.manufacturer.name ? release.manufacturer.name : ''} ${release.releaseVehicle.vehicle_series.vehicle_series_name ? release.releaseVehicle.vehicle_series.vehicle_series_name : ''}
                                    &lt;/div&gt;
                                    &lt;div class="xtl-second-line"&gt;
                                    ${release.releaseVehicle.vehicle_model_name ? release.releaseVehicle.vehicle_model_name : ''}
                                    &lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;div class="xtl-badges"&gt;
                                    &lt;div class="xtl-badge-container"&gt;
                                    &lt;div class="xtl-badge"&gt;
                                    ${xtlBadge ? xtlBadge : ''}
                                    &lt;/div&gt;
                                    ${xtl}
                                    &lt;/div&gt;
                                    &lt;div class="xtl-badge-container"&gt;
                                    &lt;div class="b10-badge"&gt;
                                    ${b10Badge ? b10Badge : ''}
                                    &lt;/div&gt;
                                    ${b10}
                                    &lt;/div&gt;
                                    &lt;/div&gt;

                                    &lt;/div&gt;
                                    &lt;div class="xtl-details-indicator"&gt;
                                    &lt;span class="xtl-details-text"&gt;mehr Details&lt;/span&gt; &lt;span class="xtl-details-symbol"&gt;&lt;svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"&gt;
                                    &lt;path d="M7.293 4.707 14.586 12l-7.293 7.293 1.414 1.414L17.414 12 8.707 3.293 7.293 4.707z" /&gt;
                                    &lt;/svg&gt;&lt;/span&gt;
                                    &lt;/div&gt;
                                    &lt;/button&gt;


                                    &lt;span class="xtl-panel" data-index="${index}"&gt;
                                    &lt;span class="xtl-card-row"&gt;
                                    &lt;span class="xtl-card-label"&gt;Hersteller&lt;/span&gt;
                                    &lt;span class="xtl-card-value" style="color:black;"&gt;
                                    &lt;b&gt;${release.manufacturer.name ? release.manufacturer.name : ''}&lt;/b&gt;
                                    &lt;/span&gt;
                                    &lt;/span&gt;

                                    &lt;span class="xtl-card-row"&gt;
                                    &lt;span class="xtl-card-label"&gt;Baureihe&lt;/span&gt;
                                    &lt;span class="xtl-card-value" style="color:black;"&gt;
                                    &lt;b&gt;${release.vehicleSeries.vehicle_series_name ? release.vehicleSeries.vehicle_series_name : ''}&lt;/b&gt;
                                    &lt;/span&gt;
                                    &lt;/span&gt;

                                    &lt;span class="xtl-card-row"&gt;
                                    &lt;span class="xtl-card-label"&gt;Modell&lt;/span&gt;
                                    &lt;span class="xtl-card-value" style="color:black;"&gt;
                                    &lt;b&gt;${release.releaseVehicle.vehicle_model_name ? release.releaseVehicle.vehicle_model_name : ''}&lt;/b&gt;
                                    &lt;/span&gt;
                                    &lt;/span&gt;

                                    &lt;span class="xtl-card-row"&gt;
                                    &lt;span class="xtl-card-label"&gt;Motor&lt;/span&gt;
                                    &lt;span class="xtl-card-value"&gt;
                                    ${release.releaseVehicle.engine_name ? release.releaseVehicle.engine_name : ''}
                                    &lt;/span&gt;
                                    &lt;/span&gt;

                                    &lt;span class="xtl-card-row"&gt;
                                    &lt;span class="xtl-card-label"&gt;Produktionsstart&lt;/span&gt;
                                    &lt;span class="xtl-card-value"&gt;
                                    ${release.releaseVehicle.vehicle_production_start ? release.releaseVehicle.vehicle_production_start : ''}
                                    &lt;/span&gt;
                                    &lt;/span&gt;

                                    &lt;span class="xtl-card-row"&gt;
                                    &lt;span class="xtl-card-label"&gt;Leistung&lt;/span&gt;
                                    &lt;span class="xtl-card-value"&gt;
                                    ${leistung ? leistung : ''}
                                    &lt;/span&gt;
                                    &lt;/span&gt;

                                    &lt;span class="xtl-card-row"&gt;
                                    &lt;span class="xtl-card-label"&gt;B10 Freigabe für Fahrzeuge&lt;/span&gt;
                                    &lt;span class="xtl-card-value"&gt;
                                    ${b10}
                                    &lt;/span&gt;
                                    &lt;/span&gt;

                                    &lt;span class="xtl-card-row"&gt;
                                    &lt;span class="xtl-card-label"&gt;XTL Freigabe für Fahrzeuge&lt;/span&gt;
                                    &lt;span class="xtl-card-value"&gt;
                                    ${xtl}
                                    &lt;/span&gt;
                                    &lt;/span&gt;

                                    ${zustzinfo}

                                    &lt;span class="xtl-card-row" style="border-bottom:0px;"&gt;
                                    &lt;span class="xtl-card-label"&gt;Quelle&lt;/span&gt;
                                    &lt;span class="xtl-card-value"&gt;
                                    &lt;b&gt;&lt;span style="color:black;"&gt;${release.source.description ? release.source.description : ''} &lt;a href="${release.source.link_official_release ? release.source.link_official_release : ''}"&gt;&lt;span class="text-decoration-line: underline"&gt; Link öffnen &lt;/span&gt;&lt;/a&gt;&lt;/span&gt;&lt;/b&gt; &lt;br&gt; &lt;span style="line-height:22px; font-size:13px;"&gt;(letzter Abruf : ${release.source.last_crawl ? release.source.last_crawl : ''})&lt;/span&gt;
                                    &lt;/span&gt;
                                    &lt;/span&gt;
                                    &lt;/span&gt;
                                    &lt;span class="xtl-warning-border"&gt;
                                    &lt;span class="xtl-warning-decoration"&gt;
                                    &lt;span class="xtl-warning-icon"&gt;
                                    &lt;svg class="xtl-svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"&gt;
                                    &lt;path fill-rule="evenodd" fill="orange" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" /&gt;
                                    &lt;/svg&gt;
                                    &lt;/span&gt;
                                    &lt;span class="xtl-warning-text"&gt;&lt;p&gt;
                                    Es handelt sich um eine Zusammenfassung der Herstellerfreigabe. Keine Gewährleistung für Aktualität der Daten. Prüfen Sie stets die offizielle Herstellerfreigabe oder wenden Sie sich an Ihren Fahrzeughersteller.
                                    &lt;a href="${release.source.link_official_release ? release.source.link_official_release : '#'}" class="xtl-link"&gt;Link Herstellerfreigabe &lt;/a&gt;&lt;/p&gt;
                                    &lt;/span&gt;
                                    &lt;/span&gt;
                                    &lt;/span&gt;
                                    `;
                                            });

                                            container.innerHTML = content;

                                            var accordions = document.querySelectorAll(".xtl-button-accordion");

                                            accordions.forEach(accordion => {
                                                accordion.addEventListener("click", function () {
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
                                    }

                                });
            </code></pre>
                    </div>
                    <!-- component -->

                </div>
            </div>
            @endif
        </div>




        <div class="py-4">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
                <div class="px-4 py-5 sm:px-6">
                    <div class="flex justify-between items-center">
                        <h3 class="card-title">CSS Code</h3>
                        <div class="flex items-center">
                            <span style="padding:0.125rem;" class="isolate inline-flex rounded-md shadow-sm bg-gray-200">
                                @if($cssButton)
                                <button wire:click="toggleCss" type="button" class="bg-gray-200 relative inline-flex items-center rounded-md px-3 py-1 text-gray-400 focus:z-10">
                                    Hide
                                </button>
                                <button type="button" style="margin-left:0.25rem;" class="bg-white relative -ml-px inline-flex items-center rounded-md px-3 py-1 text-indigo-700 focus:z-10">
                                    Show
                                </button>
                                @else
                                <button type="button" class="bg-white relative inline-flex items-center rounded-md px-3 py-1 text-indigo-700 focus:z-10">
                                    Hide
                                </button>
                                <button wire:click="toggleCss" type="button" style="margin-left:0.25rem;" class="bg-gray-200 relative -ml-px inline-flex items-center rounded-md px-3 py-1 text-gray-400 focus:z-10">
                                    Show
                                </button>
                                @endif
                            </span>



                            <button type="button" onclick="copyCssClipboard()" style="margin-left:10px;" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 bg-white relative -ml-px inline-flex items-center rounded-md text-gray-400 hover:text-indigo-700 focus:z-10 copy-js-button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @if($cssButton)
                <div class="px-4 py-5 sm:p-6">
                    <!-- Content goes here -->
                    <div>

                        <div class="overflow-auto bg-gray-200 p-4 rounded" style="max-height: 300px;">

                            <pre><code class="language-css">
                            #searchForm {
                                margin: auto;
                                max-width: 530px;
                                padding: 20px;
                                background-color: {{ $backgroundColor  }};
                                border-radius: 8px;
                                position: relative;
                                box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.15), 0 1px 2px -1px rgb(0 0 0 / 0.1);
                                border: 1px solid rgb(0 0 0 / 0.1);
                                text-align: left;
                                }

                                #searchForm,
                                #searchForm p,
                                #searchForm button,
                                .xtl-card-container {
                                font-family: arial;
                                }

                                #searchForm label,
                                #releasesButton {
                                font-weight: bold
                                }

                                .form-group {
                                margin-bottom: 20px;
                                }

                                .xtl-label {
                                color: {{ $fontColor }};
                                display: block;
                                font-size: 14px;
                                font-weight: 500;
                                margin-bottom: 8px;
                                margin-top: 12px;
                                }

                                .xtl-select {
                                -webkit-appearance: none;
                                /* Safari and Chrome */
                                -moz-appearance: none;
                                /* Firefox */
                                width: 100%;
                                padding: 8px;
                                border: 1px solid #ddd;
                                border-radius: 4px;
                                margin-bottom: 20px;
                                cursor: pointer;
                                background-color: #fff;
                                background-image: url('data:image/svg+xml;utf8,&lt;svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 4 5"&gt;&lt;path fill="none" stroke="currentColor" stroke-width="1" d="M0 0l2 2 2-2"/&gt;&lt;/svg&gt;');
                                background-repeat: no-repeat;
                                background-position: right 10px center;
                                background-size: 10px 10px;
                                font-family: inherit;
                                font-size: 14px;
                                line-height: inherit;
                                color: black;
                                }

                                .xtl-select::-ms-expand {
                                display: none;
                                }


                                .xtl-button {
                                width: 100%;
                                padding: 10px 14px;
                                background-color: {{ $buttonColor }};
                                color: {{ $buttonFontColor }};
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
                                max-height: 75px;
                                }

                                .xtl-hide {
                                display: none !important;
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
                                color: black;

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
                                border-right: 1px solid #9ca3af;
                                border-bottom: 1px solid #9ca3af;
                                border-left: 1px solid #9ca3af;

                                background-color: #fefae9;
                                display: flex;
                                border-radius: 0 0 10px 10px;

                                }

                                .xtl-warning-decoration {
                                border-top: 4px solid #f4cb28;
                                border-left: 4px solid #f4cb28;
                                padding: 1rem;
                                border-radius: 0 0 10px 10px;
                                display: flex;
                                flex-direction: row;
                                align-items: flex-start;
                                padding-bottom: 20px;
                                padding-top: 20px;

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
                                background-color: rgba(221, 253, 231, 1);
                                color: black;
                                cursor: pointer;
                                padding: 8px 20px;
                                width: 100%;
                                text-align: left;
                                outline: none;
                                transition: 0.4s;
                                margin-top: 30px;
                                border-top: 1px solid #9ca3af;
                                border-right: 1px solid #9ca3af;
                                border-left: 1px solid #9ca3af;
                                border-bottom: 0px solid rgba(209, 234, 220, 1);
                                font-size: 16px;
                                border-radius: 10px 10px 0px 0px;
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                                position: relative;
                                flex-direction: row;
                                }

                                .xtl-button-accordion:hover {
                                background-color: rgba(187, 246, 208, 1);
                                }



                                .xtl-content {
                                display: flex;
                                flex-direction: row;
                                justify-content: flex-start;
                                width: 100%;
                                align-items: center;
                                }

                                .xtl-column {
                                display: flex;
                                flex-direction: column;
                                margin-right: 5%;
                                }

                                .xtl-first-line {
                                font-size: 16px;
                                font-weight: 600;
                                }

                                .xtl-second-line {
                                font-size: 16px;
                                }

                                .xtl-first-line,
                                .xtl-second-line {
                                display: block;
                                margin: 0;
                                padding: 0;
                                }

                                .xtl-badges {
                                display: flex;
                                flex-direction: column;
                                align-items: flex-start;
                                }

                                .xtl-badge-container {
                                display: flex;
                                flex-direction: row;
                                align-items: center;
                                margin-bottom: 5px;
                                }

                                .xtl-badge,
                                .b10-badge {
                                margin-bottom: 2px;
                                margin-right: 5px;
                                }

                                .xtl-b10-text {
                                padding-left: 15px;

                                }


                                .xtl-details-indicator {
                                position: absolute;
                                right: 20px;
                                display: flex;
                                align-items: center;
                                }


                                .xtl-details-symbol {
                                margin-left: 5px;
                                }

                                .xtl-button-accordion.active .xtl-details-text {
                                content: "mehr Details";
                                }

                                .xtl-button-accordion .xtl-details-symbol svg {
                                transition: all 0.4s ease;
                                transform: rotateZ(90deg);
                                }

                                .xtl-button-accordion.active .xtl-details-symbol svg {
                                transform: rotateZ(-90deg);
                                }

                                button.accordion {
                                color: black;

                                }


                                .active {
                                border-radius: 10px 10px 0px 0px;
                                border-bottom: 1px solid rgba(209, 234, 220, 1);
                                }


                                .xtl-panel {

                                background-color: white;
                                display: none;
                                overflow: hidden;
                                border-left: 1px solid #9ca3af;
                                border-right: 1px solid #9ca3af;
                                border-bottom: 1px solid #9ca3af;
                                border-radius: 0px;
                                font-size: 14px;
                                }

                                .xtl-warning-text a {
                                color: #ac7629;
                                }

                                .xtl-warning-text p {
                                text-align: left;
                                margin: 0;
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
                                color: {{ $fontColor }};
                                background-color: transparent;
                                font-size: 14px;
                                }

                                .xtl-center {

                                text-align: center;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                }

                                .reset-button {
                                display: inline-block;
                                margin-left: auto;
                                margin-right: auto;
                                border-radius: 0.375rem;
                                background-color: rgb(254 242 242);
                                padding-left: 0.5rem;
                                padding-right: 0.5rem;
                                padding-top: 0.25rem;
                                padding-bottom: 0.25rem;
                                font-size: 0.875rem;
                                font-weight: lighter;
                                color: #DC2626;
                                border: none;
                                cursor: pointer;

                                }

                                .reset-button:hover {
                                background-color: rgb(254 226 226);
                                }


                                .xtl-error-message {
                                text-align: center;
                                color: red;
                                font-size: 14px;
                                padding-top: 15px;
                                }

                                .disclaimer {
                                position: absolute;
                                right: -30px;
                                left: -30px;
                                background-color: rgba(55, 65, 81, 0.8);
                                border-radius: 5px;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
                                z-index: 1000;
                                display: none;
                                color: #fff;
                                padding: 30px;
                                }

                                .disclaimer p {
                                margin: 0;
                                padding-bottom: 20px;
                                text-align: center;
                                }

                                .disclaimer-title {
                                font-size: 24px;
                                text-align: center;
                                color: #fff;

                                }

                                .disclaimer-text {
                                text-align: justify;
                                margin-bottom: 20px;
                                }

                                .disclaimer button {
                                background-color: #4F46E5;
                                ;
                                color: #fff;
                                border: none;
                                padding: 10px 20px;
                                border-radius: 5px;
                                cursor: pointer;
                                display: block;
                                margin: 0 auto;
                                font-size: 16px;
                                }

                                .disclaimer button:hover {
                                background-color: #6366F1;
                                }

                                .disclaimer a {
                                color: #4F46E5;
                                text-decoration: none;
                                }

                                .form-container {
                                position: relative;
                                }

                                @media (max-width: 600px) {

                                .xtl-button-accordion {
                                display: flex;
                                flex-direction: column;
                                align-items: flex-end;
                                padding-bottom: 20px;
                                }

                                .xtl-content {
                                display: flex !important;
                                flex-direction: column !important;
                                justify-content: flex-start !important;
                                width: 100% !important;
                                align-items: flex-start !important;
                                padding: 20px 0px 0px 20px !important;
                                }

                                .xtl-details-indicator {
                                position: relative !important;

                                }

                                .xtl-first-line,
                                .xtl-second-line {
                                padding-bottom: 10px !important;
                                }

                                .xtl-b10-text {
                                padding-left: 5px !important;

                                }
                                }


                                .loader-div {
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                margin-top: 20px;
                                }

                                .loader {
                                width: 30px;
                                aspect-ratio: 1;
                                border-radius: 50%;
                                border: 8px solid {{ $buttonColor }};
                                animation:
                                l20-1 0.8s infinite linear alternate,
                                l20-2 1.6s infinite linear;
                                }

                                @keyframes l20-1 {
                                0% {
                                clip-path: polygon(50% 50%, 0 0, 50% 0%, 50% 0%, 50% 0%, 50% 0%, 50% 0%)
                                }

                                12.5% {
                                clip-path: polygon(50% 50%, 0 0, 50% 0%, 100% 0%, 100% 0%, 100% 0%, 100% 0%)
                                }

                                25% {
                                clip-path: polygon(50% 50%, 0 0, 50% 0%, 100% 0%, 100% 100%, 100% 100%, 100% 100%)
                                }

                                50% {
                                clip-path: polygon(50% 50%, 0 0, 50% 0%, 100% 0%, 100% 100%, 50% 100%, 0% 100%)
                                }

                                62.5% {
                                clip-path: polygon(50% 50%, 100% 0, 100% 0%, 100% 0%, 100% 100%, 50% 100%, 0% 100%)
                                }

                                75% {
                                clip-path: polygon(50% 50%, 100% 100%, 100% 100%, 100% 100%, 100% 100%, 50% 100%, 0% 100%)
                                }

                                100% {
                                clip-path: polygon(50% 50%, 50% 100%, 50% 100%, 50% 100%, 50% 100%, 50% 100%, 0% 100%)
                                }
                                }

                                @keyframes l20-2 {
                                0% {
                                transform: scaleY(1) rotate(0deg)
                                }

                                49.99% {
                                transform: scaleY(1) rotate(135deg)
                                }

                                50% {
                                transform: scaleY(-1) rotate(0deg)
                                }

                                100% {
                                transform: scaleY(-1) rotate(-135deg)
                                }
                                }
                                        </code></pre>
                        </div>
                        <!-- component -->
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        function copyHtlmClipboard() {
            //Select the element containing the HTML code to copy
            var codeElement = document.getElementById('HtmlCode');
            // Verify if the element exists
            if (codeElement) {
                // Create a temporary textarea to copy the HTML code
                var textarea = document.createElement("textarea");
                textarea.value = codeElement.innerHTML;
                document.body.appendChild(textarea);

                // Select the content in the textarea
                textarea.select();
                textarea.setSelectionRange(0, textarea.value.length); // For mobile browsers

                // Copy the content to the clipboard
                document.execCommand("copy");

                // Delete the temporary textarea
                document.body.removeChild(textarea);

                // Display a confirmation message or perform other actions if successful
                // console.log("The HTML code has been copied to the clipboard.");
            } else {
                // console.log("No element found with id 'HtmlCode'");
            }
        }

        function copyCssClipboard() {
            //Select the element containing the CSS code to copy
            var codeElement = document.getElementById('CssCode');
            // Verify if the element exists
            if (codeElement) {
                // Create a temporary textarea to copy the HTML code
                var textarea = document.createElement("textarea");
                textarea.value = codeElement.innerHTML;
                document.body.appendChild(textarea);

                // Select the content in the textarea
                textarea.select();
                textarea.setSelectionRange(0, textarea.value.length); // For mobile browsers

                // Copy the content to the clipboard
                document.execCommand("copy");

                // Delete the temporary textarea
                document.body.removeChild(textarea);

                // Display a confirmation message or perform other actions if successful

                // console.log("The CSS code has been copied to the clipboard.");
            } else {
                // console.log("No element found with id 'CssCode'");
            }
        }

        function copyJavascriptClipboard() {
            //Select the element containing the Javascript code to copy
            var codeElement = document.getElementById('JavascriptCode');

            // Verify if the element exists
            if (codeElement) {
                // Create a temporary textarea to copy the HTML code
                var textarea = document.createElement("textarea");
                textarea.value = codeElement.innerText;
                document.body.appendChild(textarea);

                // Select the content in the textarea
                textarea.select();
                textarea.setSelectionRange(0, textarea.value.length); // For mobile browsers

                // Copy the content to the clipboard
                document.execCommand("copy");

                // Delete the temporary textarea
                document.body.removeChild(textarea);

                // Display a confirmation message or perform other actions if successful

                // console.log("The Javascript code has been copied to the clipboard.");
            } else {
                // console.log("No element found with id 'JavascriptCode'");
            }
        }
    </script>
    @endpush



    <div id="code-html" class="hidden">
        <div id="HtmlCode">

            <div id="searchForm">
                <div class="disclaimer" id="disclaimer">
                    <h2 class="disclaimer-title">Disclaimer</h2>
                    <p class="disclaimer-text">
                        Sämtliche in den Suchergebnissen von refuelos.com angezeigte Freigaben stammen von externen Quellen und stehen unter dem Vorbehalt der Änderung durch die Urheber. <br>
                        refuelos.com übernimmt keine Garantie für die Richtigkeit der Angaben und haftet auch nicht für mögliche Schäden, die aus unrichtigen oder unvollständigen Angaben oder der Berücksichtigung einer Freigabe bei der Kraftstoffbetankung entstehen. <br>
                        Durch die Nutzung unseres Tools bestätigen Sie, dass Sie die <a href="https://dev.refuelos.com/legal-informations" target="_blank" rel="noopener noreferrer">Nutzungsbedingungen</a> gelesen und akzeptiert haben.
                    </p>
                    <button id="acceptButton">Ich akzeptiere die Nutzungsbedingungen</button>
                </div>
                <div class="form-container">
                    <form id="form">
                        <img src="{{ $customLogoUrl ? $customLogoUrl : asset($defaultLogoPath) }}" alt="Logo" class="xtl-logo" />
                        <div class="xtl-form-text">
                            <p>{{ $personalText }}</p>
                        </div>

                        <div class="xtl-form-group">
                            <label class="xtl-label" for="selectedManufacturer">Nach Hersteller suchen</label>
                            <select class="xtl-select" id="selectedManufacturer" disabled>
                                <option value="" selected>Wähle einen Hersteller</option>
                                <!-- Options -->
                            </select>
                            <span class="loader-div xtl-hide" id="loaderDiv"><span id="loader" class="loader" style="display:none;"></span></span>
                        </div>

                        <div class="xtl-form-group xtl-hide" id="hideSerie">
                            <label class="xtl-label" for="selectedSerie">Nach Baureihe suchen</label>
                            <select class="xtl-select" id="selectedSerie" disabled>
                                <option value="" selected>Baureihe eingeben</option>
                                <!-- Options  -->
                            </select>
                        </div>

                        <div class="xtl-form-group xtl-hide" id="hideVehicle">
                            <label class="xtl-label" for="selectedVehicle">Nach Fahrzeugmodell suchen</label>
                            <select class="xtl-select" id="selectedVehicle" disabled>
                                <option value="" selected>Bitte zuerst Baureihe auswählen</option>
                                <!-- Options  -->
                            </select>
                        </div>

                        <div class="xtl-form-group">
                            <button type="button" class="xtl-button" id="releasesButton" style="margin-top:10px;" disabled>Freigaben suchen</button>
                        </div>
                        <div class="xtl-form-group xtl-center">
                            <button type="button" id="resetButton" class="reset-button" disabled>Suche zurücksetzen</button>
                        </div>
                        <div id="errorMessage" class="xtl-error-message xtl-hide">
                        </div>
                    </form>
                    <script>
                        // Copy your Javascript code here
                    </script>
                    <style>
                        /*!-- Copy your CSS code here  */
                    </style>
                </div>
            </div>
            <div class="xtl-card-container" id="releaseContainer">
            </div>
        </div>
    </div>
    <div id="code-css" class="hidden">
        <div id="CssCode">
            #searchForm {
            margin: auto;
            max-width: 530px;
            padding: 20px;
            background-color: {{ $backgroundColor  }};
            border-radius: 8px;
            position: relative;
            box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.15), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            border: 1px solid rgb(0 0 0 / 0.1);
            text-align: left;
            }

            #searchForm,
            #searchForm p,
            #searchForm button,
            .xtl-card-container {
            font-family: arial;
            }

            #searchForm label,
            #releasesButton {
            font-weight: bold
            }

            .form-group {
            margin-bottom: 20px;
            }

            .xtl-label {
            color: {{ $fontColor }};
            display: block;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
            margin-top: 12px;
            }

            .xtl-select {
            -webkit-appearance: none;
            /* Safari and Chrome */
            -moz-appearance: none;
            /* Firefox */
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 20px;
            cursor: pointer;
            background-color: #fff;
            background-image: url('data:image/svg+xml;utf8,&lt;svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 4 5"&gt;&lt;path fill="none" stroke="currentColor" stroke-width="1" d="M0 0l2 2 2-2"/&gt;&lt;/svg&gt;');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 10px 10px;
            font-family: inherit;
            font-size: 14px;
            line-height: inherit;
            color: black;
            }

            .xtl-select::-ms-expand {
            display: none;
            }


            .xtl-button {
            width: 100%;
            padding: 10px 14px;
            background-color: {{ $buttonColor }};
            color: {{ $buttonFontColor }};
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
            max-height: 75px;
            }

            .xtl-hide {
            display: none !important;
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
            color: black;

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
            border-right: 1px solid #9ca3af;
            border-bottom: 1px solid #9ca3af;
            border-left: 1px solid #9ca3af;

            background-color: #fefae9;
            display: flex;
            border-radius: 0 0 10px 10px;

            }

            .xtl-warning-decoration {
            border-top: 4px solid #f4cb28;
            border-left: 4px solid #f4cb28;
            padding: 1rem;
            border-radius: 0 0 10px 10px;
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            padding-bottom: 20px;
            padding-top: 20px;

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
            background-color: rgba(221, 253, 231, 1);
            color: black;
            cursor: pointer;
            padding: 8px 20px;
            width: 100%;
            text-align: left;
            outline: none;
            transition: 0.4s;
            margin-top: 30px;
            border-top: 1px solid #9ca3af;
            border-right: 1px solid #9ca3af;
            border-left: 1px solid #9ca3af;
            border-bottom: 0px solid rgba(209, 234, 220, 1);
            font-size: 16px;
            border-radius: 10px 10px 0px 0px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            flex-direction: row;
            }

            .xtl-button-accordion:hover {
            background-color: rgba(187, 246, 208, 1);
            }



            .xtl-content {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            width: 100%;
            align-items: center;
            }

            .xtl-column {
            display: flex;
            flex-direction: column;
            margin-right: 5%;
            }

            .xtl-first-line {
            font-size: 16px;
            font-weight: 600;
            }

            .xtl-second-line {
            font-size: 16px;
            }

            .xtl-first-line,
            .xtl-second-line {
            display: block;
            margin: 0;
            padding: 0;
            }

            .xtl-badges {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            }

            .xtl-badge-container {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-bottom: 5px;
            }

            .xtl-badge,
            .b10-badge {
            margin-bottom: 2px;
            margin-right: 5px;
            }

            .xtl-b10-text {
            padding-left: 15px;

            }


            .xtl-details-indicator {
            position: absolute;
            right: 20px;
            display: flex;
            align-items: center;
            }


            .xtl-details-symbol {
            margin-left: 5px;
            }

            .xtl-button-accordion.active .xtl-details-text {
            content: "mehr Details";
            }

            .xtl-button-accordion .xtl-details-symbol svg {
            transition: all 0.4s ease;
            transform: rotateZ(90deg);
            }

            .xtl-button-accordion.active .xtl-details-symbol svg {
            transform: rotateZ(-90deg);
            }

            button.accordion {
            color: black;

            }


            .active {
            border-radius: 10px 10px 0px 0px;
            border-bottom: 1px solid rgba(209, 234, 220, 1);
            }


            .xtl-panel {

            background-color: white;
            display: none;
            overflow: hidden;
            border-left: 1px solid #9ca3af;
            border-right: 1px solid #9ca3af;
            border-bottom: 1px solid #9ca3af;
            border-radius: 0px;
            font-size: 14px;
            }

            .xtl-warning-text a {
            color: #ac7629;
            }

            .xtl-warning-text p {
            text-align: left;
            margin: 0;
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
            color: {{ $fontColor }};
            background-color: transparent;
            font-size: 14px;
            }

            .xtl-center {

            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            }

            .reset-button {
            display: inline-block;
            margin-left: auto;
            margin-right: auto;
            border-radius: 0.375rem;
            background-color: rgb(254 242 242);
            padding-left: 0.5rem;
            padding-right: 0.5rem;
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
            font-size: 0.875rem;
            font-weight: lighter;
            color: #DC2626;
            border: none;
            cursor: pointer;

            }

            .reset-button:hover {
            background-color: rgb(254 226 226);
            }


            .xtl-error-message {
            text-align: center;
            color: red;
            font-size: 14px;
            padding-top: 15px;
            }

            .disclaimer {
            position: absolute;
            right: -30px;
            left: -30px;
            background-color: rgba(55, 65, 81, 0.8);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            display: none;
            color: #fff;
            padding: 30px;
            }

            .disclaimer p {
            margin: 0;
            padding-bottom: 20px;
            text-align: center;
            }

            .disclaimer-title {
            font-size: 24px;
            text-align: center;
            color: #fff;

            }

            .disclaimer-text {
            text-align: justify;
            margin-bottom: 20px;
            }

            .disclaimer button {
            background-color: #4F46E5;
            ;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
            font-size: 16px;
            }

            .disclaimer button:hover {
            background-color: #6366F1;
            }

            .disclaimer a {
            color: #4F46E5;
            text-decoration: none;
            }

            .form-container {
            position: relative;
            }

            @media (max-width: 600px) {

            .xtl-button-accordion {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            padding-bottom: 20px;
            }

            .xtl-content {
            display: flex !important;
            flex-direction: column !important;
            justify-content: flex-start !important;
            width: 100% !important;
            align-items: flex-start !important;
            padding: 20px 0px 0px 20px !important;
            }

            .xtl-details-indicator {
            position: relative !important;

            }

            .xtl-first-line,
            .xtl-second-line {
            padding-bottom: 10px !important;
            }

            .xtl-b10-text {
            padding-left: 5px !important;

            }
            }


            .loader-div {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            }

            .loader {
            width: 30px;
            aspect-ratio: 1;
            border-radius: 50%;
            border: 8px solid {{ $buttonColor }};
            animation:
            l20-1 0.8s infinite linear alternate,
            l20-2 1.6s infinite linear;
            }

            @keyframes l20-1 {
            0% {
            clip-path: polygon(50% 50%, 0 0, 50% 0%, 50% 0%, 50% 0%, 50% 0%, 50% 0%)
            }

            12.5% {
            clip-path: polygon(50% 50%, 0 0, 50% 0%, 100% 0%, 100% 0%, 100% 0%, 100% 0%)
            }

            25% {
            clip-path: polygon(50% 50%, 0 0, 50% 0%, 100% 0%, 100% 100%, 100% 100%, 100% 100%)
            }

            50% {
            clip-path: polygon(50% 50%, 0 0, 50% 0%, 100% 0%, 100% 100%, 50% 100%, 0% 100%)
            }

            62.5% {
            clip-path: polygon(50% 50%, 100% 0, 100% 0%, 100% 0%, 100% 100%, 50% 100%, 0% 100%)
            }

            75% {
            clip-path: polygon(50% 50%, 100% 100%, 100% 100%, 100% 100%, 100% 100%, 50% 100%, 0% 100%)
            }

            100% {
            clip-path: polygon(50% 50%, 50% 100%, 50% 100%, 50% 100%, 50% 100%, 50% 100%, 0% 100%)
            }
            }

            @keyframes l20-2 {
            0% {
            transform: scaleY(1) rotate(0deg)
            }

            49.99% {
            transform: scaleY(1) rotate(135deg)
            }

            50% {
            transform: scaleY(-1) rotate(0deg)
            }

            100% {
            transform: scaleY(-1) rotate(-135deg)
            }
            }
        </div>
    </div>
    <div id="code-javascript" class="hidden">
        <div id="JavascriptCode">
            document.addEventListener('DOMContentLoaded', function () {
            var manufacturerCalled = false;
            var serieCalled = false;
            var vehicleCalled = false;
            var apiToken = '{{$apiToken}}';
            var userId = '{{$userId}}';
            var tenantId = '{{$tenantId}}';
            let releasesFetched = false;
            let vehiclesAndSeriesFetched = false;
            let hasBeenReset = false;

            const disclaimer = document.getElementById('disclaimer');
            const acceptButton = document.getElementById('acceptButton');

            const cookieAccepted = localStorage.getItem('cookie_accepted');

            function enableFormElements() {
            const formElements = document.querySelectorAll('#form select, #form button');
            formElements.forEach(element => {
            element.disabled = false;
            });
            }

            if (cookieAccepted) {
            enableFormElements();
            } else {
            disclaimer.style.display = 'block';
            }

            acceptButton.addEventListener('click', function () {
            disclaimer.style.display = 'none';

            localStorage.setItem('cookie_accepted', true);

            enableFormElements();
            });

            document.getElementById('resetButton').addEventListener('click', function () {
            resetSelects();
            });

            function resetSelects() {

            var selectedOptions = document.querySelectorAll('select option:checked');
            for (var i = 0; i < selectedOptions.length; i++) { selectedOptions[i].selected=false; } vehiclesAndSeriesFetched=false; hasBeenReset=true; document.getElementById('releaseContainer').innerHTML='' ; document.getElementById('hideSerie').classList.add('xtl-hide'); document.getElementById('hideVehicle').classList.add('xtl-hide'); } if (apiToken==0) { console.error("The user doesn't have any token"); } document.getElementById('selectedManufacturer').addEventListener('change', function () { if (releasesFetched) { fetchVehiclesAndSeries(); vehiclesAndSeriesFetched=false; } }); function showHiddenElements() { var hideVehicleElement=document.getElementById('hideVehicle'); if (hideVehicleElement.classList.contains('xtl-hide')) { hideVehicleElement.classList.remove('xtl-hide'); } var hideSerieElement=document.getElementById('hideSerie'); if (hideSerieElement.classList.contains('xtl-hide')) { hideSerieElement.classList.remove('xtl-hide'); } } function fetchVehiclesAndSeries() { var selectedManufacturerId=document.getElementById('selectedManufacturer').value; if (selectedManufacturerId) { fetchVehiclesAndSeries(selectedManufacturerId); } } document.getElementById('selectedManufacturer').addEventListener('click', function () { fetchManufacturers(); }); document.getElementById('releasesButton').addEventListener('click', function () { getReleases(); }); function fetchData(endpoint, queryParams, userId, tenantId) { var url=`{{ $appUrl }}/api/${endpoint}?${new URLSearchParams(queryParams)}&userId=${userId}&tenantId=${tenantId}`; var headers={ 'Authorization' : 'Bearer ' + apiToken, 'Content-Type' : 'application/json' }; return fetch(url, { method: 'GET' , headers: headers, }).then(response=> {
                if (!response.ok) {
                console.error('Network response error:', response);

                var errorMessage = '';
                if (response.status === 400) {
                errorMessage = "Nicht autorisiertes Authentifizierungstoken. Wenden Sie sich an mail@refuelos.com";
                } else if (response.status === 401) {
                errorMessage = "Nicht autorisiertes Authentifizierungstoken. Wenden Sie sich an mail@refuelos.com";
                } else if (response.status === 403) {
                errorMessage = 'Die Lizenz ist abgelaufen. Wenden Sie sich an mail@refuelos.com';
                } else {
                errorMessage = "There is an error occurring, please try again, or contact mail@refuelos.com.";
                }


                errorMessage += ' (' + response.statusText + ')';
                var errorMessageDiv = document.getElementById('errorMessage');
                errorMessageDiv.innerHTML = errorMessage;
                errorMessageDiv.classList.remove('xtl-hide');
                throw new Error(errorMessage);
                }

                const contentType = response.headers.get('content-type');
                if (!contentType || !contentType.includes('application/json')) {
                console.error('Invalid content type:', contentType);
                throw new TypeError('Expected JSON response');
                }

                return response.json();
                })
                .catch(error => {
                console.error('Error fetching data:', error);
                });
                }

                var apiCount = 0;
                function fetchManufacturers() {
                var selectedManufacturer = document.getElementById('selectedManufacturer').value;
                const cookieAccepted = localStorage.getItem('cookie_accepted');
                if (cookieAccepted) {
                if (manufacturerCalled == false) {
                apiCount++;


                var loader = document.getElementById('loader');
                var loaderDiv = document.getElementById('loaderDiv');
                loader.style.display = 'inline-block';
                loaderDiv.classList.remove('xtl-hide');

                fetchData('manufacturers', {
                selected: [selectedManufacturer]
                }, userId, tenantId)
                .then(data => {
                var manufacturerSelect = document.getElementById('selectedManufacturer');
                var selectedValue = manufacturerSelect.value;

                manufacturerSelect.innerHTML = '';

                var placeholderOption = document.createElement('option');
                placeholderOption.value = '';
                placeholderOption.text = 'Wähle einen Hersteller';

                placeholderOption.selected = true;
                manufacturerSelect.add(placeholderOption);

                data.forEach(manufacturer => {
                var option = document.createElement('option');
                option.value = manufacturer.id;
                option.text = manufacturer.name;
                manufacturerSelect.add(option);
                });

                manufacturerSelect.value = selectedValue;

                loader.style.display = 'none';
                loaderDiv.classList.add('xtl-hide');
                })
                .catch(error => {
                console.error('Error while searching', error);

                loader.style.display = 'none';
                loaderDiv.classList.add('xtl-hide');

                });
                manufacturerCalled = true;

                } else { }
                }
                }

                function fetchVehiclesAndSeries() {
                var selectedManufacturerId = document.getElementById('selectedManufacturer').value;
                const cookieAccepted = localStorage.getItem('cookie_accepted');

                if (cookieAccepted) {

                if (selectedManufacturerId) {
                apiCount++;


                fetchData('vehicles-and-series', {
                manufacturerId: selectedManufacturerId
                }, userId, tenantId)
                .then(data => {
                var vehicleSelect = document.getElementById('selectedVehicle');
                var serieSelect = document.getElementById('selectedSerie');

                var selectedVehicleValue = vehicleSelect.value;
                var selectedSerieValue = serieSelect.value;

                vehicleSelect.innerHTML = '';
                serieSelect.innerHTML = '';

                var placeholderSerieOption = document.createElement('option');
                placeholderSerieOption.value = '';
                placeholderSerieOption.text = 'Baureihe eingeben';

                placeholderSerieOption.selected = true;
                serieSelect.add(placeholderSerieOption);

                var placeholderVehicleOption = document.createElement('option');
                placeholderVehicleOption.value = '';
                placeholderVehicleOption.text = 'Bitte zuerst Baureihe auswählen';
                placeholderVehicleOption.disabled = true;


                placeholderVehicleOption.selected = true;
                vehicleSelect.add(placeholderVehicleOption);

                data.series.forEach(serie => {
                var option = document.createElement('option');
                option.value = serie.id;
                option.text = serie.name;
                serieSelect.add(option);
                });

                serieSelect.addEventListener('change', function () {
                var selectedSerieId = Number(serieSelect.value);
                if (selectedSerieId !== 0) {
                vehicleSelect.innerHTML = '';
                var placeholderOption = document.createElement('option');
                placeholderOption.value = '';
                placeholderOption.text = 'Fahrzeugmodell eingeben';
                placeholderOption.selected = true;
                vehicleSelect.add(placeholderOption);
                data.vehicles.forEach(vehicle => {
                if (Number(vehicle.series_id) === selectedSerieId) {
                var option = document.createElement('option');
                option.value = vehicle.id;
                option.text = vehicle.name;
                vehicleSelect.add(option);
                }

                });
                } else {
                vehicleSelect.innerHTML = '';
                var placeholderVehicleOption = document.createElement('option');
                placeholderVehicleOption.value = '';
                placeholderVehicleOption.text = 'Bitte zuerst Baureihe auswählen';
                placeholderVehicleOption.selected = true;
                vehicleSelect.add(placeholderVehicleOption);
                }
                });

                vehicleSelect.value = selectedVehicleValue;
                serieSelect.value = selectedSerieValue;
                if (!hasBeenReset) {
                vehiclesAndSeriesFetched = true;
                }
                })
                .catch(error => console.error('Error while searching', error));
                }
                }
                }

                function getReleases() {
                var selectedManufacturer = document.getElementById('selectedManufacturer').value;
                var selectedVehicle = document.getElementById('selectedVehicle').value;
                var selectedSerie = document.getElementById('selectedSerie').value;
                const cookieAccepted = localStorage.getItem('cookie_accepted');

                if (cookieAccepted) {

                apiCount++;

                fetchData('releases', {
                selectedManufacturer: selectedManufacturer,
                selectedVehicle: selectedVehicle,
                selectedSerie: selectedSerie
                }, userId, tenantId)
                .then(data => {
                updateTable(data);
                if (!vehiclesAndSeriesFetched) {
                fetchVehiclesAndSeries();
                showHiddenElements();
                hasBeenReset = false;
                }

                releasesFetched = true;
                })
                .catch(error => {
                console.error('Error while fetching releases', error);
                });
                }
                }




                function updateTable(releases) {
                const container = document.getElementById('releaseContainer');

                let content = '';

                let manufacturer;
                let vehicleSeries;
                let releaseVehicle;

                const cookieAccepted = localStorage.getItem('cookie_accepted');

                if (cookieAccepted) {
                releases.forEach((release, index) => {
                let leistung = '';
                let b10 = '';
                let xtl = '';
                let zustzinfo = '';
                let b10Badge = '';
                let xtlBadge = '';

                if (release.releaseVehicle.power_ps) {
                leistung += `${release.releaseVehicle.power_ps} PS`;
                }
                if (release.releaseVehicle.power_kw) {
                leistung += (leistung ? ' / ' : '') + `${release.releaseVehicle.power_kw} KW`;
                }
                if (release.releaseVehicle.displacement_ccm) {
                leistung += (leistung ? ' / ' : '') + `${release.releaseVehicle.displacement_ccm} ccm`;
                }

                if (release.has_b10_release == 1) {
                b10 = `&lt;span style="color:#15803d;" class="xtl-b10-text"&gt;${release.release_b10_from ? release.release_b10_from : ''}&lt;/span&gt; &lt;br&gt; &lt;span style="color:red;"&gt;${release.no_b10_release ? release.no_b10_release : ''}&lt;/span&gt;`;
                b10Badge = `&lt;span style="font-weight: 400;display:inline-flex;align-items:center;border-radius:0.375rem;padding:0.2rem 0.5rem;font-size:0.75rem;line-height:1rem;color:#15803d;background-color:rgba(187, 246, 208, 1);border:0px solid rgb(165, 227, 165);box-shadow:inset 0 0 0 1px rgb(110, 226, 110);"&gt;
                B10
                &lt;svg style="color:#22c55e; width: 1.5rem; height: 1.5rem;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"&gt;
                &lt;path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /&gt;
                &lt;/svg&gt;
                &lt;/span&gt;`
                } else {
                b10 = `&lt;span style="color:#DC2626;" class="xtl-b10-text"&gt;Keine Freigabe&lt;/span&gt;`;
                b10Badge = `&lt;span style="font-weight: 400;display:inline-flex;align-items:center;border-radius:0.375rem;padding:0.2rem 0.5rem;font-size:0.75rem;line-height:1rem;color:rgba(191, 97, 97, 1);background-color:rgba(254, 203, 202, 1);border:0px solid rgba(191, 97, 97, 1);box-shadow:inset 0 0 0 1px rgba(238, 175, 172, 1);"&gt;
                B10
                &lt;svg style="color:rgba(238, 69, 69, 1); width: 1.5rem; height: 1.5rem;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"&gt;
                &lt;path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /&gt;
                &lt;/svg&gt;
                &lt;/span&gt;`
                }

                if (release.has_xtl_release == 1) {
                xtl = `&lt;span style="color:#15803d; " class="xtl-b10-text"&gt; ${release.release_xtl_from ? release.release_xtl_from : ''} &lt;/span&gt; &lt;br&gt; &lt;span style="color:red;"&gt;${release.no_xtl_release ? release.no_xtl_release : ''}&lt;/span&gt;`;
                xtlBadge = `&lt;span style="font-weight: 400;display:inline-flex;align-items:center;border-radius:0.375rem;padding:0.2rem 0.5rem;font-size:0.75rem;line-height:1rem;color:#15803d;background-color:rgba(187, 246, 208, 1);border:0px solid rgb(165, 227, 165);box-shadow:inset 0 0 0 1px rgb(110, 226, 110);"&gt;
                XTL

                &lt;svg style="color:#22c55e; width: 1.5rem; height: 1.5rem; xmlns=" http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"&gt;
                &lt;path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /&gt;
                &lt;/svg&gt;

                &lt;/span&gt;`
                } else {
                xtl = `&lt;span style="color:#DC2626; " class="xtl-b10-text"&gt;Keine Freigabe&lt;/span&gt;`;
                xtlBadge = `&lt;span style="font-weight: 400;display:inline-flex;align-items:center;border-radius:0.375rem;padding:0.2rem 0.5rem;font-size:0.75rem;line-height:1rem;color:rgba(191, 97, 97, 1);background-color:rgba(254, 203, 202, 1);border:0px solid rgba(191, 97, 97, 1);box-shadow:inset 0 0 0 1px rgba(238, 175, 172, 1);"&gt;
                XTL
                &lt;svg style="color:rgba(238, 69, 69, 1); width: 1.5rem; height: 1.5rem;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"&gt;
                &lt;path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /&gt;
                &lt;/svg&gt;
                &lt;/span&gt;`;

                }

                if (release.release_additional_info) {
                zustzinfo = `
                &lt;span class="xtl-card-row"&gt;
                &lt;span class="xtl-card-label"&gt;Zusatzinfo Freigabe&lt;/span&gt;
                &lt;span class="xtl-card-value"&gt;
                ${release.release_additional_info}
                &lt;/span&gt;
                &lt;/span&gt;
                `;
                }

                content += `
                &lt;button class="xtl-button-accordion" data-index="${index}"&gt;
                &lt;div class="xtl-content"&gt;
                &lt;div class="xtl-column"&gt;
                &lt;div class="xtl-first-line"&gt;
                ${release.manufacturer.name ? release.manufacturer.name : ''} ${release.releaseVehicle.vehicle_series.vehicle_series_name ? release.releaseVehicle.vehicle_series.vehicle_series_name : ''}
                &lt;/div&gt;
                &lt;div class="xtl-second-line"&gt;
                ${release.releaseVehicle.vehicle_model_name ? release.releaseVehicle.vehicle_model_name : ''}
                &lt;/div&gt;
                &lt;/div&gt;
                &lt;div class="xtl-badges"&gt;
                &lt;div class="xtl-badge-container"&gt;
                &lt;div class="xtl-badge"&gt;
                ${xtlBadge ? xtlBadge : ''}
                &lt;/div&gt;
                ${xtl}
                &lt;/div&gt;
                &lt;div class="xtl-badge-container"&gt;
                &lt;div class="b10-badge"&gt;
                ${b10Badge ? b10Badge : ''}
                &lt;/div&gt;
                ${b10}
                &lt;/div&gt;
                &lt;/div&gt;

                &lt;/div&gt;
                &lt;div class="xtl-details-indicator"&gt;
                &lt;span class="xtl-details-text"&gt;mehr Details&lt;/span&gt; &lt;span class="xtl-details-symbol"&gt;&lt;svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"&gt;
                &lt;path d="M7.293 4.707 14.586 12l-7.293 7.293 1.414 1.414L17.414 12 8.707 3.293 7.293 4.707z" /&gt;
                &lt;/svg&gt;&lt;/span&gt;
                &lt;/div&gt;
                &lt;/button&gt;


                &lt;span class="xtl-panel" data-index="${index}"&gt;
                &lt;span class="xtl-card-row"&gt;
                &lt;span class="xtl-card-label"&gt;Hersteller&lt;/span&gt;
                &lt;span class="xtl-card-value" style="color:black;"&gt;
                &lt;b&gt;${release.manufacturer.name ? release.manufacturer.name : ''}&lt;/b&gt;
                &lt;/span&gt;
                &lt;/span&gt;

                &lt;span class="xtl-card-row"&gt;
                &lt;span class="xtl-card-label"&gt;Baureihe&lt;/span&gt;
                &lt;span class="xtl-card-value" style="color:black;"&gt;
                &lt;b&gt;${release.vehicleSeries.vehicle_series_name ? release.vehicleSeries.vehicle_series_name : ''}&lt;/b&gt;
                &lt;/span&gt;
                &lt;/span&gt;

                &lt;span class="xtl-card-row"&gt;
                &lt;span class="xtl-card-label"&gt;Modell&lt;/span&gt;
                &lt;span class="xtl-card-value" style="color:black;"&gt;
                &lt;b&gt;${release.releaseVehicle.vehicle_model_name ? release.releaseVehicle.vehicle_model_name : ''}&lt;/b&gt;
                &lt;/span&gt;
                &lt;/span&gt;

                &lt;span class="xtl-card-row"&gt;
                &lt;span class="xtl-card-label"&gt;Motor&lt;/span&gt;
                &lt;span class="xtl-card-value"&gt;
                ${release.releaseVehicle.engine_name ? release.releaseVehicle.engine_name : ''}
                &lt;/span&gt;
                &lt;/span&gt;

                &lt;span class="xtl-card-row"&gt;
                &lt;span class="xtl-card-label"&gt;Produktionsstart&lt;/span&gt;
                &lt;span class="xtl-card-value"&gt;
                ${release.releaseVehicle.vehicle_production_start ? release.releaseVehicle.vehicle_production_start : ''}
                &lt;/span&gt;
                &lt;/span&gt;

                &lt;span class="xtl-card-row"&gt;
                &lt;span class="xtl-card-label"&gt;Leistung&lt;/span&gt;
                &lt;span class="xtl-card-value"&gt;
                ${leistung ? leistung : ''}
                &lt;/span&gt;
                &lt;/span&gt;

                &lt;span class="xtl-card-row"&gt;
                &lt;span class="xtl-card-label"&gt;B10 Freigabe für Fahrzeuge&lt;/span&gt;
                &lt;span class="xtl-card-value"&gt;
                ${b10}
                &lt;/span&gt;
                &lt;/span&gt;

                &lt;span class="xtl-card-row"&gt;
                &lt;span class="xtl-card-label"&gt;XTL Freigabe für Fahrzeuge&lt;/span&gt;
                &lt;span class="xtl-card-value"&gt;
                ${xtl}
                &lt;/span&gt;
                &lt;/span&gt;

                ${zustzinfo}

                &lt;span class="xtl-card-row" style="border-bottom:0px;"&gt;
                &lt;span class="xtl-card-label"&gt;Quelle&lt;/span&gt;
                &lt;span class="xtl-card-value"&gt;
                &lt;b&gt;&lt;span style="color:black;"&gt;${release.source.description ? release.source.description : ''} &lt;a href="${release.source.link_official_release ? release.source.link_official_release : ''}"&gt;&lt;span class="text-decoration-line: underline"&gt; Link öffnen &lt;/span&gt;&lt;/a&gt;&lt;/span&gt;&lt;/b&gt; &lt;br&gt; &lt;span style="line-height:22px; font-size:13px;"&gt;(letzter Abruf : ${release.source.last_crawl ? release.source.last_crawl : ''})&lt;/span&gt;
                &lt;/span&gt;
                &lt;/span&gt;
                &lt;/span&gt;
                &lt;span class="xtl-warning-border"&gt;
                &lt;span class="xtl-warning-decoration"&gt;
                &lt;span class="xtl-warning-icon"&gt;
                &lt;svg class="xtl-svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"&gt;
                &lt;path fill-rule="evenodd" fill="orange" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" /&gt;
                &lt;/svg&gt;
                &lt;/span&gt;
                &lt;span class="xtl-warning-text"&gt;&lt;p&gt;
                Es handelt sich um eine Zusammenfassung der Herstellerfreigabe. Keine Gewährleistung für Aktualität der Daten. Prüfen Sie stets die offizielle Herstellerfreigabe oder wenden Sie sich an Ihren Fahrzeughersteller.
                &lt;a href="${release.source.link_official_release ? release.source.link_official_release : '#'}" class="xtl-link"&gt;Link Herstellerfreigabe &lt;/a&gt;&lt;/p&gt;
                &lt;/span&gt;
                &lt;/span&gt;
                &lt;/span&gt;
                `;
                });

                container.innerHTML = content;

                var accordions = document.querySelectorAll(".xtl-button-accordion");

                accordions.forEach(accordion => {
                accordion.addEventListener("click", function () {
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
                }

                });
        </div>
    </div>
</div>
