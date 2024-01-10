<div>
  <form wire:submit.prevent="submit">

    <div class="grid grid-cols-6 gap-6">

      <x-text-input
      wire:model="name"
      label="First Name"
      placeholder="First Name"
      class="col-span-6 sm:col-span-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"/>




      <x-text-input
      wire:model="email"
      type="email"
      label="Email"
      placeholder="example@hofhub.com"
      class="col-span-6 sm:col-span-3"/>

      <x-text-input
      wire:model="department"
      label="Department (optional)"
      placeholder="e.g. Sales, Marketing, Executive ..."
      class="col-span-6 sm:col-span-3"/>

      <div class="col-span-6 sm:col-span-3">
        <label for="status" class="block text-sm font-medium leading-5 text-gray-700">Status</label>
        <select wire:model="status"
        id="status"
        class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
      </select>
      @error('status')
      <div class="text-sm text-red-500 mt-2">
        {{ $message }}
      </div>
      @enderror
    </div>


    @if($super)

    <div class="col-span-6 sm:col-span-3">
      <x-select
      label="Select Tenant"
      placeholder="Select one Tenant"
      wire:model.defer="tenant"
      >
      @foreach ($tenants as $tenant)
      <x-select.option  class="text-dark:hover" label="{{$tenant->name}}" value="{{$tenant->id}}" wire:key="{{$tenant->id}}" />
        @endforeach
      </x-select>
    </div>


    @endif


    @if(session()->has('success'))
    {{session('success')}}
    @endif

  </div>


  <div class="mt-8">




    <dl class="divide-y divide-gray-200">
      <div class="pt-6 pb-8 md:grid md:grid-cols-12 md:gap-8">
        <dt class="text-base font-small text-gray-900 md:col-span-2">
          What is "Status"?
        </dt>
        <dd class="mt-2 md:mt-0 md:col-span-7">
          <p class="text-base text-gray-500">
            A user with "Active" can work immediately in the application and create products,
            for example. A user with "Inactive" cannot change anything as long as his status is inactive.
            This makes sense, for example, if an employee leaves the company but someone still keeps the data created.
          </p>
        </dd>
      </div>
      <div class="pt-6 pb-8 md:grid md:grid-cols-12 md:gap-8">
        <dt class="text-base font-small text-gray-900 md:col-span-2">
          What is "User Role"?
        </dt>
        <dd class="mt-2 md:mt-0 md:col-span-7">
          <p class="text-base text-gray-500">
            <ul class="list-disc text-base text-gray-500 pl-6">
              <li><b>Admin:</b> Is able to create, edit and delete users and all assets</li>
              <li><b>Manager:</b> Is able to create, edit and delete all assets</li>
              <li><b>Team Member:</b> Is able to edit specific assets assigned by managers or admins</li>
            </ul>
          </p>
        </dd>
      </div>

      <!-- More questions... -->
    </dl>
  </div>





  <div class="mt-8 border-t border-gray-200 pt-5">
    <div class="flex justify-end">

      <span class="inline-flex rounded-md shadow-sm">
        <button type="submit"
        class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
        Add Team Member
      </button>
    </span>
  </div>
</div>
</form>

</div>
