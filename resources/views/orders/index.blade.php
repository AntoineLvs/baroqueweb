@extends('layouts.app', ['page' => 'Standards', 'pageSlug' => 'Standards', 'section' => 'main'])
@section('content')

    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
        <div class="py-10">
            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-2xl font-bold text-gray-900">Orders</h1>

              <x-message-component></x-message-component>
            </div>

            <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
                <div class="py-4">
                    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
                        <div class="px-4 py-5 sm:p-6">
                            <div>
                                <a href="{{ route('orders.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent
                text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CONTENT -->
            <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
                <div class="py-4">
                    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="card-title">Orders</h3>
                        </div>
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                <tr>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kunde</th>

                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Adresse</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kontakt</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produkte</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Datum</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Status</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Type</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $order->id }}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                            {{ $order->customer_contact_firstname }}  {{ $order->customer_contact_lastname }}<br>
                                                            {{ $order->customer_company_name }}</td>

                                                         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                             {{ $order->customer_street }}<br>
                                                             {{ $order->customer_zip }} {{ $order->customer_city }}
                                                         </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                            {{ $order->customer_email }}<br>
                                                            {{ $order->customer_phone }}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                          @foreach($order->orderedProducts as $orderedProduct)
                                                              <div class="text-xs text-gray-700">
                                                              {{ $orderedProduct->product->name }}<br>
                                                                ({{ $orderedProduct->product->product_type->name }})<br>
                                                              </div>
                                                            @endforeach
                                                        </td>

                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                            {{ $order->created_at->format('d-m-Y')}}
                                                        </td>


                                                        <td class="px-6 py-4 whitespace-nowrap">

                                                            <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $order->status->color}}-200 text-{{ $order->status->color}}-800">
                                                                {{ $order->status->name }}
                                                            </span>

                                                        </td>

                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                                                                {{ $order->type->name }}
                                                            </span>
                                                        </td>


                                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                            <a href="{{ route('orders.edit', $order) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                            <form action="{{ route('orders.destroy', $order) }}" method="post" style="display:inline;">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
