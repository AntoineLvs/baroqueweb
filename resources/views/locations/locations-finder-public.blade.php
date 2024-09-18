@extends('layouts.app')

@section('body')

<div class="bg-white">
    <style>
        body {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }
    </style>

    <x-navigation />

    <main>
        @livewire('locations.locations-finder-public')
    </main>
</div>

@endsection