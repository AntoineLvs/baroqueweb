@extends('layouts.app')

@section('body')


<div>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-gray-50">
        <div>



            @if ($tenant->photo_header)
            <img class="h-64 w-full sm:rounded-lg object-cover object-center lg:h-80" src="{{ $location->photoHeaderUrl($location) }}" alt="">

            @else
            <img class="h-64 w-full sm:rounded-lg object-cover object-center lg:h-80" src="{{ asset('assets/img/windpower1.jpg') }}" alt="">

            @endif

        </div>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">


            <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                <div class="flex">

                    @if($tenant->photo)
                    <img style="background: lightgrey;" class="h-24 w-24 rounded-full ring-4 ring-blue sm:h-32 sm:w-32" src="{{ $location->photoUrl($location) }}" alt="">


                    @else
                    <img style="background: lightgrey;" class="h-24 w-24 rounded-full ring-4 ring-blue sm:h-32 sm:w-32" src="{{ asset('assets/img/ros.png') }}" alt="">

                    @endif


                </div>
                <div class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                    <div class="sm:hidden md:block mt-6 min-w-0 flex-1">
                        <h1 class="text-2xl font-bold text-gray-900 truncate">

                            {{ $tenant->name}}

                        </h1>
                    </div>
                    <div class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">

                    </div>


                </div>
            </div>
        </div>
    </div>




    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">

        <x-message-component></x-message-component>


    </div>
    @livewire('locations.show-locations', [
    'locations' => $locations,
    'tenant' => $tenant,
    'services' => $services,
    'products' => $products,
    ])
    <!-- CONTENT -->
    <!-- This example requires Tailwind CSS v2.0+ -->
</div>

@endsection