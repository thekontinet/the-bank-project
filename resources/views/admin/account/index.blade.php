<x-admin-layout>
    <div x-data="accounts()" class="w-full pb-24">
        <!--Header-->
        <div class="flex items-center justify-between py-6">
            <h2 class="text-3xl font-heading text-muted-800 dark:text-white">
                Accounts
            </h2>
            <x-primary-button href="{{route('admin.accounts.create', ['user_id' => $user->id])}}">Create New Account</x-primary-button>
        </div>

        <!--Tabs wrapper-->
        <div>
            <!--Tab content-->
            <div class="w-full">
                <!--Accounts tab-->
                <div class="w-full">
                    <!--Accounts list-->
                    <ul>
                        <!--Header-->
                        <li>
                            <div
                                class="flex w-full px-3 py-2 border-b gap-x-4 border-muted-200 dark:border-muted-800">
                                <div class="w-3/5">
                                    <span class="mb-1 text-xs font-heading text-muted-400">Account</span>
                                </div>
                                <div class="w-1/5">
                                    <span class="mb-1 text-xs font-heading text-muted-400">Balance</span>
                                </div>
                                <div class="w-1/5"></div>
                            </div>
                        </li>

                        @forelse ($accounts as $account)
                            <!--Account item-->
                            <li class="px-3 transition-colors duration-300 cursor-pointer hover:bg-muted-100 dark:hover:bg-muted-800"
                            @click="$store.app.isAccountPanelOpen = true">
                                <div
                                    class="flex items-center w-full py-4 border-b gap-x-4 border-muted-200 dark:border-muted-800">
                                    <div class="w-3/5">
                                        <div class="flex items-center w-full gap-3">
                                            <img src="/img/logo/logo-square-outline.svg" class="w-8 h-8 dark:invert"
                                                alt="App logo" width="48" height="48" />
                                            <span class="text-sm font-heading text-muted-800 dark:text-muted-200">
                                                {{ucfirst($account->type)}} {{$account->short_number}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="w-1/5">
                                        <span class="font-heading text-muted-800 dark:text-muted-200">
                                            @money($account->balance, $account->currency)
                                        </span>
                                    </div>
                                    <div class="md:w-1/5">
                                        <div x-data="{ isOpen: false }" class="relative inline-block ">
                                            <!-- Dropdown toggle button -->
                                            <button @click="isOpen = !isOpen" class="relative z-10 block p-2 text-gray-700 border border-transparent rounded-md dark:bg-muted-100 dark:text-white focus:border-blue-500 focus:ring-opacity-40 dark:focus:ring-opacity-40 focus:ring-blue-300 dark:focus:ring-blue-400 focus:ring dark:bg-gray-800 focus:outline-none">
                                                <i class="w-6 h-6 iconify text-slate-300" data-icon="lucide:more-vertical"></i>
                                            </button>

                                            <!-- Dropdown menu -->
                                            <div x-show="isOpen"
                                                @click.away="isOpen = false"
                                                x-transition:enter="transition ease-out duration-100"
                                                x-transition:enter-start="opacity-0 scale-90"
                                                x-transition:enter-end="opacity-100 scale-100"
                                                x-transition:leave="transition ease-in duration-100"
                                                x-transition:leave-start="opacity-100 scale-100"
                                                x-transition:leave-end="opacity-0 scale-90"
                                                class="absolute right-0 z-20 w-48 py-2 mt-2 origin-top-right bg-white rounded-md shadow-xl dark:bg-muted-800"
                                            >
                                                <a href="{{route('admin.accounts.show', $account)}}" class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-white hover:bg-gray-100 dark:hover:bg-muted-700 dark:hover:text-white">
                                                    View
                                                </a>
                                                <button form='account-delete-{{$account->id}}' class="block w-full px-4 py-3 text-sm text-left text-gray-600 capitalize transition-colors duration-300 transform dark:text-white hover:bg-gray-100 dark:hover:bg-muted-700 dark:hover:text-white">
                                                    Delete
                                                </button>
                                                <form onsubmit="confirm('Are you sure you want to delete this account ?')" action="{{route('admin.accounts.destroy', $account)}}" method="post" id='account-delete-{{$account->id}}'>
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </li>
                        @empty
                        <div class="px-8 py-4 text-sm text-amber-500">No Account Available</div>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
