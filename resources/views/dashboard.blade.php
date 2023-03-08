<x-app-layout>
    <!--Grid-->
    <div x-data="dashboard()" class="md:grid grid-cols-12 gap-6 pt-6 pb-20">
        <!--Grid item-->
        <div class="col-span-6 md:col-span-5">
            <x-welcome-card :user='$user' />
        </div>

        <!--Grid item-->
        <div class="col-span-6 md:col-span-7">
            <x-balance-summary-card :account="$user->accounts()->first()" :hasChart="($transactions->count() > 2)"/>
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
