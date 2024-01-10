<div>
    <div class="mt-4">
        <label class="block font-medium text-sm text-gray-700" for="{{ $parentLabel }}">
            {{ $parentLabel }}
        </label>
        <select wire:model="parentValue" name="{{ $parentInputName }}"
                class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" required>
            <option value="">-- please choose --</option>
            @foreach ($parents as $parent)
                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mt-4">
        <label class="block font-medium text-sm text-gray-700" for="{{ $childLabel }}">
            {{ $childLabel }}
        </label>

        <select wire:model="childValue" name="{{ $childInputName }}"
                class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" required>
            @if ($children->count() == 0)
                <option value="">-- choose {{ strtolower($parentLabel) }} first --</option>
            @endif
            @foreach ($children as $child)
                <option value="{{ $child->id }}">{{ $child->name }}</option>
            @endforeach
        </select>
    </div>
</div>
