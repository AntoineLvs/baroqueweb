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
                                Datenschutzerklärung</h1>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container mx-auto px-4 py-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-4">Datenschutzerklärung</h1>

                <div class="text-left text-gray-700 text-sm space-y-2">
                    <h2 class="text-xl font-bold text-gray-900 mb-4"></h2>

                        <p class="text-gray-700 mb-4">Herzlich Willkommen auf den Internetseiten von refuelos.com.</p>
                        <p class="text-gray-700 mb-4">Der Verantwortliche im Sinne der Datenschutz-Grundverordnung und
                            anderer nationaler Datenschutzgesetze der Mitgliedsstaaten sowie sonstiger
                            datenschutzrechtlicher Bestimmungen ist:</p>
                        <p class="text-gray-700 font-bold mb-4">Elsen Media GmbH<br>
                            Sitz der Gesellschaft: Pinneberg<br>
                            Registergericht: Amtsgericht Pinneberg<br>
                            Handelsregister: HRB 15591 PI<br>
                            Geschäftsführer: Mario Elsen</p>
                        <p class="text-gray-700 mb-4">Kontakt: <a href="mailto:privacy@elsenmedia.com"
                                                                  class="text-blue-600 hover:underline">privacy@elsenmedia.com</a>
                        </p>
                        <p class="text-gray-700 mb-4">Allgemeine Anfragen rund um den Inhalt und das Angebot dieser
                            Webseite können auch über unser <a href="https://elsenmedia.com/kontakt/"
                                                               class="text-blue-600 hover:underline">Kontaktformular</a>
                            versendet werden.</p>

                        <h3 class="text-lg font-bold text-gray-900 mt-6 mb-2">1. Umfang der Verarbeitung
                            personenbezogener Daten</h3>
                        <p class="text-gray-700 mb-4">Wir erheben und verwenden personenbezogene Daten unserer Nutzer
                            grundsätzlich nur, soweit dies zur Bereitstellung einer funktionsfähigen Website
                            erforderlich und durch gesetzliche Vorschriften gestattet ist oder Sie uns die Erhebung und
                            Verwendung gestatten.</p>

                        <h3 class="text-lg font-bold text-gray-900 mt-6 mb-2">2. Rechtsgrundlage für die Verarbeitung
                            personenbezogener Daten</h3>
                        <p class="text-gray-700 mb-4">Soweit wir für Verarbeitungsvorgänge personenbezogener Daten eine
                            Einwilligung der betroffenen Person einholen, dient Art. 6 Abs. 1 lit. a
                            EU-Datenschutzgrundverordnung (DSGVO) als Rechtsgrundlage für die Verarbeitung der
                            personenbezogenen Daten.</p>
                        <p class="text-gray-700 mb-4">Zur Wahrung unserer berechtigten Interessen kann im Rahmen von
                            Interessenabwägungen eine Datenverarbeitung zur Sicherstellung der Funktionsfähigkeit
                            unserer Website erfolgen. Hierfür dient Art. 6 Abs. 1 lit. f DSGVO als Rechtsgrundlage.</p>

                        <h3 class="text-lg font-bold text-gray-900 mt-6 mb-2">3. Datenlöschung und Speicherdauer</h3>
                        <p class="text-gray-700 mb-4">Die personenbezogenen Daten der betroffenen Person werden
                            gelöscht, sobald der Zweck der Speicherung entfällt. Eine Speicherung kann darüber hinaus
                            dann erfolgen, wenn dies durch den europäischen oder nationalen Gesetzgeber in
                            unionsrechtlichen Verordnungen, Gesetzen oder sonstigen Vorschriften, denen der
                            Verantwortliche unterliegt, vorgesehen wurde. Eine Löschung der Daten erfolgt auch dann,
                            wenn eine durch die genannten Normen vorgeschriebene Speicherfrist abläuft, es sei denn,
                            dass eine Erforderlichkeit zur weiteren Speicherung der Daten für einen Vertragsabschluss
                            oder eine Vertragserfüllung besteht.</p>

                        <h3 class="text-lg font-bold text-gray-900 mt-6 mb-2">4. Datenerhebung und Datenverwendung
                            personenbezogener Daten der Website</h3>
                        <h3 class="text-lg font-bold text-gray-900 mt-4 mb-2">4.1 Logfiles</h3>
                        <p class="text-gray-700 mb-4">Wenn Sie unsere Website besuchen, verzeichnet unser Web-Server zum
                            Zwecke der Systemsicherheit temporär folgende Daten in sogenannten Server-Logfiles:</p>
                        <ul class="list-disc list-inside mb-4">
                            <li>den Domain-Namen oder die IP-Adresse des anfragenden Rechners (Client)</li>
                            <li>die Uhrzeit und das Datum des Zugriffs</li>
                            <li>die aufgerufene URL bzw. Ressource</li>
                            <li>den HTTP Status-Code</li>
                            <li>die Homepage, von der aus Sie uns besuchen</li>
                            <li>die Namen angeforderter Dateien</li>
                            <li>die übertragene Datenmenge</li>
                            <li>den Browsertyp und die Browserversion</li>
                            <li>das verwendete Betriebssystem (auch bei mobilen Endgeräten wie Smartphones)</li>
                        </ul>
                        <p class="text-gray-700 mb-4">Die Speicherung in Logfiles erfolgt, um die Funktionsfähigkeit der
                            Website sicherzustellen. Zudem dienen uns die Daten zur Optimierung der Website und zur
                            Sicherstellung der Sicherheit unserer informationstechnischen Systeme. Eine Auswertung der
                            Daten zu Marketingzwecken findet in diesem Zusammenhang nicht statt.</p>
                        <p class="text-gray-700 mb-4">In diesen Zwecken liegt auch unser berechtigtes Interesse an der
                            Datenverarbeitung gemäß Art. 6 Abs. 1 lit. f DSGVO.</p>
                        <p class="text-gray-700 mb-4">Die Daten werden anonymisiert, sobald sie für die Erreichung des
                            Zweckes ihrer Erhebung nicht mehr erforderlich sind. Dies ist spätestens nach sieben Tagen
                            der Fall. Die Log-Files werden anschließend automatisch anonymisiert. Im Falle einer
                            Anonymisierung wird die jeweilige IP- Adresse gekürzt, sodass eine Zuordnung des aufrufenden
                            Clients nicht mehr möglich ist.</p>
                        <p class="text-gray-700 mb-4">Die Erfassung der Daten zur Bereitstellung der Website und die
                            Speicherung der Daten in Logfiles ist für den Betrieb der Internetseite zwingend
                            erforderlich. Es besteht folglich seitens des Nutzers keine Widerspruchsmöglichkeit.</p>
                        <h3 class="text-lg font-bold text-gray-900 mt-6 mb-2">4.2 E-Mail Kontakt</h3>
                        <p class="text-gray-700 mb-4">Sie können mit uns über die bereitgestellte E-Mail—Adresse Kontakt
                            aufnehmen. In diesem Fall werden die mit der E-Mail übermittelten personenbezogenen Daten
                            des Nutzers gespeichert. Rechtsgrundlage für die Verarbeitung der Daten, die im Zuge einer
                            Übersendung einer E-Mail übermittelt werden, ist Art. 6 Abs. 1 lit. f DSGVO. Zielt der
                            E-Mail-Kontakt auf den Abschluss eines Vertrages ab, so ist zusätzliche Rechtsgrundlage für
                            die Verarbeitung Art. 6 Abs. 1 lit. b DSGVO. Im Falle einer Kontaktaufnahme per E-Mail liegt
                            hieran auch das erforderliche berechtigte Interesse an der Verarbeitung der Daten.</p>
                        <p class="text-gray-700 mb-4">Rechtsgrundlage für die Verarbeitung der Daten bei Vorliegen einer
                            Einwilligung des Nutzers ist Art. 6 Abs. 1 lit. a DSGVO.</p>
                        <p class="text-gray-700 mb-4">Die Daten werden gelöscht, sobald sie für die Erreichung des
                            Zweckes ihrer Erhebung nicht mehr erforderlich sind. Für die personenbezogenen Daten, die
                            uns per E-Mail übersandt wurden, ist dies dann der Fall, wenn die jeweilige Konversation mit
                            dem Nutzer beendet ist. Beendet ist die Konversation dann, wenn sich aus den Umständen
                            entnehmen lässt, dass der betroffene Sachverhalt abschließend geklärt ist.</p>
                        <p class="text-gray-700 mb-4">Der Nutzer hat jederzeit die Möglichkeit, seine Einwilligung zur
                            Verarbeitung der personenbezogenen Daten zu widerrufen. Nimmt der Nutzer per E-Mail Kontakt
                            mit uns auf, so kann er der Speicherung seiner personenbezogenen Daten jederzeit
                            widersprechen. In einem solchen Fall kann die Konversation nicht fortgeführt werden.</p>
                        <p class="text-gray-700 mb-4">Ein Widerruf der Einwilligung ist jederzeit durch Mitteilung in
                            Textform an uns möglich, z.B. über eine entsprechende E-Mail an <a
                                href="mailto:privacy@elsenmedia.com" class="text-blue-600 hover:underline">privacy@elsenmedia.com</a>.
                            Alle personenbezogenen Daten, die im Zuge der Kontaktaufnahme gespeichert wurden, werden in
                            diesem Fall gelöscht. Die Kommunikation kann dann nicht mehr fortgeführt werden.</p>
                        <h3 class="text-lg font-bold text-gray-900 mt-6 mb-2">4.3 Mitgliedschaft/Registrierung</h3>
                        <p class="text-gray-700 mb-4">Auf unserer Internetseite bieten wir Nutzern die Möglichkeit, sich
                            unter Angabe personenbezogener Daten als Mitglied zu registrieren. Die Daten werden dabei in
                            eine Eingabemaske eingegeben, an uns übermittelt und gespeichert. Eine Weitergabe der Daten
                            an Dritte findet nicht statt. Folgende Daten werden im Rahmen des Registrierungsprozesses
                            erhoben:</p>
                        <ul class="list-disc list-inside mb-4">
                            <li>Name und Vorname</li>
                            <li>Firma oder Website</li>
                            <li>Adresse bzw. Rechnungsadresse</li>
                            <li>Postleitzahl</li>
                            <li>Ort</li>
                            <li>Land</li>
                            <li>Telefon</li>
                            <li>E-Mail-Adresse</li>
                            <li>Zugangsdaten</li>
                        </ul>
                        <p class="text-gray-700 mb-4">Zum Zeitpunkt der Registrierung werden zudem folgende Daten
                            gespeichert:</p>
                        <ul class="list-disc list-inside mb-4">
                            <li>die IP-Adresse des Nutzers</li>
                            <li>Datum und Uhrzeit der Registrierung</li>
                        </ul>
                        <p class="text-gray-700 mb-4">Im Rahmen des Registrierungsprozesses wird eine Einwilligung des
                            Nutzers zur Verarbeitung dieser Daten eingeholt.</p>
                        <p class="text-gray-700 mb-4">Die Registrierung dient der Erfüllung eines Mitgliedsvertrags,
                            dessen Vertragspartei der Nutzer ist. Die Rechtsgrundlage für die Verarbeitung der Daten ist
                            Art. 6 Abs. 1 lit. b DSGVO.</p>
                        <p class="text-gray-700 mb-4">Die Daten werden gelöscht, sobald sie für die Erreichung des
                            Zweckes ihrer Erhebung nicht mehr erforderlich sind. Dies ist für die während des
                            Registrierungsvorgangs zur Erfüllung eines Mitgliedsvertrags erhobenen Daten dann der Fall,
                            wenn die Daten für die Durchführung des Vertrags nicht mehr erforderlich sind.</p>
                        <p class="text-gray-700 mb-4">Soweit die Daten zur Erfüllung eines Vertrages oder zur
                            Durchführung vorvertraglicher Maßnahmen erforderlich sind, ist eine vorzeitige Löschung der
                            Daten nur möglich, soweit nicht vertragliche oder gesetzliche Verpflichtungen einer Löschung
                            entgegenstehen.</p>
                        <p class="text-gray-700 mb-4">Auch nach Abschluss des Vertrags besteht die Erforderlichkeit,
                            personenbezogene Daten des Vertragspartners zu speichern, um vertraglichen und gesetzlichen
                            Verpflichtungen nachzukommen. Die Speicherung der personenbezogenen Daten erfolgt während
                            der gesamten Vertragslaufzeit.</p>
                        <p class="text-gray-700 mb-4">Weiterhin sind wir aus steuerlichen Gründen zur Aufbewahrung der
                            Vertragsunterlagen für 10 Jahre verpflichtet. Die gesetzliche Grundlage zur Speicherung
                            ergibt sich aus §257 HGB, §147 AO sowie §14 UStG. Als Nutzer haben sie jederzeit die
                            Möglichkeit, die über Sie gespeicherten Daten abzuändern. Hierfür genügt eine E-Mail an <a
                                href="mailto:privacy@elsenmedia.com" class="text-blue-600 hover:underline">privacy@elsenmedia.com</a>.
                        </p>
                        <h3 class="text-lg font-bold text-gray-900 mt-6 mb-2">4.4 Cookies</h3>
                        <p class="text-gray-700 mb-4">Diese Webseite verwendet so genannte „Cookies“. Cookies sind
                            kleine Textdateien, die von einem Webserver auf Ihre Festplatte übertragen werden. Hierdurch
                            erhalten wir automatisch bestimmte Daten technischer Natur, wie z. B. die zugeteilte
                            IP-Adresse des zugreifenden Rechners oder Endgeräts, die verwendete Browser-Variante und
                            Browser-Version, das vom Rechner oder Endgerät genutzte Betriebssystem, den
                            Zugriffszeitpunkt zur Webseite (Datum und Uhrzeit) sowie Informationen über den zum Aufbau
                            der Webseitenverbindung genutzten Internet-Service- Provider.</p>
                        <p class="text-gray-700 mb-4">Cookies können nicht verwendet werden, um Programme zu starten
                            oder Schadsoftware wie Viren und Trojaner auf einen Computer zu übertragen. Anhand der in
                            Cookies enthaltenen Informationen können wir Ihnen die Navigation auf unserer Webseite
                            erleichtern und die korrekte Anzeige und Funktion unserer Webseiten ermöglichen. In keinem
                            Fall werden die von uns erfassten Daten an Dritte weitergegeben oder ohne Ihre Einwilligung
                            eine Verknüpfung mit personenbezogenen Daten hergestellt.</p>
                        <p class="text-gray-700 mb-4">Im Allgemeinen können Sie die Verwendung von Cookies jederzeit
                            über die jeweilige Einstellungen Ihres Browsers deaktivieren. Bitte verwenden Sie die
                            Hilfefunktionen Ihres Internetbrowsers, um zu erfahren, wie Sie diese Einstellungen ändern
                            können. Bitte beachten Sie, dass einzelne Funktionen unserer Website möglicherweise nicht
                            funktionieren, wenn Sie die Verwendung von Cookies deaktiviert haben.</p>
                        <p class="text-gray-700 mb-4"><b>Welche Cookies werden durch unsere Webseite gesetzt und welche
                                Funktion erfüllen die Cookies?</b></p>
                        <ul class="list-disc list-inside mb-4">
                            <li>cookie_consent: Speichert die Einwilligung über die Zustimmung zur Speicherung von Cookies.
                            </li>
                            <li>disclaimer_accepted: Speichert die Einwilligung über die Zustimmung zum Disclaimer.
                            </li>
                            <li>XSRF-TOKEN: Sicherheits-Cookie, das die Verschlüsselung von Formularen sicherstellt.
                            </li>

                            <li>_pk-id: Wird durch das Tool Piwik-/Matomo gesetzt (siehe 4.5)</li>
                            <li>_pk_ses: Wird durch das Tool Piwik-/Matomo gesetzt (siehe 4.5)</li>

                        </ul>
                        <p class="text-gray-700 mb-4">Cookies, die über internes Analyse-Tool eva.elsenmedia.com gesetzt
                            werden (hier ist das Piwik/Matomo Tracking Tool gehostet, mehr dazu in Abschnitt 4.5)</p>
                        <ul class="list-disc list-inside mb-4">
                            <li>piwik_ignore: Falls der Nutzer das Tracking durch unser Analyse Tool im Punkt 4.5 dieser
                                Datenschutzerklärung deaktiviert, wird dieser Cookie gesetzt und das Tracking
                                deaktiviert.
                            </li>
                            <li>PIWIK_SESSID: Dient zur Identifikation einer Sitzung mit unserer Webseite und
                                verhindert, dass die Statistiken durch ein mehrfaches Zählen des selben Besuchers
                                verfälscht wird.
                            </li>
                        </ul>
                        <p class="text-gray-700 mb-4">Des Weiteren kann es bei der Benutzung bestimmter
                            Webseiten-Funktionalitäten (z.B. im Benutzeraccount) dazu kommen, dass zusätzliche technisch
                            notwendige Cookies gesetzt werden. Allgemein können alle gesetzten Cookies nach einem
                            erfolgten Besuch unserer Webseite durch den Benutzer manuell gelöscht werden, indem die
                            Funktion „Browserverlauf löschen“ oder „Verlauf löschen“ des genutzten Internet-Browsers
                            ausgeführt wird.</p>
                        <h3 class="text-lg font-bold text-gray-900 mt-6 mb-2">4.5 Tracking-Tool Piwik/Matomo auf unserem
                            Webserver</h3>
                        <p class="text-gray-700 mb-4">Wir setzen auf unserer Webseite das auf unserem Webserver
                            installierte Tracking-Tool Piwik (auch bekannt als „Matomo“) ein, das zur Auswertung des
                            Besucherverhaltens auf der Webseite dient. Damit können wir das Angebot unserer Webseite
                            verbessern und die Funktionalität bestimmter Webseiten-Inhalte überwachen. Die Auswertung
                            der Daten erfolgt anonymisiert und pseudonymisiert. Die Speicherung der Daten erfolgt in
                            verschlüsselter Form lokal auf unserem eigenen Webserver in Deutschland und läuft nicht über
                            Drittanbieter oder externe Dienste. Es erfolgt keine Datenweitergabe an Dritte oder in das
                            Ausland.</p>
                        <p class="text-gray-700 mb-4"><b>Anonymisierung und Pseudonymisierung in der Datenerfassung</b>
                        </p>
                        <ul class="list-disc list-inside mb-4">
                            <li><b>Anonymisierung der IP-Adresse:</b> Die erfasste IP-Adresse eines Nutzers wird
                                automatisch um die letzten 6 Ziffern (bzw. 2 Bytes) maskiert und damit bereits im
                                Erfassungsvorgang anonymisiert (ein Beispiel: 192.168.xxx.xxx). Diese Maßnahme erwirkt,
                                dass die IP-Adresse im Anschluss nicht mehr genau einem Nutzer zugeordnet werden kann.
                            </li>
                            <li><b>Pseudonymisierung von Benutzer-IDs:</b> Auftretende Benutzer-IDs, die einen
                                Rückschluss auf personenbezogene Daten zulassen könnten, werden automatisch durch das
                                System pseudonymisiert. Dazu wird die Benutzer-ID durch eine sog. „Hash-Funktion“
                                verschlüsselt und lediglich in verschlüsselter Form gespeichert.
                            </li>
                            <li><b>Anonymisierung von Bestellnummern:</b> Löst ein Benutzer im Rahmen seines Besuchs
                                eine Bestellung aus, wird eine automatische Anonymisierung von Bestellnummern
                                vorgenommen. Damit sind keine Rückschlüsse mehr auf personenbezogene Daten möglich, die
                                durch eine Zuordnung von Bestellnummern denkbar wären.
                            </li>
                            <li><b>Do-not-Track Einstellung:</b> Das von uns eingesetzte Tool unterstützt die
                                browserseitige „Do-not-Track-Einstellung“. Hat ein Nutzer diese Funktion in seinem
                                Webbrowser aktiviert, wird das Matomo-Tool den Besucher nicht erfassen.
                            </li>
                        </ul>
                        <p class="text-gray-700 mb-4"><strong>Widerspruch gegen Datenerfassung durch
                                Opt-Out-Cookie</strong></p>
                        <p class="text-gray-700 mb-4">Sie können sich hier entscheiden, ob in Ihrem Browser ein
                            eindeutiger Webanalyse-Cookie abgelegt werden darf, um dem Betreiber der Website die
                            Erfassung und Analyse verschiedener statistischer Daten zu ermöglichen. Wenn Sie sich
                            dagegen entscheiden möchten, klicken Sie den folgenden Link, um den
                            Matomo-Deaktivierungs-Cookie in Ihrem Browser abzulegen.</p>
                        <iframe style="border: 0; height: 400px; width: 800px;"
                                src="https://eva.elsenmedia.com/index.php?module=CoreAdminHome&amp;action=optOut&amp;language=de&amp;backgroundColor=&amp;fontColor=#fffff;fontSize=&amp;fontFamily=">
                            <span data-mce-type="bookmark"
                                  style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;"
                                  class="mce_SELRES_start">﻿</span></iframe>
                        <p class="text-gray-700 mb-4">Durch Matomo wird der folgende Cookie beim Aufruf unserer
                            Webseiten gesetzt:</p>
                        <ul class="list-disc list-inside mb-4">
                            <li>Deaktiviert ein Nutzer das Tracking über die Opt-Out Möglichkeit, setzt das System
                                zusätzlich den folgenden Cookie: piwik_ignore
                            </li>
                        </ul>
                        <p class="text-gray-700 mb-4">Durch eine Löschung/Leeren des Browserverlaufs durch den Nutzer
                            werden alle zuvor gespeicherten Cookies gelöscht. Das betrifft auch den Widerspruch gegen
                            die Datenerfassung auf unserer Website. Der Nutzer muss dann erneut den Opt-Out-Cookie
                            aktivieren, um das Tracking zu unterbinden.</p>
                        <h3 class="text-lg font-bold text-gray-900 mt-6 mb-2">5. Rechte der betroffenen Person</h3>
                        <p class="text-gray-700 mb-4">Werden personenbezogene Daten von Ihnen verarbeitet, sind Sie
                            Betroffener im Sinne der DSGVO und es stehen Ihnen folgende Rechte uns gegenüber zu:</p>
                        <p class="text-gray-700 mb-4">Sie haben das Recht, gemäß Art. 15 DSGVO <strong>Auskunft</strong>
                            über Ihre von uns verarbeiteten personenbezogenen Daten zu verlangen. Insbesondere können
                            Sie Auskunft über die Verarbeitungszwecke, die Kategorie der personenbezogenen Daten, die
                            verarbeitet werden, die Empfänger oder die Kategorien von Empfängern, gegenüber denen Ihre
                            Daten offengelegt wurden oder werden, die geplante Speicherdauer oder die Kriterien, die
                            über die Speicherdauer bestimmen, das Bestehen eines Rechts auf Berichtigung, Löschung,
                            Einschränkung der Verarbeitung oder Widerspruch, das Bestehen eines Beschwerderechts, die
                            Herkunft ihrer Daten, sofern diese nicht bei uns erhoben wurden, sowie über das Bestehen
                            einer automatisierten Entscheidungsfindung einschließlich Profiling und ggf.
                            aussagekräftigen Informationen zu deren Einzelheiten verlangen;</p>
                        <p class="text-gray-700 mb-4">gemäß Art. 16 DSGVO unverzüglich die <strong>Berichtigung</strong>
                            unrichtiger oder Vervollständigung Ihrer bei uns gespeicherten personenbezogenen Daten zu
                            verlangen;</p>
                        <p class="text-gray-700 mb-4">gemäß Art. 17 DSGVO die <strong>Löschung</strong> Ihrer bei uns
                            gespeicherten personenbezogenen Daten zu verlangen, soweit nicht die Verarbeitung zur
                            Ausübung des Rechts auf freie Meinungsäußerung und Information, zur Erfüllung einer
                            rechtlichen Verpflichtung, aus Gründen des öffentlichen Interesses oder zur Geltendmachung
                            oder Ausübung von Rechtsansprüchen erforderlich ist;</p>
                        <p class="text-gray-700 mb-4">gemäß Art. 18 DSGVO die <strong>Einschränkung der
                                Verarbeitung</strong> Ihrer personenbezogenen Daten zu verlangen, soweit die Richtigkeit
                            der Daten von Ihnen bestritten wird, die Verarbeitung unrechtmäßig ist, Sie aber deren
                            Löschung ablehnen und wir die Daten nicht mehr benötigen, Sie jedoch diese zur
                            Geltendmachung, Ausübung oder Verteidigung von Rechtsansprüchen benötigen oder Sie gemäß
                            Art. 21 DSGVO Widerspruch gegen die Verarbeitung eingelegt haben;</p>
                        <p class="text-gray-700 mb-4">gemäß Art. 20 DSGVO Ihre personenbezogenen Daten, die Sie uns
                            bereitgestellt haben, in einem strukturierten, gängigen und maschinenlesebaren Format zu
                            erhalten oder die <strong>Übermittlung</strong> an einen anderen Verantwortlichen zu
                            verlangen;</p>
                        <p class="text-gray-700 mb-4">gemäß Art. 7 Abs. 3 DSGVO Ihre einmal erteilte <strong>Einwilligung</strong>
                            jederzeit uns gegenüber zu widerrufen. Dies hat zur Folge, dass wir die Datenverarbeitung,
                            die auf dieser Einwilligung beruhte, für die Zukunft nicht mehr fortführen dürfen;</p>
                        <p class="text-gray-700 mb-4">gemäß Art. 77 DSGVO sich bei einer <strong>Aufsichtsbehörde zu
                                beschweren</strong>. In der Regel können Sie sich hierfür an die Aufsichtsbehörde Ihres
                            üblichen Aufenthaltsortes oder Arbeitsplatzes oder unseres Sitzes wenden;</p>
                        <p class="text-gray-700 mb-4">gemäß Art. 21 DSGVO <strong>Widerspruch</strong> gegen die
                            Verarbeitung Ihrer personenbezogenen Daten einzulegen, soweit dafür Gründe vorliegen, die
                            sich aus Ihrer besonderen Situation ergeben oder sich der Widerspruch gegen Direktwerbung
                            richtet. Im letzteren Fall haben Sie ein generelles Widerspruchsrecht, das ohne Angabe einer
                            besonderen Situation von uns umgesetzt wird. Möchten Sie von Ihrem Widerrufs- oder
                            Widerspruchsrecht Gebrauch machen, genügt eine E-Mail an <a
                                href="mailto:privacy@elsenmedia.com" class="text-blue-600 hover:underline">privacy@elsenmedia.com</a>.
                        </p>
                        <h3 class="text-lg font-bold text-gray-900 mt-6 mb-2">6. SSL-Verschlüsselung</h3>
                        <p class="text-gray-700 mb-4">Um die Sicherheit bei der Übertragung Ihrer Daten zwischen Ihrem
                            verwendeten Webbrowser und unserem Webserver zu schützen, verwenden wir nach dem aktuellen
                            Stand der Technik entsprechende Verschlüsselungsverfahren (z. B. SSL) über HTTPS.</p>
                        <p class="text-gray-700 mb-4">Bei diesem Verfahren wird bei einer Verbindung zwischen Webserver
                            und Webbrowser ein Verschlüsselung eingeleitet, die den verschlüsselten Transfer der in
                            einer Webseiten-Sitzung eingegebenen Daten zischen dem Internet-Browser des
                            Webseitenbenutzers und dem Webserver des Webseitenbetreibers ermöglicht. Für die auf dieser
                            Webseite verwendeten Kontaktformulare nutzen wir eine Verschlüsselung über StartTLS / SMTPS,
                            die einen verschlüsselten Versand von Anfragen über das Kontaktformular ermöglicht.</p>
                        <h3 class="text-lg font-bold text-gray-900 mt-6 mb-2">7. Änderung unserer
                            Datenschutzbestimmungen</h3>
                        <p class="text-gray-700 mb-4">Wir behalten uns vor, diese Datenschutzerklärung anzupassen, damit
                            sie stets den aktuellen rechtlichen Anforderungen entspricht oder um Änderungen unserer
                            Leistungen in der Datenschutzerklärung umzusetzen, z.B. bei der Einführung neuer Inhalte,
                            Dienste und Webseitenangebote. Für Ihren erneuten Besuch gilt dann die neue, jeweils unter
                            dieser URL zugängliche Datenschutzerklärung.</p>
                        <h3 class="text-lg font-bold text-gray-900 mt-6 mb-2">8. Sonstige Fragen zum Datenschutz</h3>
                        <p class="text-gray-700 mb-4">Für jegliche Anfragen und Informationen zum Datenschutz auf
                            unserer Webseite und der nachgelagerten Verarbeitung von Daten kann jederzeit unsere
                            Kontaktadresse <a href="mailto:privacy@elsenmedia.com"
                                              class="text-blue-600 hover:underline">privacy@elsenmedia.com</a> genutzt
                            werden.</p>
                    </div>


                </div>
            </div>


        </main>

    </div>

@endsection

@section('footer')
    <x-footer/>
@endsection
