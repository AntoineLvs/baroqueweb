@component('mail::message')
# Info

Neue Benachrichtigung:

{{ $input }},

@component('mail::button', ['url' => 'xtl-freigaben.de/login'])
Einloggen
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
