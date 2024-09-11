@extends('layouts.app')

@section('body')
    <div class="bg-white">
        <x-navigation/>

        <main>
            <!-- Hero section -->
            <div class="relative isolate overflow-hidden bg-gray-900 h-screen">
                <img
                    src="{{ asset('assets/img/Sprint-Tankstelle-XTL.jpg') }}"
                    alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">
                <!-- Dunkles Overlay mit Verlauf -->
                <div class="absolute inset-0 -z-10 bg-gradient-to-r from-purple-900 to-teal-900 opacity-50"
                     style="opacity: var(--overlay-opacity, 0.5);"></div>
                <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                     aria-hidden="true">
                    <div
                        class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
                </div>
                <div class="mx-auto max-w-7xl px-6 lg:px-8 h-full flex items-center justify-center">
                    <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:py-28 text-center">
                        <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                        </div>
                        <div class="text-center">
                            <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Individueller XTL
                                Freigabe Check für Ihr Unternehmen</h1>
                            <h3 class="mt-4 text-xl leading-8 text-gray-50">Melden Sie sich jetzt an und gestalten Sie
                                Ihren individuellen Freigabe Check in wenigen Minuten!</h3>
                            <div class="mt-6 flex items-center justify-center gap-x-6">
                                <a href="{{route('register')}}"
                                   class="rounded-md bg-violet-500 px-5 py-4 text-lg font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400">
                                    Jetzt registrieren</a>
                            </div>
                            <div class="mt-2">
                                <a href="#start"
                                   class="text-sm font-semibold leading-6 text-white">Das sind die Features!<span
                                        aria-hidden="true">→</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                :root {
                    --overlay-opacity: 0.5; /* Justiere die Deckkraft nach Bedarf */
                }
            </style>

            <div class="bg-white py-24 sm:py-24">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-4xl lg:mx-0">
                        <h2 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Vermeiden Sie ein "E10
                            Debakel"</br> und nutzen Sie den XTL Freigabe Check direkt an Ihrem POS!</h2>
                        <p class="mt-6 text-lg leading-8 text-gray-600">Die Vergangenheit hat gezeigt:
                            Kraftstoff-Innovationen funktionieren nicht immer. Das E10-Debakel lehrt uns: Eine saubere
                            und gezielte Aufklärung der Endverbraucher ist essentiell für den Markthochlauf. Damit es
                            nicht erneut zum Debakel kommt, haben wir den XTL Freigabe Check für HVO Kraftstoffe
                            entwickelt.</p>
                    </div>
                </div>
            </div>


            <div class="isolate overflow-hidden bg-white px-6 lg:px-8">
                <div class="relative mx-auto max-w-4xl py-12 sm:py-24 lg:max-w-4xl">
                    <div
                        class="absolute left-1/2 top-0 -z-10 h-[50rem] w-[90rem] -translate-x-1/2 bg-[radial-gradient(50%_100%_at_top,theme(colors.indigo.100),white)] opacity-20 lg:left-36"></div>
                    <div
                        class="absolute inset-y-0 right-1/2 -z-10 mr-12 w-[150vw] origin-bottom-left skew-x-[-30deg] bg-white shadow-xl shadow-indigo-600/10 ring-1 ring-indigo-50 sm:mr-20 md:mr-0 lg:right-full lg:-mr-36 lg:origin-center"></div>
                    <figure class="grid grid-cols-1 items-center gap-x-6 gap-y-8 lg:gap-x-10">
                        <div class="relative col-span-2 lg:col-start-1 lg:row-start-2">
                            <svg viewBox="0 0 162 128" fill="none" aria-hidden="true"
                                 class="absolute -top-12 left-0 -z-10 h-32 stroke-gray-900/10">
                                <path id="b56e9dab-6ccb-4d32-ad02-6b4bb5d9bbeb"
                                      d="M65.5697 118.507L65.8918 118.89C68.9503 116.314 71.367 113.253 73.1386 109.71C74.9162 106.155 75.8027 102.28 75.8027 98.0919C75.8027 94.237 75.16 90.6155 73.8708 87.2314C72.5851 83.8565 70.8137 80.9533 68.553 78.5292C66.4529 76.1079 63.9476 74.2482 61.0407 72.9536C58.2795 71.4949 55.276 70.767 52.0386 70.767C48.9935 70.767 46.4686 71.1668 44.4872 71.9924L44.4799 71.9955L44.4726 71.9988C42.7101 72.7999 41.1035 73.6831 39.6544 74.6492C38.2407 75.5916 36.8279 76.455 35.4159 77.2394L35.4047 77.2457L35.3938 77.2525C34.2318 77.9787 32.6713 78.3634 30.6736 78.3634C29.0405 78.3634 27.5131 77.2868 26.1274 74.8257C24.7483 72.2185 24.0519 69.2166 24.0519 65.8071C24.0519 60.0311 25.3782 54.4081 28.0373 48.9335C30.703 43.4454 34.3114 38.345 38.8667 33.6325C43.5812 28.761 49.0045 24.5159 55.1389 20.8979C60.1667 18.0071 65.4966 15.6179 71.1291 13.7305C73.8626 12.8145 75.8027 10.2968 75.8027 7.38572C75.8027 3.6497 72.6341 0.62247 68.8814 1.1527C61.1635 2.2432 53.7398 4.41426 46.6119 7.66522C37.5369 11.6459 29.5729 17.0612 22.7236 23.9105C16.0322 30.6019 10.618 38.4859 6.47981 47.558L6.47976 47.558L6.47682 47.5647C2.4901 56.6544 0.5 66.6148 0.5 77.4391C0.5 84.2996 1.61702 90.7679 3.85425 96.8404L3.8558 96.8445C6.08991 102.749 9.12394 108.02 12.959 112.654L12.959 112.654L12.9646 112.661C16.8027 117.138 21.2829 120.739 26.4034 123.459L26.4033 123.459L26.4144 123.465C31.5505 126.033 37.0873 127.316 43.0178 127.316C47.5035 127.316 51.6783 126.595 55.5376 125.148L55.5376 125.148L55.5477 125.144C59.5516 123.542 63.0052 121.456 65.9019 118.881L65.5697 118.507Z"/>
                                <use href="#b56e9dab-6ccb-4d32-ad02-6b4bb5d9bbeb" x="86"/>
                            </svg>
                            <h3 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">"Verträgt mein
                                Diesel eigentlich HVO?"
                            </h3>

                            <blockquote
                                class="text-xl pt-4 font-semibold leading-8 text-gray-900 sm:text-2xl sm:leading-9">
                                <p> - Jeder Autofahrer, 2024
                                </p>
                            </blockquote>
                        </div>

                        <div class="col-end-1 w-52 sm:w-96 lg:row-span-3 lg:w-96">
                            <img class="rounded-xl bg-indigo-50 lg:rounded-3xl"
                                 src="{{ asset('assets/img/mein-diesel-hvo.png')}}" alt="">
                        </div>
                    </figure>
                </div>
            </div>


            <div class="isolate overflow-hidden bg-white px-6 lg:px-8">
                <div class="relative mx-auto max-w-4xl py-24 sm:py-32 lg:max-w-4xl">
                    <div
                        class="absolute left-1/2 top-0 -z-10 h-[50rem] w-[90rem] -translate-x-1/2 bg-[radial-gradient(50%_100%_at_top,theme(colors.indigo.100),white)] opacity-20 lg:left-36"></div>
                    <div
                        class="absolute inset-y-0 right-1/2 -z-10 mr-12 w-[150vw] origin-bottom-left skew-x-[-30deg] bg-white shadow-xl shadow-indigo-600/10 ring-1 ring-indigo-50 sm:mr-20 md:mr-0 lg:right-full lg:-mr-36 lg:origin-center"></div>
                    <figure class="grid grid-cols-1 items-center gap-x-6 gap-y-8 lg:gap-x-10">
                        <div class="relative col-span-2 lg:col-start-1 lg:row-start-2">
                            <svg viewBox="0 0 162 128" fill="none" aria-hidden="true"
                                 class="absolute -top-12 left-0 -z-10 h-32 stroke-gray-900/10">
                                <path id="b56e9dab-6ccb-4d32-ad02-6b4bb5d9bbeb"
                                      d="M65.5697 118.507L65.8918 118.89C68.9503 116.314 71.367 113.253 73.1386 109.71C74.9162 106.155 75.8027 102.28 75.8027 98.0919C75.8027 94.237 75.16 90.6155 73.8708 87.2314C72.5851 83.8565 70.8137 80.9533 68.553 78.5292C66.4529 76.1079 63.9476 74.2482 61.0407 72.9536C58.2795 71.4949 55.276 70.767 52.0386 70.767C48.9935 70.767 46.4686 71.1668 44.4872 71.9924L44.4799 71.9955L44.4726 71.9988C42.7101 72.7999 41.1035 73.6831 39.6544 74.6492C38.2407 75.5916 36.8279 76.455 35.4159 77.2394L35.4047 77.2457L35.3938 77.2525C34.2318 77.9787 32.6713 78.3634 30.6736 78.3634C29.0405 78.3634 27.5131 77.2868 26.1274 74.8257C24.7483 72.2185 24.0519 69.2166 24.0519 65.8071C24.0519 60.0311 25.3782 54.4081 28.0373 48.9335C30.703 43.4454 34.3114 38.345 38.8667 33.6325C43.5812 28.761 49.0045 24.5159 55.1389 20.8979C60.1667 18.0071 65.4966 15.6179 71.1291 13.7305C73.8626 12.8145 75.8027 10.2968 75.8027 7.38572C75.8027 3.6497 72.6341 0.62247 68.8814 1.1527C61.1635 2.2432 53.7398 4.41426 46.6119 7.66522C37.5369 11.6459 29.5729 17.0612 22.7236 23.9105C16.0322 30.6019 10.618 38.4859 6.47981 47.558L6.47976 47.558L6.47682 47.5647C2.4901 56.6544 0.5 66.6148 0.5 77.4391C0.5 84.2996 1.61702 90.7679 3.85425 96.8404L3.8558 96.8445C6.08991 102.749 9.12394 108.02 12.959 112.654L12.959 112.654L12.9646 112.661C16.8027 117.138 21.2829 120.739 26.4034 123.459L26.4033 123.459L26.4144 123.465C31.5505 126.033 37.0873 127.316 43.0178 127.316C47.5035 127.316 51.6783 126.595 55.5376 125.148L55.5376 125.148L55.5477 125.144C59.5516 123.542 63.0052 121.456 65.9019 118.881L65.5697 118.507Z"/>
                                <use href="#b56e9dab-6ccb-4d32-ad02-6b4bb5d9bbeb" x="86"/>
                            </svg>
                            <h3 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">"Check doch einfach
                                deine XTL Freigabe!"</h3>

                            <blockquote
                                class="text-xl pt-4 font-semibold leading-8 text-gray-900 sm:text-2xl sm:leading-9">
                                <p>... Einfach den QR Code auf Zapfsäule scannen und im <b>leicht verständlichen XTL
                                        Freigabe Check</b> prüfen, ob das Fahrzeug bereits eine XTL Freigabe für HVO
                                    erhalten hat.
                                </p>
                            </blockquote>
                        </div>

                        <div class="col-end-1 w-52 sm:w-96 lg:row-span-3 lg:w-96">
                            <img class="rounded-xl bg-indigo-50 lg:rounded-3xl"
                                 src="{{ asset('assets/img/xtl-qr-beispiel.jpeg')}}" alt="">
                        </div>
                    </figure>
                </div>
            </div>


            <!-- component -->
            <section class="bg-white dark:bg-gray-900 pb-6">
                <div class="container px-6 py-10 mx-auto">
                    <div class="lg:flex lg:items-center">
                        <div class="w-full space-y-12 lg:w-1/2 ">
                            <div>
                                <h2 class="text-5xl font-bold tracking-tight text-gray-900 sm:text-6xl">So einfach kann
                                    Kundenerlebnis am POS sein!</h2>

                                <div class="mt-2">
                                    <span class="inline-block w-40 h-1 rounded-full bg-violet-700"></span>
                                    <span class="inline-block w-9 h-1 ml-1 rounded-full bg-violet-700"></span>
                                    <span class="inline-block w-5 h-1 ml-1 rounded-full bg-violet-700"></span>
                                    <span class="inline-block w-2 h-1 ml-1 rounded-full bg-violet-700"></span>
                                </div>
                            </div>


                            <div class="md:flex md:items-start md:-mx-4">
                        <span
                            class="inline-block p-2 text-violet-500 bg-violet-100 rounded-xl md:mx-4 dark:text-white dark:bg-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
</svg>
                            </span>
                                <div class="mt-4 md:mx-4 md:mt-0">
                                    <h1 class="text-2xl font-semibold text-gray-700  dark:text-white">Aufklären und
                                        informieren!</h1>
                                    <p class="mt-3 text-gray-500 dark:text-gray-300">
                                        Damit HVO100 an den Zapfsäulen auch durch den Kunden angenommen wird, ist das
                                        Schaffen von Vertrauen in das neue Produkt essentiell. Qualität, Nachhaltigkeit
                                        und vor allem auch die Kompatibilität mit dem
                                        eigenen Fahrzeug stehen im Fokus der Verbraucher - und des Freigabe-Checks.
                                    </p>
                                </div>
                            </div>

                            <div class="md:flex md:items-start md:-mx-4">

                        <span
                            class="inline-block p-2 text-violet-500 bg-violet-100 rounded-xl md:mx-4 dark:text-white dark:bg-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
</svg>
                            </span>
                                </span>
                                <div class="mt-4 md:mx-4 md:mt-0">
                                    <h1 class="text-2xl font-semibold text-gray-700  dark:text-white">Freigabe-Check
                                        mittels QR Code!</h1>
                                    <p class="mt-3 text-gray-500 dark:text-gray-300">
                                        Für Ihre Kunden bietet der Online-Freigabe Check die einfache Möglichkeit,
                                        mittels QR Code und Smartphone zu prüfen, ob ein Fahrzeug durch den Hersteller
                                        bereits für XTL freigegeben ist.
                                    </p>
                                </div>
                            </div>


                            <div class="md:flex md:items-start md:-mx-4">

                        <span
                            class="inline-block p-2 text-violet-500 bg-violet-100 rounded-xl md:mx-4 dark:text-white dark:bg-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
</svg>
                            </span>

                                <div class="mt-4 md:mx-4 md:mt-0">
                                    <h1 class="text-2xl font-semibold text-gray-700  dark:text-white">Markenbindung
                                        schaffen!</h1>
                                    <p class="mt-3 text-gray-500 dark:text-gray-300">
                                        Lassen Sie den Kunden auf der Suche nach Informationen nicht alleine! Bieten Sie
                                        Ihm einen Rund-um-Service als Tankstelle. Und bleiben Sie als Marke im Kopf -
                                        und auf dem Smartphone!
                                    </p>
                                </div>
                            </div>


                            <div class="md:flex md:items-start md:-mx-4">

                        <span
                            class="inline-block p-2 text-violet-500 bg-violet-100 rounded-xl md:mx-4 dark:text-white dark:bg-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
</svg>
                            </span>

                                <div class="mt-4 md:mx-4 md:mt-0">
                                    <h1 class="text-2xl font-semibold text-gray-700 dark:text-white">Produktumsatz
                                        steigern!</h1>

                                    <p class="mt-3 text-gray-500 dark:text-gray-300">
                                        Was der Kunde nicht versteht, tankt er nicht. Eine erteilte Hersteller-Freigabe
                                        ist der einfachste Weg, um den eigenen Produktumsatz nachhaltig zu steigern!
                                    </p>
                                </div>
                            </div>


                            <div class="md:flex md:items-start md:-mx-4">

                        <span
                            class="inline-block p-2 text-violet-500 bg-violet-100 rounded-xl md:mx-4 dark:text-white dark:bg-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
</svg>
                            </span>

                                <div class="mt-4 md:mx-4 md:mt-0">
                                    <h1 class="text-2xl font-semibold text-gray-700 dark:text-white">Kein Aufwand mit
                                        eigenen Freigaben!</h1>

                                    <p class="mt-3 text-gray-500 dark:text-gray-300">
                                        Sparen Sie sich die mühsame Bereitstellung von eigens recherchierten Freigaben
                                        im Ringbuchordner oder auf Ihrer Website und nutzen Sie unseren regelmäßig
                                        aktualisierten XTL Freigabe-Check.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="hidden lg:flex lg:items-center lg:w-1/2 lg:justify-center">
                            <img class="w-[28rem] h-[28rem] object-cover xl:w-[34rem] xl:h-[34rem] rounded-full"
                                 src="{{ asset('assets/img/sprint-qr-poster.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </section>


            <div id="start" class="mt-12 bg-violet-700">
                <div class="px-6 py-24 sm:px-6 sm:py-32 lg:px-8">
                    <div class="mx-auto max-w-2xl text-center">

                        <h3 class="text-3xl font-bold tracking-tight text-white sm:text-5xl">Features für Ihr
                            Unternehmen.</h3>
                        <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-indigo-200">Hier kommt keine CI zu
                            kurz. </p>

                    </div>
                </div>
            </div>


            <div class="mx-auto max-w-7xl pb-0 pt-5 sm:pb-6 lg:grid lg:grid-cols-2 lg:gap-x-8 lg:px-8 lg:py-20">
                <div class="px-6 lg:px-0 lg:pt-4">
                    <div class="mx-auto max-w-2xl">
                        <div class="max-w-lg">
                            <h1 class="mt-10 text-5xl font-bold tracking-tight text-gray-900 sm:text-6xl">Unser Check.
                                <br>In Ihrem Design.</h1>
                            <p class="mt-6 text-lg leading-8 text-gray-600">Für Sie als Unternehmen bietet
                                refuelos.com die Möglichkeit, den gesamten Freigabe-Check nahtlos in Ihre eigene
                                Unternehmenskommunikation einzubinden, dort eigene Produkte direkt zu platzieren und
                                dadurch eine langfristige Markenbindung zu schaffen! Natürlich mit Ihrer indiviudellen
                                CI.</p>
                            <div class="mt-6 flex items-center gap-x-6">

                                <a href="   "
                                   class="text-sm font-semibold leading-6 text-gray-900">Zeig mir ein Beispiel<span
                                        aria-hidden="true">→</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="relative lg:relative lg:right-0 lg:top-0 lg:bottom-0 lg:w-full lg:flex lg:items-center lg:pl-8 lg:pr-8 lg:mt-12">
                    <img src="{{ asset('assets/img/xtl-check-mac.png') }}" alt="Product screenshot"
                         class="w-[52rem] max-w-none sm:w-[52rem] md:-ml-12 lg:-ml-0" width="2432" height="1442"></div>
            </div>

            <div class="overflow-hidden bg-white py-12 sm:py-16">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div
                        class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
                        <div class="lg:ml-auto lg:pl-4 lg:pt-4">
                            <div class="lg:max-w-lg">
                                <h2 class="text-base font-semibold leading-7 text-indigo-600">Köönt wi dat nich ok?
                                    Kloor, mit de API!</h2>
                                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Freigabe
                                    Check auf der eigenen Website nutzen</p>
                                <p class="mt-6 text-lg leading-8 text-gray-600">Sie möchten den Freigabe-Check auf einer
                                    bestehenden Website oder App integrieren? Mit unserer API kein Problem! Code
                                    erzeugen, integrieren und Freigaben checken. Ganz ohne eigene Datenpflege.</p>

                            </div>
                        </div>
                        <div class="flex items-start justify-end lg:order-first">
                            <img src="{{ asset('assets/img/mac-sprint-form.png') }}" alt="Product screenshot"
                                 class="w-[52rem] max-w-none rounded-xl sm:w-[52rem]" width="2432" height="1442">
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden bg-white py-12 sm:py-16">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div
                        class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
                        <div class="lg:pr-8 lg:pt-4">
                            <div class="lg:max-w-lg">
                                <h2 class="text-base font-semibold leading-7 text-indigo-600">„WAT DE BUER NICH KENNT,
                                    DAT DEIT HE NICH.“</h2>
                                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">HVO Freigabe
                                    Check für PKW, LKW und Argar.</p>
                                <p class="mt-6 text-lg leading-8 text-gray-600">Wir sorgen dafür, dass der Freigabe
                                    Check für HVO Kraftstoffe in Zukunft auch speziell für Nutzfahrzeuge wie LKW,
                                    Baumaschinen oder Land- und Forstwirtschaft erweitert wird. So findet jeder, was er
                                    sucht. Sogar de Buer im hohen Norden.</p>

                            </div>
                        </div>
                        <img src="{{ asset('assets/img/xtl-hvo-traktor.jpg') }}" alt="Product screenshot"
                             class="w-[44rem] max-w-none rounded-xl shadow-xl ring-1 ring-gray-400/10 sm:w-[44rem] md:-ml-4 lg:-ml-0"
                             width="2432" height="1442">
                    </div>
                </div>
            </div>

            <div class="relative isolate bg-white px-6 py-12 sm:py-16 lg:px-8">
                <div class="absolute inset-x-0 -top-3 -z-10 transform-gpu overflow-hidden px-36 blur-3xl"
                     aria-hidden="true">
                    <div
                        class="mx-auto aspect-[1155/678] w-[72.1875rem] bg-gradient-to-tr from-[#80d4ff] via-[#80ffb5] to-[#b580ff] opacity-60"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
                </div>
                <div class="mx-auto max-w-2xl text-center lg:max-w-4xl">
                    <h2 class="text-base font-semibold leading-7 text-indigo-600">Abo-Modelle für unseren Freigabe
                        Check</h2>
                    <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Kleine Preise. Große
                        Wirkung.</p>
                </div>
                <p class="mx-auto mt-6 max-w-2xl text-center text-lg leading-8 text-gray-600">Mit unseren flexibel
                    Abo-Modellen ist für jeden etwas dabei.</p>
                <div
                    class="mx-auto mt-8 grid max-w-lg grid-cols-1 items-center gap-y-6 sm:mt-10 sm:gap-y-0 lg:max-w-4xl lg:grid-cols-2">
                    <div class="relative rounded-3xl bg-white p-8 shadow-2xl ring-1 ring-gray-900/10 sm:p-10">
                        <h3 id="tier-personal" class="text-base font-semibold leading-7 text-indigo-600">Variante 1: On
                            Site Integration</h3>
                        <p class="mt-4 flex items-baseline gap-x-2">
                            <span class="text-5xl font-bold tracking-tight text-gray-900">99 €</span>
                            <span class="text-base text-gray-500">netto / Monat</span>
                        </p>
                        <p class="mt-6 text-base leading-7 text-gray-600">Perfekt für kleine Tankstellen ohne eigene
                            Website.</p>
                        <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-600 sm:mt-10">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                          clip-rule="evenodd"/>
                                </svg>
                                Unterseite mit eigener CI
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                          clip-rule="evenodd"/>
                                </svg>
                                Mit Logo, Bild und Produkt auf Unterseite von refuelos.com (Upload im Kundenprofil)
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                          clip-rule="evenodd"/>
                                </svg>
                                Variable Kosten: <br>Keine bis 10.000 Suchanfragen / Monat. Ab 10.001: 10,00 € pro 1000
                                Suchanfragen
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                          clip-rule="evenodd"/>
                                </svg>
                                290,00 € Setup Gebühr (einmalig)
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                          clip-rule="evenodd"/>
                                </svg>
                                12 Monate Laufzeit
                            </li>

                        </ul>
                        <a href="{{route('register')}}" aria-describedby="tier-personal"
                           class="mt-8 block rounded-md bg-violet-700 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:mt-10">Jetzt
                            registrieren</a>
                        <p class="pt-4 text-center text-xs text-gray-500">Zahlung via SEPA Mandat kann nach
                            Registrierung ausgewählt werden.</p>
                    </div>
                    <div
                        class="rounded-3xl bg-white/60 p-8 ring-1 ring-gray-900/10 sm:mx-8 sm:rounded-t-none sm:p-10 lg:mx-0 lg:rounded-bl-none lg:rounded-tr-3xl">
                        <h3 id="tier-team" class="text-base font-semibold leading-7 text-indigo-600">Variante 2: On Site
                            + API</h3>
                        <p class="mt-4 flex items-baseline gap-x-2">
                            <span class="text-5xl font-bold tracking-tight text-gray-900">199 €</span>
                            <span class="text-base text-gray-500">netto / Monat</span>
                        </p>
                        <p class="mt-6 text-base leading-7 text-gray-600">Ideal für Unternehmen mit eigener Website oder
                            App.</p>
                        <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-600 sm:mt-10">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                          clip-rule="evenodd"/>
                                </svg>
                                Unterseite mit eigener CI + API
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                          clip-rule="evenodd"/>
                                </svg>
                                Individuell anpassbar auf eigener Website,
                                Gestaltung direkt im Kundenbackend
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                          clip-rule="evenodd"/>
                                </svg>
                                1.000 API-Aufrufe pro Monat inklusive.
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                          clip-rule="evenodd"/>
                                </svg>
                                290,00 € Setup Gebühr (einmalig)
                            </li>

                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                          clip-rule="evenodd"/>
                                </svg>
                                12 Monate Laufzeit
                            </li>
                        </ul>
                        <a href="{{route('register')}}" aria-describedby="tier-team"
                           class="mt-8 block rounded-md px-3.5 py-2.5 text-center text-sm font-semibold text-violet-700 ring-1 ring-inset ring-violet-200 hover:ring-indigo-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:mt-10">Jetzt
                            registrieren</a>

                        <p class="pt-4 text-center text-xs text-gray-500">Zahlung via SEPA Mandat kann nach
                            Registrierung ausgewählt werden.</p>
                    </div>

                </div>
            </div>


            <div class="bg-white" x-data="{ openFaq: null }">
                <div class="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:px-8 lg:py-40">
                    <div class="mx-auto max-w-4xl divide-y divide-gray-900/10">
                        <h2 class="text-2xl font-bold leading-10 tracking-tight text-gray-900">Häufige Fragen (FAQ)</h2>
                        <dl class="mt-10 space-y-6 divide-y divide-gray-900/10">
                            <div class="pt-6" x-data="{ isOpen: false }">
                                <dt>
                                    <!-- Expand/collapse question button -->
                                    <button @click="isOpen = !isOpen" type="button"
                                            class="flex w-full items-start justify-between text-left text-gray-900"
                                            aria-controls="faq-0" :aria-expanded="isOpen">
                                        <span class="text-base font-semibold leading-7">Warum brauchen wir den XTL Freigabe Check?</span>
                                        <span class="ml-6 flex h-7 items-center">
                                    </button>
                                </dt>
                                <dd x-show="isOpen" class="mt-2 pr-12" id="faq-0">
                                    <p class="text-base leading-7 text-gray-600">Der Freigabe-Check ist ideal, um Ihren
                                        Kunden direkt am POS eine eifnache Möglichkeit zu bieten, um nach bereits
                                        erfolgten Hersteller-Freigaben zu suchen. Einfacher geht es nicht.</p>
                                </dd>
                            </div>

                            <div class="pt-6" x-data="{ isOpen: false }">
                                <dt>
                                    <!-- Expand/collapse question button -->
                                    <button @click="isOpen = !isOpen" type="button"
                                            class="flex w-full items-start justify-between text-left text-gray-900"
                                            aria-controls="faq-0" :aria-expanded="isOpen">
                                        <span class="text-base font-semibold leading-7">Lässt sich der Check individuell anpassen?</span>
                                        <span class="ml-6 flex h-7 items-center">
                                    </button>
                                </dt>
                                <dd x-show="isOpen" class="mt-2 pr-12" id="faq-0">
                                    <p class="text-base leading-7 text-gray-600">Ja, über das Backend lässt sich die CI
                                        für das eigene Profil individuell einstellen. Gerne unterstützen wir dabei!</p>
                                </dd>
                            </div>

                            <div class="pt-6" x-data="{ isOpen: false }">
                                <dt>
                                    <!-- Expand/collapse question button -->
                                    <button @click="isOpen = !isOpen" type="button"
                                            class="flex w-full items-start justify-between text-left text-gray-900"
                                            aria-controls="faq-0" :aria-expanded="isOpen">
                                        <span class="text-base font-semibold leading-7">Kann man die Freigaben-Suche auch auf einer anderen Website oder in einer App einsetzen?</span>
                                        <span class="ml-6 flex h-7 items-center">
                                    </button>
                                </dt>
                                <dd x-show="isOpen" class="mt-2 pr-12" id="faq-0">
                                    <p class="text-base leading-7 text-gray-600">Ja, mit der Variante 2 (On-Site + API
                                        Integration) kann der Freigabe Check auf anderen Websites oder sogar in einer
                                        App eingesetzt werden.</p>
                                </dd>
                            </div>

                            <div class="pt-6" x-data="{ isOpen: false }">
                                <dt>
                                    <!-- Expand/collapse question button -->
                                    <button @click="isOpen = !isOpen" type="button"
                                            class="flex w-full items-start justify-between text-left text-gray-900"
                                            aria-controls="faq-0" :aria-expanded="isOpen">
                                        <span class="text-base font-semibold leading-7">Umfasst die Suchmaschine auch XTL Freigaben für Nutzfahrzeuge und Landmaschinen?</span>
                                        <span class="ml-6 flex h-7 items-center">
                                    </button>
                                </dt>
                                <dd x-show="isOpen" class="mt-2 pr-12" id="faq-0">
                                    <p class="text-base leading-7 text-gray-600">Wir arbeiten derzeit an einer
                                        Erweiterung der Datensätze für Nutzfahrzeuge, Baumaschinen und
                                        Landwirtschaft.</p>
                                </dd>
                            </div>
                            <!-- component -->
                            <!-- https://play.tailwindcss.com/PLrIiZQn2n -->


                        </dl>


                    </div>
                </div>
            </div>

            <div class="relative flex flex-col items-center justify-center overflow-hidden bg-white">
                <div class="max-w-xl px-5 text-center">
                    <h2 class="mb-2 text-xl font-bold text-zinc-800">Sie haben Fragen?</h2>
                    <p class="mb-2 text-lg text-zinc-500">Schreiben Sie uns unter <span
                            class="font-medium text-violet-500">mail@refuelos.com</span>.</p>
                    <a href="{{route('contact')}}"
                       class="mt-3 inline-block w-96 rounded bg-violet-700 px-5 py-3 font-medium text-white shadow-md shadow-violet-500/20 hover:bg-violet-500">Oder
                        über das Kontaktformular</a>
                </div>
            </div>


            <div class="absolute inset-x-0 bottom-0 -z-10 h-24 bg-gradient-to-t from-white sm:h-32"></div>
            <div class="mt-8"></div>
        </main>
    </div>
@endsection

@section('footer')
    <x-footer/>
@endsection
