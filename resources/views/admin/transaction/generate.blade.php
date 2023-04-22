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
        <div class="grid grid-cols-2 gap-2">
            <div>
                <label class="form-label">Min. Amount range</label>
                <input type="number" name="min" class="input input-bordered w-full" placeholder="Min Amount" value="5000">
                <x-input-error :messages="$errors->get('min')" class="mt-2" />
            </div>
            <div>
                <label>Max Amount Range</label>
                <input type="number" name="max" class="input input-bordered w-full" placeholder="Max Amount" value="10000">
                <x-input-error :messages="$errors->get('max')" class="mt-2" />
            </div>
        </div>
        <x-primary-button>Generate</x-primary-button>
    </form>
</x-admin-layout>
