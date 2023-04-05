@props(['limit'])
@if (session()->has('show-loader'))
<div x-data="progress({{$limit}})" x-show="show" class="absolute inset-0 flex items-center justify-center h-screen bg-primary-500">
    <div class="w-full max-w-sm text-center text-white">
        <i class="w-10 h-10 mx-auto text-inherit iconify animate-spin" data-icon="lucide:loader-2"></i>
        <p x-text="pgText">Please Wait</p>
        <div class="w-full overflow-hidden rounded-full bg-primary-300">
            <div class="transition-all duration-500 bg-white" x-bind:style="{width:pg+'%'}">
                <span class="block text-right text-primary-600" x-text='pg+"%"'></span>
            </div>
        </div>
    </div>
</div>
@endif
