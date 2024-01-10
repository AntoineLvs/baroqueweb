

<div>

  <!-- This example requires Tailwind CSS v2.0+ -->
  <div>
    <div>



      @if ($tenant->photo_header)
      <img class="h-64 w-full sm:rounded-lg object-cover object-center lg:h-80"   src="{{ $tenant->photoHeaderUrl($tenant) }}" alt="">

      @else
      <img class="h-64 w-full sm:rounded-lg object-cover object-center lg:h-80" src="{{ asset('assets/img/windpower1.jpg') }}" alt="">

      @endif

    </div>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">


      <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
        <div class="flex">

          @if($tenant->photo)
          <img class="h-24 w-24 rounded-full ring-4 ring-blue sm:h-32 sm:w-32"
          src="{{ $tenant->photoUrl($tenant) }}" alt="">


          @else
          <img class="h-24 w-24 rounded-full ring-4 ring-blue sm:h-32 sm:w-32" src="{{ asset('assets/img/ros.png') }}" alt="">

          @endif


        </div>
        <div class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
          <div class="sm:hidden md:block mt-6 min-w-0 flex-1">
            <h1 class="text-2xl font-bold text-gray-900 truncate">

              {{ $tenant->name}}

            </h1>
          </div>
          <div class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">

          </div>


        </div>
      </div>
      <div class="hidden sm:block md:hidden mt-6 min-w-0 flex-1">
        <h1 class="text-2xl font-bold text-gray-900 truncate">
          hi
        </h1>
      </div>
    </div>
  </div>




  <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">

    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('message') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
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

  </div>


  <!-- CONTENT -->
  <!-- This example requires Tailwind CSS v2.0+ -->
  <div class="pt-6">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
      <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
          Company Information
        </h3>

      </div>
      <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
              Company / Name
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              {{ $tenant->name }}
            </dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
              Company Type
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              {{ $tenant->tenant_type->name }}
            </dd>
          </div>


          <div class="sm:col-span-2">
            <dt class="text-sm font-medium text-gray-500">
              About
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              @if ($tenant->description)
              {{ $tenant->description }}
              @else
              No Company description available
              @endif

            </dd>
          </div>
        </dl>
      </div>
    </div>
  </div>


  <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200 mt-8">


    <div class="px-4 py-5 sm:px-6">
      <h3 class="card-title">Products</h3>
      <!-- We use less vertical padding on card headers on desktop than on body sections -->
    </div>
    <div class="px-4 py-5 sm:p-6">
      <!-- Content goes here -->

      <!-- This example requires Tailwind CSS v2.0+ -->
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Product
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Product Type
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Product Data
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      State
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Actions
                    </th>


                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                  @foreach ($products as $product)
                  <tr>

                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">


                          @if( $product->product_type->id == 1 )
                          <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/vegetable.png') }}" alt="">

                          @elseif( $product->product_type->id == 2 )
                          <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/fruits.png') }}" alt="">

                          @elseif( $product->product_type->id == 3 )
                          <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/salad.png') }}" alt="">

                          @elseif( $product->product_type->id == 4 )
                          <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/herbs.png') }}" alt="">

                          @elseif( $product->product_type->id == 5 )
                          <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/milk.png') }}" alt="">

                          @else
                          <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/beef.png') }}" alt="">

                          @endif


                        </div>
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">
                            {{ $product->name }}
                          </div>
                          <div class="text-sm text-gray-500">
                            PID: {{ $product->id }}
                          </div>
                        </div>
                      </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ $product->product_type->name}}</div>
                      <div class="text-sm text-gray-500">PTID: {{ $product->product_type_id }}</div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ $product->data }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                      <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                        Available
                      </span>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

                    </td>

                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>   <!-- product end div-->

  <!-- product start div-->
  <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200 mt-8">


    <div class="px-4 py-5 sm:px-6">
      <h3 class="card-title">Projects</h3>
      <!-- We use less vertical padding on card headers on desktop than on body sections -->
    </div>
    <div class="px-4 py-5 sm:p-6">
      <!-- Content goes here -->

      <!-- This example requires Tailwind CSS v2.0+ -->
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Project
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Project Type
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Project Data
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      State
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Actions
                    </th>


                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                  @foreach ($projects as $project)
                  <tr>

                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                          <img class="h-10 w-10 rounded-full" style="background: lightgreen;">
                        </div>
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">
                            {{ $project->name }}
                          </div>
                          <div class="text-sm text-gray-500">
                            PID: {{ $project->id }}
                          </div>
                        </div>
                      </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ $project->project_type->name}}</div>
                      <div class="text-sm text-gray-500">PTID: {{ $project->project_type_id }}</div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ $project->data }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                      <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                        Available
                      </span>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">




                    </td>





                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>   <!-- product end div-->

  <!-- product start div-->
  <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200 mt-8">


    <div class="px-4 py-5 sm:px-6">
      <h3 class="card-title">Locations</h3>
      <!-- We use less vertical padding on card headers on desktop than on body sections -->
    </div>
    <div class="px-4 py-5 sm:p-6">
      <!-- Content goes here -->

      <!-- This example requires Tailwind CSS v2.0+ -->
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Location
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Location Type
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Location Data
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      State
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Actions
                    </th>


                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                  @foreach ($locations as $location)
                  <tr>

                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                          @if( $location->location_type->id == 1 )
                          <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-green-400" src="{{ asset('assets/img/efuel-station-clean.png') }}" alt="">

                          @elseif( $location->location_type->id == 2 )
                          <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-green-400" src="{{ asset('assets/img/efuel-depot-clean.png') }}" alt="">

                          @else
                          <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-green-400" src="{{ asset('assets/img/efuel-clean.png') }}" alt="">

                          @endif

                        </div>
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">
                            {{ $location->name }}
                          </div>
                          <div class="text-sm text-gray-500">
                            PID: {{ $location->id }}
                          </div>
                        </div>
                      </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ $location->location_type->name}}</div>
                      <div class="text-sm text-gray-500">PTID: {{ $location->location_type_id }}</div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ $location->data }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                      <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                        Available
                      </span>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">




                    </td>





                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>   <!-- product end div-->

  <!-- final div-->
</div>
