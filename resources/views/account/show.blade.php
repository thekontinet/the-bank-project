<x-app-layout>
    <div class="col-span-12 md:col-span-5">
        <!--Welcome widget-->
        <x-account-card :account="$account"/>

        @if($account->isJoint())
        <div class="card rounded-md shadow-md bg-white dark:bg-slate-600 my-4 p-3">
            <div class="card-title">
                <h4 class="text-lg p-4">Account Holders</h4>
            </div>
            <ul>
                @foreach ($account->holders as $holder)
                <li class="px-4 py-5 flex gap-2">
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
