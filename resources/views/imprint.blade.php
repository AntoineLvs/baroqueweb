@extends('layouts.app')

@section('body')

    <div class="bg-white">

        <x-navigation/>

        <main>

            <!-- Hero section -->
            <div class="relative isolate overflow-hidden bg-gray-900 pb-16 pt-5 sm:pb-10">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl py-32 sm:py-8 lg:py-24">
                        <div class="text-center">
                            <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Impressum</h1>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container mx-auto px-4 py-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-4">Impressum</h1>
                <div class="text-left text-gray-700 text-sm space-y-2">

                    <h3 class="font-bold">Angaben gemäß § 5 TMG</h3>
                    <p><strong>Elsen Media GmbH</strong></p>
                    <p>Großes Feld 7</p>
                    <p>25421 Pinneberg</p>
                    <p>Sitz der Gesellschaft: Pinneberg</p>
                    <p>Registergericht: Amtsgericht Pinneberg</p>
                    <p>Handelsregister: HRB 15591 PI</p>
                    <p>Geschäftsführer: Mario Elsen</p>
                    <p>Ust-ID: DE338867353</p>
                    <p>Finanzamt Itzehoe</p>

                    <h3 class="pt-4 font-bold mt-4">Kontakt</h3>
                    <p>Email: info@xtl-freigaben.de</p>
                    <p>Telefon: 040 74397325</p>
                    <p>Erreichbarkeit: Mo-Fr. 10.00-17.00 Uhr oder nach vorheriger Terminabsprache</p>


                    <h3 class="pt-4 font-bold">Umsatzsteuer-ID</h3>
                    <p>Umsatzsteuer-Identifikationsnummer (USt-IdNr.): DE338867353</p>

                    <h3 class="pt-4 font-bold">Verantwortlich für den Inhalt nach § 55 Abs. 2 RStV</h3>
                    <p>Mario Elsen, Großes Feld 7, 25421 Pinneberg</p>

                    <h3 class="pt-4 font-bold">Streitschlichtung</h3>
                    <p>Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit: <a
                            href="https://ec.europa.eu/consumers/odr" class="text-blue-600 hover:underline">https://ec.europa.eu/consumers/odr</a>
                    </p>
                    <p>Wir sind nicht bereit oder verpflichtet, an Streitbeilegungsverfahren vor einer
                        Verbraucherschlichtungsstelle teilzunehmen.</p>

                    <h3 class="pt-4 font-bold">Haftungsausschluss</h3>

                    <p><strong>Haftung für Inhalte</strong></p>
                    <p>Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten nach den
                        allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG sind wir als Diensteanbieter jedoch
                        nicht verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen oder nach
                        Umständen zu forschen, die auf eine rechtswidrige Tätigkeit hinweisen.</p>
                    <p>Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den allgemeinen
                        Gesetzen bleiben hiervon unberührt. Eine diesbezügliche Haftung ist jedoch erst ab dem Zeitpunkt
                        der Kenntnis einer konkreten Rechtsverletzung möglich. Bei Bekanntwerden von entsprechenden
                        Rechtsverletzungen werden wir diese Inhalte umgehend entfernen.</p>
                    <p>Sämtliche in den Suchergebnissen von XTL-Freigaben.de angezeigte Freigaben stammen von externen
                        Quellen und stehen unter dem Vorbehalt der Änderung durch die Urheber. XTL-Freigaben.de
                        übernimmt keine Gewähr und/oder Garantie für die Richtigkeit der Angaben. XTL-Freigaben.de
                        haftet nicht für mögliche Schäden, die aus der Berücksichtigung einer angegebenen Freigabe bei
                        der Kraftstoffbetankung entstehen. Der Kunde wird darauf hingewiesen, dass er verpflichtet ist,
                        hinsichtlich Beschaffenheit, Eignung und Verträglichkeit der Kraftstoffe vor dem erstmaligen
                        Betanken mit einem der aufgeführten Kraftstoffe (XTL oder B10) die Betriebsanleitung seines
                        Kraftfahrzeugs zu Rate zu ziehen und/oder sich an den Hersteller bzw. Importeur zu wenden.</p>
                    <p><strong>Haftung für Links</strong></p>
                    <p>Unser Angebot enthält Links zu externen Webseiten Dritter, auf deren Inhalte wir keinen Einfluss
                        haben. Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen. Für die
                        Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten
                        verantwortlich.</p>

                    <h3 class="pt-4 font-bold">Urheberrecht</h3>
                    <p>Die durch die Seitenbetreiber von elsenmedia.com erstellten Inhalte und Werke unterliegen dem
                        deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der
                        Verwertung außerhalb der Grenzen des Urheberrechtes bedürfen der schriftlichen Zustimmung des
                        jeweiligen Autors bzw. Erstellers.</p>

                    <h3 class="pt-4 font-bold">Datenschutz</h3>
                    <p>Ausführliche Hinweise zum Thema Datenschutz finden Sie in unserer <a class="underline"
                                                                                            href="{{route('privacy')}}">Datenschutzerklärung</a>.
                    </p>
                </div>
            </div>


        </main>

    </div>

@endsection

@section('footer')
    <x-footer/>
@endsection
