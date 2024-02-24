<x-app-layout>
    <!--Grid-->
    <div x-data="dashboard()" class="grid grid-cols-12 gap-6 pt-6 pb-20">
        <!--Grid item-->
        <div class="col-span-12">
            <div class="carousel w-full">
                @foreach ($accounts as $account)
                    <div id="account-{{ $account->id }}" class="carousel-item w-full">
                        <x-account-card :account="$account" :href="route('accounts.show', $account)" />
                    </div>
                @endforeach
            </div>
            <div class="flex justify-center w-full py-2 gap-2">
                @foreach ($accounts as $account)
                    <a href="#account-{{ $account->id }}" class="h-1 w-10 bg-black focus:bg-primary-500"></a>
                @endforeach
            </div>
        </div>

        <div class="card col-span-12 shadow-md py-8 dark:bg-slate-700">
            <h4 class="text-sm p-4">Quick Actions</h4>
            <div class="grid gap-4 grid-cols-2 lg:grid-cols-4 items-center px-4 lg:px-8 rounded">
                <x-action-button :href="route('send.create')" title="Wire Transfer" icon="shuffle" />
                <x-action-button href="{{ route('send.create') }}?dom" title="Transfer" icon="rotate-3d" />
                <x-action-button :href="route('deposit.create')" title="Deposit" icon="wallet" />
                <x-action-button :href="route('accounts.index')" title="Accounts" icon="layers" />
                <x-action-button :href="route('transactions.index')" title="Transactions" icon="receipt" />
                <x-action-button href="/cards" title="Cards" icon="credit-card" />
                <x-action-button :href="route('profile.edit')" title="Settings" icon="cog" />
                @if (!auth()->user()->hasAdminRole())
                    <x-action-button :href="route('kyc.create')" title="KYC Status" icon="user-check" />
                @else
                    <x-action-button :href="route('admin.users.index')" title="Admin Panel" icon="user-cog" />
                @endif
            </div>
        </div>

        @if ($user->loan()->exists())
            <div class="shadow-lg rounded-lg overflow-hidden border border-gray-200 col-span-full relative">
                <div class="px-6 py-4">
                    <div class="flex items-start justify-between">
                        <p class="text-2xl text-gray-600">Loan Summary <br/> ({{ money($user->loan->amount) }})</p>
                        <i class="w-12 h-12 iconify text-slate-100 absolute top-4 right-4"
                            data-icon="lucide:hand-coins"></i>
                    </div>
                    <div class="mt-4">
                        <p class="text-sm text-gray-400 grid grid-cols-2 md:grid-cols-4 gap-y-4">
                            <span><strong class="block font-medium">Interest Rate</strong>
                                {{ $user->loan->interest_rate }}%</span>
                            <span><strong class="block font-medium">Interest Amount</strong>
                                {{ money($user->loan->interest_amount) }}</span>
                            <span><strong class="block font-medium">Paid</strong>
                                {{ money($user->loan->amount_paid) }}</span>
                            <span><strong class="block font-medium">Remain</strong>
                                {{ money($user->loan->total - $user->loan->amount_paid) }}</span>
                        </p>
                    </div>
                </div>
                <div class="bg-gray-100 px-6 py-2">
                    <p class="text-sm text-gray-600 grid grid-cols-2 lg:grid-cols-4">
                        <span class="lg:col-span-3">Period: {{ $user->loan->duration_in_months }} Months</span>
                        <span>Total: {{ money($user->loan->total) }}</span>
                    </p>
                </div>
            </div>
        @endif


        <div class="col-span-12">
            <x-balance-summary-card :account="$user->accounts()->first()" :hasChart="$transactions->count() > 2" />
        </div>

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
