@extends('layouts.app')
@section('content')


<div class="flex-1 relative z-0 overflow-y-auto focus:outline-none">

  <div class="py-10">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
      <h1 class="text-2xl font-bold text-gray-900">Team Manager</h1>
    </div>

    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
      <div class="py-4">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
          <div class="px-4 py-5 sm:px-6">
            <h3 class="card-title">Hier kannst du Mitarbeiter zu deinem Team hinzufügen. Team-Mitglieder können Artikel, Bestellungen und Anfragen verwalten, aber keine Benutzer erstellen.</h3>
          </div>
          <div class="px-4 py-5 sm:p-6">
            <!-- Content goes here -->


            <span>
              <a href="{{route('users.create')}}"
              class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
              Team-Member erstellen
            </a>
          </span>



        </div>
      </div>
    </div>
  </div>

  <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">

    <div class="py-4">
      <!-- This example requires Tailwind CSS v2.0+ -->
      <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">

        <div class="px-4 py-5 sm:px-6">
          <h3 class="card-title">Team Overview</h3>
        </div>
        <div class="px-4 py-5 sm:p-6">
          <div class="py-4">
            <livewire:team.show-users/>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
