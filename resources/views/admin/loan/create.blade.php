<x-admin-layout>
    <div class="pt-10 pb-4" x-data>
        <header class="flex items-center justify-between my-6">
            <h3 class="text-xl font-heading text-muted-800 dark:text-muted-200">
                Loan
            </h3>
        </header>

        <form name="update-form" class="space-y-4" action="{{ route('admin.loans.store') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ request()->query('user_id') }}" />
            <div class="col-span-10 space-y-4">
                <div class="form-group">
                    <label class="form-label" for="amount">Amount</label>
                    <input type="number" name="amount" placeholder="0.00"
                        value="{{ old('amount', $loan?->amount / 100) }}" class="input input-bordered w-full">
                    @error('amount')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="interest_rate">Interest Rate (%)</label>
                    <input type="number" name="interest_rate" placeholder="0"
                        value="{{ old('interest_rate', $loan?->interest_rate) }}" class="input input-bordered w-full">
                    @error('interest_rate')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="duration_in_months">Duration (months)</label>
                    <input type="number" name="duration_in_months" placeholder="0"
                        value="{{ old('duration_in_months', $loan?->duration_in_months) }}"
                        class="input input-bordered w-full">
                    @error('duration_in_months')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="amount_paid">Amount Paid</label>
                    <input type="number" name="amount_paid" placeholder="0.00"
                        value="{{ old('amount_paid', $loan?->amount_paid / 100) }}" class="input input-bordered w-full">
                    @error('amount_paid')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>



                <button class="btn btn-primary">Save</button>
                @if ($loan)
                    <button class="btn btn-danger" form="delete-form">Delete</button>
                @endif
            </div>
        </form>
        @if ($loan)
            <form id="delete-form" action="{{ route('admin.loans.destroy', $loan) }}" method="POST">
                @csrf
                @method('DELETE')
            </form>
        @endif
    </div>
</x-admin-layout>
