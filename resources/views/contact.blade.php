@extends('layouts.app')

@section('body')

    <div class="bg-white">

        <x-navigation/>

        <main>

            <!-- Hero section -->
            <div class="relative isolate overflow-hidden bg-gray-900 pb-16 pt-5 sm:pb-10">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl py-32 sm:py-8 lg:py-24">
                        <div class="text-center">
                            <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Kontakt</h1>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container mx-auto px-4 py-8">

                <div class="text-left text-gray-700 text-sm space-y-2">

                   <livewire:contact-form>
                </div>


            </div>


        </main>

    </div>

@endsection

@section('footer')
    <x-footer/>
@endsection
