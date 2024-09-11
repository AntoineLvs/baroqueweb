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
                            <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">
                                Nutzungsbedingungen</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mx-auto px-4 py-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-4">Nutzungsbedingungen unserer Suchfunktion</h1>
                <div class="text-left text-gray-700 text-sm space-y-2">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Funktionsbeschreibung der Suchfunktionen von
                        refuelos.com</h2>
                    <p class="text-gray-700 mb-4">
                        Bei refuelos.com handelt es sich um eine interaktive Suchmaschine, die spezifische
                        Kraftstoff-Freigaben zu sog. XTL oder B10-Dieselkraftstoffen von fest definierten externen
                        Quellen sammelt (z.B. die Website des Fahrzeugherstellers) und dem Benutzer (z.B. PKW- oder
                        LKW-Fahrer) diese in einer benutzerfreundlichen Liste aufbereitet anzeigt. Ziel der Anzeige ist
                        es, dem PKW- oder LKW-Fahrer aufzuzeigen, ob das vom Ihm gewählte Fahrzeug-Modell durch den
                        Hersteller eine Freigabe für die sog. XTL- oder B10-Kraftstoff erhalten hat. Zum Anzeige dieser
                        möglichen Freigaben kann der Benutzer zwischen mehreren Filter-Möglichkeiten wie
                        „Fahrzeughersteller“ und „Fahrzeugmodell“ wählen. Nach dem Absenden des Suchformulars erscheinen
                        die durch die Suchmaschine ermittelten Freigaben in einer Übersicht. Sofern die Suchmaschine
                        keine Freigabe eines Herstellers ermitteln kann, wird der Benutzer einen entsprechenden Hinweis
                        in der Ergebnisliste finden.
                    </p>

                    <h2 class="text-xl font-bold text-gray-900 mt-6 mb-4">Vorgesehene Nutzung der Suchfunktion und
                        bereitgestellter Werbematerialien</h2>
                    <p class="text-gray-700 mb-4">
                        Durch Auswahl des Fahrzeugherstellers, der Modellreihe und des Modells kann der Benutzer die
                        offizielle Herstellerfreigabe eines Fahrzeuges für die Kraftstoffe XTL (DIN EN 15940) oder B10
                        (DIN EN 16734) mit Hilfe der Anwendung anzeigen lassen. Der Benutzer gelangt zur Suchmaske
                        entweder online über eine Verlinkung, Werbematerial (Flyer oder Aufsteller) oder auch über einen
                        QR-Code Aufkleber. Das Werbematerial und die Aufkleber können direkt über refuelos.com
                        bezogen und am Point-of-Sale direkt an der Zapfsäule oder auch im Bereich des Tankstellenshops
                        aufgeklebt bzw. ausgelegt oder aufgestellt werden. Für weitere Medien wie Audio- und
                        Video-Medien gelten die individuell bereitgestellten Hinweise zur Nutzung.
                    </p>

                    <h2 class="text-xl font-bold text-gray-900 mt-6 mb-4">Haftungsausschluss</h2>
                    <p class="text-gray-700 mb-4">
                        Sämtliche in den Suchergebnissen von refuelos.com angezeigte Freigaben stammen von externen
                        Quellen, wie beispielsweise den Websites der Fahrzeug-Hersteller, dem ADAC oder der Deutsche
                        Automobil Treuhand GmbH („DAT“) und stehen unter dem Vorbehalt der Änderung durch diese.
                        Sie wurden durch den Provider und die Suchmaschine refuelos.com lediglich zusammengetragen
                        und zum Zwecke der Auffindbarkeit und Definition von Suchkriterien (wie z.B. Fahrzeug-Hersteller
                        und Fahrzeug-Modell) aufbereitet.
                        Für die Aktualität, Richtigkeit und Vollständigkeit ist allein der jeweilige Fahrzeughersteller
                        bzw. -importeur verantwortlich. Ebenso für die Informationen zur Beschaffenheit, Eignung und
                        Verträglichkeit der Kraftstoffe für die aufgelisteten Fahrzeuge.
                        Alle Angaben erfolgen ohne Gewähr durch den Provider. Prüfen Sie hinsichtlich Beschaffenheit,
                        Eignung und Verträglichkeit der Kraftstoffe vor dem erstmaligen Betanken mit einem der
                        aufgeführten Kraftstoffe (XTL oder B10) immer die Betriebsanleitung Ihres Kraftfahrzeugs
                        und/oder wenden Sie sich an den Hersteller bzw. Importeur. Ausschließlich Fahrzeughersteller
                        erteilen rechtlich verbindliche Freigabeerklärungen hinsichtlich der Verträglichkeit von
                        Kraftstoffen (XTL oder B10). </p>


                    <h2 class="text-xl font-bold text-gray-900 mt-6 mb-4">Datenherkunft (Quellen) und Aktualität der
                        Daten</h2>
                    <p class="text-gray-700 mb-4">
                        Der Provider dokumentiert die Quellenangaben der Herstellerfreigaben unter dem folgenden Link:
                        <a href="{{route('sourcesList')}}">refuelos.com/sources-list/</a>
                        Da die Hersteller eine abweichende Struktur in der Datenherkunft angeben, stellt der Provider
                        diese Struktur als Grundlage der Suchfunktion bereit.
                        In der jeweiligen Quellen-Liste (Source) findet sich das konkrete Datum der Veröffentlichung der
                        Freigabe, ein Verweis zur Quelle sowie ein Zeitstempel des letzten Besuchs durch unsere
                        Suchmaschine (Letztes Crawl Datum).
                    </p>

                </div>
            </div>
        </main>
    </div>

@endsection

@section('footer')
    <x-footer/>
@endsection
