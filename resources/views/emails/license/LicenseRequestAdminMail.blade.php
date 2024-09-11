@component('mail::message')
<h2>Hallo Admin!</h2>
<p>Wir haben eine neue Lizenz Anfrage.

<p>
<strong>Benutzer:</strong>  {{ $user->name }}<br>
<strong>Email:</strong>  {{ $user->email }}<br>
<strong>Tenant:</strong>  {{ $user->Tenant->name }}<br>
</p>

<p>
<strong>SEPA Mandat</strong> <br>
<strong>Name:</strong> {{ $sepamandate->payer_name }} <br>
<strong>Bank:</strong> {{ $sepamandate->payer_bank }} <br>
<strong>IBAN:</strong> {{ $sepamandate->payer_iban }} <br>
<strong>BIC:</strong> {{ $sepamandate->payer_bic }} <br>
<strong>Zahlungsweise:</strong> {{ $sepamandate->payment_type }} <br>
</p>
<br>

<p>
<strong>Lizenz Details</strong> <br>
<strong>Variante:</strong> {{ $tokenType->name }} <br>
<strong>Beschreibung:</strong> {{ $tokenType->description }} <br>
<strong>Marketing:</strong> {{ $tokenType->marketing }} <br>
<strong>Monatliche Kosten: </strong>{{ $tokenType->monthly_cost }} <br>
<strong>API Kosten:</strong> {{ $tokenType->api_call_cost }} <br>
<strong>SETUP Kosten:</strong> {{ $tokenType->setup_cost }} <br>
<strong>Vertragslaufzeit:</strong> {{ $tokenType->contract_duration }} days <br>
</p>

<p>
@component('mail::button', ['url' => route('api.api-dashboard')])
Lizenz freigeben
@endcomponent
</p>

Sie haben Fragen zu unserem Angebot?<br>
Dann kontaktieren Sie uns gerne per E-Mail unter mail@refuelos.com</br>

Mit freundlichen Grüßen<br>

Ihr Team von refuelos.com

<div class="content-footer">
<hr style="margin-top: 20px;">
<h4>Impressum</h4>
refuelOS<br>
Ein Angebot der Elsen Media GmbH<br>
Großes Feld 7, 25421 Pinneberg<br>
www.elsenmedia.com<br>
Ust-ID: DE338867353<br>
T +49 40 743 973 25<br>
mail@refuelos.com<br>
</div>

@endcomponent
