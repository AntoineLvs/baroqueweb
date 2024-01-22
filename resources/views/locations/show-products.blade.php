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
                <div class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                    <div class="sm:hidden md:block mt-6 min-w-0 flex-1">
                        <h1 class="text-2xl font-bold text-gray-900 truncate">

                            {{ $location->name}}

                        </h1>
                        <h2 class="text-gray-500">
                            Products Informations
                        </h2>

                    </div>
                    <div class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">

                    </div>


                </div>
            </div>
        </div>
    </div>




    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">

        @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif


        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    </div>
    @livewire('locations.show-products', [
        'location' => $location,
        'products' => $products,
        'location_id' => $location->id, 
        ])

</div>
@endsection