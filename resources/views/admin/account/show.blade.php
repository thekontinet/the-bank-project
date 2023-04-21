<x-admin-layout>
<div class="col-span-12 md:col-span-5">
    <!--Welcome widget-->
    <div
        class="h-full p-1 bg-white border shadow-xl dark:bg-muted-1000 rounded-xl border-muted-200 dark:border-muted-800 shadow-muted-400/10 dark:shadow-muted-800/10"
    >
        <x-account-card :account="$account" :href="route('accounts.show', $account)" :hasAvatar='true'/>
        <div class="grid lg:grid-cols-3 items-center gap-2 mx-auto mt-4">
            <form class="w-full" action="{{route('admin.accounts.update', $account)}}" method="post" onsubmit="return confirm('This action will affect holders on this account. Are you sure you want to proceed ?')">
                @csrf
                @method('put')
                @if ($account->is_joint)
                    <button class="btn btn-sm btn-primary w-full">Deactive Joint Account</button>
                    @else
                    <button class="btn btn-sm btn-success w-full">Activate Joint Account</button>
                @endif
            </form>
            <a
                class="btn btn-sm w-full"
                href="{{route('admin.transactions.create', ['account' => $account->number])}}"
            >
                <span>New Transaction</span>
            </a>

            <a
                class="btn btn-sm w-full"
                href="{{route('admin.transactions.generate', ['account' => $account->number])}}"
            >
                <span>Generate Transaction</span>
            </a>
        </div>
    </div>

    @if($account->isJoint())
        <div class="card bg-white/50 my-4 border p-3">
            <div class="card-title justify-between">
                <h4 class="text-lg p-4">Account Holders</h4>
                <a class="btn btn-sm" href="{{route('holders.edit', $account)}}">Add Holder</a>
            </div>
            <ul>
                @foreach ($account->holders as $holder)
                <li class="border-b px-4 py-5 flex gap-2">
                    <img class="avatar w-10 h-10 mr-2 rounded-full" src="{{$holder->avatar}}" alt="">
                    <p>
                        <span class="font-medium block">{{$holder->name}}</span>
                        <span class="text-xs block">{{$holder->email}}</span>
                    </p>
                    @if ($holder->id != $account->user_id)
                    <form class="ml-auto" action="{{route('holders.destroy', $account)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm">X</button>
                        <input type="hidden" name="email" value="{{$holder->email}}">
                    </form>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
        @endif

    <div class="mt-5">
        <header class="py-4">
            <h4 class="text-lg font-bold dark:text-muted-100">Transaction History</h4>
        </header>
        <x-transaction-table :transactions="$account->transactions()->paginate()"/>
    </div>
</div>

</x-admin-layout>
