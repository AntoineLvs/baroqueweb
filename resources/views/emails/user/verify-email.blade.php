@component('mail::message')
# Bestätigung der E-Mail-Adresse

Bitte klicken Sie auf die Schaltfläche unten, um Ihre E-Mail-Adresse zu bestätigen.

@component('mail::button', ['url' => $url])
E-Mail-Adresse bestätigen
@endcomponent

Wenn Sie kein Konto auf xtl-freigaben.de erstellt haben, sind keine weiteren Maßnahmen erforderlich.

Vielen Dank,
{{ config('app.name') }}
@endcomponent
