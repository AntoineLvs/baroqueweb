<div>


  <div class="grid grid-cols-6 mb-4">


    <div class="col-span-6 pr-2 {{$super == true ? 'sm:col-span-3' : 'sm:col-span-5'}}">
      <x-text-input wire:model="search" label="Search" placeholder="Search Tenants..."/>
    </div>


    <div class="col-span-6 sm:col-span-1 pr-2">
      <label for="location" class="block text-sm leading-5 font-medium text-gray-700">Per Page</label>
      <select wire:model="perPage" id="location"
      class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
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



     <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">




       <div class="sm:col-span-2">
         <label for="city" class="block text-sm font-medium text-gray-700">
           A
         </label>

         <div class="relative flex items-start mt-4">
           <div class="flex items-center h-5">
             <input id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
           </div>
           <div class="ml-3 text-sm">
             <label for="comments" class="font-medium text-gray-700">Comments</label>
             <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
           </div>
         </div>

         <div class="relative flex items-start mt-4">
           <div class="flex items-center h-5">
             <input id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
           </div>
           <div class="ml-3 text-sm">
             <label for="comments" class="font-medium text-gray-700">Comments</label>
             <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
           </div>
         </div>

       </div>

       <div class="sm:col-span-2">
         <label for="state" class="block text-sm font-medium text-gray-700">
           B
         </label>

         <div class="relative flex items-start mt-4">
           <div class="flex items-center h-5">
             <input id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
           </div>
           <div class="ml-3 text-sm">
             <label for="comments" class="font-medium text-gray-700">Comments</label>
             <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
           </div>
         </div>

         <div class="relative flex items-start mt-4">
           <div class="flex items-center h-5">
             <input id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
           </div>
           <div class="ml-3 text-sm">
             <label for="comments" class="font-medium text-gray-700">Comments</label>
             <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
           </div>
         </div>


       </div>

       <div class="sm:col-span-2">
         <label for="zip" class="block text-sm font-medium text-gray-700">
           C
         </label>

         <div class="relative flex items-start mt-4">
           <div class="flex items-center h-5">
             <input id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
           </div>
           <div class="ml-3 text-sm">
             <label for="comments" class="font-medium text-gray-700">Comments</label>
             <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
           </div>
         </div>

         <div class="relative flex items-start mt-4">
           <div class="flex items-center h-5">
             <input id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
           </div>
           <div class="ml-3 text-sm">
             <label for="comments" class="font-medium text-gray-700">Comments</label>
             <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
           </div>
         </div>


       </div>







     </div>





<div class="col-span-6 align-middle inline-block min-w-full  overflow-hidden " >


@foreach ($dataTransmissions as $transmission)

<div>
  <input wire:model="transmissions.{{ $transmission }}"  type="checkbox" value="{{ $transmission }}"/>
  <label>{{ $transmission }}</label>
</div>

@endforeach
</div>


<div class="flex flex-col">


  <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
    <div
    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
    <table class="min-w-full">
      <thead>
        <tr>
          <x-th label="Name" value="name" :canSort="true" :sortField="$sortField" :sortAsc="$sortAsc" />
          <x-th label="Firma" value="name" :canSort="true" :sortField="$sortField" :sortAsc="$sortAsc" />
          <x-th label="Status" value="status" :canSort="false" :sortField="$sortField" :sortAsc="$sortAsc" />
          <x-th label="Type" value="type" :canSort="true" :sortField="$sortField" :sortAsc="$sortAsc" />
          <x-th label="Country" value="country" :canSort="false" :sortField="$sortField" :sortAsc="$sortAsc" />
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
                <img class="h-10 w-10 rounded-full"

                alt="">
              </div>
              <div class="ml-4">
                <div>
                  <span
                  class="text-sm leading-5 font-medium text-gray-900">{{$tenant->name}}</span>

                  <div class="text-sm leading-5 text-gray-500">{{$tenant->email}}</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900">{{$tenant->type}}</div>


              <div class="text-sm leading-5 text-gray-500">x</div>


            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              @if($tenant->status)
              <span
              class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
              Active
            </span>
            @else
            <span
            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
            Inactive
          </span>
          @endif
        </td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
          {{$tenant->address}}
        </td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
          <div class="flex justify-center">
            x
          </div>
        </td>
        <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
          <a href="#" class="text-indigo-600 hover:text-indigo-900">Show Profile</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
</div>
</div>
