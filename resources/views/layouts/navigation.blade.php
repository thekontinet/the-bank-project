{{-- <nav x-data="{ open: false }" class="bg-white border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block w-auto text-gray-800 fill-current h-9 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav> --}}

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
            <i class="w-5 h-5 iconify" data-icon="fluent:flash-28-filled"></i>
        </a>
      @endif
    </div>
  </div>
