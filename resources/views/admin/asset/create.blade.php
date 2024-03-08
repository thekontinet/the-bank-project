<x-admin-layout>
    <div class="w-full pt-32 pb-20">
        <div class="w-full px-4 mx-auto">
            <!--Form-->
            <form action="">
                <div class="grid w-full gap-8 ltablet:gap-16 lg:gap-16">
                    <!--Content column-->
                    <div class="col-span-full">
                        <div class="w-full max-w-md">
                            <div class="border-b pb border-muted-200 dark:border-muted-800">
                                <h2 class="mb-8 text-2xl font-heading md:text-3xl text-muted-800 dark:text-white">
                                    Create New Asset
                                </h2>
                            </div>

                            <div class="space-y-8 divide-y divide-muted-200 dark:divide-muted-800">
                                <!--Field-->
                                <div class="pt-8">
                                    <h4 class="mb-1 text-sm font-heading text-muted-600 dark:text-muted-400">
                                        Asset Symbol
                                    </h4>
                                    <!--Input-->
                                    <div class="flex items-stretch">
                                        <x-text-input name='symbol' placeholder="TSLA"
                                            value="{{ request()->query('symbol') }}">
                                            <x-slot name="icon">
                                                <i class="w-4 h-4 iconify" data-icon="lucide:diamond"></i>
                                            </x-slot>
                                        </x-text-input>
                                        <x-primary-button class="ml-4 h-auto">Find Now</x-primary-button>
                                    </div>
                                    <a class="text-sm underline text-primary-500 mt-4 block"
                                        href="https://www.nasdaq.com/market-activity/stocks/screener"
                                        target="_blank">Click Here for a Complete List of
                                        Stock
                                        Symbols</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="mt-8 px-4">
            @if ($assetData)
                <x-input-error :messages="$errors->get('symbol')" class="my-2" />
                <div class="shadow max-w-md border flex items-center rounded overflow-hidden gap-2 pr-2">
                    <img src="{{ $assetData['logo_url'] }}" alt="" class="h-full">
                    <div class="p-1">
                        <h4 class="text-sm font-medium">{{ $assetData['symbol'] }}</h4>
                        <p class="text-sm">{{ $assetData['name'] }}</p>
                    </div>
                    <form action="{{ route('admin.assets.store') }}" method="post" class="ml-auto">
                        @csrf
                        <input type="hidden" name="symbol" value="{{ $assetData['symbol'] }}">
                        <x-primary-button>
                            <i class="w-4 h-4 iconify mr-2" data-icon="lucide:save"></i>
                            Save
                        </x-primary-button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
