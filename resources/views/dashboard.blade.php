<x-app-layout>
    <!--Grid-->
    <div x-data="dashboard()" class="grid grid-cols-12 gap-6 pt-6 pb-20">
        <!--Grid item-->
        <div class="col-span-12">
            <x-balance-summary-card :account="$user->accounts()->first()" :hasChart="($transactions->count() > 2)"/>
        </div>

        <div class="card col-span-12 shadow-md">
            <div class="grid grid-cols-3 lg:grid-cols-4 gap-y-10 items-center px-4 lg:px-8 py-14 dark:bg-slate-700 rounded-lg">
                <a href="{{route('send.create')}}" class="mx-auto bg-primary-300 rounded-full w-14 h-14 grid place-items-center hover:bg-primary-500 group">
                    <span class="iconify w-6 h-6 group-hover:text-primary-300 text-primary-500" data-icon='lucide:shuffle'></span>
                    <span class="text-xs absolute mt-[70px]">Wire Transfer</span>
                </a>
                <a href="{{route('send.create')}}?dom" class="mx-auto bg-green-300 rounded-full w-14 h-14 grid place-items-center hover:bg-green-500 group">
                    <span class="iconify w-6 h-6 group-hover:text-green-300 text-green-500" data-icon='lucide:rotate-3d'></span>
                    <span class="text-xs absolute mt-[70px]">Transfer</span>
                </a>
                <a href="{{route('deposit.create')}}" class="mx-auto bg-amber-300 rounded-full w-14 h-14 grid place-items-center hover:bg-amber-500 group">
                    <span class="iconify w-6 h-6 group-hover:text-amber-300 text-amber-500" data-icon='lucide:wallet'></span>
                    <span class="text-xs absolute mt-[70px]">Deposit</span>
                </a>
                <a href="{{route('accounts.index')}}" class="mx-auto bg-slate-300 rounded-full w-14 h-14 grid place-items-center hover:bg-slate-500 group">
                    <span class="iconify w-6 h-6 group-hover:text-slate-300 text-slate-500" data-icon='lucide:layers'></span>
                    <span class="text-xs absolute mt-[70px]">Accounts</span>
                </a>

                <a href="{{route('transactions.index')}}" class="mx-auto bg-green-300 rounded-full w-14 h-14 grid place-items-center hover:bg-green-500 group">
                    <span class="iconify w-6 h-6 group-hover:text-green-300 text-green-500" data-icon='lucide:receipt'></span>
                    <span class="text-xs absolute mt-[70px]">Transactions</span>
                </a>

                <a href="/cards" class="mx-auto bg-amber-300 rounded-full w-14 h-14 grid place-items-center hover:bg-amber-500 group">
                    <span class="iconify w-6 h-6 group-hover:text-amber-300 text-amber-500" data-icon='lucide:credit-card'></span>
                    <span class="text-xs absolute mt-[70px]">Cards</span>
                </a>

                <a href="{{route('profile.edit')}}" class="mx-auto bg-slate-300 rounded-full w-14 h-14 grid place-items-center hover:bg-slate-500 group">
                    <span class="iconify w-6 h-6 group-hover:text-slate-300 text-slate-500" data-icon='lucide:cog'></span>
                    <span class="text-xs absolute mt-[70px]">Settings</span>
                </a>

                <a href="{{route('kyc.create')}}" class="mx-auto bg-primary-300 rounded-full w-14 h-14 grid place-items-center hover:bg-primary-500 group">
                    <span class="iconify w-6 h-6 group-hover:text-primary-300 text-primary-500" data-icon='lucide:user-check'></span>
                    <span class="text-xs absolute mt-[70px]">KYC Status</span>
                </a>
            </div>
        </div>

        <!--Grid item-->
        <x-transaction-overview-card title="{{$total_deposit}}" content="Money In Last 30 Days" :progress="$total_deposit_progress" />

        <!--Grid item-->
        <x-transaction-overview-card title="{{$total_withdraw}}" content="Money Out Last 30 Days" :progress="$total_withdraw_progress"/>

        <!--Grid item-->
        <div class="col-span-12 md:col-span-12">
            <div
                class="px-4 py-4 bg-white border shadow-xl md:py-7 md:px-8 xl:px-10 dark:bg-muted-1000 rounded-xl border-muted-200 dark:border-muted-800 shadow-muted-400/10 dark:shadow-muted-800/10">
                <div class="items-center justify-between sm:flex">
                    <h4 class="text-sm font-semibold uppercase font-heading text-muted-400">
                        Recent Transactions
                    </h4>
                    <a href="/transactions"
                        class="inline-flex items-center gap-3 transition-colors duration-300 group text-primary-500 hover:text-primary-400">
                        <span class="font-sans text-base font-medium">View all</span>
                        <i class="w-4 h-4 transition-transform duration-300 iconify group-hover:translate-x-1"
                            data-icon="lucide:arrow-right"></i>
                    </a>
                </div>
                <x-transaction-table :transactions="$transactions" />
            </div>
        </div>
    </div>

    <!--Back to top button-->
    <div class="fixed z-20 hidden w-12 h-12 transition-all duration-200 rounded-full shadow-lg cursor-pointer backtotop md:block bottom-8 right-8"
        x-data="backtotop()" x-init="setup()" x-on:scroll.window="scroll()"
        x-bind:class="{
            'opacity-100 visible translate-y-0': scrolled,
            'opacity-0 invisible translate-y-4': !scrolled,
        }"
        x-on:click="scrollTop()">
        <svg class="stroke-primary-500 stroke-[4px] transition-all duration-200" width="100%" height="100%"
            viewBox="-1 -1 102 102">
            <path fill="none" d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>

        <svg class="absolute z-10 block w-6 h-6 -translate-x-1/2 -translate-y-1/2 cursor-pointer top-1/2 left-1/2 text-primary-500"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="19" x2="12" y2="5"></line>
            <polyline points="5 12 12 5 19 12"></polyline>
        </svg>
    </div>
</x-app-layout>
