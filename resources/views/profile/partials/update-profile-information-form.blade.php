<div class="grid gap-8 md:grid-cols-12">
    <!--Column-->
    <div class="md:col-span-4">
        <h3 class="mb-1 font-medium font-heading text-muted-800 dark:text-muted-100">
            About you
        </h3>
        <p class="text-sm font-heading text-muted-500 dark:text-muted-400">
            Some basic information that we need to know about you, and to process
            legal matters.
        </p>
    </div>
    <!--Column-->
    <div class="md:col-span-8">
        <h3
            class="pb-4 text-xs border-b font-heading border-muted-200 dark:border-muted-800 text-muted-800 dark:text-muted-100">
            Your info
        </h3>
        <form  method="post" action="{{ route('profile.update') }}" class="flex flex-col divide-y divide-muted-200 dark:divide-muted-800">
            @csrf
            @method('patch')
            <!--Item-->
            <div class="group">
                <div class="flex items-center gap-4 py-4 text-sm transition-colors duration-300 font-heading text-muted-600 dark:text-muted-400">
                    <div class="flex-1">
                        <h3 class="mb-1 text-xs font-heading text-muted-400">Email address</h3>
                        <x-text-input name='email' type='email' placeholder="Email Address" value="{{$user->email}}">
                            <x-slot name='icon'>
                                <i class="w-5 h-5 iconify" data-icon="lucide:mail"></i>
                            </x-slot>
                        </x-text-input>
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>
                </div>
            </div>
            <!--Item-->
            <div class="group">
                <div
                    class="flex items-center gap-4 py-4 text-sm transition-colors duration-300 font-heading text-muted-600 dark:text-muted-400">
                    <div class="flex-1">
                        <h3 class="mb-1 text-xs font-heading text-muted-400">Your Name</h3>
                        <x-text-input type='text' name='name' placeholder="Name" value="{{$user->name}}">
                            <x-slot name='icon'>
                                <i class="w-5 h-5 iconify" data-icon="lucide:user"></i>
                            </x-slot>
                        </x-text-input>
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 py-4">
                <x-primary-button class="w-full">Save</x-primary-button>
                @if (session('status') === 'profile-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-right text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="mt-2 text-sm text-gray-800 dark:text-gray-200">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification" class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 text-sm font-medium text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            </div>
        @endif
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>
    </div>
</div>
