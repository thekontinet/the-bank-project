<x-admin-layout>
    <header class="py-8">
        <h1 class="text-2xl">Generate Transaction</h1>
    </header>
    <form class="space-y-4" method="post">
        @csrf
        <input type="hidden" name="account" value="{{$account->number}}">
        <div>
            <x-text-input name='quantity' placeholder="Quantity">
                <x-slot name="icon">
                    <i class="w-4 h-4 iconify" data-icon="lucide:percent"></i>
                </x-slot>
            </x-text-input>
            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
        </div>
        <div>
            <x-text-input type='date' name='from' placeholder="From">
                <x-slot name="icon">
                    <i class="w-4 h-4 iconify" data-icon="lucide:calendar"></i>
                </x-slot>
            </x-text-input>
            <x-input-error :messages="$errors->get('from')" class="mt-2" />
        </div>
        <div>
            <x-text-input type='date' name='to' placeholder="To">
                <x-slot name="icon">
                    <i class="w-4 h-4 iconify" data-icon="lucide:calendar"></i>
                </x-slot>
            </x-text-input>
            <x-input-error :messages="$errors->get('to')" class="mt-2" />
        </div>
        <x-primary-button>Generate</x-primary-button>
    </form>
</x-admin-layout>
