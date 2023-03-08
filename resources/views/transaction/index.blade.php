<x-app-layout>
    <header class="flex items-center justify-between px-4 mt-10">
        <h1 class="text-lg font-semibold dark:text-muted-100">All Transactions</h1>
        <x-primary-button @click="window.print()">Print Statement</x-primary-button>
    </header>
    <x-transaction-table :transactions="$transactions"/>
</x-app-layout>
