@extends('layouts.app', ['page' => 'Orders', 'pageSlug' => 'orders', 'section' => 'main'])
@section('content')


<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
  <div class="py-10">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
      <h1 class="text-2xl font-bold text-gray-900">Bestellungen</h1>

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
            <h3 class="card-title">Aktionen</h3>
          </div>
          <div class="px-4 py-5 sm:p-6">
            <!-- Content goes here -->

            <div>



                <a  href="{{ route('orders.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent
                text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Neue Bestellung</a>


            </div>

          </div>
        </div>
      </div>
    </div>


    <!-- CONTENT -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
      <div class="py-4">

        <!-- Privat Offer Section start -->
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200 mt-8">


          <div class="px-4 py-5 sm:px-6">
            <h3 class="card-title">Bestellungen</h3>
          </div>
          <div class="px-4 py-5 sm:p-6">

            @if ($orders->count() == 0 )

            <button type="button" onclick="window.location='{{ route("orders.create") }}'" class="relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-6 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              <svg class="mx-auto h-12 w-12 text-gray-500" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="block text-sm font-medium text-gray-500">
                Du hast bisher keine Bestellungen. Erstelle jetzt eine.
              </span>
            </button>

            @else



            <div class="flex flex-col">
              <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Offer
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Product Details
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Price / Unit
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Creation Date / Valid until
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Docs
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            State
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Customer
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Edit
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                          </th>

                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($orders as $order)
                        <tr>

                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="flex-shrink-0 h-10 w-10">

                                @foreach ($order->products->slice(0, 1) as $offered_product)
                                @if( $offered_product->product->product_type->id == 1 )
                                <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/efuel-pistol-clean.png') }}" alt="">

                                @elseif( $offered_product->product->product_type->id == 2 )
                                <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/efuel-tech-clean.png') }}" alt="">

                                @elseif( $offered_product->product->product_type->id == 3 )
                                <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/efuel-service-clean.png') }}" alt="">

                                @elseif( $offered_product->product->product_type->id == 4 )
                                <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/efuel-logistic-clean.png') }}" alt="">

                                @elseif( $offered_product->product->product_type->id== 5 )
                                <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/efuel-tech-clean.png') }}" alt="">

                                @else
                                <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/efuel-clean.png') }}" alt="">

                                @endif
                                @endforeach

                              </div>


                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                  Offer
                                </div>
                                <div class="text-sm text-gray-500">
                                  PO-ID: {{ $order->id }}<br>
                                  O-Typ: {{ $order->offer_type }}<br>
                                </div>
                              </div>
                            </div>
                          </td>


                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @foreach ($order->products->slice(0, 2) as $offered_product)

                            <b>{{ $offered_product->product->name }}</b><br>
                            {{ $offered_product->product->product_type->name }}
                            @endforeach


                          </td>


                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">


                            @foreach ($order->products->slice(0, 2) as $offered_product)

                            @if (!$offered_product->product_price)
                            No Price

                            @else
                            <b>  {{$offered_product->product_price}} € </b><br>

                            @endif

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

                            @endforeach



                          </td>



                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">

                              Created: {{ date('d. M.y', strtotime($order->created_at)) }}<br>
                              @if ($order->date_valid)

                              Valid until: {{ date('d. M.y', strtotime($order->date_valid)) }}
                              @else
                              not limited
                              @endif
                            </div>

                          </td>

                          <td  class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">

                            @if ($order->document_id)

                            @foreach ($order->documents($order->document_id) as $document)
                            <a href="{{ $document->documentUrl() }}" data-toggle="tooltip" data-placement="bottom" title="Show Document">


                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                              </svg>
                            </a>
                            @endforeach

                            @else

                            -

                            @endif

                          </td>



                          <td class="px-6 py-4 whitespace-nowrap">


                            @if($order->offer_status == 0)

                            <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-200 text-blue-800">
                              Send
                            </span>

                            @elseif ($order->offer_status == 1)
                            <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-orange-800">
                              Answered
                            </span><br>

                            @else
                            <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                              Ordered
                            </span>

                            @endif




                              </td>

                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">


                                {{ $order->customer_tenant($order->customer_tenant_id)->name }}<br>


                              </td>
                              <td  class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">







                              </td>

                              <td  class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">



                                <!-- <form action="{{ route('product-offers.destroy', $order) }}" method="post" >
                                  @csrf
                                  @method('delete')
                                  <button type="button" data-toggle="tooltip" data-placement="bottom" title="Delete Product" onclick="confirm('Are you sure you want to remove this product? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex h-6 w-6 mt-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                  </button>
                                </form> -->


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

                {{ $orders->links() }}
              </div>
            </div>
            <!-- Privat Offer Section End -->





          </div>
        </div>
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
