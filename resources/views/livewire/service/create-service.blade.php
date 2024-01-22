<div>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-gray-200 sm:pt-1">
                    <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Base Service
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <select wire:model="base_service_id" name="base_service_id" id="base_service_id" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>
                                <option value="">-- Please choose --</option>
                                @foreach ($base_services as $base_service)
                                @if($base_service['id'] == old('document'))
                                <option wire:key="{{ $base_service['id']}}" value="{{$base_service->id }}" selected>{{$base_service['name']}}</option>
                                @else
                                <option wire:key="{{ $base_service['id']}}" value="{{$base_service->id }}">{{$base_service['name']}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    @error('base_service')
                    <div class="text-sm text-red-500 mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
                    <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Service Name
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input wire:model="name" id="name" name="name" type="text" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    @error('name')
                    <div class="text-sm text-red-500 mt-2">{{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
                    <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Service Description
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input wire:model="description" id="description" name="description" type="text" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    @error('description')
                    <div class="text-sm text-red-500 mt-2">{{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mt-8 border-t border-gray-200 pt-5">
                <div class="pt-5">
                    <div class="flex justify-end">
                        <a href="{{ route('services.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>
                        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Create
                        </button>
                    </div>
                </div>
            </div>

    </form>
</div>