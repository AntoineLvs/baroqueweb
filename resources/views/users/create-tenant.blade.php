@extends('layouts.app')

@section('title', 'Create Team Member')

@section('content')

<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
  <div class="py-10">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
      <h1 class="text-2xl font-bold text-gray-900">Create a new Tenant</h1>
    </div>

    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
      <div class="py-4">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
          <div class="px-4 py-5 sm:px-6">
            <h3 class="card-title">Please provide the following informations about the tenant</h3>
          </div>

          
          <div class="px-4 py-5 sm:p-6">
            <!-- Content goes here -->

            <livewire:team.add-tenant/>

          </div>
        </div>
      </div>
    </div>

@endsection
