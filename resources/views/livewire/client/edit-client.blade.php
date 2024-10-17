<div class="px-4 py-5 sm:p-6">
    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
        <div>

            <form wire:submit.prevent="submit">
                @csrf


                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        General Informations
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Provide some general informations about your client.
                    </p>
                </div>

                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Client Name
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input wire:model.live="name" id="name" name="name" type="text" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Add more informations (max. 120 chars)
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input wire:model.live="description" id="description" name="description" type="text" maxlength="120" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Client Type (*)
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <select wire:model.live="client_type_id" name="client_type_id" id="client_type_id" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>
                                    <option value="">-- Please choose --</option>
                                    @foreach ($client_types as $client_type)
                                    @if($client_type['id'] == old('document'))
                                    <option wire:key="{{ $client_type['id']}}" value="{{$client_type->id }}" selected>{{$client_type['name']}}</option>
                                    @else
                                    <option wire:key="{{ $client_type['id']}}" value="{{$client_type->id }}">{{$client_type['name']}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Status (*)
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <select wire:model.live="status" name="status" id="status" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>
                                    <option value="" selected>-- Please choose --</option>
                                    <option wire:key="1" value="1">Discussion</option>
                                    <option wire:key="2" value="2">Maquette</option>
                                    <option wire:key="3" value="3">Developpement</option>
                                    <option wire:key="4" value="4">Test</option>
                                    <option wire:key="5" value="5">Approuvé</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mt-8 border-t border-gray-200 pt-5">
                    <div class="pt-5">
                        <div class="flex justify-end">
                            <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Cancel
                            </button>
                            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
                </div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </form>

        </div>
    </div>
</div>