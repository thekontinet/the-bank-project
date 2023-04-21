@props(['title', 'href', 'icon'])

<a href="{{$href}}" class="mx-auto border w-full transition-colors rounded-lg border-primary-300 flex justify-between gap-4 items-center py-8 px-4 hover:bg-primary-500 hover:text-white">
    <span class="text-sm">{{$title}}</span>
    <span class="iconify w-6 h-6 text-current" data-icon='lucide:{{$icon}}'></span>
</a>
