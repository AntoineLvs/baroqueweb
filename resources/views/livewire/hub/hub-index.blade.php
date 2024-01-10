<div>

  <!-- Main Container -->
  <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200 mb-4">

    <div class="px-4 py-5 sm:px-6">
      <h3 class="card-title">Configure your hub view</h3>
    </div>
    <div class="px-4 py-5 sm:p-6">

      <div class="py-4">




        <div class="grid grid-cols-6 mb-4 border-b pb-4 border-gray-200 ">


          <div class="col-span-6 pr-2  {{ $super == true ? 'sm:col-span-3' : 'sm:col-span-5'}}">
            <x-text-input wire:model="search" label="Search" placeholder="Search for E-Fuel Supplier..."/>
          </div>

          <div class="col-span-6 sm:col-span-1 pr-2">
            <label for="location" class="block text-sm leading-5 font-medium text-gray-700">Per Page</label>
            <select wire:model="perPage" id="perPage"
            class="mt-1 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
            <option>10</option>
            <option>15</option>
            <option>20</option>
          </select>
        </div>
      </div>



      <div x-data="{ active: 0 }" class="space-y-4">
        <div x-data="{
          id: 1,
          get expanded() {
            return this.active === this.id
          },
          set expanded(value) {
            this.active = value ? this.id : null
          },
        }" role="region" class="border border-black rounded-md shadow">
        <h2>
          <button
          x-on:click="expanded = !expanded"
          :aria-expanded="expanded"
          class="flex items-center justify-between w-full font-bold text-xl px-6 py-3"
          >
          <span class="text-sm font-medium text-gray-700">Hub Type</span>
          <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
          <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
        </button>
      </h2>

      <div x-show="expanded" x-collapse>
        <div class="pb-4 px-6">

          <div class="sm:col-span-2">

            @foreach ($dataHubTypes as $hubType)
            <div class="relative flex items-start mt-4 ">
              <div class="flex items-center h-5">
                <input wire:model="hubTypes.{{ $hubType }}"  type="checkbox" value="{{ $hubType }}" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" >
              </div>
              <div class="ml-3 text-sm">
                <label for="{{ $hubType }}" class="font-medium text-gray-700">

                  @if ($hubType == 0) Type 0
                  @elseif ($hubType == 1) Offers
                  @elseif ($hubType == 2) Projects
                  @elseif ($hubType == 3) Locations
                  @endif

                </label>
              </div>
            </div>
            @endforeach
          </div>

        </div>
      </div>
    </div>

    <div x-data="{
      id: 2,
      get expanded() {
        return this.active === this.id
      },
      set expanded(value) {
        this.active = value ? this.id : null
      },
    }" role="region" class="border border-black rounded-md shadow">
    <h2>
      <button
      x-on:click="expanded = !expanded"
      :aria-expanded="expanded"
      class="flex items-center justify-between w-full font-bold text-xl px-6 py-3"
      >
      <span class="text-sm font-medium text-gray-700">Offer Type</span>
      <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
      <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
    </button>
  </h2>

  <div x-show="expanded" x-collapse>
    <div class="pb-4 px-6">

      <div class="sm:col-span-2">

        @foreach ($dataOfferTypes as $offerType)
        <div class="relative flex items-start mt-4 ">
          <div class="flex items-center h-5">
            <input wire:model="offerTypes.{{ $offerType }}"  type="checkbox" value="{{ $offerType }}" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" >
          </div>
          <div class="ml-3 text-sm">
            <label for="{{ $offerType }}" class="font-medium text-gray-700">

              @if ($offerType == 0) Type 0
              @elseif ($offerType == 1) Type 1
              @elseif ($offerType == 2) Type 2
              @elseif ($offerType == 3) Type 3
              @endif

            </label>
          </div>
        </div>
        @endforeach
      </div>


    </div>
  </div>
</div>


<div x-data="{
  id: 3,
  get expanded() {
    return this.active === this.id
  },
  set expanded(value) {
    this.active = value ? this.id : null
  },
}" role="region" class="border border-black rounded-md shadow">
<h2>
  <button
  x-on:click="expanded = !expanded"
  :aria-expanded="expanded"
  class="flex items-center justify-between w-full font-bold text-xl px-6 py-3"
  >
  <span class="text-sm font-medium text-gray-700">Offer Status</span>
  <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
  <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
</button>
</h2>

<div x-show="expanded" x-collapse>
  <div class="pb-4 px-6">

    <div class="sm:col-span-2">

      @foreach ($dataOfferStates as $offerStatus)
      <div class="relative flex items-start mt-4 ">
        <div class="flex items-center h-5">
          <input wire:model="offerStates.{{ $offerStatus }}"  type="checkbox" value="{{ $offerStatus }}" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" >
        </div>
        <div class="ml-3 text-sm">
          <label for="{{ $offerStatus }}" class="font-medium text-gray-700">

            @if ($offerStatus == 1) Stauts 1
            @elseif ($offerStatus == 2) Staus 2
            @elseif ($offerStatus == 3) Status 3

            @endif

          </label>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</div>
</div>

</div>


</div>
</div>
</div>
<!-- Main end  -->



















<!-- Main Container -->
<div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">

  <div class="px-4 py-5 sm:px-6">
    <h3 class="card-title">Product Offers</h3>
  </div>
  <div class="px-4 py-5 sm:p-6">

    <div class="py-4">




      @if ($offers->count() != 0)
      <!-- Offer Section Start  -->
      <div class="flex flex-col">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">


          <div
          class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
          <table class="min-w-full">
            <thead>
              <tr>
                <x-th label="Offer" value="id" :canSort="true" :sortField="$sortField" :sortAsc="$sortAsc" />
                <x-th label="Offer Info" value="informations"  />
                <x-th label="Price" value="price"  />
                <x-th label="Offer Details" value="detail"  />
                <x-th label="Company" value="tenant" :canSort="true" :sortField="$sortField" :sortAsc="$sortAsc" />
                <x-th label="Status" value="offer_status"  />
                <x-th label="Valid until" value="date"  />
                <!-- <x-th label="Country" value="country"  /> -->
                <th class="px py-3 border-b border-gray-200 bg-gray-50">

                </th>

                <th class="px py-3 border-b border-gray-200 bg-gray-50">

                </th>



              </tr>
            </thead>
            <tbody class="bg-white">

              @foreach($offers as $offer)
              <tr wire:key="{{$offer->id}}">

                @foreach ($offer->products as $offered_product)
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10 mr-4">


                      
                      @livewire('components.image-render', ['product' => $offered_product->product])


                    </div>

                    <div>
                      <span
                      class="text-sm leading-5 font-medium text-gray-900">


                      <div class="flex-shrink-0 h-10 w-10 pt-2">

                        <span x-data="{ open: false }"
                        x-tooltip="Click for details!"
                        >
                        <!-- Trigger -->
                        <span x-on:click="open = true">
                          <button type="button" class="inline-flex items-center p-1 border border-transparent rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <!-- Heroicon name: solid/plus-sm -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                          </button>

                        </span>

                        <!-- Modal -->
                        <div
                        x-show="open"
                        style="display: none"
                        x-on:keydown.escape.prevent.stop="open = false"
                        role="dialog"
                        aria-modal="true"
                        x-id="['modal-title']"
                        :aria-labelledby="$id('modal-title')"
                        class="fixed inset-0 overflow-y-auto" >

                        <!-- Overlay -->
                        <div x-show="open" x-transition.opacity class="fixed bg-black bg-opacity-50"></div>

                        <!-- Panel -->
                        <div
                        x-show="open" x-transition
                        x-on:click="open = false"
                        class="relative min-h-screen flex items-center justify-center p-4" >

                        <!-- Panel Outter -->
                        <div
                        x-on:click.stop
                        x-trap.noscroll.inert="open"
                        class="relative rounded-lg max-w-2xl w-full bg-white border-4 border-radius-6 p-8 overflow-y-auto shadow-xl " >



                        <div class="p-6">


                          <!-- Title -->
                          <h3 class="text-3xl font-medium" :id="$id('modal-title')">Offer Details</h3>
                          <!-- Content -->
                          <p class="mt-2 text-gray-600">

                            Product name: {{ $offered_product->product->name}}<br>
                            Product informations:  {{ $offer->informations}} </p>


                            <!-- Buttons -->


                          </div>
                          <div class="bg-gray-100 border border-top px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button x-on:click="open = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </span>



                </div>


                @endforeach
              </span>
            </div>

            ({{ $offer->id}})

          </td>

          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            <div>
              <p class=" text-sm text-gray-800">
                {{ $offered_product->product->name }}
              </p>

              <span
              class="text-xs leading-5 text-gray-500">
              {{ $offered_product->product->product_type->name}}
            </span>
          </div>
        </td>


        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

          <div class="text-sm leading-5 text-grey-800">
            @if (!$offered_product->product_price)
            No Price

            @else
            {{$offered_product->product_price}} €
            <span
            class="text-xs leading-5 text-gray-500">
            <br>per unit
          </span>

          @endif
        </div>

      </td>

      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        <div class="text-sm leading-5 text-gray-800">

          @if (!$offered_product->product_quantity)
          No quantity<br>

          @else
          {{ $offered_product->product_quantity }} x</br>
          @endif

          @if ($offered_product->product_unit)
          {{ $offered_product->product_unit->name }}

          @else
          no unit

          @endif

        </div>



      </td>







      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        @if (Auth::user()->tenant_id == $offer->tenant_id)
        <div class="text-sm text-red-900 font-bold">{{ $offer->tenant->name }} (YOU) </div>
        @else
        <div class="text-sm leading-5 text-gray-900">{{ $offer->tenant->name }} </div>
        @endif

        <div class="text-sm leading-5 text-gray-500">

          {{ $offer->tenant->tenant_type->name }}
          @if ( $offer->tenant->country ) ({{ $offer->tenant->country }})
          @else -
          @endif

        </div>

      </td>



      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">


        <p class=" text-xs text-gray-400">
          Type  {{ $offer->offer_type}} / Status {{ $offer->offer_status}}
        </p>


        <span
        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
        Available
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-6 pt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
        </svg>
      </span>

    </td>

    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-800">
      {{ date('d.m.Y', strtotime($offer->date_valid))  }}
    </td>

    <!-- <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
    <div class="flex justify-left">
    s
  </div>
</td> -->

<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 leading-5 text-gray-500">


  <a href="{{ route('hub.show', $offer) }}" data-toggle="tooltip" data-placement="bottom" title="Show Tenant Profile" class="inline">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
    </svg>
  </a>
</td>

<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 leading-5 text-gray-500">

  @if ( $offer->date_valid < Carbon\Carbon::today() )
  <a href="{{ route('product-offer-inquiries.createNew', $offer) }}" data-toggle="tooltip" data-placement="bottom" title="Show Tenant Profile" class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg> <span>Inquire</span>
  </a>

  @else
  <a href="{{ route('orders.createFromHub', $offer) }}" data-toggle="tooltip" data-placement="bottom" title="Show Tenant Profile" class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg> <span>Place Order</span>
  </a>

  @endif

  <!--
  <a href="{{ route('add.to.bucket', $offer) }}" data-toggle="tooltip" data-placement="bottom" title="Show Tenant Profile" class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
  <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5  h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
</svg>
</a> -->



</td>

</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>

@elseif ($offers->count() == 0)

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-gray-100 sm:rounded-lg">
  <div class="px-4 py-5 sm:p-6">
    <h3 class="text-lg leading-6 font-medium text-gray-900">Hub has currently no public Offers!</h3>
    <div class="mt-2 max-w-xl text-sm text-gray-500">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus praesentium tenetur pariatur.</p>
    </div>

  </div>
</div>


@endif
<!-- Offer Section End  -->

</div>
</div>
</div>
<!-- Main end  -->




















<!-- Main Container -->
<div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200 mt-4">

  <div class="px-4 py-5 sm:px-6">
    <h3 class="card-title">Product Inquiries</h3>
  </div>
  <div class="px-4 py-5 sm:p-6">

    <div class="py-4">


      @if ($inquiries->count() != 0)
      <!-- Inquiry Section Start  -->
      <div class="flex flex-col">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
          <div
          class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
          <table class="min-w-full">
            <thead>
              <tr>
                <x-th label="Inquiry" value="id" :canSort="true" :sortField="$sortField" :sortAsc="$sortAsc" />
                <x-th label="Info" value="request_text"  />
                <x-th label="Quantity" value="request_quantity"  />
                <x-th label="Details" value="product_type_id"  />
                <x-th label="Company" value="tenant_id" :canSort="true" :sortField="$sortField" :sortAsc="$sortAsc" />
                <x-th label="Status" value="inquiry_status"  />
                <x-th label="From" value="created_at"  />
                <th class="px py-3 border-b border-gray-200 bg-gray-50">

                </th>

                <th class="px py-3 border-b border-gray-200 bg-gray-50">

                </th>



              </tr>
            </thead>
            <tbody class="bg-white">

              @foreach($inquiries as $inquiry)
              <tr wire:key="{{ $inquiry->id}}">


                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10 mr-4">

                      @livewire('components.image-render', ['product' => $inquiry->product])



                    </div>

                    <div>
                      <span
                      class="text-sm leading-5 font-medium text-gray-900">


                      <div class="flex-shrink-0 h-10 w-10 pt-2">

                        <span x-data="{ open: false }"
                        x-tooltip="Click for details!"
                        >
                        <!-- Trigger -->
                        <span x-on:click="open = true">
                          <button type="button" class="inline-flex items-center p-1 border border-transparent rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <!-- Heroicon name: solid/plus-sm -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                          </button>

                        </span>

                        <!-- Modal -->
                        <div
                        x-show="open"
                        style="display: none"
                        x-on:keydown.escape.prevent.stop="open = false"
                        role="dialog"
                        aria-modal="true"
                        x-id="['modal-title']"
                        :aria-labelledby="$id('modal-title')"
                        class="fixed inset-0 overflow-y-auto" >

                        <!-- Overlay -->
                        <div x-show="open" x-transition.opacity class="fixed bg-black bg-opacity-50"></div>

                        <!-- Panel -->
                        <div
                        x-show="open" x-transition
                        x-on:click="open = false"
                        class="relative min-h-screen flex items-center justify-center p-4" >

                        <!-- Panel Outter -->
                        <div
                        x-on:click.stop
                        x-trap.noscroll.inert="open"
                        class="relative rounded-lg max-w-2xl w-full bg-white border-4 border-radius-6 p-8 overflow-y-auto shadow-xl " >



                        <div class="p-6">


                          <!-- Title -->
                          <h3 class="text-3xl font-medium" :id="$id('modal-title')">Inquiry Details</h3>
                          <!-- Content -->
                          <p class="mt-2 text-gray-600">

                            ID: {{ $inquiry->id}} <br>
                            Info: {{ $inquiry->request_text}}





                          </div>
                          <div class="bg-gray-100 border border-top px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button x-on:click="open = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </span>



                </div>



              </span>
            </div>

            ({{ $inquiry->id}})

          </td>

          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">




            <div>

              <div>
                <p class=" text-sm text-gray-800">
                  {{ $inquiry->request_text}}
                </p>

                <span
                class="text-xs leading-5 text-gray-500">
                @if ($inquiry->product_type_id)
                {{ $inquiry->product_type->name }}
                @endif
              </span>
            </div>




          </div>
        </td>


        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

          <div class="text-sm leading-5 text-grey-800">
            {{ $inquiry->request_quantity }}
            <span
            class="text-xs leading-5 text-gray-500">

          </span>


        </div>

      </td>

      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        <div class="text-sm leading-5 text-gray-800">



          @if ($inquiry->product_type_id)
          {{ $inquiry->product_type->name}}
          @endif

        </div>



      </td>




      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        @if (Auth::user()->tenant_id == $inquiry->tenant_id)
        <div class="text-sm text-red-900 font-bold">{{ $inquiry->tenant->name }} (YOU) </div>
        @else
        <div class="text-sm leading-5 text-gray-900">{{ $inquiry->tenant->name }} </div>
        @endif


      </td>



      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

        @if($inquiry->inquiry_status == 0)

        <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-red-800">
          Pending
        </span>

        @elseif ($inquiry->inquiry_status == 1)
        <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-orange-800">
          Answered
        </span><br>

        @elseif ($inquiry->inquiry_status == 9)
        <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-red-800">
          Canceled
        </span>

        @else
        <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
          Finished
        </span>

        @endif



      </td>

      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-800">
        {{ date('d.m.Y', strtotime($inquiry->created_at))  }}
      </td>



      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 leading-5 text-gray-500">


        <a href="{{ route('hub.showInquiry', $inquiry) }}" data-toggle="tooltip" data-placement="bottom" title="Show Tenant Profile" class="inline">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </a>
      </td>

      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 leading-5 text-gray-500">


        <a href="{{ route('product-offers.createNew', $inquiry) }}" data-toggle="tooltip" data-placement="bottom" title="Show Tenant Profile" class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg> <span>Make Offer</span>
        </a>





      </td>

    </tr>
    @endforeach




  </tbody>
</table>
</div>
</div>
</div>
</div>

@elseif ($inquiries->count() == 0)

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-gray-50 sm:rounded-lg">
  <div class="px-4 py-5 sm:p-6">
    <h3 class="text-lg leading-6 font-medium text-gray-900">Hub has currently no Inquries!</h3>
    <div class="mt-2 max-w-xl text-sm text-gray-500">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus praesentium tenetur pariatur.</p>
    </div>

  </div>
</div>



@endif
<!-- Inquiry Section End  -->


</div>
</div>
</div>
<!-- Main end  -->







<!-- Livewire end  -->
</div>
