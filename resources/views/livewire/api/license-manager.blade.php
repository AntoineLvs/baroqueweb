<div class="py-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
            <div class="px-4 py-5 sm:px-6">
                <div class="flex justify-between items-center">
                    <h3 class="card-title">Lizenz Status:
                        @if($userStatus == 0)
                        <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Noch keine Lizenz aktiviert </span>

                        @elseif($userStatus != 0 && $userStatus != 100 && $userStatus != 99 )
                        <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Lizenz wartet auf Freischaltung</span>

                        @elseif($userStatus == 100)
                        <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Lizenz aktiv</span>
                        <span class="text-xs">
                            {{ $apiToken->created_at->format('d-m-Y') }} / {{ date('d-m-Y', strtotime($apiToken->expires_at)) }}
                        </span>

                        @elseif($userStatus == 99)
                        <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10"> Request rejected </span>
                        <span class="text-xs"> - Please contact support if you have any questions</span>

                        @endif
                    </h3>
                </div>

            </div>

            @if($userStatus == 0 || $userStatus == 99)

            <div class="px-4 py-5 sm:p-6 ">

                <form wire:submit.prevent="submit">
                    @csrf
                    <div class="space-y-12 sm:space-y-16">
                        <div>
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Lizenz Informationen</h2>
                            <p class="mt-1 max-w-5xl text-sm leading-6 text-gray-600">Bitte wählen Sie die
                                gewünschte Lizenz für die Nutzung der Anwendung aus. Nach der Freischaltung der
                                Lizenz wird für die die Unterseite generiert und Sie können (sofern Lizenz gewählt)
                                das Suchformular für die Einbindung in Ihre Website erstellen.</p>

                            <div class="mt-10 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">


                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Lizenz
                                        Typ</label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">


                                        <fieldset x-data="{ selectedLicense: 1 }">
                                            <legend class="sr-only">Lizenz Optionen</legend>

                                            <div class="space-y-4">
                                                @foreach($api_token_types as $api_token_type)
                                                <label wire:click="$set('selectedLicense', {{ $api_token_type->id}})" x-on:click="selectedLicense = {{ $api_token_type->id}}" :class="{ 'border-indigo-600 ring-2 ring-indigo-600': selectedLicense === {{ $api_token_type->id}}, 'border-gray-300': selectedLicense !== {{ $api_token_type->id}} }" class="relative block cursor-pointer rounded-lg border bg-white px-6 py-4 shadow-sm focus:outline-none sm:flex sm:justify-between">
                                                    <input type="radio" wire:model.live="selectedLicense" name="license" value="{{ $api_token_type->id}}" class="sr-only">
                                                    <span class="flex items-center">
                                                        <span class="font-bold text-gray-900">{{ $api_token_type->name}}

                                                            <p class="font-medium text-gray-700">{{ $api_token_type->description}}</p>
                                                            <p class="font-medium text-gray-700">{{ $api_token_type->marketing}}</p>
                                                            <p class="font-medium text-gray-700">Eimalige Setup-Kosten:&nbsp{{ $api_token_type->setup_cost}}&nbsp€ &nbsp</p>
                                                            <p class="font-medium text-gray-700">Laufzeit:&nbsp{{ $api_token_type->contract_duration}}&nbspTage</p>
                                                        </span>
                                                    </span>
                                                    <span class="mt-2 flex text-sm sm:ml-4 sm:mt-0 sm:text-right">
                                                        <span class="font-medium text-gray-900">{{ $api_token_type->monthly_cost}} € &nbsp</span>
                                                        <span class="ml-1 text-gray-500 sm:ml-0"> / Monat</span>

                                                    </span>


                                                    <span class="pointer-events-none absolute -inset-px rounded-lg border-2" :class="{ 'border-indigo-600': selectedLicense === {{ $api_token_type->id}}, 'border-transparent': selectedLicense !== {{ $api_token_type->id}} }" aria-hidden="true"></span>
                                                </label>

                                                @endforeach
                                            </div>
                                        </fieldset>

                                        <p class="mt-2 text-sm leading-6 text-gray-600">Hier finden Sie eine detaillierte <a class="text-sm underline font-medium leading-6 text-blue-700" href="{{route('license-legal-informations')}}#leistungsbeschreibung">Leistungsbeschreibung</a> und eine Übersicht über die
                                            <a class="text-sm underline font-medium leading-6 text-blue-700" href="{{route('license-legal-informations')}}#abo-modelle">Abo-Modelle</a>.
                                        </p>




                                        @error('selectedLicense')
                                        <div class="text-sm text-red-500 mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div>

                            <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                                <div class="ml-4 mt-2">
                                    <h2 class="text-base font-semibold leading-7 text-gray-900">Rechnungsinformationen</h2>
                                    <p class="mt-1  text-sm leading-6 text-gray-600">Bitte geben Sie Ihre
                                        Zahlungsinformationen ein. Sie erhalten im Anschluss eine Rechnung, die Sie im
                                        Bereich Dokumente aufrufen können.
                                    </p>
                                </div>
                                <div class="ml-4 mt-2 flex-shrink-0">
                                    <button type="button" wire:click="pasteData" class="inline-flex items-center px-4 py-2 border border-transparent
                                text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
                                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                        </svg> Aus Profil übernehmen
                                    </button>
                                </div>
                            </div>

                            <div class="mt-10 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="company_name" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Name
                                        / Firma
                                    </label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                                        <input type="text" wire:model="company_name" name="company_name" id="company_name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    </div>
                                    @error('company_name')
                                    <div class="text-sm text-red-500 mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Straße
                                    </label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                                        <input type="text" wire:model="street" name="street" id="street" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xl sm:text-sm sm:leading-6">
                                    </div>
                                    @error('street')
                                    <div class="text-sm text-red-500 mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Stadt</label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                                        <input type="text" wire:model="city" name="city" id="city" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    </div>
                                    @error('city')
                                    <div class="text-sm text-red-500 mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">PLZ /
                                        ZIP</label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                                        <input type="text" name="zipcode" wire:model="zipcode" id="zipcode" autocomplete="postal-code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    </div>
                                    @error('zipcode')
                                    <div class="text-sm text-red-500 mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="country" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Land</label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                                        <select id="country" wire:model="country" name="country" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            <option class="text-gray-500" selected>-- Bitte Land auswählen--</option>
                                            <option value="DE">Deutschland</option>
                                            <option value="AT">Österreich</option>
                                            <option value="CH">Schweiz</option>
                                        </select>
                                    </div>
                                    @error('country')
                                    <div class="text-sm text-red-500 mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                            </div>
                        </div>
                        <div>
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Bank und Zahlung</h2>
                            <p class="mt-1  text-sm leading-6 text-gray-600">Bitte geben Sie die Bank Informationen
                                zur Erteilung eines SEPA-Lastschrift Mandates ein.</p>

                            <div class="mt-10 space-y-10 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">


                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Bank Name</label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                                        <input type="text" name="bank_name" wire:model="bank_name" id="bank_name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    </div>
                                    @error('bank_name')
                                    <div class="text-sm text-red-500 mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">IBAN
                                    </label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                                        <input type="text" name="iban" wire:model="iban" id="iban" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    </div>
                                    @error('iban')
                                    <div class="text-sm text-red-500 mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">BIC
                                    </label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                                        <input type="text" wire:model="bic" name="bic" id="bic" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    </div>
                                    @error('bic')
                                    <div class="text-sm text-red-500 mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Erteilung
                                        SEPA Mandat </label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                                        <x-toggle wire:model="toggleCheckedSepa">
                                            <x-slot:label>
                                                <p class="mt-1 pl-4  text-sm leading-6 text-gray-600"> Ich
                                                    ermächtige die Elsen Media GmbH dazu, Zahlungen von
                                                    meinem/unserem Konto mittels Lastschrift einzuziehen.<br>
                                                    Gleichzeitig leite ich meine Bank dazu an, die von der Elsen
                                                    Media GmbH für mein Bankkonto eingereichten Abbuchungen per
                                                    SEPA-Lastschrift auszuführen bzw. einzulösen.</p>
                                            </x-slot:label>
                                        </x-toggle>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div>
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Zusammenfassung</h2>
                            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600">Nachfolgend eine Übersicht
                                über die Bestellpositionen der Lizenz</p>

                            <div class="mt-10 space-y-10 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">


                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Nutzungsbedingungen</label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                                        <x-toggle wire:model="toggleCheckedLegal">
                                            <x-slot:label>
                                                <p class="mt-1 pl-4  text-sm leading-6 text-gray-600">Ich habe die
                                                    <a class="text-sm underline font-medium leading-6 text-blue-700" href="{{route('license-legal-informations')}}">Nutzungsbedingungen</a> zur Kenntnis genommen und akzeptiert.
                                                </p>

                                            </x-slot:label>
                                        </x-toggle>
                                    </div>
                                </div>


                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Disclaimer</label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                                        <x-toggle wire:model="toggleCheckedDisclaimer">
                                            <x-slot:label>
                                                <p class="mt-1 pl-4  text-sm leading-6 text-gray-600">
                                                    Der in den vorstehend verlinkten Nutzungsbedingungen enthaltenen
                                                    <a class="text-sm font-medium leading-6 text-blue-700" href="{{route('license-legal-informations')}}#disclaimer">Disclaimer
                                                        (§)</a> habe ich ebenfalls zur Kenntnis
                                                    genommen und akzeptiert.

                                            </x-slot:label>
                                        </x-toggle>
                                    </div>
                                </div>

                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Zusammenfassung
                                    </label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                                        @if($selectedToken)
                                        <p class="sm:pt-1.5 text-sm font-medium text-gray-700">
                                            Sie bestellen die Lizenz Variante <b>"{{ $selectedToken->name}}"</b>,
                                            für die wir monatlich
                                            <b>{{ $selectedToken->monthly_cost}} €</b>&nbsp berechnen sowie eine
                                            einmalige Setup-Gebühr
                                            i.H.v. <b>{{ $selectedToken->setup_cost}}&nbsp €</b>. Der
                                            Gesamtbetrag
                                            wird per SEPA-Mandat eingezogen. Die Laufzeit beträgt {{ $selectedToken->contract_duration}}&nbspTage.
                                        </p>
                                        </p>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        @if( session('tenant_id') )
                        <button type="submit" class="inline-flex justify-center rounded-md
                        {{ session('tenant_id') ? 'bg-indigo-600 hover:bg-indigo-500' : 'bg-gray-200 cursor-not-allowed' }}
                        px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Lizenz kostenpflichtig beantragen
                        </button>
                        @else
                        <button type="submit" class="inline-flex justify-center rounded-md
                        {{ session('tenant_id') ? 'bg-indigo-600 hover:bg-indigo-500' : 'bg-gray-200 cursor-not-allowed' }}
                        px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                            data-toggle="tooltip" data-placement="top" title="You can not purchase a license as Admin">
                            Lizenz kostenpflichtig beantragen
                        </button>
                        @endif
                    </div>
                    <x-loading />
                </form>
            </div>

            @elseif($userStatus == 100)

            @livewire('api.license-manager-completed', ['user' => $this->user])

            @endif
        </div>
    </div>
</div>