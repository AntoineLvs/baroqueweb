@extends('layouts.app', ['page' => 'Hub', 'pageSlug' => 'hub/inquiry', 'section' => 'main'])
@section('content')


<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">

      <div class="py-1">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="overflow-hidden">


          <div class="px-4 py-5 sm:p-6">
            <div class="py-4">
              @livewire('hub.show-inquiry', ['inquiry' => $inquiry])


            </div>
          </div>
        </div>
      </div>

    @endsection
