<x-app-layout>
    <div class="w-full pt-32 pb-20">
        <div class="w-full px-4 mx-auto">
            <!--Form-->
            <form action="{{route('send.store')}}" method="POST">
                @csrf
                <div class="grid w-full gap-8 ltablet:gap-16 lg:gap-16">
                    <!--Content column-->
                    <div class="col-span-full">
                        <div class="w-full max-w-md">
                            <div class="border-b pb border-muted-200 dark:border-muted-800">
                                <h2 class="mb-8 text-2xl font-heading md:text-3xl text-muted-800 dark:text-white">
                                    Send Money
                                </h2>
                            </div>

                            <div class="space-y-8 divide-y divide-muted-200 dark:divide-muted-800">
                                <!--Field-->
                                <div class="pt-8">
                                    <h4 class="mb-1 text-sm font-heading text-muted-600 dark:text-muted-400">
                                        Sender Account
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
                                        Account Name
                                    </h4>
                                    <!--Input-->
                                    <div>
                                        <x-text-input name='name' placeholder="Account Name">
                                            <x-slot name="icon">
                                                <i class="w-4 h-4 iconify" data-icon="lucide:user"></i>
                                            </x-slot>
                                        </x-text-input>
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="pt-8">
                                    <h4 class="mb-1 text-sm font-heading text-muted-600 dark:text-muted-400">
                                        Bank Name
                                    </h4>
                                    <!--Input-->
                                    <div>
                                        <x-text-input name='bank' placeholder="Bank Name">
                                            <x-slot name="icon">
                                                <i class="w-4 h-4 iconify" data-icon="lucide:building"></i>
                                            </x-slot>
                                        </x-text-input>
                                        <x-input-error :messages="$errors->get('bank')" class="mt-2" />
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="pt-8">
                                    <h4 class="mb-1 text-sm font-heading text-muted-600 dark:text-muted-400">
                                        Account Number
                                    </h4>
                                    <!--Input-->
                                    <div>
                                        <x-text-input name='account_number' placeholder="Account Number">
                                            <x-slot name="icon">
                                                <i class="w-4 h-4 iconify" data-icon="lucide:hash"></i>
                                            </x-slot>
                                        </x-text-input>
                                        <x-input-error :messages="$errors->get('account_number')" class="mt-2" />
                                    </div>
                                </div>
                                @if($isWireTransfer)
                                <!--Field-->
                                <div class="pt-8">
                                    <h4 class="mb-1 text-sm font-heading text-muted-600 dark:text-muted-400">
                                        Swift Code
                                    </h4>
                                    <!--Input-->
                                    <div>
                                        <x-text-input name='swift' placeholder="Swift Code">
                                            <x-slot name="icon">
                                                <i class="w-4 h-4 iconify" data-icon="lucide:hash"></i>
                                            </x-slot>
                                        </x-text-input>
                                        <x-input-error :messages="$errors->get('swift')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="pt-8">
                                    <h4 class="mb-1 text-sm font-heading text-muted-600 dark:text-muted-400">
                                        Routing Number
                                    </h4>
                                    <!--Input-->
                                    <div>
                                        <x-text-input name='route' placeholder="Routing Number">
                                            <x-slot name="icon">
                                                <i class="w-4 h-4 iconify" data-icon="lucide:hash"></i>
                                            </x-slot>
                                        </x-text-input>
                                        <x-input-error :messages="$errors->get('route')" class="mt-2" />
                                    </div>
                                </div>
                                @endif
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
                                <div class="pt-8">
                                    <h4 class="mb-1 text-sm font-heading text-muted-600 dark:text-muted-400">
                                        Narrator/Purpose
                                    </h4>
                                    <!--Input-->
                                    <div>
                                        <x-text-input name='desc' placeholder="Description">
                                            <x-slot name="icon">
                                                <i class="w-4 h-4 iconify" data-icon="lucide:book-open"></i>
                                            </x-slot>
                                        </x-text-input>
                                        <x-input-error :messages="$errors->get('desc')" class="mt-2" />
                                    </div>
                                </div>
                                <!--Buttons-->
                                <div class="flex gap-4 py-8">
                                    <x-primary-button>Proceed</x-primary-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
