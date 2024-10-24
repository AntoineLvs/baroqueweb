@component('mail::message')
<h2>Hallo {{ $user->name }},</h2>

Ihre Lizenz wurde gekündigt.
Die Lizenz läuft vertragsgemäß weiter bis zum {{ $api_token->expires_at }}.

Sie haben Fragen?
Dann kontaktieren Sie uns gerne per E-Mail unter mail@refuelos.com

Mit freundlichen Grüßen

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
