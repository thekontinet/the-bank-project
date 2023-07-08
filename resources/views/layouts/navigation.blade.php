<div class="flex items-center justify-between w-full gap-6 py-4 print:hidden">
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
      <!--Search-->
      <div
        x-data="search()"
        class="relative hidden w-full rounded-md shadow-sm md:block"
      >
        <!--Results-->
        <div
          id="search-results"
          class="
            hidden
            absolute
            top-12
            left-0
            w-full
            max-h-[240px]
            overflow-y-auto
            slimscroll
            p-2
            rounded-lg
            bg-white
            dark:bg-muted-900
            border border-muted-200
            dark:border-muted-800
            shadow-2xl shadow-muted-400/20
            dark:shadow-muted-800/10
            transition-all
            duration-300
            z-[90]
          "
        ></div>
      </div>
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

      <!--Money dropdown-->
      <div x-data="dropdown()" class="relative" @click.away="close()">
        <button
          type="button"
          class="inline-flex items-center justify-center h-10 px-6 py-2 font-sans text-sm text-white transition-all duration-300 rounded-full shadow-lg gap-x-2 bg-primary-500 shadow-primary-500/20 hover:shadow-xl tw-accessibility"
          @click="open()"
        >
          <span>Move Money</span>
          <i
            class="w-4 h-4 transition-transform duration-300 iconify"
            :class="isOpen ? 'rotate-180' : ''"
            data-icon="lucide:chevron-down"
          ></i>
        </button>

        <!--Dropdown menu-->
        <div
          x-cloak
          x-show="isOpen"
          x-transition
          class="
            absolute
            top-11
            right-0
            w-[240px]
            overflow-y-auto
            slimscroll
            p-2
            rounded-lg
            bg-white
            dark:bg-muted-900
            border border-muted-200
            dark:border-muted-800
            shadow-2xl shadow-muted-400/20
            dark:shadow-muted-800/10
            z-20
          "
        >
          <ul class="space-y-1">
            <li>
              <a
                href="{{route('send.create')}}"
                class="flex items-center gap-3 p-2 transition-colors duration-300 rounded-lg text-muted-400 hover:text-primary-500 hover:bg-muted-100 dark:hover:bg-muted-800"
              >
                <i class="w-5 h-5 iconify" data-icon="ph:arrow-right-duotone"></i>
                <div class="font-sans">
                  <h5
                    class="text-sm font-semibold text-muted-800 dark:text-muted-200"
                  >
                    Wire Transfer
                  </h5>
                  <p class="text-xs text-muted-400">Send a wire payment to someone</p>
                </div>
              </a>
            </li>
            <li>
                <a
                  href="{{route('send.create', ['dom'=>''])}}"
                  class="flex items-center gap-3 p-2 transition-colors duration-300 rounded-lg text-muted-400 hover:text-primary-500 hover:bg-muted-100 dark:hover:bg-muted-800"
                >
                  <i class="w-5 h-5 iconify" data-icon="ph:arrow-right-duotone"></i>
                  <div class="font-sans">
                    <h5
                      class="text-sm font-semibold text-muted-800 dark:text-muted-200"
                    >
                      Domestic Transfer
                    </h5>
                    <p class="text-xs text-muted-400">Send someone money</p>
                  </div>
                </a>
              </li>
            <li>
              <a
                href="{{route('deposit.create')}}"
                class="flex items-center gap-3 p-2 transition-colors duration-300 rounded-lg text-muted-400 hover:text-primary-500 hover:bg-muted-100 dark:hover:bg-muted-800"
              >
                <i class="w-5 h-5 iconify" data-icon="lucide:dollar-sign"></i>
                <div class="font-sans">
                  <h5
                    class="text-sm font-semibold text-muted-800 dark:text-muted-200"
                  >
                    Online Deposit
                  </h5>
                  <p class="text-xs text-muted-400">Add funds to your account</p>
                </div>
              </a>
            </li>
            <li>
              <a
                href="/accounts"
                class="flex items-center gap-3 p-2 transition-colors duration-300 rounded-lg text-muted-400 hover:text-primary-500 hover:bg-muted-100 dark:hover:bg-muted-800"
              >
                <i class="w-5 h-5 iconify" data-icon="ph:wallet-duotone"></i>
                <div class="font-sans">
                  <h5
                    class="text-sm font-semibold text-muted-800 dark:text-muted-200"
                  >
                    Accounts
                  </h5>
                  <p class="text-xs text-muted-400">Manage your accounts</p>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <!--Panel button-->
      @if (auth()->user()->hasAdminRole())
      <a
        href="{{route('admin.users.index')}}"
        class="inline-flex items-center justify-center w-10 h-10 font-sans text-sm transition-all duration-300 bg-white rounded-full shadow-lg text-muted-300 dark:text-muted-700 hover:text-yellow-400 dark:hover:text-yellow-400 dark:bg-muted-1000 shadow-muted-400/20 dark:shadow-muted-800/30 hover:shadow-xl tw-accessibility"
        >
        <i class="w-6 h-6 animate-bounce text-gray-500 iconify" data-icon="fluent:person-ribbon-20-filled"></i>
        </a>
      @endif
    </div>
  </div>
