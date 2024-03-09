<x-admin-layout>
    <section class="container px-4 mx-auto mt-8">
        <header class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-medium dark:text-muted-100">Investment Portfolio</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Manage all your investment assets</p>
            </div>
        </header>

        <div class="py-4 grid md:grid-cols-4 gap-4">
            @forelse ($investments as $investment)
                <a href="{{ route('admin.investments.show', $investment->id) }}"
                    class="flex flex-col gap-1 overflow-hidden border rounded">
                    <img src="{{ $investment->asset->logo_url }}" alt="logo" class="w-full">
                    <p class="p-4 flex flex-col">
                        <span class="font-medium text-sm block">{{ $investment->asset->symbol }}</span>
                        <span class="text-sm">{{ $investment->asset->name }}</span>
                        <span class="font-medium mt-4">@money($investment->profit, $investment->asset->currency)</span>
                    </p>
                </a>
            @empty
                <p>No Investment Available</p>
            @endforelse
        </div>
    </section>
</x-admin-layout>
