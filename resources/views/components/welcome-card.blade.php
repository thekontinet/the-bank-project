@props(['user'])
      <!--Welcome widget-->
<div
      class="h-full p-10 bg-white border shadow-xl dark:bg-muted-1000 rounded-xl border-muted-200 dark:border-muted-800 shadow-muted-400/10 dark:shadow-muted-800/10"
    >
      <div class="flex flex-col justify-between h-full gap-5">
        <h4 class="text-sm font-semibold uppercase font-heading text-muted-400">
          {{$user->firstname}}'s Account
        </h4>

        <h2
          class="text-4xl font-medium font-heading ptablet:text-2xl text-muted-800 dark:text-white"
        >
          Welcome back, {{$user->firstname}}! 👋
        </h2>

        <p class="font-sans text-muted-500">
          Everything seems ok and up-to-date with your account since your last
          visit.
        </p>

        <a
          href="{{route('accounts.index')}}"
          class="
            h-12
            max-w-[220px]
            inline-flex
            justify-center
            items-center
            gap-x-2
            px-6
            py-2
            font-sans
            text-sm text-white
            bg-primary-500
            rounded-full
            shadow-lg shadow-primary-500/20
            hover:shadow-xl
            tw-accessibility
            transition-all
            duration-300
          "
        >
          <span>My Accounts</span>
        </a>
      </div>
    </div>
