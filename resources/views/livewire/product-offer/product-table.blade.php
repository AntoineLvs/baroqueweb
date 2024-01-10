<div x-data="{}">
    <div class="mb-4 px-4 py-3 leading-normal text-blue-700 bg-blue-100 rounded-lg" role="alert">
        Click "Edit", modify that line data and click "Save".
    </div>
    <table class="table min-w-full">
        <thead>
        <tr>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Product</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Price</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider"></th>
        </tr>
        </thead>

        <tbody class="bg-white">
        @foreach ($products as $index => $product)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                    @if ($editedProductIndex === $index || $editedProductField === $index . '.unit')
                        <input type="text"
                               @click.away="$wire.editedProductField === '{{ $index }}.data' ? $wire.saveProduct({{ $index }}) : null"
                               wire:model.defer="products.{{ $index }}.unit"
                               class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border w-full py-2 focus:outline-none focus:border-blue-400 {{ $errors->has('products.' . $index . '.name') ? 'border-red-500' : 'border-gray-400' }}"
                        />
                        @if ($errors->has('products.' . $index . '.unit'))
                            <div class="text-red-500">{{ $errors->first('products.' . $index . '.unit') }}</div>
                        @endif
                    @else
                        <div class="cursor-pointer" wire:click="editProductField({{ $index }}, 'unit')">
                            {{ $product['unit'] }}
                        </div>
                    @endif
                </td>

                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                    @if ($editedProductIndex === $index || $editedProductField === $index . '.price')
                        <input type="text"
                               @click.away="$wire.editedProductField === '{{ $index }}.price' ? $wire.saveProduct({{ $index }}) : null"
                               wire:model.defer="products.{{ $index }}.price"
                               class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border w-full py-2 focus:outline-none focus:border-blue-400 {{ $errors->has('products.' . $index . '.price') ? 'border-red-500' : 'border-gray-400' }}"
                        />
                        @if ($errors->has('products.' . $index . '.price'))
                            <div class="text-red-500">{{ $errors->first('products.' . $index . '.price') }}</div>
                        @endif
                    @else
                        <div class="cursor-pointer" wire:click="editProductField({{ $index }}, 'price')">
                            {{ $product['price'] }}
                        </div>
                    @endif
                </td>


                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                    @if($editedProductIndex === $index || (isset($editedProductField) && (int)(explode('.',$editedProductField)[0])===$index))
                        <button
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                                wire:click.prevent="saveProduct({{$index}})">
                            Save
                        </button>
                    @else
                        <button
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                                wire:click.prevent="editProduct({{$index}})">
                            Edit
                        </button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
