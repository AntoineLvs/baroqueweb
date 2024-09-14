@extends('layouts.app')

@section('body')


<div>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-gray-50">
        <div>



            @if ($location->photo_header)
            <img class="h-64 w-full sm:rounded-lg object-cover object-center lg:h-80" src="{{ $location->photoHeaderUrl($location) }}" alt="">

            @else
            <img class="h-64 w-full sm:rounded-lg object-cover object-center lg:h-80" src="{{ asset('assets/img/windpower1.jpg') }}" alt="">

            @endif

        </div>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">


            <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                <div class="flex">

                    @if($location->photo)
                    <img style="background: lightgrey;" class="h-24 w-24 rounded-full ring-4 ring-blue sm:h-32 sm:w-32" src="{{ $location->photoUrl($location) }}" alt="">


                    @else
                    <img style="background: lightgrey;" class="h-24 w-24 rounded-full ring-4 ring-blue sm:h-32 sm:w-32" src="{{ asset('assets/img/ros.png') }}" alt="">

                    @endif


                </div>
                <div class="mt-6 flex items-center space-x-2">
                    <h1 class="text-2xl font-bold text-gray-900 truncate">
                        {{ $location->name }}
                    </h1>
                    <div class="image-container">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 mt-1" fill="{{ $location->isOpen() ? 'rgb(0, 160, 0)' : 'red' }}">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5h-3.25V5z" clip-rule="evenodd" />
                            </svg>
                            <span class="tooltip text-gray-500">{{ substr($location->opening_start, 0, 5) }} / {{ substr($location->opening_end, 0, 5) }}</span>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>




    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">

        <x-message-component></x-message-component>


    </div>
    @livewire('locations.profile-location', [
    'location' => $location,
    'services' => $services,
    'products' => $products,
    'location_id' => $location->id,
    ])

</div>
@endsection