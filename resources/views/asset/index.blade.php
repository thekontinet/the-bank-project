<x-admin-layout>
    <section class="container px-4 mx-auto mt-8">
        <header class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-medium dark:text-muted-100">Investment Assets</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Easy and fast investment</p>
            </div>
        </header>

        <div class="grid lg:grid-cols-2 gap-4 mt-4">
            @foreach ($assets as $asset)
                <a href="{{ route('assets.show', $asset) }}"
                    class="block h-40 border border-primary-200 rounded-md relative p-4">
                    <div class="flex items-start gap-6">
                        <img src="{{ $asset->logo_url }}" alt="logo" class="w-12 h-12 rounded-full">
                        <h4>
                            <strong class="block font-bold">{{ $asset->name }}</strong>
                            <strong class="block font-light text-lg">{{ $asset->symbol }}</strong>
                        </h4>
                    </div>
                    <p class="py-4 flex items-center justify-between">
                        <span class="block text-2xl font-medium">
                            @money($asset->price, $asset->currency)
                        </span>
                        <span
                            class="block text-sm font-medium {{ $asset->data['daily_percentage_change'] < 0 ? 'text-red-600' : 'text-green-600' }}">
                            {{ number_format($asset->data['daily_percentage_change'], 2) }}%
                        </span>
                    </p>
                </a>
            @endforeach
        </div>
    </section>
</x-admin-layout>
