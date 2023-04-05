<div x-data="{ isOpen: false }" class="relative flex justify-center whitespace-normal">
    <button title="transaction settings" @click="isOpen = true" class="px-2 py-2 mx-auto tracking-wide text-white capitalize transition-colors duration-300 transform rounded-md bg-primary-600 hover:bg-primary-500 focus:outline-none focus:ring focus:ring-primary-300 focus:ring-opacity-80" title="admin settings">
        <i class="w-5 h-5 iconify" data-icon="lucide:cog"></i>
    </button>

    <div x-show="isOpen"
        x-transition:enter="transition duration-300 ease-out"
        x-transition:enter-start="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="translate-y-0 opacity-100 sm:scale-100"
        x-transition:leave="transition duration-150 ease-in"
        x-transition:leave-start="translate-y-0 opacity-100 sm:scale-100"
        x-transition:leave-end="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
        class="fixed inset-0 z-10 overflow-y-auto"
        aria-labelledby="modal-title" role="dialog" aria-modal="true"
    >
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <span class="hidden sm:inline-block sm:h-screen sm:align-middle" aria-hidden="true">&#8203;</span>
                <div class="relative inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl dark:bg-muted-1000 sm:my-8 sm:w-full sm:max-w-sm sm:p-6 sm:align-middle">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-lg font-medium leading-6 text-gray-800 capitalize dark:text-white" id="modal-title">
                            Transaction Actions
                        </h3>
                        <button class="text-muted-100" @click="isOpen = !isOpen"><i class="w-5 h-5 iconify" data-icon="lucide:x"></i></button>
                    </div>

                    <form action="{{route('admin.transactions.update', $transaction->id)}}" method="post" name="admin-transaction-action-form-{{$transaction->id}}" onsubmit="return confirm('Are you sure of this action ?')">
                        @csrf
                        @method('put')
                        <select class="w-full p-2 bg-transparent rounded dark:text-muted-100 focus:text-black" name="action" class="text-sm" onchange="document.forms['admin-transaction-action-form-{{$transaction->id}}'].submit()">
                            <option>Select Action</option>
                            <option value="{{\App\Models\Transaction::STATUS_SUCCESS}}">Approve</option>
                            <option value="{{\App\Models\Transaction::STATUS_FAILED}}">Reject</option>
                        </select>
                        <x-input-error :messages="$errors->get('action')" class="mt-2" />
                    </form>

                    <form  class="mt-4" action="{{route('admin.transactions.update', $transaction->id)}}" method="post" name="admin-transaction-action-date-form-{{$transaction->id}}" onsubmit="return confirm('Are you sure of this action ?')">
                        @csrf
                        @method('put')
                        <x-text-input type='date' class="w-full p-0 rounded" name="created_at" class="text-sm" onchange="document.forms['admin-transaction-action-date-form-{{$transaction->id}}'].submit()">
                            <x-slot name='icon'><i class="w-5 h-5 iconify" data-icon="lucide:calendar-days"></i></x-slot>
                        </x-text-input>
                        <x-input-error :messages="$errors->get('created_at')" class="mt-2" />
                    </form>
                </div>
        </div>
    </div>
</div>
