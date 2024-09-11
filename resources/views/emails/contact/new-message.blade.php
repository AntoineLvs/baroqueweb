@component('mail::message')
# Information

Wir haben eine neue Nachricht.

- **Vorname:** {{ $input['first_name'] }}
- **Nachname:** {{ $input['last_name'] }}
- **Firma:** {{ $input['company'] }}
- **E-Mail:** {{ $input['email'] }}
- **Nachricht:** {{ $input['message'] }}

@component('mail::button', ['url' => 'refuelos.com/login'])
Einloggen
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
