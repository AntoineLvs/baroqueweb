@extends('layouts.app', ['page' => 'Produkte', 'pageSlug' => 'products', 'section' => 'main'])
@section('content')

    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
        <div class="py-10">
            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-2xl font-bold text-gray-900">Products</h1>
                <x-message-component></x-message-component>
            </div>


            <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
                <div class="py-4">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="card-title">Produkte</h3>
                        </div>
                        <div class="px-4 py-5 sm:p-6">
                            <!-- Content goes here -->

                            <div>
                                <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent
              text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Produkt erstellen</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <!-- Products start -->
            <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
                <div class="py-4">
                    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">

                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="card-title">Meine Produkte</h3>
                        </div>
                        <div class="px-4 py-5 sm:p-6">

                            @if($products->count() == 0 )

                                <button type="button" onclick=window.location='{{ route("products.create") }}'
                                        class="relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-6 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg class="mx-auto h-12 w-12 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                         stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="block text-sm font-medium text-gray-500">
                Noch keine Produkte vorhanden. Jetzt anlegen.
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
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Produkt
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Produkt
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Produkt Type
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Details
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Einheit
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Status
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Aktiv
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Bearbeiten
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Aktionen
                                                        </th>

                                                    </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-200">

                                                    @foreach ($products as $product)
                                                        <tr>


                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div class="flex items-center">
                                                                    <div class="flex-shrink-0 h-10 w-10">


                                                                        <img style="background: lightgrey;"
                                                                             class="h-10 w-10 rounded-full ring-2 ring-green"
                                                                             src="{{ $product->image_path }}" alt="">

                                                                    </div>

                                                                    <div class="ml-4">
                                                                        <div class="text-sm font-medium text-gray-900">

                                                                            {{ $product->name }}
                                                                        </div>
                                                                        <div class="text-sm text-gray-500">

                                                                            @if ( $product->base_product_id)
                                                                                {{ $product->base_product->name }}
                                                                            @endif


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div class="text-sm text-gray-900">
                                                                    PID: {{ $product->id }}</div>
                                                                <div class="text-sm text-gray-900">
                                                                    TID: {{ $product->tenant->id ?? 'admin' }} {{ $product->tenant->name ?? 'admin' }}</div>
                                                            </td>

                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div
                                                                    class="text-sm text-gray-900">{{ $product->product_type->name}}
                                                                   @if($product->blend_percent) ({{ $product->blend_percent}} %) @endif
                                                                </div>

                                                            </td>

                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">


                                                                <div
                                                                    class="text-sm text-gray-900"> {{ $product->data }}</div>


                                                            </td>

                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

                                                                {{ $product->product_unit->name ?? '' }}


                                                            </td>

                                                            <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                              Verfügbar
                            </span>
                                                            </td>

                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">


                                                                @livewire('components.toggle-button',
                                                                [
                                                                'model' => $product,
                                                                'field' => 'active',
                                                                ])

                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">


                                                                <a href="{{ route('products.edit', $product) }}"
                                                                   data-toggle="tooltip" data-placement="bottom"
                                                                   title="Edit Product">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                         class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                                         stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                              stroke-linejoin="round" stroke-width="2"
                                                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                                    </svg>
                                                                </a>


                                                            </td>

                                                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">


                                                                <form action="{{ route('products.destroy', $product) }}"
                                                                      method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="button" data-toggle="tooltip"
                                                                            data-placement="bottom"
                                                                            title="Delete Product"
                                                                            onclick="confirm('Are you sure you want to remove this product? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             class="h-6 w-6 mt-3" fill="none"
                                                                             viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round"
                                                                                  stroke-linejoin="round"
                                                                                  stroke-width="2"
                                                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                                        </svg>
                                                                    </button>
                                                                </form>


                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                    <!-- More people... -->
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{ $products->links() }}

                        </div>
                    </div>
                </div>
            </div>
            <!-- Products end -->


        </div>
    </main>

@endsection
