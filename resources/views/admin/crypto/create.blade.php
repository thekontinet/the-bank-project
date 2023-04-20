<x-admin-layout>
    <header class="mt-10">
        <h4 class="text-3xl font-medium uppercase">Add Crypto Wallet</h4>
    </header>
    <div class="my-6">
        <form x-data="{cryptos:{{json_encode($cryptos)}}, wallet:null}" class="flex flex-col gap-4" action="{{route('admin.wallets.store')}}" method="post">
            @csrf
            <img class="block w-24 h-24 mx-auto border rounded-full" x-show="wallet" x-bind:src="'https://cryptocompare.com' + wallet.CoinInfo.ImageUrl" alt="logo">
            <input type="hidden" name="image_url" x-bind:value="'https://cryptocompare.com' + wallet.CoinInfo.ImageUrl">
            <div>
                <select class="form-control" name="name" @click="wallet = cryptos.find(w => w.CoinInfo.FullName === $event.target.value)" class="w-full px-4 py-3 rounded">
                    <option>Select Cryptocurrency</option>
                    <template x-for="crypto in cryptos">
                        <option x-bind:value="crypto.CoinInfo.FullName"><template x-text='crypto.CoinInfo.FullName'></template></option>
                    </template>
                </select>
            </div>

            <div>
                <x-text-input x-bind:value="wallet.CoinInfo.Name" name='symbol' placeholder="BTC" readonly>
                    <x-slot name="icon">
                        <i class="w-4 h-4 iconify" data-icon="lucide:wallet"></i>
                    </x-slot>
                </x-text-input>
            </div>

            <div>
                <x-text-input name='address' placeholder="Enter Wallet Payment Address">
                    <x-slot name="icon">
                        <i class="w-4 h-4 iconify" data-icon="lucide:wallet"></i>
                    </x-slot>
                </x-text-input>
            </div>

            <x-primary-button>Save</x-primary-button>
        </form>
    </div>
</x-admin-layout>
