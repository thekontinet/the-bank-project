@props(['disabled' => false, 'icon' => null])

<div class="relative group">
    <input
     {{ $disabled ? 'disabled' : '' }}
     {!! $attributes->merge(['class' => "pl-12 w-full h-12 p-4 py-2 font-sans text-base leading-5 text-slate-700 transition-all duration-300 bg-transparent border-2 border-slate-500 rounded-md placeholder:text-black/50 tw-accessibility"]) !!}
    />
    <div
      class="absolute top-0 left-0 flex items-center justify-center w-12 h-12 transition-colors duration-300 cursor-pointer text-slate-500 group-focus-within:text-slate-700"
    >
      {{$icon ?? null}}
    </div>
  </div>
