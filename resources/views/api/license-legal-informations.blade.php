@extends('layouts.app', ['page' => 'Api', 'pageSlug' => 'Api Manager', 'section' => 'main'])
@section('content')

    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
        <div class="py-10">
            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-2xl font-bold text-gray-900">Software as a Service – Vertrag über die Nutzung der
                    Online-Anwendung refuelos.com</h1>

                @if (session()->has('message'))

                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="pt-5">
                        <div class="rounded-md bg-green-50 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <!-- Heroicon name: solid/check-circle -->
                                    <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
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
                                <div class="ml-auto pl-3">
                                    <div class="-mx-1.5 -my-1.5">
                                        <button type="button"
                                                class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600"
                                                onclick="closeAlert(event)">
                                            <span class="sr-only">Dismiss</span>
                                            <!-- Heroicon name: solid/x -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                 fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


            </div>
            <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">

                <div class="py-4">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
                        <div class="px-4 py-5 sm:p-6 ">
                            <h1 class="text-2xl font-bold text-gray-900 mb-4">Inhalt</h1>

                            <ul class="pb-8">
                                <li>
                                   <a class="text-indigo-700 mb-2" href="#vertrag">Software as a Service – Vertrag über die Nutzung der Online-Anwendung refuelos.com</a>
                                </li>
                                <li>
                                    <a class="text-indigo-700 mb-2" href="#leistungsbeschreibung">Anhang 1: Leistungsbeschreibung</a>
                                </li>
                                <li>
                                    <a class="text-indigo-700 mb-2" href="#abo-modelle">Anhang 2: Abo-Modelle</a>
                                </li>
                            </ul>




                            <div class="text-left text-gray-700 text-sm space-y-2">


                                <h2 id="vertrag" class="text-xl font-bold text-gray-900 mb-4">Software as a Service – Vertrag über
                                    die Nutzung der Online-Anwendung refuelos.com</h2>
                                <p class="text-gray-700 mb-4">Zwischen</p>
                                <p class="text-gray-700 mb-4">
                                    refuelos.com<br>
                                    Elsen Media GmbH<br>
                                    Großes Feld 7<br>
                                    25421 Pinneberg<br>
                                    – nachstehend „Provider“ genannt –
                                </p>
                                <p class="text-gray-700 mb-4">und</p>
                                <p class="text-gray-700 mb-4">(dem Vertragspartner)<br>– nachstehend „Kunde“ genannt –</p>
                                <p class="text-gray-700 mb-4">wird folgender Vertrag geschlossen:</p>

                                <h3 class="text-lg font-bold text-gray-900 mb-4">§ 1 Vertragsgegenstand</h3>
                                <p class="text-gray-700 mb-4">
                                    (1) Der Provider erbringt für den Kunden SaaS-Dienstleistungen über das Medium
                                    Internet im Bereich betriebswirtschaftlicher Software. Zentrale Dienstleistung ist
                                    die Bereitstellung einer Suchfunktion zum Auffinden von Kraftstoff-Freigaben
                                    (insbesondere XtL = X to liquid und B10) für PKW und Nutzfahrzeuge (näheres zur
                                    Leistungsbeschreibung in Anhang 1).
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (2) Vertragsgegenstand ist je nach von dem Kunden gewähltem Leistungsumfang (vgl.
                                    hierzu Anhang 2):
                                <ul class="list-disc list-inside mb-4">
                                    <li>Bereitstellung eines Zugangs zur Internet-Anwendung „refuelos.com“
                                        (nachfolgend als „SOFTWARE“ bezeichnet) des Providers zur Nutzung über das
                                        Internet und
                                    </li>
                                    <li>die Bereitstellung einer Unterseite auf refuelos.com mit zentraler
                                        Suchfunktion für XTL-Freigaben in Kunden-CI (Corporate Identity) samt
                                        Speicherplatz auf den Servern des Providers gegen Gebühr sowie
                                    </li>
                                    <li>die Bereitstellung einer Schnittstelle zur Integration der Suchfunktion der
                                        XTL-Freigaben auf der Kundenwebsite bzw. dem Server des Kunden gegen Gebühr
                                        sowie
                                    </li>
                                    <li>die Bereitstellung von für den Kunden individualisierten Werbemitteln (bspw.
                                        Aufkleber, Flyer oder POS-Aufsteller) gegen Gebühr.
                                    </li>
                                </ul>
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (3) Dem Provider ist es gestattet, bei der Einräumung von Speicherplatz oder
                                    bestimmten technischen Funktionalitäten der Plattform Nachunternehmer einzubeziehen.
                                    Der Einsatz von Nachunternehmern entbindet den Provider nicht von seiner alleinigen
                                    Verpflichtung gegenüber dem Kunden zur vollständigen Vertragserfüllung.
                                </p>

                                <h3 class="text-lg font-bold text-gray-900 mb-4">§ 2 Softwareüberlassung</h3>
                                <p class="text-gray-700 mb-4">
                                    (1) Der Provider stellt dem Kunden die SOFTWARE im Rahmen des gewählten Abo-Modells
                                    (Anhang 2) in der jeweils aktuellen Version über das Internet entgeltlich zur
                                    Verfügung. Zu diesem Zweck stellt der Provider dem Kunden einen Login zur SOFTWARE
                                    bereit, der über das Internet für den Kunden erreichbar ist.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (2) Der jeweils aktuelle Funktionsumfang der SOFTWARE ergibt sich aus der aktuellen
                                    Leistungsbeschreibung (Anhang 1); die Vertragsdauer und die Höhe der Vergütung
                                    ergeben sich aus den aktuellen Abo-Modellen auf der Web-Site des Providers unter
                                    refuelos.com/abos (Anhang 2 Abo-Modelle).
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (3) Der Provider beseitigt nach Maßgabe der technischen Möglichkeiten unverzüglich
                                    sämtliche Softwarefehler. Ein Fehler liegt dann vor, wenn die SOFTWARE die in der
                                    Leistungsbeschreibung (Anhang 1) angegebenen Funktionen nicht erfüllt, fehlerhafte
                                    Ergebnisse liefert oder in anderer Weise nicht funktionsgerecht arbeitet, so dass
                                    die Nutzung der SOFTWARE unmöglich oder eingeschränkt ist.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (4) Der Provider entwickelt die SOFTWARE laufend weiter und wird diese durch
                                    laufende Updates und Upgrades verbessern.
                                </p>

                                <h3 class="text-lg font-bold text-gray-900 mb-4">§ 3 Nutzungsrechte an der SOFTWARE</h3>
                                <p class="text-gray-700 mb-4">
                                    (1) Der Provider räumt dem Kunden das nicht ausschließliche und nicht übertragbare
                                    Recht ein, die in diesem Vertrag bezeichnete SOFTWARE während der Dauer des
                                    Vertrages im Rahmen der SaaS-Dienste sowie der Leistungsbeschreibung (Anlage 1)
                                    bestimmungsgemäß zu nutzen.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (2) Der Kunde darf die SOFTWARE nur bearbeiten, soweit dies durch die
                                    bestimmungsgemäße Benutzung der SOFTWARE laut jeweils aktueller
                                    Leistungsbeschreibung abgedeckt ist.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (3) Der Kunde darf die SOFTWARE nur vervielfältigen, soweit dies durch die
                                    bestimmungsgemäße Benutzung der Software laut jeweils aktueller
                                    Leistungsbeschreibung abgedeckt ist.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (4) Der Kunde ist nicht berechtigt, die SOFTWARE Dritten entgeltlich oder
                                    unentgeltlich zur Nutzung zur Verfügung zu stellen. Eine Weitervermietung der
                                    SOFTWARE wird dem Kunden somit ausdrücklich nicht gestattet.
                                </p>

                                <h3 class="text-lg font-bold text-gray-900 mb-4">§ 4 Speicherung von Daten</h3>
                                <p class="text-gray-700 mb-4">
                                    (1) Der Provider ermöglicht dem Kunden die Speicherung seiner im Rahmen der
                                    Leistungsbeschreibung (Anhang 1) sowie dem gewählten Abo-Modell (Anhang 2)
                                    erforderlichen Daten.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (2) Der Kunde verpflichtet sich, keine Inhalte auf dem Speicherplatz zu speichern,
                                    deren Bereitstellung, Veröffentlichung oder Nutzung gegen geltendes Recht oder
                                    Vereinbarungen mit Dritten verstößt.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (3) Der Provider ist verpflichtet, geeignete Vorkehrungen gegen Datenverlust und zur
                                    Verhinderung unbefugten Zugriffs Dritter auf die Daten des Kunden zu treffen.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (4) Mit Beendigung des Vertragsverhältnisses wird der Provider die im unter dem
                                    Login des Kunden gespeicherten Daten unverzüglich löschen.
                                </p>

                                <h3 class="text-lg font-bold text-gray-900 mb-4">§ 5 Support</h3>
                                <p class="text-gray-700 mb-4">
                                    (1) Der Umfang des Supports ergibt sich aus der Leistungsbeschreibung (Anlage 1) zu
                                    diesem Vertrag.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (2) Der Provider wird Anfragen des Kunden zur Anwendung der vertragsgegenständlichen
                                    SOFTWARE und der weiteren SaaS-Dienste innerhalb der auf der Web-Site
                                    refuelos.com/support veröffentlichten Geschäftszeiten nach Maßgabe der Support
                                    Policy des Providers wie aus Anlage 1  ersichtlich nach Eingang der jeweiligen Frage
                                    telefonisch oder in Textform beantworten.
                                </p>

                                <h3 class="text-lg font-bold text-gray-900 mb-4">§ 6 Unterbrechung/Beeinträchtigung der
                                    Erreichbarkeit</h3>
                                <p class="text-gray-700 mb-4">
                                    (1) Anpassungen, Änderungen und Ergänzungen der vertragsgegenständlichen
                                    SaaS-Dienste sowie Maßnahmen, die der Feststellung und Behebung von
                                    Funktionsstörungen dienen, werden nur dann zu einer vorübergehenden Unterbrechung
                                    oder Beeinträchtigung der Erreichbarkeit führen, wenn dies aus technischen Gründen
                                    zwingend notwendig ist.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (2) Die Überwachung der Grundfunktionen der SaaS-Dienste erfolgt täglich. Die
                                    Wartung der SaaS-Dienste ist grundsätzlich von Montag bis Freitag 09:00 – 18:00 Uhr
                                    gewährleistet. Bei schweren Fehlern – die Nutzung der SaaS-Dienste ist nicht mehr
                                    möglich bzw. ernstlich eingeschränkt – erfolgt die Wartung binnen 24 Stunden ab
                                    Kenntnis oder Information durch den Kunden. Der Provider wird den Kunden von den
                                    Wartungsarbeiten umgehend verständigen und den technischen Bedingungen entsprechend
                                    in der möglichst kürzesten Zeit durchführen. Sofern die Fehlerbehebung nicht
                                    innerhalb von 24 Stunden möglich sein sollte, wird der Provider den Kunden davon
                                    binnen 48 Stunden unter Angabe von Gründen sowie des Zeitraums, der für die
                                    Fehlerbeseitigung voraussichtlich zu veranschlagen ist, per E-Mail verständigen.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (3) Die Verfügbarkeit der jeweils vereinbarten Dienste nach §  (2) dieses Vertrags
                                    beträgt 98,5 % im Jahresdurchschnitt einschließlich Wartungsarbeiten, jedoch darf
                                    die Verfügbarkeit nicht länger als zwei Kalendertage in Folge beeinträchtigt oder
                                    unterbrochen sein.
                                </p>

                                <h3 class="text-lg font-bold text-gray-900 mb-4">§ 7 Pflichten des Kunden</h3>
                                <p class="text-gray-700 mb-4">
                                    (1) Der Kunde ist verpflichtet, die von der SOFTWARE gelieferten rechtlichen
                                    Hinweise zur Nutzung der Freigaben-Suchfunktion (Disclaimer siehe Anlage 1.2) dem
                                    Verbraucher an geeigneter Stelle zugänglich zu machen.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (2) Der Kunde verpflichtet sich, auf dem zur Verfügung gestellten Speicherplatz
                                    keine rechtswidrigen, die Gesetze, behördlichen Auflagen oder Rechte Dritter
                                    verletzenden Inhalte abzulegen oder einzupflegen.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (3) Der Kunde ist verpflichtet, den unbefugten Zugriff Dritter auf die geschützten
                                    Bereiche der SOFTWARE durch geeignete Vorkehrungen zu verhindern. Zu diesem Zwecke
                                    wird der Kunde, soweit erforderlich, seine Mitarbeiter auf die Einhaltung des
                                    Urheberrechts hinweisen.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (4) Unbeschadet der Verpflichtung des Providers zur Datensicherung ist der Kunde
                                    selbst für die Eingabe und Pflege seiner zur Nutzung der SaaS-Dienste erforderlichen
                                    Daten und Informationen verantwortlich.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (5) Der Kunde ist verpflichtet, seine Daten und Informationen vor der Eingabe auf
                                    Viren oder sonstige schädliche Komponenten zu prüfen und hierzu dem Stand der
                                    Technik entsprechende Virenschutzprogramme einzusetzen.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (6) Der Kunde wird für den Zugriff auf die Nutzung der SaaS-Dienste im Rahmen des
                                    Registrierungsprozesses einen Benutzernamen und ein Passwort generieren, die zur
                                    weiteren Nutzung der SaaS-Dienste erforderlich sind. Der Kunde ist verpflichtet,
                                    Benutzername und Passwort geheim zu halten und Dritten gegenüber nicht zugänglich zu
                                    machen.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (7) Die von dem Kunden auf dem für ihn bestimmten Speicherplatz abgelegten Inhalte
                                    können urheber- und datenschutzrechtlich geschützt sein. Der Kunde räumt dem
                                    Provider hiermit das Recht ein, die auf dem Server abgelegten Inhalte dem Kunden bei
                                    dessen Abfragen über das Internet zugänglich machen zu dürfen und insbesondere sie
                                    hierzu zu vervielfältigen und zu übermitteln sowie zum Zwecke der Datensicherung
                                    vervielfältigen zu können.
                                </p>

                                <h3 class="text-lg font-bold text-gray-900 mb-4">§ 8 Vergütung</h3>
                                <p class="text-gray-700 mb-4">
                                    (1) Der Kunde verpflichtet sich, dem Provider für die Überlassung der SOFTWARE und
                                    die Bereitstellung der in der Leistungsbeschreibung (Anlage 1) beschriebenen
                                    Funktionalitäten das im Rahmen des gewählten Abo-Modells (Anlage 2) vereinbarte
                                    monatliche Entgelt zzgl. gesetzlicher MwSt. zu bezahlen. Sofern nicht anders
                                    vereinbart, richtet sich die Vergütung nach den im Zeitpunkt des Vertragsschlusses
                                    gültigen Abo-Preisen (Anlage 2).
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (2) Einwendungen gegen die Abrechnung der vom Provider erbrachten Leistungen hat der
                                    Kunde innerhalb einer Frist von acht Wochen nach Zugang der Rechnung schriftlich bei
                                    der auf der Rechnung angegebenen Stelle zu erheben. Nach Ablauf der vorgenannten
                                    Frist gilt die Abrechnung als vom Kunden genehmigt. Der Provider wird den Kunden mit
                                    Übersendung der Rechnung auf die Bedeutung seines Verhaltens besonders hinweisen.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (3) Die Abrechnung der vom Provider erbrachten Leistungen erfolgt über das im Rahmen
                                    des Registrierungsprozesses oder der Kontoeinrichtung erteilte
                                    SEPA-Lastschriftmandat oder nach Rechnungsstellung durch den Provider.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (4) Das durch den Kunden erteilte SEPA-Lastschriftmandat wird nach Abschluss des
                                    Registrierungsprozesses oder der Kontoeinrichtung auch für die Abrechnung der durch
                                    den Provider erbrachten Sonderleistungen (z.B. Marketingmaterial) genutzt.
                                </p>

                                <h3 class="text-lg font-bold text-gray-900 mb-4">§ 9 Mängelhaftung/Haftung</h3>
                                <p class="text-gray-700 mb-4">
                                    (1) Der Provider garantiert die Funktions- und die Betriebsbereitschaft der
                                    SaaS-Dienste nach den Bestimmungen dieses Vertrages.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (2) Für den Fall, dass Leistungen des Providers von unberechtigten Dritten unter
                                    Verwendung der Zugangsdaten des Kunden in Anspruch genommen werden, haftet der Kunde
                                    für dadurch anfallende Entgelte im Rahmen der zivilrechtlichen Haftung bis zum
                                    Eingang des Kundenauftrages zur Änderung der Zugangsdaten oder der Meldung des
                                    Verlusts oder Diebstahls, sofern den Kunden am Zugriff des unberechtigten Dritten
                                    ein Verschulden trifft.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (3) Der Provider ist zur sofortigen Sperre des Kundenaccounts berechtigt, wenn der
                                    begründete Verdacht besteht, dass die gespeicherten Daten rechtswidrig sind und/oder
                                    Rechte Dritter verletzen. Ein begründeter Verdacht für eine Rechtswidrigkeit
                                    und/oder eine Rechtsverletzung liegt insbesondere dann vor, wenn Gerichte, Behörden
                                    und/oder sonstige Dritte den Provider davon in Kenntnis setzen. Der Provider hat den
                                    Kunden von der Sperre und dem Grund hierfür unverzüglich zu verständigen. Die Sperre
                                    ist aufzuheben, sobald der Verdacht entkräftet ist.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (4) Schadensersatzansprüche gegen den Provider sind unabhängig vom Rechtsgrund
                                    ausgeschlossen, es sei denn, der Provider, seine gesetzlichen Vertreter oder
                                    Erfüllungsgehilfen haben vorsätzlich oder grob fahrlässig gehandelt. Für leichte
                                    Fahrlässigkeit haftet der Provider nur, wenn eine der vertragswesentlichen Pflichten
                                    durch den Provider, seine gesetzlichen Vertreter oder leitende Angestellte oder
                                    Erfüllungsgehilfen verletzt wurde. Der Provider haftet dabei nur für vorhersehbare
                                    Schäden, mit deren Entstehung typischerweise gerechnet werden muss.
                                    Vertragswesentliche Pflichten sind solche Pflichten, die die Grundlage des Vertrags
                                    bilden, die entscheidend für den Abschluss des Vertrags waren und auf deren
                                    Erfüllung der Kunde vertrauen darf.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (5) Für den Verlust von Daten haftet der Provider insoweit nicht, als der Schaden
                                    darauf beruht, dass es der Kunde unterlassen hat, Datensicherungen durchzuführen und
                                    dadurch sicherzustellen, dass verloren gegangene Daten mit vertretbarem Aufwand
                                    wiederhergestellt werden können.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (6) Der Provider haftet unbeschränkt für vorsätzlich oder fahrlässig verursachte
                                    Schäden aus der Verletzung des Lebens, des Körpers oder der Gesundheit durch den
                                    Provider, seine gesetzlichen Vertreter oder Erfüllungsgehilfen.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (7) Der Provider greift für die Bereitstellung der angezeigten Freigaben auf externe
                                    Quellen wie beispielsweise die Websites der Fahrzeug-Hersteller, dem ADAC oder der
                                    Deutsche Automobil Treuhand GmbH („DAT“) zurück. Die Freigaben stehen daher unter
                                    dem Vorbehalt der Änderung durch diese. Der Provider gewährleistet lediglich, dass
                                    die veröffentlichten Daten aus jeweils aktuellen Quellen zusammengetragen und zum
                                    Zwecke der Auffindbarkeit und Definition von Suchkriterien (wie z.B.
                                    Fahrzeug-Hersteller und Fahrzeug-Modell) aufbereitet sind.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (8) Ausschließlich Fahrzeughersteller erteilen rechtlich verbindliche
                                    Freigabeerklärungen hinsichtlich der Verträglichkeit von Kraftstoffen (XTL oder
                                    B10). Für die Aktualität, Richtigkeit und Vollständigkeit ist daher allein der
                                    jeweilige Fahrzeughersteller bzw. -importeur verantwortlich. Dies gilt auch für die
                                    Informationen zur Beschaffenheit, Eignung und Verträglichkeit der Kraftstoffe für
                                    die aufgelisteten Fahrzeuge. Alle Angaben zu Freigaben erfolgen daher ohne Gewähr
                                    durch den Provider. Der Provider übernimmt daher keine Haftung für mögliche Schäden,
                                    die aus der Berücksichtigung einer Freigabe bei der Kraftstoffbetankung entstehen.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (9) Der Kunde wird darauf hingewiesen, dass er verpflichtet ist, hinsichtlich
                                    Beschaffenheit, Eignung und Verträglichkeit der Kraftstoffe vor dem erstmaligen
                                    Betanken mit einem der aufgeführten Kraftstoffe (XTL oder B10) die Betriebsanleitung
                                    seines Kraftfahrzeugs zu Rate zu ziehen und/oder sich an den Hersteller bzw.
                                    Importeur zu wenden.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (10) Der Provider haftet nicht für den Inhalt der auf der Unterseite des Kunden nach
                                    der in der Anlage 1 beschriebenen Weise dargestellten Informationen, insbesondere zu
                                    den dargestellten Angeboten und Marken- oder Warenzeichen des Kunden.
                                </p>

                                <h3 class="text-lg font-bold text-gray-900 mb-4">§ 10 Laufzeit und Kündigung</h3>
                                <p class="text-gray-700 mb-4">
                                    (1) Der Vertrag wird auf unbestimmte Zeit geschlossen. Das Vertragsverhältnis
                                    beginnt mit der Anmeldung und Registrierung durch den Kunden und kann von beiden
                                    Parteien schriftlich mit einer Frist von 30 Tagen zum Ablauf der regulären
                                    Vertragslaufzeit des gewählten Abo-Modells (Anlage 2) beendet werden.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (2) Unberührt bleibt das Recht jeder Vertragspartei, den Vertrag aus wichtigem
                                    Grunde fristlos zu kündigen. Zur fristlosen Kündigung ist der Provider insbesondere
                                    berechtigt, wenn der Kunde fällige Zahlungen trotz Mahnung und Nachfristsetzung
                                    nicht leistet oder die vertraglichen Bestimmungen über die Nutzung der SaaS-Dienste
                                    verletzt. Eine fristlose Kündigung setzt in jedem Falle voraus, dass der andere Teil
                                    schriftlich abgemahnt und aufgefordert wird, den vermeintlichen Grund zur fristlosen
                                    Kündigung in angemessener Zeit zu beseitigen.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (3) Im Falle der Beendigung des Vertrages werden die von dem Kunden gespeicherten
                                    Daten und der bereitgestellte Zugang sowie die damit verbundenen Funktionalitäten
                                    nach Maßgabe der Leistungsbeschreibung (Anlage 1) spätestens innerhalb von 14 Tagen
                                    durch den Provider gelöscht bzw. deaktiviert.
                                </p>

                                <h3 class="text-lg font-bold text-gray-900 mb-4">§ 11 SEPA-Lastschrift-Mandat</h3>
                                <p class="text-gray-700 mb-4">
                                    Der Kunde verpflichtet sich, das Entgelt für die Leistungen des Providers durch ein
                                    SEPA-Firmenlastschrift-Mandat zu entrichten. Dafür willigt der Kunde ein, bei seinem
                                    Kreditinstitut eingehende Lastschriften durch ein SEPA-Firmenlastschrift-Mandat zu
                                    Lasten seines Kontos zu begleichen. Kommt kein wirksames
                                    SEPA-Firmenlastschrift-Mandat zustande, gilt ein SEPA-Basislastschrift-Mandat als
                                    erteilt. Das SEPA-Firmenlastschrift-Mandat dient nur dem Einzug von Lastschriften,
                                    die auf Konten von Unternehmen gezogen sind. Der Kunde ist nicht berechtigt, nach
                                    erfolgter Einlösung eine Erstattung des Betrages zu verlangen. Der Kunde ist
                                    berechtigt, sein Kreditinstitut bis zum Fälligkeitstag anzuweisen,
                                    Lastschriftmandate nicht einzulösen. Im Falle der SEPA-Lastschrift kann der Kunde
                                    innerhalb von acht Wochen, beginnend mit dem Belastungsdatum, bei seinem
                                    Kreditinstitut die Erstattung des belasteten Betrages verlangen. Es gelten die dabei
                                    mit seinem Kreditinstitut vereinbarten Bedingungen. Sofern das Konto im Zeitpunkt
                                    der Belastung nicht die erforderliche Deckung aufweist, besteht für das
                                    Kreditinstitut keine Pflicht zur Einlösung. Der Provider ist berechtigt, im Fall der
                                    Nicht-Teilnahme am SEPA-Firmenlastschrift-Mandat sowie im Fall von Rücklastschriften
                                    ein zusätzliches Bearbeitungsentgelt zu erheben.
                                </p>

                                <h3 class="text-lg font-bold text-gray-900 mb-4">§ 12 Datenschutz/Geheimhaltung</h3>
                                <p class="text-gray-700 mb-4">
                                    (1) Der Kunde wird bei der Nutzung der SOFTWARE die anwendbaren
                                    datenschutzrechtlichen Bestimmungen einhalten. Der Provider ist insoweit nicht
                                    Verantwortlicher im Sinne des Art 4 Nr. 7 DSGVO.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (2) Der Provider verpflichtet sich, über alle ihm im Rahmen der Vorbereitung,
                                    Durchführung und Erfüllung dieses Vertrages zur Kenntnis gelangten vertraulichen
                                    Vorgänge, insbesondere Geschäfts- oder Betriebsgeheimnisse des Kunden, strengstes
                                    Stillschweigen zu bewahren und diese weder weiterzugeben noch auf sonstige Art zu
                                    verwerten. Dies gilt gegenüber jeglichen unbefugten Dritten, d.h. auch gegenüber
                                    unbefugten Mitarbeitern sowohl des Providers als auch des Kunden, sofern die
                                    Weitergabe von Informationen nicht zur ordnungsgemäßen Erfüllung der vertraglichen
                                    Verpflichtungen des Providers erforderlich ist. In Zweifelsfällen wird sich der
                                    Provider vom Kunden vor einer solchen Weitergabe eine Zustimmung erteilen lassen.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (3) Der Provider verpflichtet sich, mit allen von ihm im Zusammenhang mit der
                                    Vorbereitung, Durchführung und Erfüllung dieses Vertrages eingesetzten Mitarbeitern
                                    und Nachunternehmern eine mit vorstehendem Abs. inhaltsgleiche Regelung zu
                                    vereinbaren.
                                </p>

                                <h3 class="text-lg font-bold text-gray-900 mb-4">§ 13 Anwendbares Recht,
                                    Gerichtsstand</h3>
                                <p class="text-gray-700 mb-4">
                                    (1) Auf vorliegenden Vertrag findet deutsches Recht unter Ausschluss des
                                    UN-Kaufrechts Anwendung.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (2) Für Streitigkeiten aus diesem Vertrag ist ausschließlicher Gerichtsstand
                                    Hamburg.
                                </p>

                                <h3 class="text-lg font-bold text-gray-900 mb-4">§ 14 Sonstiges</h3>
                                <p class="text-gray-700 mb-4">
                                    (1) Mündliche Nebenabreden sind nicht getroffen. Änderungen, Ergänzungen und Zusätze
                                    dieses Vertrages haben nur Gültigkeit, wenn sie zwischen den Vertragsparteien
                                    schriftlich vereinbart werden. Dies gilt auch für die Abänderung dieser
                                    Vertragsbestimmung.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (2) Sollte eine Bestimmung dieses Vertrages unwirksam sein oder werden, so berührt
                                    dies die Wirksamkeit des Vertrages im Übrigen nicht. Die unwirksame Bestimmung gilt
                                    als durch eine wirksame Regelung ersetzt, die dem wirtschaftlichen Zweck der
                                    unwirksamen Bestimmung am nächsten kommt. Entsprechendes gilt im Fall einer
                                    Vertragslücke.
                                </p>
                                <p class="text-gray-700 mb-4">
                                    (3) Anlagen, auf die in diesem Vertrag Bezug genommen wird, sind
                                    Vertragsbestandteil.
                                </p>


                                <div class="pt-8">

                                    <h3 id="leistungsbeschreibung" class="text-lg font-bold text-gray-900 mb-4">Anhang 1:
                                        Leistungsbeschreibung</h3>
                                    <h4 class="text-md font-semibold text-gray-900 mb-4">1.1 Funktionsbeschreibung der
                                        Suchfunktionen von refuelos.com</h4>
                                    <p class="text-gray-700 mb-4">
                                        Bei refuelos.com handelt es sich um eine interaktive Suchmaschine, die
                                        spezifische Kraftstoff-Freigaben zu sog. XTL oder B10-Dieselkraftstoffen von
                                        fest
                                        definierten externen Quellen sammelt (z.B. die Website des Fahrzeugherstellers)
                                        und
                                        dem Benutzer (z.B. PKW- oder LKW-Fahrer) diese in einer benutzerfreundlichen
                                        Liste
                                        aufbereitet anzeigt.
                                    </p>
                                    <p class="text-gray-700 mb-4">
                                        Ziel der Anzeige ist es, dem PKW- oder LKW-Fahrer aufzuzeigen, ob das von ihm
                                        gewählte Fahrzeug-Modell durch den Hersteller eine Freigabe für die sog. XTL-
                                        oder
                                        B10-Kraftstoff erhalten hat. Zum Anzeige dieser möglichen Freigaben kann der
                                        Benutzer zwischen mehreren Filter-Möglichkeiten wie „Fahrzeughersteller“ und
                                        „Fahrzeugmodell“ wählen. Nach dem Absenden des Suchformulars erscheinen die
                                        durch
                                        die Suchmaschine ermittelten Freigaben in einer Übersicht. Sofern die
                                        Suchmaschine
                                        keine Freigabe eines Herstellers ermitteln kann, wird der Benutzer einen
                                        entsprechenden Hinweis in der Ergebnisliste finden.
                                    </p>

                                    <h4 class="text-md font-semibold text-gray-900 mb-4">1.2 Begriffserklärung:
                                        On-Site-Integration / API-Integration</h4>
                                    <p class="text-gray-700 mb-4">
                                        Das Abo-Modell von refuelos.com bietet dem Kunden zwei verschiedene
                                        Varianten
                                        der Nutzung unserer Suchfunktion und der extern ermittelten Datensätze:
                                    </p>
                                    <ul class="list-disc list-inside mb-4">
                                        <li>
                                            <strong>On-Site-Integration:</strong> Bei dieser Integration handelt es sich
                                            um
                                            eine statische Unterseite auf refuelos.com, die in der Corporate
                                            Identity
                                            (CI) des Kunden gestaltet wird. Der Kunde kann die hier dargestellten
                                            Informationen (Farben, Texte, Angaben zum Kunden, Angaben zu Produkten des
                                            Kunden, Titelbild, Logo) selbständig auf seinem Profil anpassen. Beispiel:
                                            refuelos.com/efuel-today
                                        </li>
                                        <li>
                                            <strong>API-Integration:</strong> Bei dieser Integration handelt es sich um
                                            eine
                                            externe Integrationsvariante, die durch die Bereitstellung von Quellcode in
                                            der
                                            Form von HTML, CSS und JavaScript Code auf der Website des Kunden
                                            eingebunden
                                            werden kann. Durch die Einbindung dieses Codes wird die API (Application
                                            Programming Interface) von refuelos.com angesprochen und ermöglicht die
                                            Darstellung von Suchergebnissen außerhalb von refuelos.com. Der Kunde
                                            kann
                                            dabei den bereitgestellten CSS- und HTML-Code nach eigenem Bedarf
                                            bearbeiten,
                                            wenn sichergestellt wird, dass die Anzeige der Suchergebnisse nicht
                                            irreführend
                                            dargestellt wird.
                                        </li>
                                    </ul>

                                    <h4 class="text-md font-semibold text-gray-900 mb-4">1.3 Inhaltliche Beschreibung
                                        der
                                        „On-Site“ Unterseite</h4>
                                    <p class="text-gray-700 mb-4">
                                        Die im Rahmen der „On-Site-Integration“ bereitgestellte Unterseite weist die
                                        folgenden Merkmale auf:
                                    </p>
                                    <ul class="list-disc list-inside mb-4">
                                        <li>Titelbild und Logo des Kunden</li>
                                        <li>einen Textbereich zur Darstellung der Kundeninformationen (z.B. Anschrift
                                            der
                                            Tankstelle, Kontakt, Firmenname, Ansprechpartner sowie optional
                                            Produktinformationen zum Angebot des Kunden)
                                        </li>
                                        <li>die Suchmaske der Freigaben-Suche, gefärbt in den durch den Kunden
                                            eingestellten
                                            Farben
                                        </li>
                                    </ul>

                                    <h4 class="text-md font-semibold text-gray-900 mb-4">1.4 Vorgesehene Nutzung der
                                        Suchfunktion und bereitgestellter Werbematerialien</h4>
                                    <p class="text-gray-700 mb-4">
                                        Durch Auswahl des Fahrzeugherstellers, der Modellreihe und des Modells kann der
                                        Benutzer die offizielle Herstellerfreigabe eines Fahrzeuges für die Kraftstoffe
                                        XTL
                                        (DIN EN 15940) oder B10 (DIN EN 16734) mit Hilfe der Anwendung anzeigen lassen.
                                    </p>
                                    <p class="text-gray-700 mb-4">
                                        Der Benutzer gelangt zur Suchmaske entweder online über eine Verlinkung,
                                        Werbematerial (Flyer oder Aufsteller) oder auch über einen QR-Code Aufkleber.
                                        Das
                                        Werbematerial und die Aufkleber können direkt über refuelos.com bezogen und
                                        am
                                        Point-of-Sale direkt an der Zapfsäule oder auch im Bereich des Tankstellenshops
                                        aufgeklebt bzw. ausgelegt oder aufgestellt werden. Für weitere Medien wie Audio-
                                        und
                                        Video-Medien gelten die individuell bereitgestellten Hinweise zur Nutzung.
                                    </p>

                                    <h4 class="text-md font-semibold text-gray-900 mb-4">1.5 Haftungsausschluss</h4>
                                    <p class="text-gray-700 mb-4">
                                        Sämtliche in den Suchergebnissen von refuelos.com angezeigte Freigaben
                                        stammen
                                        von externen Quellen wie beispielsweise den Websites der Fahrzeug-Hersteller,
                                        dem
                                        ADAC oder der Deutsche Automobil Treuhand GmbH („DAT“) und stehen unter dem
                                        Vorbehalt der Änderung durch diese.
                                    </p>
                                    <p class="text-gray-700 mb-4">
                                        Sie wurden durch den Provider und die Suchmaschine refuelos.com lediglich
                                        zusammengetragen und zum Zwecke der Auffindbarkeit und Definition von
                                        Suchkriterien
                                        (wie z.B. Fahrzeug-Hersteller und Fahrzeug-Modell) aufbereitet.
                                    </p>
                                    <p class="text-gray-700 mb-4">
                                        Für die Aktualität, Richtigkeit und Vollständigkeit ist allein der jeweilige
                                        Fahrzeughersteller bzw. -importeur verantwortlich. Ebenso für die Informationen
                                        zur
                                        Beschaffenheit, Eignung und Verträglichkeit der Kraftstoffe für die
                                        aufgelisteten
                                        Fahrzeuge.
                                    </p>
                                    <p class="text-gray-700 mb-4">
                                        Alle Angaben erfolgen ohne Gewähr durch den Provider. Prüfen Sie hinsichtlich
                                        Beschaffenheit, Eignung und Verträglichkeit der Kraftstoffe vor dem erstmaligen
                                        Betanken mit einem der aufgeführten Kraftstoffe (XTL oder B10) immer die
                                        Betriebsanleitung Ihres Kraftfahrzeugs und/oder wenden Sie sich an den
                                        Hersteller
                                        bzw. Importeur. Ausschließlich Fahrzeughersteller erteilen rechtlich
                                        verbindliche
                                        Freigabeerklärungen hinsichtlich der Verträglichkeit von Kraftstoffen (XTL oder
                                        B10).
                                    </p>

                                    <h4 id="disclaimer" class="text-md font-semibold text-gray-900 mb-4">1.6 Disclaimer für das
                                        Suchformular</h4>
                                    <p class="text-gray-700 mb-4">
                                        Der Kunde verpflichtet sich, bei der Nutzung eines Abo-Modells (z.B.
                                        API-Integration) den durch den Provider bereitgestellten, im Nachfolgenden
                                        kursiv
                                        dargestellten Disclaimer zu nutzen. Der Disclaimer ist im Regelfall als
                                        Pop-Up-Meldung über dem Suchformular der Freigaben anzuzeigen und setzt bei der
                                        Bestätigung einen Cookie, woraufhin die Freigabe-Suche ausgeführt werden kann.
                                    </p>
                                    <p class="italic text-gray-700 mb-4">
                                        „Sämtliche in den Suchergebnissen von refuelos.com angezeigte Freigaben
                                        stammen
                                        von externen Quellen und stehen unter dem Vorbehalt der Änderung durch die
                                        Urheber.
                                        refuelos.com übernimmt keine Gewähr und/oder Garantie für die Richtigkeit
                                        der
                                        Angaben. refuelos.com haftet nicht für mögliche Schäden, die aus der
                                        Berücksichtigung einer angegebenen Freigabe bei der Kraftstoffbetankung
                                        entstehen.
                                        Der Kunde wird darauf hingewiesen, dass er verpflichtet ist, hinsichtlich
                                        Beschaffenheit, Eignung und Verträglichkeit der Kraftstoffe vor dem erstmaligen
                                        Betanken mit einem der aufgeführten Kraftstoffe (XTL oder B10) die
                                        Betriebsanleitung
                                        seines Kraftfahrzeugs zu Rate zu ziehen und/oder sich an den Hersteller bzw.
                                        Importeur zu wenden. Ich habe die Hinweise zum Haftungsausschluss gelesen und
                                        akzeptiert.“
                                    </p>

                                    <h4 class="text-md font-semibold text-gray-900 mb-4">1.7 Datenherkunft (Quellen) und
                                        Aktualität der Daten</h4>
                                    <p class="text-gray-700 mb-4">
                                        Der Provider dokumentiert die Quellenangaben der Herstellerfreigaben unter dem
                                        folgenden Link: <a class="text-indigo-700 " href="{{route('sourcesList')}}">refuelos.com/sources/</a>
                                    </p>

                                    <p class="text-gray-700 mb-4">
                                        Da die Hersteller eine abweichende Struktur in der Datenherkunft angeben, stellt
                                        der
                                        Provider diese Struktur als Grundlage der Suchfunktion bereit.
                                    </p>
                                    <p class="text-gray-700 mb-4">
                                        In der jeweiligen Quellen-Liste (Source) findet sich das konkrete Datum der
                                        Veröffentlichung der Freigabe, ein Verweis zur Quelle sowie ein Zeitstempel des
                                        letzten Besuchs durch unsere Suchmaschine (Letztes Crawl Datum).
                                    </p>
                                </div>


                                <div class="pt-8">

                                    <h3  id="abo-modelle" class="text-lg font-bold text-gray-900 mb-4 pt-10">Anhang 2: Abo-Modelle</h3>
                                    <p class="text-gray-700 mb-4">Übersicht über die Entgelte und Laufzeiten der
                                        verschiedenen Abo-Modell auf refuelos.com</p>


                                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                            <div
                                                class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                                                <table
                                                       class="min-w-full divide-y divide-gray-300">
                                                    <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col"
                                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">

                                                        </th>
                                                        <th scope="col"
                                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                            Variante 1<br> "On Site Integration"
                                                        </th>
                                                        <th scope="col"
                                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                            Variante 2<br> "On Site + API Integration"
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="divide-y divide-gray-200 bg-white">
                                                    <tr>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                            Integrationsvariante
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            Unterseite mit eigener CI (z.B. refuelos.com/efuel-today)
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            Wie bei On Site + API-Lösung zur Einbettung der
                                                            Freigabe-Suche auf Ihrer eigenen Website
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                            Layout & Marketing
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            Mit Logo, Bild und Text auf Unterseite von
                                                            refuelos.com<br>(Upload im Kundenprofil)
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            Wie Variante 1+ individuell anpassbare CI auf eigener
                                                            Website<br>Gestaltung direkt im Kundenbackend
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                            Basiskosten / Monat
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            99,00 € (zzgl. ges. Ust.)
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            199,00 € (zzgl. ges. Ust.)
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                            Variable Kosten / Monat
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            Keine bis 10.000 Suchanfragen / Monat<br>
                                                            Ab 10.001: 10,00 € pro 1000 zusätzliche Suchanfragen pro
                                                            Monat
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            Bis zu 1.000 API-Aufrufe pro Monat inklusive.<br>
                                                            0,05 Euro pro zusätzlichem API-Aufruf für 1.001 bis 10.000
                                                            Aufrufe.<br>
                                                            0,03 Euro pro Aufruf für 10.001 - 25.000 Aufrufe<br>
                                                            Ab 25.001 Aufrufe 0,02 Euro<br>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                            Einmalige Kosten
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            290,00 € für erstmaliges Setup,<br> fällig bei
                                                            Vertragsschluss
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            290,00 € für erstmaliges Setup,<br> fällig bei
                                                            Vertragsschluss
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                            Laufzeit
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            12 Monate
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            12 Monate
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                            Kündigung
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            1 Monat zum Ende der Laufzeit
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            1 Monat zum Ende der Laufzeit
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                            Reporting
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            Im Backend einsehbar
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            Im Backend einsehbar
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                            Individuell XTL Sticker für Zapfsäulen
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            Separat im Backend bestellbar
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            Separat im Backend bestellbar
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                            Bezahlung
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            Zahlung via SEPA-Lastschriftmandat
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            Zahlung via SEPA-Lastschriftmandat
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <p class="text-gray-700 mb-4 mt-4">Stand: 20.05.2024</p>
                        </div>


                    </div>

                </div>


            </div>
    </main>

@endsection
