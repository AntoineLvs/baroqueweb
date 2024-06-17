@extends('layouts.app', ['page' => 'api-dashboard', 'pageSlug' => 'dashboard', 'section' => 'main'])
@section('content')

<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
    <div class="py-10">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold text-gray-900">API Token Manager</h1>
        </div>
        <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="py-4">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
                    <div class="px-4 py-5 sm:p-6">
                        <!-- Content goes here -->

                        <div>
                            <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent
            text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <!-- CONTENT -->
        <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">

            <div class="py-4">

                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">


                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="card-title">Token Request</h3>
                        <!-- We use less vertical padding on card headers on desktop than on body sections -->
                    </div>
                    @livewire('api.token-request-table', [
                    'users' => $users,
                    ])

                </div>

            </div>



            <div class="py-4">

                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">


                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="card-title">Active API Tokens</h3>
                        <!-- We use less vertical padding on card headers on desktop than on body sections -->
                    </div>
                    <div class="px-4 py-5 sm:p-6">


                        @livewire('api.active-token-table', [
                        'api_tokens' => $api_tokens,
                        ])

                    </div>

                </div>

            </div>





        </div>
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
