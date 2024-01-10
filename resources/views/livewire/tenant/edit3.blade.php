<div>
  <!-- This example requires Tailwind CSS v2.0+ -->


  <form wire:submit.prevent="updateTenant" role="form">

    @if (auth()->user()->Tenant)

    @csrf
    @method('put')

    <div>
      <div>
        @if ($tenant_photo_header)
        <img class="h-64 w-full object-cover object-center lg:h-80" src="{{ $tenant_photo_header->temporaryUrl() }}" alt="">

        @elseif (auth()->user()->Tenant->photo_header)
        <img class="h-64 w-full object-cover object-center lg:h-80"   src="{{ auth()->user()->Tenant->photoHeaderUrl(auth()->user()->Tenant) }}" alt="">

        @else
        <img class="h-64 w-full object-cover object-center lg:h-80" src="{{ asset('assets/img/windpower1.jpg') }}" alt="">

        @endif

      </div>
      <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
          <div class="flex">

            @if ($tenant_photo)
            <img class="h-24 w-24 rounded-full ring-4 ring-blue sm:h-32 sm:w-32" src="{{ $tenant_photo->temporaryUrl() }}" alt="">

            @elseif (auth()->user()->Tenant->photo)

            <img class="h-24 w-24 rounded-full ring-4 ring-blue sm:h-32 sm:w-32"
            src="{{ auth()->user()->Tenant->photoUrl(auth()->user()->Tenant) }}" alt="">

            @else
            <img class="h-24 w-24 rounded-full ring-4 ring-blue sm:h-32 sm:w-32" src="{{ asset('assets/img/ros.png') }}" alt="">

            @endif

          </div>
          <div class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
            <div class="sm:hidden md:block mt-6 min-w-0 flex-1">
              <h1 class="text-2xl font-bold text-gray-900 truncate">

                @if (auth()->user()->Tenant)
                {{ auth()->user()->Tenant->name }}
                @else
                Tenant name
                @endif

              </h1>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="max-w-8xl mx-auto pt-4 px-4 sm:px-6 lg:px-8">
      <h1 class="text-2xl font-bold text-gray-900">Tenant Profile</h1>
    </div>

    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">

      @if (session()->has('message'))

      <!-- This example requires Tailwind CSS v2.0+ -->
      <div class="pt-5" x-data="{ open: true }" x-show="open" x-init="setTimeout(() => open = false, 3000)">
        <div class="rounded-md bg-green-50 p-4">
          <div class="flex">
            <div class="flex-shrink-0">
              <!-- Heroicon name: solid/check-circle -->
              <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
            </div>
            <div class="ml-3">
              <p class="text-sm font-medium text-green-800">
                {{ session('message') }}
              </p>
            </div>
            <div class="ml-auto pl-3">
              <div class="-mx-1.5 -my-1.5">
                <button @click="open = false" type="button" class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600" onclick="closeAlert(event)">
                  <span class="sr-only">Dismiss</span>
                  <!-- Heroicon name: solid/x -->
                  <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      @endif

      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif



<!-- Tabs -->
<div
    x-data="{
        selectedId: null,
        init() {
            // Set the first available tab on the page on page load.
            this.$nextTick(() => this.select(this.$id('tab', 1)))
        },
        select(id) {
            this.selectedId = id
        },
        isSelected(id) {
            return this.selectedId === id
        },
        whichChild(el, parent) {
            return Array.from(parent.children).indexOf(el) + 1
        }
    }"
    x-id="['tab']"
    class="mx-auto max-w-3xl pt-6"
>
    <!-- Tab List -->
    <ul
        x-ref="tablist"
        @keydown.right.prevent.stop="$focus.wrap().next()"
        @keydown.home.prevent.stop="$focus.first()"
        @keydown.page-up.prevent.stop="$focus.first()"
        @keydown.left.prevent.stop="$focus.wrap().prev()"
        @keydown.end.prevent.stop="$focus.last()"
        @keydown.page-down.prevent.stop="$focus.last()"
        role="tablist"
        class="-mb-px flex items-stretch"
    >
        <!-- Tab -->
        <li>
            <button
                :id="$id('tab', whichChild($el.parentElement, $refs.tablist))"
                @click="select($el.id)"
                @mousedown.prevent
                @focus="select($el.id)"
                type="button"
                :tabindex="isSelected($el.id) ? 0 : -1"
                :aria-selected="isSelected($el.id)"
                :class="isSelected($el.id) ? 'border-gray-200 bg-white' : 'border-transparent'"
                class="inline-flex rounded-t-md border-t border-l border-r px-5 py-2.5"
                role="tab"
            >Profil</button>
        </li>

        <li>
            <button
                :id="$id('tab', whichChild($el.parentElement, $refs.tablist))"
                @click="select($el.id)"
                @mousedown.prevent
                @focus="select($el.id)"
                type="button"
                :tabindex="isSelected($el.id) ? 0 : -1"
                :aria-selected="isSelected($el.id)"
                :class="isSelected($el.id) ? 'border-gray-200 bg-white' : 'border-transparent'"
                class="inline-flex rounded-t-md border-t border-l border-r px-5 py-2.5"
                role="tab"
            >Anschrift und Kontakt</button>
        </li>
    </ul>

    <!-- Panels -->
    <div role="tabpanels" class="rounded-b-md border border-gray-200 bg-white">
        <!-- Panel -->
        <section
            x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
            :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))"
            role="tabpanel"
            class="p-8"
        >
            <h2 class="text-xl font-bold">Profil-Informationen</h2>

            <div class="py-4">

              <!-- This example requires Tailwind CSS v2.0+ -->
              <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">


                <div class="px-4 py-5 sm:px-6">
                  <h3 class="card-title">Profil  </h3>


                  <!-- We use less vertical padding on card headers on desktop than on body sections -->
                </div>
                <div class="px-4 py-5 sm:p-6">


                  <!-- <form wire:submit.prevent="updateTenant" role="form"> -->


                  <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div>
                      <div>

                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                          Bearbeiten Sie Ihre Mandanteninformationen
                        </p>
                      </div>

                      <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">

                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                          <label for="tenant_status" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Account Status
                          </label>

                          <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="mt-1 sm:mt-0 sm:col-span-2">

                              @if (auth()->user()->Tenant && auth()->user()->Tenant->status == "0")

                              <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">
                                Nicht bestätigt
                              </span>
                              @elseif (auth()->user()->Tenant && auth()->user()->Tenant->status == "1")
                              <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-red-800">
                                verifiziert
                              </span>

                              @endif
                            </div>
                          </div>
                        </div>



                        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                          <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="tenant_type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                              Tenant Type
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                              <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <select wire:model="tenant_type" name="tenant_type" id="tenant_type" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>
                                  @foreach ($tenant_types as $tenant_type)
                                  @if($tenant_type['id'] == old('document'))
                                  <option value="{{$tenant_type['id']}}" selected>{{$tenant_type['name']}}</option>
                                  @else
                                  <option value="{{$tenant_type['id']}}">{{$tenant_type['name']}}</option>
                                  @endif
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>



                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                          <label for="tenant_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Company Name
                          </label>
                          <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                              <input wire:model="tenant_name" id="tenant_name" name="tenant_name" type="text" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                            </div>
                          </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                          <label for="tenant_photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Logo
                          </label>
                          <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="file" wire:model="tenant_photo">
                            @error('tenant_photo') <span class="error">{{ $message }}</span> @enderror
                          </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                          <label for="tenant_photo_header" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Titel-Bild
                          </label>
                          <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="file" wire:model="tenant_photo_header">
                            @error('tenant_photo_header') <span class="error">{{ $message }}</span> @enderror
                          </div>
                        </div>




                      </div>
                    </div>





                  </div>


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
              </div>
            </div>


        </section>

        <section
            x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
            :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))"
            role="tabpanel"
            class="p-8"
        >
            <h2 class="text-xl font-bold">Tab 2 Content</h2>

            <div class="py-4">

              <!-- This example requires Tailwind CSS v2.0+ -->
              <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">


                <div class="px-4 py-5 sm:px-6">
                  <h3 class="card-title">About  </h3>
                </div>
                <div class="px-4 py-5 sm:p-6">
                  <!-- <form wire:submit.prevent="updateTenant" role="form"> -->
                  <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div>
                      <div>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                          Bearbeiten Sie Ihre Mandanteninformationen
                        </p>
                      </div>
                    </div>



                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                      <label for="tenant_email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        E-Mail
                      </label>
                      <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                          <input wire:model="tenant_email" id="tenant_email" name="tenant_email" type="email" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        </div>
                      </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                      <label for="tenant_phone" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Telefon
                      </label>
                      <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                          <input wire:model="tenant_phone" id="tenant_phone" name="tenant_phone" type="text" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        </div>
                      </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                      <label for="tenant_website" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Website
                      </label>
                      <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                          <input wire:model="tenant_website" id="tenant_website" name="tenant_website" type="text" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        </div>
                      </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                      <label for="tenant_street" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Adresse (Straße)
                      </label>
                      <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                          <input wire:model="tenant_street" id="tenant_street" name="tenant_street" type="text" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        </div>
                      </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                      <label for="tenant_zip" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        PLZ
                      </label>
                      <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                          <input wire:model="tenant_zip" id="tenant_zip" name="tenant_zip" type="text" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        </div>
                      </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                      <label for="tenant_city" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Stadt
                      </label>
                      <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                          <input wire:model="tenant_city" id="tenant_city" name="tenant_city" type="text" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        </div>
                      </div>
                    </div>




                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="tenant_country" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                          Country
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                          <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <select wire:model="tenant_country" name="tenant_country" id="tentenant_countryant_type" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>

                              <option value="DE">DE</option>
                              <option value="AT">AT</option>
                              <option value="CH">CH</option>

                            </select>
                          </div>
                        </div>
                      </div>
                    </div>






                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                      <label for="tenant_description" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Unternehmensbeschreibung
                      </label>
                      <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                          <textarea wire:model="tenant_description" id="tenant_description" name="tenant_description" type="text" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>
                      </div>
                    </div>


                  </div>


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
              </div>
            </div>


        </section>
    </div>
</div>

<!-- Tabs Ende -->









    </div>

    @endif
  </form>
</div>
