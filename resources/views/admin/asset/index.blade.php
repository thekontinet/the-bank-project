<x-admin-layout>
    <section class="container px-4 mx-auto mt-8">
        <header class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-medium dark:text-muted-100">Investment Asset</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Manage All Asset Available on this
                    platform</p>
            </div>
            <x-primary-button :href="route('admin.assets.create')">Create New Asset</x-primary-button>
        </header>

        <div class="flex flex-col mt-6">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border-gray-200 dark:border-gray-700 space-y-4">

                        @foreach ($assets as $asset)
                            <div class="flex items-center border rounded">
                                <div class="flex flex-1 items-center gap-1 overflow-hidden border-x">
                                    <img src="{{ $asset->logo_url }}" alt="logo">
                                    <p>
                                        <span class="font-medium text-sm block">{{ $asset->symbol }}</span>
                                        <span class="text-sm">{{ $asset->name }}</span>
                                    </p>
                                    @if ($asset->data['daily_percentage_change'] < 0)
                                        <p class="ml-auto p-2 font-medium text-red-500">@money($asset->price, $asset->currency)</p>
                                    @else
                                        <p class="ml-auto p-2 font-medium text-green-500">@money($asset->price, $asset->currency)</p>
                                    @endif
                                </div>
                                <form action="{{ route('admin.assets.destroy', $asset) }}" method="post" class='h-full'
                                    onsubmit="return confirm('Deleting this asset will remove all invesment and other related data. Are you sure you want to delete this asset ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="p-4">
                                        <i class="w-4 h-4 iconify text-red-500" data-icon="lucide:trash"></i>
                                    </button>
                                </form>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
