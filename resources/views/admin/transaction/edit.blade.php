<x-admin-layout>
    <header class="flex justify-between items-center py-10">
        <h4 class="font-medium">Edit Transaction</h4>
        <div class="flex items-center gap-2">
            <button type="submit" class="btn btn-primary btn-sm" form="t-form">Save</button>
            <form action="{{route('admin.transactions.destroy', $transaction)}}" method="post" onsubmit="return confirm('Are you sure ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm">Trash</button>
            </form>
        </div>
    </header>
    <section>
        <form id="t-form" name="t-form" method="post" action="{{route('admin.transactions.update', $transaction)}}" novalidate>
            @csrf
            @method('put')
            <div class="form-group mb-2">
                <label for="amount">Amount</label>
                <input type="number" name="amount" id="amount" placeholder="Amount" value="{{$transaction->amount/100}}" class="input input-bordered w-full">
                @error('amount')
                    <span class="text-error text-sm">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="date">Date</label>
                <input type="datetime-local" name="date" id="date" value="{{$transaction->created_at}}" class="input input-bordered w-full">
                @error('date')
                    <span class="text-error text-sm">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="status">Status</label>
                <select type="datetime-local" name="status" id="status" class="input input-bordered w-full">
                    <option value="success" {{$transaction->status == 'success' ? 'selected' : ''}}>Approve</option>
                    <option value="pending" {{$transaction->status == 'pending' ? 'selected' : ''}}>Pend</option>
                    <option value="failed" {{$transaction->status == 'failed' ? 'selected' : ''}}>Cancel</option>
                </select>
                @error('status')
                    <span class="text-error text-sm">{{$message}}</span>
                @enderror
            </div>
        </form>
    </section>
</x-admin-layout>
