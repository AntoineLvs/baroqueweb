<div>


  <div class="grid grid-cols-6 mb-4 border-b pb-4 border-gray-200 ">


    <div class="col-span-6 pr-2  {{$super == true ? 'sm:col-span-3' : 'sm:col-span-5'}}">
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



  <!-- @if($super)
  <div class="col-span-6 sm:col-span-2 pr-2">
  <label for="tenant" class="block text-sm leading-5 font-medium text-gray-700">Tenant</label>
  <select wire:model="selectedTenant" id="tenant"
  class="mt-1 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
  <option value="">Choose a Tenant</option>
  @foreach($tenants as $key => $tenant)
  <option value="{{$key}}">{{$tenant}}</option>
  @endforeach
</select>
</div>
@endif -->



</div>


Search Details


<div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6 pb-8">




  <div class="sm:col-span-2">
    <label for="city" class="block text-sm font-medium text-gray-700">
      Zeige mir nur...
    </label>



    @foreach ($dataTenantTypes as $tenant_type)


    <div class="relative flex items-start mt-4 ">
      <div class="flex items-center h-5">
        <input wire:model="tenant_types.{{ $tenant_type }}"  type="checkbox" value="{{ $tenant_type }}" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" >
      </div>
      <div class="ml-3 text-sm">
        <label for="{{ $tenant_type }}" class="font-medium text-gray-700">

          @if ($tenant_type == 1) Hofläden
          @elseif ($tenant_type == 2) Privatgärten
          @elseif ($tenant_type == 3) Händler / Biomärkte
          @endif

        </label>

      </div>
    </div>

    @endforeach

  </div>




</div>











<div class="flex flex-col">


  <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
    <div
    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
    <table class="min-w-full">
      <thead>
        <tr>
          <x-th label="Name" value="name" :canSort="true" :sortField="$sortField" :sortAsc="$sortAsc" />
          <x-th label="Typ" value="type" :canSort="true" :sortField="$sortField" :sortAsc="$sortAsc" />
          <x-th label="Status" value="status" :canSort="false" :sortField="$sortField" :sortAsc="$sortAsc" />
          <x-th label="Produkte" value="products" :canSort="true" :sortField="$sortField" :sortAsc="$sortAsc" />
          <x-th label="Land" value="country" :canSort="false" :sortField="$sortField" :sortAsc="$sortAsc" />
          <th class="px-6 py-3 border-b border-gray-200 bg-gray-50">

          </th>
        </tr>
      </thead>
      <tbody class="bg-white">



        @foreach($tenants as $tenant)
        <tr wire:key="{{$tenant->id}}">
          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            <div class="flex items-center">
              <div class="flex-shrink-0 h-10 w-10">




                @if ($tenant->photo)

                <img class="h-10 w-10 rounded-full ring-1 ring-grey"
                src="{{ $tenant->photoUrl($tenant) }}" alt="">

                @else
                <img class="h-10 w-10 rounded-full"
                src="{{ $tenant->avatarUrl($tenant) }}"
                alt="">

                @endif



              </div>
              <div class="ml-4">
                <div>
                  <span
                  class="text-sm leading-5 font-medium text-gray-900">{{$tenant->name}} {{$tenant->id}}
                  <p class="text-gray-400">

                    @if ($tenant->getProductNumber($tenant) > 0)
                    <span
                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                    {{ $tenant->getProductNumber($tenant) }} Products
                  </span>
                  @endif

                  @if ($tenant->getProjectNumber($tenant) > 0)
                  <span
                  class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                  {{$tenant->getProjectNumber($tenant) }} Projects
                </span>
                @endif



                @if ($tenant->getLocationNumber($tenant) > 0)
                <span
                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                {{$tenant->getLocationNumber($tenant) }} Locations
              </span>
              @endif

              @if ($tenant->getOfferNumber($tenant) > 0)
              <span
              class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
              {{$tenant->getOfferNumber($tenant) }} Offers
            </span>
            @endif


            </p>
          </span>

        </div>
      </div>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
      <div class="text-sm leading-5 text-gray-900">{{ $tenant->tenant_type->name }}</div>


      <div class="text-sm leading-5 text-gray-500">


        Since  {{ date('d.m.Y', strtotime($tenant->created_at))  }}



      </div>


    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
      @if($tenant->status == 0 )
      <span
      class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
      Not verified
    </span>
    @else
    <span
    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
    Verified <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-6 pt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
</svg>
  </span>
  @endif
</td>

<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
  {{$tenant->address}}
</td>
<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
  <div class="flex justify-left">
    {{$tenant->country}}
  </div>
</td>
<td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
  <a href="{{ route('directory.show', $tenant) }}" data-toggle="tooltip" data-placement="bottom" title="Show Tenant Profile">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
    </svg>
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
