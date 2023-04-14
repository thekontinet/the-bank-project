<x-guest-layout>
    <div
    class="w-full min-h-screen pb-4 bg-gradient-to-r from-primary-500 via-primary-700 to-primary-900"
  >
    <!--Topbar-->
    <div class="w-full px-6 py-8">
      <div class="w-full max-w-6xl mx-auto">
        <div class="flex items-center justify-between w-full">
          <x-application-logo/>
          <a href="{{route('login')}}" class="flex items-center gap-2 text-white group">
            <span class="font-heading">Sign In</span>
            <i
              class="w-5 h-5 transition-transform duration-300 iconify group-hover:translate-x-1"
              data-icon="lucide:arrow-right"
            ></i>
          </a>
        </div>
      </div>
    </div>

    <div class="mx-auto max-w-2xl rounded-lg bg-white p-3 mt-10">
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-primary-button>
                        {{ __('Resend Verification Email') }}
                    </x-primary-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-secondary-button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Log Out') }}
                </x-secondary-button>
            </form>
        </div>
    </div>
</x-guest-layout>
