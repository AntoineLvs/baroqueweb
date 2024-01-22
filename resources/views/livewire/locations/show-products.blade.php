<!-- CONTENT -->
<!-- This example requires Tailwind CSS v2.0+ -->
<div class=" bg-gray-50 max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
    <div class="py-4">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Products Informations
                </h3>

            </div>

        @foreach ($products as $product)
        <div class="bg-white border border-gray-200 overflow-hidden shadow rounded-lg divide-y divide-gray-200 mt-6">
            <div class="px-4 py-5 sm:px-6">
                <div class="px-4 py-5 sm:px-6">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="font-medium text-gray-900 mb-6">
                                Product name
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 flex items-center">
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
                            </dd>

                        </div>
                        <div class="sm:col-span-1">
                            <dt class=" font-medium text-gray-900 mb-6">
                                Product Type
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                <div class="text-sm text-gray-900">{{ $product->product_type->name}}</div>
                                <div class="text-sm text-gray-500">PTID: {{ $product->product_type_id }}</div>
                            </dd>
                        </div>


                        <div class="sm:col-span-1">
                            <dt class=" font-medium text-gray-900 mb-6">
                                More About it
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                @if ($product->data)
                                {{ $product->data }}
                                @else
                                <div class="text-sm text-gray-900">
                                    No Product description available
                                </div>
                                @endif

                            </dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="font-medium text-gray-900 mb-6">
                                Documents
                            </dt>
                            @if ($product->document_id)
                            @foreach($this->getDocuments($product->id) as $document)
                            <div class="flex items-center mb-2">
                                <a href="{{ asset($document->file_path) }}" target="_blank" rel="noopener noreferrer" download class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m0-3l-3-3m0 0l-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75" />
                                    </svg>
                                    <span class="text-sm text-gray-500 hover:text-gray-900">{{ $document->filename }}</span>
                                </a>
                            </div>
                            @endforeach
                            @else 
                            <div class="flex items-center mb-2">
                                <div class="text-sm text-gray-500 ">No documents available</div>
                            </div>
                            @endif
                        </div>

                    </dl>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

