<div>
    <form wire:submit.prevent="submit">
        @csrf
       

        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
                <label for="contact" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Description
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="description" id="description" name="description" type="text" class="block p-2 font-medium w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1
                   focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    </div>
                </div>

                @error('description')
                <div class="text-sm text-red-500 mt-2">{{ $message }}
                </div>
                @enderror
            </div>
        </div>


        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
                <label for="contact" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Creditor Informations
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="creditor_informations" id="creditor_informations" name="creditor_informations" type="text" class="block p-2 font-medium w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1
                   focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    </div>
                </div>

                @error('creditor_informations')
                <div class="text-sm text-red-500 mt-2">{{ $message }}
                </div>
                @enderror
            </div>
        </div>


        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
                <label for="contact" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Mandate Reference
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="mandate_reference" id="mandate_reference" name="mandate_reference" type="text" class="block p-2 font-medium w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1
                   focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    </div>
                </div>

                @error('mandate_reference')
                <div class="text-sm text-red-500 mt-2">{{ $message }}
                </div>
                @enderror
            </div>
        </div>


        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
                <label for="contact" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Mandate Type
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="mandate_type" id="mandate_type" name="mandate_type" type="text" class="block p-2 font-medium w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1
                   focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    </div>
                </div>

                @error('mandate_type')
                <div class="text-sm text-red-500 mt-2">{{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
                <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Payer Name
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">

                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="payer_name" id="payer_name" name="payer_name" type="text" class="block p-2 font-medium w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1
                   focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    </div>
                </div>

                @error('payer_name')
                <div class="text-sm text-red-500 mt-2">{{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
                <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Payer Address
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">

                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="payer_address" id="payer_address" name="payer_address" type="text" class="block p-2 font-medium w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1
                   focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    </div>
                </div>

                @error('payer_address')
                <div class="text-sm text-red-500 mt-2">{{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
                <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Payer Iban
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">

                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="payer_iban" id="payer_iban" name="payer_iban" type="text" class="block p-2 font-medium w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1
                   focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    </div>
                </div>

                @error('payer_iban')
                <div class="text-sm text-red-500 mt-2">{{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
                <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Payer Bic
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">

                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="payer_bic" id="payer_bic" name="payer_bic" type="text" class="block p-2 font-medium w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1
                   focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    </div>
                </div>

                @error('payer_bic')
                <div class="text-sm text-red-500 mt-2">{{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
                <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Payer Bank
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">

                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="payer_bank" id="payer_bank" name="payer_bank" type="text" class="block p-2 font-medium w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1
                   focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    </div>
                </div>

                @error('payer_bank')
                <div class="text-sm text-red-500 mt-2">{{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
                <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Payment Type
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">

                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="payment_type" id="payment_type" name="payment_type" type="text" class="block p-2 font-medium w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1
                   focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    </div>
                </div>

                @error('payment_type')
                <div class="text-sm text-red-500 mt-2">{{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="mt-8 border-t border-gray-200 pt-5">
            <div class="pt-5">
                <div class="flex justify-end">
                    <a href="{{ route('sepa-mandates.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Speichern
                    </button>
                </div>
            </div>
        </div>

    </form>
</div>