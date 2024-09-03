@extends('layouts.app', ['page' => 'Import data', 'pageSlug' => 'import-data', 'section' => 'main'])
@section('content')



<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">


    <div class="py-10">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">

            <h1 class="text-2xl font-bold text-gray-900">Locations importieren</h1>


            <x-message-component></x-message-component>



        </div>

        <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="py-4">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                        <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                            <div class="ml-4 mt-2">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Importiere eine LocationListe im CSV Format.
                                </h3>
                            </div>
                            <div class="ml-4 mt-2 flex-shrink-0">
                                <a href="{{ route('locations.index') }}" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Zurück</a>

                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <!-- Content goes here -->
                        Die Liste muss als Export aus dem CRM konzipiert sein und die
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
                        <h3 class="card-title">Details der Veranstaltung</h3>
                        <!-- We use less vertical padding on card headers on desktop than on body sections -->
                    </div>

                    <div class="px-4 py-5 sm:p-6">
                        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                            <div>
                                <div class="container">
                                    <h3>CSV oder EXCEL File wählen</h3>
                                    <form action="{{ route('locations.import') }}" method="POST" name="importform" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group pt-8 pb-8">
                                            <label for="file">File:</label>
                                            <input id="file" type="file" name="file" class="form-control">
                                        </div>

                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Import starten
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function closeAlert(event) {
            let element = event.target;
            while (element.nodeName !== "BUTTON") {
                element = element.parentNode;
            }
            element.parentNode.parentNode.removeChild(element.parentNode);
        }
    </script>
</main>

@endsection