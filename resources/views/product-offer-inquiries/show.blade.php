@extends('layouts.app', ['page' => 'Edit Product Offer Inquiry', 'pageSlug' => 'edit-product-offer-inquiry', 'section' => 'main'])
@section('content')


<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">


  <div class="py-10">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">

      <h1 class="text-2xl font-bold text-gray-900">Product Offer Inquiry # {{$product_offer_inquiry->id }}</h1>



      @if (session()->has('message'))

      <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
          <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
          <div>
            <p class="font-bold">  {{ session('message') }}</p>
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
          <!-- This example requires Tailwind CSS v2.0+ -->
          <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
            <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
              <div class="ml-4 mt-2">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                  Inquiry Details
                </h3>
              </div>
              <div class="ml-4 mt-2 flex-shrink-0">
                <a href="{{ route('product-offer-inquiries.index') }}" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Back</a>
              </div>
            </div>
          </div>
          <div class="px-4 py-5 sm:p-6">
            <!-- Content goes here -->
            See your Inquiry Details
          </div>
        </div>
      </div>
    </div>

    <!-- CONTENT -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
      <div class="py-4">

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">


          <!-- This example requires Tailwind CSS v2.0+ -->
          <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
              <h3 class="text-lg leading-6 font-medium text-gray-900">Details of Inquiry # {{ $product_offer_inquiry->id}} from {{$product_offer_inquiry->created_at }} </h3>

            </div>
            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
              <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">From Company</dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$product_offer_inquiry->tenant->name }}</dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">To Company</dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                    @if($product_offer_inquiry->supplier($product_offer_inquiry->supplier_tenant_id))
                    {{$product_offer_inquiry->supplier($product_offer_inquiry->supplier_tenant_id)->name }}
                    @else
                    Public Inquiry - no supplier
                    @endif

                  </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">Status</dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">


                    @if($product_offer_inquiry->inquiry_status == 0)

                    <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-red-800">
                      Pending
                    </span>

                    @elseif ($product_offer_inquiry->inquiry_status == 1)
                    <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-orange-800">
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



                  </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">Date</dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ date('d.m.Y', strtotime($product_offer_inquiry->created_at))  }}</dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">Request Text</dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $product_offer_inquiry->request_text}} </dd>
                </div>

                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">Requested Products</dt>


                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col">
                      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                              <thead class="bg-gray-50">
                                <tr>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price / Unit</th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Requested Qty</th>

                                </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-gray-200">

                                @if ($product_offer_inquiry->public_product_offer_id)
                                @foreach ( $product_offer_inquiry->offer($product_offer_inquiry->public_product_offer_id)->products as $product )
                                <tr>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->product->name }}</td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->product->product_type->name }}</td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">  @foreach ( $product_offer_inquiry->offer($product_offer_inquiry->public_product_offer_id)->products as $product )
                                    {{ $product->product_price }} €<br>   {{ $product->product_unit->name }}
                                    @endforeach</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">  {{ $product_offer_inquiry->request_quantity }}</td>

                                  </tr>
                                  @endforeach

                                @endif


                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>

                    </dd>
                  </div>
                </dl>
              </div>
            </div>


          </main>

          @endsection
