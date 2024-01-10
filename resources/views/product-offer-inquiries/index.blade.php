@extends('layouts.app', ['page' => 'Product Inquries', 'pageSlug' => 'product-offer-inquiries', 'section' => 'main'])
@section('content')


<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
  <div class="py-10">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
      <h1 class="text-2xl font-bold text-gray-900">Product Inquiries</h1>

      @if (session()->has('message'))

      <!-- This example requires Tailwind CSS v2.0+ -->
      <div class="pt-5">
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
                <button type="button" class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600" onclick="closeAlert(event)">
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
    </div>

    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
      <div class="py-4">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
          <div class="px-4 py-5 sm:px-6">
            <h3 class="card-title">Actions</h3>
          </div>
          <div class="px-4 py-5 sm:p-6">
            <!-- Content goes here -->

            <div>
              <a href="{{ route('product-offer-inquiries.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent
              text-base font-medium rounded-md shadow-sm text-white bg-teal-600 hover:bg-teal-700
              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create Inquiry</a>
            </div>

          </div>
        </div>
      </div>
    </div>


    <!-- CONTENT -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
      <div class="py-4">


        <!-- Inbox Section start -->
        @if ($product_offer_inquiries_in->count() > 0 )

        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200 mb-8">

          <div class="px-4 py-5 sm:px-6">
            <h3 class="card-title">
              <svg class="w-6 h-6 inline mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z"></path></svg>
              Incoming Product Inquiries</h3>

              <!-- We use less vertical padding on card headers on desktop than on body sections -->
            </div>
            <div class="px-4 py-5 sm:p-6">
              <!-- This example requires Tailwind CSS v2.0+ -->
              <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                      <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                          <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Request
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Product Details
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Requested Amount
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Price / Unit
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Supplier
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Docs
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              State
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Actions
                            </th>


                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                          @foreach ($product_offer_inquiries_in as $product_offer_inquiry)
                          <tr>

                            <td class="px-6 py-4 whitespace-nowrap">
                              <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">


                                  @if( $product_offer_inquiry->product_type_id == 1 )
                                  <img class="h-10 w-10 bg-gray-200 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/efuel-pistol-clean.png') }}" alt="">

                                  @elseif( $product_offer_inquiry->product_type_id == 2 )
                                  <img class="h-10 w-10 bg-gray-200 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/efuel-tech-clean.png') }}" alt="">

                                  @elseif( $product_offer_inquiry->product_type_id == 3 )
                                  <img class="h-10 w-10 bg-gray-200 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/efuel-service-clean.png') }}" alt="">

                                  @elseif( $product_offer_inquiry->product_type_id == 4 )
                                  <img  class="h-10 w-10 bg-gray-200 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/efuel-logistic-clean.png') }}" alt="">

                                  @elseif( $product_offer_inquiry->product_type_id == 5 )
                                  <img  class="h-10 w-10 bg-gray-200 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/efuel-tech-clean.png') }}" alt="">

                                  @else
                                  <img  class="h-10 w-10 bg-gray-200 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/efuel-clean.png') }}" alt="">

                                  @endif


                                </div>


                                <div class="ml-4">
                                  <div class="text-sm text-gray-900">

                                    {{ $product_offer_inquiry->id }}

                                  </div>
                                  <div class="text-sm text-gray-500">
                                    y
                                  </div>
                                </div>
                              </div>
                            </td>


                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                              y
                            </td>


                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

                              {{ $product_offer_inquiry->request_quantity }}

                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

                              y
                            </td>



                            <td class="px-6 py-4 whitespace-nowrap">
                              <div class="text-sm text-gray-500">
                                to: <b> ({{ $product_offer_inquiry->supplier_tenant_id }})



                                  from:  ({{ $product_offer_inquiry->tenant->id }}) {{ $product_offer_inquiry->tenant->name }}
                                </div>

                              </td>

                              <td  class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                -
                              </td>



                              <td class="px-6 py-4 whitespace-nowrap">

                                @if($product_offer_inquiry->status == 0)

                                <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-yellow-800">
                                  Open
                                </span>

                                @elseif ($product_offer_inquiry->status == 1)
                                <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-orange-800">
                                  Offer send
                                </span>

                                <span class="text-xs ml-2 flex-1 w-0 truncate">
                                  <a href="{{ route('product-offers.show', $product_offer_inquiry->product_offer_id) }}" class="font-medium text-indigo-600 hover:text-indigo-500"> Offer #{{$product_offer_inquiry->product_offer_id}} </a></span>

                                  @else
                                  <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                                    Finished
                                  </span>

                                  @endif


                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">


                                  {{ date('d.m.Y', strtotime($product_offer_inquiry->created_at))  }}<br>


                                </td>


                                <td  class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">

                                  <a href="{{ route('product-offer-inquiries.incomingShow', $product_offer_inquiry) }}" data-toggle="tooltip" data-placement="bottom" title="Show Tenant Profile" class="inline-flex items-center px-3 py-2 mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                  </a>

                                  @if ($product_offer_inquiry->status == 0)
                                  <a href="{{ route('product-offers.createFromInquiry', $product_offer_inquiry) }}" data-toggle="tooltip" data-placement="bottom" title="Create a Order" class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg> <span>Make Offer</span>
                                  </a>

                                  @elseif ($product_offer_inquiry->status == 1)

                                  <a href="{{ route('product-offers.edit', $product_offer_inquiry->product_offer_id) }}" data-toggle="tooltip" data-placement="bottom" title="Create a Order" class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg> <span>Edit Offer</span>
                                  </a>





                                  @else
                                  <a href="{{ route('product-offers.createFromInquiry', $product_offer_inquiry) }}" data-toggle="tooltip" data-placement="bottom" title="Create a Order" class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg> <span>Make Offer</span>
                                  </a>

                                  @endif

                                </td>



                              </tr>
                              @endforeach

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  {{ $product_offer_inquiries_in->links() }}

                </div>
              </div>
              @endif
              <!--  Inbox section End -->



              <!-- Outgoing Section -->
              <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200 mt-8">


                <div class="px-4 py-5 sm:px-6">

                  <h3 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 11l3-3m0 0l3 3m-3-3v8m0-13a9 9 0 110 18 9 9 0 010-18z" />
                    </svg> Outgoing Product Inquiries</h3>
                  </div>
                  <div class="px-4 py-5 sm:p-6">
                    @if ($product_offer_inquiries->count() == 0 )

                    <button type="button" onclick="window.location='{{ route("product-offer-inquiries.create") }}'" class="relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-6 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      <svg class="mx-auto h-12 w-12 text-gray-500" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      <span class="block text-sm font-medium text-gray-500">
                        You don't have any product inquiries yet. Create a product Inquiry now.
                      </span>
                    </button>

                    @else

                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col">
                      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                              <thead class="bg-gray-50">
                                <tr>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Inquiry
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Details
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Qty
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Price / Unit
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Supplier
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Active in Hub
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    State
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Offer
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                  </th>

                                </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-gray-200">

                                @foreach ($product_offer_inquiries as $product_offer_inquiry)
                                <tr>

                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                      <div class="flex-shrink-0 h-10 w-10">

                                        @if( $product_offer_inquiry->product_type_id == 1 )
                                        <img  class="h-10 w-10 bg-gray-200 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/efuel-pistol-clean.png') }}" alt="">

                                        @elseif( $product_offer_inquiry->product_type_id == 2 )
                                        <img  class="h-10 w-10 bg-gray-200 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/efuel-tech-clean.png') }}" alt="">

                                        @elseif( $product_offer_inquiry->product_type_id == 3 )
                                        <img class="h-10 w-10 bg-gray-200 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/efuel-service-clean.png') }}" alt="">

                                        @elseif( $product_offer_inquiry->product_type_id == 4 )
                                        <img  class="h-10 w-10 bg-gray-200 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/efuel-logistic-clean.png') }}" alt="">

                                        @elseif( $product_offer_inquiry->product_type_id == 5 )
                                        <img  class="h-10 w-10 bg-gray-200 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/efuel-tech-clean.png') }}" alt="">

                                        @else
                                        <img class="h-10 w-10 bg-gray-200 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/efuel-pistol-clean.png') }}" alt="">

                                        @endif

                                      </div>


                                      <div class="ml-4">
                                        <div class="text-sm text-gray-900">

                                          {{ $product_offer_inquiry->id }}

                                        </div>

                                      </div>
                                    </div>
                                  </td>


                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">


                                    <div class="text-sm text-gray-900">

                                    {{ $product_offer_inquiry->request_text }}<br>

                                    </div>

                                    @if ($product_offer_inquiry->offer($product_offer_inquiry->public_product_offer_id))

                                    @foreach ( $product_offer_inquiry->offer($product_offer_inquiry->public_product_offer_id)->products as $product )

                                    <div class="text-sm font-medium text-gray-900">
                                      {{ $product->product->name }}
                                    </div>
                                    <div class="text-sm text-gray-500">

                                      {{ $product->product->product_type->name }}
                                    </div>
                                    @endforeach

                                    @endif
                                  </td>


                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

                                    {{ $product_offer_inquiry->request_quantity }}

                                  </td>

                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if ($product_offer_inquiry->offer($product_offer_inquiry->public_product_offer_id))
                                    @foreach ( $product_offer_inquiry->offer($product_offer_inquiry->public_product_offer_id)->products as $product )
                                    {{ $product->product_price }} €<br>   {{ $product->product_unit->name }}
                                    @endforeach
                                    @endif
                                  </td>



                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">

                                      @if ( $product_offer_inquiry->supplier_tenant_id )
                                      to: <b> ({{ $product_offer_inquiry->supplier_tenant_id }})
                                        {{ $product_offer_inquiry->supplier($product_offer_inquiry->supplier_tenant_id)->name  }}</b><br>
                                        @else
                                        public inquiry (no supplier)<br>
                                        @endif

                                      </div>

                                    </td>

                                    <td  class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">

                                      @livewire('components.toggle-button',
                                      [
                                      'model' => $product_offer_inquiry,
                                      'field' => 'active',
                                      ])



                                    </td>



                                    <td class="px-6 py-4 whitespace-nowrap">

                                      @if($product_offer_inquiry->inquiry_status == 0)

                                      <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-orange-800">
                                        Pending
                                      </span>

                                      @elseif ($product_offer_inquiry->inquiry_status == 1)
                                      <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-yellow-800">
                                        Answered
                                      </span><br>

                                      @elseif ($product_offer_inquiry->inquiry_status == 9)
                                      <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-red-800">
                                        Canceled
                                      </span>

                                      @else
                                      <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                                        Finished
                                      </span>

                                      @endif



                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">


                                      Status {{ $product_offer_inquiry->inquiry_status }}

                                    </td>
                                    <td  class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">



                                    </td>

                                    <td  class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium mb-2">




                                      <a href="{{ route('product-offer-inquiries.show', $product_offer_inquiry) }}" data-toggle="tooltip" data-placement="bottom" title="Show" class="inline-flex items-center px-3 py-2 mt-2 mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                      </a>

                                      @if ( $product_offer_inquiry->inquiry_status != 9)
                                      <a href="{{ route('product-offer-inquiries.cancel', $product_offer_inquiry) }}" data-toggle="tooltip" data-placement="bottom" title="Create a Order" class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg> <span>Cancel</span>
                                      </a>
                                      @endif


                                    </td>



                                  </tr>
                                  @endforeach

                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endif
                      {{ $product_offer_inquiries->links() }}
                    </div>
                  </div>
                </div>
              </div>
              <!-- Outgoing Section End -->



            </div>
          </main>

          <script>
          function closeAlert(event){
            let element = event.target;
            while(element.nodeName !== "BUTTON"){
              element = element.parentNode;
            }
            element.parentNode.parentNode.removeChild(element.parentNode);
          }
          </script>

          @endsection
