<div>
    <form wire:submit.prevent="submit">
        @csrf

        <div>
            <div class="px-4 sm:px-0">
                <h3 class="text-base font-semibold leading-7 text-gray-900">API Token Informations</h3>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal details and application.</p>
            </div>
            <div class="mt-6 border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                    <div class="px-6 py-8 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">User</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            <select wire:model="user_id" name="user_id" id="user_id" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>
                                @foreach ($users as $user)
                                @if($user['id'] == old('document'))
                                <option wire:key="{{ $user['id']}}" value="{{$user->id }}" selected>{{$user['name']}}-({{$user['id']}})</option>
                                @else
                                <option wire:key="{{ $user['id']}}" value="{{$user->id }}">{{$user['name']}}-({{$user['id']}})</option>
                                @endif
                                @endforeach
                            </select>
                        </dd>
                        @error('user_id')
                        <div class="text-sm text-red-500 mt-2">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Tenant</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            <select wire:model="tenant_id" name="tenant_id" id="tenant_id" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>
                                @foreach ($tenants as $tenant)
                                @if($tenant['id'] == old('document'))
                                <option wire:key="{{ $tenant['id']}}" value="{{$tenant->id }}" selected>{{$tenant['name']}}-({{$tenant['id']}})</option>
                                @else
                                <option wire:key="{{ $tenant['id']}}" value="{{$tenant->id }}">{{$tenant['name']}}-({{$tenant['id']}})</option>
                                @endif
                                @endforeach
                            </select>
                        </dd>
                        @error('tenant_id')
                        <div class="text-sm text-red-500 mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Token Type</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            <select wire:model="token_type_id" name="token_type_id" id="token_type_id" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>
                                @foreach ($token_types as $token_type)
                                @if($token_type['id'] == old('document'))
                                <option wire:key="{{ $token_type['id']}}" value="{{$token_type->id }}" selected>{{$token_type['name']}}</option>
                                @else
                                <option wire:key="{{ $token_type['id']}}" value="{{$token_type->id }}">{{$token_type['name']}}</option>
                                @endif
                                @endforeach
                            </select>
                        </dd>
                        @error('token_type_id')
                        <div class="text-sm text-red-500 mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900"> Api Calls Count</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><input wire:model="api_calls_count" id="api_calls_count" name="name" type="text" class="block p-2 font-medium w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1
                            focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        </dd>

                        @error('api_calls_count')
                        <div class="text-sm text-red-500 mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">API Token</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><input wire:model="token" id="token" name="name" type="text" class="block p-2 font-medium w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1
                   focus:ring-inset focus:ring-indigo-600 sm:max-w-lg sm:text-sm sm:leading-6">
                        </dd>
                        @error('token')
                        <div class="text-sm text-red-500 mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900"> Created At</dt>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="mt-2">
                                    <input type="date" wire:model="created_at" id="created_at" name="created_at" min="{{ $api_token->created_at->format('Y-m-d') }}" max="{{ now()->addYears(10)->format('Y-m-d') }}" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" />
                                </div>
                            </div>
                        </div>
                        </dd>
                        @error('created_at')
                        <div class="text-sm text-red-500 mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900"> Expires At</dt>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="mt-2">
                                    <input type="date" wire:model="expires_at" id="expires_at" name="expires_at" min="{{ $api_token->created_at->format('Y-m-d') }}" max="{{ now()->addYears(10)->format('Y-m-d') }}" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" />
                                </div>
                            </div>
                        </div>
                        </dd>
                        @error('expires_at')
                        <div class="text-sm text-red-500 mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </dl>
            </div>



        </div>

        <div class="mt-8 border-t border-gray-200 pt-5">
            <div class="pt-5">
                <div class="flex justify-end">
                    <a href="{{ route('api.api-dashboard') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Speichern
                    </button>
                </div>
            </div>
        </div>

    </form>
</div>