

<div>

  <!-- This example requires Tailwind CSS v2.0+ -->
  <div class="md:flex md:items-center md:justify-between md:space-x-5">
    <div class="flex items-start space-x-5">
      <div class="flex-shrink-0">
        <div class="relative">

          @if($offer->tenant->photo)
          <img class="h-16 w-16 rounded-full ring-2 ring-blue" src="{{ asset('storage/'. $offer->tenant->photo ) }}" alt="">

          @else
          <img class="h-16 w-16 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/ros.png') }}" alt="">

          @endif


          <span class="absolute inset-0 shadow-inner rounded-full" aria-hidden="true"></span>
        </div>
      </div>
      <!--
      Use vertical padding to simulate center alignment when both lines of text are one line,
      but preserve the same layout if the text wraps without making the image jump around.
    -->
    <div class="pt-1.5">
      <h1 class="text-2xl font-bold text-gray-900">{{ $offer->tenant->name }}</h1>
      <p class="text-sm font-medium text-gray-500"> {{ $offer->tenant->tenant_type->name }} since {{ $offer->tenant->created_at }}</p>
    </div>
  </div>
  <div class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-reverse sm:space-y-0 sm:space-x-3 md:mt-0 md:flex-row md:space-x-3">

    <a href="{{ route('hub.index') }}" data-toggle="tooltip" data-placement="bottom" title="Back" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500">
      <span>Back to hub</span>
    </a>


      <a href="{{ route('product-offer-inquiries.createNew', $offer) }}" data-toggle="tooltip" data-placement="bottom" title="Show Tenant Profile" class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg> <span>Inquire Products</span>
      </a>


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
            {{ $offer->tenant->name }}
          </dd>
        </div>


        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">
            Company Type
          </dt>
          <dd class="mt-1 text-sm text-gray-900">
            {{ $offer->tenant->tenant_type->name }}
          </dd>
        </div>


        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">
            About
          </dt>
          <dd class="mt-1 text-sm text-gray-900">
            @if ($offer->tenant->description)
            {{ $offer->tenant->description }}
            @else
            No Company description available
            @endif

          </dd>
        </div>

        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">
            Offer valid until
          </dt>
          <dd class="mt-1 text-sm text-gray-900">

            {{ date('d.m.Y', strtotime($offer->date_valid))  }}


          </dd>
        </div>


      </dl>
    </div>
  </div>
</div>


<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white shadow overflow-hidden sm:rounded-lg mt-8 pb-8">
  <div class="px-4 py-5 sm:px-6">
    <h3 class="text-lg leading-6 font-medium text-gray-900">Offered Product Informations</h3>
    <p class="mt-1 max-w-2xl text-sm text-gray-500">Product and offer details</p>
  </div>

  @foreach($offer->products as $offered_product)
  <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
    <dl class="sm:divide-y sm:divide-gray-200">
      <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Product name</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $offered_product->product->name}} </dd>
      </div>

      <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Product Type</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $offered_product->product->product_type->name}} </dd>
      </div>


      <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Product quantity and unit</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

          @if (!$offered_product->product_quantity)
          No quantity<br>

          @else
          {{ $offered_product->product_quantity }}
          @endif

          @if ($offered_product->product_unit)
          {{ $offered_product->product_unit->name }}

          @else
          no unit

          @endif

        </dd>
      </div>
      <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Product price per unit</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">  {{ $offered_product->product_price }} €</dd>
      </div>
      <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Max. quantity available</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

          @if (!$offered_product->max_product_quantity)
          No max quantity<br>

          @else
          {{ $offered_product->max_product_quantity }}
          @if ($offered_product->product_unit)
          {{ $offered_product->product_unit->name }}

          @else
          no unit

          @endif
          @endif



        </dd>
      </div>




      <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Product data sheet</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">

            @if ($offered_product->product->document_id)
            @foreach ($offered_product->product->getDocuments($offered_product->product->document_id) as $document)
            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
              <div class="w-0 flex-1 flex items-center">
                <!-- Heroicon name: solid/paper-clip -->
                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                </svg>
                <span class="ml-2 flex-1 w-0 truncate">
                  <a href="{{ $document->documentUrl() }}" class="font-medium text-indigo-600 hover:text-indigo-500"> {{ $document->filename }} </a></span>
                </div>
                <div class="ml-4 flex-shrink-0">




                  <a href="  {{ $document->documentUrl() }}" data-toggle="tooltip" data-placement="bottom" title="Show Document">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                  </a>




                </div>
              </li>

              @endforeach

              @else

              no datasheet available

            </ul>
          </dd>
        </div>
        @endif


      </dl>
    </div>
  </div>
  @endforeach



  <!-- final div-->
</div>
