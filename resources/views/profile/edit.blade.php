@extends('layouts.app', ['page' => 'Firmenprofil', 'pageSlug' => 'profile', 'section' => 'main'])
@section('content')


<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">

  <livewire:profile.edit-profile />
    <livewire:profile.change-password />

</main>


@endsection
