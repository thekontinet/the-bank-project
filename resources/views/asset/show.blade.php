<x-app-layout>
    <header class="px-4 mt-10">
        <h1 class="text-2xl font-semibold dark:text-muted-100"><img class="w-12 h-12 mr-2 rounded-full border"
                src="{{ $asset->logo_url }}" alt="logo">{{ $asset->name }}</h1>
        <p class="text-lg flex items-center justify-between">
            <span>@money($asset->price, $asset->currency)</span>
            <span class="flex flex-col">
                @if ($investment)
                    <small class="text-xs">Balance</small>
                    <span class="text-lg font-medium">@money($investment->total, $asset->currency)</span>
                @endif
            </span>
        </p>
        @if ($asset->data['daily_percentage_change'] < 0)
            <p class="text-sm font-bold text-red-600">
                {{ $asset->data['daily_price_change'] }}
                ({{ number_format($asset->data['daily_percentage_change'], 2) }}%)
            </p>
        @else
            <p class="text-sm font-bold text-green-600">
                +{{ $asset->data['daily_price_change'] }}
                (+{{ number_format($asset->data['daily_percentage_change'], 2) }}%) Today
            </p>
        @endif
        <x-primary-button type='button' class="w-32 mt-2" x-data
            @click="$dispatch('open-modal', 'purchase-modal')">{{ $investment?->exists() ? 'Invest More' : 'Invest' }}</x-primary-button>
        @if ($investment)
            <x-secondary-button class="w-32 justify-center" x-data
                @click="$dispatch('open-modal', 'sell-modal')">Withdraw</x-secondary-button>
        @endif
    </header>

    <section class="h-[300px] mt-8">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container" style="height:100%;width:100%">
            <div class="tradingview-widget-container__widget" style="height:calc(100% - 32px);width:100%"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
                {
                    "autosize": true,
                    "symbol": "{{ $asset->broker }}:{{ $asset->symbol }}",
                    "interval": "D",
                    "timezone": "Etc/UTC",
                    "theme": "light",
                    "style": "1",
                    "locale": "en",
                    "enable_publishing": false,
                    "hide_top_toolbar": true,
                    "hide_legend": true,
                    "save_image": false,
                    "calendar": false,
                    "hide_volume": true,
                    "support_host": "/"
                }
            </script>
        </div>
    </section>

    <section class="py-4">
        <h3 class="text-lg font-medium">Statistics</h3>
        <div class="grid grid-cols-2 gap-y-4 py-4">
            <p class="text-sm flex flex-col text-slate-500">
                <strong class="font-medium">Previous Close</strong>
                <span>@money(($asset->data['previous_close'] ?? 0) * 100, $asset->currency)</span>
            </p>
            <p class="text-sm flex flex-col text-slate-500">
                <strong class="font-medium">Volume</strong>
                <span>@money(($asset->data['volume'] ?? 0) * 100, $asset->currency)</span>
            </p>
            <p class="text-sm flex flex-col text-slate-500">
                <strong class="font-medium">Open</strong>
                <span>@money(($asset->data['ohlc_week']['open'] ?? 0) * 100, $asset->currency)</span>
            </p>
            <p class="text-sm flex flex-col text-slate-500">
                <strong class="font-medium">Type</strong>
                <span>{{ $asset->data['asset_class'] }}</span>
            </p>

            @if ($investment)
                <p class="text-sm flex flex-col text-slate-500">
                    <strong class="font-medium">Capital</strong>
                    <span>@money($investment->purchase_price, $asset->currency)</span>
                </p>
                <p class="text-sm flex flex-col text-slate-500">
                    <strong class="font-medium">Profit</strong>
                    <span>@money($investment->profit, $asset->currency)</span>
                </p>
                <p class="text-sm flex flex-col text-slate-500">
                    <strong class="font-medium">Shares</strong>
                    <span>{{ $investment->shares_count }}</span>
                </p>
            @endif
        </div>
    </section>

    <section class="mt-4 py-4">
        <h3 class="text-lg font-medium mb-4">Description</h3>
        <p class="text-sm text-gray-400">{{ $asset->data['description'] ?? 'Description not available' }}</p>
    </section>


    <x-modal name="purchase-modal" :show="$errors->buy->any()">
        <section class="p-4">
            <h4 class="font-medium4">Buy Order</h4>
            <form action="{{ route('invest.store') }}" method="post" class="py-4 space-y-4" x-data="{ price: {{ $asset->price / 100 }}, amount: 0, shares: 0 }"
                x-init="$watch('amount', value => shares = value / price)">
                @csrf
                <input type="hidden" name="asset" value="{{ $asset->id }}">
                <div class="mb-4">
                    <select type='number' name='account'
                        class="w-full h-12 p-4 py-2 font-sans text-base leading-5 text-slate-700 transition-all duration-300 bg-transparent border-2 border-primary-500 rounded-md placeholder:text-black/50 tw-accessibility">
                        <option value="">Select Account</option>
                        @foreach (auth()->user()->accounts as $account)
                            <option value="{{ $account->id }}">{{ $account->number }} (@money($account->balance, $account->currency))</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->buy->get('account')" class="mt-2" />
                </div>
                <div>
                    <x-text-input name='amount' placeholder="Amount" value='0' x-model="amount">
                        <x-slot name="icon">
                            <i class="w-4 h-4 iconify" data-icon="lucide:dollar-sign"></i>
                        </x-slot>
                    </x-text-input>
                    <x-input-error :messages="$errors->buy->get('amount')" class="mt-2" />
                </div>
                <div>
                    <x-text-input placeholder="Estimated Amount" value='{{ money($asset->price, $asset->currency) }}'
                        disabled>
                        <x-slot name="icon">
                            <i class="w-4 h-4 iconify" data-icon="lucide:dollar-sign"></i>
                        </x-slot>
                    </x-text-input>
                </div>
                <div class="mb-4">
                    <x-text-input type='number' name='shares' placeholder="Amount" value='Number of Shares'
                        x-model="shares" readonly>
                        <x-slot name="icon">
                            <i class="w-4 h-4 iconify" data-icon="lucide:hash"></i>
                        </x-slot>
                    </x-text-input>
                    <x-input-error :messages="$errors->buy->get('shares')" class="mt-2" />
                </div>

                <x-primary-button>Purchase</x-primary-button>
                <x-secondary-button type="button" @click="$dispatch('close')">close</x-secondary-button>
            </form>
        </section>
    </x-modal>

    @if ($investment)
        <x-modal name="sell-modal" :show="$errors->sell->any()">
            <section class="p-4">
                <h4 class="font-medium4">Sell Order</h4>
                <form action="{{ route('invest.update', $investment->id) }}" method="post" class="py-4 space-y-4"
                    x-data="{ price: {{ $asset->price / 100 }}, amount: 0, shares: 0 }" x-init="$watch('amount', value => shares = value / price)">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="asset" value="{{ $asset->id }}">
                    <div class="mb-4">
                        <select type='number' name='account'
                            class="w-full h-12 p-4 py-2 font-sans text-base leading-5 text-slate-700 transition-all duration-300 bg-transparent border-2 border-primary-500 rounded-md placeholder:text-black/50 tw-accessibility">
                            <option value="">Select Account</option>
                            @foreach (auth()->user()->accounts as $account)
                                <option value="{{ $account->id }}">{{ $account->number }} (@money($account->balance, $account->currency))
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->sell->get('account')" class="mt-2" />
                    </div>
                    {{-- <div>
                        <x-text-input name='amount' placeholder="Amount" value='0' x-model="amount">
                            <x-slot name="icon">
                                <i class="w-4 h-4 iconify" data-icon="lucide:dollar-sign"></i>
                            </x-slot>
                        </x-text-input>
                        <x-input-error :messages="$errors->sell->get('amount')" class="mt-2" />
                    </div> --}}

                    <x-primary-button>Withdraw</x-primary-button>
                    <x-secondary-button type="button" @click="$dispatch('close')">close</x-secondary-button>
                </form>
            </section>
        </x-modal>
    @endif

</x-app-layout>
