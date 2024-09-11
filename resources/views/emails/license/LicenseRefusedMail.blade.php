@component('mail::message')
<h2>Hallo {{ $user->name }},</h2>
<p>leider wurde Ihre angefragte Lizenz abgelehnt. Bei Fragen wenden Sie sich an mail@refuelos.com</p>

@component('mail::button', ['url' => route('contact')])
Support kontaktieren
@endcomponent
</p>


Sie haben Fragen zu unserem Angebot?<br>
Dann kontaktieren Sie uns gerne per E-Mail unter mail@refuelos.com</br>

Mit freundlichen Grüßen<br>

Ihr Team von refuelos.com



<div class="content-footer">
<hr style="margin-top: 20px;">
<h4>Impressum</h4>
refuelos.com<br>
Ein Angebot der Elsen Media GmbH<br>
Großes Feld 7, 25421 Pinneberg<br>
www.elsenmedia.com<br>
Ust-ID: DE338867353<br>
T +49 40 743 973 25<br>
mail@refuelos.com<br>
</div>

@endcomponent
