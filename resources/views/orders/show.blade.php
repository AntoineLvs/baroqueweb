@extends('layouts.app', ['page' => 'Order bearbeiten', 'pageSlug' => 'orders', 'section' => 'main'])
@section('content')

    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
        <div>


            <div class="py-10">
                <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-bold text-gray-900">Order Übersicht</h1>
                    <x-message-component></x-message-component>
                </div>


                <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">


                    <div class="py-4">
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                                <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                                    <div class="ml-4 mt-2">
                                        <p class="text-lg leading-6 font-medium text-gray-900">
                                            Details
                                        </p>
                                    </div>
                                    <div class="ml-4 mt-2 flex-shrink-0">
                                        <a href="{{ route('orders.index') }}"
                                           class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Back</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- CONTENT -->
                <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
                    <div class="py-4">

                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="card-title">Order Details #{{$order->id}}</h3>
                                <!-- We use less vertical padding on card headers on desktop than on body sections -->

                            </div>

                            <div class="px-4 py-5 sm:p-6">
                                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                                    <div>

                                        <div class="mx-auto max-w-2xl space-y-16 sm:space-y-20 lg:mx-0 lg:max-w-none">
                                            <div>
                                                <h2 class="text-base font-semibold leading-7 text-gray-900">Details</h2>
                                                <p class="mt-1 text-sm leading-6 text-gray-500">Order Übersicht</p>

                                                <dl class="mt-6 space-y-6 divide-y divide-gray-100 border-t border-gray-200 text-sm leading-6">
                                                    <div class="pt-6 sm:flex">
                                                        <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">
                                                            Tenant
                                                        </dt>
                                                        <dd class="mt-1 flex justify-between gap-x-6 sm:mt-0 sm:flex-auto">
                                                            <div class="text-gray-900">{{$order->tenant->name}}</div>

                                                        </dd>
                                                    </div>

                                                    <div class="pt-6 sm:flex">
                                                        <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">
                                                            Firma
                                                        </dt>
                                                        <dd class="mt-1 flex justify-between gap-x-6 sm:mt-0 sm:flex-auto">
                                                            <div class="text-gray-900">{{ $order->customer_company_name }}</div>

                                                        </dd>
                                                    </div>
                                                    <div class="pt-6 sm:flex">
                                                        <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">
                                                            Kontakt
                                                        </dt>
                                                        <dd class="mt-1 flex justify-between gap-x-6 sm:mt-0 sm:flex-auto">
                                                            <div class="text-gray-900">{{ $order->customer_contact_firstname }} {{ $order->customer_contact_lastname }}, {{ $order->customer_street }} {{ $order->customer_zip }} {{ $order->customer_city }}b<br>
                                                                {{ $order->customer_email }} {{ $order->customer_phone }}
                                                            </div>


                                                        </dd>
                                                    </div>

                                                </dl>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>


                <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
                    <div class="py-4">

                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="card-title">Ordered Products #{{$order->id}}</h3>
                                <!-- We use less vertical padding on card headers on desktop than on body sections -->

                            </div>

                            <div class="px-4 py-5 sm:p-6">



                                    <div class="sm:flex sm:items-center">
                                        <div class="sm:flex-auto">
                                            <h1 class="text-base font-semibold leading-6 text-gray-900">Products</h1>
                                            <p class="mt-2 text-sm text-gray-700">A list of all offered products</p>
                                        </div>
                                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                            <button type="button" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</button>
                                        </div>
                                    </div>
                                    <div class="mt-8 flow-root">
                                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                                                    <table class="min-w-full divide-y divide-gray-300">
                                                        <thead class="bg-gray-50">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price / Unit</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tax</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="divide-y divide-gray-200 bg-white">

                                                        @foreach($order->orderedProducts as $index => $ordered_product)
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $ordered_product['product']['name'] }}</td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $ordered_product['product_quantity'] }}</td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $ordered_product['product_price'] }}</td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $ordered_product['product_tax'] }}</td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $ordered_product['total_amount'] }}</td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

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

                        </div>

                    </div>
                </div>


            </div>


        </div>
    </main>

@endsection
