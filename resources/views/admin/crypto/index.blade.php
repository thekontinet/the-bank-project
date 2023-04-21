<x-admin-layout>
    <header class="flex items-center justify-between mt-10 dark:text-muted-100">
        <h4 class="text-lg font-medium uppercase">Deposit Crypto Wallet</h4>
        <x-primary-button href="{{route('admin.wallets.create')}}">Add New</x-primary-button>
    </header>

    <div class="my-6">
        <ul class="flex flex-col gap-3">
            @foreach ($wallets as $wallet)
                <li class="flex items-center gap-2 overflow-scroll border rounded-md dark:bg-muted-1000 dark:text-muted-100">
                    <form class="flex items-center self-stretch p-3 text-red-500 bg-red-100 cursor-pointer hover:bg-red-300" action="{{route('admin.wallets.destroy', $wallet->id)}}" method="post" onsubmit="return confirm('Are you sure you want to delete this wallet ?')">
                        @method('delete')
                        @csrf
                        <button><i class="w-5 h-5 iconify" data-icon="lucide:trash"></i></button>
                    </form>
                    <img class="w-10 h-10 m-4 border rounded-full" src="{{$wallet->image_url}}" alt="Logo">
                    <div class="flex-1">
                        <h4>{{$wallet->name}}</h4>
                        <p class="text-xs w-full text-ellipsis">{{$wallet->address}}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-admin-layout>
