<div class="flex items-center justify-between w-full gap-6 py-4">
    <div class="flex items-center max-w-md gap-4 grow">
      <!--Expand sidebar button-->
      <button
        type="button"
        class="items-center justify-center w-10 h-10 transition-colors duration-300 cursor-pointer mask mask-blob hover:bg-muted-200 dark:hover:bg-muted-800 text-muted-700 dark:text-muted-400"
        :class="$store.app.isLayoutCompact ? 'lg:flex' : 'hidden'"
        @click="$store.app.isLayoutCompact = false"
      >
        <i class="w-5 h-5 iconify" data-icon="ph:dots-nine-duotone"></i>
      </button>

      <!--Mobile menu-->
      <button
        type="button"
        class="flex items-center justify-center w-10 h-10 transition-colors duration-300 cursor-pointer lg:hidden mask mask-blob hover:bg-muted-200 dark:hover:bg-muted-900 text-muted-700 dark:text-muted-400"
        @click="$store.app.isMobileOpen = true"
      >
        <i class="w-5 h-5 iconify" data-icon="ph:dots-nine-duotone"></i>
      </button>
    </div>

    <div class="flex items-center gap-x-4">
      <!--Theme toggler-->
      <label
        class="
          relative
          block
          h-6
          w-14
          bg-muted-200
          dark:bg-muted-700
          rounded-full
          scale-[0.8]
        "
      >
        <input
          class="absolute top-0 left-0 z-10 w-full h-full opacity-0 cursor-pointer peer"
          type="checkbox"
          :checked="$store.app.isDark"
          @click="toggleTheme(); localStorage.setItem('dark', JSON.stringify($store.app.isDark))"
        />
        <span
          class="
            absolute
            -top-2
            -left-1
            flex
            items-center
            justify-center
            h-10
            w-10
            bg-white
            dark:bg-muted-900
            border border-muted-200
            dark:border-muted-800
            rounded-full
            -ml-1
            peer-checked:ml-[45%] peer-checked:rotate-[360deg]
            transition-all
            duration-300
          "
        >
          <i
            class="w-6 h-6 text-yellow-400 fill-current iconify"
            data-icon="heroicons-solid:sun"
            x-show="!$store.app.isDark"
          ></i>
          <i
            class="w-6 h-6 text-yellow-400 fill-current iconify"
            data-icon="pepicons:moon-filled"
            x-show="$store.app.isDark"
          ></i>
        </span>
      </label>

      <!--Panel button-->
      <a
        type="button"
        class="inline-flex items-center justify-center w-10 h-10 font-sans text-sm transition-all duration-300 bg-white rounded-full shadow-lg text-muted-300 dark:text-muted-700 hover:text-yellow-400 dark:hover:text-yellow-400 dark:bg-muted-1000 shadow-muted-400/20 dark:shadow-muted-800/30 hover:shadow-xl tw-accessibility"
        href="/dashboard"
      >
        <i class="w-6 h-6 animate-bounce text-gray-500 iconify" data-icon="fluent:person-20-filled"></i>
      </a>
    </div>
  </div>
