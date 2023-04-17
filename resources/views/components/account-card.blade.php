@props(['account'])
<div class="p-4">
    <div class="rounded-md overflow-hidden shadow-md bg-white/50">
      <div class="p-4 bg-slate-500 text-white">
        <h2 class="text-lg font-bold">{{$account->name}}</h2>
        <p class="text-sm">{{$account->short_number}}</p>
      </div>
      <div class="p-4">
        <p class="text-gray-600 text-sm">Available Balance</p>
        <h3 class="text-2xl font-bold">@money($account->balance, $account->currency)</h3>
        <div class="flex justify-between mt-4">
          <div>
            <p class="text-gray-600 text-sm">Account Type</p>
            <p class="text-sm font-medium">{{ucfirst($account->type)}} ({{$account->is_joint ? 'Joint' : 'Personsal'}})</p>
          </div>
          <div>
            <p class="text-gray-600 text-sm">Account Number</p>
            <p class="text-sm font-medium">{{$account->number}}</p>
          </div>
        </div>
        <div class="flex justify-between mt-4">
          <div>
            <p class="text-gray-600 text-sm">Routing Number</p>
            <p class="text-sm font-medium">987654321</p>
          </div>
          <div>
            <p class="text-gray-600 text-sm">Status</p>
            <p class="text-sm font-medium"><span class="text-sm bg-success p-1 rounded-lg">Active</span></p>
          </div>
        </div>
        <div class="mt-4">
          <a href="{{route('accounts.show', $account)}}" class="btn btn-sm btn-primary w-full">View Transactions</a>
        </div>
      </div>
    </div>
  </div>


