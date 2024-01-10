@component('mail::message')
# Introduction

You have a new user:

{{ $input->name}}, {{ $input->tenant }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent




Thanks,<br>
{{ config('app.name') }}
@endcomponent
