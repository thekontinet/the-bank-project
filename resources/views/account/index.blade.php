<x-app-layout>
    <div x-data="accounts()" class="w-full pb-24">
        <!--Header-->
        <div class="flex items-center justify-between py-6">
            <h2 class="text-3xl font-heading text-muted-800 dark:text-white">
                Accounts
            </h2>
        </div>

        <!--Tabs wrapper-->
        <div>
            <!--Tab content-->
            <div class="w-full py-6">
                <!--Accounts tab-->
                <div x-show="activeTab === 'tab-1'" class="w-full">
                    <!--Accounts list-->
                    <ul class="max-w-2xl">
                        <!--Header-->
                        <li>
                            <div
                                class="flex w-full max-w-2xl px-3 py-2 border-b gap-x-4 border-muted-200 dark:border-muted-800">
                                <div class="w-3/5">
                                    <span class="mb-1 text-xs font-heading text-muted-400">Account</span>
                                </div>
                                <div class="w-1/5">
                                    <span class="mb-1 text-xs font-heading text-muted-400">Balance</span>
                                </div>
                                <div class="md:w-1/5">
                                    <span class="mb-1 text-xs font-heading text-muted-400">
                                        Action
                                    </span>
                                </div>
                            </div>
                        </li>
                        @foreach ($accounts as $account)
                            <!--Account item-->
                            <li class="px-3 transition-colors duration-300 cursor-pointer hover:bg-muted-100 dark:hover:bg-muted-800"
                                @click="$store.app.isAccountPanelOpen = true">
                                <div
                                    class="flex items-center w-full max-w-2xl py-4 border-b gap-x-4 border-muted-200 dark:border-muted-800">
                                    <div class="w-3/5">
                                        <div class="flex items-center w-full gap-3">
                                            <img src="/img/logo/logo-square-outline.svg" class="w-8 h-8 dark:invert"
                                                alt="App logo" width="48" height="48" />
                                            <span class="text-sm font-heading text-muted-800 dark:text-muted-200">
                                                {{$account->type}} {{$account->short_number}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="w-1/5">
                                        <span class="font-heading text-muted-800 dark:text-muted-200">
                                            @money($account->balance, $account->currency)
                                        </span>
                                    </div>
                                    <div class=" md:w-1/5">
                                        <a href="{{route('accounts.show', $account->id)}}"
                                            class="flex items-center gap-2 px-4 py-2 text-sm transition-colors duration-300 rounded-full text-muted-800 dark:text-muted-200 hover:text-primary-500 hover:bg-primary-500/10 click-blur"
                                            >
                                            <span class="text-sm text-center font-heading">Details</span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!--Linked accounts tab-->
                <div x-show="activeTab === 'tab-2'" class="w-full">
                    <div class="px-8 py-12 text-center bg-muted-100 dark:bg-muted-1000">
                        <div class="w-full max-w-lg mx-auto space-y-3">
                            <h3 class="text-lg font-heading text-muted-800 dark:text-white">
                                You currently have no linked accounts
                            </h3>
                            <p class="font-sans text-muted-500">
                                Link external bank accounts to transfer funds. You can manage your linked
                                accounts from here once you've added one.
                            </p>

                            <div class="flex items-center justify-center">
                                <button type="button"
                                    class="inline-flex items-center justify-center w-40 h-10 px-6 py-2 font-sans text-sm text-white transition-all duration-300 rounded-full shadow-lg gap-x-2 bg-primary-500 shadow-primary-500/20 hover:shadow-xl tw-accessibility">
                                    <span>Link Account</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Rules tab-->
                <div x-show="activeTab === 'tab-3'" class="w-full">
                    <div class="mb-8">
                        <p class="text-sm font-heading text-muted-500 dark:text-muted-500">
                            You don't have any active rules
                        </p>
                    </div>
                    <!--Rules-->
                    <div class="w-full max-w-3xl px-10 py-8 rounded-xl bg-muted-100 dark:bg-muted-800">
                        <div class="space-y-4">
                            <h4 class="text-sm font-heading text-muted-500 dark:text-muted-500">
                                Add a rule
                            </h4>
                            <!--Rule-->
                            <div class="grid grid-cols-12 gap-8">
                                <div class="col-span-5">
                                    <button type="button"
                                        class="flex items-center w-full gap-2 p-4 bg-white shadow-xl cursor-pointer group dark:bg-muted-900 rounded-xl shadow-muted-300/10 dark:shadow-muted-800/10">
                                        <i class="w-4 h-4 transition-colors duration-300 iconify text-muted-600 dark:text-muted-400 group-hover:text-muted-700 dark:group-hover:text-muted-200"
                                            data-icon="lucide:plus"></i>
                                        <i class="w-6 h-6 transition-colors duration-300 iconify text-muted-400 group-hover:text-primary-500"
                                            data-icon="ph:diamonds-four-duotone"></i>
                                        <span
                                            class="text-sm transition-colors duration-300 font-heading text-muted-600 dark:text-muted-400 group-hover:text-muted-700 dark:group-hover:text-muted-200">
                                            Target balance rule
                                        </span>
                                    </button>
                                </div>
                                <div class="col-span-7">
                                    <div class="flex flex-col justify-center w-full h-full">
                                        <p class="text-sm font-heading text-muted-500 dark:text-muted-500">
                                            Keep an account at a target balance by moving funds to or from
                                            savings each day.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--Rule-->
                            <div class="grid grid-cols-12 gap-8">
                                <div class="col-span-5">
                                    <button type="button"
                                        class="flex items-center w-full gap-2 p-4 bg-white shadow-xl cursor-pointer group dark:bg-muted-900 rounded-xl shadow-muted-300/10 dark:shadow-muted-800/10">
                                        <i class="w-4 h-4 transition-colors duration-300 iconify text-muted-600 dark:text-muted-400 group-hover:text-muted-700 dark:group-hover:text-muted-200"
                                            data-icon="lucide:plus"></i>
                                        <i class="w-6 h-6 transition-colors duration-300 iconify text-muted-400 group-hover:text-primary-500"
                                            data-icon="ph:compass-duotone"></i>
                                        <span
                                            class="text-sm transition-colors duration-300 font-heading text-muted-600 dark:text-muted-400 group-hover:text-muted-700 dark:group-hover:text-muted-200">
                                            Zero balance rule
                                        </span>
                                    </button>
                                </div>
                                <div class="col-span-7">
                                    <div class="flex flex-col justify-center w-full h-full">
                                        <p class="text-sm font-heading text-muted-500 dark:text-muted-500">
                                            Keep an account at $0 by moving incoming funds to savings after each
                                            transaction.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
