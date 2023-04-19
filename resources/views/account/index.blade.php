<x-app-layout>
    <div x-data="accounts()" class="w-full pb-24">
        <!--Header-->
        <div class="flex items-center justify-between py-6">
            <h2 class="text-lg font-medium font-heading text-muted-800 dark:text-white">
                Accounts
            </h2>
            <a class="btn btn-sm btn-primary" href="{{route('accounts.create')}}">New Account</a>
        </div>

        <div class="grid md:grid-cols-3 mb:gap-2">
        @forelse ($accounts as $account)
             <x-account-card :account="$account" :href="route('accounts.show', $account)"/>
             @empty
             <div class="flex col-span-full flex-col items-center justify-center h-full">
                 <svg class="h-24 w-24 text-gray-400 mb-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 0a10 10 0 1 0 10 10A10 10 0 0 0 10 0zm1.41 14.59a1 1 0 0 1-1.41 0L10 12.41l-1.59 1.59a1 1 0 1 1-1.41-1.41L8.59 11l-1.59-1.59a1 1 0 1 1 1.41-1.41L10 9.59l1.59-1.59a1 1 0 0 1 1.41 1.41L11.41 11l1.59 1.59a1 1 0 0 1 0 1.41z"/>
                </svg>
                <h2 class="text-2xl font-bold text-gray-600 mb-2">Account Not Available</h2>
                <p class="text-gray-500 mb-4">We're sorry, but this account is currently not available. Please try again later.</p>
            </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
