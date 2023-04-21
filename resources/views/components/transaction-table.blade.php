@props(['transactions'])
<div>
    <!--Table-->
    <div class="px-2 overflow-x-auto mt-7">
        <table class="w-full whitespace-nowrap">
            <thead>
                @if(auth()->user()->hasAdminRole())
                <th
                class="w-1/5 px-4 pb-3 font-sans text-xs font-semibold text-left text-muted-400 dark:text-muted-300">
                    <span>Actions</span>
                </th>
                @endif()
                <th
                    class="w-1/5 px-4 pb-3 font-sans text-xs font-semibold text-left text-muted-400 dark:text-muted-300">
                    <span>Date</span>
                </th>
                <th
                    class="w-2/5 px-4 pb-3 font-sans text-xs font-semibold text-left text-muted-400 dark:text-muted-300">
                    <span>To / From</span>
                </th>
                <th class="px-4 pb-3 font-sans text-xs font-semibold text-left text-muted-400 dark:text-muted-300">
                    <span>Amount</span>
                </th>
                <th class="px-4 pb-3 font-sans text-xs font-semibold text-left text-muted-400 dark:text-muted-300">
                    <span>Account</span>
                </th>
                <th class="px-4 pb-3 font-sans text-xs font-semibold text-left text-muted-400 dark:text-muted-300">
                    <span>Status</span>
                </th>
                <th class="px-4 pb-3 font-sans text-xs font-semibold text-left text-muted-400 dark:text-muted-300">
                    <span>Description</span>
                </th>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <!--Row-->
                    <tr tabindex="0">
                       @if(auth()->user()->hasAdminRole())
                       <td class="px-4 py-2">
                            <a class="btn btn-sm btn-primary btn-circle" href="{{route('admin.transactions.edit', $transaction)}}">
                                <span class="w-4 h-4 iconify" data-icon='lucide:pencil'></span>
                            </a>
                        </td>
                       @endif
                        <td class="px-4 py-2">
                            <span
                                class="font-sans text-sm font-medium leading-none text-muted-500 dark:text-muted-300">
                                {{ $transaction->created_at->format('d M Y | h:i a') }}
                            </span>
                        </td>
                        <td class="px-4 py-2">
                            <span
                                class="text-sm font-medium leading-none font-sm text-muted-500 dark:text-muted-300">
                                {{$transaction->account->short_number}}
                            </span>
                        </td>
                        <td class="px-4 py-2">
                            <span
                                class="font-sans text-base font-medium leading-none text-muted-800 dark:text-muted-100">
                                @money($transaction->amount, $transaction->currency)
                            </span>
                        </td>
                        <td class="px-4 py-2">
                            <span class="font-sans text-sm font-medium leading-none text-muted-400">
                                {{$transaction->account->short_number}}
                            </span>
                        </td>
                        <td class="px-4 py-2">
                            @if($transaction->status === 'pending')
                            <span
                                class="inline-block font-sans text-xs py-1.5 px-3 m-1 rounded-full bg-amber-100 dark:bg-amber-500/10 text-amber-500">
                                Processing
                            </span>
                            @elseif ($transaction->status === 'success')
                            <span
                                class="inline-block font-sans text-xs py-1.5 px-3 m-1 rounded-full bg-green-100 dark:bg-green-500/10 text-green-500">
                                Success
                            </span>
                            @else
                            <span
                                class="inline-block font-sans text-xs py-1.5 px-3 m-1 rounded-full bg-red-100 dark:bg-red-500/10 text-red-500">
                                Failed
                            </span>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            <div class="flex items-center gap-2 text-muted-400">
                               {{$transaction->description}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if($transactions->isEmpty())
            <p class="p-4 text-sm font-light">No Transactions</p>
        @endif
    </div>
    <div class="py-4 print:hidden">
        @if($transactions  instanceof \Illuminate\Pagination\AbstractPaginator)
            {{$transactions->links()}}
        @endif
    </div>
</div>
