<div class="grid gap-8 md:grid-cols-12">
    <!--Column-->
    <div class="md:col-span-4">
        <h3 class="mb-1 font-medium font-heading text-muted-800 dark:text-muted-100">
            Password Settings
        </h3>
        <p class="text-sm font-heading text-muted-500 dark:text-muted-400">
            Set a unique password to protect your account. Don't forget to change it from time to time.
        </p>
    </div>
    <!--Column-->
    <div class="md:col-span-8">
        <h3
            class="pb-4 text-xs border-b font-heading border-muted-200 dark:border-muted-800 text-muted-800 dark:text-muted-100">
            Password
        </h3>
        <form  method="post" action="{{ route('password.update') }}" class="flex flex-col divide-y divide-muted-200 dark:divide-muted-800">
            @csrf
            @method('put')
            <!--Item-->
            <div class="group">
                <div class="flex items-center gap-4 py-4 text-sm transition-colors duration-300 font-heading text-muted-600 dark:text-muted-400">
                    <div class="flex-1">
                        <h3 class="mb-1 text-xs font-heading text-muted-400">Current Password</h3>
                        <x-text-input name='current_password' type='password' placeholder="Current Password">
                            <x-slot name='icon'>
                                <i class="w-5 h-5 iconify" data-icon="lucide:lock"></i>
                            </x-slot>
                        </x-text-input>
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                    </div>
                </div>
            </div>

            <!--Item-->
            <div class="group">
                <div class="flex items-center gap-4 py-4 text-sm transition-colors duration-300 font-heading text-muted-600 dark:text-muted-400">
                    <div class="flex-1">
                        <h3 class="mb-1 text-xs font-heading text-muted-400">New Password</h3>
                        <x-text-input name='password' type='password' placeholder="New Password">
                            <x-slot name='icon'>
                                <i class="w-5 h-5 iconify" data-icon="lucide:lock"></i>
                            </x-slot>
                        </x-text-input>
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    </div>
                </div>
            </div>

            <!--Item-->
            <div class="group">
                <div class="flex items-center gap-4 py-4 text-sm transition-colors duration-300 font-heading text-muted-600 dark:text-muted-400">
                    <div class="flex-1">
                        <h3 class="mb-1 text-xs font-heading text-muted-400">Confirm New Password</h3>
                        <x-text-input name='password_confirmation' type='password' placeholder="Confirm New Password">
                            <x-slot name='icon'>
                                <i class="w-5 h-5 iconify" data-icon="lucide:lock"></i>
                            </x-slot>
                        </x-text-input>
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 py-4">
                <x-primary-button class="w-full">Save</x-primary-button>
                @if (session('status') === 'password-updated')
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
    </div>
</div>
<div class="grid gap-8 md:grid-cols-12">
    <!--Column-->
    <div class="md:col-span-4">
        <h3 class="mb-1 font-medium font-heading text-muted-800 dark:text-muted-100">
            Transaction Pin
        </h3>
        <p class="text-sm font-heading text-muted-500 dark:text-muted-400">
            Set a unique 4 digit pin to verify transactions on your account.
        </p>
    </div>
    <!--Column-->
    <div class="md:col-span-8">
        <h3
            class="pb-4 text-xs border-b font-heading border-muted-200 dark:border-muted-800 text-muted-800 dark:text-muted-100">
            Transaction Pin
        </h3>
        <form  method="post" action="{{ route('pin.update') }}" class="flex flex-col divide-y divide-muted-200 dark:divide-muted-800">
            @csrf
            @method('put')
            <!--Item-->
            <div class="group">
                <div class="flex items-center gap-4 py-4 text-sm transition-colors duration-300 font-heading text-muted-600 dark:text-muted-400">
                    <div class="flex-1">
                        <h3 class="mb-1 text-xs font-heading text-muted-400">New Transaction Pin</h3>
                        <x-text-input maxlength='4' name='pin' type='password' placeholder="****">
                            <x-slot name='icon'>
                                <i class="w-5 h-5 iconify" data-icon="lucide:key"></i>
                            </x-slot>
                        </x-text-input>
                        <x-input-error :messages="$errors->updatePin->get('pin')" class="mt-2" />
                    </div>
                </div>
            </div>

            <!-- Item -->
            <div class="group">
                <div class="flex items-center gap-4 py-4 text-sm transition-colors duration-300 font-heading text-muted-600 dark:text-muted-400">
                    <div class="flex-1">
                        <h3 class="mb-1 text-xs font-heading text-muted-400">Confirm Transaction Pin</h3>
                        <x-text-input maxlength='4' name='pin_confirmation' type='password' placeholder="****">
                            <x-slot name='icon'>
                                <i class="w-5 h-5 iconify" data-icon="lucide:key"></i>
                            </x-slot>
                        </x-text-input>
                        <x-input-error :messages="$errors->updatePin->get('pin_confirmation')" class="mt-2" />
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 py-4">
                <x-primary-button class="w-full">Save</x-primary-button>
                @if (session('status') === 'pin-updated')
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
    </div>
</div>
