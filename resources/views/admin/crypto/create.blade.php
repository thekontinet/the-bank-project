<x-admin-layout>
    <header class="mt-10">
        <h4 class="text-3xl font-medium uppercase">Add Crypto Wallet</h4>
    </header>
    <div class="my-6">
        <form x-data="{ cryptos: {{ json_encode($cryptos) }}, wallet: null }" class="flex flex-col gap-4" action="{{ route('admin.wallets.store') }}"
            method="post">
            @csrf
            <img class="block w-24 h-24 mx-auto border rounded-full" x-show="wallet" x-bind:src="wallet.iconUrl"
                alt="logo">
            <input type="hidden" name="image_url" x-bind:value="wallet.iconUrl">
            <div>
                <select
                    class="pl-12 w-full h-12 p-4 py-2 font-sans text-base leading-5 text-slate-700 transition-all duration-300 bg-transparent border-2 border-primary-500 rounded-md placeholder:text-black/50 tw-accessibility"
                    name="name" @click="wallet = cryptos.find(w => w.name === $event.target.value)"
                    class="w-full px-4 py-3 rounded">
                    <option>Select Cryptocurrency</option>
                    <template x-for="crypto in cryptos">
                        <option x-bind:value="crypto.name"><template x-text='crypto.name'></template></option>
                    </template>
                </select>
            </div>

            <div>
                <x-text-input x-bind:value="wallet.symbol" name='symbol' placeholder="BTC" readonly>
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
