@component('mail::message')
# Introduction

Welcome at efuel hub

@component('mail::button', ['url' => ''])
Button Text
@endcomponent




Thanks,<br>
{{ config('app.name') }}
@endcomponent
