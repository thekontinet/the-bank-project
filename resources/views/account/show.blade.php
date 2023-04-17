<x-app-layout>
    <div class="col-span-12 md:col-span-5">
        <!--Welcome widget-->
        <div
            class="h-full p-10 bg-white border shadow-xl dark:bg-muted-1000 rounded-xl border-muted-200 dark:border-muted-800 shadow-muted-400/10 dark:shadow-muted-800/10"
        >
            <div class="flex flex-col justify-between h-full gap-5 text-center">
                <div class="flex items-center justify-center gap-2">
                    <div>
                        <h4 class="text-lg font-semibold uppercase font-heading dark:text-muted-100">
                            {{$account->name}}
                        </h4>
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
            </div>
        </div>

        @if($account->isJoint())
        <div class="card bg-white/50 my-4 border p-3">
            <div class="card-title">
                <h4 class="text-lg p-4">Account Holders</h4>
            </div>
            <ul>
                @foreach ($account->holders as $holder)
                <li class="border-b px-4 py-5 flex gap-2">
                    <img class="avatar w-10 h-10 mr-2 rounded-full" src="{{$holder->avatar}}" alt="">
                    <p>
                        <span class="font-medium block">{{$holder->name}}</span>
                        <span class="text-xs block">{{$holder->email}}</span>
                    </p>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="mt-5">
            <header class="flex items-center justify-between py-4">
                <h4 class="text-lg font-bold dark:text-muted-100">Transaction History</h4>
                <a href="/transactions" class="inline-flex items-center gap-3 transition-colors duration-300 group text-primary-500 hover:text-primary-400">
                  <span class="font-sans text-base font-medium">View all</span>
                  <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" viewBox="0 0 24 24" data-icon="lucide:arrow-right" class="w-4 h-4 transition-transform duration-300 iconify group-hover:translate-x-1 iconify--lucide"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7l7 7l-7 7"></path></svg>
                </a>
            </header>
            <x-transaction-table :transactions="$account->transactions()->limit(5)->get()"/>
        </div>
    </div>
</x-app-layout>
