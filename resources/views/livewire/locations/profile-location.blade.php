<!-- CONTENT -->
<!-- This example requires Tailwind CSS v2.0+ -->
<div>
    <div class=" bg-gray-50 max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
        <div class="py-4">
            <div class="bg-white border border-gray-200 overflow-hidden shadow rounded-lg divide-y divide-gray-200">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Location Information
                    </h3>

                </div>
                <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Location / Name
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $location->name }}
                            </dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Location Type
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $location->location_type->name }}
                            </dd>
                        </div>


                        <div class="sm:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">
                                About
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                @if ($location->description)
                                {{ $location->description }}
                                @else
                                No Company description available
                                @endif

                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <!-- Product start div-->

    <div class="bg-gray-50 max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
        <div class="py-4">
            <div class="bg-white overflow-hidden shadow border border-gray-200 rounded-lg divide-y divide-gray-200">

                <div class="px-4 py-5 sm:px-6">
                    <h3 class="card-title"> {{ $location->name }} offers these products</h3>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium border-b-2 border-gray-300 text-gray-500 uppercase tracking-wider">
                                                    Product
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium border-b-2 border-gray-300 text-gray-500 uppercase tracking-wider">
                                                    Product Type
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium border-b-2 border-gray-300 text-gray-500 uppercase tracking-wider">
                                                    Product Data
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium border-b-2 border-gray-300 text-gray-500 uppercase tracking-wider">
                                                    Satus
                                                </th>
                                                <th class="px-6 py-3 text-left text-xs font-medium border-b-2 border-gray-300 text-gray-500 uppercase tracking-wider">

                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">

                                            @foreach ($products as $product)
                                            <tr>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">


                                                            <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-green" src="{{ $product->image_path }}" alt="">

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
            </div>
        </div>
    </div>
    <div class="bg-gray-50 max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
        <div class="py-4">
            <div class="bg-white overflow-hidden shadow border border-gray-200 rounded-lg divide-y divide-gray-200">

                <div class="px-4 py-5 sm:px-6">
                    <h3 class="card-title"> {{ $location->name }} offers these services</h3>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium border-b-2 border-gray-300 text-gray-500 uppercase tracking-wider">
                                                    Service
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium border-b-2 border-gray-300 text-gray-500 uppercase tracking-wider">
                                                    Description
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium border-b-2 border-gray-300 text-gray-500 uppercase tracking-wider">
                                                    Einheit
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium border-b-2 border-gray-300 text-gray-500 uppercase tracking-wider">
                                                    Satus
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">

                                            @foreach ($services as $service)
                                            <tr>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-green" src="{{ $service->image_path }}" alt="">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $service->name }}
                                                            </div>
                                                            <div class="text-sm text-gray-500">
                                                                PID: {{ $service->id }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $service->description }}

                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    Einheit
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                                                        Available
                                                    </span>
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
<!-- Service end div-->
<!-- final div-->