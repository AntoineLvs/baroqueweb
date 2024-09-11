<div>

    <x-loading />
    <form wire:submit.prevent="updateTenant" role="form">

        @if (auth()->user()->Tenant)

            @csrf
            @method('put')

            <div>

                <div>
                    @if ($tenant_photo_header)
                        <img
                            class="h-64 w-full border border-2 border-blue-100 rounded-xl object-cover object-center lg:h-80"
                            src="{{ $tenant_photo_header->temporaryUrl() }}" alt="">

                    @elseif (auth()->user()->Tenant->photo_header)
                        {{-- <img class="h-64 w-full object-cover object-center lg:h-80" src="{{ auth()->user()->Tenant->photoHeaderUrl(auth()->user()->Tenant) }}" alt="">--}}

                        <img
                            class="h-64 w-full border border-2 border-blue-100 rounded-xl object-cover object-center lg:h-80"
                            src="{{ route('image.show', ['tenant' => auth()->user()->Tenant->id, 'filename' => auth()->user()->Tenant->photo_header]) }}"
                            alt="Image">

                    @else
                        <img
                            class="h-64 w-full border border-2 border-blue-100 rounded-xl object-cover object-center lg:h-80"
                            src="{{ asset('assets/img/xtl-freigaben-bg.jpg') }}" alt="">

                    @endif

                </div>

                <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                        <div class="flex">

                            @if ($tenant_photo)
                                <img class="h-24 w-24 rounded-full ring-4 ring-blue sm:h-32 sm:w-32"
                                     src="{{ $tenant_photo->temporaryUrl() }}" alt="">

                            @elseif (auth()->user()->Tenant->photo)

                                <img class="h-24 w-24 rounded-full ring-4 ring-blue sm:h-32 sm:w-32"
                                     src="{{ route('image.show', ['tenant' => auth()->user()->Tenant->id, 'filename' => auth()->user()->Tenant->photo]) }}"
                                     alt="">

                            @else
                                <img class="h-24 w-24 rounded-full bg-gray-100 ring-4 ring-blue sm:h-32 sm:w-32"
                                     src="{{ asset('assets/img/xtl-logo-1000.png') }}" alt="">

                            @endif

                        </div>
                        <div
                            class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                            <div class="sm:hidden md:block mt-6 min-w-0 flex-1">
                                <h1 class="text-2xl font-bold text-gray-900 truncate">

                                    @if (auth()->user()->Tenant)
                                        {{ auth()->user()->Tenant->name }}
                                    @else
                                        Ihr Unternehmen
                                    @endif

                                </h1>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-8xl mx-auto pt-4 px-4 sm:px-6 lg:px-8">
                <h1 class="text-2xl font-bold text-gray-900">Unternehmensprofil</h1>
            </div>

            <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">

                <x-session-message/>

                <div>


                    <div class="py-4">

                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">


                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="card-title">Profil @if(auth()->user()->tenant_id != null)

                                        @if(auth()->user()->Tenant->hasCompleteProfile() == false)
                                            <span class="ml-2 rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset text-red-700 bg-red-50 ring-red-600/20">
                                            Noch nicht vollständig!</span>
                                        @else
                                            <span class="ml-2 rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                                            Vollständig!</span>
                                        @endif
                                    @else
                                        <span class="ml-2 rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                                        Vollständig!</span>

                                    @endif</h3>


                                <!-- We use less vertical padding on card headers on desktop than on body sections -->
                            </div>
                            <div class="px-4 py-5 sm:p-6">


                                <!-- <form wire:submit.prevent="updateTenant" role="form"> -->


                                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                                    <div>
                                        <div>

                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                                Bearbeiten Sie Ihre Unternehmensinformationen
                                            </p>
                                        </div>

                                        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">

                                            {{-- <div
                                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                        <label for="tenant_status"
                                                               class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                            Account Status
                                                        </label>

                                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                            <div class="mt-1 sm:mt-0 sm:col-span-2">

                                                                @if (auth()->user()->Tenant && auth()->user()->Tenant->status == "0")

                                                                    <span
                                                                        class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">
                                        Nicht bestätigt
                                      </span>
                                                                @elseif (auth()->user()->Tenant && auth()->user()->Tenant->status == "1")
                                                                    <span
                                                                        class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-red-800">
                                        verifiziert
                                      </span>

                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>--}}

                                            <div
                                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                <label for="tenant_status"
                                                       class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                    Lizenz Status
                                                </label>

                                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                    <div class="mt-1 sm:mt-0 sm:col-span-2">


                                                        @if (auth()->user()->Tenant->hasApiLicense(auth()->user()->Tenant) == 0)

                                                            <span
                                                                class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">
                                                        Keine Lizenz aktiv
                                                    </span>
                                                        @elseif (auth()->user()->Tenant->hasApiLicense(auth()->user()->Tenant) >= 0)
                                                            <span
                                                                class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                                                        Lizenz aktiv
                                                    </span>

                                                        @endif

                                                        <a href="{{route('api.license-manager')}}"
                                                           class="pl-4 underline text-sm font-regular text-gray-700 ">Lizenz
                                                            verwalten</a>

                                                    </div>
                                                </div>

                                            </div>


                                            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                                <div
                                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                    <label for="tenant_type"
                                                           class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                        Art des Unternehmens
                                                    </label>
                                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                            <select wire:model="tenant_type" name="tenant_type"
                                                                    id="tenant_type"
                                                                    class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                                                                    required>
                                                                @foreach ($tenant_types as $tenant_type)
                                                                    @if($tenant_type['id'] == old('document'))
                                                                        <option value="{{$tenant_type['id']}}"
                                                                                selected>{{$tenant_type['name']}}</option>
                                                                    @else
                                                                        <option
                                                                            value="{{$tenant_type['id']}}">{{$tenant_type['name']}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('tenant_type')
                                                        <div class="text-sm text-red-500 mt-2">{{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <div
                                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                <label for="tenant_name"
                                                       class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                    Name des Unternehmens
                                                </label>
                                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                        <input wire:model="tenant_name" id="tenant_name"
                                                               name="tenant_name" type="text"
                                                               class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                </div>
                                                @error('tenant_name')
                                                <div class="text-sm text-red-500 mt-2">{{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div
                                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                <label for="tenant_photo"
                                                       class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                    Logo (512x512 px)
                                                </label>
                                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                    <input
                                                        class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                                        type="file" wire:model="tenant_photo">
                                                    @error('tenant_photo') <span
                                                        class="error">{{ $message }}</span> @enderror
                                                </div>
                                                @error('tenant_photo')
                                                <div class="text-sm text-red-500 mt-2">{{ $message }}
                                                </div>
                                                @enderror

                                            </div>

                                            <div
                                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                <label for="tenant_photo_header"
                                                       class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                    Titel-Bild (2250x600 px)
                                                </label>
                                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                    <input
                                                        class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                                        type="file" wire:model="tenant_photo_header">
                                                    @error('tenant_photo_header') <span
                                                        class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div
                                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                <label for="tenant_name"
                                                       class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                    URL der Unterseite in Ihrer CI
                                                    <p class="mt-2 text-sm text-emerald-500">
                                                        Hinweis: Diese Seite wird durch unser Team erstellt.<br>Sie erhalten eine separate E-Mail nach der Freischaltung.
                                                    </p>
                                                </label>
                                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                    <div class="mt-1 sm:mt-0 sm:col-span-2 flex items-center">

                                                        {{--  <input wire:model="url_subsite" id="url_subsite"
                                                                 name="url_subsite" type="text"
                                                                 class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
--}}

                                                        <x-input
                                                            class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                                                            wire:model="url_subsite" id="url_subsite" name="url_subsite" disabled
                                                            prefix="https://refuelos.com/"/>




                                                        @if($tenant->url_subsite)
                                                            <a href="{{ $tenant->url_subsite }}" target="_blank"
                                                               class="ml-3 inline-flex justify-center py-1 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                Seite aufrufen
                                                            </a>
                                                        @endif

                                                        {{-- @if($tenant->status == 1)

                                                             <a href="{{ $url }}" target="_blank"
                                                                class="ml-3 inline-flex justify-center py-1 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                 Check Subsite
                                                             </a>

                                                             <button type="button"
                                                                     class="ml-3 inline-flex justify-center py-1 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                                                     wire:click="deletePage()">
                                                                 Delete URL
                                                             </button>
                                                         @else
                                                             <button type="button"
                                                                     class="ml-3 inline-flex justify-center py-1 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                                     wire:click="createPage()">
                                                                 Create URL
                                                             </button>
                                                         @endif--}}

                                                    </div>
                                                </div>
                                                @error('url_subsite')
                                                <div class="text-sm text-red-500 mt-2">{{ $message }}
                                                </div>
                                                @enderror
                                            </div>


                                        </div>
                                    </div>

                                    <div class="space-y-10 divide-y divide-gray-200 sm:space-y-5">
                                        <div>
                                            <div>
                                                <p class="mt-10 max-w-2xl text-sm text-gray-500">
                                                    Bearbeiten Sie die öffentlich sichtbaren Informationen über Ihr
                                                    Unternehmen
                                                </p>
                                            </div>
                                        </div>


                                        <div
                                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="tenant_email"
                                                   class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                E-Mail
                                            </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                    <input wire:model="tenant_email" id="tenant_email"
                                                           name="tenant_email" type="email"
                                                           class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                                                </div>
                                            </div>
                                            @error('tenant_email')
                                            <div class="text-sm text-red-500 mt-2">{{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div
                                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="tenant_phone"
                                                   class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                Telefon
                                            </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                    <input wire:model="tenant_phone" id="tenant_phone"
                                                           name="tenant_phone" type="text"
                                                           class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                                                </div>
                                                @error('tenant_phone')
                                                <div class="text-sm text-red-500 mt-2">{{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div
                                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="tenant_website"
                                                   class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                Website
                                            </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                    <input wire:model="tenant_website" id="tenant_website"
                                                           name="tenant_website" type="text"
                                                           class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                                                </div>
                                                @error('tenant_website')
                                                <div class="text-sm text-red-500 mt-2">{{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div
                                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="tenant_street"
                                                   class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                Adresse (Straße)
                                            </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                    <input wire:model="tenant_street" id="tenant_street"
                                                           name="tenant_street" type="text"
                                                           class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                                                </div>
                                                @error('tenant_street')
                                                <div class="text-sm text-red-500 mt-2">{{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div
                                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="tenant_zip"
                                                   class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                PLZ
                                            </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                    <input wire:model="tenant_zip" id="tenant_zip" name="tenant_zip"
                                                           type="text"
                                                           class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                                                </div>
                                                @error('tenant_zip')
                                                <div class="text-sm text-red-500 mt-2">{{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div
                                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="tenant_city"
                                                   class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                Stadt
                                            </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                    <input wire:model="tenant_city" id="tenant_city" name="tenant_city"
                                                           type="text"
                                                           class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                                                </div>
                                                @error('tenant_city')
                                                <div class="text-sm text-red-500 mt-2">{{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                            <div
                                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                <label for="tenant_country"
                                                       class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                    Land
                                                </label>
                                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                        <select wire:model="tenant_country" name="tenant_country"
                                                                id="tenant_country"
                                                                class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">

                                                            <option value="DE">Deutschland</option>
                                                            <option value="AT">Österreich</option>
                                                            <option value="CH">Schweiz</option>

                                                        </select>
                                                        @error('tenant_country')
                                                        <div class="text-sm text-red-500 mt-2">{{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div
                                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="tenant_description"
                                                   class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                Unternehmensbeschreibung
                                            </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                    <textarea wire:model="tenant_description" id="tenant_description"
                                                              name="tenant_description" type="text"
                                                              class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"></textarea>
                                                </div>
                                                @error('tenant_description')
                                                <div class="text-sm text-red-500 mt-2">{{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>


                                    <div class="pt-5">
                                        <div class="flex justify-end">
                                            <button type="button"
                                                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Abbrechen
                                            </button>
                                            <button type="submit"
                                                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Speichern
                                            </button>
                                        </div>
                                    </div>

                                    @if (session()->has('message'))

                                        <!-- This example requires Tailwind CSS v2.0+ -->
                                        <div class="pt-5" x-data="{ open: true }" x-show="open"
                                             x-init="setTimeout(() => open = false, 3000)">
                                            <div class="rounded-md bg-green-50 p-4">
                                                <div class="flex">
                                                    <div class="flex-shrink-0">
                                                        <!-- Heroicon name: solid/check-circle -->
                                                        <svg class="h-5 w-5 text-green-400"
                                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                             fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                  clip-rule="evenodd"/>
                                                        </svg>
                                                    </div>
                                                    <div class="ml-3">
                                                        <p class="text-sm font-medium text-green-800">
                                                            {{ session('message') }}
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    @endif


                                </div>
                            </div>
                        </div>

                    </div>


                </div>

            </div> <!-- CLOSING TAB  DIV -->


</div>

@endif

</form>
</div>
