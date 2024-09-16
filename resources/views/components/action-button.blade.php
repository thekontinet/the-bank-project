@props(['title', 'href', 'icon'])

<a href="{{ $href }}"
    class="mx-auto border w-full transition-colors rounded-lg border-primary-300 flex justify-between gap-4 items-center h-20 py-4 px-4 hover:bg-primary-500 hover:text-white group">
    <span class="text-sm">{{ $title }}</span>
    <span class="iconify w-6 h-6 text-current duration-300 group-hover:rotate-180 text-primary-600 group-hover:text-white"
        data-icon='lucide:{{ $icon }}'></span>
</a>
