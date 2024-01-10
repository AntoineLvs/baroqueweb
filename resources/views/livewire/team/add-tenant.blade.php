<div>
  @if(!session()->has('tenant_id'))

    <form wire:submit.prevent="submit">
        <div class="grid grid-cols-6 gap-6">
            <x-text-input
                wire:model="name"
                label="Name"
                placeholder="Name"
                class="col-span-6 sm:col-span-3"/>



            @if(session()->has('success'))
                {{session('success')}}
            @endif
        </div>

        <div class="mt-8 border-t border-gray-200 pt-5">
            <div class="flex justify-end">
                <div wire:loading wire:target="submit">
                    <x-loading class="mr-4" />
                </div>
                <span class="inline-flex rounded-md shadow-sm">
                    <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        Add Tenant
                    </button>
                </span>
            </div>
        </div>
    </form>
@else
<div class="mt-8  pt-5">
    <div >
      You are not allowed to add Tenants.

    </div>
</div>

@endif
</div>
