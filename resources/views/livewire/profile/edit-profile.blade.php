<div class="py-10">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold text-gray-900">Profil</h1>
    </div>

    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
        <x-message-component></x-message-component>


        <div class="py-4">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                    <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                        <div class="ml-4 mt-2">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Bearbeiten Sie Ihre Profil-Details.
                            </h3>
                        </div>
                        <div class="ml-4 mt-2 flex-shrink-0">
                            <a href="{{ route('dashboard') }}"
                               class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Zurück</a>
                        </div>
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
                    <h3 class="card-title">Profil</h3>

                </div>
                <div class="px-4 py-5 sm:p-6">

                    <form wire:submit.prevent="updateProfileInformation" role="form">

                        @csrf
                        @method('put')

                        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">

                            <div>
                                <div>
                                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                        Ihre Profil-Details
                                    </p>
                                </div>

                                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">


                                    <div
                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="state.name"
                                               class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                            Benutzername
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <input wire:model="state.name" id="state.name" name="name" type="text"
                                                       class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                                                       placeholder="Name"
                                                       value="{{ old('name', auth()->user()->name) }}">

                                            </div>
                                        </div>
                                    </div>


                                    <div
                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="username"
                                               class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                            E-Mail
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <input wire:model="state.email" id="state.email" name="state.email"
                                                       type="email" autocomplete="email"
                                                       class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                                                       placeholder="E-Mail"
                                                       value="{{ old('email', auth()->user()->email) }}">
                                            </div>
                                        </div>
                                    </div>


                                    @if (auth()->user()->Tenant)
                                        <div
                                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="tenant_name"
                                                   class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                Firmenname
                                            </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                    <input disabled id="tenant_name" name="tenant_name" type="text"
                                                           class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-gray-500 sm:text-sm border-gray-300 rounded-md"
                                                           value="{{ old('tenant_id', auth()->user()->Tenant->name) }}">
                                                </div>
                                            </div>
                                        </div>

                                    @endif


                                </div>


                                <div class="pt-5">
                                    <div class="flex justify-end">
                                        <button type="button"
                                                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Abbrechen
                                        </button>
                                        <button type="submit"
                                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Speichern
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>




        </div>

    </div>

</div>
