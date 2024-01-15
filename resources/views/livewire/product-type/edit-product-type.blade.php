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
            Provide some general informations about your product type.
          </p>
        </div>

        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
          <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              Name
            </label>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <input wire:model="name" id="name" name="name" type="text" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
              </div>
            </div>
          </div>
        </div>

        <div class="mt-8 border-t border-gray-200 pt-5">
          <div class="pt-5">
            <div class="flex justify-end">
              <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Abbrechen
              </button>
              <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Speichern
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