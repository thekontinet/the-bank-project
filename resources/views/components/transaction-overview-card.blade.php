@props(['title', 'content', 'progress' => 0])
<div class="col-span-12 md:col-span-6">
    <!--Blance widget-->
    <div
        class="h-full px-10 py-16 bg-white border shadow-xl dark:bg-muted-1000 rounded-xl border-muted-200 dark:border-muted-800 shadow-muted-400/10 dark:shadow-muted-800/10">
        <div class="flex flex-col justify-between h-full gap-7">
            <h4 class="text-sm font-semibold uppercase font-heading text-muted-400">
                {{ $content }}
            </h4>
            <div>
                <span
                    class="
              font-sans font-medium
              text-4xl text-muted-800
              dark:text-white
              first-letter:text-xl
            ">
                    {{ $title }}
                </span>
            </div>

            <div class="space-y-1">
                <p class="font-sans text-muted-500">%</p>
                <div class="w-full h-1 bg-muted-200 dark:bg-muted-800 rounded-full overflow-hidden">
                    <div class="h-1 bg-red-500" style="width: {{$progress}}%"></div>
                </div>
            </div>

            <div class="mt-2 text-right">
                @isset ($href)
                    <a href="{{ $href }}"
                        class="inline-flex items-center gap-3 transition-colors duration-300 group text-primary-500 hover:text-primary-400">
                        <span class="font-sans text-base font-medium">View all</span>
                        <i class="w-4 h-4 transition-transform duration-300 iconify group-hover:translate-x-1"
                            data-icon="lucide:arrow-right"></i>
                    </a>
                @endisset
            </div>
        </div>
    </div>
</div>
