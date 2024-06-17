<div class="px-4 py-5 sm:p-6 ">
    @if($apiToken->canceled_at)
        <p class="mt-1 mb-4 max-w-5xl text-sm leading-6 text-red-600">Lizenz wurde gekündigt
            am {{ $apiToken->canceled_at}}</p>
    @endif

    <form wire:submit.prevent="submit">
        @csrf
        <div class="space-y-12 sm:space-y-16">
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Lizenz Informationen</h2>
                <p class="mt-1 max-w-5xl text-sm leading-6 text-gray-600">Bitte wählen Sie die
                    gewünschte Lizenz für die Nutzung der Anwendung aus. Nach der Freischaltung der
                    Lizenz wird für die die Unterseite generiert und Sie können (sofern Lizenz gewählt)
                    das Suchformular für die Einbindung in Ihre Website erstellen.</p>

                <div
                    class="mt-10 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">


                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                        <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Lizenz
                            Typ</label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">


                            <fieldset x-data="{ selectedLicense: 1 }">
                                <legend class="sr-only">License Options</legend>

                                <div class="space-y-4">
                                    <label
                                        class="border-indigo-600 ring-2 ring-indigo-600 relative block cursor-pointer rounded-lg border bg-white px-6 py-4 shadow-sm focus:outline-none sm:flex sm:justify-between">
                                        <input type="radio" wire:model.live="license" name="license"
                                               value="{{ $token_type->id}}" class="sr-only">
                                        <span class="flex items-center">
                                            <span class="font-bold text-gray-900">{{ $token_type->name}}

                                                <p class="font-medium text-gray-700">{{ $token_type->description}}</p>
                                                <p class="font-medium text-gray-700">{{ $token_type->marketing}}</p>
                                                <p class="font-medium text-gray-700">Eimalige Setup-Kosten:&nbsp{{ $token_type->setup_cost}}&nbsp€ &nbsp</p>
                                            </span>
                                        </span>
                                        <span class="mt-2 flex text-sm sm:ml-4 sm:mt-0 sm:text-right">
                                            <span class="font-medium text-gray-900">{{ $token_type->monthly_cost}} € &nbsp</span>
                                            <span class="ml-1 text-gray-500 sm:ml-0"> / Monat</span>

                                        </span>
                                    </label>
                                </div>
                            </fieldset>


                            <p class="mt-2 text-sm leading-6 text-gray-600">Hier finden Sie eine detaillierte  <a class="text-sm underline font-medium leading-6 text-blue-700" href="{{route('license-legal-informations')}}#leistungsbeschreibung">Leistungsbeschreibung</a> und eine Übersicht über die
                                <a class="text-sm underline font-medium leading-6 text-blue-700"  href="{{route('license-legal-informations')}}#abo-modelle">Abo-Modelle</a>.
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
                <h2 class="text-base font-semibold leading-7 text-gray-900">Rechnungsinformationen</h2>
                <p class="mt-1  text-sm leading-6 text-gray-600">Bitte geben Sie Ihre
                    Zahlungsinformationen ein. Sie erhalten im Anschluss eine Rechnung, die Sie im
                    Bereich Dokumente aufrufen können.</p>

                <div
                    class="mt-10 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">


                        <label for="company_name"
                               class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Name
                            / Firma
                        </label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <input type="text" name="payer_name" disabled wire:model="payer_name" id="payer_name"
                                   autocomplete="given-name"
                                   class="{{ $payer_name ? 'text-gray-500' : 'text-gray-900' }} block w-full rounded-md border-0 py-1.5  shadow-sm ring-1 ring-inset  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">

                        </div>
                        @error('payer_name')
                        <div class="text-sm text-red-500 mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                        <label for="city"
                               class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Anschrift</label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <textarea type="text" name="payer_address" disabled wire:model="payer_address"
                                      id="payer_address" autocomplete="address-level2"
                                      class="{{ $payer_address ? 'text-gray-500' : 'text-gray-900' }} block w-full rounded-md border-0 py-1.5  shadow-sm ring-1 ring-inset  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"></textarea>

                        </div>
                        @error('payer_address')
                        <div class="text-sm text-red-500 mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>

                <div>
                    <h2 class="pt-8 text-base font-semibold leading-7 text-gray-900">Bank und Zahlung</h2>
                    <p class="mt-1  text-sm leading-6 text-gray-600">Bitte geben Sie die Bank Informationen
                        zur Erteilung eines SEPA-Lastschrift Mandates ein.</p>

                    <div
                        class="mt-10 space-y-10 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">


                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <label for="postal-code"
                                   class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Bank

                            </label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <input type="text" name="payer_bank" disabled wire:model="payer_bank" id="payer_bank"
                                       class="{{ $payer_bank ? 'text-gray-500' : 'text-gray-900' }} block w-full rounded-md border-0 py-1.5  shadow-sm ring-1 ring-inset  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">

                            </div>
                            @error('payer_bank')
                            <div class="text-sm text-red-500 mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <label for="postal-code"
                                   class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">IBAN
                            </label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <input type="text" name="payer_iban" disabled wire:model="payer_iban" id="payer_iban"
                                       class="{{ $payer_iban ? 'text-gray-500' : 'text-gray-900' }} block w-full rounded-md border-0 py-1.5  shadow-sm ring-1 ring-inset  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">

                            </div>
                            @error('payer_iban')
                            <div class="text-sm text-red-500 mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <label for="postal-code"
                                   class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">BIC
                            </label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <input type="text" name="bic" disabled wire:model="payer_bic" id="payer_bic"
                                       class="{{ $payer_bic ? 'text-gray-500' : 'text-gray-900' }} block w-full rounded-md border-0 py-1.5  shadow-sm ring-1 ring-inset  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">

                            </div>
                            @error('payer_bic')
                            <div class="text-sm text-red-500 mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <label for="postal-code"
                                   class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">SEPA Mandat
                                Erteilung</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <x-toggle wire:model="toggleChecked" disabled checked>
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
                    <h2 class="pt-8 text-base font-semibold leading-7 text-gray-900">Zusammenfassung</h2>
                    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600">Nachfolgend eine Übersicht
                        über die Bestellpositionen der Lizenz</p>

                    <div
                        class="mt-10 space-y-10 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">


                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <label for="postal-code"
                                   class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Nutzungsbedingungen</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <x-toggle wire:model="toggleCheckedLegal" checked disabled>
                                    <x-slot:label>
                                        <p class="mt-1 pl-4  text-sm leading-6 text-gray-600">Ich habe die
                                            <a class="text-sm underline font-medium leading-6 text-blue-700"
                                               href="{{route('license-legal-informations')}}">Nutzungsbedingungen
                                            </a> zur Kenntnis genommen und akzeptiert.

                                    </x-slot:label>
                                </x-toggle>
                            </div>
                        </div>


                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <label for="postal-code"
                                   class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Disclaimer</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <x-toggle wire:model="toggleCheckedDisclaimer" checked disabled>
                                    <x-slot:label>
                                        <p class="mt-1 pl-4  text-sm leading-6 text-gray-600">
                                            Den in den vorstehend verlinkten Nutzungsbedingungen enthaltenem

                                            <a class="text-sm font-medium leading-6 text-blue-700"
                                               href="{{route('license-legal-informations')}}">Disclaimer
                                                (§)</a> habe ich ebenfalls zur Kenntnis
                                            genommen und akzeptiert.

                                    </x-slot:label>
                                </x-toggle>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <label for="cover-photo"
                                   class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Zusammenfassung
                            </label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">

                                <p class="sm:pt-1.5 text-sm font-medium text-gray-700">
                                    Sie haben die Lizenz Variante "<b>{{ $token_type->name}}"</b> bestellt, für die wir
                                    monatlich <b>{{ $token_type->monthly_cost}} € &nbsp</b>berechnen sowie eine
                                    einmalige
                                    Setup-Gebühr i.H.v. <b>{{ $token_type->setup_cost}}&nbsp €</b>. Der Gesamtbetrag
                                    wird per SEPA-Lastschrift eingezogen.
                                </p>

                            </div>
                        </div>

                    </div>
                </div>


            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">

                @if(!$apiToken->canceled_at)
                    <a wire:click="confirmLicenseCancellation"
                       class="inline-flex justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:cursor-pointer hover:pointer hover:bg-red-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                    >
                        Lizenz kündigen
                    </a>
                @else

                    <a
                        class="inline-flex justify-center rounded-md bg-red-300 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:cursor-pointer hover:pointer hover:bg-red-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                        onmouseover="this.style.cursor='pointer'" onmouseout="this.style.cursor='default'">
                        Lizenz wurde bereits gekündigt
                    </a>

                @endif

                @if ($showConfirmationModal)
                    <div class="fixed inset-0 z-10 overflow-y-auto">
                        <div class="flex items-center justify-center min-h-screen">
                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                            <!-- Modal-Overlay -->

                            <!-- Modal-Container -->
                            <div
                                class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-lg">
                                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                Lizenz kündigen
                                            </h3>
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-500">
                                                    Sind Sie sicher, dass Sie die Lizenz kündigen möchten? Diese Aktion
                                                    kann nicht rückgängig gemacht werden.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click="cancelLicense({{ $userId }})" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Ja, kündigen
                        </button>
                    </span>
                                    <span class="mt-3 ml-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="$set('showConfirmationModal', false)" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Nein, abbrechen
                        </button>
                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


            </div>
    </form>


</div>
