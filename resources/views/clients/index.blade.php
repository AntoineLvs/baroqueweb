@extends('layouts.app', ['page' => 'Client', 'pageSlug' => 'clients', 'section' => 'main'])
@section('content')

<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
    <div class="py-10">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold text-gray-900">Clients Page</h1>
        </div>




        @if(!session()->has('tenant_id'))



        <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="py-4">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="card-title">Fonctionnalities</h3>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <!-- Content goes here -->

                        <div>
                            <a href="{{ route('clients.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent
              text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create a Client</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <!-- api Token Types start -->
        <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="py-4">
                @livewire('client.index-client')
            </div>
        </div>
        <!-- ApiTokenTypes end -->



        @endif


    </div>
</main>

<script>
    function closeAlert(event) {
        let element = event.target;
        while (element.nodeName !== "BUTTON") {
            element = element.parentNode;
        }
        element.parentNode.parentNode.removeChild(element.parentNode);
    }
</script>

@endsection