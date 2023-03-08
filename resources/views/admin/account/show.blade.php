<x-admin-layout>
<div class="col-span-12 md:col-span-5">
    <!--Welcome widget-->
    <div
        class="h-full p-10 bg-white border shadow-xl dark:bg-muted-1000 rounded-xl border-muted-200 dark:border-muted-800 shadow-muted-400/10 dark:shadow-muted-800/10"
    >
        <div class="flex flex-col justify-between h-full gap-5 text-center">
            <div class="flex items-center justify-center gap-2">
                <div class="relative">
                    <img class="object-cover mx-0 border-4 rounded-full w-14 h-14" src="{{$user->avatar}}" alt="User photo" width="40" height="40">
                    <span class="absolute bottom-0 right-0 block w-4 h-4 bg-green-500 rounded-full"></span>
                </div>
                <div>
                    <h4 class="text-lg font-semibold uppercase font-heading">
                        {{$user->name}}
                    </h4>
                    <p class="text-muted-400">
                        {{$user->country}}{{$user->state ? ', ' . $user->state : ''}}
                    </p>
                </div>
            </div>

            <p class="-mb-6 font-sans text-sm text-muted-500">
                {{ucfirst($account->type)}} Account
            </p>

            <h2
                class="text-4xl font-medium text-muted-800 dark:text-white"
            >
                @money($account->balance, $account->currency)
            </h2>

            <p class="-mt-5 font-sans text-lg text-muted-500">
                {{$account->number}}
            </p>

            <a
                href="{{route('admin.transactions.create', ['account' => $account->number])}}"
                class="
                h-12
                mx-auto
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
                <span>New Transaction</span>
            </a>
        </div>
    </div>

    <div class="mt-5">
        <header class="py-4">
            <h4 class="text-lg font-bold dark:text-muted-100">Transaction History</h4>
        </header>
        <x-transaction-table :transactions="$account->transactions()->paginate()"/>
    </div>
</div>

</x-admin-layout>
