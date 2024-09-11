@extends('layouts.app', ['page' => 'Dashboard', 'pageSlug' => 'dashboard', 'section' => 'main'])
@section('content')

    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
        <div class="py-10">
            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-2xl font-bold text-gray-900">Start und Einführung</h1>
                <x-session-message/>
            </div>

            <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
                <div class="py-4">
                    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="card-title">Willkommen zu den ersten Schritten bei refuelOS!</h3>
                        </div>
                        <div class="px-4 py-5 sm:p-6">
                            <!-- Content goes here -->
                            In nur <b>wenigen Schritten</b> können Sie Ihr Profil vollständig einrichten und Ihre ersten
                            Tankstellen und Produkte einrichten. Sie haben Fragen? <a class="text-indigo-700"
                                                                                   href="{{route('contact')}}">Schreiben
                                Sie uns!</a>
                        </div>
                    </div>
                </div>


            </div>


            <!-- Products start -->
            <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
                <div class="py-4">
                    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">

                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="card-title">Meine Aufgaben</h3>
                        </div>
                        <div class="px-4 py-5 sm:p-6">


                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <ul role="list" class="divide-y divide-gray-100">

                                            <li class="flex flex-col sm:flex-row items-start justify-between gap-x-6 py-5 xl:justify-between">
                                                <div class="min-w-0 flex-grow">
                                                    <div class="flex items-start gap-x-3">
                                                        <p class="text-m font-semibold leading-6 text-gray-900">1)
                                                            Benutzerkonto einrichten</p>
                                                        <p class="rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                                                            Abgeschlossen!</p>
                                                    </div>
                                                    <div
                                                        class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                                                        <p class="whitespace-nowrap">Richten Sie ein Konto ein und
                                                            bestätigen Sie Ihre E-Mail Adresse.</p>
                                                    </div>
                                                </div>
                                                <div class="mt-2 sm:mt-2 md:ml-auto flex items-center gap-x-4">
                                                    <a href="{{route('profile.index')}}"
                                                       class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Benutzer
                                                        bearbeiten<span class="sr-only">, Profil bearbeiten</span></a>
                                                </div>
                                            </li>


                                            <li class="flex flex-col sm:flex-row items-start justify-between gap-x-6 py-5 xl:justify-between">
                                                <div class="min-w-0 flex-grow">
                                                    <div class="flex items-start gap-x-3">
                                                        <p class="text-m font-semibold leading-6 text-gray-900">2)
                                                            Unternehmensprofil vervollständigen</p>
                                                        @if(auth()->user()->tenant_id != null)

                                                            @if(auth()->user()->Tenant->hasCompleteProfile() == false)
                                                                <p class="rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset text-red-700 bg-red-50 ring-red-600/20">
                                                                    Noch offen!</p>
                                                            @else
                                                                <p class="rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                                                                    Abgeschlossen!</p>
                                                            @endif
                                                        @else
                                                            <p class="rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                                                                Abgeschlossen!</p>

                                                        @endif
                                                    </div>
                                                    <div
                                                        class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                                                        <p class="whitespace-nowrap">Vervollständigen Sie die Angaben
                                                            Ihres Unternehmens, damit Ihre Angaben korrekt
                                                            angezeigt werden.</p>
                                                    </div>
                                                </div>
                                                <div class="mt-2 sm:mt-2 md:ml-auto flex items-center gap-x-4">
                                                    <a href="{{route('tenant.index')}}"
                                                       class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Unternehmen
                                                        bearbeiten</a>
                                                </div>
                                            </li>

                                            <li class="flex flex-col sm:flex-row items-start justify-between gap-x-6 py-5 xl:justify-between">
                                                <div class="min-w-0 flex-grow">
                                                    <div class="flex items-start gap-x-3">
                                                        <p class="text-m font-semibold leading-6 text-gray-900">3)
                                                            Lizenz auswählen</p>


                                                        @if(auth()->user()->tenant_id != null)

                                                            @if (auth()->user()->Tenant->hasApiLicense(auth()->user()->Tenant) == 0)
                                                                <p class="rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset text-red-700 bg-red-50 ring-red-600/20">
                                                                    Noch keine Lizenz aktiv / freigeschaltet!</p>

                                                            @elseif (auth()->user()->Tenant->hasApiLicense(auth()->user()->Tenant) >= 0)
                                                                <p class="rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                                                                    Lizenz aktiviert!</p>
                                                            @endif
                                                        @else
                                                            <p class="rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                                                                Lizenz aktiviert!</p>
                                                        @endif


                                                    </div>
                                                    <div
                                                        class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                                                        <p class="whitespace-nowrap">Wählen Sie Ihre Lizenz aus und
                                                            richten Sie ein SEPA-Mandat für die mtl. Zahlung ein (nur bei kostenpflichtiger Lizenz).</p>
                                                    </div>
                                                </div>
                                                <div class="mt-2 sm:mt-2 md:ml-auto flex items-center gap-x-4">
                                                    <a href="{{route('api.license-manager')}}"
                                                       class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Lizenz
                                                        Manager
                                                    </a>
                                                </div>
                                            </li>

                                            <li class="flex flex-col sm:flex-row items-start justify-between gap-x-6 py-5 xl:justify-between">
                                                <div class="min-w-0 flex-grow">
                                                    <div class="flex items-start gap-x-3">
                                                        <p class="text-m font-semibold leading-6 text-gray-900">4)
                                                            Freigabe Suchmaske in eigener CI gestalten</p>

                                                        @if (auth()->user()->ci_last_edit)
                                                            <p class="rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                                                                Erledigt!</p>
                                                        @else
                                                            <p class="rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset text-red-700 bg-red-50 ring-red-600/20">
                                                                Noch offen!</p>
                                                        @endif
                                                    </div>
                                                    <div
                                                        class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                                                        <p class="whitespace-nowrap">Bringen Sie etwas Farbe in Ihre
                                                            individuelle Freigaben-Suche!</p>
                                                    </div>
                                                </div>
                                                <div class="mt-2 sm:mt-2 md:ml-auto flex items-center gap-x-4">
                                                    <a href="{{route('api.manager')}}"
                                                       class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Formular
                                                        Manager
                                                    </a>
                                                </div>
                                            </li>


                                            <li class="flex flex-col sm:flex-row items-start justify-between gap-x-6 py-5 xl:justify-between">
                                                <div class="min-w-0 flex-grow">
                                                    <div class="flex items-start gap-x-3">
                                                        <p class="text-m font-semibold leading-6 text-gray-900">5)
                                                            Integrieren Sie die Suchmaske in Ihre Website und
                                                            Kanäle!</p>
                                                        <p class="rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset text-indigo-700 bg-indigo-50 ring-indigo-600/20">
                                                            Hier ist immer was zu tun! :-)</p>
                                                    </div>
                                                    <div
                                                        class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                                                        <p class="whitespace-nowrap">Je nach gewählter Lizenz können Sie
                                                            nun die Freigaben-Suche direkt mit HTML-Code in Ihre Website
                                                            integrieren oder einfach die Unterseite verlinken.</p>
                                                    </div>
                                                </div>
                                                <div class="mt-2 sm:mt-2 md:ml-auto flex items-center gap-x-4">
                                                    <a href="{{route('contact')}}"
                                                       class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Unterstützung
                                                        anfordern!</a>
                                                </div>
                                            </li>


                                        </ul>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- Products end -->


        </div>
    </main>
@endsection
