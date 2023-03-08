@if ($attributes->has('href'))
<a
    {{ $attributes->merge(['type' => 'submit', 'class' => "inline-flex items-center justify-center h-9 px-4 py-2 text-sm text-white transition-colors duration-300 rounded-md font-heading bg-primary-500 hover:bg-primary-600"]) }}
    >
    {{ $slot }}
</a>
@else
<button
{{ $attributes->merge(['type' => 'submit', 'class' => "inline-flex items-center justify-center h-9 px-4 py-2 text-sm text-white transition-colors duration-300 rounded-md font-heading bg-primary-500 hover:bg-primary-600"]) }}
>
{{ $slot }}
</button>
@endif
