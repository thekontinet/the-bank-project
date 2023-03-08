<x-admin-layout>
    <div class="w-full pt-32 pb-20">
        <div class="w-full px-4 mx-auto">
            <!--Form-->
            <form action="{{route('admin.tokens.store')}}" method="POST">
                @csrf
                <div class="grid w-full gap-8 ltablet:gap-16 lg:gap-16">
                    <!--Content column-->
                    <div class="col-span-full">
                        <div class="w-full max-w-md">
                            <div class="border-b pb border-muted-200 dark:border-muted-800">
                                <h2 class="mb-8 text-2xl font-heading md:text-3xl text-muted-800 dark:text-white">
                                    Create Transaction Token
                                </h2>
                            </div>

                            <div class="space-y-8 divide-y divide-muted-200 dark:divide-muted-800">
                                <!--Field-->
                                <div class="pt-8">
                                    <h4 class="mb-1 text-sm font-heading text-muted-600 dark:text-muted-400">
                                        User Account
                                    </h4>
                                    <!--Select-->
                                    @if($user)
                                    <div class="relative group">
                                        <select name="account"
                                            class="w-full px-3 py-2 font-sans text-sm leading-5 placeholder-gray-300 transition-all duration-300 bg-white border rounded-lg appearance-none h-11 border-muted-300 text-muted-600 focus:border-muted-300 focus:shadow-lg dark:placeholder-gray-600 dark:bg-muted-1000 dark:text-muted-200 dark:border-muted-800 dark:focus:border-muted-800 tw-accessibility">
                                            @foreach ($user->accounts as $account)
                                                <option value="{{ $account->number }}">{{ ucfirst($account->number) }} - {{ money($account->balance, $account->currency) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @else
                                    <x-text-input name='account' placeholder="Enter Account Number">
                                        <x-slot name="icon">
                                            <i class="w-4 h-4 iconify" data-icon="lucide:banknote"></i>
                                        </x-slot>
                                    </x-text-input>
                                    @endif
                                    <x-input-error :messages="$errors->get('account')" class="mt-2" />
                                </div>
                                <!--Field-->
                                <div class="pt-8">
                                    <h4 class="mb-1 text-sm font-heading text-muted-600 dark:text-muted-400">
                                        Token Name
                                    </h4>
                                    <!--Input-->
                                    <div>
                                        <x-text-input name='name' placeholder="Token Name">
                                            <x-slot name="icon">
                                                <i class="w-4 h-4 iconify" data-icon="lucide:scan"></i>
                                            </x-slot>
                                        </x-text-input>
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="pt-8">
                                    <h4 class="mb-1 text-sm font-heading text-muted-600 dark:text-muted-400">
                                        Pattern
                                    </h4>
                                    <!--Select-->
                                    <div class="relative group">
                                        <select name="type"
                                            class="w-full px-3 py-2 font-sans text-sm leading-5 placeholder-gray-300 transition-all duration-300 bg-white border rounded-lg appearance-none h-11 border-muted-300 text-muted-600 focus:border-muted-300 focus:shadow-lg dark:placeholder-gray-600 dark:bg-muted-1000 dark:text-muted-200 dark:border-muted-800 dark:focus:border-muted-800 tw-accessibility">
                                            <option value="alpha">Only Alphabets</option>
                                            <option value="numeric">Only Numbers</option>
                                            <option value="alphanumeric">Alphabets & Numbers</option>
                                        </select>
                                    </div>
                                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                                </div>
                                <!--Field-->
                                <div class="pt-8">
                                    <h4 class="mb-1 text-sm font-heading text-muted-600 dark:text-muted-400">
                                        Length
                                    </h4>
                                    <!--Input-->
                                    <div>
                                        <x-text-input name='length' placeholder="Length of token">
                                            <x-slot name="icon">
                                                <i class="w-4 h-4 iconify" data-icon="lucide:book-open"></i>
                                            </x-slot>
                                        </x-text-input>
                                        <x-input-error :messages="$errors->get('length')" class="mt-2" />
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="pt-8">
                                    <h4 class="mb-1 text-sm font-heading text-muted-600 dark:text-muted-400">
                                        Message
                                    </h4>
                                    <!--Input-->
                                    <div>
                                        <x-text-input name='desc' placeholder="Write Message" value="Please complete this form to proceed with transaction">
                                            <x-slot name="icon">
                                                <i class="w-4 h-4 iconify" data-icon="lucide:book-open"></i>
                                            </x-slot>
                                        </x-text-input>
                                        <x-input-error :messages="$errors->get('desc')" class="mt-2" />
                                    </div>
                                </div>
                                <!--Buttons-->
                                <div class="flex gap-4 py-8">
                                    <x-primary-button>Proceed</x-primary-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
