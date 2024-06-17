@component('mail::message')
<h2>Hallo {{ $user->name }},</h2>
<p>ihre Lizenz für xtl-freigaben.de wurde freigeschaltet und ist nun nutzbar!</p>

<p>Nachfolgend finden Sie eine Zusammenfassung zu Ihrer beantragten Lizenz:</p>

<p>
<strong>Lizenz Details</strong> <br>
<strong>Variante:</strong> {{ $tokenType->name }} <br>
<strong>Beschreibung:</strong> {{ $tokenType->description }} <br>
<strong>Marketing:</strong> {{ $tokenType->marketing }} <br>
<strong>Monatliche Kosten: </strong>{{ $tokenType->monthly_cost }} € <br>
<strong>SETUP Kosten:</strong> {{ $tokenType->setup_cost }} € (einmalig) <br>
<strong>Vertragslaufzeit:</strong> {{ $tokenType->contract_duration }} Tage <br>
</p><br>

<p>
<strong>SEPA Mandat</strong> <br>
<strong>Name:</strong> {{ $sepamandate->payer_name }} <br>
<strong>Bank:</strong> {{ $sepamandate->payer_bank }} <br>
<strong>IBAN:</strong> {{ $sepamandate->payer_iban }} <br>
<strong>BIC:</strong> {{ $sepamandate->payer_bic }} <br>
<strong>Zahlungsweise:</strong> {{ $sepamandate->payment_type }} <br>
</p>
<br>

<p>Sie haben die <a href="{{route('license-legal-informations')}}">Nutzungsbedingungen</a> zur Kenntnis genommen und akzeptiert.</p>
<p>

<p>
@component('mail::button', ['url' => route('dashboard')])
Einrichtung starten
@endcomponent
</p>


Sie haben Fragen zu unserem Angebot?<br>
Dann kontaktieren Sie uns gerne per E-Mail unter info@xtl-freigaben.de</br>

Mit freundlichen Grüßen<br>

Ihr Team von XTL-Freigaben.de



<div class="content-footer">
<hr style="margin-top: 20px;">
<h4>Impressum</h4>
XTL-Freigaben.de<br>
Ein Angebot der Elsen Media GmbH<br>
Großes Feld 7, 25421 Pinneberg<br>
www.elsenmedia.com<br>
Ust-ID: DE338867353<br>
T +49 40 743 973 25<br>
info@xtl-freigaben.de<br>
</div>

@endcomponent
