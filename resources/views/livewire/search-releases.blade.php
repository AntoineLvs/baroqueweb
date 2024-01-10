<div>


    <form wire:submit.prevent="search" class="mx-auto mt-16 max-w-xl sm:mt-20">

        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">


            <div class="sm:col-span-2">
                <label for="manufacturer" class="block text-sm font-semibold leading-6 text-gray-900">Nach Fahrzeughersteller suchen</label>
                <div class="mt-2.5">

                    <x-select.styled wire:model="selectedManufacturer" :request="[
                    'url' => route('api.manufacturers'),
                    'method' => 'get',
                    'class' => '',
                    'params' => ['library' => 'TallStackUi'],

                 ]"
                                     select="label:name|value:id" />
                </div>
            </div>

            <div class="sm:col-span-2">
                <label for="engine" class="block text-sm font-semibold leading-6 text-gray-900">Nach Motor suchen</label>
                <div class="mt-2.5">

                    <x-select.styled wire:model="selectedEngine" :request="[
                    'url' => route('api.engines'),
                    'method' => 'get',
                    'class' => '',
                    'params' => ['library' => 'TallStackUi'],

                 ]" select="label:label|value:id" />
                </div>
            </div>


        </div>



        <!-- Search Button -->
        <div class="mt-10">
            <button type="submit"
                    class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Freigaben suchen
            </button>
        </div>
    </form>



    <!-- Display Results -->


    @if($releases)

    <div class="pt-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Content goes here -->


        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Freigabe Übersicht</h1>
                </div>

            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        Hersteller
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Motor
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Freigabe
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Info
                                    </th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">


                                    @foreach($releases as $release)

                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                {{ $release->engine->manufacturer->name }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $release->engine->name }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $release->standard->name }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $release->info }}
                                            </td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Download<span
                                                        class="sr-only"> XXXX </span></a>
                                            </td>
                                        </tr>


                                    @endforeach








                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

        @endif

</div>
