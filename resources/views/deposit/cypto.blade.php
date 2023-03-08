<x-app-layout>
    <div class="w-full pt-32 pb-20">
        <div class="w-full px-4 mx-auto">
            <!--Form-->
            <form action="{{route('deposit.store')}}" method="POST"  x-data="{wallets:{{$walletsJSON}}, wallet:null}">
                @csrf
                <div class="grid w-full gap-8 ltablet:gap-16 lg:gap-16">
                    <!--Content column-->
                    <div class="col-span-full">
                        <div class="w-full">
                            <div class="border-b pb border-muted-200 dark:border-muted-800">
                                <h2 class="mb-8 text-2xl font-heading md:text-3xl text-muted-800 dark:text-white">
                                    Online Deposit
                                </h2>
                            </div>

                            <div class="space-y-8 divide-y divide-muted-200 dark:divide-muted-800">
                                <!--Field-->
                                <div class="pt-8">
                                    <h4 class="mb-1 text-sm font-heading text-muted-600 dark:text-muted-400">
                                        Deposit Account
                                    </h4>
                                    <!--Select-->
                                    <div class="relative group">
                                        <select name="account"
                                            class="w-full px-3 py-2 font-sans text-sm leading-5 placeholder-gray-300 transition-all duration-300 bg-white border rounded-lg appearance-none h-11 border-muted-300 text-muted-600 focus:border-muted-300 focus:shadow-lg dark:placeholder-gray-600 dark:bg-muted-1000 dark:text-muted-200 dark:border-muted-800 dark:focus:border-muted-800 tw-accessibility">
                                            @foreach ($accounts as $account)
                                                <option value="{{ $account->number }}">{{ ucfirst($account->number) }} - {{ money($account->balance, $account->currency) }}</option>
                                            @endforeach
                                        </select>
                                        <div
                                            class="absolute top-0 right-0 flex items-center justify-center transition-transform duration-300 h-11 w-11 text-muted-400 group-focus-within:-rotate-180">
                                            <i class="w-4 h-4 iconify" data-icon="lucide:chevron-down"></i>
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->get('account')" class="mt-2" />
                                </div>


                                <!--Field-->
                                <div class="pt-8">
                                    <h4 class="mb-1 text-sm font-heading text-muted-600 dark:text-muted-400">
                                        Amount
                                    </h4>
                                    <!--Input-->
                                    <div>
                                        <x-text-input name='amount' placeholder="Amount" value='0'>
                                            <x-slot name="icon">
                                                <i class="w-4 h-4 iconify" data-icon="lucide:dollar-sign"></i>
                                            </x-slot>
                                        </x-text-input>
                                        <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                                    </div>
                                </div>

                                 <!--Select-->
                                 <div class="pt-8">
                                    <div class="relative group">
                                        <select name="wallet"
                                            class="w-full px-3 py-2 font-sans text-sm leading-5 placeholder-gray-300 transition-all duration-300 bg-white border rounded-lg appearance-none h-11 border-muted-300 text-muted-600 focus:border-muted-300 focus:shadow-lg dark:placeholder-gray-600 dark:bg-muted-1000 dark:text-muted-200 dark:border-muted-800 dark:focus:border-muted-800 tw-accessibility"
                                            @click="wallet = wallets.find(w => w.id == $event.target.value)">
                                            <option>Select Wallet</option>
                                            <template x-for="wallet in wallets">
                                                <option :value="wallet.id" x-text="wallet.name"></option>
                                            </template>
                                        </select>
                                        <div
                                            class="absolute top-0 right-0 flex items-center justify-center transition-transform duration-300 h-11 w-11 text-muted-400 group-focus-within:-rotate-180">
                                            <i class="w-4 h-4 iconify" data-icon="lucide:chevron-down"></i>
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->get('wallet')" class="mt-2" />
                                 </div>

                                <!--Payment Info-->
                                <div class="flex flex-col items-center justify-center px-4 py-2 my-6 mt-8 border rounded-lg" x-show='wallet'>
                                    <img class="object-cover w-12 h-12 rounded-full" :src="wallet.image_url" :alt="wallet.name"/>
                                    <h4 class="text-base" x-text="wallet.name"></h4>
                                    <div class="flex items-center justify-between w-full max-w-md mt-5 gap-x-2">
                                        <input type="text" x-bind:value="wallet.address" readonly class="flex-1 block h-10 px-4 text-sm text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" />

                                        <button type="button" @click="navigator.clipboard.writeText(wallet.address); alert('copied')" class="rounded-md hidden sm:block p-1.5 text-gray-700 bg-white border border-gray-200 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring transition-colors duration-300 hover:text-blue-500 dark:hover:text-blue-500">
                                            <i class="w-5 h-5 iconify" data-icon="lucide:copy"></i>
                                        </button>
                                    </div>
                                    <p class="max-w-md p-3 mx-auto mt-4 text-center text-green-500 bg-green-100 rounded-md">
                                        Copy and make deposit to the above wallet address. Funds are automatically credited immediately after transaction is verified by the blockchain.
                                    </p>
                                </div>

                                <!--Buttons-->
                                <div class="flex gap-4 py-8">
                                    <x-primary-button x-bind:disabled="!wallet">I have made payment</x-primary-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
