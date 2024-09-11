@component('mail::message')
# Info

Neue Benachrichtigung:

{{ $input }},

@component('mail::button', ['url' => 'refuelos.com/login'])
Einloggen
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
