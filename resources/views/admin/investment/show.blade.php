<x-app-layout>
    <header class="px-4 mt-10">
        <h1 class="text-2xl font-semibold dark:text-muted-100">{{ $asset->name }}</h1>
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
        <x-primary-button type='button' class="mt-2" x-data @click="$dispatch('open-modal', 'update-modal')">Update
            Investment</x-primary-button>
    </header>

    <section class="p-4">
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

    <section class="mt-4 p-4">
        <h3 class="text-lg font-medium mb-4">Description</h3>
        <p class="text-sm text-gray-400">{{ $asset->data['description'] ?? 'Description not available' }}</p>
    </section>


    <x-modal name="update-modal" :show="$errors->any()">
        <section class="p-4">
            <h4 class="font-medium4">Update Investment</h4>
            <form action="{{ route('admin.investments.update', $investment->id) }}" method="post"
                class="py-4 space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <x-input-label value='Profit' />
                    <x-text-input name='profit' placeholder="Profit" value='{{ $investment->profit / 100 }}'>
                        <x-slot name="icon">
                            <i class="w-4 h-4 iconify" data-icon="lucide:dollar-sign"></i>
                        </x-slot>
                    </x-text-input>
                    <x-input-error :messages="$errors->get('profit')" class="mt-2" />
                </div>

                <div>
                    <x-input-label value='Capital' />
                    <x-text-input name='purchase_price' placeholder="purchase_price"
                        value='{{ $investment->purchase_price / 100 }}'>
                        <x-slot name="icon">
                            <i class="w-4 h-4 iconify" data-icon="lucide:dollar-sign"></i>
                        </x-slot>
                    </x-text-input>
                    <x-input-error :messages="$errors->get('purchase_price')" class="mt-2" />
                </div>

                <x-primary-button>Update</x-primary-button>
                <x-secondary-button type="button" @click="$dispatch('close')">close</x-secondary-button>
            </form>
        </section>
    </x-modal>

</x-app-layout>
