<div>
    <div class="bg-gray-50 max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
        <div class="py-4">
            <div class="bg-white overflow-hidden shadow rounded-lg border border-gray-200 divide-y divide-gray-200">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Tenant Information
                    </h3>

                </div>
                <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Tenant / Name
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $tenant->name }}
                            </dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Tenant address
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $tenant->street }}
                            </dd>
                        </div>


                        <div class="sm:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">
                                Tenant email
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $tenant->email }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <!-- Location start div-->
    <div class="bg-gray-50 max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
        <div class="py-4">
            <div class="bg-white overflow-hidden shadow border border-gray-200 rounded-lg divide-y divide-gray-200">

                <div class="px-4 py-5 sm:px-6">
                    <h3 class="card-title"> {{ $tenant->name }} owns these locations</h3>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex flex-col">
                        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                                <table class="min-w-full divide-y divide-gray-200  border border-gray-200">
                                    <thead class="bg-gray-100">

                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium border-b-2 border-gray-300 text-gray-500 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium border-b-2 border-gray-300 text-gray-500 uppercase tracking-wider">
                                                Address
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium border-b-2 border-gray-300 text-gray-500 uppercase tracking-wider">
                                                State
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium border-b-2 border-gray-300 text-gray-500 uppercase tracking-wider">
                                                <!-- Opening hours -->
                                            </th>
                                      
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium border-b-2 border-gray-300 text-gray-500 uppercase tracking-wider">
                                                Services
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium border-b-2 border-gray-300 text-gray-500 uppercase tracking-wider">
                                                Renewable Diesel
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium border-b-2 border-gray-300 text-gray-500 uppercase tracking-wider">
                                                Renewable Petrol
                                            </th>

                                            <th class="px-6 py-3 text-left text-xs font-medium border-b-2 border-gray-300 text-gray-500 uppercase tracking-wider"></th>

                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">



                                        @foreach($locations as $location)
                                        <tr wire:key="{{$location->id}}">
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-10 w-10">
                                                                <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-green" src="{{ $location->image_path }}" alt="">
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    <a href="{{ route('locations.profile-locations-public', ['id' => $location->id]) }}">{{ $location->name }}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <div class="text-sm text-gray-900">{{$location->address}}</div>
                                                <div class="text-sm text-gray-500">{{$location->zipcode}}/{{$location->city}}</div>
                                            </td>
                                            <td class="whitespace-no-wrap border-b border-gray-200">



                                                @php
                                                $statusInfo = $location->getStatus();
                                                @endphp
                                                <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $statusInfo['color'] }}-200 text-{{ $statusInfo['color'] }}-800">
                                                    {{ $statusInfo['text'] }}
                                                </span>

                                            </td>

                                            <td class="whitespace-no-wrap border-b border-gray-200">
                                                <div class="flex ml-auto items-center" style="display:flex; float: center;">
                                                    <div class="flex items-center justify-end">
                                                        <div class="image-container">
                                                            <div class="flex items-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 ml-2" fill="{{ $location->isOpen() ? 'rgb(0, 160, 0)' : 'red' }}">
                                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5h-3.25V5z" clip-rule="evenodd" />
                                                                </svg>
                                                                <span class="tooltip text-gray-500">{{ substr($location->opening_start, 0, 5) }} / {{ substr($location->opening_end, 0, 5) }}</span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                                <ul style="display: flex; list-style: none; padding: 0; ">

                                                    @if ($location->service_id)
                                                    <div class="image-container">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                                        </svg>
                                                        <span class="tooltip">
                                                            @foreach($this->getServices($location->id) as $service)
                                                            {{ $loop->first ? '' : ', ' }}{{ $service->name }}
                                                            @endforeach
                                                        </span>
                                                    </div>
                                                    @else
                                                    <span>-</span>
                                                    @endif
                                                </ul>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                                <ul style="display: flex; list-style: none; padding: 0; ">

                                                    @if ($location->product_id)
                                                    @foreach(json_decode($location->product_id) as $productId)
                                                    @php
                                                    $product = $products->where('id', $productId)->first();
                                                    @endphp
                                                    @if ($product->product_type_id == 1)

                                                    <div class="image-container">

                                                        <li style="margin-right: 10px;"> <a href="{{ route('locations.show-products', ['id' => $location->id]) }}">
                                                                <img style="background: lightgrey; min-width:34px; min-height:34px;" class="h-8 w-8 rounded-full ring-2 ring-green" src="{{ $product->image_path }}" alt="">
                                                                <span class="tooltip">{{ $product->name }} @if($product->blend_percent) ({{ $product->blend_percent }}%) @endif</span>
                                                            </a>
                                                        </li>
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                    @else
                                                    <li>-</li>
                                                    @endif
                                                </ul>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                                <ul style="display: flex; list-style: none; padding: 0; ">

                                                    @if ($location->product_id)
                                                    @foreach(json_decode($location->product_id) as $productId)
                                                    @php
                                                    $product = $products->where('id', $productId)->first();
                                                    @endphp
                                                    @if ($product->product_type_id == 2)
                                                    <li style="margin-right: 10px;"> <img style="background: lightgrey; min-width:34px; min-height:34px;" class="h-8 w-8 rounded-full ring-2 ring-green" src="{{ $product->image_path }}" alt="">
                                                        <span class="tooltip">{{ $product->name }} @if($product->blend_percent) ({{ $product->blend_percent }}%) @endif</span>

                                                    </li>
                                                    @endif
                                                    @endforeach
                                                    @else
                                                    <li>-</li>
                                                    @endif
                                                </ul>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Show on Map</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- Service end div-->
                    <!-- final div-->
                </div>
            </div>
        </div>
    </div>
</div>