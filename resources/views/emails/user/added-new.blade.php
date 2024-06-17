@component('mail::message')
# Herzlich Willkommen!

Willkommen bei XTL-Freigaben.de!

In nur wenigen Schritten ist Ihre Freigabe-Suche individuell eingerichtet und einsatzbereit für die Integration auf Ihrer Website!

1. <strong>Passwort festlegen und Registrierung abschließen</strong>
2. Unternehmensinformationen angeben
3. Lizenz auswählen
4. Freigabe Suchformular designen
5. Freigabe Suche integrieren

@component('mail::button', ['url' => route('password.request')])
Passwort festlegen
@endcomponent

PS: Ihr Benutzername lautet: <strong>{{ $user->email }}</strong>

Ihre gewählte Lizenz:
> <strong>{{ $user->apiToken()->tokenType->name}}</strong><br>
> {{ $user->apiToken()->tokenType->monthly_cost}} € / Monat via SEPA Lastschrift<br>
> {{ $user->apiToken()->tokenType->contract_duration}} Tage Laufzeit


Ihr Team von<br>
{{ config('app.name') }}

Fragen oder Anmerkungen?
Schreiben Sie eine Mail an info@xtl-freigaben.de

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
