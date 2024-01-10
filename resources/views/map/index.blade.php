@extends('layouts.app', ['page' => 'Map', 'pageSlug' => 'map', 'section' => 'main'])
@section('content')




<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">

  <div class="py-10">


    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">

      <div class="py-4">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">


          <div class="">

            <livewire:map.location-map/>


            <!-- <livewire:map.store-map/> -->

          </div>
        </div>

      </div>
    </div>

    @endsection
