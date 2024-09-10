@extends('layouts.app')

@section('body')

    <div class="bg-white">

        <x-navigation/>

        @if (session('message'))
            <div
                x-data="{ show: false, message: '' }"
                x-init="
        @if(session('message'))
            message = '{{ session('message') }}';
            show = true;
            setTimeout(() => show = false, 5000);
        @endif
    "
                x-show="show"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 scale-90"
                style="display: none; position: fixed; top: 1rem; right: 1rem; z-index: 50;"
                @click.away="show = false"
            >
                <div class="bg-blue-500 text-white p-4 rounded-lg shadow-lg">
                    <div class="flex justify-between items-center">
                        <div class="pr-4" x-text="message"></div>
                        <button @click="show = false" class="text-lg">&times;</button>
                    </div>
                </div>
            </div>
        @endif

        <main>

            <!-- Hero section -->
            <div class="relative isolate overflow-hidden bg-gray-900 pb-16 pt-5 sm:pb-10">
                <img
                    src="{{ asset('assets/img/xtl-freigaben-bg-2.jpg') }}"
                    alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">
                <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                     aria-hidden="true">
                    <div
                        class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
                </div>
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                        <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                            <div
                                class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-300 ring-1 ring-white/10 hover:ring-white/20">
                                Jetzt registrieren und HVO Tankpunkte einstellen! <a href="{{route('register')}}"
                                                                                     class="font-semibold text-white"><span
                                        class="absolute inset-0" aria-hidden="true"></span>Mehr dazu <span
                                        aria-hidden="true">&rarr;</span></a>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">refuelOS</h1>
                            <h2 class="mt-4 text-2xl leading-8 text-gray-50">Erneuerbare Kraftstoffe einfach
                                finden.</h2>
                            <div class="mt-6 flex items-center justify-center gap-x-6">
                                <a href="{{route('locations.find-locations-public')}}"
                                   class="rounded-md bg-indigo-500 px-5 py-4 text-lg font-semibold text-white shadow-sm hover:bg-indigo-400
                                   focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400">
                                    HVO Tankstellen finden</a>

                            </div>

                        </div>
                    </div>

                    <!-- Logo cloud -->

                    <div
                        class="mx-auto max-w-lg grid grid-cols-4 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-1">

                        <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1 mx-auto"
                             src="{{ asset('assets/img/eftd-partner.png') }}" alt="efuel-today">

                    </div>

                </div>
                <div
                    class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                    aria-hidden="true">
                    <div
                        class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
                </div>
            </div>

            <!-- Feature section -->
            <div class="mt-32 sm:mt-32">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl sm:text-center">
                        <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Jetzt einfach
                            XTL Tankpunkte finden!
                        </p>
                        <p class="mt-6 text-lg leading-8 text-gray-600">XTL-Freigaben beschreiben die offiziellen
                            Hersteller-Freigaben für die neuen erneuerbaren Diesel-Kraftstoffe unter der Norm DIN EN
                            15940. Ob auch dein Diesel bereits eine Freigabe für diesen neuen Diesel hat, kannst du über
                            unsere XTL Freigaben Suchmaschine herausfinden!


                        </p>

                        <div class="mt-6 flex items-center justify-center gap-x-6">
                            <a href="{{route('locations.find-locations-public')}}"
                               class="rounded-md bg-indigo-500 px-5 py-4 text-lg font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400">
                               Zur HVO Map</a>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-hidden pt-16">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                        <img src="{{ asset('assets/img/xtl-freigabensuche.jpg') }}"
                             alt="App screenshot" class="mb-[-12%] rounded-xl shadow-2xl ring-1 ring-gray-900/10"
                             width="2432" height="1442">
                        <div class="relative" aria-hidden="true">
                            <div class="absolute -inset-x-20 bottom-0 bg-gradient-to-t from-white pt-[7%]"></div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-16"></div>
        </main>


    </div>

@endsection

@section('footer')
    <x-footer/>
@endsection
