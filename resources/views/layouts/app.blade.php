@extends('layouts.base')

@section('body')
    <div class="h-screen flex overflow-hidden bg-gray-100">

        @auth
            @livewire('sidebar.app-sidebar')
        @endauth


            <!-- Menu button old position  -->



            <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <!-- MAIN -->
            <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">

                @if(session()->has('impersonate'))
                    <div class="relative bg-indigo-600">
                        <div class="max-w-screen-xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                            <div class="pr-16 sm:text-center sm:px-16">
                                <p class="font-medium text-white">
                            <span class="md:hidden">
                                You are impersonating {{auth()->user()->name}}
                            </span>
                                    <span class="hidden md:inline">
                                You are impersonating {{auth()->user()->name}}
                            </span>
                                    <span class="block sm:ml-2 sm:inline-block">
                                <a href="{{route('leave-impersonation')}}" class="text-white font-bold underline">
                                    Leave Impersonation &rarr;
                                </a>
                            </span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endif



                <!-- START Right side content container -->
                    <div class="pt-2 pb-4">
                        <div class="px-4 sm:px-2">
                            <h1 class="text-2xl font-semibold text-gray-900">@yield('title')</h1>
                        </div>
                        <div class="px-4 sm:px-2">
                            @yield('content')
                        </div>
                    </div>
                <!-- END Right side content container -->

            </main>
            <!-- END MAIN -->
        </div>
    </div>
@endsection
