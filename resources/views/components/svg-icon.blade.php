@props(['icon', 'class' => 'h-5 w-5 text-gray-500']) <!-- Default classes for size and color -->

<div {!! $attributes->merge(['class' => $class]) !!}>
    {!! app(App\Services\SvgIconService::class)->getSvgIcon($icon) !!}
</div>
