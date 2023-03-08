<x-admin-layout>
    <header class="px-4 mt-10">
        <h1 class="text-lg font-semibold dark:text-muted-100">All Transactions</h1>
    </header>
    <x-transaction-table :transactions="$transactions"/>
</x-admin-layout>
