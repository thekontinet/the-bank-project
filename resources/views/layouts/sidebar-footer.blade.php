<div
  class="flex items-center justify-between w-full h-20"
  :class="$store.app.isLayoutCompact ? 'px-2' : 'px-6'"
>
  <!--Account menu-->
  <div
    x-data="dropdown()"
    class="relative flex items-center justify-between w-full h-20"
    @click.away="close()"
  >
    <!--Dropdown button-->
    <button type="button" class="flex items-center w-full gap-2" @click="open()">
      <img
        class="object-cover w-10 h-10 rounded-full"
        :class="$store.app.isLayoutCompact ? 'mx-auto' : 'mx-0'"
        src="{{auth()->user()->avatar}}"
        alt="User photo"
      />
      <span :class="$store.app.isLayoutCompact ? 'hidden' : 'block'">
        <h5 class="font-semibold font-heading text-muted-600 dark:text-muted-200">
           {{auth()->user()->firstname}}
        </h5>
      </span>
      <i
        class="w-5 h-5 ml-auto transition-transform duration-300 iconify text-muted-400"
        :class="[
          $store.app.isLayoutCompact ? 'hidden' : 'block',
          isOpen ? 'rotate-180' : ''
        ]"
        data-icon="lucide:chevron-up"
      ></i>
    </button>

    <!--Dropdown menu-->
    <div
      x-cloak
      x-show="isOpen"
      x-transition
      class="
        absolute
        -top-48
        -left-2
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
      <!--Header-->
      <div
        class="flex items-center px-6 py-4 border-b gap-x-2 border-muted-200 dark:border-muted-700"
      >
        <div class="relative flex items-center justify-center w-12 h-12">
          <img
          src="{{auth()->user()->avatar}}"
            class="object-cover w-full h-full rounded-full"
            alt="Profile image"
            width="48"
            height="48"
          />
        </div>
        <h3
          class="font-sans text-sm font-medium uppercase text-muted-500 dark:text-muted-200"
        >
          Hi, {{auth()->user()->firstname}}
        </h3>
      </div>
      <ul class="pt-2 space-y-1">
        <li>
          <a
            href="/profile"
            class="flex items-center gap-3 p-2 transition-colors duration-300 rounded-lg text-muted-400 hover:text-primary-500 hover:bg-muted-100 dark:hover:bg-muted-800"
          >
            <i class="w-5 h-5 iconify" data-icon="ph:gear-six-duotone"></i>
            <div class="font-sans">
              <h5
                class="text-xs font-semibold text-muted-800 dark:text-muted-200"
              >
                Settings
              </h5>
              <p class="text-xs text-muted-400">Manage preferences</p>
            </div>
          </a>
        </li>
        <li>
          <a
            onclick="document.forms['logout-form'].submit()"
            href="#"
            class="flex items-center gap-3 p-2 transition-colors duration-300 rounded-lg text-muted-400 hover:text-primary-500 hover:bg-muted-100 dark:hover:bg-muted-800"
          >
            <i class="w-5 h-5 iconify" data-icon="ph:sign-out-duotone"></i>
            <div class="font-sans">
              <h5
                class="text-xs font-semibold text-muted-800 dark:text-muted-200"
              >
                Logout
              </h5>
              <p class="text-xs text-muted-400">Logout from account</p>
            </div>
          </a>
          <form name="logout-form" action="{{route('logout')}}" method="post">
            @csrf
           </form>
        </li>
      </ul>
    </div>
  </div>
</div>
