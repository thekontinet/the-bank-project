<div
x-cloak
class="
  fixed
  top-0
  right-0
  h-full
  w-[280px]
  bg-white
  dark:bg-muted-1000
  shadow-2xl shadow-muted-400/20
  dark:shadow-muted-800/20
  transition-all
  duration-300
  z-40
"
:class="[
  $store.app.isPanelOpen ? 'translate-x-0' : 'translate-x-full'
]"
>
<!--Header-->
<div
  class="flex items-center justify-between w-full h-20 px-6 border-b border-muted-200 dark:border-muted-900"
>
  <h3
    class="text-xs font-semibold uppercase font-heading text-muted-500 dark:text-muted-100"
  >
    Action Bar
  </h3>

  <!--Close button-->
  <button
    type="button"
    class="flex items-center justify-center w-10 h-10 transition-colors duration-300 cursor-pointer mask mask-blob hover:bg-muted-100 dark:hover:bg-muted-800 text-muted-700 dark:text-muted-400"
    @click="$store.app.isPanelOpen = false"
  >
    <i class="w-4 h-4 iconify" data-icon="ph:arrow-right-duotone"></i>
  </button>
</div>
<!--Body-->
<div
  class="relative h-[calc(100%_-_5rem)] w-full overflow-y-auto slimscroll p-6"
>
  <!--Placeholder-->
  <div class="py-6">
    <h4 class="font-heading text-muted-700 dark:text-muted-200">
      No action items.
    </h4>
    <p class="font-sans text-sm text-muted-400">
      It seems everything is up to date.
    </p>
  </div>
</div>
</div>
