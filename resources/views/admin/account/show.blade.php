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

            <div class="flex items-center max-w-xl gap-2 mx-auto">
                <form action="{{route('admin.accounts.update', $account)}}" method="post" onsubmit="return confirm('This action will affect holders on this account. Are you sure you want to proceed ?')">
                    @csrf
                    @method('put')
                    @if ($account->is_joint)
                        <x-primary-button>Deactive Joint Account</x-primary-button>
                        @else
                        <x-secondary-button>Activate Joint Account</x-secondary-button>
                    @endif
                </form>
                <x-primary-button
                href="{{route('admin.transactions.create', ['account' => $account->number])}}"
                >
                    <span>New Transaction</span>
                </x-primary-button>

                <x-primary-button
                    href="{{route('admin.transactions.generate', ['account' => $account->number])}}"
                >
                    <span>Generate Transaction</span>
                </x-primary-button>
            </div>
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
